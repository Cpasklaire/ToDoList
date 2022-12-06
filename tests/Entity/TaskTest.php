<?php

namespace App\Tests\Entity;

use App\Entity\Task;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Config\Definition\Exception\Exception;

class TaskTest extends WebTestCase
{

    public function testCreateAction()
    {
        $date = new \DateTimeImmutable;
        $user = new User();
        $task = new Task();
        $task->setTitle("Title");
        $task->setContent("Content");
        //$task->setUsers($user);
        $task->setCreatedAt($date);

        $this->assertEquals("Title", $task->getTitle());
        $this->assertEquals("Content", $task->getContent());
        //$this->assertEquals($user, $task->getUser());
        $this->assertEquals($date, $task->getCreatedAt());
    }
}