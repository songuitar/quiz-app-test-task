<?php

namespace App\Controller;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class TestController extends AbstractController
{

    public function __construct(
        private EntityManagerInterface $entityManager,
        private QuestionRepository $questionRepository,
    )
    {
    }

    #[Route('/')]
    public function index()
    {
        return $this->render('index.html.twig', [
            'questions' => $this->questionRepository->findAll(),
        ]);
    }
}