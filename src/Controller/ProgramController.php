<?php

namespace App\Controller;

use App\Repository\ProgramRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
        $programs = $programRepository->findAll();
        return $this->render('program/index.html.twig', [
            'programs' => $programs,
        ]);
    }

    /**
     * Getting a program by his id
     * @Route("/show/{id<^[0-9]+$>}", name="show")
     * @param integer $id
     * @return response
     */
    public function show(int $id, ProgramRepository $programRepository): response
    {
        $program = $programRepository->findOneBy(['id' => $id]);

        if (!$program) {
            throw $this->createNotFoundException(
                'Aucune série avec l\'id: '.$id.' existe.'
            );
        }

        return $this->render('program/show.html.twig', [
            'program' => $program,
        ]);
    }
}
