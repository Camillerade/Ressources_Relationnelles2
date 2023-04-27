<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relation
 *
 * @ORM\Table(name="relation", indexes={@ORM\Index(name="typerelation", columns={"TypeRelation"}), @ORM\Index(name="ForeignKeyRelUser2", columns={"IDUser"}), @ORM\Index(name="IDX_6289474966E60CFF", columns={"IDUserRel"})})
 * @ORM\Entity
 */
class Relation
{
    /**
     * @var \Typerelation
     *
     * @ORM\ManyToOne(targetEntity="Typerelation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="TypeRelation", referencedColumnName="IDTypeRelation")
     * })
     */
    private $typerelation;

    /**
     * @var \Utilisateur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDUserRel", referencedColumnName="IDUser")
     * })
     */
    private $iduserrel;

    /**
     * @var \Utilisateur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDUser", referencedColumnName="IDUser")
     * })
     */
    private $iduser;


}
