<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Produit;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserProduitFavorisFixtures extends Fixture
{

    
    public function load(ObjectManager $manager): void
    {
        $rep=$manager->getRepository(Produit::class);
        $produits=$rep->findAll();

        $rep=$manager->getRepository(User::class);
        $users=$rep->findAll();

        foreach ( $produits as $produit){
            //on prend un user aléatoirement dans tous nos users, pour cela on prend toute la longueur de nos user

            $produit->addLiker($users[mt_rand(0,count($users)-1)]);


        }
        //pas besoin de persist car on prend de la bd
        $manager->flush();

    
         }
    
}

