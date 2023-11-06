<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\WidgetLinks;
use App\Form\WidgetLinksType;

class WidgetLinksController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/widget/add', name: 'widget_add')]
    public function add(Request $request): Response
    {
        $widget = new WidgetLinks();
        $form = $this->createForm(WidgetLinksType::class, $widget);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($widget);
            $this->entityManager->flush();

            return $this->redirectToRoute('widget_add');
        }

        return $this->render('widget_links/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
