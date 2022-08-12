<?php

namespace App\DataFixtures;

use App\Entity\Employes;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EmployerFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i <= 10; $i ++){
            $employer = new Employes ;
    
            $employer
                     ->setNom(" Nom")
                     ->setPrenom("Prenom  $i")
                     ->setTelephone("0654976523")
                     ->setEmail("Email@gmail.com")
                     ->setAdresse("28 RUE guillaume apollinaire")
                     ->setSalaire("1200")
                     ->setDatedenaissance(new \DateTime())
                     ->setPoste("dev");

            $manager->persist( $employer);
    
           }
    

        $manager->flush();
    }
}
