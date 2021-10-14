<?php

namespace App\DataFixtures;

use App\Entity\Loisir;
use App\Entity\TypeLoisir;
use App\Entity\Utilisateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PropertyInfo\Type;
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
        /* Ajout des utilisateurs */

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
        $user->setNom("Duck");
        $user->setPrenom("Donald");
        $user->setEmail("donal.duck@gmail.com");
        $user->setRoles(['ROLE_USER']);
        $user->setNbLoisirs(0);

        $password = $this->encoder->encodePassword($user, 'donald');
        $user->setPassword($password);

        $manager->persist($user);

        $user = new Utilisateur();
        $user->setNom("GABIN");
        $user->setPrenom("Jean");
        $user->setEmail("jean.gabin@gmail.com");
        $user->setRoles(['ROLE_USER']);
        $user->setNbLoisirs(0);

        $password = $this->encoder->encodePassword($user, 'jean');
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

        /* Ajout des types de loisirs */

        $typeLoisirSport = new TypeLoisir();
        $typeLoisirSport->setNomTypeLoisir("Sport");

        $manager->persist($typeLoisirSport);

        $typeLoisirCinema = new TypeLoisir();
        $typeLoisirCinema->setNomTypeLoisir("Cinéma");

        $manager->persist($typeLoisirCinema);

        $typeLoisirLecture = new TypeLoisir();
        $typeLoisirLecture->setNomTypeLoisir("Lecture");

        $manager->persist($typeLoisirLecture);

        $typeLoisirApprentissage = new TypeLoisir();
        $typeLoisirApprentissage->setNomTypeLoisir("Apprentissage");

        $manager->persist($typeLoisirApprentissage);

        /* Ajout des loisirs des utilisateurs */

        $loisir = new Loisir();
        $loisir->setNomLoisir("Badminton");
        $loisir->setTypeLoisir($typeLoisirSport);
        $loisir->setIdUtilisateur(1);
        
        $manager->persist($loisir);

        $loisir = new Loisir();
        $loisir->setNomLoisir("Star Trek");
        $loisir->setTypeLoisir($typeLoisirCinema);
        $loisir->setIdUtilisateur(1);
        
        $manager->persist($loisir);

        $manager->flush();
    }
}
