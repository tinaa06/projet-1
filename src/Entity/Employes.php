<?php

namespace App\Entity;


use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EmployesRepository;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: EmployesRepository::class)]
class Employes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:4, max:255, minMessage: "pas assez de caractères. il faut au moins {{ limit }} caractères")]
    #[Assert\NotBlank(message : "Ce champ ne doit pas etre vide")]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:4, max:255, minMessage: "pas assez de caractères. il faut au moins {{ limit }} caractères")]
    #[Assert\NotBlank(message : "Ce champ ne doit pas etre vide")]
    private ?string $nom = null;

    #[ORM\Column]
    #[Assert\Length(min:10, max:255, minMessage: "pas assez de chiffre. il faut au moins {{ limit }} chiffre")]
    #[Assert\NotBlank(message : "Ce champ ne doit pas etre vide")]
    private ?int $telephone = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email(message: "Email non valid.")]
    #[Assert\NotBlank(message : "Ce champ ne doit pas etre vide")]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:6, max:255, minMessage: "pas assez de caractères. il faut au moins {{ limit }} caractères")]
    #[Assert\NotBlank(message : "Ce champ ne doit pas etre vide")]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:5, max:255, minMessage: "pas assez de caractères. il faut au moins {{ limit }} caractères")]
    #[Assert\NotBlank(message : "Ce champ ne doit pas etre vide")]
    private ?string $poste = null;

    #[ORM\Column]
    #[Assert\Type("float")]
    #[Assert\NotBlank(message : "Ce champ ne doit pas etre vide")]
    private ?float $salaire = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
   
    private ?\DateTimeInterface $datedenaissance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getSalaire(): ?float
    {
        return $this->salaire;
    }

    public function setSalaire(float $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getDatedenaissance(): ?\DateTimeInterface
    {
        return $this->datedenaissance;
    }

    public function setDatedenaissance(\DateTimeInterface $datedenaissance): self
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }
}
