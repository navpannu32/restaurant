<?php  
  include '../../database/connect.php';
  
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  
  $sql = 'INSERT INTO items (name, description, price) VALUES ("'.$name.'", "'.$description.'", '.$price.');';
  
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
  header('Location: ../../index.php');
?>