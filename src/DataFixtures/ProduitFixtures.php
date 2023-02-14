<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProduitFixtures extends Fixture
{

    
    public function load(ObjectManager $manager): void
    {


        $faker=Factory::create("fr_FR");

        for($i=0;$i<25;$i++){
        $produit=new Produit();
        $produit->setNom("produit".$i);
        $produit->setPrix(mt_rand(10,500));
        //ne pas utliser faker pour les mails psq ce sont des mails aléatoires et on va pas retenir
        
        

        $manager->persist($produit);
    
         }
        
        
        $manager->flush();

        
        // $product = new Product();
        // $manager->persist($product);

        // $manager->flush();
    }
}
