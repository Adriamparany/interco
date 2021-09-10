<?php

namespace App\Repository;

use App\Entity\Tblcreancesccp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tblcreancesccp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tblcreancesccp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tblcreancesccp[]    findAll()
 * @method Tblcreancesccp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblcreancesccpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tblcreancesccp::class);
    }

    // /**
    //  * @return Tblcreancesccp[] Returns an array of Tblcreancesccp objects
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
    public function findOneBySomeField($value): ?Tblcreancesccp
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
