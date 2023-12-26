<?php

namespace App\Controller\Pages;

use App\Repository\ProfileRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilesController extends AbstractController
{
    #[Route('/adherante', name: 'app_profiles_list')]
    public function ViewListProfile(ProfileRepository $profile, PaginatorInterface $paginator, Request $request): Response
    {
        $pagination = $paginator->paginate(
            $profile->AdheranteListingQuery(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            20 /*limit per page*/
        );

        return $this->render('pages/list-profiles.html.twig', [
            'profiles' => $pagination
        ]); 
    }
}
