<?php

// Use to fetch product data
class WorkoutGuides
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // fetch codes data using getData Method
    public function getWorkoutGuides($table = 'workoutguides'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch codes data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }
    
    // create sql query           
    public function addWorkoutGuides($title,$description,$price, $guid){

        $result = $this->db->con->query("INSERT INTO `workoutguides`(title,description,price,guid) VALUES ('{$title}', '{$description}', '{$price}', '{$guid}')");

        if($result){
            header("Location:" . $_SERVER['PHP_SELF']."?upload=success");
        }else{
            header("Location:" . $_SERVER['PHP_SELF']."?upload=fail");
        }
        return $result;
         
    }

    // delete code using code id
    public function deleteWorkoutGuides($id = null, $table = 'workoutguides'){
        if($id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE id={$id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF'] ."?guide=deleted");
            }
            return $result;
        }
    }

    // create sql query           
    public function updateWorkoutGuides($id,$title,$desc,$price,$guid){

        $updates = array();
        if (!empty($title))
            $updates[] = 'title="'.$title.'"';
        if (!empty($desc))
            $updates[] = 'description="'.$desc.'"';
        if (!empty($price))
            $updates[] = 'price="'.$price.'"';
        if (!empty($guid))
            $updates[] = 'guid="'.$guid.'"';
        $updates = implode(', ', $updates);

        $result = $this->db->con->query("UPDATE `workoutguides` SET {$updates} WHERE id = '{$id}';");
        // $variable = "UPDATE `codes` SET $updates WHERE id = '{$id}';";
        // echo $variable;

        if($result){
            header("Location:" . $_SERVER['PHP_SELF']."?update=success");
        }else{
            header("Location:" . $_SERVER['PHP_SELF']."?update=fail");
        }
        return $result;
    }
}

