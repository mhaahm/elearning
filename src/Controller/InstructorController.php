<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InstructorController extends AbstractController
{

    public function __construct (private EntityManagerInterface $entityManager)
    {

    }

    #[Route('/instructor', name: 'app_instructor')]
    public function index(): Response
    {
        $categories = $this->entityManager->getRepository(Category::class)->findBy([
            'parent' => null
        ]);
        return $this->render('instructor/index.html.twig', [
            'categories' => $categories
        ]);
    }
}
