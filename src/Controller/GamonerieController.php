<?php

namespace App\Controller;

use App\Entity\GameType;
use App\Form\GameForm;
use http\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;

class GamonerieController extends AbstractController
{
    /**
     * @Route("/gamer", name="gamer")
     */
    public function index(Request $request): Response
    {
        $gameName=new GameType;
        $form=$this->createForm(GameForm::class,$gameName);
        $form->handleRequest($request);
        $myGame="league";
        if ($form->isSubmitted()){
            $myGame = $form->getData()->getName();
        }
        $client = new \GuzzleHttp\Client();
        $APIKEY = "dc270a27679c16a3dd254514fded7f408167f1556a3a8e721641fead42f7673d";
        $BASEURL = "https://api.thegamesdb.net/v1/";
        $url = $BASEURL."Games/ByGameName?apikey=".$APIKEY."&name=".$myGame;
        $response = $client->request("GET",$url);
        $games = json_decode($response->getBody()->getContents())->data->games;

        return $this->render('gamonerie/index.html.twig', ['games' => $games, 'form' => $form->createView()] );
    }

    /**
     * @Route("/gamer/game/{id}", name="game")
     */
    public function game(int $id, UserRepository $emUser): Response
    {   
        $client = new \GuzzleHttp\Client();
        $APIKEY = "dc270a27679c16a3dd254514fded7f408167f1556a3a8e721641fead42f7673d";
        $BASEURL = "https://api.thegamesdb.net/v1/";
        $url = $BASEURL."Games/ByGameID?apikey=".$APIKEY."&id=".$id;
        $response = $client->request("GET",$url);
        $game = json_decode($response->getBody()->getContents())->data->games;
        return $this->render('gamonerie/game.html.twig',[
            'users' => $emUser->findAll(),
            'game' => $game[0]
        ] );
    }

    /**
     * @Route("/gamer/messages", name="message")
     */
    public function gamersmessages(): Response
    {
        return $this->render('gamonerie/gamersmessages.html.twig');
    }

    /**
     * @Route("/gamer/profile/{id}", name="profile")
     */
    public function profile(int $id, UserRepository $userRepository): Response
    {   
        return $this->render('gamonerie/profile.html.twig', ['user'=> $userRepository->find($id) ]);
    }
}
