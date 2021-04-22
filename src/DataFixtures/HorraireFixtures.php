<?php

namespace App\DataFixtures;

use App\Entity\Horraire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HorraireFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i < 10; $i++) {
            $horraire = new Horraire();
            $h = 8 + $i;
            $horraire->setHeure(new \DateTime($h . ':00'));
            $manager->persist($horraire);
        }

        $manager->flush();
    }
}
