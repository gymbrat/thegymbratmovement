<?php

// Use to fetch product data
class Codes
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // fetch codes data using getData Method
    public function getCodes($table = 'codes'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch codes data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    // create sql query           
    public function addCode($brand,$link,$code){

        $result = $this->db->con->query("INSERT INTO `codes`(brand,link,code) VALUES ('{$brand}', '{$link}', '{$code}')");

        if($result){
            header("Location:" . $_SERVER['PHP_SELF']."?upload=success");
        }else{
            header("Location:" . $_SERVER['PHP_SELF']."?upload=fail");
        }
        return $result;
         
    }

    // delete code using code id
    public function deleteCode($code_id = null, $table = 'codes'){
        if($code_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE id={$code_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF'] ."?code=deleted");
            }
            return $result;
        }
    }

    // create sql query           
    public function updateCode($id,$brand,$link,$code){

        $updates = array();
        if (!empty($brand))
            $updates[] = 'brand="'.$brand.'"';
        if (!empty($link))
            $updates[] = 'link="'.$link.'"';
        if (!empty($code))
            $updates[] = 'code="'.$code.'"';
        $updates = implode(', ', $updates);

        $result = $this->db->con->query("UPDATE `codes` SET {$updates} WHERE id = '{$id}';");
        $variable = "UPDATE `codes` SET $updates WHERE id = '{$id}';";
        echo $variable;

        if($result){
            header("Location:" . $_SERVER['PHP_SELF']."?update=success");
        }else{
            header("Location:" . $_SERVER['PHP_SELF']."?update=fail");
        }
        return $result;
    }
}

