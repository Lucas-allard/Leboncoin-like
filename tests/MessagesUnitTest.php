<?php

namespace App\Tests;

use App\Entity\Messages;
use App\Entity\Users;
use DateTime;
use PHPUnit\Framework\TestCase;

class MessagesUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $message = new Messages();
        $datetime = new DateTime();
        $sender = new Users();
        $recipient = new Users();

        $message->setTitle('title')
                ->setMessage('message')
                ->setCreatedAt($datetime)
                ->setSender($sender)
                ->setRecipient($recipient)
                ->setIsRead(true);

        $this->assertTrue($message->getTitle() === 'title');
        $this->assertTrue($message->getMessage() === 'message');
        $this->assertTrue($message->getSender() === $sender);
        $this->assertTrue($message->getRecipient() === $recipient);
        $this->assertTrue($message->isIsRead() === true);
    }

    public function testIsFalse(): void
    {
        $message = new Messages();
        $datetime = new DateTime();
        $sender = new Users();
        $recipient = new Users();

        $message->setTitle('title')
                ->setMessage('message')
                ->setCreatedAt($datetime)
                ->setSender($sender)
                ->setRecipient($recipient)
                ->setIsRead(true);

        $this->assertFalse($message->getTitle() === 'false');
        $this->assertFalse($message->getMessage() === false);
        $this->assertFalse($message->getSender() === new Users());
        $this->assertFalse($message->getRecipient() === new Users());
        $this->assertFalse($message->isIsRead() === false);
    }

    public function testIsEmpty(): void 
    {
        $message = new Messages();

        $this->assertEmpty($message->getTitle());
        $this->assertEmpty($message->getMessage());
        $this->assertEmpty($message->getSender());
        $this->assertEmpty($message->getRecipient());
        $this->assertEmpty($message->isIsRead());
    }
}
