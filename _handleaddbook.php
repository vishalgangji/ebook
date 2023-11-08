<?php
session_start();
include '_dbconnect.php';
$statusMsg = '';
if($_SERVER["REQUEST_METHOD"] == "POST" ){
        
        $book_name = $_POST["bookname"];
        $book_auth = $_POST["bookauth"];
        $book_des = $_POST["bookdes"];
        // $book_image = $_POST["bookimage"];

        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $destinationfile = 'book/' . $newfilename;
        move_uploaded_file($_FILES["file"]["tmp_name"], $destinationfile);

// echo $_FILES["bookimage"]["name"];
        $temp2 = explode(".", $_FILES["bookimage"]["name"]);
        $newfilename2 = round(microtime(true)) . '.' . end($temp2);
        $destinationfile2 = 'img/' . $newfilename2;
        move_uploaded_file($_FILES["bookimage"]["tmp_name"], $destinationfile2);
        // echo '<a href="'.$destinationfile2.'">go</a>';
        echo $newfilename2;
        $q = "INSERT INTO `book` (`book_id`, `book_name`, `book_description`, `book_author`, `book_url`,`book_image`) VALUES (NULL, '$book_name', '$book_des', '$book_auth', '$newfilename','$destinationfile2');";
        $result = mysqli_query($conn, $q);
            
        if($result){
            // $showAlert = true;
            echo "yes";
            header("Location: index.php?success=true");
            // exit();
        }


    }
?>