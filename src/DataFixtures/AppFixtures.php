<?php

namespace App\DataFixtures;

use App\Entity\Task;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        $ano = new User();
        $ano->setUsername("Anonyme");
        $ano->setEmail("anonyme@mail.com");
        $ano->setRoles(["ROLE_USER"]);
        $ano->setPassword($this->userPasswordHasher->hashPassword($ano, "motdepasse"));
        $manager->persist($ano);

        $user = new User();
        $user->setUsername("Administrateur");
        $user->setEmail("absinthe_lafeeverte@hotmail.fr");
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setPassword($this->userPasswordHasher->hashPassword($user, "motdepasse"));
        $manager->persist($user);
        $listUser[] = $user;

        $user = new User();
        $user->setUsername("Utilisateur");
        $user->setEmail("sasha.leroux92@gmail.com");
        $user->setRoles(["ROLE_USER"]);
        $user->setPassword($this->userPasswordHasher->hashPassword($user, "motdepasse"));
        $manager->persist($user);
        $listUser[] = $user;

        $task = new Task();
        $task->setTitle("Tache anonyme");
        $task->setContent("Contenu");
        $task->setAuthor($ano);
        $task->setCreatedAt(new \DateTimeImmutable);
        $task->setIsDone(false);
        $manager->persist($task);

        $task = new Task();
        $task->setTitle("Tache 1");
        $task->setContent("Contenu");
        $task->setAuthor($listUser[array_rand($listUser)]);
        $task->setCreatedAt(new \DateTimeImmutable);
        $task->setIsDone(false);
        $manager->persist($task);

        $task = new Task();
        $task->setTitle("Tache 2");
        $task->setContent("contenu");
        $task->setAuthor($listUser[array_rand($listUser)]);
        $task->setCreatedAt(new \DateTimeImmutable);
        $task->setIsDone(false);
        $manager->persist($task);

        $task = new Task();
        $task->setTitle("Tache 3");
        $task->setContent("contenu");
        $task->setAuthor($listUser[array_rand($listUser)]);
        $task->setCreatedAt(new \DateTimeImmutable);
        $task->setIsDone(false);
        $manager->persist($task);

        $task = new Task();
        $task->setTitle("Tache 4");
        $task->setContent("contenu");
        $task->setAuthor($listUser[array_rand($listUser)]);
        $task->setCreatedAt(new \DateTimeImmutable);
        $task->setIsDone(false);
        $manager->persist($task);

        $manager->flush();
    }
}
