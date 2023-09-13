<?php

namespace App\Tests\Service;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use App\Service\MovieNotFoundException;
use App\Service\MovieService;
use PHPUnit\Framework\TestCase;

class MovieServiceTest extends TestCase
{
    public function testGetMovie_unknownMovie()
    {
        $movieRepository = $this->createMock(MovieRepository::class);
        $movieService = new MovieService($movieRepository);

        $movieRepository->method('find')->willReturn(null);

        $this->expectException(MovieNotFoundException::class);
        $movieService->getMovie(123456);
    }

    public function testGetMovie()
    {
        $movieRepository = $this->createMock(MovieRepository::class);
        $movieService = new MovieService($movieRepository);

        $movieRepository->method('find')->willReturn(new Movie());
        $movie = $movieService->getMovie(1);

        $this->assertEquals(new Movie(), $movie);
    }
}
