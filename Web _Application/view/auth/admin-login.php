<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>

    <style>
        body {
            margin: 0;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .form-box {
            width: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loginbox {
            width: 400px;
            padding: 40px;
            text-align: center;
        }

        h1 {
            margin-bottom: 10px;
        }

        p {
            color: gray;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 12px;
            background: black;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: red;
        }

        .image-side {
            width: 60%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-side img {
            width: 50%;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="form-box">
            <div class="loginbox">
                <h1>Admin Login</h1>
                <p>Email এবং Password দিয়ে লগইন করুন</p>

                <!-- IMPORTANT FIXES HERE -->
                <form action="../../control/AuthController.php" method="post">
                    <input type="email" name="email" placeholder="Admin Email" required>
                    <input type="password" name="password" placeholder="Password" required>

                    <!-- THIS NAME IS REQUIRED -->
                    <button type="submit" name="admin_login"><b>Login</b></button>
                </form>
            </div>
        </div>

        <div class="image-side">
            <img src="../../Assest/elc.png" alt="Admin Login">
        </div>

    </div>

</body>

</html>