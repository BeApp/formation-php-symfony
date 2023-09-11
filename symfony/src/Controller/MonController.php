<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MonController extends AbstractController
{

    #[Route('/api/v1/test/{id}', name: 'api_v1_test')]
    public function maRoute(): Response
    {
        return $this->json([
            'symfony' => 'rocks'
        ]);
    }

    #[Route('/api/v1/test2', name: 'api_v1_test2')]
    public function maRoute2(): Response
    {
        return $this->json([
            'lorem' => 'ipsum'
        ]);
    }
}
