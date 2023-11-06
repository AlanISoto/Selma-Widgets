<?php

namespace  App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EventRepository;

class EventController extends AbstractController
{

    #[ROUTE('/api/events', name: 'api_events', methods: ['GET'])]

    public function getEvents(EventRepository $eventRepository): JsonResponse
    {
        $events = $eventRepository->findEvents();
        return $this->json([
            'events' => array_map(function ($event) {
                return $this->transformEvent($event);
            }, $events)
        ]);
    }
    // Query to get all events from the database and return them as JSON
    private function transformEvent($event)
    {
        $intake = $event->getIntake();

        return [
            'id' => $event->getEventId(),
            'name' => $event->getName(),
            // Include the time in the format
            'start_time' => $event->getStartTime()->format('m/d/Y H:i'),
            'end_time' => $event->getEndTime()->format('m/d/Y H:i'),
            'color' => $event->getEventColor(),
            'intake' => [
                'id' => $intake->getIntakeId(),
                'name' => $intake->getName(),
            ]
        ];
    }
}
