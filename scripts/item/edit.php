<?php
    include '../../database/connect.php';

    $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $price = htmlspecialchars($_POST['price'], ENT_QUOTES, 'UTF-8');

    $removeImage = isset($_POST['remove_image']) && $_POST['remove_image'] == 'on';

    if (!$removeImage) {
        $image = $_POST['image'];
        $sql = 'UPDATE items SET name = "'.$name.'", description = "'.$description.'", price = '.$price.', image = "'.$image.'" WHERE id = '.$id.';';
    } else {
        $sql = 'UPDATE items SET name = "'.$name.'", description = "'.$description.'", price = '.$price.', image = NULL WHERE id = '.$id.';';
    }

    $stmt = $pdo->prepare($sql);
    if($stmt->execute()) {
        if(isset($_FILES['image']) && !$removeImage) {
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
                        $sql = 'UPDATE item SET image = "'.$fileNameNew.'" WHERE id = '.$id.';';
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        header('Location: ../../');

                    } else {
                        echo "Your file is too big!";
                    }
                } else {
                    echo "There was an error uploading your file!";
                }
            } else {
                echo "You cannot upload files of this type!";
            }
        } elseif($removeImage) {
            $sql = 'UPDATE items SET image = NULL WHERE id = '.$id.';';
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            header('Location: ../../');
        }
    }
?>
