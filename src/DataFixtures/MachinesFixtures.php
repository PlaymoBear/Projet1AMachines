<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Computer;
use App\Entity\Category;
use App\Entity\User;
use Faker;

class MachinesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 1; $i<=20; $i++) {
            $user = new User();
            $user->setusername($faker->name)
                ->setemail($faker->email)
                ->setpassword($faker->password)
                ->setRoles(array('ROLE_USER'))
                ->setfirstName($faker->firstName)
                ->setlastName($faker->lastName);
            $manager->persist($user);

            $category = new Category();
            $category->setname("Association n° $i");
            $category->setdefaultDesc($faker->text);
            $manager->persist($category);

            for ($j = 0; $j < 3; $j++) {
                $computer = new Computer();
                $computer->setRespo($user)
                    ->setcategory($category)
                    ->setname($faker->name)
                    ->setcomment($faker->text)
                    ->setipAddr($faker->ipv4)
                    ->setmacAddr($faker->macAddress)
                    ->setlocation('ici')
                    ->setaddedOn($faker->dateTime())
                    ->setretiredon($faker->dateTime())
                    ->setlastCheck($faker->dateTime());
                $manager->persist($computer);
            }
            }
            $manager->flush();
    }
}
