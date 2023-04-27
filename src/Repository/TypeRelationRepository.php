<?php

namespace App\Repository;

use App\Entity\Typerelation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Typerelation>
 *
 * @method Typerelation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typerelation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typerelation[]    findAll()
 * @method Typerelation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeRelationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typerelation::class);
    }

    public function save(Typerelation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Typerelation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


}
