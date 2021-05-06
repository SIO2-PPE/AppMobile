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
        $site = new Site();
        $site
            ->setAdresse('1 rue de test')
            ->setCodePostal('74000')
            ->setVille('Annecy')
            ;
        $manager->flush($site);
        //Salle sur Annecy
        for ($y=0; $y < 4; $y++) {
            $salle = new Salle();
            $salle->setIdsite($site);
            $manager->persist($salle);
        }
        $manager->flush();
        //Site BonneVille
         $site
            ->setAdresse('1 rue de test')
            ->setCodePostal('74130')
            ->setVille('Bonneville')
        ;
        $manager->flush($site);
        //Salle sur Bonneville
        for ($y=0; $y < 2; $y++) {
            $salle->setIdsite($site);
            $manager->persist($salle);
        }
        $manager->flush();
        //site Thonon
        $site
            ->setAdresse('1 rue de test')
            ->setCodePostal('74200')
            ->setVille('Thonon-les-Bains')
        ;
        $manager->flush($site);
        //Salle sur Thonon
        for ($y=0; $y < 2; $y++) {
            $salle->setIdsite($site);
            $manager->persist($salle);
        }
        $manager->flush();
        //site Chamonix
        $site
            ->setAdresse('1 rue de test')
            ->setCodePostal('74400')
            ->setVille('Chamonix')
        ;
        $manager->flush($site);
        //Salle sur Chamonix
        for ($y=0; $y < 2; $y++) {
            $salle->setIdsite($site);
            $manager->persist($salle);
        }
        $manager->flush();
    }
}
