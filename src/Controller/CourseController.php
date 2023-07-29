<?php

namespace App\Controller;

use App\Entity\Category;
use App\Services\Parameters;
use App\Services\Stats;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CourseController extends AbstractController
{

    public function __construct( private EntityManagerInterface $entityManager,private Parameters $parameters, private Stats $stats) { }

    #[Route('/course', name: 'course_home')]
    public function index(): Response
    {
        // Get category
        $categories = $this->entityManager->getRepository(Category::class)->findBy([
            'parent' => null
        ]);
        return $this->render('course/index.html.twig', [
            'categories' => $categories
        ]);
    }
}
