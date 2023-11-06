<?php

namespace App\Controller;

use App\Entity\Intake;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalendarController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/calendar', name: 'calendar')]
    public function index(): Response
    {
        return $this->render('calendar.html.twig');
    }

    #[Route('/calendar/intake/{intakeId}', name: 'calendar_intake')]
    public function intakePage(int $intakeId): Response
    {
        // Find the intake with the given id
        $intake = $this->entityManager->getRepository(Intake::class)
            ->find($intakeId);
        // If no intake is found, throw a 404
        if (!$intake) {

            throw $this->createNotFoundException('No intake found for id ' . $intakeId);
        }
        // Render the calendar_intake.html.twig template with the intake name
        return $this->render('calendar_intake.html.twig', [
            'intakeId' => $intakeId,
            'intakeName' => $intake->getName(),
        ]);
    }
}
