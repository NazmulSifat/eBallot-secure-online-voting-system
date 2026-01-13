<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4
        }

        .signup-box {
            width: 500px;
            margin: 50px auto
        }

        input,
        select,
        button {
            width: 100%;
            padding: 12px;
            margin: 8px 0
        }

        button {
            background: #000;
            color: #fff;
            border: none
        }
    </style>
</head>

<body>
    <div class="signup-box">
        <h1>ভোটার নিবন্ধন</h1>

        <form method="post" action="../../control/AuthController.php">
            <input type="hidden" name="register">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="phone" placeholder="Phone" required>
            <input type="text" name="nid" placeholder="NID" required>

            <select name="zilla" required>
                <option value="">Select Zilla</option>
                <option value="dhaka">Dhaka</option>
                <option value="chittagong">Chittagong</option>
            </select>

            <select name="upazila" required>
                <option value="dhanmondi">Dhanmondi</option>
                <option value="mirpur">Mirpur</option>
                <option value="gulshan">Gulshan</option>
            </select>

            <button type="submit">Register</button>
        </form>

        <p><a href="login.php">Login</a></p>
    </div>
</body>

</html>