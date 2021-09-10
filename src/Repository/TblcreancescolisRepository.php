<?php

namespace App\Repository;

use App\Entity\Tblcreancescolis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tblcreancescolis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tblcreancescolis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tblcreancescolis[]    findAll()
 * @method Tblcreancescolis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblcreancescolisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tblcreancescolis::class);
    }

    // /**
    //  * @return Tblcreancescolis[] Returns an array of Tblcreancescolis objects
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
    public function findOneBySomeField($value): ?Tblcreancescolis
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
