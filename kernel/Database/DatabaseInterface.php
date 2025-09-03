<?php

namespace App\Kernel\Database;

interface DatabaseInterface
{

    public function insert($table, $data);
    public function first($table, $conditions = []);


}