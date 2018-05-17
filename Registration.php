<?php include('Server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration and Login</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/Register.js"></script>


    <!------ Include the above in your HEAD tag ---------->
    <link rel='stylesheet' href='css/style.css' type="text/css" media="all">


    <style>body {
            background-image: url("images/food.jpg");
            background-size: cover
        }</style>
</head>
<body>
<div class="container" style="outline-width: thick">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="padding-top: 90px;">
            <div class="panel panel-login">
                <div class="panel-heading" style="background-color: #999999">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#login-form" id="login-form-link">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#register-form" class="active" id="register-form-link">Register</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body" style="background-color: #eeeeee">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" action="Registration.php" method="post" style="display: none;">
                                <?php include('errors.php'); ?>
                                <div class="form-group">
                                    <input id="user" type="text" name="username" tabindex="1" class="form-control"
                                           placeholder="Username" value="" required>
                                </div>
                                <div class="form-group">
                                    <input id="pass" type="password" name="password" tabindex="2" class="form-control"
                                           placeholder="Password" required>
                                </div>
                                <div class="form-group text-center">
                                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                    <label for="remember"> Remember Me</label>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit"
                                                   onclick="document.getElementById('register-form').style.display='none'"
                                                   name="login_user" id="login-submit" tabindex="4"
                                                   class="form-control btn btn-login" value="Log In">
                                        </div>
                                    </div>
                                </div>
                                <!--   <div class="form-group">
                                       <div class="row">
                                           <div class="col-lg-12">
                                               <div class="text-center">
                                                   <a href="https://phpoll.com/recover" tabindex="5"
                                                      class="forgot-password">Forgot Password?</a>
                                               </div>
                                           </div>
                                       </div>
                                   </div>  -->
                            </form>
                            <form id="register-form" action="Registration.php" method="post" style="display: block;">
                                <?php include('errors.php'); ?>
                                <div class="form-group">
                                    <input type="text" name="name" id="name" tabindex="1" class="form-control"
                                           placeholder="Restaurant Name" value="<?php echo $name; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="location" id="location" tabindex="1" class="form-control"
                                           placeholder="Restaurant Location" value="<?php echo $location; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="tel" name="contact" id="contact" tabindex="1" class="form-control"
                                           placeholder="Contact No" value="<?php echo $contact; ?>" required>
                                </div>
                                <div class="form-group">
                                    <select name="type" class="form-control">
                                        <option value="">Select Type</option>
                                        <?php ?>

                                        <?php
                                        $query = "select DISTINCT Type from restaurants ORDER BY Type";
                                        $result = mysqli_query($conn, $query);
                                        if (true) {
                                            while ($row = mysqli_fetch_row($result)) {
                                                echo "<option value=" . $row[0] . ">" . $row[0] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" tabindex="1" class="form-control"
                                           placeholder="Username" value="<?php echo $username; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control"
                                           placeholder="Email Address" value="<?php echo $email; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_1" id="password_1" tabindex="2"
                                           class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_2" id="password_2" tabindex="2"
                                           class="form-control" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="reg_user" tabindex="4"
                                                   class="form-control btn btn-register">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>