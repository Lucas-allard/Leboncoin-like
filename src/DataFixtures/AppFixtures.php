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
use Symfony\Component\String\Slugger\SluggerInterface;


class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $encoder;
    protected SluggerInterface $slugger;

    public function __construct(UserPasswordHasherInterface $encoder, SluggerInterface $slugger)
    {
        $this->encoder = $encoder;
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 15; $i++) {
            $category = new Categories();
            $files = new Files();

            $category
                ->setName($faker->word(3, true));
                // ->setSlug(strtolower($this->slugger->slug($category->getName())));

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
                        ->setPrice($faker->randomFloat(2, 1, 1000))
                        // ->setCreatedAt($faker->dateTimeBetween('-6 months', 'now'))
                        ->setDescription($faker->text())
                        // ->setSlug(strtolower($this->slugger->slug($ad->getTitle())))
                        ->setActive(true)
                        ->setArea($faker->region())
                        ->setDepartment($faker->departmentName())
                        ->setCity($faker->city());

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
                        ->setPrice($faker->randomFloat(2, 1, 1000))
                        // ->setCreatedAt($faker->dateTimeBetween('-6 months', 'now'))
                        ->setDescription($faker->text())
                        // ->setSlug(strtolower($this->slugger->slug($ad2->getTitle())))
                        ->setActive(true)
                        ->setArea($faker->region())
                        ->setDepartment($faker->departmentName())
                        ->setCity($faker->city());

                    $files3 = new Files();
                    $files3
                        ->setPath('img/banner_img_03.jpg')
                        ->setAd($ad2);

                    $manager->persist($ad2);
                    $manager->persist($files3);
                }
            }
        }

        for ($i = 0; $i < 3; $i++) {
            $category2 = new Categories();
            $files4 = new Files();

            $category2
                ->setName($faker->word(3, true));
                // ->setSlug(strtolower($this->slugger->slug($category2->getName())));

            $files4
                ->setPath('img/banner_img_01.jpg')
                ->setCategory($category2);

            $manager->persist($category2);
            $manager->persist($files4);

            for ($m = 0; $m < 20; $m++) {
                $user2 = new Users();

                $user2
                    ->setEmail($faker->email())
                    ->setLastName($faker->lastName())
                    ->setFirstName($faker->firstName())
                    ->setPhoneNumber($faker->phoneNumber())
                    ->setIsVerified(true);

                $password2 = $this->encoder->hashPassword($user2, 'password');
                $user2->setPassword($password);

                $manager->persist($user2);

                for ($n = 0; $n < 2; $n++) {
                    $ad3 = new Ads();
                    $ad3->setUser($user)
                        ->setCategory($category)
                        ->setTitle($faker->word(3, true))
                        ->setStateOfUse(("Occasion"))
                        ->setPrice($faker->randomFloat(2, 1, 1000))
                        // ->setCreatedAt($faker->dateTimeBetween('-6 months', 'now'))
                        ->setDescription($faker->text())
                        // ->setSlug(strtolower($this->slugger->slug($ad3->getTitle())))
                        ->setActive(true)
                        ->setArea($faker->region())
                        ->setDepartment($faker->departmentName())
                        ->setCity($faker->city());

                    $files5 = new Files();
                    $files5
                        ->setPath('img/banner_img_02.jpg')
                        ->setAd($ad3);

                    $manager->persist($ad3);
                    $manager->persist($files5);
                }
            }
        }
        $manager->flush();
    }
}
