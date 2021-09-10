<?php

namespace App\Repository;

use App\Entity\Tblcashaccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tblcashaccount|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tblcashaccount|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tblcashaccount[]    findAll()
 * @method Tblcashaccount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblcashaccountRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tblcashaccount::class);
    }

    // /**
    //  * @return Tblcashaccount[] Returns an array of Tblcashaccount objects
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
    public function findOneBySomeField($value): ?Tblcashaccount
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
