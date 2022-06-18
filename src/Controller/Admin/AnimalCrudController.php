<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AnimalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animal::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
            ->onlyOnIndex();
        yield TextField::new('name');
        yield TextField::new('photo');
        yield BooleanField::new('neutered')
            ->renderAsSwitch(false);;
        yield BooleanField::new('adopted')
            ->renderAsSwitch(false);;
        yield DateField::new('birthdate')
            ->hideOnForm();
        yield TextField::new('description')
            ->hideOnForm();
        yield TextField::new('breedName')
            ->hideOnForm();
    }
}
