<?php

namespace App\Repository;

use App\Entity\Tblcreancesspec;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tblcreancesspec|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tblcreancesspec|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tblcreancesspec[]    findAll()
 * @method Tblcreancesspec[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblcreancesspecRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tblcreancesspec::class);
    }

    // /**
    //  * @return Tblcreancesspec[] Returns an array of Tblcreancesspec objects
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
    public function findOneBySomeField($value): ?Tblcreancesspec
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
