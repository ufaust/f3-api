<?php

namespace App\Repository;

use App\Entity\FamilyTree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FamilyTree>
 *
 * @method FamilyTree|null find($id, $lockMode = null, $lockVersion = null)
 * @method FamilyTree|null findOneBy(array $criteria, array $orderBy = null)
 * @method FamilyTree[]    findAll()
 * @method FamilyTree[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FamilyTreeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FamilyTree::class);
    }

//    /**
//     * @return FamilyTree[] Returns an array of FamilyTree objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FamilyTree
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
