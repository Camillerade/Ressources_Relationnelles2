<?php

namespace App\Repository;

use App\Entity\Statutticket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Statutticket>
 *
 * @method Statutticket|null find($id, $lockMode = null, $lockVersion = null)
 * @method Statutticket|null findOneBy(array $criteria, array $orderBy = null)
 * @method Statutticket[]    findAll()
 * @method Statutticket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatutTicketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Statutticket::class);
    }

    public function save(Statutticket $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Statutticket $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


}
