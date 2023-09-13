<?php

namespace App\Controller\View;

use App\Entity\Movie;
use App\Form\MovieType;
use App\Repository\MovieRepository;
use App\Service\MovieNotFoundException;
use App\Service\MovieService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{

    public function __construct(private MovieService $movieService)
    {
    }

    #[Route('/movies', name: 'app_movies')]
    public function index(): Response
    {
        $movies = $this->movieService->getMovies();

        return $this->render('movie/index.html.twig', [
            'movies' => $movies
        ]);
    }

    /**
     * @throws MovieNotFoundException
     */
    #[Route('/movies/new', name: 'app_movies_new')]
    #[Route('/movies/{movieId}/edit', name: 'app_movies_edit')]
    public function new(Request $request, ?int $movieId): Response
    {
        $movie = null;
        if ($movieId !== null) {
            $movie = $this->movieService->getMovie($movieId);
        }

        $form = $this->createForm(MovieType::class, $movie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Movie $movie */
            $movie = $form->getData();
            $movie->setCreatedBy('damien');

            $movie = $this->movieService->saveMovie($movie, true);

            return $this->redirectToRoute('app_movies');
        }

        return $this->renderForm('movie/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/movies/{movieId}', name: 'app_movie')]
    public function detail(int $movieId): Response
    {
        $movie = $this->movieService->getMovie($movieId);

        return $this->render('movie/detail.html.twig', [
            'movie' => $movie
        ]);
    }
}
