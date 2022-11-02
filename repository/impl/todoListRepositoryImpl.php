<?php


namespace Repository{

    require_once __DIR__ . '/../../entity/todoList.php';
    require_once __DIR__ . '/../todoListRepository.php';

    use Entity\TodoList;
    use Repository\todoListRepository;

    class todoListRepositoryImpl implements todoListRepository{

        public array $todoList = array();

//        make connection to database
        private \PDO $connection;
        public function __construct(\PDO $connection)
        {
            $this->connection = $connection;
        }

        function save(TodoList $todoList): void
        {
//            $number = sizeof($this->todoList) + 1;
//            $this->todoList[$number] = $todoList;

//            make sql
            $sql = "insert into todolist(todo) values (?)";
            $statement = $this->connection->prepare($sql);

            $statement->execute([$todoList->getTodo()]);

        }

        function delete(int $number): bool
        {
//            if ($number > sizeof($this->todoList)){
//                return false;
//            }
//            for ($i = $number; $i < sizeof($this->todoList); $i++) {
//                $this->todoList[$i] = $this->todoList[$i + 1];
//            }
//
//            unset($this->todoList[sizeof($this->todoList)]);
//
//            return true;

            $sql = "select id from todolist where id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$number]);

            if($statement->fetch()){
                $sql = "delete from todolist where id = ?";
                $statement = $this->connection->prepare($sql);
                $statement->execute([$number]);
                return true;
            } else{
                return false;
            }
        }

        function findAll(): array
        {
            // return $this->todolist;
            $sql = "SELECT id, todo FROM todolist";
            $statement = $this->connection->prepare($sql);
            $statement->execute();

            $result = [];

            foreach ($statement as $row) {
                $todolist = new Todolist();
                $todolist->setId($row['id']);
                $todolist->setTodo($row['todo']);

                $result[] = $todolist;
            }

            return $result;
        }
    }

}