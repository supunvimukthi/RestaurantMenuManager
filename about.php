<?php
include('Server.php');


if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: Registration.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: Registration.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>


</head>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/css.css">
<link rel="stylesheet" href="css/Log.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/styled.css">
<link rel="stylesheet" href="css/notification.css">
<link rel="stylesheet" href="css/bootstrap-notifications.css">
<link rel="stylesheet" href="css/bootstrap-notifications.min.css">

<link rel="stylesheet" type="text/css" href="css/style.css">


<style>
    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropbtn:hover, .dropbtn:focus {
        background-color: #3e8e41;
    }

    #myInput {
        border-box: box-sizing;
        font-size: 16px;
        padding: 14px 20px 12px 20px;
        width: 230px;
        border: none;
        border-bottom: 1px solid #ddd;
    }

    #myInput:focus {
        outline: 3px solid #ddd;
    }

    #myInput1 {
        border-box: box-sizing;
        font-size: 16px;
        padding: 14px 20px 12px 20px;
        width: 230px;
        border: none;
        border-bottom: 1px solid #ddd;
    }

    #myInput1:focus {
        outline: 3px solid #ddd;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f6f6f6;
        width: 230px;
        overflow: auto;
        border: 1px solid #ddd;
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown a:hover {
        background-color: #ddd
    }

    .show {
        display: block;
    }

    body, h1, h2, h3, h4, h5, h6 {
        font-family: "Montserrat", sans-serif
    }

    .w3-row-padding img {
        margin-bottom: 12px
    }

    /* Set the width of the sidebar to 120px */
    .w3-sidebar {
        width: 120px;
        background: black;
    }

    /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
    #main {
        margin-left: 98px
    }

    /* Remove margins from "page content" on small screens */
    @media only screen and (max-width: 600px) {
        #main {
            margin-left: 0
        }
    }
</style>
<body class="w3-black">
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <?php
        $username = $_SESSION['username'];
        $query = "SELECT * FROM restaurants WHERE Accounts_Username='$username' LIMIT 1";
        // echo $query;

        $results = mysqli_query($conn, $query);
        $restaurant = mysqli_fetch_assoc($results);
        $id = $restaurant['RestaurantID'];
        $rname=$restaurant['Name'];
        $query = "SELECT * from notifications where RestaurantID=$id";
        $result = mysqli_query($conn, $query);
        $no=mysqli_num_rows($result);
        if (true) {
            echo "  <div class=\"collapse navbar-collapse\">
            <ul class=\"nav navbar-nav navbar-right\">
                <li class=\"dropdown dropdown-notifications\">
                    <a href=\"#notifications-panel\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                        <i data-count=\"$no\" class=\"glyphicon glyphicon-bell notification-icon\"></i>
                    </a>

                    <div class=\"dropdown-container dropdown-position-bottomright\">

                        <div class=\"dropdown-toolbar\">
                            <div class=\"dropdown-toolbar-actions\">
                                <a href=\"#\">Mark all as read</a>
                            </div>
                            <h3 class=\"dropdown-toolbar-title\">Notifications (".$no.")</h3>
                        </div><!-- /dropdown-toolbar -->

                        <ul class=\"dropdown-menu\">";
        while ($row = mysqli_fetch_row($result)) {

            echo "   <li class=\"notification\">
                                <div class=\"media\">
                                    <div class=\"media-left\">
                                        
                                    </div>
                                    <div class=\"media-body\">
                                        <strong class=\"notification-title\"><a href=\"#\">".$row[2]."</a> has booked your place </strong>
                                        <p class=\"notification-desc\">on ".$row[6]." at ".$row[7]."</p>

                                        <div class=\"notification-meta\">
                                            <small class=\"timestamp\">Contact: ".$row[4]." | E-Mail: ".$row[3]." </small>
                                        </div>
                                    </div>
                                </div>
                            </li>";
       }
        }
        ?>



                        </ul>

                        <div class="dropdown-footer text-center">
                            <a href="#">View All</a>
                        </div><!-- /dropdown-footer -->

                    </div><!-- /dropdown-container -->
                </li><!-- /dropdown -->

                <li><a href="#">Welcome <?php echo "$rname";?> !</a></li>

            </ul>
        </div>
    </div>
</nav>
<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
    <!-- Avatar image in top left corner -->
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-black">
        <i class="fa fa-home w3-xxlarge"></i>
        <p>HOME</p>
    </a>
    <a href="#Menu" class="w3-bar-item w3-button w3-padding-large w3-black">
        <i class="fa fa-cutlery w3-xxlarge"></i>
        <p>MENU</p>
    </a>
    <a href="#editMenu" class="w3-bar-item w3-button w3-padding-large w3-black">
        <i class="fa fa-plus-square w3-xxlarge"></i>
        <p>EDIT MENU</p>
    </a>

    <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-black">
        <i class="fa fa-cog w3-xxlarge"></i>
        <p>ACCOUNT</p>
    </a>
    <a href="about.php?logout='1'" class="w3-bar-item w3-button w3-padding-large w3-black">
        <i class="fa fa-power-off w3-xxlarge"></i>
        <p>LOG OUT</p>
    </a>
</nav>


<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
    <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
        <a href="#" class="w3-bar-item w3-button" style="width:20% !important">HOME</a>
        <a href="#Menu" class="w3-bar-item w3-button" style="width:20% !important">MENU</a>
        <a href="#editMenu" class="w3-bar-item w3-button" style="width:20% !important">EDIT MENU</a>
        <a href="#contact" class="w3-bar-item w3-button" style="width:20% !important">CONTACT</a>
        <a href="about.php?logout='1'" class="w3-bar-item w3-button" style="width:20% !important">LOGOUT</a>
    </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
    <!-- Header/Home -->
    <header class="w3-padding-64 w3-content" id="home"
            style="background:url('images/776550_steak.jpg');background-size: cover">
        <div class="row">
            <div class="col-md-6 col-md-offset-4">
                <form class="form-horizontal" role="form" method="post" style="font-weight: bold">
                    <fieldset style="margin-right: 300px; margin-left: 300px">
                        <legend>Restaurant Details</legend>
                        <?php
                        $username = $_SESSION['username'];
                        $query = "SELECT * FROM restaurants WHERE Accounts_Username='$username' LIMIT 1";
                        // echo $query;

                        $results = mysqli_query($conn, $query);
                        $restaurant = mysqli_fetch_assoc($results);
                        $name = $restaurant['Name'];
                        $type = $restaurant['Type'];
                        $openhrs = $restaurant['Open_Hours'];
                        $avgPrice = $restaurant['Avg_Price'];
                        $contact = $restaurant['Contact'];
                        $email = $restaurant['email'];
                        $line1 = $restaurant['Line1'];
                        $line2 = $restaurant['Line2'];
                        $city = $restaurant['Location'];

                        if ($restaurant) {
                            echo "<div class=\"form-group\">
                        <label class=\"col-sm-2 control-label\" for=\"textinput\">Restaurant Name</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name='name' placeholder=\"Restaurant Name\" value='$name' class=\"form-control\">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class=\"form-group\">
                        <label class=\"col-sm-2 control-label\" for=\"textinput\">Type</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\"  name='type'placeholder=\"Type\" value='$type' class=\"form-control\">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class=\"form-group\">
                        <label class=\"col-sm-2 control-label\" for=\"textinput\">Opening Hours</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name='Openhrs' placeholder=\"Opening Hours\" value='$openhrs' class=\"form-control\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"col-sm-2 control-label\" for=\"textinput\">Average Meal Price</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name='avgPrice' placeholder=\"Average Meal Price\" value='$avgPrice' class=\"form-control\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"col-sm-2 control-label\" for=\"textinput\">Contact No</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name='contact' placeholder=\"Contact\" value='$contact' class=\"form-control\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"col-sm-2 control-label\" for=\"textinput\">E-Mail address</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name='email' placeholder=\"E-Mail\" value='$email' class=\"form-control\">
                        </div>
                    </div>

                    <div class=\"form-group\">
                        <label class=\"col-sm-2 control-label\" for=\"textinput\">Line 1</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name='line1' placeholder=\"Address Line 1\"  value='$line1' class=\"form-control\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"col-sm-2 control-label\" for=\"textinput\">Line 2</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name='line2' placeholder=\"Address Line 2\" value='$line2' class=\"form-control\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"col-sm-2 control-label\" for=\"textinput\">City</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name='city' placeholder=\"City\" value='$city' class=\"form-control\">
                        </div>
                    </div>";

                        }
                        ?>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="pull-right">
                                    <input type="submit" name="update" class="btn btn-primary" value="Update"></input>
                                </div>
                            </div>
                        </div>


                        <!-- Form Name -->


                        <!-- Text input-->


                    </fieldset>
                </form>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
    </header>

    <div class="w3-padding-64 w3-content" id="Menu" style="height: 800px">
        <section id="menu-list" class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center marb-35">
                        <h1 class="header-h">Menu List</h1>

                    </div>

                    <div class="col-md-12  text-center" id="menu-flters">
                        <ul>
                            <li><a class="filter active" data-filter=".menu-restaurant">Show All</a></li>
                            <li><a class="filter" data-filter=".breakfast">Breakfast</a></li>
                            <li><a class="filter" data-filter=".lunch">Lunch</a></li>
                            <li><a class="filter" data-filter=".dinner">Dinner</a></li>
                        </ul>
                    </div>

                    <div id="menu-wrapper">
                        <?php
                        $username = $_SESSION['username'];
                        $query = "SELECT * FROM food_items WHERE FoodID in (select Food_Items_FoodID from restaurants_has_food_items where 	Restaurants_RestaurantID=(SELECT RestaurantID from restaurants where  Accounts_Username='$username')and Breakfast=1 ) ";
                        $result = mysqli_query($conn, $query);
                        if (true) {
                            while ($row = mysqli_fetch_row($result)) {
                                echo "<div class=\"breakfast menu-restaurant\">
            <span class=\"clearfix\">
              <a class=\"menu-title\" href=\"#\" data-meal-img=\"assets/img/restaurant/rib.jpg\">" . $row[1] . "</a>
              <span style=\"left: 166px; right: 44px; color: #eeeeee\" class=\"menu-line\"></span>
              <span class=\"menu-price\">" . $row[2] . "</span>
            </span>
                            <span class=\"menu-subtitle\">" . $row[3] . " | ";
                                if ($row[4] == 0) {
                                    echo "Non-Vegetarian</span>
                        </div>";
                                } else {
                                    echo "Vegetarian</span>
                        </div>";
                                }

                            }
                        }
                        $query = "SELECT * FROM food_items WHERE FoodID in (select Food_Items_FoodID from restaurants_has_food_items where 	Restaurants_RestaurantID=(SELECT RestaurantID from restaurants where  Accounts_Username='$username')and Lunch=1)  ";
                        $result = mysqli_query($conn, $query);
                        if (true) {
                            while ($row = mysqli_fetch_row($result)) {
                                echo "<div class=\"lunch menu-restaurant\">
            <span class=\"clearfix\">
              <a class=\"menu-title\" href=\"#\" data-meal-img=\"assets/img/restaurant/rib.jpg\">" . $row[1] . "</a>
              <span style=\"left: 166px; right: 44px; color: #eeeeee\" class=\"menu-line\"></span>
              <span class=\"menu-price\">" . $row[2] . "</span>
            </span>
                            <span class=\"menu-subtitle\">" . $row[3] . " | ";
                                if ($row[4] == 0) {
                                    echo "Non-Vegetarian</span>
                        </div>";
                                } else {
                                    echo "Vegetarian</span>
                        </div>";
                                }

                            }
                        }
                        $query = "SELECT * FROM food_items WHERE FoodID in (select Food_Items_FoodID from restaurants_has_food_items where 	Restaurants_RestaurantID=(SELECT RestaurantID from restaurants where  Accounts_Username='$username') and Dinner=1)  ";
                        $result = mysqli_query($conn, $query);
                        if (true) {
                            while ($row = mysqli_fetch_row($result)) {
                                echo "<div class=\"dinner menu-restaurant\">
            <span class=\"clearfix\">
              <a class=\"menu-title\" href=\"#\" data-meal-img=\"assets/img/restaurant/rib.jpg\">" . $row[1] . "</a>
              <span style=\"left: 166px; right: 44px; color: #eeeeee\" class=\"menu-line\"></span>
              <span class=\"menu-price\">" . $row[2] . "</span>
            </span>
                            <span class=\"menu-subtitle\">" . $row[3] . " | ";
                                if ($row[4] == 0) {
                                    echo "Non-Vegetarian</span>
                        </div>";
                                } else {
                                    echo "Vegetarian</span>
                        </div>";
                                }

                            }
                        }
                        // echo $query;


                        ?>

                    </div>

                </div>
            </div>
        </section>

    </div>
    <!-- Portfolio Section -->
    <div class="w3-padding-64 w3-content" id="editMenu"
         style="background: url('images/776550_steak.jpg');background-size: cover;height:500px">
        <fieldset style="margin-left: 150px ;margin-right:150px">
            <legend class="w3-text-light-grey text-center">Edit Menu</legend>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 >Add Menu Items</h2>
                        <form method="post" action="Server.php" id="form1">
                            <table class="table table-bordered table-hover" id="tableAddRow">
                                <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Breakfast</th>
                                    <th>Lunch</th>
                                    <th>Dinner</th>
                                    <th>Vegetarian</th>
                                    <th style="width:10px"><span type="submit" name="submit"
                                                                 class="glyphicon glyphicon-plus addBtn"
                                                                 id="submit"></span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr id="tr_0">
                                    <td><input type="text" class="filter-price filter form-control" name="category"
                                               placeholder="Category" id="myInput" onkeyup="filterFunction()"
                                               style="color: black">
                                        <div id="myDropdown" onchange="myFunction()" class="dropdown-content">
                                            <?php
                                            $username = $_SESSION['username'];
                                            $query = "SELECT DISTINCT Type FROM food_items ";
                                            $result = mysqli_query($conn, $query);
                                            if (true) {
                                                while ($row = mysqli_fetch_row($result)) {
                                                    echo "<a href=\"javascript:myFunction('" . $row[0] . "');\">" . $row[0] . "</a>";
                                                }
                                            } ?>

                                        </div>
                                    </td>
                                    <td><input type="text" class="filter-price filter form-control" name="fname"
                                               placeholder="Food Name" id="myInput1" onkeyup="filterFunction1()"
                                               style="color: black">
                                        <div id="myDropdown1" onchange="myFunction()" class="dropdown-content">
                                            <?php

                                            $username = $_SESSION['username'];
                                            $query = "SELECT DISTINCT Name FROM food_items";
                                            $result = mysqli_query($conn, $query);
                                            if (true) {
                                                while ($row = mysqli_fetch_row($result)) {
                                                    echo "<a href=\"javascript:myFunction1('" . $row[0] . "');\">" . $row[0] . "</a>";
                                                }
                                            } ?>

                                        </div>
                                    </td>
                                    <td><input type="text" data-filter="price" class="filter-price filter form-control"
                                               id="price" name="price" placeholder="Price">
                                        </input></td>
                                    <td><input type="checkbox" name="meal[]" value="Breakfast" id="break">Breakfast</td>
                                    <td><input type="checkbox" name="meal[]" value="Lunch" id="lunch">Lunch</td>
                                    <td><input type="checkbox" name="meal[]" value="Dinner" id="dinner"> Dinner</td>
                                    <td><input type="checkbox" name="meal[]" value="Vegetarian" id="veg">Vegetarian</td>
                                    <td><span class="glyphicon glyphicon-minus addBtnRemove" id="addBtnRemove_0"></span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

        </fieldset>
    </div>

    <!-- Contact Section -->
    <div class="w3-padding-64 w3-content w3-text-grey" id="contact"
         style="background:url('images/website-startups.jpg');background-size:contain;height: 800px; ">
        <div class="container" style="padding-top: 100px">
            <div class="row">
                <div class="col-md-6 col-md-offset-4">
                    <form class="form-horizontal" role="form" method="post" action="about.php#contact" style="font-weight: bold;color: #b7e3e2">
                        <fieldset style="margin-right: 300px; margin-left: 300px">
                            <legend>Account Settings</legend>
                            <?php include('errors.php'); ?>
                            <input type="password" class="input-lg form-control" name="Opassword" id="Opassword"
                                   placeholder="Current Password" autocomplete="off"><br>
                            <input type="password" class="input-lg form-control" name="password1" id="password1"
                                   placeholder="New Password" autocomplete="off">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8
                                    Characters Long<br>
                                    <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span>
                                    One Uppercase Letter
                                </div>
                                <div class="col-sm-6">
                                    <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span>
                                    One Lowercase Letter<br>
                                    <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One
                                    Number
                                </div>
                            </div>
                            <br>
                            <input type="password" class="input-lg form-control" name="password2" id="password2"
                                   placeholder="Repeat Password" autocomplete="off">
                            <div class="row">
                                <div class="col-sm-12">
                                    <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span>
                                    Passwords Match
                                </div>
                            </div>
                            <br>
                            <input type="submit" name="Cpassword" class="col-xs-12 btn btn-primary btn-load btn-lg"
                                   data-loading-text="Changing Password..." value="Change Password">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        <!-- End Contact Section -->
    </div>


    <!-- END PAGE CONTENT -->
</div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/contactform.js"></script>
<script src="js/passwordCheck.js"></script>
<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction1(val) {
        document.getElementById("myInput1").value = val;
        document.getElementById("myDropdown1").classList.remove("show");
    }

    function filterFunction1() {
        document.getElementById("myDropdown1").classList.add("show");
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput1");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown1");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
</script>
<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction(val) {
        document.getElementById("myInput").value = val;
        document.getElementById("myDropdown").classList.remove("show");
    }

    function filterFunction() {
        document.getElementById("myDropdown").classList.add("show");
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
</script>
<script>


    $(document).ready(function () {
        $('.addBtn').on('click', function () {
            //var trID;
            //trID = $(this).closest('tr'); // table row ID
            addTableRow();
        });
        $('.addBtnRemove').click(function () {
            $(this).closest('tr').remove();
        })
        var i = 0;

        function addTableRow() {

            var cat = $('#myInput').val();
            var name = $('#myInput1').val();
            var price = $('#price').val();
            var breakfast = $('#break').is(':checked');
            var lunch = $('#lunch').is(':checked');
            var dinner = $('#dinner').is(':checked');
            var veg = $('#veg').is(':checked');


            var tempTr = $('<tr><td> ' + cat + '</td><td>' + name + '</td><td>' + price + '</td><td>' + breakfast + '</td><td>' + lunch + '</td><td>' + dinner + '</td><td>' + veg + '</td><td><span class="glyphicon glyphicon-minus addBtnRemove" id="addBtn_' + i + '"></span></td></tr>').on('click', function () {
                // $(this).closest('tr').remove();
                $(document.body).on('click', '.TreatmentHistoryRemove', function (e) {
                    $(this).closest('tr').remove();
                });
            });

            $("#tableAddRow").append(tempTr)
            i++;
        }
    });</script>
<script>
    $(function () {

        $('#submit').click(function () {
            console.log($('#form1').serialize());
            $.ajax({
                url: $('#form1').attr('action'),
                type: $('#form1').attr('method'),
                data: $('#form1').serialize(),
                success: function (result) {
                    console.log(result + 'csc');

                }

            });

        });
    });
</script>
</body>
</html>