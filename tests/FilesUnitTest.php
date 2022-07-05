<?php

namespace App\Tests;

use App\Entity\Files;
use App\Entity\Ads;
use App\Entity\Categories;
use PHPUnit\Framework\TestCase;

class FilesUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $file = new Files();
        $ad = new Ads();
        $category = new Categories();

        $file->setPath('path/path')
            ->setAd($ad)
            ->setCategory($category);

        $this->assertTrue($file->getPath() === "path/path");
        $this->assertTrue($file->getAd() === $ad);
        $this->assertTrue($file->getCategory() === $category);
    }

    public function testIsFalse(): void
    {
        $file = new Files();
        $ad = new Ads();
        $category = new Categories();

        $file->setPath('path/path')
            ->setAd($ad)
            ->setCategory($category);

        $this->assertFalse($file->getPath() === "false");
        $this->assertFalse($file->getAd() === new Ads());
        $this->assertFalse($file->getCategory() === new Categories());
    }

    public function testIsEmpty()
    {
        $file = new Files();
        $this->assertEmpty($file->getPath());
        $this->assertEmpty($file->getAd());
        $this->assertEmpty($file->getCategory());
    }
}
