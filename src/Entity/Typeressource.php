<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typeressource
 *
 * @ORM\Table(name="typeressource")
 * @ORM\Entity
 */
class Typeressource
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDTypeRessource", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtyperessource;

    /**
     * @var string
     *
     * @ORM\Column(name="LibelleTypeRessource", type="string", length=255, nullable=false)
     */
    private $libelletyperessource;

/**
 * Get the value oflibelletyperessource
 *
 * @return string
 */

 public function getlibelletyperessource()
 {
     return $this->libelletyperessource;
 }
 
 /**
  * Set the value of libelletyperessource
  *
  * @param string $libelletyperessource
  *
  * @return self
  */
 public function setlibelletyperessource($libelletyperessource)
 {
     $this->libelletyperessource= $libelletyperessource;
 
     return $this;
 }
}
