<?php
if(isset($_POST['submit'])){

    $server ="localhost";
    $username="root";
    $dbname = "miniproject";
    $password="";

    $con=mysqli_connect($server,$username,$password,$dbname);

    if(!$con){
        die("connection to this database failed due to .mysqli_connect_error()");
    }

    
    $name = $_POST['fullName'];
    $email =   $_POST['Email'];
    $phone =  $_POST['phoneno'];
    $work =  $_POST['work'];
    $exp =   $_POST['experience']; 
    $expec = $_POST['expectation'];

    $sql ="INSERT INTO `miniproject`.`formrecord` ( `name`,`email`,`phone`,`work`,`expe`,`expectation`) VALUES 
    ('$name', '$email', '$phone','$work','$exp','$expec');";

    if(mysqli_query($con,$sql)){
        $mess = "succesfully inserted";
    }else{
        echo "ERROR : $sql <br> $con->error";
    }

    $con->close();


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form</title>
    <link rel="stylesheet" href="./css/appform.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@700&family=Josefin+Sans&family=Poppins:ital@1&family=Ubuntu&display=swap"
        rel="stylesheet">
        

</head>

<body>
    <div class="container">
        <h1 class="form-title">New Application Form</h1>
        <div class="apply_box">
            <form action="appform.php" method="POST">

                <div class="main-user-info">

                    <div class="user-input-box">
                        <label for="fullName">Full name:</label>

                        <input type="text" name="fullName" id="fullName" placeholder="Enter full Name" required>
                    </div>


                    <div class="user-input-box">
                        <label for="email">Email:</label>

                        <input type="email" name="Email" id="email" placeholder="Enter the email" required>
                    </div>

                    <div class="user-input-box">
                        <label for="number">Phone Number:</label>

                        <input type="number" name="phoneno" id="number" placeholder="Enter the phone number" required>
                    </div>

                    
                    <div class="work-details-box">
                        <span class="work">Whether worked for any organisation</span>

                        <div class="work-category">
                            <input type="radio" name="work" id="yes">
                            <label for="yes">Yes</label>
                            <input type="radio" name="work" id="no">
                            <label for="no">No</label>
                        </div>
                    </div>


                    
                    <div class="user-input-box">
                        <label for="expnumber">Experience:</label>

                        <input type="number" name="experience" id="expnumber" required>
                    </div>

                    <div class="user-input-box">
                        <label for="text">Expectations(if any):</label>

                        <input type="text" name="expectation" id="text" />
                    </div>

                    <div class="form-submit-btn">
                        <input type="submit" name="submit" value="Submit">
                    </div>


                    <div>
                        <?php
                            if(isset($mess)){
                                echo "<p style='color:green;'>".$mess."</p>";
                            }
                        ?>
                    </div>

                </div>




            </form>

        </div>

    </div>

</body>

</html>