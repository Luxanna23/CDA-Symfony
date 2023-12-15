<?php

namespace App\DataFixtures;


use App\Entity\Chambre;
use App\Entity\Reservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 100; $i++) {
            $chambre = new Chambre();
            $chambre->setNum($i);
            $chambre->setIdHotelFk(2);
            $chambre->setCategorie("categorie incroyable");
            $chambre->setEtat($i%2);
            $manager->persist($chambre);
        }
        for ($i = 0; $i < 100; $i++) {
            $res = new Reservation();
            $res->setReservation($i);
            $res->setIdClientFk((($i+3)*7)%4);
            $res->setIdChambreFk((($i+147)*129)%100);
            $res->setEtat($i%2);
            $manager->persist($res);
        }


        $manager->flush();
    }
}
