<?php

namespace App\Controller\View;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{

    public function __construct(private MovieRepository $movieRepository)
    {
    }

    #[Route('/movies', name: 'app_movies')]
    public function index(): Response
    {
        $movies = $this->movieRepository->findAll();

        return $this->render('movie/index.html.twig', [
            'movies' => $movies
        ]);
    }

    #[Route('/movies/{movieId}', name: 'app_movie')]
    public function detail(int $movieId): Response
    {
        $movie = $this->movieRepository->find($movieId);

        return $this->render('movie/detail.html.twig', [
            'movie' => $movie
        ]);
    }
}
