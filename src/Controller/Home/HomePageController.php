<?php

namespace App\Controller\Home;

use App\Repository\ProfileRepository;
use App\Repository\SuccessStoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ProfileRepository $profile, SuccessStoriesRepository $success): Response
    {
        return $this->render('layout/layout-content-home.html.twig', [
            'profiles' => $profile->findBy(['Sex' => 'F'], [], 10),
            'success' => $success->findBy([], ['id' => 'DESC'], 3)
        ]);
    }
}
