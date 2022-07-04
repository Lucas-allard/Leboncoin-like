<?php

namespace App\Tests;

use App\Entity\AdsTracking;
use App\Entity\Users;
use App\Entity\Ads;
use DateTime;
use PHPUnit\Framework\TestCase;

class AdsTrackingUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $adtracking = new AdsTracking();
        $user = new Users();
        $ad = new Ads();
        $datetime = new DateTime();

        $adtracking->setUser($user)
            ->setAd($ad)
            ->setCreatedAt($datetime);

        $this->assertTrue($adtracking->getUser() === $user);
        $this->assertTrue($adtracking->getAd() === $ad);
        $this->assertTrue($adtracking->getCreatedAt() === $datetime);
    }

    public function testIsFalse(): void
    {
        $adtracking = new AdsTracking();
        $user = new Users();
        $ad = new Ads();
        $datetime = new DateTime();

        $adtracking->setUser($user)
            ->setAd($ad)
            ->setCreatedAt($datetime);

        $this->assertFalse($adtracking->getUser() ===new Users());
        $this->assertFalse($adtracking->getAd() === new Ads());
        $this->assertFalse($adtracking->getCreatedAt() === new DateTime());
    }

    public function testIsEmpty(): void
    {
        $adtracking = new AdsTracking();

        $this->assertEmpty($adtracking->getUser());
        $this->assertEmpty($adtracking->getAd());
        $this->assertEmpty($adtracking->getCreatedAt());
    }
}
