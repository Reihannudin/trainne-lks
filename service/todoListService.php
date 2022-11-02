<?php

namespace Service {
    interface todoListService{

        function showTodoList() : void;

        function addTodoList(string $todo) : void;

        function deleteTodoList(int $number) : void;
    }
}