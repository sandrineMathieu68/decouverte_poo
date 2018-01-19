<?php

namespace Ksr\MyfridgeFood\Model;

class Pdo
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        return $db;
    }
}