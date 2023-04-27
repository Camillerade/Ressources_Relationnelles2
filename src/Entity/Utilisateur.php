<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur", indexes={@ORM\Index(name="TypeUser", 
 * columns={"TypeUser"}), @ORM\Index(name="IDGENRE", columns={"GenreUser"}), 
 * @ORM\Index(name="Langue", columns={"LangueUser"})})
 * @ORM\Entity
 */

#[UniqueEntity(fields: ['mailuser'], message: 'There is already an account with this mailuser')]
class Utilisateur  implements UserInterface,PasswordAuthenticatedUserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="MotDePasseUser", type="string", length=255, nullable=false)
     */
    private $motdepasseuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateNaissUser", type="date", nullable=false)
     */
    private $datenaissuser;

    /**
     * @var string
     *
     * @ORM\Column(name="nomuser", type="string", length=255, nullable=false)
     */
    private $nomuser;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomuser", type="string", length=255, nullable=false)
     */
    private $prenomuser;

    /**
     * @var bool
     *
     * @ORM\Column(name="ValidationRGPD", type="boolean", nullable=false)
     */
    private $validationrgpd;

    /**
     * @var string
     *
     * @ORM\Column(name="Roleuser", type="string", length=255, nullable=true)
     */
    private $roleuser;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DateDerniereCoUser", type="date", nullable=true)
     */
    private $datedernierecouser;

    /**
     * @var string
     *
     * @ORM\Column(name="mailuser", type="string", length=255, nullable=false)
     */
    private $mailuser;

    /**
     * @var \Typeutilisateur
     *
     * @ORM\ManyToOne(targetEntity="Typeutilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="TypeUser", referencedColumnName="IDTypeUser")
     * })
     */
    private $typeuser; 

    /**
     * @var \Genre
     *
     * @ORM\ManyToOne(targetEntity="Genre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="GenreUser", referencedColumnName="IDGenre")
     * })
     */
    private $genreuser;

    /**
     * @var \Langue
     *
     * @ORM\ManyToOne(targetEntity="Langue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="LangueUser", referencedColumnName="IDLangue")
     * })
     */
    private $langueuser;

    private $isVerified = false;

    public function getRoles(): array
    {
        
        // Retourner un tableau de rôles pour cet utilisateur
        return ['ROLE_USER'];
    }
    public function setRoles()
    {
        $this->roleuser = 'ROLE_USER';
        return $this;
    }
    public function getIdUser(): ?int
    {
        return $this->iduser;
    }
    public function getNomuser(): ?string
{
    return $this->nomuser;
}
    public function setNomuser(string $nomuser)
    {
        $this->nomuser = $nomuser;

        return $this;
    }
/**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->motdepasseuser;
    }
    public function getUserIdentifier() :string
    {
        return $this->mailuser;
    }


    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
 
    public function getDateNaissUser(): ?\DateTimeInterface
    {
        return $this->datenaissuser;
    }

    public function setDateNaissUser(\DateTimeInterface $datenaissuser): self
    {
        $this->datenaissuser = $datenaissuser;

        return $this;
    }

    public function getPrenomUser(): ?string
    {
        return $this->prenomuser;
    }

    public function setPrenomUser(string $prenomuser): self
    {
        $this->prenomuser = $prenomuser;

        return $this;
    }

    public function getValidationRGPD(): ?bool
    {
        return $this->validationrgpd;
    }

    public function setValidationRGPD(bool $validationrgpd): self
    {
        $this->validationrgpd = $validationrgpd;

        return $this;
    }

    public function getDateDerniereCoUser(): ?\DateTimeInterface
    {
        return $this->datedernierecouser;
    }

    public function setDateDerniereCoUser(?\DateTimeInterface $datedernierecouser): self
    {
        $this->datedernierecouser = $datedernierecouser;

        return $this;
    }
    public function getLangueUser()
    {
        $this->langueuser;

        return $this;
    }
    public function setLangueUser($langueuser)
    {
        $this->langueuser = $langueuser;

        return $this;
    }
 
    public function setMailUser(string $mailuser): self
    {
        $this->mailuser = $mailuser;

        return $this;
    }
   
    public function getGenreuser()
    {
        return $this->genreuser;
    }
    public function setGenreuser(string $genreuser)
    {
        $this->genreuser = $genreuser;

        return $this;
    }
    public function getTypeuser()
    {
        return $this->typeuser;
    }
    public function setTypeuser(string $typeuser)
    {
        $this->typeuser = $typeuser;

        return $this;
    }
    public function setPassword(string $motdepasseuser)
    {
        $this->motdepasseuser = $motdepasseuser;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }
}
