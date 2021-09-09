<?php
namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use App\Services\UsersPostsService;
 
use Cake\Console\ConsoleOptionParser;

class SendMailCommand extends Command
{

  protected function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser->addArgument('nposts', [
            'help' => 'Inserisci il numero di posts da inviare'
        ]);
        return $parser;
    }

    public function execute(Arguments $args, ConsoleIo $io)
    {
      $n_posts = $args->getArgument('nposts');
      if (empty($n_posts)) $n_posts=3;
      if (is_numeric($n_posts) && $n_posts > 0) {
        $usersPosts = new UsersPostsService;
        $dati=$usersPosts->getUsersPosts($n_posts);
        $usersPosts->inviaEmail($n_posts,$dati);
        $io->out("Email inviata con successo!");
      }else{
        $io->out("Inserire un numero valido (>1)");
      }
     
    }
}