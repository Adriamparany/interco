<?php

namespace App\Repository;

use App\Entity\Tblcreancesspecavance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tblcreancesspecavance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tblcreancesspecavance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tblcreancesspecavance[]    findAll()
 * @method Tblcreancesspecavance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblcreancesspecavanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tblcreancesspecavance::class);
    }

    // /**
    //  * @return Tblcreancesspecavance[] Returns an array of Tblcreancesspecavance objects
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
    public function findOneBySomeField($value): ?Tblcreancesspecavance
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
