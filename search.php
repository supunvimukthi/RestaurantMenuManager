<?php include('Server.php') ?>
<?php


if (isset($_SESSION['restaurant'])) {
    //echo $_SESSION['restaurant'];
}
?>


<!DOCTYPE html>
<html lang='en' class=''>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/contactform.js"></script>


    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styled.css">
    <link rel='stylesheet' href='css/style.css' type="text/css" media="all">
    <script>
        $(document).ready(function () {
            $('#list').click(function (event) {
                event.preventDefault();
                $('#products .item').addClass('list-group-item');
            });
            $('#grid').click(function (event) {
                event.preventDefault();
                $('#products .item').removeClass('list-group-item');
                $('#products .item').addClass('grid-group-item');
            });
        });

    </script>
    <style class="cp-pen-styles">body {
            background-image: url("images/776550_steak.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        /*noinspection ALL*/
        .product-inner {
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            padding: 10px;
        }

        .product img {
            margin-bottom: 10px;
        }</style>
</head>
<body>
<header id="header">
    <div class="container">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#">Home</a>
            <a href="book.php">Book a table</a>
        </div>
        <!-- Use any element to open the sidenav -->
        <span onclick="openNav()" class="pull-right menu-icon">☰</span>
    </div>
</header>
<div class="container">
    <div class="row" id="search">
        <form id="search-form" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group col-xs-9">
                <input class="form-control" type="text" placeholder="Search for Food" name="food"/>
            </div>
            <div class="form-group col-xs-3">
                <input type="submit" class="btn btn-block btn-primary" value="Search" name="Fsearch"></input>
            </div>

    </div>
    <div class="row" id="filter">

        <div class="form-group col-sm-3 col-xs-6">
            <select data-filter="make" class="filter-make filter form-control" name="type">
                <option value="empty">Select Type</option>
                <option value=1>Vegetarian</option>
                <option value=0>Non-vegetarian</option>
            </select>
        </div>
        <div class="form-group col-sm-3 col-xs-6">
            <select data-filter="model" class="filter-model filter form-control" name="meal">
                <option value="">Select Meal</option>
                <option value="Breakfast">Breakfast</option>
                <option value="Lunch">Lunch</option>
                <option value="Dinner">Dinner</option>
            </select>
        </div>
        <div class="form-group col-sm-3 col-xs-6">
            <select data-filter="type" class="filter-type filter form-control" name="category">
                <option value="">Select Category</option>
                <?php
                $query = "select DISTINCT Type from food_items ORDER BY Type";
                $result = mysqli_query($conn, $query);
                if (true) {
                    while ($row = mysqli_fetch_row($result)) {
                        echo "<option value=" . $row[0] . ">" . $row[0] . "</option>";
                    }
                }
                ?>

            </select>
        </div>
        <div class="form-group col-sm-2 col-xs-3">
            <input type="text" data-filter="price" class="filter-price filter form-control" name="price"
                   placeholder="Price Range from">
            </input>
        </div>
        <div class="form-group col-sm-1 col-xs-3">
            <input type="text" data-filter="price" class="filter-price filter form-control" name="price1"
                   placeholder="To">
            </input>
        </div>
        </form>
    </div>
</div>

<div class="container" id="con">
    <?php
    if (!isset($_POST['Fsearch'])) {
        echo "<script>

    document.getElementById(\"con\").style.visibility=\"hidden\";
</script>";
    };

    ?>
    <div class="well well-sm">
        <strong>Restaurants</strong>
        <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm"><span
                        class="glyphicon glyphicon-th-list"></span>List</a>
            <a href="#" id="grid" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th"></span>Grid</a>
        </div>
    </div>

    <div id="products" class="row list-group">
        <?php
        //echo $_SESSION['query'];
        if (isset($_SESSION['query'])) {
            $result = mysqli_query($conn, $_SESSION['query']);
            if (true) {
                while ($row = mysqli_fetch_row($result)) {
                    echo "
        <div class=\"item  col-xs-4 col-lg-4\">
            <div class=\"thumbnail\">
                <form method='post'>
                <div class=\"caption\"><h3 class=\"group inner list-group-item-heading\" >" . $row[1] . "</h3>
                    <p class=\"group inner list-group-item-text\">Price: " . $row[2] . "</p>
                    <div class=\"row\">
                        <div class=\"col-xs-12 col-md-8\">
                            <p> ";
                    if ($row[4] == 0) {
                        echo $row[3] . " | Non-Vegetarian</p> </div>
                        <div class=\"col-xs-12 col-md-4\">                        
                           </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

     ";
                    }
                    if ($row[4] == 1) {
                        echo $row[3] . " | Vegetarian</p> </div>
                        <div class=\"col-xs-12 col-md-4\">
                        
                           <input class=\"btn btn-success\" type='submit' value='Select'  name='restaurant'></input></form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

     ";
                    }
                }
            }
        } ?>
    </div>
</div>


</body>
</html>