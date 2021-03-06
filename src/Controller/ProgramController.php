<?php

namespace App\Controller;

use App\Entity\Season;
use App\Entity\Comment;
use App\Entity\Episode;
use App\Entity\Program;
use App\Form\CommentType;
use App\Form\ProgramType;
use App\Repository\RoleRepository;
use App\Repository\ProgramRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/program", name="program_")
 */
class ProgramController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ProgramRepository $programRepository): Response
    {
        if(!$this->isGranted('ROLE_USER'))
        {
            return $this->redirectToRoute('app_login');
        }

        $programs = $programRepository->findAll();
        return $this->render('program/index.html.twig', [
            'programs' => $programs,
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin(Request $request, ProgramRepository $programRepository, PaginatorInterface $paginatorInterface): Response
    {
        if(!$this->isGranted('ROLE_ADMIN'))
        {
            return $this->redirectToRoute('program_index');
        }

        $data = $programRepository->findAll();

        $programs = $paginatorInterface->paginate(
            $data,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('admin/crud/program.html.twig', [
            'programs' => $programs,
        ]);
    }

    /**
     * Getting a program by his slug
     * @Route("/show/{slug}", name="show")
     * @ParamConverter("program", class="App\Entity\Program", options={"mapping": {"slug": "slug"}})
     * @return response
     */
    public function show(Program $program, RoleRepository $roleRepository): response    /* to get by id -> ("/show/{id<^[0-9]+$>}", name="show") */
    {
        if(!$this->isGranted('ROLE_USER'))
        {
            return $this->redirectToRoute('app_login');
        }

        $directors = $program->getDirectors();
        $seasons = $program->getSeasons();
        $roles = $roleRepository->findBy(['program' => $program->getId()]);

        return $this->render('program/show.html.twig', [
            'program' => $program,
            'seasons' => $seasons,
            'roles' => $roles,
            'directors' => $directors
        ]);
    }

    /**
     * @Route("/{programSlug}/seasons/{seasonId}", methods={"GET"}, name="season_show")
     * @ParamConverter("program", class="App\Entity\Program", options={"mapping": {"programSlug": "slug"}})
     * @ParamConverter("season", class="App\Entity\Season", options={"mapping": {"seasonId": "id"}})
     * @return Response
     */
    public function showSeason(Program $program, Season $season): Response
    {
        if(!$this->isGranted('ROLE_USER'))
        {
            return $this->redirectToRoute('app_login');
        }

        $episodes = $season->getEpisodes();

        return $this->render('program/season_show.html.twig', [
            'program' => $program,
            'seasons' => $season,
            'episodes' => $episodes
        ]);
    }

    /**
     * @Route("/{programSlug}/seasons/{seasonId}/episodes/{episodeId}", name="season_episode_show")
     * @ParamConverter("program", class="App\Entity\Program", options={"mapping": {"programSlug": "slug"}})
     * @ParamConverter("season", class="App\Entity\Season", options={"mapping": {"seasonId": "id"}})
     * @ParamConverter("episode", class="App\Entity\Episode", options={"mapping": {"episodeId": "id"}})
     */
    public function showEpisode(Request $request, Program $program, Season $season, Episode $episode): Response
    {
        if(!$this->isGranted('ROLE_USER'))
        {
            return $this->redirectToRoute('app_login');
        }

        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $parentid = $form->get("parentid")->getData();
            $entityManager = $this->getDoctrine()->getManager();
            if ($parentid == true) {
                $parent = $entityManager->getRepository(Comment::class)->find($parentid);
                $comment->setParent($parent);
            }
            $comment->setEpisode($episode);
            $comment->setAuthor($this->getUser());
            $entityManager->persist($comment);
            $entityManager->flush();

            $this->addFlash('messageSuccess', 'Votre commentaire a bien été ajouté !');
            
            /* return $this->redirectToRoute('program_index'); */ // Decomment if you want to be redirected in the program index
        }

        return $this->render('program/episode_show.html.twig', [
            'program' => $program,
            'season' => $season,
            'episode' => $episode,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/search", name="search", methods={"GET"})
     * @return Response
     */
    public function search(Request $request, ProgramRepository $programRepository): Response
    {
        if(!$this->isGranted('ROLE_USER'))
        {
            return $this->redirectToRoute('app_login');
        }

        $query = $request->query->get('q');

        if (null !== $query) {
            $programs = $programRepository->findByQuery($query);
        }

        return $this->render('program/index.html.twig', [
            'programs' => $programs ?? [],
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {   
        if(!$this->isGranted('ROLE_ADMIN'))
        {
            return $this->redirectToRoute('home_index');
        }

        $program = new Program();
        $form = $this->createForm(ProgramType::class, $program);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($program);
            $entityManager->flush();

            return $this->redirectToRoute('program_index');
        }

        return $this->render('program/new.html.twig', [
            'program' => $program,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Program $program): Response
    {
        $user = $this->getUser();

        if($user == $this->isGranted('ROLE_ADMIN')) {

            $form = $this->createForm(ProgramType::class, $program);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();
    
                return $this->redirectToRoute('program_show', ['slug' => $program->getSlug()]);
            }
    
            return $this->render('program/edit.html.twig', [
                'program' => $program,
                'form' => $form->createView(),
            ]);
      
        } else {

            if($this->isGranted('ROLE_USER')) {
                return $this->redirectToRoute('home_index');
            } else {
                return $this->redirectToRoute('app_login');
            }
        }
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     */
    public function delete(Request $request, Program $program): Response
    {

        $user = $this->getUser();

        if($user == $this->isGranted('ROLE_ADMIN')) {

            if ($this->isCsrfTokenValid('delete'.$program->getId(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($program);
                $entityManager->flush();
    
                if ($program->getPoster() == true) {
                    $fileToDelete = __DIR__ . '/../../public/uploads/' . $program->getPoster();
                    if (file_exists($fileToDelete)) {
                        unlink($fileToDelete);
                    }
                }
            }
    
            return $this->redirectToRoute('program_index');
      
        } else {

            if($this->isGranted('ROLE_USER')) {
                return $this->redirectToRoute('home_index');
            } else {
                return $this->redirectToRoute('app_login');
            }
        }

        if(!$this->isGranted('ROLE_ADMIN'))
        {
            return $this->redirectToRoute('app_login');
        }
    }

}
