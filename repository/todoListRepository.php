<?php

namespace  Repository{

    use Entity\TodoList;

    interface todoListRepository{

        function save(TodoList $todoList) : void;

        function delete(int $number) : bool;

        function  findAll():array;

    }
}