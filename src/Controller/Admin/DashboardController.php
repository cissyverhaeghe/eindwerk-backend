<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
//        $routeBuilder = $this->get(AdminUrlGenerator::class);
//
//        return parent::index();
        return $this->render('admin/index.html.twig');

    }



    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->renderContentMaximized()
            ->setTitle('LASH Admin Panel');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Animals','fa fa-paw',AnimalCrudController::getEntityFqcn());
        yield MenuItem::linkToCrud('Adoption Requests','fa fa-paperclip',AdoptionrequestCrudController::getEntityFqcn());
        yield MenuItem::linkToCrud('Age Categories','fa fa-certificate',AgecategoryCrudController::getEntityFqcn());
        yield MenuItem::linkToCrud('Breeds','fa fa-heart',BreedCrudController::getEntityFqcn());
        yield MenuItem::linkToCrud('Status','fa fa-map-o',StatusCrudController::getEntityFqcn());
        yield MenuItem::linkToCrud('Users','fa fa-user',UserCrudController::getEntityFqcn());

    }

    public function configureActions(): Actions
    {
        return parent::configureActions()
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureAssets(): Assets
    {
        return parent::configureAssets()
            ->addCssFile('style.css');
    }


}
