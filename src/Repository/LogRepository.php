<?php

namespace App\Repository;

use App\Entity\Log;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Log|null find($id, $lockMode = null, $lockVersion = null)
 * @method Log|null findOneBy(array $criteria, array $orderBy = null)
 * @method Log[]    findAll()
 * @method Log[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Log::class);
    }

    // /**
    //  * @return Log[] Returns an array of Log objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Log
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findAllLastLogForEachUsername()
    {
        $entityManager = $this->getEntityManager();
        $dql = "SELECT distinct log1.username, log1.datelog, log1.logtype, log1.id from App\Entity\Log log1 WHERE
        log1.id IN (SELECT MAX(log2.id) idm FROM App\Entity\Log log2 WHERE log2.logtype='login' and log2.username<>'dg' GROUP BY log2.username)";

        $query = $entityManager->createQuery($dql);
        return $query->execute();
    }

    public function findByUsername($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.username = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'DESC')
            ->setMaxResults(15)
            ->getQuery()
            ->getResult()
        ;
    }
}
