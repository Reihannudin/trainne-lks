<?php


namespace Repository{

    require_once __DIR__ . '/../../entity/todoList.php';
    require_once __DIR__ . '/../todoListRepository.php';

    use Entity\TodoList;
    use Repository\todoListRepository;

    class todoListRepositoryImpl implements todoListRepository{

        public array $todoList = array();

        function save(TodoList $todoList): void
        {
            $number = sizeof($this->todoList) + 1;
            $this->todoList[$number] = $todoList;
        }

        function delete(int $number): bool
        {
            if ($number > sizeof($this->todoList)){
                return false;
            }
            for ($i = $number; $i < sizeof($this->todoList); $i++) {
                $this->todoList[$i] = $this->todoList[$i + 1];
            }

            unset($this->todoList[sizeof($this->todoList)]);

            return true;
        }

        function findAll(): array
        {
            return $this->todoList;
        }
    }
}