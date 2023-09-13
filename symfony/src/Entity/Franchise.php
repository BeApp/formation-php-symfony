<?php

namespace App\Entity;

use App\Repository\FranchiseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FranchiseRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Franchise
{
    use IdTrait;
    use DateTrait;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<Movie>
     */
    #[ORM\OneToMany(mappedBy: 'franchise', targetEntity: Movie::class)]
    private Collection $movies;

    public function __construct()
    {
        $this->movies = new ArrayCollection();
    }

    public static function build(string $name) {
        $entity = new static();
        $entity->setName($name);
        return $entity;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Movie>
     */
    public function getMovies(): Collection
    {
        return $this->movies;
    }

    public function addMovie(Movie $movie): static
    {
        if (!$this->movies->contains($movie)) {
            $this->movies->add($movie);
            $movie->setFranchise($this);
        }

        return $this;
    }

    public function removeMovie(Movie $movie): static
    {
        if ($this->movies->removeElement($movie)) {
            // set the owning side to null (unless already changed)
            if ($movie->getFranchise() === $this) {
                $movie->setFranchise(null);
            }
        }

        return $this;
    }
}
