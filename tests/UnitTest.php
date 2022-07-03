<?php

namespace App\Tests;

use App\Entity\Test;
use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
    public function testDemo()
    {
        $test = new Test();

        $test->setTest('test');

        $this->assertTrue($test->getTest() === 'test');
    }
}
