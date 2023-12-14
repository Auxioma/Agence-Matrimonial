<?php

namespace App\Entity;

use App\Repository\ProfileRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfileRepository::class)]
class Profile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $FirstName = null;

    #[ORM\Column(length: 255)]
    private ?string $LastName = null;

    #[ORM\Column(length: 255)]
    private ?string $Country = null;

    #[ORM\Column(length: 255)]
    private ?string $City = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Birthday = null;

    #[ORM\Column(length: 20)]
    private ?string $PhoneNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $Job = null;

    #[ORM\Column(length: 3)]
    private ?string $Size = null;

    #[ORM\Column(length: 3)]
    private ?string $Weight = null;

    #[ORM\Column(length: 255)]
    private ?string $FamilyStatus = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $AboutMe = null;

    #[ORM\Column(length: 255)]
    private ?string $LookFor = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $BoyPicture = null;

    #[ORM\OneToOne(inversedBy: 'profile', cascade: ['persist', 'remove'])]
    private ?User $User = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): static
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): static
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(string $Country): static
    {
        $this->Country = $Country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): static
    {
        $this->City = $City;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->Birthday;
    }

    public function setBirthday(\DateTimeInterface $Birthday): static
    {
        $this->Birthday = $Birthday;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->PhoneNumber;
    }

    public function setPhoneNumber(string $PhoneNumber): static
    {
        $this->PhoneNumber = $PhoneNumber;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->Job;
    }

    public function setJob(string $Job): static
    {
        $this->Job = $Job;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->Size;
    }

    public function setSize(string $Size): static
    {
        $this->Size = $Size;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->Weight;
    }

    public function setWeight(string $Weight): static
    {
        $this->Weight = $Weight;

        return $this;
    }

    public function getFamilyStatus(): ?string
    {
        return $this->FamilyStatus;
    }

    public function setFamilyStatus(string $FamilyStatus): static
    {
        $this->FamilyStatus = $FamilyStatus;

        return $this;
    }

    public function getAboutMe(): ?string
    {
        return $this->AboutMe;
    }

    public function setAboutMe(string $AboutMe): static
    {
        $this->AboutMe = $AboutMe;

        return $this;
    }

    public function getLookFor(): ?string
    {
        return $this->LookFor;
    }

    public function setLookFor(string $LookFor): static
    {
        $this->LookFor = $LookFor;

        return $this;
    }

    public function getBoyPicture(): ?array
    {
        return $this->BoyPicture;
    }

    public function setBoyPicture(?array $BoyPicture): static
    {
        $this->BoyPicture = $BoyPicture;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }
}
