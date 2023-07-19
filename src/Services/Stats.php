<?php

namespace App\Services;

use App\Entity\Course;
use App\Entity\Instructor;
use App\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;

class Stats {

    public function __construct(private EntityManagerInterface $entityManager)
    {

    }

    public function getNbCourse(): ?int
    {
        $qb = $this->entityManager->createQueryBuilder()
        ->select("count(c.id) as nb_course")->from(Course::class,"c");
        return $qb->getQuery()->getSingleScalarResult();
    }

    public function getNbInstructor(): ?int
    {
        $qb = $this->entityManager->createQueryBuilder()
            ->select("count(i.id) as nb_s")->from(Instructor::class,"i");
        return $qb->getQuery()->getSingleScalarResult();
    }

    public function getNbStudent(): ?int
    {
        $qb = $this->entityManager->createQueryBuilder()
            ->select("count(s.id) as nb_s")->from(Student::class,"s");
        return $qb->getQuery()->getSingleScalarResult();
    }
}
