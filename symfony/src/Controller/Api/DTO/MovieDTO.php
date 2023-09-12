<?php

namespace App\Controller\Api\DTO;

class MovieDTO
{
    public function __construct(
        public readonly int     $id,
        public readonly ?string $title,
        public readonly ?string $synopsis,
        public readonly string $createdAt
    )
    {
    }
}
