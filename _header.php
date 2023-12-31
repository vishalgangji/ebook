<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/ebook">E-BookHouse</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/ebook">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
  
    <li class="nav-item">
      <a class="nav-link" href="contact.php" >Contact</a>
    </li>
  </ul>
  <div class="row mx-2">';
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true && isset($_SESSION['isadmin'])){
    echo '
    
    <button class="btn btn-outline-warning mr-2" data-toggle="modal" data-target="#addbook">Add Book</button>
     
    <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
     
       <button class="btn btn-warning my-2 my-sm-0" type="submit">Search</button>
    
        <p class="text-light my-0 mx-2">Welcome A:'. $_SESSION['useremail']. ' </p>
        <a href="_logout.php" class="btn btn-outline-warning ml-2">Logout</a>
        </form>';
    // echo"admin";
  }
else if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){
  echo '<form class="form-inline my-2 my-lg-0" method="get" action="search.php">
    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-warning my-2 my-sm-0" type="submit">Search</button>
      <p class="text-light my-0 mx-2">Welcome '. $_SESSION['useremail']. ' </p>
      <a href="_logout.php" class="btn btn-outline-warning ml-2">Logout</a>
      </form>';
}

else{ 
  echo '<form class="form-inline my-2 my-lg-0" method="get" action="search.php">
    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-warning my-2 my-sm-0" type="submit">Search</button>
    </form>
    <button class="btn btn-outline-warning ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-outline-warning mx-2" data-toggle="modal" data-target="#signupModal">Signup</button>';
  }


  echo '</div>
      </div>
      </nav>'; 

      include '_addbookModel.php';
include '_loginModal.php';
include '_aloginModal.php';
include '_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> You can now login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>';
}
?>