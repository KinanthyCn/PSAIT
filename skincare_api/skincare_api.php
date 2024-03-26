<?php
require_once "config.php";
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            get_skincare($id);
         }
         else
         {
            get_skincares();
         }
         break;
   case 'POST':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            update_skincare($id);
         }
         else
         {
            insert_skincare();
         }     
         break; 
   case 'DELETE':
          $id=intval($_GET["id"]);
            delete_skincare($id);
            break;
   default:
      // Invalid Request Method
         header("HTTP/1.0 405 Method Not Allowed");
         break;
      break;
 }



   function get_skincares()
   {
      global $mysqli;
      $query="SELECT * FROM products";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get List Skincare Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 
   function get_skincare($id=0)
   {
      global $mysqli;
      $query="SELECT * FROM products";
      if($id != 0)
      {
         $query.=" WHERE id=".$id." LIMIT 1";
      }
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get Skincare Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
        
   }
 
   function insert_skincare()
      {
         global $mysqli;
         if(!empty($_POST["name"]) )  {
            $data=$_POST;
         }else{
            $data = json_decode(file_get_contents('php://input'), true);
         }

         $arrcheckpost = array('name' => '','brand' => '','description' => '','price' => '','ingredients' => '','cara_pakai' => '','jumlah' => '');
         $hitung = count(array_intersect_key($data, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
               $result = mysqli_query($mysqli, "INSERT INTO products SET
               name = '$data[name]',
               brand = '$data[brand]',
               description = '$data[description]',
               price = '$data[price]',
               ingredients = '$data[ingredients]',
               cara_pakai = '$data[cara_pakai]',
               jumlah = '$data[jumlah]'");                
               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'Skincare Added Successfully.'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'Skincare Addition Failed.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function update_skincare($id)
      {
         global $mysqli;
         if(!empty($_POST["name"]) ){
            $data=$_POST;
         }else{
            $data = json_decode(file_get_contents('php://input'), true);
         }

         $arrcheckpost = array('name' => '','brand' => '','description' => '','price' => '','ingredients' => '','cara_pakai' => '','jumlah' => '');
         $hitung = count(array_intersect_key($data, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
              $result = mysqli_query($mysqli, "UPDATE products SET
                name = '$data[name]',
                brand = '$data[brand]',
                description = '$data[description]',
                price = '$data[price]',
                ingredients = '$data[ingredients]',
                cara_pakai = '$data[cara_pakai]',
                jumlah = '$data[jumlah]'
              WHERE id='$id'");
          
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Skincare Updated Successfully.'
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Skincare Updation Failed.'
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function delete_skincare($id)
   {
      global $mysqli;
      $query="DELETE FROM products WHERE id_mhs=".$id;
      if(mysqli_query($mysqli, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Skincare Deleted Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Skincare Deletion Failed.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }

 
?> 

