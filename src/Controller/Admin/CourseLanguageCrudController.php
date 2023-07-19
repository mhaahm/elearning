<?php

namespace App\Controller\Admin;

use App\Entity\CourseLanguage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CourseLanguageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CourseLanguage::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            DateTimeField::new('created_at')->hideOnForm(),
        ];
    }

}
