<?php
  session_start();
  if(isset($_SESSION['admin'])){
    header('location:home.php');
  }
?>
<?php include 'includes/header.php'; ?>
<style>
  .login-logo b {
    font-size: 50px;
    color: white;
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);+

  }

  .login-box {
    width: 400px;
    margin: 10% auto;
    background-color:  #1561ad; 
    border-radius: 20px; /* Optional: Add rounded corners */
    padding: 20px; /* Optional: Add padding */
  }

  
</style>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>ADMIN LOGIN</b>
  </div>

  <div class="login-box-body">
    <p class="login-box-msg" style="font-size: 20px; color: #161748;">Sign in to start your session</p>
    <br/>

    <form action="login.php" method="POST">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder=" Username" required autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder=" Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <br/>

      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        </div>
      </div>
    </form>
  </div>
  <?php
    if(isset($_SESSION['error'])){
      echo "
        <div class='callout callout-danger text-center mt20'>
          <p>".$_SESSION['error']."</p> 
        </div>
      ";
      unset($_SESSION['error']);
    }
  ?>
</div>

<?php include 'includes/scripts.php' ?>
<script>
    $(document).ready(function () {
        // Function to change background color to a colorful gradient
        function changeBackgroundColor() {
            var colors = ['#161748']; // Add more colors if needed
            var randomColor = colors[Math.floor(Math.random() * colors.length)];
            $('body').css('background', 'linear-gradient(to right, ' + randomColor + ',#161748)');
        }

        // Click event to change background color when clicking on the login-box
        $('.login-box').on('click', function () {
            changeBackgroundColor();
        });
    });
</script>

</body>
</html>
