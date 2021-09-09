<?php

namespace App\Services;

use Cake\Http\Client;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;

 class  UsersPostsService
{

    public function __construct()
    {
    }

    private function getUsers()
    {
        $http = new Client();
        $users = [];
        // Simple get
        $response = $http->get('https://jsonplaceholder.typicode.com/users');
        $stream = $response->getBody();

        // Read a stream 100 bytes at a time.
        while (!$stream->eof()) {
            $users = $response->getJson();
        }
        return $users;
    }

    private function getPosts()
    {
        $http = new Client();
        $posts = [];
        // Simple get
        $response = $http->get('https://jsonplaceholder.typicode.com/posts');
        $stream = $response->getBody();

        // Read a stream 100 bytes at a time.
        while (!$stream->eof()) {
            $posts = $response->getJson();
        }
        return $posts;
    }


    public function getUsersPosts($n_posts = 3)
    {
        $usersPosts = [];

        $users = $this->getUsers();
        $posts = $this->getPosts();

        foreach ($users as $user) {
            if (!array_key_exists($user["id"], $usersPosts)) {
                $usersPosts[$user["id"]]["name"] = $user["name"];
                $usersPosts[$user["id"]]["posts"] = [];
            }
        }
        foreach ($posts as $post) {
            if (count($usersPosts[$post["userId"]]["posts"]) < $n_posts) {
                $usersPosts[$post["userId"]]["posts"][]["title"] = $post["title"];
            } else {
                continue;
            }
        }

        return $usersPosts;
    }

    public function inviaEmail($n_posts,$usersPosts)
    {
        TransportFactory::setConfig('mailtrap', [
            'host' => 'smtp.mailtrap.io',
            'port' => 2525,
            'username' => 'ce38ab4d532b49',
            'password' => 'a2e25c5e7d6f05',
            'className' => 'Smtp'
        ]);
        
        $mailer = new Mailer();

        $mailer->setTransport('mailtrap');
        $mailer->setEmailFormat('html')
            ->setTo('mario.rossi@example.com')
            ->setFrom('testapp@example.com')
            ->setSubject('Riepilogo ultimi post')
            ->setViewVars(['usersPosts' => $usersPosts,'n_posts'=>$n_posts])
            ->viewBuilder()
            ->setTemplate('usersposts');

        $mailer->deliver();

    
    }
}
