<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\TimestampTrait;
use App\Repository\ArticlesBlogRepository;

#[ORM\Entity(repositoryClass: ArticlesBlogRepository::class)]
#[ORM\Table(name: 'articles_blog')]
#[ORM\HasLifecycleCallbacks]
class ArticlesBlog
{
    use TimestampTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    #[ORM\Column(length: 255)]
    private ?string $Slug = null;

    #[ORM\ManyToOne(inversedBy: 'articlesBlogs')]
    private ?CategoryBlog $Category = null;

    #[ORM\Column(length: 255)]
    private ?string $Picture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

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

    public function getCategory(): ?CategoryBlog
    {
        return $this->Category;
    }

    public function setCategory(?CategoryBlog $Category): static
    {
        $this->Category = $Category;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->Picture;
    }

    public function setPicture(string $Picture): static
    {
        $this->Picture = $Picture;

        return $this;
    }
}
