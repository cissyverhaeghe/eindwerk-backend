<?php

namespace App\Repository;

use App\Entity\Adoptionrequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Adoptionrequest>
 *
 * @method Adoptionrequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method Adoptionrequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method Adoptionrequest[]    findAll()
 * @method Adoptionrequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdoptionrequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Adoptionrequest::class);
    }

    public function add(Adoptionrequest $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Adoptionrequest $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Adoptionrequest[] Returns an array of Adoptionrequest objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Adoptionrequest
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
