<?php

namespace App\Controller\Menu;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MenuController extends AbstractController
{
    public function mainMenu(CategoryRepository $categoryRepository): Response
    {
        return $this->render('_partials/_header.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }
}