<?php
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SAFONI | Contact</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <?php include('includes/links.php') ?>
</head>

<body>

  <div id="header">
    <?php include('includes/header.php') ?>
  </div>

  <div class="col-md-12 my-5" id="contact">
    <div class="container">

      <h3 style="text-align:center">Contact Form</h3>

      <div class="container">
        <form>
          <div class="mb-3">
            <label for="InputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"><span style="color:red">*</span>we'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <div class="form-group">
              <label for="sel1">Select catagory</label>
              <select class="form-control" id="sel1">
                <option>Products</option>
                <option>Services</option>
                <option>Doctors</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <div class="form-group">
              <label for="comment">Message</label>
              <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>
          </div>

          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="CheckBox">
            <label class="form-check-label" for="CheckBox">Agree to Terms and Conditions</label>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <?php include('includes/footer.php') ?>
  <!--Scripts -->
  <?php include('includes/scripts.php') ?>
</body>

</html>