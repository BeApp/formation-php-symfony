<?php

namespace App\Controller\Api\DTO;

use OpenApi\Annotations as OA;

class MovieDTO
{
    public function __construct(
        public readonly int     $id,
        /**
         * @OA\Property(type="string", maxLength=255, example="Star wars")
         */
        public readonly ?string $title,
        public readonly ?string $synopsis,
        public readonly string  $createdAt
    )
    {
    }
}
