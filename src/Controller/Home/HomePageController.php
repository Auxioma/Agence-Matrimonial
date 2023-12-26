<?php

namespace App\Controller\Home;

use App\Repository\ProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ProfileRepository $profile): Response
    {
        return $this->render('layout/layout-content-home.html.twig', [
            'profiles' => $profile->findBy(['Sex' => 'Femme'], [], 10)
        ]);
    }
}
