<?php

namespace App\Controller\Pages;

use App\Entity\SuccessStories;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SuccessStoryController extends AbstractController
{
    #[Route('/mariage/{Slug}', name: 'app_success_stories')]
    public function index(SuccessStories $story): Response
    {
        return $this->render('pages/show-success-stories.html.twig', [
            'story' => $story
        ]); 
    }
}