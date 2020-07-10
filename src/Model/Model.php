<?php

namespace App\Model;

use TexLab\MyDB\Runner;
use App\Core\Config;
use TexLab\MyDB\DB;

class Model
{
    private $runner;
    public function __construct()
    {
        $this->runner = new Runner(DB::Link([
            'host' => Config::MYSQL_HOST,
            'username' => Config::MYSQL_USER_NAME,
            'password' => Config::MYSQL_PASSWORD,
            'dbname' => Config::MYSQL_DATABASE 
        ]));
    }
    public function checkUser(string $login, string $password)
    {
       return $this->runner->runSQL(
           <<<SQL
SELECT `group`. `kod` 
FROM `group`,`users` 
WHERE `group`.`id` = `users`.`group_id` AND `login` = '$login' AND `password` = '$password'
SQL
        );    
    }
}