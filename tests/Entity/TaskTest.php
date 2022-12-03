<?php

namespace App\Tests\Entity;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Config\Definition\Exception\Exception;

class TaskTest extends WebTestCase
{
    public function testCreateTask()
    {
        $task = new Task();
        $task->setTitle("Title")
            ->setContent("Content");

        $this->assertEquals("Title", $task->getTitle());
        $this->assertEquals("Content", $task->getContent());
    }
}