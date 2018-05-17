<?php include('Server.php') ?>

<!DOCTYPE html>
<html lang='en' class=''>
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel='stylesheet' href='css/style.css' type="text/css" media="all">
      
    <link rel="stylesheet" href="css/jquery.rateyo.css"/>
    <script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style class="cp-pen-styles">body {
            background-image: url("images/s6.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            padding-top: 30px;
        }

        .product {
            margin-bottom: 30px;
        }

        .product img {
            margin-bottom: 10px;
        }

    </style>
</head>

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

<body>
<div class="container">
    <div class="row" id="search">
        <form id="search-form" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group col-xs-9">
                <input id="name" class="form-control" name="name" type="text" placeholder="Search by Restaurant Name"/>
            </div>
            <div class="form-group col-xs-3">
                <input name="search" type="submit" onclick="Show" class="btn btn-block btn-primary"
                       value="Search"></input>
            </div>

            <div class="form-group col-sm-3 col-xs-3">
                <select data-filter="make" class="filter-make filter form-control" name="city">
                    <option value="">Select Location</option>
                    <?php
                    $query = "select DISTINCT Location from restaurants ORDER BY Location";
                    $result = mysqli_query($conn, $query);
                    if (true) {
                        while ($row = mysqli_fetch_row($result)) {
                            echo "<option value=" . $row[0] . ">" . $row[0] . "</option>";
                        }
                    }
                    ?>


                </select>
            </div>
            <div class="form-group col-sm-3 col-xs-3">
                <select data-filter="model" class="filter-model filter form-control" name="type">
                    <option value="">Select Type</option>
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
            <div class="form-group col-sm-3 col-xs-3">
                <input type="text" data-filter="price" class="filter-price filter form-control" name="price"
                       placeholder="Price Range from">
                </input>
            </div>
            <div class="form-group col-sm-3 col-xs-3">
                <input type="text" data-filter="price" class="filter-price filter form-control" name="price1"
                       placeholder="To">
                </input>
            </div>
        </form>
    </div>
</div>

<div class="container" id="con">
    <?php
    if (!isset($_POST['search'])) {
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
        if (isset($_SESSION['query'])) {
            $result = mysqli_query($conn, $_SESSION['query']);
            if (true) {
                while ($row = mysqli_fetch_row($result)) {
                    echo "
        <div class=\"item  col-xs-4 col-lg-4\">
            <div class=\"thumbnail\">
                <form method='post'>
                <input type=\"hidden\" value=" . $row[0] . " name='REST'  />
                <div class=\"caption\"><h3 class=\"group inner list-group-item-heading\" >" . $row[1] . "</h3>
                    <p class=\"group inner list-group-item-text\">Location: " . $row[4] . "</p>
                    <p class=\"group inner list-group-item-text\">Opening Hours: " . $row[10] . "</p>
                    <div class=\"row\">
                        <div class=\"col-xs-12 col-md-8\">
                            <p>Contact No: " . $row[5] . "</p>                </div>
                            <div class=\"col-xs-12 col-md-8\">
                    
                            <div id=\"rateYo" . $row[0] . "\"></div>   <script>$(function () {

        $(\"#rateYo\".concat(\"$row[0]\")).rateYo({
            rating: 3.6
        });

    });</script>            </div> 
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
        } ?>
    </div>
</div>


<-- HTML -->
 


 

  
<script src="js/jquery.rateyo.js"></script>


</body>
</html>