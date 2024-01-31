<?php

namespace App\Repository;

use App\Entity\TestResult;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TestResult>
 *
 * @method TestResult|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestResult|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestResult[]    findAll()
 * @method TestResult[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestResultRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TestResult::class);
    }
}
