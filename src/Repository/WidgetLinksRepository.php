<?php

namespace App\Repository;

use App\Entity\WidgetLinks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WidgetLinks>
 *
 * @method WidgetLinks|null find($id, $lockMode = null, $lockVersion = null)
 * @method WidgetLinks|null findOneBy(array $criteria, array $orderBy = null)
 * @method WidgetLinks[]    findAll()
 * @method WidgetLinks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WidgetLinksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WidgetLinks::class);
    }

//    /**
//     * @return WidgetLinks[] Returns an array of WidgetLinks objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?WidgetLinks
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
