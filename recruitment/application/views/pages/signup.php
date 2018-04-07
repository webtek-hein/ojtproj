<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Sign Up Form</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="assets/css/signup.css">


</head>

<body>


<div class="container">
    <form method="POST" action="Accounts/signup">
        <div class="row">
            <h4>Account Information</h4>
             <div class="input-group input-group-icon">
                 <input name="last" type="text" placeholder="Last Name"/>
                 <div class="input-icon"><i class="fa fa-user"></i></div>
             </div>
            <div class="input-group input-group-icon">
                <input name="first" type="text" placeholder="First Name"/>
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input name="id" type="text" placeholder="Id Number"/>
                <div class="input-icon"><i class="fa-credit-card"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input name="email" type="email" placeholder="Email Address"/>
                <div class="input-icon"><i class="fa-envelope"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input name="password" type="password" placeholder="Password"/>
                <div class="input-icon"><i class="fa fa-key"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input name="contact" type="text" placeholder="Contact No."/>
                <div class="input-icon"><i class="fa-mobile"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input name="contact" type="text" placeholder="Alternative Contact No."/>
                <div class="input-icon"><i class="fa-mobile"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input name="course" type="text" placeholder="Course"/>
                <div class="input-icon"><i class="fa-mortar-board"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input name="year" placeholder="Year"/>
                <div class="input-icon"><i class="fa-mortar-board"></i></div>
            </div>
            <div class="input-group">
                <input type="radio" name="gender" value="male" id="gender-male"/>
                <label for="gender-male">Student</label>
                <input type="radio" name="gender" value="female" id="gender-female"/>
                <label for="gender-female">Alumni</label>
            </div>
        </div>
        <div class="row">
            <h4>Terms and Conditions</h4>
            <div class="input-group">
                <input type="checkbox" id="terms"/>
                <label for="terms">I accept the terms and conditions for signing up to this service, and hereby confirm I have read the privacy policy.</label>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success">Sign Up</button>
        </div>
    </form>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



<script  src="assets/js/signup.js"></script>




</body>

</html>
