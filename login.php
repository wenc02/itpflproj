<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="gsap.min.js"></script>
    <script src="loginan.js" defer></script>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="wrapper">
       <div class="formbox">
            <div class=" button login">
                <h1>Already have an account?</h1>
                <button>Login</button>
            </div>
            <div class=" button signup">
                <h1>Dont have an account?</h1>
                <button>Sign up</button>
            </div>
            <div class="formBox">
                <form class="form loginform" action="loginfromdb.php" method="POST">
                    <h1 id="message"></h1>
                    <h1>Login</h1>
                    <input type="text" name="username" placeholder="Username" id="username" required>
                    <input type="password" name="password" placeholder="Password" id="password" required> 
                    <input type="submit" name="login" value="Login">
                </form>

                <form class="form signupform" action="signuptodb.php" method="POST">>  
                    <h1>Sign Up</h1>
                    <input type="text" name="username" placeholder="Username">
                    <input type="text" name="email" placeholder="example@gmail.com">
                    <input type="password" name="password" placeholder="Password">
                    <input type="password" name="conpassword" placeholder="Confirm Password"> 
                    <input type="submit" name="signup" value="signup">
                </form>
            </div>
       </div>
    </div>
</body>
</html>