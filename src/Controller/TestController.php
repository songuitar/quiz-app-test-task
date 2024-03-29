<?php

namespace App\Controller;

use App\Model\CheckedAnswer;
use App\Repository\QuestionRepository;
use App\Service\AnswerValidator;
use App\Service\QuestionMixer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TestController extends AbstractController
{

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly QuestionRepository $questionRepository,
        private readonly QuestionMixer $questionMixer,
        private readonly AnswerValidator $answerValidator,
    )
    {
    }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'questions' => $this->questionMixer->shake(
                $this->questionRepository->findAll()
            ),
        ]);
    }

    #[Route('/check-results', methods: ['POST'])]
    public function checkResults(Request $request): Response
    {
        $result = $this->answerValidator->validate(array_map(
            function (string $checkedAnswer) {
                list($question, $answer) = explode('&', $checkedAnswer);
                return new CheckedAnswer(
                    [explode('_', $answer)[1]],
                    explode('_', $question)[1]
                );
            },
            array_keys($request->getPayload()->getIterator()->getArrayCopy())
        ));

        $this->entityManager->persist($result);
        $this->entityManager->flush();

        return $this->render('result.html.twig', [
            'result' => $result
        ]);
    }

    #[Route('/check-results', methods: ['GET'])]
    public function backToTest(): Response
    {
        return $this->redirectToRoute('index');
    }
}