<?php

namespace App\Controller\Api\DTO;

use App\Entity\Movie;
use Symfony\Component\Security\Core\Security;

class MovieConverter
{

    public function __construct(private Security $security)
    {
    }

    public function toDTO(Movie $movie): MovieDTO
    {
        $this->security->isGranted('');


        return new MovieDTO(
            $movie->getId(),
            $movie->getTitle(),
            $movie->getSynopsis(),
            $movie->getCreatedAt()->format('d/m/Y')
        );
    }

}
