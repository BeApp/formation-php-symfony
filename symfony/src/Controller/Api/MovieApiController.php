<?php

namespace App\Controller\Api;

use App\Controller\Api\DTO\MovieConverter;
use App\Entity\Movie;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieApiController extends AbstractController
{

    public function __construct(private MovieRepository $movieRepository, private MovieConverter $movieConverter)
    {
    }

    #[Route('/api/v1/test/{id}', name: 'api_v1_test')]
    public function maRoute(): Response
    {
        return $this->json([
            'symfony' => 'rocks'
        ]);
    }

    #[Route('/api/v1/movies', name: 'api_v1_movies')]
    public function retrieveMovies(): Response
    {
        $movies = $this->movieRepository->findAll();


        return $this->json(array_map(fn(Movie $movie) => $this->movieConverter->toDTO($movie), $movies));
    }

    #[Route('/api/v1/movies/{categoryId}', name: 'api_v1_movie')]
    public function retrieveMovie(int $categoryId): Response
    {
        $movies = $this->movieRepository->findByCategory($categoryId);

        return $this->json(array_map(fn(Movie $movie) => $this->movieConverter->toDTO($movie), $movies));
    }
}
