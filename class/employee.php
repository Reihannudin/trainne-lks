<?php

class Employee{
//    make connection
    private $conn;

//    get table
    private $db_table = "employee";

//    get columns in table
    public $id;
    public $name;
    public $email;
    public $age;
    public $designation;
    public $created;

//    Db connection
    public function __construct($db){
        $this->conn = $db;
    }

//    Get all
    public function getEmployee(){
        $sqlQuery =  "select id, name, email, age, designation, created from " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

//    create data
    public function createEmployee(){

        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        name = :name, 
                        email = :email, 
                        age = :age, 
                        designation = :designation, 
                        created = :created";

        $stmt = $this->conn->prepare($sqlQuery);

//        sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->age=htmlspecialchars(strip_tags($this->age));
        $this->designation=htmlspecialchars(strip_tags($this->designation));
        $this->created=htmlspecialchars(strip_tags($this->created));

//        binc data
        $stmt->bindParam(":name" , $this->name);
        $stmt->bindParam(":email" , $this->email);
        $stmt->bindParam(":age" , $this->age);
        $stmt->bindParam(":designation" , $this->designation);
        $stmt->bindParam(":created" , $this->created);

        if ($stmt -> execute()){
            return true;
        }
        return false;
    }

//    read single
    public function getSingleEmployee(){
        $sqlQuery = "select
                        id,  
                        name, 
                        email,
                        age, 
                        designation,
                        created
                      from
                     " . $this->db_table . "
                        where
                            id = ?
                        limit 0,1
                     ";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1 , $this->id);
        $stmt->execute();
        $dataRow =  $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $dataRow['name'];
        $this->email = $dataRow['email'];
        $this->age = $dataRow['age'];
        $this->designation = $dataRow['designation'];
        $this->created = $dataRow['created'];
    }

//    update
    public function  updateEmployee(){
        $sqlQuery = "UPDATE
                    " . $this->db_table ."
                      SET
                        name = :name, 
                        email = :email, 
                        age = :age, 
                        designation = :designation, 
                        created = :created
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->age=htmlspecialchars(strip_tags($this->age));
        $this->designation=htmlspecialchars(strip_tags($this->designation));
        $this->created=htmlspecialchars(strip_tags($this->created));


        // bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":designation", $this->designation);
        $stmt->bindParam(":created", $this->created);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

//    Delete
    function deleteEmployee(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
}