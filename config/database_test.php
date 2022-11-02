<?php

require_once __DIR__ . '/database.php';
use \Config\database;

$db = database::getConnection();
echo "Sucessfully make connection to database";