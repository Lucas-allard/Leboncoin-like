<?php

namespace App\Tests;

use App\Entity\Files;
use App\Entity\Ads;
use PHPUnit\Framework\TestCase;

class FilesUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $file = new Files();
        $ad = new Ads();

        $file->setPath('path/path')
            ->setAd($ad);

        $this->assertTrue($file->getPath() === "path/path");
        $this->assertTrue($file->getAd() === $ad);
    }

    public function testIsFalse(): void
    {
        $file = new Files();
        $ad = new Ads();

        $file->setPath('path/path')
            ->setAd($ad);

        $this->assertFalse($file->getPath() === "false");
        $this->assertFalse($file->getAd() === new Ads());
    }

    public function testIsEmpty()
    {
        $file = new Files();
        $this->assertEmpty($file->getPath());
        $this->assertEmpty($file->getAd());
    }
}
