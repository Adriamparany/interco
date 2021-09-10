<?php

namespace App\Repository;

use App\Entity\Tblstocks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tblstocks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tblstocks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tblstocks[]    findAll()
 * @method Tblstocks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblstocksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tblstocks::class);
    }

    // /**
    //  * @return Tblstocks[] Returns an array of Tblstocks objects
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
    public function findOneBySomeField($value): ?Tblstocks
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
