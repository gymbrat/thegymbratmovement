<?php

// Use to fetch product data
class BlogComments
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // fetch product data using getData Method
    public function getBlogComments($table = 'blogcomments'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    // insert into cart table
    public  function insertIntoBlogComments($params = null, $table = "blogcomments"){
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into blogcomments(blogId,commenter-name,comment-date,comment) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',' , array_values($params));

                // create sql query
                 $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;

                //echo $values;

                echo $query_string;
            }
        }
    }

    // to get user_id and item_id and insert into cart table
    public  function addToBlog($blogId, $commentername, $comment){
        if (true){
            $params = array(
                "blogId" => $blogId,
                "commenter_name" => "'".$commentername."'",
                "comment" => "'".$comment."'"
            );

            // insert data into cart
            $result = $this->insertIntoBlogComments($params);
            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']."?blog_id=".$blogId."#comment-box");
            }
        }
    }

    // delete blog using blog id
    public function deleteBlog($blog_id = null, $table = 'blogs'){
        if($blog_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE blogId={$blog_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF'] ."?blog=deleted");
            }
            return $result;
        }
    }


    public function uploadImage($blogImage){

        $fileName = $blogImage['name'];
        $fileTmpName = $blogImage['tmp_name'];
        $fileSize = $blogImage['size'];
        $fileError = $blogImage['error'];
        $fileType = $blogImage['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg','jpeg','png','pdf','svg');

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                    
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $upload_dir = "/assets/blog/";
                    $newPath = realpath(__DIR__."/..").$upload_dir.$fileNameNew;
                    $queryPath = '/blog/'.$fileNameNew;

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
    public function addBlog($blogTitle,$blogSummary,$blogImage,$blogContent){

        $updatedImage = $this->uploadImage($blogImage);

        // $updatedContent = str_replace('"',"'",$blogContent);
        //$result = $this->db->con->query("INSERT INTO `blogs`(blogTitle,blogImage,summary,content) VALUES ('{$blogTitle}', '{$updatedImage}', '{$blogSummary}', '{$blogContent}')");

         $updates = array();
        if (!empty($blogTitle))
            $updates[] = "'".$blogTitle."'";
        if (!empty($updatedImage))
            $updates[] = "'".$updatedImage."'";
        if (!empty($blogSummary))
            $updates[] = "'".$blogSummary."'";
        if (!empty($blogContent) && strlen($blogContent) > 68)
            $updates[] = "'".$blogContent."'";
        $updates = implode(', ', $updates);

        $variable = "INSERT INTO `blogs`(blogTitle,blogImage,summary,content) VALUES ($updates)";
        echo $variable;

        $result = $this->db->con->query("INSERT INTO `blogs`(blogTitle,blogImage,summary,content) VALUES ($updates)");

        if($result){
            header("Location:" . $_SERVER['PHP_SELF']."?upload=success");
        }else{
            header("Location:" . $_SERVER['PHP_SELF']."?upload=fail");
        }
        return $result;
         
    }

    // create sql query           
    public function updateBlog($id,$blogTitle,$blogSummary,$blogImage,$blogContent){
        
        $updatedImage = $this->uploadImage($blogImage);

        $updates = array();
        if (!empty($blogTitle))
            $updates[] = 'blogTitle="'.$blogTitle.'"';
        if (!empty($updatedImage))
            $updates[] = 'blogImage="'.$updatedImage.'"';
        if (!empty($blogSummary))
            $updates[] = 'summary="'.$blogSummary.'"';
        if (!empty($blogContent) && strlen($blogContent) > 68)
            $updates[] = 'content="'.str_replace('"',"'",$blogContent).'"';
        $updates = implode(', ', $updates);
        
        $result = $this->db->con->query("UPDATE `blogs` SET $updates WHERE blogId = '{$id}';");

        //echo htmlspecialchars($blogContent);

        if($result){
            header("Location:" . $_SERVER['PHP_SELF']."?update=success");
        }else{
            header("Location:" . $_SERVER['PHP_SELF']."?update=fail");
        }
        return $result;
    }

}