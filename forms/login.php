<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Worm Library - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <special-header></special-header>
    <main>
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                <!-- Left Box -->
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #008080;">
                    <div class="featured-image mb-3">
                        <img src="../LandingPage/Images/login.jpg" class="img-fluid" style="width: 330px;" alt="Login Image">
                    </div>
                    <p class="text-white fs-2 mb-3" style="font-family:'Roboto', sans-serif; font-weight: 600;">Book Worm</p>
                    <small class="text-white text-wrap text-center mb-3" style="width: 17rem; font-family:'Roboto', sans-serif;">For every shot, we have got you covered.</small>
                </div>

                <!-- Right Box for Login Form -->
                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2>Log In</h2>
                            <p>Welcome back! Please log in to continue.</p>
                        </div>

                        <div class="input-group mb-3">
                            <label for="studentID" class="input-group-text">Student ID</label>
                            <input type="text" class="form-control form-control-lg bg-light fs-6" id="studentID" placeholder="Student ID">
                        </div>

                        <div class="input-group mb-3">
                            <label for="password" class="input-group-text">Password</label>
                            <input type="password" class="form-control form-control-lg bg-light fs-6" id="password" placeholder="Password">
                        </div>

                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-primary w-100 fs-6" onclick="login()">Login</button>
                        </div>

                        <div class="row">
                            <small>Don't have an account? <a href="signup.php">Sign Up</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <special-footer></special-footer>

    <script>
      async function login() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        try {
          const backendUrl = 'http://127.0.0.1:5000';
          const response = await fetch(`${backendUrl}/login`, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({ email, password })
          });

          if (response.ok) {
            const data = await response.json();
            console.log("Login successful. Redirecting...");
            window.location.href = data.redirectUrl;
          } else {
            const errorData = await response.json();
            console.error("Login error:", errorData.error);
          }

        } catch (error) {
          console.error("Error during request:", error);
        }
      }
    </script>
</body>
</html>
