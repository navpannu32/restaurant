<?php  
  include '../../database/connect.php';
  
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

  $price = htmlspecialchars($_GET['price'], ENT_QUOTES, 'UTF-8');

  $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
  $price = str_replace(',', '.', $price);
  $price = floatval($price);

  $category_id = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
  
  $sql = 'INSERT INTO items (name, description, price, category_id) VALUES ("'.$name.'", "'.$description.'", '.$price.', '.$category_id.');';  

  $stmt = $pdo->prepare($sql);
  
  if($stmt->execute()) {
    if(isset($_FILES['image'])) {
      $file = $_FILES['image'];
      $fileName = $file['name'];
      $fileTmpName = $file['tmp_name'];
      $fileSize = $file['size'];
      $fileError = $file['error'];
      $fileType = $file['type'];
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));
      $allowed = array('jpg', 'jpeg', 'png');
      if(in_array($fileActualExt, $allowed)) {
        if($fileError === 0) {
          if($fileSize < 1000000) {
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = '../../images/'.$fileNameNew;

            move_uploaded_file($fileTmpName, $fileDestination);
            $sql = 'UPDATE items SET image = "'.$fileNameNew.'" WHERE id = '.$pdo->lastInsertId().';';

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
          } else {
            echo "Your file is too big!";
          }
        } else {
          echo "There was an error uploading your file!";
        }
      } else {
        echo "You cannot upload files of this type!";
      }
    }
  }
  header('Location: ../../');
?>