<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #6e00f3;
            margin: 0;
        }
        .login-container {
            width: 80%;
            max-width: 750px;
            padding: 50px;
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
        }
        .form-container {
            width: 45%;
        }
        .illustration-container {
            width: 55%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .illustration-container img {
            width: 100%;
            height: auto;
            max-height: 600px; /* Adjust this value as needed */
            border-radius: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #4e4feb;
            border: none;
        }
        .btn-primary:hover {
            background-color: #3c3cbf;
        }
        .alert {
            margin-top: 10px;
        }
        .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
            background-color: #4e4feb;
            border-color: #4e4feb;
        }
        .footer-links {
            text-align: center;
            margin-top: 20px;
        }
        .footer-links a {
            color: #4e4feb;
        }
        .app-buttons img {
            width: 120px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="illustration-container">
            <img src="oo.jpg" alt="Illustration">
        </div>
        <div class="form-container">
            <h2>Hello, Welcome back Helmy</h2>
            <?php
            session_start();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['username'];
                $password = ($_POST['password']);

                $host = 'localhost';
                $dbUsername = 'root';
                $dbPassword = '';
                $database = 'jincuriki';

                $conn = new mysqli($host, $dbUsername, $dbPassword, $database);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
                $stmt->bind_param("ss", $username, $password);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    header("Location: admin.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>password anda salah/div>";
                }

                // Debug information
                echo "Kesalahan Username: " . htmlspecialchars($username) . "<br>";
                echo "kesalahan password: " . htmlspecialchars($password) . "<br>";

                $stmt->close();
                $conn->close();
            }
            ?>
            <form action="loginadmin.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                    <label class="custom-control-label" for="rememberMe">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
            </form>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
