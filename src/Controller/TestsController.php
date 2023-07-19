<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Course;
use App\Form\CourseType;
use App\Services\Parameters;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TestsController extends AbstractController
{
    protected EntityManagerInterface $entityManager;
    private Parameters $parameters;

    public function __construct( EntityManagerInterface $entityManager,Parameters $parameters)
    {
        $this->entityManager = $entityManager;
        $this->parameters = $parameters;
    }

    #[Route('/test', name: 'app_home_test')]
    public function index(Request $request): Response
    {
       $course = new Course();
       $form = $this->createForm(CourseType::class,$course);
       $form->handleRequest();
       return $this->render("testes/test.html.twig",
       [
           'form' => $form,
           'categories' => []
       ]);
    }
}
