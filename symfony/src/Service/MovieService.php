<?php

namespace App\Service;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class MovieService
{
    public function __construct(private MovieRepository $movieRepository)
    {
    }

    public function getMovies(): Collection
    {
        return new ArrayCollection($this->movieRepository->findAll());
    }

    public function findMovie(int $movieId): ?Movie
    {
        return $this->movieRepository->find($movieId);
    }

    /**
     * @throws MovieNotFoundException
     */
    public function getMovie(int $movieId): Movie
    {
        $movie = $this->findMovie($movieId);
        if ($movie === null) {
            throw new MovieNotFoundException($movieId);
        }
        return $movie;
    }

    public function saveMovie(Movie $movie, bool $flush = false): Movie
    {
        $this->movieRepository->save($movie, $flush);
        return $movie;
    }

}
