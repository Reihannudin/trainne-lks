<?php

require_once __DIR__ . '/entity/todoList.php';
require_once __DIR__ . '/helper/InputHelper.php';
require_once __DIR__ . '/repository/impl/todoListRepositoryImpl.php';
require_once __DIR__ . '/service/impl/todoListServiceImpl.php';
require_once __DIR__ . '/view/todoListView.php';

//use Entity\TodoList;
use Repository\todoListRepositoryImpl;
use Service\todoListServiceImpl;
use View\todoListView;


echo "Aplikasi Todo List" . PHP_EOL;

$todoListRepository = new todoListRepositoryImpl();
$todoListService = new todoListServiceImpl($todoListRepository);
$todoListView = new todoListView($todoListService);

$todoListView->showTodolist();