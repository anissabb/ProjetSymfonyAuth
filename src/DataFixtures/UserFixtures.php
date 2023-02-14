<?php

namespace App\DataFixtures;


use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher){

        $this->passwordHasher = $passwordHasher;

    }
    public function load(ObjectManager $manager): void
    {


        $faker=Factory::create("cn_CN");

        for($i=0;$i<5;$i++){
        $user=new User();
        $user->setNom($faker->name());
        //ne pas utliser faker pour les mails psq ce sont des mails aléatoires et on va pas retenir
        
        $user->setEmail("mail".$i."@gmail.com");
        $user->setPassword(
            $this->passwordHasher->hashPassword($user,"motdepass"));
        $manager->persist($user);
    
         }
        
        
        $manager->flush();

        
        // $product = new Product();
        // $manager->persist($product);

        // $manager->flush();
    }
}
