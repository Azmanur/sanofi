<?php
session_start();
error_reporting(0);
include('includes/config.php');
$pid = intval($_GET['pid']);
?>

<style>
  .rating {
    float: left;
  }

  /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
 follow these rules. Every browser that supports :checked also supports :not(), so
 it doesn’t make the test unnecessarily selective */
  .rating:not(:checked)>input {
    position: absolute;
    top: -9999px;
    clip: rect(0, 0, 0, 0);
  }

  .rating:not(:checked)>label {
    float: right;
    width: 1em;
    padding: 0 .1em;
    overflow: hidden;
    white-space: nowrap;
    cursor: pointer;
    font-size: 200%;
    line-height: 1.2;
    color: #ddd;
    text-shadow: 1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0, 0, 0, .5);
  }

  .rating:not(:checked)>label:before {
    content: '★ ';
  }

  .rating>input:checked~label {
    color: #f70;
    text-shadow: 1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0, 0, 0, .5);
  }

  .rtn {
    float: left;
    width: 100%;
  }

  .rating:not(:checked)>label:hover,
  .rating:not(:checked)>label:hover~label {
    color: gold;
    text-shadow: 1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0, 0, 0, .5);
  }

  .rating>input:checked+label:hover,
  .rating>input:checked+label:hover~label,
  .rating>input:checked~label:hover,
  .rating>input:checked~label:hover~label,
  .rating>label:hover~input:checked~label {
    color: #ea0;
    text-shadow: 1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0, 0, 0, .5);
  }

  .rating>label:active {
    position: relative;
    top: 2px;
    left: 2px;
  }

  .checked {
    color: orange;
  }
</style>


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

<body class="cnt-home">

  <div id="header">
    <?php include('includes/header.php') ?>
  </div>

  <div class="body-content outer-top-xs">
    <div class="container">
      <div class="col-md-3"></div>
      <div class="col-md-6">


        <form action="includes/feedback.php" method="post">
          <input type="hidden" name="pid" value="<?php echo $pid; ?>">

          <div class="rtn">
            <h3 style="text-align:center">Leave A Feedback!</h3>
            <!-- <h4><?php echo $pid ?></h4> -->
            <fieldset class="rating">

              <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
              <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
              <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
              <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
              <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
            </fieldset>
          </div>

          <p>Name</p>
          <p><input type="text" name="name" class="form-control"></p>

          <p>Review</p>
          <p><textarea class="form-control" name="rv"></textarea></p>
          <p><input type="submit" name="savert" value="Feedback" class="btn btn-primary"></p>

        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
  <?php include('includes/footer.php') ?>
    <!--Scripts -->
    <?php include('includes/scripts.php') ?>

</body>
</html>