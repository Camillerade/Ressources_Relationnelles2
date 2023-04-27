<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typerelation
 *
 * @ORM\Table(name="typerelation")
 * @ORM\Entity
 */
class Typerelation
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDTypeRelation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtyperelation;

    /**
     * @var string
     *
     * @ORM\Column(name="LibelleTypeRelation", type="string", length=255, nullable=false)
     */
    private $libelletyperelation;


}
