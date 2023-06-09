<?php

namespace App\Repository;

use App\Entity\Categorieressource;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Categorieressource>
 *
 * @method Categorieressource|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categorieressource|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categorieressource[]    findAll()
 * @method Categorieressource[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieResRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorieressource::class);
    }

    public function save(Categorieressource $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Categorieressource $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


}
