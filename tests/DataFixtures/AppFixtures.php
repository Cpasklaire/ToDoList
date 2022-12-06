<?php

namespace App\Tests\DataFixtures;

use App\Entity\Task;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixturesTest extends WebTestCase
{
    private MockObject | UserPasswordHasherInterface | null $userPasswordHasher;
    private MockObject | ObjectManager | null $manager;
    public function setUp(): void
    {

        $password = "motdepasse";
        $dateImmutable = \DateTime::createFromFormat('Y-m-d H:i:s', strtotime('now'));
        $userPasswordHasher = $this->getMockBuilder('Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface')
            ->disableOriginalConstructor()
            ->getMock();
        $manager = $this->getMockBuilder('Doctrine\Persistence\ObjectManager')
            ->disableOriginalConstructor()
            ->getMock();
        $manager->method('persist')->willReturn(1);
        $userPasswordHasher->method('hashPassword')->willReturn($password);
    }
    public function testLoad(): void
    {

        $password = "motdepasse";
        $user = new User();
        $task = new Task();
        $user->setEmail("absinthe_lafeeverte@hotmail.fr");
        $user->setRoles(array("0" => "ROLE_ADMIN", "1" => "ROLE_USER"));
        $user->setUsername("Steelwix");
        $user->setPassword($password);
        $user->addTask($task);

        $this->assertEquals("absinthe_lafeeverte@hotmail.fr", $user->getEmail());
        $this->assertEquals(array("0" => "ROLE_ADMIN", "1" => "ROLE_USER"), $user->getRoles());
        $this->assertEquals("Steelwix", $user->getUsername());
        $this->assertEquals("motdepasse", $user->getPassword());
        $this->assertEquals(null, $user->getSalt());
        $this->assertEquals($user->getUsername(), $user->getUserIdentifier());


        $dateImmutable = \DateTime::createFromFormat('Y-m-d H:i:s', strtotime('now'));
        $user = new User();
        $task = new Task();
        $task->setTitle("Title");
        $task->setContent("Content");
        $task->setUser($user);
        $task->setCreatedAt($dateImmutable);

        $this->assertEquals("Title", $task->getTitle());
        $this->assertEquals("Content", $task->getContent());
        $this->assertEquals($user, $task->getUser());
        $this->assertEquals($dateImmutable, $task->getCreatedAt());
    }
}