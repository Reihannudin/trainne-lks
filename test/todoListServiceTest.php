<?php

require_once __DIR__ . '/../service/todoListService.php';
require_once __DIR__ . '/../service/impl/todoListServiceImpl.php';
require_once __DIR__ . '/../repository/todoListRepository.php';
require_once __DIR__ . '/../repository/impl/todoListRepositoryImpl.php';
require_once __DIR__ . '/../entity/todoList.php';


function testShowTodoList() : void{
    $todoListRepository = new \Repository\todoListRepositoryImpl();

    $todoListRepository->todoList[1] =  new \Entity\TodoList();
    $todoListRepository->todoList[2] =  new \Entity\TodoList();
    $todoListRepository->todoList[3] =  new \Entity\TodoList();

    $todoListService = new todoListServiceImpl($todoListRepository);

    $todoListService->showTodoList();

}

function testAddTodoList() : void{
    $todoListRepository = new \Repository\todoListRepositoryImpl();

    $todoListService = new todoListServiceImpl($todoListRepository);
    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar OPP");
    $todoListService->addTodoList("Belajar Database");

    $todoListService->showTodoList();

}


function testDeleteTodoList() : void{
    $todoListRepository = new \Repository\todoListRepositoryImpl();

    $todoListService = new todoListServiceImpl($todoListRepository);
    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar OPP");
    $todoListService->addTodoList("Belajar Database");

    $todoListService->showTodoList();

    $todoListService->deleteTodoList(1);
    $todoListService->showTodoList();
}


testDeleteTodoList();;