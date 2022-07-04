<?php

namespace App\Tests;

use App\Entity\Categories;
use PHPUnit\Framework\TestCase;

class CategoriesUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new Categories();

        $user->setName('name')
            ->setSlug('slug');

        $this->assertTrue($user->getName() === 'name');
        $this->assertTrue($user->getSlug() === 'slug');
    }

    public function testIsFalse()
    {
        $user = new Categories();

        $user->setName('name')
            ->setSlug('slug');

        $this->assertFalse($user->getName() === 'false@test.com');
        $this->assertFalse($user->getSlug() === 'false');
    }

    public function testIsEmpty()
    {
        $user = new Categories();

        $this->assertEmpty($user->getName());
        $this->assertEmpty($user->getSlug());
    }
}
