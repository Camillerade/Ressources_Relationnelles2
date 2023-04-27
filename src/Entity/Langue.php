<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Langue
 *
 * @ORM\Table(name="langue")
 * @ORM\Entity
 */
class Langue
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDLangue", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlangue;

    /**
     * @var string
     *
     * @ORM\Column(name="LibelleLangue", type="string", length=255, nullable=false)
     */
    private $libellelangue;

/**
 * Get the value of libellelangue
 *
 * @return string
 */

 public function getlibellelangue()
 {
     return $this->libellelangue;
 }
 
 /**
  * Set the value of libellelangue
  *
  * @param string $libellelangue
  *
  * @return self
  */
 public function setlibellelangue($libellelangue)
 {
     $this->libellelangue= $libellelangue;
 
     return $this;
 }
}
