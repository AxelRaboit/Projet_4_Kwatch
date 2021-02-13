<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Season;
use App\Entity\Comment;
use App\Entity\Episode;
use App\Entity\Program;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/comment")
 */
class CommentController extends AbstractController
{
    /**
     * @Route("/", name="comment_index", methods={"GET"})
     */
    public function index(CommentRepository $commentRepository): Response
    {
        return $this->render('comment/index.html.twig', [
            'comments' => $commentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin", name="comment_admin")
     */
    public function admin(CommentRepository $commentRepository): Response
    {
        if(!$this->isGranted('ROLE_ADMIN'))
        {
            return $this->redirectToRoute('program_index');
        }

        return $this->render('admin/crud/comment.html.twig', [
            'categories' => $commentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="comment_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {   
        if(!$this->isGranted('ROLE_ADMIN'))
        {
            return $this->redirectToRoute('home_index');
        }

        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('program_index');
        }

        return $this->render('comment/new.html.twig', [
            'comment' => $comment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comment_show", methods={"GET"})
     */
    public function show(Comment $comment): Response
    {
        return $this->render('comment/show.html.twig', [
            'comment' => $comment,
        ]);
    }

    /**
     * @Route("/{programSlug}/seasons/{seasonId}/episodes/{episodeId}/{id}/edit", name="comment_edit", methods={"GET","POST"})
     * @ParamConverter("program", class="App\Entity\Program", options={"mapping": {"programSlug": "slug"}})
     * @ParamConverter("season", class="App\Entity\Season", options={"mapping": {"seasonId": "id"}})
     * @ParamConverter("episode", class="App\Entity\Episode", options={"mapping": {"episodeId": "id"}})
     */
    public function edit(Request $request, Comment $comment, Program $program, Season $season, Episode $episode): Response
    {
        $user = $this->getUser();

        if($comment->getAuthor() == $user || $user == $this->isGranted('ROLE_ADMIN')) {

            $form = $this->createForm(CommentType::class, $comment);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();

                $this->addFlash('messageUpdated', 'Votre commentaire a bien été modifié !');
    
                return $this->redirectToRoute('program_season_episode_show', [
                    'programSlug' => $program->getSlug(),
                    'seasonId' => $season->getId(),
                    'episodeId' => $episode->getId(),
                ]);
            }
    
            return $this->render('comment/edit.html.twig', [
                'program' => $program,
                'season' => $season,
                'episode' => $episode,
                'comment' => $comment,
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
     * @Route("/{programSlug}/seasons/{seasonId}/episodes/{episodeId}/{id}", name="comment_delete", methods={"DELETE"})
     * @ParamConverter("program", class="App\Entity\Program", options={"mapping": {"programSlug": "slug"}})
     * @ParamConverter("season", class="App\Entity\Season", options={"mapping": {"seasonId": "id"}})
     * @ParamConverter("episode", class="App\Entity\Episode", options={"mapping": {"episodeId": "id"}})
     */
    public function delete(Request $request, Comment $comment, Program $program, Season $season, Episode $episode): Response
    {
        $user = $this->getUser();

        if($comment->getAuthor() == $user || $user == $this->isGranted('ROLE_ADMIN')) {

            if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($comment);
                $entityManager->flush();

                $this->addFlash('messageAlert', 'Votre commentaire a bien été supprimé');
    
                return $this->redirectToRoute('program_season_episode_show', [
                    'programSlug' => $program->getSlug(),
                    'seasonId' => $season->getId(),
                    'episodeId' => $episode->getId(),
                ]);
            }

      
        } else {

            if($this->isGranted('ROLE_USER')) {
                return $this->redirectToRoute('home_index');
            } else {
                return $this->redirectToRoute('app_login');
            }
        }


        return $this->redirectToRoute('program_index');
    }
}
