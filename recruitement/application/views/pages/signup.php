<!DOCTYPE html>
<html lang="en" >
<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $user_id = ($this->session->userdata['logged_in']['user_id']);
} else {
    redirect("logout");
}
?>
<head>
    <meta charset="UTF-8">
    <title>Sign Up Form</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="assets/css/style.css">


</head>

<body>


<div class="container">
    <form method="POST" action="accounts/signup">
        <div class="row">
            <h4>Account</h4>
            <div class="input-group input-group-icon">
                <input name="first" type="text" placeholder="First Name"/>
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input name="last" type="text" placeholder="Last Name"/>
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input name="id" type="text" placeholder="ID Number"/>
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input name="contact" type="text" placeholder="Contact Number"/>
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input name="course" type="text" placeholder="Course"/>
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input name="year" type="text" placeholder="Year"/>
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input name="email" type="email" placeholder="Email Adress"/>
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input name="username" type="text" placeholder="Username"/>
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input name="password" type="password" placeholder="Password"/>
                <div class="input-icon"><i class="fa fa-key"></i></div>
            </div>
        </div>
        <div class="row">

            <div class="col-half">
                <div class="input-group">
                    <input name="type" type="radio"  value="alumni" id="gender-male"/>
                    <label for="gender-male">Alumni</label>
                    <input name="type" type="radio" value="student" id="gender-female"/>
                    <label for="gender-female">Student</label>
                </div>
            </div>
        </div>
        <div class="row">
            <h4>Terms and Conditions</h4>
            <div class="input-group">
                <input type="checkbox" id="terms"/>
                <label for="terms">I accept the terms and conditions for signing up to this service, and hereby confirm I have read the privacy policy.</label>
            </div>
        </div>
        <button type="submit">Signup</button>
    </form>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



<script  src="js/index.js"></script>




</body>

</html>

