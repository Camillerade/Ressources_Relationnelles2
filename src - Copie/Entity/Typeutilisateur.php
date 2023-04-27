<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typeutilisateur
 *
 * @ORM\Table(name="typeutilisateur")
 * @ORM\Entity
 */
class Typeutilisateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDTypeUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtypeuser;

    /**
     * @var string
     *
     * @ORM\Column(name="LibelleType", type="string", length=255, nullable=false)
     */
    private $libelletype;


}
