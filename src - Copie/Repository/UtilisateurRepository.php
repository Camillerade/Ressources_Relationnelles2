<?php
// src/Repository/UtilisateurRepository.php

namespace App\Repository;

use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisateur::class);
    }

    /**
     * Récupère un utilisateur par son adresse email.
     *
     * @param string $email
     * @return Utilisateur
     */
    public function findOneByEmail(string $email): Utilisateur
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.mailuser = :mailuser')
            ->setParameter('mailuser', $email)
            ->getQuery()
            ->getOneOrNullResult();
    }
    public function findRolesByUserId(int $userId): array
    {
  
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT roleuser
            FROM utilisateur
            WHERE iduser = :id
        ';
        $stmt = $conn->executeQuery($sql, ['id' => $userId]);

        // fetchColumn() returns the first column of the next row
        $roles = $stmt->fetchColumn();

        return [$roles];
    }

    // Ajoutez d'autres méthodes personnalisées ici si nécessaire
}