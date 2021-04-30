<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GamonerieController extends AbstractController
{
    /**
     * @Route("/gamer", name="gamer")
     */
    public function index(): Response
    {
        return $this->render('gamonerie/index.html.twig');
    }

    /**
     * @Route("/gamer/game/{id}", name="game")
     */
    public function game(int $id): Response
    {
        return $this->render('gamonerie/game.html.twig');
    }

    /**
     * @Route("/gamer/messages", name="message")
     */
    public function gamersmessages(): Response
    {
        return $this->render('gamonerie/gamersmessages.html.twig');
    }

    /**
     * @Route("/gamer/profil", name="profil")
     */
    public function profil(): Response
    {
        return $this->render('gamonerie/profil.html.twig');
    }
}
