<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve book data from the form
    $title = $_POST["title"];
    $author = $_POST["author"];
    $description = $_POST["description"];

    // Handle the uploaded cover image
    $targetDirectory = "covers/";
    $targetCoverFile = $targetDirectory . basename($_FILES["cover_image"]["name"]);
    move_uploaded_file($_FILES["cover_image"]["tmp_name"], $targetCoverFile);

    // Handle the uploaded book PDF
    $targetPdfDirectory = "books/";
    $targetPdfFile = $targetPdfDirectory . basename($_FILES["book_pdf"]["name"]);
    move_uploaded_file($_FILES["book_pdf"]["tmp_name"], $targetPdfFile);

    include "../db/config.php";
    $sql = "INSERT INTO books(title,author,description,cover_image,book_pdf)
            VALUE('$title','$author','$description','$targetCoverFile','$targetPdfFile');";
    $query = mysqli_query($conn,$sql);

    if($query) {
    header("Location: ../index.php");
    exit();
    }
    $error = "Something Wrong";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../assets/style.css"> -->
    <script src="../assets/script.js"></script>
    
</head>
<body>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="../">Library</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav nav-underline">
        <li class="nav-item">
          <a class="nav-link" href="authur.php">Authors</a>
        </li>

        <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] === True){ ?>
        <li class="nav-item">
          <a class="nav-link " href="add_book.php">Add Books</a>
        </li>
        <?php } ?>
        
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] === True){ ?>
        <li class="nav-item">
          <a class="nav-link " href="member.php">Members</a>
        </li>
        <?php } ?>

        <?php if(!isset($_SESSION['login'])){ ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <?php }else{ ?>
            <li class="nav-item">
                <a class="nav-link" href="../model/logout.php">Logout</a>
            </li>
        <?php }?>
      </ul>
      <form class="d-flex" role="search" action="search.php" method="GET">
        <input class="form-control me-2" type="search" name="search" placeholder="Search Books" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>



<form method="POST" action="add_book.php" enctype="multipart/form-data" class="p-3 border rounded">
    <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Author:</label>
        <input type="text" name="author" id="author" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label for="cover_image" class="form-label">Cover Image:</label>
        <input type="file" name="cover_image" id="cover_image" class="form-control" accept="image/*" required>
    </div>
    <div class="mb-3">
        <label for="book_pdf" class="form-label">Book PDF:</label>
        <input type="file" name="book_pdf" id="book_pdf" class="form-control" accept="application/pdf" required>
    </div>
    <div class="mb-3">
        <?php if(isset($error)) 
        echo $error;
        ?>
    </div>
    
    <div class="mb-3">
        <input type="submit" value="Add Book" class="btn btn-primary">
    </div>
</form>


    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>