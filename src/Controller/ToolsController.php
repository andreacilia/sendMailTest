<?php

declare(strict_types=1);

namespace App\Controller;

use App\Services\UsersPostsService;

/**
 * Home Controller
 *
 */
class ToolsController extends AppController
{


    public function index()
    {

        if (!empty($this->request->getData())) {
            $n_posts = $this->request->getData("nPosts");

            if (is_numeric($n_posts) && $n_posts > 0) {
                $usersPosts = new UsersPostsService;
                $dati=$usersPosts->getUsersPosts($n_posts);
                $usersPosts->inviaEmail($n_posts,$dati);
                $this->set('dati',$dati);
                $this->set('n_posts',$n_posts);
                $this->Flash->set("Email inviata con successo", ['element' => 'success']);
            } else {

                $this->Flash->set("Inserire un numero valido (>1)", ['element' => 'warning']);
            }
        }
    }

    
}
