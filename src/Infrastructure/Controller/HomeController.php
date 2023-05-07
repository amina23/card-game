<?php

namespace App\Infrastructure\Controller;

use App\Core\Application\CardDistribution;
use App\Core\Application\SortCard;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function accueil(
        SortCard $sortCard,
        CardDistribution $cardDistribution
    ): Response
    {
        $random = $cardDistribution->getRandom();
        $response = ['random' => $random] + $sortCard->sortCard(cards: $random, type: 'random');
        return $this->render('index.html.twig',
            $response
        );
    }
}
