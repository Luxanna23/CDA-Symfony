<?php

namespace App\Controller;

use App\Entity\Hotels;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class HotelController extends AbstractController
{
    #[Route('/hotel', name: 'app_hotel')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $hotels= $entityManager->getRepository(Hotels::class)->findAll();
        # $this->getDoctrine()->getRepository(Hotels::class)->findAll();
        return $this->render('hotel/index.html.twig', [
            'controller_name' => 'HotelController',
            'name' => 'PAF',
            "hotels" => $hotels
        ]);
    }

    #[Route('/hotel_list', name: 'app_hotel_list')]
    public function list(): Response
    {
        return $this->render('hotel/index.html.twig', [
            'controller_name' => 'HotelController',
        ]);
    }
}
