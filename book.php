<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        #ques {
            min-height: 433px;
        }
    </style>
    <title>Welcome to E-BookHouse - Coding Forums</title>
</head>

<body>
    <?php include '_dbconnect.php'; ?>
    <?php include '_header.php'; ?>
    <?php
    if (!isset($_GET['bookid'])) {
        echo ' <div class="container" style="padding: 0px;
            margin: 165px 5px;
            text-align: center;">
            <a href="index.php" class="btn btn-warning stretched-link">unwanted request go to index.php</a></div>';
        exit;
    }
    $id = $_GET['bookid'];
    $sql = "SELECT * FROM `book` WHERE book_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $bookname = $row['book_name'];
        $bookdesc = $row['book_description'];
        $book_author = $row['book_author'];
        $bookurl = $row['book_url'];
    }


    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $comment = $_POST['comment'];
        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment);
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `comments` ( `comment_content`, `book_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your comment has been added!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>';
        }
    }
    ?>

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $bookname; ?></h1>

            <hr class="my-4">
            <p><?php echo $bookdesc; ?></p>
            <p>Writen by: <em><?php echo $book_author; ?></em></p>
            <form action="pdf.php" method="post">
                <input type="hidden" name="url" value="book/<?php echo $bookurl?>"> 
                <input type="hidden" name="name" value="<?php echo $bookname?>">
                <button type="submit" class="btn btn-warning">Read Book</button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['isadmin'])) {
    //     echo '<div class="container">
    //     <h1 class="py-2">Post a Comment</h1> 
    //     <form action= "' . $_SERVER['REQUEST_URI'] . '" method="post"> 
    //         <div class="form-group">
    //             <label for="exampleFormControlTextarea1">Type your comment</label>
    //             <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
    //             <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
    //         </div>
    //         <button type="submit" class="btn btn-success">Post Comment</button>
    //     </form> 
    // </div>';
    
}
    else if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ) {
        echo '<div class="container">
        <h1 class="py-2">Post a Comment</h1> 
        <form action= "' . $_SERVER['REQUEST_URI'] . '" method="post"> 
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
            </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
        </form> 
    </div>';
    
}
 else 
    {
        echo '
        
        <div class="container">
        <h1 class="py-2">Post a Comment</h1> 
           <p class="lead">You are not logged in. Please login to be able to post comments.</p>
        </div>
        ';
    }

    ?>


    <div class="container mb-5" id="ques">
        <h1 class="py-2">Reviews</h1>
        <?php
      
        $sql = "SELECT * FROM `comments` WHERE book_id=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_time = $row['comment_time'];
            $book_user_id = $row['comment_by'];

            $sql2 = "SELECT user_email FROM `users` WHERE sno='$book_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);

            echo '<div class="media my-3">
            <img src="userdefault.png" width="54px" class="mr-3" alt="...">
            <div class="media-body">
               <p class="font-weight-bold my-0">' . $row2['user_email'] . ' at ' . $comment_time . '</p> ' . $content . '
            </div>
        </div>';
        }
        if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Reviews Found</p>
                        <p class="lead"> Be the first person to give Review</p>
                    </div>
                 </div> ';
        }

        ?>

    </div>

    <?php include '_footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>