<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Navber</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
</head>
  <body>

<!-- Add your site or application content here -->
<div class="container" >
    <div class="section-padding">
      <div class="row justify-content-md-center">
        <div class="col-md-4 frm ">

          <div class="section-title"> <!--- Section title start ---->
            <h2 class="text-center">Login</h2>
          </div> <!--- Section title End ---->

          <form action="../model/login.php" method="post"> <!--- Form start ---->
            <div class="form-group form_text">
              <label for="id">ID :</label>
              <input type="id" class="form-control" id="name" placeholder="Enter Your ID"  name="id" required>
            </div>
            <div class="form-group form_text">
    <label for="pwd">Password:</label>
    <div class="input-group">
        <input type="password" class="form-control" id="pwd" placeholder="Enter Your Password" name="pass" required>
        <div class="input-group-text">
            <input type="checkbox" id="showPassword" onchange="togglePasswordVisibility()">
        </div>
    </div>
</div>
<div class="text-center">
  <?php if(isset($_GET['error'])) { ?>
    <p class="error"><?php echo $_GET['error']; ?></p>
  <?php } ?>
</div>
            <div class="text-center">
              <button class="btn" type="submit">Login</button>
            </div>
          </form> <!--- Form End ---->

          <div class="section-bottom text-center" role="alert"> <!--- Registration Link ---->
            <p style="color: black;" >Not a Member ? <a href="register.php" class="alert-link">Registration</a></p>
          </div> <!--- Registration End ---->

        </div> <!--- Col End ---->
      </div> <!--- Row End ---->
    </div> <!--- Section padding end---->
  </div> <!--- Container End ---->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script> 
    <script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('pwd');
        const showPasswordCheckbox = document.getElementById('showPassword');
        
        if (showPasswordCheckbox.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    }
</script>

  </body>
</html>