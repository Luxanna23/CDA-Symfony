<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for( $i = 0; $i < 10; $i++ ) {
            $client = new Client;
            $client->setName("name".$i);
            $manager->persist($client);
        }
        $manager->flush();
    }
}
