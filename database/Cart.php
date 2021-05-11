<?php

// php cart class
class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into cart table
    public  function insertIntoCart($params = null, $table = "cart"){
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into cart(user_id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',' , array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // to get user_id and item_id and insert into cart table
    public  function addToCart($userid, $itemid){
        if (isset($userid) && isset($itemid)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            // insert data into cart
            $result = $this->insertIntoCart($params);
            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

    // delete cart item using cart item id
    public function deleteCart($item_id = null, $table = 'cart'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

    // get item_id of shopping cart list
    public function getCartId($cartArray = null, $key = "item_id"){
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

    // Save for later
    public function saveForLater($item_id = null, $saveTable = "wishlist", $fromTable = "cart"){
        if ($item_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
            $query .= "DELETE FROM {$fromTable} WHERE item_id={$item_id};";

            // execute multiple query
            $result = $this->db->con->multi_query($query);

            echo $query;

            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
    // Add back to cart
    public function addBackToCart($item_id = null, $saveTable = "wishlist", $fromTable = "cart"){
        if ($item_id != null){
            $query = "INSERT INTO {$fromTable} SELECT * FROM {$saveTable} WHERE item_id={$item_id};";
            $query .= "DELETE FROM {$saveTable} WHERE item_id={$item_id};";

            // execute multiple query
            $result = $this->db->con->multi_query($query);
            echo $query;

            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    public function uploadImage($image){

        $fileName = $image['name'];
        $fileTmpName = $image['tmp_name'];
        $fileSize = $image['size'];
        $fileError = $image['error'];
        $fileType = $image['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg','jpeg','png','pdf', 'svg');

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                    
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $upload_dir = "/assets/products/";
                    $newPath = realpath(__DIR__."/..").$upload_dir.$fileNameNew;
                    $queryPath = '/products/'.$fileNameNew;

                    if(move_uploaded_file($fileTmpName,$newPath) )
                    {
                        header("Location:" . $_SERVER['PHP_SELF']."?upload=success1");
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
    public function addItem($brand,$name,$price,$description,$image){

        $updatedImage = $this->uploadImage($image);

         $result = $this->db->con->query("INSERT INTO `product`(item_brand,item_name,item_price,item_description,item_image) VALUES ('{$brand}', '{$name}', '{$price}', '{$description}', '{$updatedImage}')");
        if($result){
            header("Location:" . $_SERVER['PHP_SELF']."?upload=success");
        }else{
            header("Location:" . $_SERVER['PHP_SELF']."?upload=fail");
        }
        return $result;
    
    }

    // create sql query           
    public function updateItem($id,$brand,$name,$price,$description,$image){
        
        $updatedImage = $this->uploadImage($image);

        $updates = array();
        if (!empty($brand))
            $updates[] = 'item_brand="'.$brand.'"';
        if (!empty($name))
            $updates[] = 'item_name="'.$name.'"';
        if (!empty($price))
            $updates[] = 'item_price="'.$price.'"';
        if (!empty($description))
            $updates[] = 'item_description="'.$description.'"';
        if (!empty($updatedImage))
            $updates[] = 'item_image="'.$updatedImage.'"';
        $updates = implode(', ', $updates);

        $result = $this->db->con->query("UPDATE `product` SET $updates WHERE item_id = '{$id}';");

        if($result){
            header("Location:" . $_SERVER['PHP_SELF']."?update=success");
        }else{
            header("Location:" . $_SERVER['PHP_SELF']."?update=fail");
        }
        return $result;
    }
}