<?php

namespace App\Controller\Admin;

use App\Entity\Adoptionrequest;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AdoptionrequestCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Adoptionrequest::class;
    }


    public function configureFields(string $pageName): iterable
    {
            yield IdField::new('id')
                ->onlyOnIndex();
            yield DateField::new('date')
                ->hideOnForm();
            yield TextField::new('message')
                ->hideOnForm();
            yield TextField::new('statusName')
                ->hideOnForm();
             yield TextField::new('userFullName')
            ->hideOnForm();
//            associationField::new('status')->autocomplete(),
//            associationField::new('animal')->autocomplete();
    }

}
