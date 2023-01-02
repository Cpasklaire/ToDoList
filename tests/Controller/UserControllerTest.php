<?php

namespace App\Tests\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserControllerTest extends WebTestCase
{
    public function setUp(): void

    {
        $this->client = static::createClient();
        $this->userRepository = $this->client->getContainer()->get('doctrine.orm.entity_manager')->getRepository(User::class);
        $this->user = $this->userRepository->findOneByEmail('absinthe_lafeeverte@hotmail.fr');
        $this->urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->loginUser($this->user);
    }

    public function testListAction()
    {
        $crawler = $this->client->request(Request::METHOD_GET, $this->urlGenerator->generate('user_list'));
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
    public function testCreateAction(): void
    {
        $crawler = $this->client->request(Request::METHOD_GET, $this->urlGenerator->generate('user_create'));
        $form = $crawler->selectButton('Ajouter')->form();
        $form['user[username]'] = 'Admintest';
        $form['user[password][first]'] = 'motdepasse';
        $form['user[password][second]'] = 'motdepasse';
        $form['user[email]'] = 'admin@gmail.com';
        $form['user[Roles]'] = 'ROLE_ADMIN';
        $this->client->submit($form);
        $this->client->followRedirect();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $this->user = $this->userRepository->findOneByEmail('absinthe_lafeeverte@hotmail.fr');
        $this->urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->loginUser($this->user);

        $crawler = $this->client->request(Request::METHOD_GET, $this->urlGenerator->generate('user_create'));
        $form = $crawler->selectButton('Ajouter')->form();
        $form['user[username]'] = 'Usertest';
        $form['user[password][first]'] = 'motdepasse';
        $form['user[password][second]'] = 'motdepasse';
        $form['user[email]'] = 'user@gmail.com';
        $this->client->submit($form);
        $this->client->followRedirect();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
    public function testEditAction()
    {
        $crawler = $this->client->request(Request::METHOD_GET, $this->urlGenerator->generate('user_edit', array('id' => 4)));
        $form = $crawler->selectButton('Modifier')->form();
        $form['user[username]'] = 'Amodifier';
        $form['user[password][first]'] = 'motdepasse';
        $form['user[password][second]'] = 'motdepasse';
        $form['user[email]'] = 'Amodifier@gmail.com';
        $form['user[Roles]'] = 'ROLE_ADMIN';
        $this->client->submit($form);
        $this->client->followRedirect();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
} 