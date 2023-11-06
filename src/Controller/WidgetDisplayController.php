<?php

namespace App\Controller;

use App\Entity\WidgetLinks;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WidgetDisplayController extends AbstractController
{
    private ManagerRegistry $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    #[Route('/widget/display', name: 'widget_display')]
    public function display(): Response
    {
        $repository = $this->managerRegistry->getRepository(WidgetLinks::class);
        $widgets = $repository->findAll();

        return $this->render('widget_links/display.html.twig', [
            'widgets' => $widgets,
        ]);
    }
}
