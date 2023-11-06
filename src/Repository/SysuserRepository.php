<?php

namespace App\Repository;

use App\Entity\Sysuser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Sysuser>
 *
 * @method Sysuser|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sysuser|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sysuser[]    findAll()
 * @method Sysuser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SysuserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sysuser::class);
    }

//    /**
//     * @return Sysuser[] Returns an array of Sysuser objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Sysuser
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
