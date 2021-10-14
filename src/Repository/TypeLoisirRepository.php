<?php

namespace App\Repository;

use App\Entity\TypeLoisir;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeLoisir|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeLoisir|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeLoisir[]    findAll()
 * @method TypeLoisir[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeLoisirRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeLoisir::class);
    }

    // /**
    //  * @return TypeLoisir[] Returns an array of TypeLoisir objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeLoisir
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
