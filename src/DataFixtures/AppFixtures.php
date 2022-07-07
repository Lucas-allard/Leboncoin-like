<?php

namespace App\DataFixtures;

use App\Entity\Users;
use App\Entity\Categories;
use App\Entity\Ads;
use App\Entity\Files;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Provider\bg_BG\PhoneNumber;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 15; $i++) {
            $category = new Categories();
            $files = new Files();

            $category
                ->setName($faker->word(3, true))
                ->setSlug($faker->slug());

            $files
                ->setPath('img/banner_img_01.jpg')
                ->setCategory($category);

            $manager->persist($category);
            $manager->persist($files);

            for ($j = 0; $j < 10; $j++) {
                $user = new Users();

                $user
                    ->setEmail($faker->email())
                    ->setLastName($faker->lastName())
                    ->setFirstName($faker->firstName())
                    ->setPhoneNumber($faker->phoneNumber())
                    ->setIsVerified(true);

                $password = $this->encoder->hashPassword($user, 'password');
                $user->setPassword($password);

                $manager->persist($user);

                for ($k = 0; $k < 2; $k++) {
                    $ad = new Ads();
                    $ad->setUser($user)
                        ->setCategory($category)
                        ->setTitle($faker->word(3, true))
                        ->setStateOfUse(("Occasion"))
                        ->setPrice($faker->randomFloat(2, 1, 10000000))
                        ->setCreatedAt($faker->dateTimeBetween('-6 months', 'now'))
                        ->setDescription($faker->text())
                        ->setSlug($faker->slug());

                    $files2 = new Files();
                    $files2
                        ->setPath('img/banner_img_02.jpg')
                        ->setAd($ad);

                    $manager->persist($ad);
                    $manager->persist($files2);
                }

                for ($l = 0; $l < 2; $l++) {
                    $ad2 = new Ads();
                    $ad2->setUser($user)
                        ->setCategory($category)
                        ->setTitle($faker->word(3, true))
                        ->setStateOfUse(("Neuf"))
                        ->setPrice($faker->randomFloat(2, 1, 10000000))
                        ->setCreatedAt($faker->dateTimeBetween('-6 months', 'now'))
                        ->setDescription($faker->text())
                        ->setSlug($faker->slug());

                    $files3 = new Files();
                    $files3
                        ->setPath('img/banner_img_03.jpg')
                        ->setAd($ad2);

                    $manager->persist($ad2);
                    $manager->persist($files3);
                }
            }
        }
        $manager->flush();
    }
}
