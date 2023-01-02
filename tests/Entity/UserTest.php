<?php

namespace Tests\App\Entity;

use App\Entity\Task;
use App\Entity\TaskTest;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class UserTest extends WebTestCase
{
    public function testCreateUser()
    {
        $password = "motdepasse";
        $dateImmutable = \DateTime::createFromFormat('Y-m-d H:i:s', strtotime('now'));
        $userPasswordHasher = $this->getMockBuilder('Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface')
            ->disableOriginalConstructor()
            ->getMock();
        $userPasswordHasher->method('hashPassword')->willReturn($password);
        $user = new User();
        $user->setEmail("user@email.com");
        $user->setRoles(["ROLE_USER"]);
        $user->setUsername("newuser");
        $user->setPassword($password);

        $this->assertEquals("user@email.com", $user->getEmail());
        $this->assertEquals(["ROLE_USER"], $user->getRoles());
        $this->assertEquals("newuser", $user->getUsername());
        $this->assertEquals("motdepasse", $user->getPassword());
        $this->assertEquals($user->getUsername(), $user->getUserIdentifier());
    }
}