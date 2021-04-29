<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder=$passwordEncoder;
    }

    /**
     * @Route("/registration", name="registration")
     */
    public function index(Request $request): Response
    {
        $user=new User();
        $form=$this->createForm(UserType::class,$user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $user->setRoles(["ROLE_USER"]);
            $user->setPassword($this->passwordEncoder->encodePassword($user,$user->getPassword()));
            $entity_manager=$this->getDoctrine()->getManager();
            $entity_manager->persist($user);
            $entity_manager->flush();
            dd($user);
        }
        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(), "bodyClass" => "login_background"
        ]);
    }



}
