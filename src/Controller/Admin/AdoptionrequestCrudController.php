<?php

namespace App\Controller\Admin;

use App\Entity\Adoptionrequest;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
        return [
            'id',
            'date',
            'message',
            'statusName',
        ];
    }

}
