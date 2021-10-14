<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager)
    {
        $user = new Utilisateur();
        $user->setNom("CHALUMEAU");
        $user->setPrenom("Romain");
        $user->setEmail("rom.chalum@gmail.com");
        $user->setRoles(['ROLE_USER']);
        $user->setNbLoisirs(0);

        $password = $this->encoder->encodePassword($user, 'romain');
        $user->setPassword($password);

        $manager->persist($user);

        $user = new Utilisateur();
        $user->setNom("TRUMP");
        $user->setPrenom("Donald");
        $user->setEmail("donal.trump@gmail.com");
        $user->setRoles(['ROLE_USER']);
        $user->setNbLoisirs(0);

        $password = $this->encoder->encodePassword($user, 'donald');
        $user->setPassword($password);

        $manager->persist($user);

        $user = new Utilisateur();
        $user->setNom("MACRON");
        $user->setPrenom("Emmanuel");
        $user->setEmail("manu.macron@gmail.com");
        $user->setRoles(['ROLE_USER']);
        $user->setNbLoisirs(0);

        $password = $this->encoder->encodePassword($user, 'manu');
        $user->setPassword($password);

        $manager->persist($user);

        $user = new Utilisateur();
        $user->setNom("PIAF");
        $user->setPrenom("Edith");
        $user->setEmail("edit.piaf@gmail.com");
        $user->setRoles(['ROLE_USER']);
        $user->setNbLoisirs(0);

        $password = $this->encoder->encodePassword($user, 'edith');
        $user->setPassword($password);

        $manager->persist($user);

        $manager->flush();
    }
}
