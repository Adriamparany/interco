<?php

namespace App\Repository;

use App\Entity\Tblcreances;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tblcreances|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tblcreances|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tblcreances[]    findAll()
 * @method Tblcreances[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblcreancesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tblcreances::class);
    }

    // /**
    //  * @return Tblcreances[] Returns an array of Tblcreances objects
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
    public function findOneBySomeField($value): ?Tblcreances
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
