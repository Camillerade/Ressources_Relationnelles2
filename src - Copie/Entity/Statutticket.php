<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statutticket
 *
 * @ORM\Table(name="statutticket")
 * @ORM\Entity
 */
class Statutticket
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDStatutTicket", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idstatutticket;

    /**
     * @var string
     *
     * @ORM\Column(name="LibelleStatuTicket", type="string", length=255, nullable=false)
     */
    private $libellestatuticket;


}
