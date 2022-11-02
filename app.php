<?php

require_once __DIR__ . '/entity/todoList.php';
require_once __DIR__ . '/helper/InputHelper.php';
require_once __DIR__ . '/repository/impl/todoListRepositoryImpl.php';
require_once __DIR__ . '/service/impl/todoListServiceImpl.php';
require_once __DIR__ . '/view/todoListView.php';
require_once __DIR__ . '/config/database.php';

//use Entity\TodoList;
use Repository\todoListRepositoryImpl;
use Service\todoListServiceImpl;
use View\todoListView;


echo "Aplikasi Todo List" . PHP_EOL;

$connection = \config\database::getConnection();
$todoListRepository = new todoListRepositoryImpl($connection);
$todoListService = new todoListServiceImpl($todoListRepository);
$todoListView = new todoListView($todoListService);

$todoListView->showTodolist();