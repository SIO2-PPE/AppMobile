<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ClientFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $client = new Client();
        $client
            ->setNom("Demo")
            ->setPrenom("Demo")
            ->setTel("0600000000")
            ->setRoles(["ROLE_USER"])
            ->setEmail("demo@demo")
            ->setPassword($this->passwordEncoder->encodePassword($client, "demo"));

        $manager->persist($client);
        $manager->flush();
    }
}
