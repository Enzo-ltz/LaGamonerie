<?php

namespace App\Repository;

use App\Entity\Evaluate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Evaluate|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evaluate|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evaluate[]    findAll()
 * @method Evaluate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvaluateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Evaluate::class);
    }

    // /**
    //  * @return Evaluate[] Returns an array of Evaluate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Evaluate
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
