<?php

namespace App\DataFixtures;

use App\Entity\DemandeReservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class DemandeReservationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for( $i = 0; $i < 10; $i++ ) {
            $demandeRes = new DemandeReservation;
            $demandeRes->setReservation("demande".$i)
                    ->setEtat(null);
            $manager->persist($demandeRes);
        }
        $manager->flush();
    }
}
