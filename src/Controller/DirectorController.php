<?php

namespace App\Controller;

use App\Entity\Director;
use App\Form\DirectorType;
use App\Repository\DirectorRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/director")
 */
class DirectorController extends AbstractController
{
    /**
     * @Route("/", name="director_index", methods={"GET"})
     */
    public function index(DirectorRepository $directorRepository): Response
    {
        return $this->render('director/index.html.twig', [
            'directors' => $directorRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin", name="director_admin")
     */
    public function admin(DirectorRepository $directorRepository): Response
    {
        return $this->render('admin/crud/director.html.twig', [
            'directors' => $directorRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="director_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $director = new Director();
        $form = $this->createForm(DirectorType::class, $director);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($director);
            $entityManager->flush();

            return $this->redirectToRoute('program_index');
        }

        return $this->render('director/new.html.twig', [
            'director' => $director,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{directorSlug}", name="director_show", methods={"GET"}, requirements={"actorSlug"="[a-z\-_]+"})
     * @ParamConverter("director", class="App\Entity\Director", options={"mapping": {"directorSlug": "slug"}})
     */
    public function show(Director $director): Response
    {
        return $this->render('director/show.html.twig', [
            'director' => $director,
        ]);
    }

    /**
     * @Route("/{directorSlug}/edit", name="director_edit", methods={"GET","POST"})
     * @ParamConverter("director", class="App\Entity\Director", options={"mapping": {"directorSlug": "slug"}})
     */
    public function edit(Request $request, Director $director): Response
    {
        $user = $this->getUser();

        if($user == $this->isGranted('ROLE_ADMIN')) {

            $form = $this->createForm(DirectorType::class, $director);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();
    
                return $this->redirectToRoute('director_show', ['directorSlug' => $director->getSlug()]);
            }
    
            return $this->render('director/edit.html.twig', [
                'director' => $director,
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
     * @Route("/{id}", name="director_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Director $director): Response
    {
        $user = $this->getUser();

        if($user == $this->isGranted('ROLE_ADMIN')) {

            if ($this->isCsrfTokenValid('delete'.$director->getId(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($director);
                $entityManager->flush();
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
}
