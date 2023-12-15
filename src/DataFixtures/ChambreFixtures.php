<?php

namespace App\DataFixtures;

use App\Entity\Chambre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class ChambreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for( $i = 0; $i < 10; $i++ ) {
            $client = new Chambre;
            $client->setNum($i)
            ->setIdHotelFk(1)
            ->setCategorie('car'.$i)
            ->setEtat(1);
            $manager->persist($client);
        }
        $manager->flush();
    }
}
