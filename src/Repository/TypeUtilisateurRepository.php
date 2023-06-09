<?php

namespace App\Repository;

use App\Entity\Typeutilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Typeutilisateur>
 *
 * @method Typeutilisateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typeutilisateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typeutilisateur[]    findAll()
 * @method Typeutilisateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeUtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typeutilisateur::class);
    }

    public function save(Typeutilisateur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Typeutilisateur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

}
