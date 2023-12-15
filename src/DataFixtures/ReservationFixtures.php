<?php

namespace App\DataFixtures;

use App\Entity\Chambre;
use App\Entity\Client;
use App\Entity\Reservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class ReservationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $clients = $manager->getRepository(Client::class)->findAll();
        $chambres = $manager->getRepository(Chambre::class)->findAll();
        
        
        dump($clients, $chambres);
        // $product = new Product();
        // $manager->persist($product);
        for( $i = 0; $i < 10; $i++ ) {
            $client = new Reservation;
            $idC = array_rand($clients);
            $idChb = array_rand($chambres);
            $client->setReservation("reservation".$i)
                   ->setEtat(1)
                   ->setIdChambreFk($chambres[$idChb]->getId())
                   ->setIdClientFk($clients[$idC]->getId());
            $manager->persist($client);
        }
        $manager->flush();
    }
}
