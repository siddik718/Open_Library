<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/style.css"> -->
    <script src="assets/script.js"></script>
    
</head>
<body>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Library</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav nav-underline">

        <li class="nav-item">
          <a class="nav-link" href="view/authur.php">Authors</a>
        </li>

        <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] === True){ ?>
        <li class="nav-item">
          <a class="nav-link " href="view/add_book.php">Add Books</a>
        </li>
        <?php } ?>
        
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] === True){ ?>
        <li class="nav-item">
          <a class="nav-link " href="view/member.php">Members</a>
        </li>
        <?php } ?>

        <?php if(!isset($_SESSION['login'])){ ?>
        <li class="nav-item">
          <a class="nav-link" href="view/login.php">Login</a>
        </li>
        <?php }else{ ?>
            <li class="nav-item">
                <a class="nav-link" href="model/logout.php">Logout</a>
            </li>
        <?php }?>
      </ul>
      <form class="d-flex" role="search" action="view/search.php" method="GET">
        <input class="form-control me-2" type="search" name="search" placeholder="Search Books" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    
<div class="text-center">

<h2>Hello And Welcome To Open Library 
    <?php if(isset($_SESSION['login'])) {
    echo " Mr. " . $_SESSION['name'];
} ?> </h2>


<?php

include "db/config.php";
$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  echo '<div class="row">';
  
  while ($row = mysqli_fetch_assoc($result)) {
      echo '<div class="col-md-4 mb-4">
              <div class="card">
                  <img src=" view/' . $row['cover_image'] . '" class="card-img-top" alt="Cover Image">
                  <div class="card-body">
                      <h5 class="card-title">' . $row['title'] . '</h5>
                      <p class="card-text">' . $row['author'] . '</p>
                      <p class="card-text">' . $row['description'] . '</p>';

                     if(isset($_SESSION['login'])) {
        echo '<a href="view/' . $row['book_pdf'] . '" class="btn btn-primary" target="_blank">Read</a>';
    }
    echo '</div>
              </div>
          </div>';
  }
  
  echo '</div>';
} else {
  echo 'No books found.';
}

?>








</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


</body>
</html>