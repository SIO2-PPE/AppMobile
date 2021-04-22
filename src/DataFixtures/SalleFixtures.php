<?php

namespace App\DataFixtures;

use App\Entity\Site;
use App\Entity\Salle;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class SalleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i < 4; $i++) { 
            $site = new Site();
            $site
                ->setAdresse('Une adresse')
                ->setCodePostal('XXXXX')
                ->setVille('Une ville')
            ;
            $manager->persist($site);
            for ($y=0; $y < 2; $y++) { 
                $salle = new Salle();
                $salle->setIdsite($site);
                $manager->persist($salle);
            }
        }

        $manager->flush();
    }
}
