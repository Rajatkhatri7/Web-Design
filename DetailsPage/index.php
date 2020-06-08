<?php
$insert = false;
if(isset($_POST['name'])){




$server="localhost";
$username="root";
$password = "";

//create connection
$con = mysqli_connect($server,$username,$password);

if(!$con){

    die("connection to this database failed due to". mysqli_connect_error());

}
// echo "connection done";



//collect post variables
$name = $_POST['name'];
$Age = $_POST['Age'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];


//execute query
$sql = "INSERT INTO `Industrial visit`.`INDvisit` ( `Name`, `Age`, `address`, `Email`, `PhoneNO`, `OtherDetails`, `date`) 
VALUES ( '$name', '$Age', '$address', '$email', '$phone', '$desc', current_timestamp());";
//echo $sql;



// Execute the query
if($con->query($sql) == true){

    // echo "Successfully inserted";

    // Flag for successful insertion
   $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

// Close the database connection
$con->close();


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bed Share</title>
    <link rel="stylesheet" href="style.css">
    <link  href="index.php">
    
</head>
<body>
    <img src="https://assets.materialup.com/uploads/34f70705-f97c-42e3-9ee7-7b87283e7184/preview.jpg" alt="CUSAT" class="img">
    <div class="container">

        <h2>Welcome to the covid19 Donation Page</h2>
        <p>Please enter your details</p>
        <?php
        if($insert == true){
        echo "<p class='submitMSG'>Thanks for your donation.You will receive a conformation email soon</p>";
        }
       ?>
        <form action="index.php" method="POST" class="form">

                <input type="text" name="name" placeholder="Enter your name" id="name">
                <input type="text" name="Age" placeholder="Age" id="age">
                <input type="text" name="address" placeholder="Enter your Address" id="Branch">
                <input type="text" name="email" placeholder="Enter ypur email address" id="email">
                <input type="phone" name="phone" placeholder="Enter your phone no" id="phone">
                <textarea name="desc" id="desc" cols="30" placeholder="Enter any other details" rows="10"></textarea>
                    <button class="btn">Submit</button>
                   



        </form>





    </div>
    <script src="index.js"></script>
</body>
</html>
