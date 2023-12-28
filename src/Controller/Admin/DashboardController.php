<?php

namespace App\Controller\Admin;

use App\Entity\Education;
use App\Entity\Eyes;
use App\Entity\Familly;
use App\Entity\Hair;
use App\Entity\Profile;
use App\Entity\SuccessStories;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Agence Matrimonial');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Profile', 'fas fa-user', Profile::class);

        // Create submenus Configuration with items
        yield MenuItem::subMenu('Configuration', 'fas fa-cog')->setSubItems([
            MenuItem::linkToCrud('Status familliale', 'fas fa-user', Familly::class),
            MenuItem::linkToCrud('Education scolaire', 'fas fa-user', Education::class),
            MenuItem::linkToCrud('Cheveux', 'fas fa-user', Hair::class),
            MenuItem::linkToCrud('Yeux', 'fas fa-user', Eyes::class),
        ]);

        // Create submenus Pages with items
        yield MenuItem::subMenu('CMS', 'fas fa-file')->setSubItems([
            MenuItem::linkToCrud('Témoignages ', 'fas fa-user', SuccessStories::class),
        ]);
    }
}
