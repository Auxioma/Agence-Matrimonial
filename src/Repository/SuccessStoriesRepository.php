<?php

namespace App\Repository;

use App\Entity\SuccessStories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SuccessStories>
 *
 * @method SuccessStories|null find($id, $lockMode = null, $lockVersion = null)
 * @method SuccessStories|null findOneBy(array $criteria, array $orderBy = null)
 * @method SuccessStories[]    findAll()
 * @method SuccessStories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuccessStoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SuccessStories::class);
    }

//    /**
//     * @return SuccessStories[] Returns an array of SuccessStories objects
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

//    public function findOneBySomeField($value): ?SuccessStories
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
