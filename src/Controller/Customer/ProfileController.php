<?php

namespace App\Controller\Customer;

use App\Entity\Profile;
use App\Form\ProfileType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileController extends AbstractController
{
    #[Route('/customer/profile/new', name: 'customer_profile_new')]
    public function index(): Response
    {
        $profile = new Profile();
        $form = $this->createForm(ProfileType::class, $profile, );
        
        return $this->render('customer/profile.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}