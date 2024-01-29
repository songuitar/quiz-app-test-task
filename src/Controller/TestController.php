<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class TestController extends AbstractController
{
    #[Route('/')]
    public function index()
    {
        $number =456;

        return $this->render('index.html.twig', [
            'number' => $number,
        ]);
    }
}