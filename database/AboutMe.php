<?php

// Use to fetch product data
class AboutMe
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // fetch product data using getData Method
    public function getAboutMe($table = 'aboutme'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    // delete blog using blog id
    public function deleteAboutMeImage($id = null, $table = 'aboutme'){
        if($id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE id={$id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF'] ."?aboutme=deleted");
            }
            return $result;
        }
    }


    public function uploadImage($aboutmeImage){

        $fileName = $aboutmeImage['name'];
        $fileTmpName = $aboutmeImage['tmp_name'];
        $fileSize = $aboutmeImage['size'];
        $fileError = $aboutmeImage['error'];
        $fileType = $aboutmeImage['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg','jpeg','png','pdf','svg');

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                    
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $upload_dir = "/assets/aboutme/";
                    $newPath = realpath(__DIR__."/..").$upload_dir.$fileNameNew;
                    $queryPath = '/aboutme/'.$fileNameNew;

                    if(move_uploaded_file($fileTmpName,$newPath))
                    {
                        header("Location:" . $_SERVER['PHP_SELF']."?upload=success");
                    }else{
                        header("Location:" . $_SERVER['PHP_SELF']."?upload=fail");
                    }
                   
                } else{
                    echo "Your file is too big.";
                }

            }else{
                echo "There was an error uploading your file.";
            }
        }else{
            echo "You cannot upload files of this type.";
        }
        
        return $queryPath;
        
    }

    // create sql query           
    public function addAboutMeImage($imageLink,$aboutmeImage){

        $updatedImage = $this->uploadImage($aboutmeImage);

        $result = $this->db->con->query("INSERT INTO `aboutme`(imagelink,image) VALUES ('{$imageLink}', '{$updatedImage}')");

        if($result){
            header("Location:" . $_SERVER['PHP_SELF']."?upload=success");
        }else{
            header("Location:" . $_SERVER['PHP_SELF']."?upload=fail");
        }
        return $result;
         
    }

    // create sql query           
    public function updateAboutMe($id,$heading,$aboutme,$imagelink,$aboutmeimage){
        
        $updatedImage = $this->uploadImage($aboutmeimage);

        $updates = array();
        if (!empty($heading))
            $updates[] = 'heading="'.$heading.'"';
        if (!empty($aboutme))
            $updates[] = 'aboutme="'.$aboutme.'"';
        if (!empty($imagelink))
            $updates[] = 'imagelink="'.$imagelink.'"';
        if (!empty($updatedImage))
            $updates[] = 'image="'.$updatedImage.'"';
        $updates = implode(', ', $updates);
        
        $result = $this->db->con->query("UPDATE `aboutme` SET $updates WHERE id = '{$id}';");

        //echo htmlspecialchars($blogContent);

        if($result){
            header("Location:" . $_SERVER['PHP_SELF']."?update=success");
        }else{
            header("Location:" . $_SERVER['PHP_SELF']."?update=fail");
        }
        return $result;
    }

}