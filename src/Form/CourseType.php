<?php

namespace App\Form;

use App\Entity\Course;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CourseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('course_time')
            ->add('cource_price')
            ->add('cource_total_read')
            ->add('featured_cource')
            ->add('discount_price')
            ->add('enable_discount')
            ->add('long_description')
            ->add('course_image')
            ->add('course_url_video')
            ->add('course_video')
            ->add('course_language')
            ->add('course_level')
            ->add('course_category')
            ->add('student')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Course::class,
        ]);
    }


}
