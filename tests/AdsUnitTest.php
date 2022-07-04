<?php

namespace App\Tests;

use App\Entity\Ads;
use App\Entity\Categories;
use App\Entity\Users;
use App\Entity\Files;
use DateTime;
use PHPUnit\Framework\TestCase;

class AdsUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $ad = new Ads();
        $category = new Categories();
        $user = new Users();
        $datetime = new DateTime();
        $file = new Files();

        $ad->setTitle('title')
            ->setStateOfUse('state of use')
            ->setPrice(20.20)
            ->setDeliveryPrice(9.9)
            ->setCreatedAt($datetime)
            ->setDescription('description')
            ->setSlug('slug')
            ->setCategory($category)
            ->setUser($user)
            ->addFile($file);

        $this->assertTrue($ad->getTitle() === 'title');
        $this->assertTrue($ad->getPrice() == 20.20);
        $this->assertTrue($ad->getDeliveryPrice() == 9.9);
        $this->assertTrue($ad->getCreatedAt() === $datetime);
        $this->assertTrue($ad->getDescription() === 'description');
        $this->assertTrue($ad->getSlug() === 'slug');
        $this->assertTrue($ad->getCategory() === $category);
        $this->assertTrue($ad->getUser() === $user);
        $this->assertContains($file, $ad->getFiles());
    }

    public function testIsFalse()
    {
        $ad = new Ads();
        $category = new Categories();
        $user = new Users();
        $datetime = new DateTime();
        $file = new Files();

        $ad->setTitle('title')
            ->setStateOfUse('state of use')
            ->setPrice(20.20)
            ->setDeliveryPrice(9.9)
            ->setCreatedAt($datetime)
            ->setDescription('description')
            ->setSlug('slug')
            ->setCategory($category)
            ->setUser($user)
            ->addFile($file);

        $this->assertFalse($ad->getTitle() === 'false');
        $this->assertFalse($ad->getPrice() == 22.20);
        $this->assertFalse($ad->getDeliveryPrice() == 19.9);
        $this->assertFalse($ad->getCreatedAt() === new DateTime());
        $this->assertFalse($ad->getDescription() === 'false');
        $this->assertFalse($ad->getSlug() === 'false');
        $this->assertFalse($ad->getCategory() === new Categories());
        $this->assertFalse($ad->getUser() === new Users());
        $this->assertNotContains(new Files(), $ad->getFiles());
    }

    public function testIsEmpty()
    {
        $ad = new Ads();

        $this->assertEmpty($ad->getTitle());
        $this->assertEmpty($ad->getPrice());
        $this->assertEmpty($ad->getDeliveryPrice());
        $this->assertEmpty($ad->getCreatedAt());
        $this->assertEmpty($ad->getDescription());
        $this->assertEmpty($ad->getSlug());
        $this->assertEmpty($ad->getCategory());
        $this->assertEmpty($ad->getUser());
        $this->assertEmpty($ad->getFiles());
    }
}
