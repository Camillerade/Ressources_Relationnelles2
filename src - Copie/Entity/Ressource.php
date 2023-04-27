<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ressource
 *
 * @ORM\Table(name="ressource", indexes={@ORM\Index(name="CategorieRessource", columns={"CategorieRessource"}), @ORM\Index(name="typeResssource", columns={"TypeRessource"}), @ORM\Index(name="LangueRessource", columns={"LangueRessource"}), @ORM\Index(name="Iduser", columns={"IDUserRessource"})})
 * @ORM\Entity
 */
class Ressource
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDRessource", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idressource;

    /**
     * @var string
     *
     * @ORM\Column(name="titreressource", type="string", length=255, nullable=false)
     */
    private $titreressource;

    /**
     * @var string
     *
     * @ORM\Column(name="DescriptionRessource", type="string", length=255, nullable=false)
     */
    private $descriptionressource;

    /**
     * @var string|null
     *
     * @ORM\Column(name="FichierRessource", type="string", length=255, nullable=true)
     */
    private $fichierressource;

    /**
     * @var \Langue
     *
     * @ORM\ManyToOne(targetEntity="Langue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="LangueRessource", referencedColumnName="IDLangue")
     * })
     */
    private $langueressource;

    /**
     * @var \Categorieressource
     *
     * @ORM\ManyToOne(targetEntity="Categorieressource")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CategorieRessource", referencedColumnName="IDCategorieRessource")
     * })
     */
    private $categorieressource;

    /**
     * @var \Typeressource
     *
     * @ORM\ManyToOne(targetEntity="Typeressource")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="TypeRessource", referencedColumnName="IDTypeRessource")
     * })
     */
    private $typeressource;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDUserRessource", referencedColumnName="IDUser")
     * })
     */
    private $iduserressource;

    /**
 * Get the value of titreressource
 *
 * @return string
 */
public function getidressource()
{
    return $this->idressource;
}

    /**
 * Get the value of titreressource
 *
 * @return string
 */
public function getTitreressource()
{
    return $this->titreressource;
}
    /**
 * Get the value of iduserressource
 *
 * @return string
 */
public function getiduserressource()
{
    return $this->iduserressource;
}

/**
 * Set the value of iduserressource
 *
 * @param string $iduserressource
 *
 * @return self
 */
public function setiduserressource($iduserressource)
{
    $this->iduserressource= $iduserressource;

    return $this;
}

/**
 * Set the value of titreressource
 *
 * @param string $titreressource
 *
 * @return self
 */
public function setTitreressource($titreressource)
{
    $this->titreressource = $titreressource;

    return $this;
}

/**
 * Get the value of fichierressource
 *
 * @return string
 */
public function getfichierressource()
{
    return $this->fichierressource;
}

/**
 * Set the value of fichierressource
 *
 * @param string $fichierressource
 *
 * @return self
 */
public function setfichierressource($fichierressource)
{
    $this->fichierressource = $fichierressource;

    return $this;
}

/**
 * Get the value of descriptionressource
 *
 * @return string
 */
public function getdescriptionressource()
{
    return $this->descriptionressource;
}

/**
 * Set the value of descriptionressource
 *
 * @param string $descriptionressource
 *
 * @return self
 */
public function setdescriptionressource($descriptionressource)
{
    $this->descriptionressource = $descriptionressource;

    return $this;
}

/**
 * Get the value of langueressource
 *
 * @return string
 */

public function getlangueressource()
{
    return $this->langueressource;
}

/**
 * Set the value of langueressource
 *
 * @param string $langueressource
 *
 * @return self
 */
public function setlangueressource($langueressource)
{
    $this->langueressource = $langueressource;

    return $this;
}


/**
 * Get the value of categorieressource
 *
 * @return string
 */

 public function getcategorieressource()
 {
     return $this->categorieressource;
 }
 
 /**
  * Set the value of categorieressource
  *
  * @param string $categorieressource
  *
  * @return self
  */
 public function setcategorieressource($categorieressource)
 {
     $this->categorieressource = $categorieressource;
 
     return $this;
 }

/**
 * Get the value of typeressource
 *
 * @return string
 */

 public function gettyperessource()
 {
     return $this->typeressource;
 }
 
 /**
  * Set the value of typeressource
  *
  * @param string $typeressource
  *
  * @return self
  */
 public function settyperessource($typeressource)
 {
     $this->typeressource = $typeressource;
 
     return $this;
 }
 public function findRessourcsByName(string $query)
 {
     $qb = $this->createQueryBuilder('r');
     $qb
         ->where(
             $qb->expr()->andX(
                 $qb->expr()->orX(
                     $qb->expr()->like('r.titreressource', ':query'),
                     $qb->expr()->like('r.descriptionressource', ':query'),
                 ),
                 $qb->expr()->isNotNull('r.created_at')
             )
         )
         ->setParameter('query', '%' . $query . '%')
     ;
     return $qb
         ->getQuery()
         ->getResult();
 }
 
}
