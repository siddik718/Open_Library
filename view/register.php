<?php 
if (session_status() == PHP_SESSION_NONE) {
  // Session has not been started
  session_start();
}
?>
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

  <div class="section-padding">
      <div class="row justify-content-md-center">
        <div class="col-md-6 Regi">
          <div class="section-title text-center"> <!-- --Section Title Start-- -->
            <h2>Registration</h2>
          </div> <!-- --Section Title End -- -->

          <form action="../model/register.php" method="post"> <!-- Form Start -->

            <div class="row">
              <div class="form-group form_text col-6">
                <label for="name">Name:</label>
                <input type="name" class="form-control" id="name" placeholder="Enter Your Name" name="name" required>
              </div>
              <div class="form-group form_text col-6">
                <label for="text">ID:</label>
                <input type="number" class="form-control" id="text" placeholder="Enter Your ID" name="id" required>
              </div>
            </div>
            <div class="row">
              <div class="form-group form_text col-6">
                <label for="number">Phone No:</label>
                <input type="number" class="form-control" id="number" placeholder="Enter Your Number" name="phone" required>
              </div>

              <div class="form-group col-6">
                <label for="Blood_group">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email" required>
              </div>
            </div>

            <div class="row">
              <div class="form-group form_text col-6">
                <label for="Depertment">Depertment:</label>
                <input type="Depertment" class="form-control" id="Depertment" placeholder="Enter Your Depertment" name="dept" required>
              </div>
              <div class="form-group form_text col-6">
                <label for="Address">Address:</label>
                <input type="Address" class="form-control" id="Address" placeholder="Enter Your Address" name="address" required>
              </div>
            </div>

            <div class="row">
  <div class="form-group form_text col-6">
    <label for="pwd">Password:</label>
    <div class="input-group">
      <input type="password" class="form-control" id="pwd" placeholder="Enter A Strong Password" name="pass" required>
      <div class="input-group-text">
        <input type="checkbox" name="showPassword" id="showPassword" onchange="togglePasswordVisibility()">
      </div>
    </div>
  </div>

  <div class="form-group form_text col-6">
    <label for="pwd">Confirm Password:</label>
    <div class="input-group">
      <input type="password" class="form-control" id="confirmPwd" placeholder="Please Enter Your Password Again" name="cpass" required>
      <div class="input-group-text">
        <input type="checkbox" name="showConfirmPassword" id="showConfirmPassword" onchange="toggleConfirmPasswordVisibility()">
      </div>
    </div>
  </div>
</div>



            <div class="radio_btn">
                <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineRadio1" value="faculty" name="radio" checked>
                <label class="form-check-label" for="inlineRadio1">Faculty</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineRadio2" value="student" name="radio">
                    <label class="form-check-label" for="inlineRadio2">Student</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineRadio3" value="stuff" name="radio">
                    <label class="form-check-label" for="inlineRadio3">Others</label>
                </div>
            </div>

            <div class="text-center">
  <?php if(isset($_GET['error'])) { ?>
    <p class="error"><?php echo $_GET['error']; ?></p>
  <?php } ?>
</div>

            <div class="text-center" id="reg_btn"> <!--- button start ---->
              <button class="btn" type="submit">Registration</button>
            </div><!--- button End ---->

          </form> <!-- ---Form End ------->


        </div> <!-- ---Col End ------->
      </div> <!-- ---Row End ------->
    </div> <!-- ---Section Padding End ------->
  </div> <!-- ---Container End------->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script> 
    <script>
  function togglePasswordVisibility() {
    const passwordInput = document.getElementById('pwd');
    const showPasswordCheckbox = document.getElementById('showPassword');

    passwordInput.type = showPasswordCheckbox.checked ? 'text' : 'password';
  }

  function toggleConfirmPasswordVisibility() {
    const confirmPasswordInput = document.getElementById('confirmPwd');
    const showConfirmPasswordCheckbox = document.getElementById('showConfirmPassword');

    confirmPasswordInput.type = showConfirmPasswordCheckbox.checked ? 'text' : 'password';
  }
</script>

</body>
</html>