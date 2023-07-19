<?php

namespace App\Repository;

use App\Entity\CourseQuestion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CourseQuestion|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourseQuestion|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourseQuestion[]    findAll()
 * @method CourseQuestion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourseQuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourseQuestion::class);
    }

    // /**
    //  * @return CourseQuestion[] Returns an array of CourseQuestion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CourseQuestion
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
