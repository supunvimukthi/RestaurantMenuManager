<?php

session_start();

// initializing variables
$username = "";
$email = "";
$errors = array();
$name ="";
$location ="";
$contact ="";
$type="";

// connect to the database
include('DatabaseConnect.php');

// REGISTER USER
if (isset($_POST['reg_user'])) {


    // receive all input values from the form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    //form validating
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }


    //checking the database for existing users
    $user_check_query = "SELECT * FROM accounts WHERE Username='$username' OR Email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    // if user exists with the same user name or email
    if ($user) {
        if ($user['Username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['Email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO restaurants(Name,Location,Contact,email,Type,Accounts_Username)VALUES('$name','$location',$contact,'$email','$type','$username') ";
        echo "<script>console.log($query);</script>";
        mysqli_query($conn, $query);
        $password = md5($password_1);
        $query = "INSERT INTO accounts (Username, Email, Password) VALUES('$username', '$email', '$password')";
        mysqli_query($conn, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        echo "<script>alert('Successfully Registered in the system');</script>";
        header('location: Registration.php#login-form');

    }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM accounts WHERE Username='$username' AND Password='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            echo "<script>alert('Successfully Logged in as $username');</script>";
            header('location: about.php');
        } else {
            array_push($errors, "Wrong username/password combination. Check Again");
        }
    }
}
if (isset($_POST['search'])) {

    // receive all input values from the form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $price = (int)mysqli_real_escape_string($conn, $_POST['price']);
    $tprice = (int)mysqli_real_escape_string($conn, $_POST['price1']);


    //form validating
    //  if (is_string($batch_royal) or is_string($batch)) { array_push($errors, "Batch of College or University can't contain letters"); }
    // creating query
    $query = "SELECT * FROM restaurants WHERE 1=1";
    if (!empty($name)) {
        $query .= " and Name like '%$name%'";
    }
    if (!empty($type)) {
        $query .= " and Type='$type'";
    }
    if (!empty($city)) {
        $query .= " and Location like '%$city%'";
    }
    if (!empty($price) and !empty($tprice)) {
        $query .= " and Avg_Price between $price and $tprice";
    }


    $_SESSION['query'] = $query;
    //checking the database for existing users
    if (count($errors) == 0) {
        $user_check_query = $query;
        $result = mysqli_query($conn, $user_check_query);
        //  $user = mysqli_fetch_assoc($result);
    }

}
if (isset($_POST['Fsearch'])) {

    // receive all input values from the form
    $food = mysqli_real_escape_string($conn, $_POST['food']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $meal = mysqli_real_escape_string($conn, $_POST['meal']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = (int)mysqli_real_escape_string($conn, $_POST['price']);
    $tprice = (int)mysqli_real_escape_string($conn, $_POST['price1']);


    //form validating
    //  if (is_string($batch_royal) or is_string($batch)) { array_push($errors, "Batch of College or University can't contain letters"); }
    // creating query
    $restaurant = $_SESSION['restaurant'];
    $query = "SELECT * FROM food_items WHERE 1=1 and FoodID in (SELECT Food_Items_FoodID from restaurants_has_food_items where Restaurants_RestaurantID=$restaurant)";
    if (!empty($meal)) {
        $query = "SELECT * FROM food_items WHERE 1=1 and FoodID in (SELECT Food_Items_FoodID from restaurants_has_food_items where Restaurants_RestaurantID=$restaurant and $meal =1)";
    }
    if (!empty($food)) {
        $query .= " and Name like '%$food%'";
    }
    if (!$type == 'empty') {
        $query .= " and Vegetarian=$type";
    }
    if (!empty($category)) {
        $query .= " and Type ='$category'";
    }
    if (!empty($price) and !empty($tprice)) {
        $query .= " and Price between $price and $tprice";
    }


    $_SESSION['query'] = $query;
    //checking the database for existing users
    if (count($errors) == 0) {
        $user_check_query = $query;
        $result = mysqli_query($conn, $user_check_query);
        //  $user = mysqli_fetch_assoc($result);
    }

}
if (isset($_POST['update'])) {

    // receive all input values from the form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $Openhrs = mysqli_real_escape_string($conn, $_POST['Openhrs']);
    $avgPrice = mysqli_real_escape_string($conn, $_POST['avgPrice']);
    $line1 = mysqli_real_escape_string($conn, $_POST['line1']);
    $line2 = mysqli_real_escape_string($conn, $_POST['line2']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);

    $username = $_SESSION['username'];

    $query = "UPDATE restaurants SET Name='$name',Line1='$line1',Line2='$line2',Location='$city',Contact=$contact,email='$email',Type='$type',Avg_Price=$avgPrice,Open_Hours='$Openhrs' WHERE Accounts_Username='$username'  ";
    // echo $query;
    mysqli_query($conn, $query);

    $_SESSION['query'] = $query;
    //checking the database for existing users
    if (count($errors) == 0) {
        $user_check_query = $query;
        $result = mysqli_query($conn, $user_check_query);
        //  $user = mysqli_fetch_assoc($result);
    }

}
if (isset($_POST['restaurant'])) {
    $_SESSION['restaurant'] = mysqli_real_escape_string($conn, $_POST['REST']);
    header('location: search.php');


}

if (isset($_POST['fname'])) {

    $name = $_POST['fname'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $query = "SELECT * FROM food_items WHERE Name='$name' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $food = mysqli_fetch_assoc($result);
    $fID = $food['FoodID'];
    $username = $_SESSION['username'];
    $query = "SELECT * FROM restaurants WHERE Accounts_Username='$username' LIMIT 1";
    // echo $query;

    $results = mysqli_query($conn, $query);
    $restaurant = mysqli_fetch_assoc($results);
    $id = $restaurant['RestaurantID'];
    if (!empty($_POST['meal'])) {
        $b = 0;
        $l = 0;
        $d = 0;
        $v = 0;
        foreach ($_POST['meal'] as $value) {
            if ($value == 'Breakfast') {
                $b = 1;
            }
            if ($value == 'Lunch') {
                $l = 1;
            }
            if ($value == 'Dinner') {
                $d = 1;
            }
            if ($value == 'Vegetarian') {
                $v = 1;
            }
        }
    }
    // if food exists with the same name
    if ($food) {
        $query = "INSERT INTO restaurants_has_food_items(Restaurants_RestaurantID, Food_Items_FoodID, Breakfast, Lunch, Dinner) VALUES ($id,$fID";

        if ($b == 1) {
            $query = $query . ",1";
        } else {
            $query = $query . ",0";
        }
        if ($l == 1) {
            $query = $query . ",1";
        } else {
            $query = $query . ",0";
        }
        if ($d == 1) {
            $query = $query . ",1)";
        } else {
            $query = $query . ",0)";
        }

        mysqli_query($conn, $query);


    } else {

        if ($v == 1) {
            $query = "INSERT INTO food_items(Name,Price,Type,Vegetarian) VALUES ('$name',$price,'$category',1)";

        } else {
            $query = "INSERT INTO food_items(Name,Price,Type,Vegetarian) VALUES ('$name',$price,'$category',0)";
        }
        if (mysqli_query($conn, $query)) {
            $last_id = mysqli_insert_id($conn);
        }
        $query = "INSERT INTO restaurants_has_food_items(Restaurants_RestaurantID, Food_Items_FoodID, Breakfast, Lunch, Dinner) VALUES ($id,$last_id";

        if ($b == 1) {
            $query = $query . ",1";
        } else {
            $query = $query . ",0";
        }
        if ($l == 1) {
            $query = $query . ",1";
        } else {
            $query = $query . ",0";
        }
        if ($d == 1) {
            $query = $query . ",1)";
        } else {
            $query = $query . ",0)";
        }

        mysqli_query($conn, $query);

    }

}
if (isset($_POST['Cpassword'])) {
    $Opassword = mysqli_real_escape_string($conn, $_POST['Opassword']);
    $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    $username = $_SESSION['username'];

    if (count($errors) == 0) {
        $password = md5($Opassword);
        $query="SELECT * FROM accounts WHERE Username='$username' and Password='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
            if($password1==$password2  ){
                if (strlen($password1)>8){
                    if (count($errors) == 0){
                        $password1=md5($password1);
                        $query="UPDATE accounts SET Password='$password1' WHERE Username='$username'";
                        mysqli_query($conn, $query);
                        echo "<script>alert('Password Changed Successfully');</script>";

                    }
                }else{
                    array_push($errors, "Password must contain more than 8 characters");
                }

            }else{
                array_push($errors, "Two Passwords do no match ! ");
            }
        } else {
            array_push($errors, "Enter the correct current password ! ");
        }
    }





}
if(isset($_POST['book'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $people = mysqli_real_escape_string($conn, $_POST['people']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $date=date("Y-m-d",strtotime($date));
    echo "<script>alert('$date');</script>";
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);
    $username = $_SESSION['username'];
    $query = "SELECT * FROM restaurants WHERE Accounts_Username='$username' LIMIT 1";
    // echo $query;

    $results = mysqli_query($conn, $query);
    $restaurant = mysqli_fetch_assoc($results);
    $id = $restaurant['RestaurantID'];


    if (count($errors) == 0) {
        $query = "INSERT INTO notifications(RestaurantID, name, email, contact, people, date, time,message) VALUES ($id,'$name','$email',$phone,$people,'$date','$time','$msg')";
        echo "<script>console.log($query);</script>";
        mysqli_query($conn, $query);


    }
}

?>