<?php

namespace Tests\App\Entity;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserTest extends WebTestCase
{
    public function testCreateUser() //UserPasswordHasherInterface $passwordHasher
    {
        $user = new User();
        
        //$plaintextPassword = "motdepasse";
        //$hashedPassword = $passwordHasher->hashPassword($user,$plaintextPassword);

        $user->setEmail("user@email.com")
            ->setUsername("newuser");
        //$user->setPassword($hashedPassword);

        $this->assertEquals("user@email.com", $user->getEmail());
        $this->assertEquals(["ROLE_USER"], $user->getRoles());
        $this->assertEquals("newuser", $user->getUsername());
        //$this->assertEquals($passwordHasher->hashPassword($user,"motdepasse"), $user->setPassword());
    }
}