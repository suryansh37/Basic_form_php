<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            background-color: burlywood;
            font-family: Arial, sans-serif;
        }
        img {
            border: 1px solid black;
            height: 100px;
            width: 100px;
        }
        .form-container {
            margin: 50px auto;
            height: auto;
            width: 500px;
            text-align: center;
            padding: 20px;
            background-color: white;
            border: 1px solid black;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
        }
        .details-container {
            margin: 20px auto;
            height: auto;
            width: 400px;
            padding: 20px;
            background-color: white;
            border: 1px solid black;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            text-align: left;
        }
        legend {
            font-size: larger;
            background-color: white;
            color: brown;
            text-align: center;
            border: 1px solid black;
            padding: 5px 10px;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="email"], input[type="number"], input[type="date"], textarea, input[type="file"] {
            margin: 10px 0;
            height: 25px;
            width: 300px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="radio"] {
            margin: 0 10px;
        }
        textarea {
            height: 60px;
            width: 300px;
            resize: none;
        }
        input[type="submit"], input[type="reset"] {
            margin: 10px 5px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #5a5a5a;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #3a3a3a;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script>
        function validateForm() {
            var fname = document.forms["regForm"]["fname"].value;
            var mail = document.forms["regForm"]["mail"].value;
            var number = document.forms["regForm"]["number"].value;
            var un = document.forms["regForm"]["un"].value;
            var roll = document.forms["regForm"]["roll"].value;
            var dob = document.forms["regForm"]["dob"].value;
            var gender = document.forms["regForm"]["gender"].value;
            var address = document.forms["regForm"]["address"].value;

            if (fname == "" || mail == "" || number == "" || un == "" || roll == "" || dob == "" || gender == "" || address == "") {
                alert("All fields must be filled out");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <?php
    $fname = $mail = $number = $un = $roll = $dob = $gender = $address = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = test_input($_POST["fname"]);
        $mail = test_input($_POST["mail"]);
        $number = test_input($_POST["number"]);
        $un = test_input($_POST["un"]);
        $roll = test_input($_POST["roll"]);
        $dob = test_input($_POST["dob"]);
        $gender = test_input($_POST["gender"]);
        $address = test_input($_POST["address"]);
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <fieldset class="form-container">
        <legend><b>Registration Form</b></legend>
        <center><img src="logo.png" alt="Logo"></center>
        <form name="regForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
            <br>
            Name <input type="text" name="fname" class="c" placeholder="Enter Your Name" required><br><br>
            E-mail <input type="email" name="mail" class="d" placeholder="Enter Your Email" required><br><br>
            Mobile <input type="tel" name="number" class="e" placeholder="Enter Your Mobile Number" pattern="[0-9]{10}" required><br><br>
            University <input type="text" name="un" class="f" placeholder="Enter Your University Name" required><br><br>
            Roll No. <input type="text" name="roll" class="g" placeholder="Enter Your Enrollment Number" required><br><br>
            Date of Birth <input type="date" name="dob" required><br><br>
            Gender 
            <input type="radio" name="gender" value="Male" required> Male
            <input type="radio" name="gender" value="Female" required> Female
            <input type="radio" name="gender" value="Other" required> Other<br><br>
            Address <textarea name="address" placeholder="Enter Your Address" required></textarea><br><br>
            Profile Picture <input type="file" name="profile_pic" accept="image/*"><br><br>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset"><br><br>
        </form>
    </fieldset>
    <fieldset class="details-container">
        <legend><b>Form Details</b></legend>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <p><strong>Name:</strong> <?php echo $fname; ?></p>
            <p><strong>E-mail:</strong> <?php echo $mail; ?></p>
            <p><strong>Mobile:</strong> <?php echo $number; ?></p>
            <p><strong>University:</strong> <?php echo $un; ?></p>
            <p><strong>Roll No.:</strong> <?php echo $roll; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $dob; ?></p>
            <p><strong>Gender:</strong> <?php echo $gender; ?></p>
            <p><strong>Address:</strong> <?php echo $address; ?></p>
            <p><strong>Profile Picture:</strong> <?php echo isset($_FILES['profile_pic']) ? $_FILES['profile_pic']['name'] : 'No file uploaded'; ?></p>
        <?php else: ?>
            <p>No details submitted yet.</p>
        <?php endif; ?>
    </fieldset>
</body>
</html>
