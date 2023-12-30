<?php

namespace App\Controller\Customer;

use App\Entity\Profile;
use App\Form\ProfileType;
use App\Repository\ProfileRepository;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ProfileController extends AbstractController
{
    #[Route('/customer/profile/new', name: 'customer_profile_new')]
    public function index(Request $request, SluggerInterface $slugger, EntityManagerInterface $entityManager): Response
    {
        
        // Nous allons verifier que le profil n'existe pas déjà
        if ( $this->getUser()->getProfiles()->toArray() ) {
            return $this->redirectToRoute('customer_profile');
        }
        
        $profile = new Profile();
        $form = $this->createForm(ProfileType::class, $profile);
        $form->handleRequest($request);

        if ( $form->isSubmitted() && $form->isValid() ) {
            $imageProfile = $form->get('files')->getData();

            if ( $imageProfile ) {
                foreach($imageProfile as $image) {
                    $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeFilename = $slugger->slug($originalFilename);
                    $newFilename = $safeFilename.'-'.uniqid().'.'.$image->guessExtension();

                    try {
                        $image->move(
                            $this->getParameter('profile_directory'),
                            $newFilename
                        );
                       
                        $imagesJson[] = $newFilename;

                    } catch (FileException $e) {
                        throw new \Exception('Error uploading file');
                    }

                }

                $profile->setPictures($imagesJson);

            }

            $profile->setUser($this->getUser());
            $profile->setReference(substr(Uuid::v4(), 0, 8));
            $profile->setSlug($profile->getFirstName() . '-' . $profile->getLastName() . '-' . $profile->getReference());
            $profile->setSex('H');

            $entityManager->persist($profile);
            $entityManager->flush();

            // flash message
            $this->addFlash('success', 'Votre profil a bien été créé');

            return $this->redirectToRoute('customer_profile');

        }
        
        return $this->render('customer/profile-new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/customer/profile', name: 'customer_profile')]
    public function Update(Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->render('customer/profile-update.html.twig', [
            'form' => $entityManager->getRepository(Profile::class)->find($this->getUser()->getProfiles()->toArray()[0]),
        ]);
    }
}