<?php

namespace App\Repository;

use App\Entity\CategoryBlog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoryBlog>
 *
 * @method CategoryBlog|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryBlog|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryBlog[]    findAll()
 * @method CategoryBlog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryBlogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryBlog::class);
    }

//    /**
//     * @return CategoryBlog[] Returns an array of CategoryBlog objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CategoryBlog
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
