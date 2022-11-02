<?php

use Service\todoListServiceImpl;

require_once __DIR__ . '/../service/todoListService.php';
require_once __DIR__ . '/../service/impl/todoListServiceImpl.php';
require_once __DIR__ . '/../repository/todoListRepository.php';
require_once __DIR__ . '/../repository/impl/todoListRepositoryImpl.php';
require_once __DIR__ . '/../entity/todoList.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../view/todoListView.php';

use \Entity\TodoList;
use \Repository\todoListRepositoryImpl;
//use \Service\todoListServiceImpl;
use \View\todoListView;

function testShowTodoList() : void{

    $connection = \Config\database::getConnection();
    $todoListRepository = new todoListRepositoryImpl($connection);
    $todoListService = new \Service\todoListServiceImpl($todoListRepository);
    $todoListView = new todoListView($todoListService);

//    $todoListService->addTodoList("Belajar PHP");
//    $todoListService->addTodoList("Belajar OPP");
//    $todoListService->addTodoList("Belajar Database");

    $todoListService->showTodoList();

}

function testAddTodoList() : void{

    $connection = \Config\database::getConnection();
    $todoListRepository = new \Repository\todoListRepositoryImpl($connection);
    $todoListService = new todoListServiceImpl($todoListRepository);

    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar OPP");
    $todoListService->addTodoList("Belajar Database");

//    $todoListService->showTodoList();

}


function testDeleteTodoList() : void{

    $connection = \Config\database::getConnection();
    $todoListRepository = new \Repository\todoListRepositoryImpl($connection);
    $todoListService = new todoListServiceImpl($todoListRepository);

    echo $todoListService->deleteTodoList(1). PHP_EOL;
    echo $todoListService->deleteTodoList(2). PHP_EOL;
    echo $todoListService->deleteTodoList(3). PHP_EOL;
    echo $todoListService->deleteTodoList(4). PHP_EOL;
    echo $todoListService->deleteTodoList(5). PHP_EOL;
    echo $todoListService->deleteTodoList(6). PHP_EOL;
    echo $todoListService->deleteTodoList(7). PHP_EOL;

}


testShowTodoList();