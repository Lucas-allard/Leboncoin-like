<?php

namespace App\Repository;

use App\Entity\Ads;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ads>
 *
 * @method Ads|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ads|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ads[]    findAll()
 * @method Ads[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ads::class);
    }

    public function add(Ads $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Ads $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getTopCategories(): array
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT
                a,
                c.name,
                count(a.category) AS number,
                f.path
            FROM
                App\Entity\Ads a, App\Entity\Categories c, App\Entity\Files f
            WHERE a.category = c.id
            AND c.id = f.category
            GROUP BY
                a.category
            ORDER BY number
            DESC'
        )->setMaxResults(6);

        $topCategories = $query->getResult();

        return $topCategories;
    }

    // public function getTopCategories(): array
    // {
    //     return $this->createQueryBuilder('ads')
    //         ->select('count(ads.category) as number', 'ads.category', 'categories.name')
    //         ->from(Ads::class, 'a')
    //         ->join('ads.category', 'c')
    //         ->groupBy('ads.category')
    //         ->orderBy('number')
    //         ->getQuery()
    //         ->getResult();
    // }

    //    /**
    //     * @return Ads[] Returns an array of Ads objects
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

    //    public function findOneBySomeField($value): ?Ads
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
