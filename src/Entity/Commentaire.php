<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", indexes={@ORM\Index(name="IDUserCommentaire", columns={"IDUserCommentaire", "IDResCommentaire"})})
 * @ORM\Entity
 */
class Commentaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDCommentaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcommentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="ContenuCommentaire", type="string", length=255, nullable=false)
     */
    private $contenucommentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="HeureCommentaire", type="string", nullable=false)
     */
    private $heurecommentaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCommentaire", type="date", nullable=false)
     */
    private $datecommentaire;

    /**
     * @var int
     *
     * @ORM\Column(name="IDUserCommentaire", type="integer", nullable=false)
     */
    private $idusercommentaire;

    /**
     * @var int
     *
     * @ORM\Column(name="IDResCommentaire", type="integer", nullable=false)
     */
    private $idrescommentaire;


    public function getidusercommentaire()
    {
        return $this->idusercommentaire;
    }
    
    /**
     * Set the value ofidusercommentaire
     *
     * @param string $idusercommentaire
     *
     * @return self
     */
    public function setidusercommentaire($idusercommentaire)
    {
        $this->idusercommentaire= $idusercommentaire;
    
        return $this;
    }
    public function getcontenucommentaire()
    {
        return $this->contenucommentaire;
    }
    
    /**
     * Set the value of contenucommentaire
     *
     * @param string $contenucommentaire
     *
     * @return self
     */
    public function setcontenucommentaire($contenucommentaire)
    {
        $this->contenucommentaire= $contenucommentaire;
    
        return $this;
    }

    public function getidrescommentaire()
    {
        return $this->idrescommentaire;
    }
    
    /**
     * Set the value of contenucommentaire
     *
     * @param string $contenucommentaire
     *
     * @return self
     */
    public function setidrescommentaire($idrescommentaire)
    {
        $this->idrescommentaire= $idrescommentaire;
    
        return $this;
    }


    public function getdatecommentaire()
    {
        return $this->datecommentaire;
    }
    
    /**
     * Set the value of datecommentaire
     *
     * @param string $datecommentaire
     *
     * @return self
     */
    public function setdatecommentaire($datecommentaire)
    {
        $this->datecommentaire= $datecommentaire;
    
        return $this;
    }

    public function getheurecommentaire()
    {
        return $this->datecommentaire;
    }
    
    /**
     * Set the value of heurecommentaire
     *
     * @param string $heurecommentaire
     *
     * @return self
     */
    public function setheurecommentaire($heurecommentaire)
    {
        $this->heurecommentaire= $heurecommentaire;
    
        return $this;
    }
}
