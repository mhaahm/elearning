<?php

namespace App\Controller\Admin;

use App\Entity\Course;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CourseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Course::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            NumberField::new('course_time'),
            NumberField::new('cource_price'),
            NumberField::new('cource_total_read'),
            NumberField::new('discount_price'),
            BooleanField::new('featured_cource'),
            BooleanField::new('enable_discount'),
            TextEditorField::new('long_description'),
            TextEditorField::new('description'),
            AssociationField::new('course_language'),
            AssociationField::new('course_level'),
            AssociationField::new('course_category'),
            TextField::new('course_image'),
            TextField::new('course_url_video'),
            TextField::new('course_video'),
        ];
    }

}
