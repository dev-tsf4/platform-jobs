<?php

namespace App\Repository;

use App\Entity\Job;
use App\Search\SearchParametersFilter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Job|null find($id, $lockMode = null, $lockVersion = null)
 * @method Job|null findOneBy(array $criteria, array $orderBy = null)
 * @method Job[]    findAll()
 * @method Job[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Job::class);
    }

    public function searchJobsByFilter(SearchParametersFilter $search)
    {
        $qb = $this->createQueryBuilder('j');

        if (!empty($query = $search->getQuery())) {
            $qb->andWhere('j.title like :query');
            $qb->setParameter('query', '%' . $query . '%');
        }

        if (!empty($contracts = $search->getContract())) {
            $qb->andWhere('j.contract IN (:contracts)');
            $qb->setParameter('contracts', $contracts);
        }

        if (!empty($issueDate = $search->getIssueDate())) {
            $qb->andWhere('j.publishedAt >= :issueDate');
            $qb->setParameter('issueDate', $issueDate);
        }

        return $qb->andWhere('j.published = :published')
                  ->setParameter('published', true)
                  ->orderBy('j.createdAt', 'DESC')
                  ->getQuery()
                  ->getResult();
    }

    // /**
    //  * @return Job[] Returns an array of Job objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Job
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
