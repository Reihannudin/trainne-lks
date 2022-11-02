<?php

//require_once __DIR__ . "/../todoListService.php";
//
namespace Service{

    require_once __DIR__ . '/../todoListService.php';

    use Entity\TodoList;
    use Repository\todoListRepository;
    use Service\todoListService;

    class todoListServiceImpl implements todoListService {

        public todoListRepository $todoListRepository;

        public function  __construct(todoListRepository $todoListRepository){
            $this->todoListRepository = $todoListRepository;
        }

        function showTodoList(): void
        {
            echo "TODOLIST" . PHP_EOL;
            $todolist = $this->todoListRepository->findAll();
            foreach ($todolist as $number => $value){
                echo "$number." . $value->getTodo() .PHP_EOL;
            }
        }

        function addTodoList(string $todo): void
        {
            $todolist = new TodoList($todo);
            $this->todoListRepository->save($todolist);
            echo 'success add todo';

        }

        function deleteTodoList(int $number): void
        {
            if ($this->todoListRepository->delete($number)){
                echo "Success deleted Todd" .  PHP_EOL;
            } else {
                echo "Failed deleted Todo" . PHP_EOL;
            }
        }
    }
}
