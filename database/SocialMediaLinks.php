<?php

// Use to fetch product data
class SocialMediaLinks
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // fetch codes data using getData Method
    public function getSocialMediaLinks($table = 'socialmedia'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch codes data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }
    

    // delete code using code id
    public function deleteSocialMediaLinks($id = null, $table = 'socialmedia'){
        if($id != null){
            $result = $this->db->con->query("UPDATE {$table} SET link = NULL WHERE id={$id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF'] ."?socialmedia=deleted");
            }
            return $result;
        }
    }

    // create sql query           
    public function updateSocialMediaLinks($id,$socialmedialink){

        $result = $this->db->con->query("UPDATE `socialmedia` SET link='{$socialmedialink}' WHERE id = '{$id}';");

        if($result){
            header("Location:" . $_SERVER['PHP_SELF']."?update=success");
        }else{
            header("Location:" . $_SERVER['PHP_SELF']."?update=fail");
        }
        return $result;
    }
}

