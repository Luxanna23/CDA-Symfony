<?php

namespace App\Controller;


use App\Entity\Reservation;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainMenuController extends AbstractController
{
    

    #[Route('/main', name: 'app_main')]
    public function index(): Response
    {
        
        
        

        return $this->render('main/main.html.twig');
        

    }

        // $form = $this->createForm(ClientRoomCategoryType::class, $ch);
        
       
        // return $this->render('chambre/clientFormRoom.html.twig', [
        //     'form' => $form

        // ]);
    

    
}
