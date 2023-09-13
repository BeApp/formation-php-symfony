<?php

namespace App\Service;

class MovieNotFoundException extends ResourceNotFoundException
{
    public function __construct(private int $movieId, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return int
     */
    public function getMovieId(): int
    {
        return $this->movieId;
    }
}
