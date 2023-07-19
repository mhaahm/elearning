<?php

namespace App\Controller\Admin;

use App\Entity\CourseChapter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CourseChapterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CourseChapter::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
