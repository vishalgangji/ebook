<!doctype html>
<html lang="en">
<?php 
$success=false;
// if($_SERVER["REQUEST_METHOD"] == "GET" ){
//     $success=true;
//     $_GET
// }
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        #ques{
            min-height: 433px;
        }
        .h{
            height: 500px;
        }
    </style>
    <title>Welcome to E-BookHouse - Coding Forums</title>
</head>

<body>
    <?php include '_dbconnect.php';?>
    <?php include '_header.php';?>
    <?php 

    if ($success==true) {
        echo `<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sucess</strong> Book Added Sucesfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>`;
    }
    ?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="slider-1.jpg" class="d-block w-100 h" alt="...">
            </div>
            <div class="carousel-item">
                <img src="slider-2.jpg" class="d-block w-100 h" alt="...">
            </div>
            <div class="carousel-item">
                <img src="slider-3.jpg" class="d-block w-100 h" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container my-4" id="ques">
        <h2 class="text-center my-4">E-BookHouse - Browse book</h2>
        <div class="row my-4">
         <?php 
         $sql = "SELECT * FROM `book`"; 
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
          $id = $row['book_id'];
          $image = $row['book_image'];
          $cat = $row['book_name'];
          $desc = $row['book_description'];
          echo '<div class="col-md-4 my-2">
                  <div class="card" style="width: 18rem;">
                      <img src="'.$image.'" class="card-img-top" alt="image for this book">
                      <div class="card-body">
                          <h5 class="card-title"><a href="book.php?bookid=' . $id . '">' . $cat . '</a></h5>
                          <p class="card-text">' . substr($desc, 0, 90). '... </p>
                          <a href="book.php?bookid=' . $id . '" class="btn btn-primary">Read</a>
                      </div>
                  </div>
                </div>';
         } 
         ?>
            
 
        </div>
    </div>

    <?php include '_footer.php';?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>