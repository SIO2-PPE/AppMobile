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
        //Site
        //Site Annecy
        $site1 = new Site();
        $site1
            ->setAdresse('1 rue de test')
            ->setCodePostal('74000')
            ->setVille('Annecy')
        ;
        //Salle sur Annecy
        for ($y=0; $y < 4; $y++) {
            $site1->addSalle(new Salle());
        }
        $manager->persist($site1);
        //Site BonneVille
         $site2= new Site();
         $site2
            ->setAdresse('1 rue de test')
            ->setCodePostal('74130')
            ->setVille('Bonneville')
        ;
        $manager->persist($site2);
        //Salle sur Bonneville
        for ($y=0; $y < 2; $y++) {
            $salle->setIdsite($site2);
            $manager->persist($salle);
        }

        //site Thonon
        $site3= new Site();
        $site3
            ->setAdresse('1 rue de test')
            ->setCodePostal('74200')
            ->setVille('Thonon-les-Bains')
        ;
        $manager->persist($site3);
        //Salle sur Thonon
        for ($y=0; $y < 2; $y++) {
            $salle->setIdsite($site3);
            $manager->persist($salle);
        }
        //site Chamonix
        $site4 = new Site();
        $site4
            ->setAdresse('1 rue de test')
            ->setCodePostal('74400')
            ->setVille('Chamonix')
        ;
        $manager->persist($site4);
        //Salle sur Chamonix
        for ($y=0; $y < 2; $y++) {
            $salle->setIdsite($site4);
            $manager->persist($salle);
        }
        $manager->flush();
    }
}
