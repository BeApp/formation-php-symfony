<?php

namespace App\Controller\Api;

use App\Controller\Api\DTO\MovieConverter;
use App\Entity\Movie;
use App\Service\MovieNotFoundException;
use App\Service\MovieService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;

class MovieApiController extends AbstractController
{

    public function __construct(private MovieService $movieService, private MovieConverter $movieConverter)
    {
    }

    #[Route('/api/v1/test/{id}', name: 'api_v1_test', methods: ['GET'])]
    public function maRoute(): Response
    {
        return $this->json([
            'symfony' => 'rocks'
        ]);
    }

    /**
     * @OA\Response(response=200, description="REtourne la liste des films",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=App\Controller\Api\DTO\MovieDTO::class))
     *     )
     * )
     * @OA\Tag(name="Films")
     * @return Response
     */
    #[Route('/api/v1/movies', name: 'api_v1_movies', methods: ['GET'])]
    public function retrieveMovies(): Response
    {
        $movies = $this->movieService->getMovies();


        return $this->json(array_map(fn(Movie $movie) => $this->movieConverter->toDTO($movie), $movies));
    }

    /**
     * @throws MovieNotFoundException
     */
    #[Route('/api/v1/movies/{movieId}/cover', name: 'api_v1_movie', methods: ['GET'])]
    public function uploadMovieCover(Request $request, int $movieId): Response
    {
        $movie = $this->movieService->getMovie($movieId);

        /** @var File $coverFile */
        $coverFile = $request->files->get('cover');

        $movie->setCoverFile($coverFile);

        $this->movieService->saveMovie($movie, true);

        return $this->json($this->movieConverter->toDTO($movie));
    }
}
