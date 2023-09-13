<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: MovieRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[Vich\Uploadable]
class Movie
{
    use IdTrait;
    use DateTrait;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $synopsis = null;

    #[ORM\Column(length: 255)]
    private ?string $createdBy = null;

    #[ORM\ManyToOne(inversedBy: 'movies')]
    private ?Franchise $franchise = null;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'movies')]
    private Collection $categories;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coverFilename = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coverContentType = null;

    #[Vich\UploadableField(mapping: 'uploadedFiles', fileNameProperty: 'coverFilename', mimeType: 'coverContentType')]
    private ?File $coverFile = null;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): static
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(string $createdBy): static
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getFranchise(): ?Franchise
    {
        return $this->franchise;
    }

    public function setFranchise(?Franchise $franchise): static
    {
        $this->franchise = $franchise;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    public function removeCategory(Category $category): static
    {
        $this->categories->removeElement($category);

        return $this;
    }

    public function getCoverFilename(): ?string
    {
        return $this->coverFilename;
    }

    public function setCoverFilename(?string $coverFilename): static
    {
        $this->coverFilename = $coverFilename;

        return $this;
    }

    public function getCoverContentType(): ?string
    {
        return $this->coverContentType;
    }

    public function setCoverContentType(?string $coverContentType): static
    {
        $this->coverContentType = $coverContentType;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getCoverFile(): ?File
    {
        return $this->coverFile;
    }

    /**
     * @param File|null $coverFile
     */
    public function setCoverFile(?File $coverFile): void
    {
        $this->coverFile = $coverFile;

        if (null !== $coverFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->modifiedAt = new \DateTimeImmutable();
        }
    }

}
