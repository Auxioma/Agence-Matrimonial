<?php

namespace App\Controller\Customer;

use App\Entity\Profile;
use App\Form\ProfileType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends AbstractController
{
    #[Route('/customer/profile/new', name: 'customer_profile_new')]
    public function index(Request $request): Response
    {
        $profile = new Profile();
        $form = $this->createForm(ProfileType::class, $profile);
        $form->handleRequest($request);

        if ( $form->isSubmitted() && $form->isValid() ) {
            dd($request->get('files'));
            try {

            } catch (\Exception $e) {
                $this->addFlash('danger', '....');
            }
            
            $profile->setUser($this->getUser());
        }
        
        return $this->render('customer/profile.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}