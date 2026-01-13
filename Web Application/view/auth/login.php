<!DOCTYPE html>
<html>

<head>
    <title>Voter Login</title>

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


        .loginbox {
            width: 500px;
            padding: 50px;
            border-radius: 15px;
            text-align: center;

        }

        h1 {
            margin-bottom: 10px;
            font-size: 32px;
        }

        p {
            color: gray;
            margin-bottom: 20px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
        }

        input:focus {
            border-color: #000;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            background: black;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #f60202ff;
        }

        .login-link {
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .note {
            margin-top: 10px;
            font-size: 13px;
            color: #666;
            text-align: left;
        }

        .msg {
            text-align: left;
            font-size: 14px;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 8px;
        }

        .err {
            background: #ffe6e6;
            color: #a00000;
        }

        .image-side {
            width: 60%;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        .image-side img {
            width: 50%;
            height: auto;
            object-fit: cover;

        }

        .form-box {
            width: 40%;
            /* ডান পাশে form */
            display: flex;
            justify-content: center;
            /* horizontal center (ডান পাশের ভেতরে) */
            align-items: center;
            /* vertical center */
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="form-box">
            <div class="loginbox">
                <h1>ভোটার লগইন</h1>
                <p>ভোটার আইডি ও জাতীয় পরিচয়পত্র নম্বর দিয়ে লগইন করুন</p>



                <form action="../../control/login_action.php" method="post">
                    <input type="text" id="voter_id" name="voter_id" placeholder="Voter ID (Example:- 0124587858)"
                        required>
                    <input type="text" name="nid" placeholder="National ID (10-12 digits)" pattern="[0-9]{10,17}"
                        required>
                    <button type="submit"><b>Login</b></button>
                </form>

                <div class="note">
                    Forgot your Voter ID?
                    <a href="find-voter.php">Find Voter</a>
                </div>

                <div class="login-link">
                    Not registered yet?
                    <a href="signup.php">Register</a>
                </div>
            </div>

        </div>

        <div class="image-side">
            <img src="../../Assest/elc.png" alt="Voting Image">
        </div>
    </div>





</body>

</html>