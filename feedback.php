<?php

$server ="localhost";
$username="root";
$dbname = "miniproject";
$password="";

$con=mysqli_connect($server,$username,$password,$dbname);

if(!$con){
    die("connection to this databse failed due to .mysqli_connect_error()");
}
if(isset($_POST['submit'])){

    $server ="localhost";
    $username="root";
    $dbname = "miniproject";
    $password="";

    $con=mysqli_connect($server,$username,$password,$dbname);

    if(!$con){
        die("connection to this databse failed due to .mysqli_connect_error()");
    }

    
    $name = $_POST['name'];
    $email =   $_POST['email'];
    $phone =  $_POST['phone'];
    $source =  $_POST['source'];
    $prefer =   $_POST['prefer1']; 
    $feedback = $_POST['feedback'];

    $sql ="INSERT INTO `miniproject`.`feedback` ( `name`,`email`,`phone`,`source`,`prefer`,`feedback`) VALUES 
    ('$name', '$email', '$phone','$source','$prefer','$feedback');";

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
    <title>Feedback Form</title>
    <link rel="stylesheet" href="./css/feedback(update2).css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container ">
        <header class="header">
            <h1 id="title">
                Survey from Application Portal
            </h1>
            <p id="description">
                Thank you for taking the time to help us to improve the platform
            </p>
        </header>
        <form action="feedback.php" id="survey-form" method="POST">

            <!-- Text section -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="formControl" placeholder="Enter your name" required>
            </div>
            <!-- end of text section -->

            <!-- Type Email section -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="formControl" placeholder="Enter your Email" required>
            </div>
            <!-- end of Email section -->

            <!-- Type Number section -->
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="number" name="phone" id="phone" class="formControl" placeholder="Enter your phone number"
                    required>
            </div>
            <!-- end of Number section -->

            <!-- end of select section -->

            <!-- radio button section -->
            <div class="form-group">
                <p id="quest">How you come to know about Application Portal ?</p>
                <label for="">
                    <input type="radio" name="source" value="freinds" class="inputRadio" > Friends
                </label>
                <label for="">
                    <input type="radio" name="source" value="social-media" class="inputRadio"> Social Media
                </label>
                <label for="">
                    <input type="radio" name="source" value="other" class="inputRadio"> Other
                </label>
            </div>
            <!-- end of radio button -->

            <!-- Checkbox section -->
            <div class="form-group">
                <p id="quest">Would you like to see improved projects in ? </p>
                <label for="">
                    <input type="checkbox" name="prefer1" class="checkbox" value="front-end-dev"> Web Development
                </label>
                <label for="">
                    <input type="checkbox" name="prefer1" class="checkbox" value="back-end-dev"> Artificial Intelligence
                </label>
                <label for="">
                    <input type="checkbox" name="prefer1" class="checkbox" value="app-dev"> Machine Learning
                </label>
                <label for="">
                    <input type="checkbox" name="prefer1" class="checkbox" value="soft-engineering"> Ethical Hacking
                </label>
            </div>
            <!-- End of checkbox section -->

            <!-- Textarea section -->
            <div class="form-group">
                <p id="quest">Give us your feedback</p>
                <textarea name="feedback" cols="30" rows="5" id="feedback" class="textarea"
                    placeholder="Enter your feedback here..."></textarea>
            </div>


            <div class="form-group">
                <br><br>
                <button type="submit" id="submit" name="submit" class="btn">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>