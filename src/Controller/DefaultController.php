<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ProgramRepository;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index(ProgramRepository $programRepository): Response
    {
        $programs = $programRepository->findBy([], ['id' => 'DESC'], 5);
        return $this->render('index.html.twig', ['programs' => $programs]);
    }

    /**
     * @Route("/my-profile", name="app_profil")
     */
    public function profil(): Response
    {
        return $this->render('profil.html.twig');
    }
}