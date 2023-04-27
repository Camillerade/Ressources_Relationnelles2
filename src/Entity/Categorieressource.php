<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorieressource
 *
 * @ORM\Table(name="categorieressource")
 * @ORM\Entity
 */
class Categorieressource
{
   

    /**
     * @var string
     *
     * @ORM\Column(name="LibelleCategorie", type="string", length=255, nullable=false)
     */
    private $libellecategorie;

/**
 * Get the value of libellecategorie
 *
 * @return string
 */

 public function getlibellecategorie()
 {
     return $this->libellecategorie;
 }
 
 /**
  * Set the value of libellecategorie
  *
  * @param string $libellecategorie
  *
  * @return self
  */
 public function setlibellecategorie($libellecategorie)
 {
     $this->libellecategorie= $libellecategorie;
 
     return $this;
 }
}
