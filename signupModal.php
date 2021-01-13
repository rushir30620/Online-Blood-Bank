<?php
    session_start();
    require '_dbconnect.php';
    if(isset($_GET['signup'])){
        $signup=$_GET['signup'];
    }
    if($signup == 'P'){
        if(isset($_POST['signup'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $mobile=$_POST['mobile'];
            $dob=$_POST['dob'];
            $gender=$_POST['gender'];
            $bloodgroup=$_POST['bloodgroup'];
            $password=$_POST['password'];
            $cpassword=$_POST['cpassword'];

            if($password == $cpassword){
                $sql="INSERT INTO `user02` (`Email`, `Name`, `Mobile No.`, `Gender`, `Blood Group`, `DOB`, `Password`, `Time`) VALUES ('$email', '$name', '$mobile', '$gender', '$bloodgroup', '$dob', '$password', current_timestamp())";
                $result=mysqli_query($conn,$sql);
                if($result){
                    setcookie('insert', '1', time() + 3000);
                    header("location:/DE_Project/index.php");
                }
                else{
                    setcookie('insert', '0', time() + 3000);
                    header("location:/DE_Project/index.php");
                }
            }
        }
    }elseif($signup == 'HB'){
        if(isset($_POST['hbsignup'])){

            $name=$_POST["fullname"];
            $email=$_POST["email"];
            $add=$_POST["add"];
            $city=$_POST["city"];
            $tel=$_POST["tel"];
            $password=$_POST["password"];
            $cpassword=$_POST["cpassword"];
        
            if($password=$cpassword){
                $sql="INSERT INTO `user01` (`Name`, `Email`, `Address`, `City`, `Telephone No`, `Password`, `Time`) VALUES ('$name', '$email', '$add', '$city', '$tel', ',$password', current_timestamp())";
                $result=mysqli_query($conn,$sql);
                if($result){
                    setcookie('insert', '1', time() + 3000);
                    header("location:/DE_Project/index.php");
                }
                else{
                    setcookie('insert', '0', time() + 3000);
                    header("location:/DE_Project/index.php");
                }
            }
        }
    }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>RAMC Blood Bank</title>

    <style>
    body {
        background-color: #f7cccc;
        
    }

    .design {
        width: 55%;
        height: 1000px;
        background-color: #dff3f9;
        border: 2px solid black;
        border-radius: 5px;
        margin-top: 15px;
        font-family: cursive;
    }

    .text-center {
        margin-top: 0px;
        font-family: cursive;
        font-style: oblique;
        text-transform: capitalize;
    }
    form{
            margin-top: 25px;
    }
    label{
        /* font-family: cursive; */
    }
    </style>
</head>

<body>
    <?php 
    require 'nav.php';
    
    echo'
    <div class="container design">
        <div class="container my-5" style="width:800px; margin:auto; ">
            <div>
                <a href="signupModal.php?signup=HB" class="btn btn-danger" id="HB">Hospital/Blood Bank</a>
                <a href="signupModal.php?signup=P" class="btn btn-danger" id="P">Public</a>
            </div>
            </div><br>';

            if($signup == 'P'){
                echo'
                <div class="container design1">
                <h2 class=text-center>Signup for Public</h2>
            <form method="POST" action="signupModal.php?signup=P">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="Text" class="form-control" name="name" id="name" placeholder="Ex. Mihir Rameshbhai Gohil" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" name="email" placeholder="Ex. abc@xyz.com" required>
            <small id="emailHelp" class="form-text text-muted">We will never share your email with
                anyoneelse.</small>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Mobile Number</label>
            <input type="phone" class="form-control" name="mobile" id="mobile" maxlength="10" placeholder="Ex.1234567890" required>
        </div>
        <div class="form-group">
            <label for="DOB">Birth Date</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
            <small class="form-text text-muted">Age must be 18 or above</small>
        </div>
        <div>
            <label><b>Gender: </b> </label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender1" value="male" required>
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender2" value="female" required>
                <label class="form-check-label" for="female">Female</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender3" value="transgender" required>
                <label class="form-check-label" for="transgender">Transgender</label>
            </div>
        </div><br>
        <div class="d-flex">
            <div class="dropdown mr-1">
                <select class="btn btn-danger dropdown-toggle" id="bloodgroup" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" data-offset="10,20" name="bloodgroup" required>
                    <option class="dropdown-item" selected>Select Blood Group</option>
                    <option class="dropdown-item" style= "color:white;" value="A+">A+</option>
                    <option class="dropdown-item"  style= "color:white;" value="A-">A-</option>
                    <option class="dropdown-item"  style= "color:white;" value="B+">B+</option>
                    <option class="dropdown-item"  style= "color:white;" value="B-">B-</option>
                    <option class="dropdown-item"  style= "color:white;" value="AB+">AB+</option>
                    <option class="dropdown-item"  style= "color:white;" value="AB-">AB-</option>
                    <option class="dropdown-item"  style= "color:white;" value="O+">O+</option>
                    <option class="dropdown-item"  style= "color:white;" value="O-">O-</option>
                </select>
            </div>
        </div><br>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="password" autocomplete required>
            <small class="form-text text-muted">Password must be 6 character or above</small>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" name="cpassword" id="cpassword" autocomplete required>
        </div>
        <div>
            <button type="submit" class="btn btn-danger text-center" name="signup" id="signup">SignUp</button>
            </form>
        </div>
        </div>';
        }
        
        elseif($signup == 'HB'){
        echo' 
        <div class="container design1">
        <h2 class=text-center>Signup for Hospital/Blood Bank</h2><br>
            <form action="signupModal.php?signup=HB" method="Post">
            <div class="form-group">
                <label for="fullname">Hospital/Blood bank name</label>
                <input type="text" class="form-control" id="fullname" name="fullname">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="add">Address</label>
                <textarea name="add" class="form-control" id="add"></textarea>
            </div>
            <div class="d-flex">
                <div class="dropdown mr-1">
                    <select class="btn btn-danger dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" data-offset="10,20" name="city">
                        <option class="dropdown-item" selected>Select City</option>>
                        <option class="dropdown-item" style= "color:white;" value="Amrelli">Amreli</option>
                        <option class="dropdown-item" style= "color:white;" value="Anand">Anand</option>
                        <option class="dropdown-item" style= "color:white;" value="Ahmedabad">Ahmedabad</option>
                        <option class="dropdown-item" style= "color:white;" value="Arvalli">Arvalli</option>
                        <option class="dropdown-item" style= "color:white;" value="Banaskantha">Banaskantha</option>
                        <option class="dropdown-item" style= "color:white;" value="Bharuch">Bharuch</option>
                        <option class="dropdown-item" style= "color:white;" value="Bhavnagar">Bhavnagar</option>
                        <option class="dropdown-item" style= "color:white;" value="Botad">Botad</option>
                        <option class="dropdown-item" style= "color:white;" value="Chhota Udaipur">Chhota Udaipur</option>
                        <option class="dropdown-item" style= "color:white;" value="Dahod">Dahod</option>
                        <option class="dropdown-item" style= "color:white;" value="Dang">Dang</option>
                        <option class="dropdown-item" style= "color:white;" value="Devbhoomi Dwarka">Devbhoomi Dwarka</option>
                        <option class="dropdown-item" style= "color:white;" value="Gandhinagar">Gandhinagar</option>
                        <option class="dropdown-item" style= "color:white;" value="Gir Somnath">Gir Somnath</option>
                        <option class="dropdown-item" style= "color:white;" value="Jamnagar">Jamnagar</option>
                        <option class="dropdown-item" style= "color:white;" value="Jungadh">Junagadh</option>
                        <option class="dropdown-item" style= "color:white;" value="Kutch">Kutch</option>
                        <option class="dropdown-item" style= "color:white;" value="Kheda">Kheda</option>
                        <option class="dropdown-item" style= "color:white;" value="Mahisagar">Mahisagar</option>
                        <option class="dropdown-item" style= "color:white;" value="Mehsana">Mehsana</option>
                        <option class="dropdown-item" style= "color:white;" value="Morbi">Morbi</option>
                        <option class="dropdown-item" style= "color:white;" value="Narmada">Narmada</option>
                        <option class="dropdown-item" style= "color:white;" value="Navsari">Navsari</option>
                        <option class="dropdown-item" style= "color:white;" value="Panchmahal">Panchmahal</option>
                        <option class="dropdown-item" style= "color:white;" value="Patan">Patan</option>
                        <option class="dropdown-item" style= "color:white;" value="Porbandar">Porbandar</option>
                        <option class="dropdown-item" style= "color:white;" value="Rajkot">Rajkot</option>
                        <option class="dropdown-item" style= "color:white;" value="Sabarkantha">Sabarkantha</option>
                        <option class="dropdown-item" style= "color:white;" value="Surat">Surat</option>
                        <option class="dropdown-item" style= "color:white;" value="Surendranagar">Surendranagar</option>
                        <option class="dropdown-item" style= "color:white;" value="Tapi">Tapi</option>
                        <option class="dropdown-item" style= "color:white;" value="Vadodara">Vadodara</option>
                        <option class="dropdown-item" style= "color:white;" value="Valsad">Valsad</option>
                    </select>
                </div>
            </div><br>
            <div class="form-group">
                <label for="tel">Telephone Number</label>
                <input type="number" class="form-control" id="tel" name="tel">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
            </div>
            <div>
                <button type="submit" class="btn btn-danger" name="hbsignup">SignUp</button>
            </div>
        </form>
        </div>
    </div>';
    }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="/DE_Project/valid.js"></script>
</body>

</html>