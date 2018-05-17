<?php include('Server.php') ?>
<!DOCTYPE html>
<html lang='en' class=''>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    <title>Booking</title>


    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.mini.css">
    <link rel="stylesheet" type="text/css" href="css/styleas.css">

    <style class="cp-pen-styles">body {
            background-image: url("images/776550_steak.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .product-inner {
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            padding: 10px;
        }

        .product img {
            margin-bottom: 10px;
        }</style>
<body>
<header id="header">
    <div class="container">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="search.php">Home</a>
            <a href="#">Book a table</a>
        </div>
        <!-- Use any element to open the sidenav -->
        <span onclick="openNav()" class="pull-right menu-icon">☰</span>
    </div>
</header>
<section id="contact" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="header-h">Book Your table</h1>
                <p class="header-p">
                    <br></p>
            </div>
        </div>
        <div class="row msg-row">
            <div class="col-md-4 col-sm-4 mr-15">
                <div class="media-2">
                    <div class="media-left">

                        <div class="contact-phone bg-1 text-center"><span class="phone-in-talk fa fa-phone"></span>
                        </div>
                    </div>
                    <div class="media-body">
                        <?php
                        $username = $_SESSION['username'];
                        $query = "SELECT * FROM restaurants WHERE Accounts_Username='$username' LIMIT 1";
                        // echo $query;

                        $results = mysqli_query($conn, $query);
                        $restaurant = mysqli_fetch_assoc($results);
                        $id = $restaurant['RestaurantID'];
                        $query = "SELECT * from restaurants where RestaurantID=$id";
                        $result = mysqli_query($conn, $query);
                        if (true) {
                            while ($row = mysqli_fetch_row($result)) {
                                echo "<h4 class=\"dark-blue regular\">Phone Numbers</h4>
                        <p class=\"light-blue regular alt-p\">" . $row[5] . "<span class=\"contacts-sp\">-Phone Booking</span></p>
                    </div>
                </div>
                <div class=\"media-2\">
                    <div class=\"media-left\">
                        <div class=\"contact-email bg-14 text-center\"><span class=\"hour-icon fa fa-clock-o\"></span></div>
                    </div>
                    <div class=\"media-body\">
                        <h4 class=\"dark-blue regular\">Opening Hours</h4>
                        <p class=\"light-blue regular alt-p\"> Monday to Friday " . $row[10] . "</p>
                        <p class=\"light-blue regular alt-p\">
                            Friday and Sunday " . $row[10] . "
                        </p>";
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">

                <form action="book.php" method="post" role="form" class="contactForm"
                      style="font-weight: bolder;color: white">
                    <div id="sendmessage">Your booking request has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <div class="col-md-6 col-sm-6 contact-form pad-form">
                        <div class="form-group label-floating is-empty">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                   required data-rule="minlen:4" data-msg="Please enter at least 4 chars"/>
                            <div class="validation"></div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6 contact-form">
                        <div class="form-group">
                            <input type="date" class="form-control label-floating is-empty" name="date" id="date"
                                   required placeholder="Date" data-rule="required" data-msg="This field is required"/>
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 contact-form pad-form">
                        <div class="form-group">
                            <input type="email" class="form-control label-floating is-empty" name="email" id="email"
                                   required placeholder="Your Email" data-rule="email"
                                   data-msg="Please enter a valid email"/>
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 contact-form">
                        <div class="form-group">
                            <input type="time" class="form-control label-floating is-empty" name="time" id="time"
                                   required placeholder="Time" data-rule="required" data-msg="This field is required"/>
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control label-floating is-empty" name="phone" id="phone"
                                   required placeholder="Phone" data-rule="required" data-msg="This field is required"/>
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control label-floating is-empty" name="people" id="people"
                                   required placeholder="People" data-rule="required"
                                   data-msg="This field is required"/>
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-12 contact-form">
                        <div class="form-group label-floating is-empty">
                            <textarea class="form-control" name="message" rows="5" rows="3" data-rule="required"
                                      data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation"></div>
                        </div>

                    </div>
                    <div class="col-md-12 btnpad">
                        <div class="contacts-btn-pad">
                            <input name="book" type="submit" class="contacts-btn" value="Book Table"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

</body>
</html>