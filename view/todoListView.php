<?php

namespace View{

    use Service\todoListService;
    use Helper\InputHelper;

    class todoListView{

        private todoListService $todoListService;

        /**
         * @param todoListService $todoListService
         */
        public function __construct(todoListService $todoListService)
        {
            $this->todoListService = $todoListService;
        }

        function showTodolist():void{
            while (true){
                $this->todoListService->showTodoList();

                echo "MENU" . PHP_EOL;
                echo "1. Add Todo" . PHP_EOL;
                echo "2. Delete Todo" . PHP_EOL;
                echo "X. Exit" . PHP_EOL;

                $select = InputHelper::input("Select");

                if($select == "1"){
                    $this->addTodoList();
                } else if($select == "2"){
                    $this->deleteTodoList();;
                } else if ($select == ("x" || "X")){
                    break;
                } else {
                    echo "Pilihan tidak dimengerti" .PHP_EOL ;
                }
            }
            echo "Good Bye, See You Again" . PHP_EOL;
        }

        function addTodoList():void{
            echo "ADD TODO" . PHP_EOL;

            $todo = InputHelper::input("Todo (x||X For cancel) ");

            if ($todo == "x"){
                echo 'Cancel Add Todo' . PHP_EOL;
            } else {
//                addTodoList($todo);
                $this->todoListService->addTodoList($todo);
            }
        }

        function deleteTodoList():void{
            echo "Delete Todo" . PHP_EOL;

            $select = InputHelper::input("Nomor (x for canceled)");

            if($select == "x"){
                echo "Cancelled Delete Todo" . PHP_EOL ;
            } else{
                $this->todoListService->deleteTodoList($select) . PHP_EOL;
            }
        }
    }
}