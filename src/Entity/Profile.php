<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\TimestampTrait;
use App\Repository\ProfileRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ProfileRepository::class)]
#[ORM\Table(name: 'profile')]
#[ORM\HasLifecycleCallbacks]
class Profile
{

    use TimestampTrait;

    public function __toString()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }
    
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

    #[ORM\Column(type: Types::TEXT)]
    private ?string $AboutMe = null;

    #[ORM\Column(length: 255)]
    private ?string $LookFor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Sex = null;

    #[ORM\Column(length: 255)]
    private ?string $Lang = null;

    #[ORM\Column(nullable: true)]
    private ?array $Pictures = null;

    #[ORM\ManyToOne(inversedBy: 'profiles')]
    private ?User $User = null;

    #[ORM\ManyToOne(inversedBy: 'profiles')]
    private ?Familly $Familly = null;

    #[ORM\OneToMany(mappedBy: 'profile', targetEntity: Children::class)]
    private Collection $Children;

    #[ORM\ManyToOne(inversedBy: 'profiles')]
    private ?Eyes $Eyes = null;

    #[ORM\ManyToOne(inversedBy: 'profiles')]
    private ?Hair $Hair = null;

    #[ORM\ManyToOne(inversedBy: 'profiles')]
    private ?Education $Education = null;

    #[ORM\Column(length: 255)]
    private ?string $Reference = null;

    #[ORM\Column(length: 255)]
    private ?string $Slug = null;

    public function __construct()
    {
        $this->Children = new ArrayCollection();
    }

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

    public function getSex(): ?string
    {
        return $this->Sex;
    }

    public function setSex(?string $Sex): static
    {
        $this->Sex = $Sex;

        return $this;
    }

    public function getLang(): ?string
    {
        return $this->Lang;
    }

    public function setLang(string $Lang): static
    {
        $this->Lang = $Lang;

        return $this;
    }

    public function getPictures(): ?array
    {
        return $this->Pictures;
    }

    public function setPictures(?array $Pictures): static
    {
        $this->Pictures = $Pictures;

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

    public function getFamilly(): ?Familly
    {
        return $this->Familly;
    }

    public function setFamilly(?Familly $Familly): static
    {
        $this->Familly = $Familly;

        return $this;
    }

    /**
     * @return Collection<int, Children>
     */
    public function getChildren(): Collection
    {
        return $this->Children;
    }

    public function addChild(Children $child): static
    {
        if (!$this->Children->contains($child)) {
            $this->Children->add($child);
            $child->setProfile($this);
        }

        return $this;
    }

    public function removeChild(Children $child): static
    {
        if ($this->Children->removeElement($child)) {
            // set the owning side to null (unless already changed)
            if ($child->getProfile() === $this) {
                $child->setProfile(null);
            }
        }

        return $this;
    }

    public function getEyes(): ?Eyes
    {
        return $this->Eyes;
    }

    public function setEyes(?Eyes $Eyes): static
    {
        $this->Eyes = $Eyes;

        return $this;
    }

    public function getHair(): ?Hair
    {
        return $this->Hair;
    }

    public function setHair(?Hair $Hair): static
    {
        $this->Hair = $Hair;

        return $this;
    }

    public function getEducation(): ?Education
    {
        return $this->Education;
    }

    public function setEducation(?Education $Education): static
    {
        $this->Education = $Education;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->Reference;
    }

    public function setReference(string $Reference): static
    {
        $this->Reference = $Reference;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->Slug;
    }

    public function setSlug(string $Slug): static
    {
        $this->Slug = $Slug;

        return $this;
    }
}
