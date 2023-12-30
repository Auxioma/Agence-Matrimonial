<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\TimestampTrait;
use App\Repository\CategoryBlogRepository;

#[ORM\Entity(repositoryClass: CategoryBlogRepository::class)]
#[ORM\Table(name: "category_blog")]
#[ORM\HasLifecycleCallbacks]
class CategoryBlog
{
    use TimestampTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Slug = null;

    #[ORM\Column(length: 255)]
    private ?string $Lang = null;

    #[ORM\OneToMany(mappedBy: 'Category', targetEntity: ArticlesBlog::class)]
    private Collection $articlesBlogs;

    public function __construct()
    {
        $this->articlesBlogs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

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

    public function getLang(): ?string
    {
        return $this->Lang;
    }

    public function setLang(string $Lang): static
    {
        $this->Lang = $Lang;

        return $this;
    }

    /**
     * @return Collection<int, ArticlesBlog>
     */
    public function getArticlesBlogs(): Collection
    {
        return $this->articlesBlogs;
    }

    public function addArticlesBlog(ArticlesBlog $articlesBlog): static
    {
        if (!$this->articlesBlogs->contains($articlesBlog)) {
            $this->articlesBlogs->add($articlesBlog);
            $articlesBlog->setCategory($this);
        }

        return $this;
    }

    public function removeArticlesBlog(ArticlesBlog $articlesBlog): static
    {
        if ($this->articlesBlogs->removeElement($articlesBlog)) {
            // set the owning side to null (unless already changed)
            if ($articlesBlog->getCategory() === $this) {
                $articlesBlog->setCategory(null);
            }
        }

        return $this;
    }
}
