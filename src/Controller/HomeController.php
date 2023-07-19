<?php

namespace App\Controller;

use App\Entity\Category;
use App\Services\Parameters;
use App\Services\Stats;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    protected EntityManagerInterface $entityManager;
    private Parameters $parameters;
    private Stats $stats;

    public function __construct( EntityManagerInterface $entityManager,Parameters $parameters,Stats $stats)
    {
        $this->entityManager = $entityManager;
        $this->parameters = $parameters;
        $this->stats = $stats;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // Get category
        $categories = $this->entityManager->getRepository(Category::class)->findBy([
            'parent' => null
        ]);
        $stats = [
            'nb_courses' => $this->stats->getNbCourse(),
            'nb_constructor' => $this->stats->getNbInstructor(),
            'nb_student' => $this->stats->getNbStudent(),
            // Todo update this to certif course
            'nb_courses_cert' => $this->stats->getNbCourse(),
        ];

        return $this->render('home/index.html.twig', [
            'home_text_title' => $this->parameters->getParam('home_text_title'),
            'home_page_text_param' => [
                'nb_course' => 10,
                'nb_statment' => 20
            ],
            'categories' => $categories,
            'home_page_text' => $this->parameters->getParam('home_page_text'),
            'stats' => $stats
        ]);
    }
}
