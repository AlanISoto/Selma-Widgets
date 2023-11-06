<?php

namespace App\Repository;

use App\Entity\IntakeSysuser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IntakeSysuser>
 *
 * @method IntakeSysuser|null find($id, $lockMode = null, $lockVersion = null)
 * @method IntakeSysuser|null findOneBy(array $criteria, array $orderBy = null)
 * @method IntakeSysuser[]    findAll()
 * @method IntakeSysuser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IntakeSysuserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IntakeSysuser::class);
    }

//    /**
//     * @return IntakeSysuser[] Returns an array of IntakeSysuser objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?IntakeSysuser
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
