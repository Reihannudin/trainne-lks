<?php

require_once __DIR__ . '/../entity/todoList.php';
require_once __DIR__ . '/../repository/impl/todoListRepositoryImpl.php';
//require_once __DIR__ . '/../repository/todoListRepository.php';
require_once __DIR__ . '/../service/impl/todoListServiceImpl.php';
require_once __DIR__ . '/../view/todoListView.php';
require_once __DIR__ . '/../helper/InputHelper.php';

use \Entity\TodoList;
use \Repository\todoListRepositoryImpl;
use \Service\todoListServiceImpl;
use \View\todoListView;

function testViewShowTodoList() : void{
    $todoListRepository = new todoListRepositoryImpl();
    $todoListService = new todoListServiceImpl($todoListRepository);
    $todoListView = new todoListView($todoListService);

    $todoListService->addTodoList("Belajar PHP Dasar");
    $todoListService->addTodoList("Belajar PHP OOP");
    $todoListService->addTodoList("Belajer PHP DATABASE");

    $todoListView->showTodolist();
}

function testViewAddTodoList() : void{
    $todoListRepository = new todoListRepositoryImpl();
    $todoListService = new todoListServiceImpl($todoListRepository);
    $todoListView = new todoListView($todoListService);

    $todoListService->addTodoList("Belajar PHP Dasar");
    $todoListService->addTodoList("Belajar PHP OOP");
    $todoListService->addTodoList("Belajer PHP DATABASE");

    $todoListService->showTodolist();

    $todoListView->addTodoList();

    $todoListService->showTodoList();

    $todoListView->addTodoList();

    $todoListService->showTodoList();

}


function testViewDeleteTodoList() : void{
    $todoListRepository = new todoListRepositoryImpl();
    $todoListService = new todoListServiceImpl($todoListRepository);
    $todoListView = new todoListView($todoListService);

    $todoListService->addTodoList("Belajar PHP Dasar");
    $todoListService->addTodoList("Belajar PHP OOP");
    $todoListService->addTodoList("Belajer PHP DATABASE");

    $todoListService->showTodolist();

    $todoListView->deleteTodoList();

    $todoListService->showTodoList();

    $todoListView->deleteTodoList();

    $todoListService->showTodoList();


}


testViewDeleteTodoList();