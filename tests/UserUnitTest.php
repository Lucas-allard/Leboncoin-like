<?php

namespace App\Tests;

use App\Entity\Users;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new Users();

        $user->setEmail('true@test.com')
            ->setFirstName('first name')
            ->setLastName('last name')
            ->setPassword('password')
            ->setPhoneNumber('phone number');

        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getFirstName() === 'first name');
        $this->assertTrue($user->getLastName() === 'last name');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getPhoneNumber() === 'phone number');
    }

    public function testIsFalse()
    {
        $user = new Users();

        $user->setEmail('true@test.com')
            ->setFirstName('first name')
            ->setLastName('last name')
            ->setPassword('password')
            ->setPhoneNumber('phone number');

        $this->assertFalse($user->getEmail() === 'false@test.com');
        $this->assertFalse($user->getFirstName() === 'false');
        $this->assertFalse($user->getLastName() === 'false');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getPhoneNumber() === 'false');
    }

    public function testIsEmpty()
    {
        $user = new Users();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getFirstName());
        $this->assertEmpty($user->getLastName());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getPhoneNumber());
    }
}
