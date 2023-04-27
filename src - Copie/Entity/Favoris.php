<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favoris
 *
 * @ORM\Table(name="Favoris")
 * @ORM\Entity(repositoryClass="App\Repository\FavorisRepository") 
 */
class Favoris
{

    /**
     * @var \Utilisateur
      *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\Id
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDUser", referencedColumnName="IDUser")
     * })
     */
    private $IDuser;

  /**
     * @var \Ressource
       *
     * @ORM\ManyToOne(targetEntity="Ressource")
     * @ORM\Id
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDRessource", referencedColumnName="IDRessource")
     * })
     */
    private $IDressource;

 

    public function getIDuser()
    {
        return $this->IDuser;
    }

    public function setIDuser(?Utilisateur $IDuser): self
    {
        $this->IDuser = $IDuser;

        return $this;
    }

    public function getIDressource()
    {
        return $this->IDressource;
    }

    public function setIDressource(?Ressource $IDressource): self
    {
        $this->IDressource = $IDressource;

        return $this;
    }



}
