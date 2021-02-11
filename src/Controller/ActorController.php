<?php

namespace App\Controller;

use Exception;
use App\Entity\Actor;
use App\Form\ActorType;
use App\Repository\RoleRepository;
use App\Repository\ActorRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/actor", name="actor_")
 */
class ActorController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(ActorRepository $actorRepository): Response
    {
        if(!$this->isGranted('ROLE_USER'))
        {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('actor/index.html.twig', [
            'actors' => $actorRepository->findBy(array(), array('name' => 'ASC')),
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin(ActorRepository $actorRepository): Response
    {
        if(!$this->isGranted('ROLE_ADMIN'))
        {
            return $this->redirectToRoute('program_index');
        }

        return $this->render('admin/crud/actor.html.twig', [
            'actors' => $actorRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $actor = new Actor();
        $form = $this->createForm(ActorType::class, $actor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($actor);
            $entityManager->flush();

            return $this->redirectToRoute('program_index');
        }

        return $this->render('actor/new.html.twig', [
            'actor' => $actor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{actorSlug}", name="show", methods={"GET"}, requirements={"actorSlug"="[a-z\-_]+"})
     * @ParamConverter("actor", class="App\Entity\Actor", options={"mapping": {"actorSlug": "slug"}})
     */
    public function show(Actor $actor/* , RoleRepository $roleRepository */): Response
    {
        $roles = $actor->getRoles();

        return $this->render('actor/show.html.twig', [
            'actor' => $actor,
            'roles' => $roles,
          /*   'programs' => $programs */
        ]);
    }

    /**
     * @Route("/{actorSlug}/edit", name="edit", methods={"GET","POST"})
     * @ParamConverter("actor", class="App\Entity\Actor", options={"mapping": {"actorSlug": "slug"}})
     */
    public function edit(Request $request, Actor $actor): Response
    {
        $user = $this->getUser();

        if($user == $this->isGranted('ROLE_ADMIN')) {

            $form = $this->createForm(ActorType::class, $actor);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();
    
                return $this->redirectToRoute('actor_show', ['actorSlug' => $actor->getSlug()]);
            }
    
            return $this->render('actor/edit.html.twig', [
                'actor' => $actor,
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
    public function delete(Request $request, Actor $actor): Response
    {
        $user = $this->getUser();

        if($user == $this->isGranted('ROLE_ADMIN')) {

            if ($this->isCsrfTokenValid('delete'.$actor->getId(), $request->request->get('_token'))) {
                try
                {
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->remove($actor);
                    $entityManager->flush();
    
                    if ($actor->getPicture() == true) {
                        $fileToDelete = __DIR__ . '/../../public/uploads/' . $actor->getPicture();
                        if (file_exists($fileToDelete)) {
                            unlink($fileToDelete);
                        }
                    }
                }
                catch (Exception $e) 
                {
                    throw new Exception('A role is assigned to this actor, so it is not possible to delete it.');
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
    }

    /**
     * @Route("/search", name="search", methods={"GET"}, priority=10)
     * @return Response
     */
    public function search(Request $request, ActorRepository $actorRepository): Response
    {
        $query = $request->query->get('q');

        if (null !== $query) {
            $actors = $actorRepository->findByQuery($query);
        }

        return $this->render('actor/index.html.twig', [
            'actors' => $actors ?? [],
        ]);
    }
}
