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
/*         $crawler = $this->client->request(Request::METHOD_GET, $this->urlGenerator->generate('user_create'));
        $form = $crawler->selectButton('Ajouter')->form();
        $form['admin_user[username]'] = 'Admintest';
        $form['admin_user[password][first]'] = 'motdepasse';
        $form['admin_user[password][second]'] = 'motdepasse';
        $form['admin_user[email]'] = 'admin@gmail.com';
        $form['admin_user[roles]'] = array("0" => '["ROLE_ADMIN"]');
        $this->client->submit($form);
        $this->client->followRedirect();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK); */

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
/*     public function testEditAction()
    {
        $crawler = $this->client->request(Request::METHOD_GET, $this->urlGenerator->generate('user_edit', array('id' => 3)));
        $form = $crawler->selectButton('Modifier')->form();
        $form['admin_users[username]'] = 'NewAlpha';
        $form['admin_users[password][first]'] = 'motdepasse';
        $form['admin_users[password][second]'] = 'motdepasse';
        $form['admin_users[email]'] = 'newalpha@gmail.com';
        $form['admin_users[roles]'] = array("0" => '["ROLE_ADMIN"]');
        $this->client->submit($form);
        $this->client->followRedirect();
        $this->assertSelectorTextContains('div.alert.alert-success', 'L\'utilisateur a bien été modifié');
    }*/
} 