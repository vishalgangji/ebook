<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];

    $sql = "Select * from admin where email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if($pass== $row['pass']){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['isadmin'] = true;
            $_SESSION['useremail'] = $email;
            $_SESSION['adminid'] = $row['id'];
            // echo "logged in". $email;
        } 
        header("Location: /ebook/index.php");  
    }
    header("Location: /ebook/index.php");  
//     echo $_SESSION['loggedin'] ;
//    echo $_SESSION['isadmin'] ;
//    echo $_SESSION['email'] ;
//     echo $_SESSION['adminid'];
}

?>