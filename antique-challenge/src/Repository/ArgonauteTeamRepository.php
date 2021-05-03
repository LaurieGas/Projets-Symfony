<?php

namespace App\Repository;

use App\Entity\ArgonauteTeam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArgonauteTeam|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArgonauteTeam|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArgonauteTeam[]    findAll()
 * @method ArgonauteTeam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArgonauteTeamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArgonauteTeam::class);
    }

    // /**
    //  * @return ArgonauteTeam[] Returns an array of ArgonauteTeam objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArgonauteTeam
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
