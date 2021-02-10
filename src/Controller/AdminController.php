<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administration", name="administration_")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        if(!$this->isGranted('ROLE_ADMIN'))
        {
            if($this->isGranted('ROLE_USER')) {
                return $this->redirectToRoute('program_index');
            }
        }

        return $this->render('admin/index.html.twig');
    }

}
