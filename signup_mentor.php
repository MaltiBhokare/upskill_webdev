<?php
$server = "localhost:3307";
$username = "root";
$password = "";
$database = "vmh";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
//     echo "success";
// }
// else{
    die("Error". mysqli_connect_error());
}

?>
<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["fullName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["confirmPassword"];
    $exists=false;
    if(($password == $cpassword) && $exists==false){
        $sql = "INSERT INTO `mentors` VALUES ('$email','$username', '$password', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }
    }
    else{
        $showError = "Passwords do not match";
    }
}
?>


    

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up as a Mentor - Virtual Mentorship Hub</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom styles */
    /* Add your custom CSS styles here */

    /* Navbar styles */
    .navbar {
      background-color: #343a40 !important;
    }
    .navbar-brand {
      color: #ffffff !important;
    }
    .navbar-nav .nav-link {
      color: #ffffff !important;
    }
    .navbar-nav .nav-link:hover {
      color: #cccccc !important;
    }

    /* Form styles */
    .container {
      max-width: 500px;
    }
    .form-group label {
      color: #343a40;
    }
    .form-control {
      border-radius: 20px;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      border-radius: 20px;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    /* Footer styles */
    .footer {
      background-color: #343a40;
      color: #ffffff;
      padding: 20px 0;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
    body{
      background-color: lightcyan;
    }
  </style>
</head>
<body>
<?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Virtual Mentorship Hub</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-tarPOST="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.html">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mentors.html">Mentors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mentees.html">Mentees</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Sign Up Form for Mentor -->
  <div class="container mt-5">
    <h2 class="text-center mb-4">Sign Up as a Mentor</h2>
    <form action="signup_mentor.php" method="POST">
      <div class="form-group">
        <label for="fullName">Full Name</label>
        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name">
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password"  name="password" placeholder="Enter your password">
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password">
      </div>
      <button type="submit" class="btn btn-primary btn-block" href="mentors.html">Sign Up</button>
    </form>
  </div>
  

   <footer class="footer text-white text-center py-4">
   <p>&copy; 2024 Virtual Mentorship Hub</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>






















