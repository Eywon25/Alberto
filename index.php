<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <section class="signup-home">
      <section class="bg-gray-50 dark:bg-gray-900">
        <div class="container">
          <div class="card">
            <div class="card-content">
              <h1 class="title">Log in</h1>
              <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  // Retrieve the form data
                  $email = $_POST["email"];
                  $userPassword = $_POST["password"];

                  // Database connection details
                  $servername = "localhost";
                  $username = "root";
                  $dbPassword = null;
                  $dbname = "aaron";

                  // Create a connection
                  $conn = new mysqli($servername, $username, $dbPassword, $dbname);

                  // Check the connection
                  if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }

                  $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$userPassword'";
                  $result = mysqli_query($conn, $sql);
                  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                  if ($user) {
                    header("Location: portfolio.html");
                  } else {
                    echo "<div class='error_user'>User doesn't exist</div>";
                  }
                }
              ?>
              <form class="form" action="#" method="post">
                <div class="form-group">
                  <label for="email" class="label">Your email</label>
                  <input
                    type="email"
                    name="email"
                    id="email"
                    class="input"
                    placeholder="name@company.com"
                    required=""
                  />
                </div>
                <div class="form-group">
                  <label for="password" class="label">Password</label>
                  <input
                    type="password"
                    name="password"
                    id="password"
                    class="input"
                    placeholder="••••••••"
                    required=""
                  />
                </div>
                <button type="submit" class="signup-button">
                  Login
                  <span class="overlay"></span>
                </button>
                <p class="register-link">
                  Don't have an account yet?
                  <a href="signup.php" class="register-link-text">Sign up</a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </section>
    </section>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        var form = document.querySelector('.form');
        form.addEventListener('submit', function (event) {
          var password = document.getElementById('password').value;
          var confirmPassword =
            document.getElementById('confirm-password').value;

          if (password !== confirmPassword) {
            alert("Password doesn't match");
            event.preventDefault(); // Prevent form submission
          }
        });
      });
    </script>
  </body>
</html>
