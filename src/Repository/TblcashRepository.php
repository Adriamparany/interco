<?php

namespace App\Repository;

use App\Entity\Tblcash;
use App\Entity\Tblstocks;
use App\Entity\Tblcreances;
use App\Entity\Tblstocksuv;
use App\Entity\Tblgestionbur;
use App\Entity\Tblcashaccount;
use App\Entity\Tblcreancesccp;
use App\Entity\Tblcreancesspec;
use App\Entity\Tblcreancescolis;
use App\Entity\Tblcreancesspecavance;
use App\Entity\Tblcreancesspecccppers;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method  App\Entity\Tblcash|null find($id, $lockMode = null, $lockVersion = null)
 * @method  App\Entity\Tblcash|null findOneBy(array $criteria, array $orderBy = null)
 * @method  App\Entity\Tblcash[]    findAll()
 * @method  App\Entity\Tblcash[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class  TblcashRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry,  Tblcash::class);
    }

    // /**
    //  * @return  Tblcash[] Returns an array of  Tblcash objects
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
    public function findOneBySomeField($value): ? Tblcash
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findAccountingSituationForOnecodique($codique, $date, $em=null)
    {
        $dql = "
        SELECT 
        cash.dateoperation date
        ,
        (SELECT gest1.reservenum from App\Entity\Tblgestionbur gest1
        WHERE gest1.ncodique = $codique
        and gest1.datedebgest = (SELECT MAX(gest2.datedebgest) FROM App\Entity\Tblgestionbur gest2 WHERE gest2.ncodique = $codique)
        ) MA
        ,
        cash.stival numeraire      
        ,
        (SELECT sum(ccp1.stival) from   App\Entity\Tblcreancesccp ccp1 
        WHERE ccp1.codique= $codique
        and ccp1.dateoperation = '$date'
        and ccp1.isholder=1) solde_crediteur_ccp
        ,
        (SELECT sum(ccp2.stival) from   App\Entity\Tblcreancesccp ccp2 
        WHERE ccp2.codique= $codique
        and ccp2.dateoperation = '$date'
        and ccp2.isholder=2) cheque_ccp_en_instance_de_reglement
        ,
        (SELECT 
            sum(c1.stival)
        FROM   App\Entity\Tblcashaccount c1
        WHERE c1.codique= $codique
        and c1.dateoperation = '$date') cheque_bancaire_en_instance_de_reglement
        ,
        (SELECT 
            sum(c2.stival)
        FROM     App\Entity\Tblcreancesspecccppers c2
        WHERE c2.codique= $codique
        and c2.dateoperation = '$date') Cheque_ccp_du_personnel
        ,
        (SELECT 
             c3.stiqte
        FROM    App\Entity\Tblstocksuv c3
        WHERE c3.codique= $codique
        and c3.dateoperation = '$date'
        and  c3.idmenu=3773) UV_Mvola
        ,
        (SELECT 
             c4.stiqte
        FROM    App\Entity\Tblstocksuv c4
        WHERE c4.codique= $codique
        and c4.dateoperation = '$date'
        and  c4.idmenu=3782) UV_Orange_Money
        ,
        (SELECT 
             c5.stiqte
        FROM    App\Entity\Tblstocksuv c5
        WHERE c5.codique= $codique
        and c5.dateoperation = '$date'
        and  c5.idmenu=3791) UV_Airtel_Money
        ,
        (SELECT 
             c6.stiqte
        FROM    App\Entity\Tblstocksuv c6
        WHERE c6.codique= $codique
        and c6.dateoperation = '$date'
        and  c6.idmenu=4400) UV_Paositra_Money
        ,
        (SELECT 
            sum(c7.stiqte)
        FROM    App\Entity\Tblstocksuv c7
        WHERE c7.codique= $codique
        and c7.dateoperation = '$date') Total_UV
        ,
        (SELECT 
            sum(c8.stival)
        FROM   App\Entity\Tblstocks c8
        WHERE c8.codique= $codique
        and c8.dateoperation = '$date') Valeurs_postales
        ,
        (SELECT 
            sum(c9.stival)
        FROM    App\Entity\Tblcreancesspec c9
        WHERE c9.codique= $codique
        and c9.dateoperation = '$date') Avances_autorisees
        ,
        (SELECT 
            sum(c10.stival)
        FROM   App\Entity\Tblcreances c10
        WHERE c10.codique= $codique
        and c10.dateoperation = '$date') Creances_sur_vente
        ,
        (SELECT 
            sum(c11.stival)
        FROM   App\Entity\Tblcreancescolis c11
        WHERE c11.codique= $codique
        and c11.dateoperation = '$date') Colis_Postaux
        ,
        (SELECT 
            sum(c12.stival)
        FROM     App\Entity\Tblcreancesspecavance c12
        WHERE c12.codique= $codique
        and c12.dateoperation = '$date') Avances_speciales

        FROM    App\Entity\Tblcash cash
        WHERE cash.codique= $codique
        and cash.dateoperation = '$date'
        ";
        
        if(!isset($em)){
            $em=$this->getEntityManager();
        }
        $query = $em->createQuery($dql);
        return $query->execute();
    }

    public function findNumeraireByDateForOneCodique($codique, $date, $em=null)
    {
        $dql = "
        SELECT 
        cash.stival numeraire        

        FROM    App\Entity\Tblcash cash
        WHERE cash.codique= $codique
        and cash.dateoperation = '$date'
        ";
        
        if(!isset($em)){
            $em=$this->getEntityManager();
        }
        $query = $em->createQuery($dql);
        return $query->execute();
    }
}
