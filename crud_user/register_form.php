<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .login-container input[type="email"],
        .login-container input[type="password"],
        .login-container input[type="text"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-container button:hover {
            background-color: #45a049;
        }

        .login-container .forgot-password {
            text-align: center;
            margin-top: 10px;
        }

        .login-container .forgot-password a {
            color: #007BFF;
            text-decoration: none;
        }

        .login-container .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Register</h2>
        <form method="post" action="register.php">
            <div class="container">
                <label for="username"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="uname" required>
                <br>
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <br>
                <label for="password"><b>Konfirmasi Password</b></label>
                <input type="password" placeholder="Konfirmasi Password" name="cpsw" required>
                <br>
                <label for="fullname"><b>Fullname</b></label>
                <input type="text" placeholder="Enter Full Name" name="fname" required>
                <br>
                <button type="submit">Register</button>
            </div>
        </form>
        <div class="forgot-password">
            <a href="login.php">Login?</a>
        </div>
    </div>
    
</body>
</html>