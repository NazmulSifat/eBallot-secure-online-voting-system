<!DOCTYPE html>
<html>

<head>

    <title>Voter Registration</title>

    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .signup-box {
            width: 500px;

            padding: 50px;
            border-radius: 10px;
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

        input,
        select {
            width: 100%;
            padding: 15px;
            margin: 8px 0;
            border: 0px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
        }

        input:focus,
        select:focus {
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
            background: #f70303ff;
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

        .signup {
            width: 60%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="signup">
        <div class="signup-box">
            <h1>ভোটার নিবন্ধন</h1>
            <p>অনলাইন ভোটের জন্য আপনার তথ্য দিয়ে নিবন্ধন করুন</p>

            <!-- Backend থাকলে action এ URL দাও (ex: register.php / /api/register) -->
            <form action="register.php" method="post">

                <input type="text" name="name" placeholder="Full Name" required>

                <!-- BD phone usually 11 digits -->
                <input type="tel" name="phone" placeholder="Phone Number (11 digits)" pattern="[0-9]{11}" required>

                <!-- NID length 10-17 digits -->
                <input type="text" name="nid" placeholder="National ID (NID) (10-17 digits)" pattern="[0-9]{10,17}"
                    required>

                <select name="zilla" id="zilla" onchange="loadUpazila()" required>
                    <option value="">Select Zilla</option>
                    <option value="dhaka">Dhaka</option>
                    <option value="chittagong">Chittagong</option>
                </select>

                <select name="upazila" id="upazila" required>
                    <option value="">Select Upazila</option>
                </select>

                <button type="submit">Register</button>
            </form>

            <div class="login-link">
                Already registered?
                <a href="login.php">Login</a>
            </div>
        </div>
    </div>
    <div class="image-side">
        <img src="../../Assest/elc.png" alt="Voting Image">
    </div>


    <script>
        function loadUpazila() {
            const zilla = document.getElementById("zilla").value;
            const upazila = document.getElementById("upazila");

            // reset
            upazila.innerHTML = '<option value="">Select Upazila</option>';

            if (zilla === "dhaka") {
                upazila.innerHTML += `
          <option value="dhanmondi">Dhanmondi</option>
          <option value="mirpur">Mirpur</option>
          <option value="gulshan">Gulshan</option>
          <option value="uttara">Uttara</option>
          <option value="savar">Savar</option>
        `;
            }

            if (zilla === "chittagong") {
                upazila.innerHTML += `
          <option value="pahartali">Pahartali</option>
          <option value="panchlaish">Panchlaish</option>
          <option value="hathazari">Hathazari</option>
          <option value="raozan">Raozan</option>
          <option value="boalkhali">Boalkhali</option>
        `;
            }
        }
    </script>

</body>

</html>