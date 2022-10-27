<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/{number<\d+>}", name="app_lucky")
     */
    public function index($number=1): Response
    {
        return $this->render('lucky/index.html.twig', [
            'name' => 'Thibaut',
            'number' => $number
        ]);
    }

    /**
     * @Route("/bts", name="app_bts")
     */
    public function bts(): Response
    {
        return $this->render('lucky/bts.html.twig', [
            'school' => 'BTS',
        ]);
    }
}
