<!DOCTYPE html>
<html>

<title>Login | Sign Up | Admin</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        /*
        background: #ffffff;
        color: #000;


        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        */
        background-color: #FAF6F3;
    }

    .container {
        text-align: center;
        max-width: 1000px;
        padding: 40px 20px;
        margin-top: -10px;
    }

    h1 {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 16px;
    }

    p {
        font-size: 22px;
        color: #030303ff;
        margin-bottom: 40px;
    }

    .buttons {
        display: flex;
        justify-content: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .btn {
        padding: 14px 28px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 999px;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    /* login button */

    .btn-login {
        background: #f2f2f2;
        color: #000000ff;
    }

    .btn-login:hover {
        background: #cb0a0aff;
    }

    /* signup button */

    .btn-signup {
        background: #f2f2f2;
        color: #000;
    }

    .btn-signup:hover {
        background: #cb0a0aff;
    }

    /* admin button */
    .btn-admin {
        background: #f2f2f2;
        color: #050505ff;
    }

    .btn-admin:hover {
        background: #cb0a0aff;
    }

    @media (max-width: 480px) {
        h1 {
            font-size: 36px;
        }

        p {
            font-size: 16px;
        }
    }

    .p1 {

        color: green;
    }


    .logo-container {

        position: absolute;
        top: 40px;
        left: 40px;
    }

    .logo {
        width: 100px;
    }

    .logo-text {
        position: absolute;
        top: 50px;
        left: 170px;
        color: #0c5740;
        background-color: #F5FFF9;
        padding: 15px;
        border-radius: 60px;

    }

    .sub-container {

        margin-left: -600px;

    }


    .right-container {
        position: absolute;
        top: 50%;
        right: 160px;
        /* ডান পাশে */
        transform: translateY(-50%);
        text-align: center;

    }

    .qr {
        width: 500px;
    }

    .right-text {
        margin-top: 10px;
        font-size: 16px;
        color: #0c5740;
    }
</style>



<body>
    <div class="container">

        <div class="sub-container">
            <h1>আপনার ভোট,আপনার অধিকার</h1>
            <p class="p1"><b>নিরাপদ • সহজ • স্বচ্ছ</b></p>

            <p>যেখানেই থাকুন, নিরাপদে ও সহজে দিন আপনার ভোট। <br>
                ডিজিটাল বাংলাদেশে গণতন্ত্রের নতুন যুগ।</p>

            <div class="buttons">
                <button class="btn btn-login" onclick="location.href='../../view/auth/login.php'">
                    Login
                </button>

                <button class="btn btn-signup" onclick="location.href='signup.php'">
                    Sign Up
                </button>

                <button class="btn btn-admin" onclick="location.href='admin-login.php'">
                    Admin
                </button>

            </div>
        </div>

        <div class="logo-container">
            <img src="../Assest/elc.png" alt="Logo" class="logo">
        </div>

        <p class="logo-text"><b>সমন্বিত অনলাইন ভোটিং ব্যবস্থা </b> </p>


        <div class="right-container">
            <img src="../Assest/home.jpg" alt="QR Code" class="qr">

        </div>



    </div>



</body>

</html>