<?php

namespace App\Controller;


use App\Entity\Reservation;


use App\Repository\ChambreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CloseReservationController extends AbstractController
{
    

    #[Route('/closereservation', name: 'app_closereservation')]
    public function index(EntityManagerInterface $em, ChambreRepository $cr, Request $request): Response
    {
        $rr=$em->getRepository(Reservation::class);
        $req=$request->query->all();
       
        if( array_key_exists("name", $req)){
            $resToClose = $rr->findBy([ 'reservation' => $req["name"]]);
            foreach($resToClose as $res){
                $res->setEtat(false);
                $em->persist($res);
            }
            $em->flush();

        }


        
        $reservations = $rr->findBy([ 'etat' => true]);
        $rooms=[];
        $i=0;
        foreach($reservations as $rsv){
            $rooms[$i]=$cr->find($rsv->getIdChambreFk());
            $i++;
        }

        return $this->render('reservations/close.html.twig',
            [
                'reservations' => $reservations,
                'rooms' => $rooms
                
            ]
        );
        

    }

        // $form = $this->createForm(ClientRoomCategoryType::class, $ch);
        
       
        // return $this->render('chambre/clientFormRoom.html.twig', [
        //     'form' => $form

        // ]);
    

    
}
