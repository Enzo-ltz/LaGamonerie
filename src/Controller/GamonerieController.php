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
        return $this->render('gamonerie/index.html.twig', [
            'controller_name' => 'GamonerieController',
        ]);
    }
}
