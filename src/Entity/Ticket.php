<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket", indexes={@ORM\Index(name="StatutTicket", columns={"StatutTicket"}), @ORM\Index(name="IDUserTicket", columns={"IDUserTicket"})})
 * @ORM\Entity
 */
class Ticket
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDTicket", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idticket;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HeureTicket", type="time", nullable=false)
     */
    private $heureticket;

    /**
     * @var string
     *
     * @ORM\Column(name="ContenuTicket", type="string", length=255, nullable=false)
     */
    private $contenuticket;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDUserTicket", referencedColumnName="IDUser")
     * })
     */
    private $iduserticket;

    /**
     * @var \Statutticket
     *
     * @ORM\ManyToOne(targetEntity="Statutticket")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="StatutTicket", referencedColumnName="IDStatutTicket")
     * })
     */
    private $statutticket;


}
