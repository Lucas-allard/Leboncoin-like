<?php

// namespace App\Tests;

// use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

// class FunctionalTest extends WebTestCase
// {
//     public function testShouldDisplayTest()
//     {
//         $client = static::createClient();
//         $client->followRedirects();
//         $crawler = $client->request('GET', '/test');

//         $this->assertResponseIsSuccessful();
//         $this->assertSelectorTextContains('h1', 'Test index');
//     }

//     public function testShouldDisplayCreateNewTest()
//     {
//         $client = static::createClient();
//         $client->followRedirects();
//         $crawler = $client->request('GET', '/test/new');

//         $this->assertResponseIsSuccessful();
//         $this->assertSelectorTextContains('h1', 'Create new Test');
//     }

//     public function testShouldAddNewTest()
//     {
//         $client = static::createClient();
//         $client->followRedirects();
//         $crawler = $client->request('GET', '/test/new');

//         $buttonCrawlerNode = $crawler->selectButton('Save');

//         $form = $buttonCrawlerNode->form();

//         $uuid = uniqid();

//         $form = $buttonCrawlerNode->form([
//             'test[test]'    => 'Add Test For Test' . $uuid,
//         ]);

//         $client->submit($form);

//         $this->assertResponseIsSuccessful();
//         $this->assertSelectorTextContains('body', 'Add Test For Test' . $uuid);
//     }
// }
