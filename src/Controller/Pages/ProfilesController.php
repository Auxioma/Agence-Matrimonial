<?php

namespace App\Controller\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilesController extends AbstractController
{
    #[Route('/adherante', name: 'app_profiles_list')]
    public function ViewListProfile(): Response
    {
        return $this->render('pages/list-profiles.html.twig'); 
    }
}
