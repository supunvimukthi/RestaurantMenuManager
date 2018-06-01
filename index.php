<!DOCTYPE html>
<html>
<head>
<title>Restaurant Menu Manager</title>

<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons -->
<!-- font -->
<link href='//fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/SmoothScroll.min.js"></script>
</head>
<body>
<script>
    var x={};
    var foo=function(){
        this.hello="HI";
        return this;

    }
    x.bar=foo;
    console.log(x);
    console.log(x.bar);
    console.log(x.bar());
    console.log(x.bar().bar());
    console.log(foo);
    document.write(x.bar().bar());
    document.write(x.bar());
    document.write(x);
    document.write(x.bar);

</script>
	<script src="js/jquery.vide.min.js"></script>
	<div data-vide-bg="video/cook" style="position: fixed;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: -100;
  border: 3px solid red ;
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  background-size: cover;">
		<div class="banner">
			<div class="container">
				<div class="banner-info">
					<h2>Welcome to Restaurant Menu Manager! </h2>
				</div>
				<div  class="banner-grads">
					<div class="col-md-2 banner-grad"></div>
					<div class="col-md-4 banner-grad">
						<div  class="banner-grad-img">
							<a href="Registration.php"><img align="right" src="images/b1.jpg" alt="" /></a>
							<h4>Restaurant Owners</h4>
						</div>
					</div>

					<div class="col-md-4 banner-grad">
						<div class="banner-grad-img">
							<a href="RestaurantSearch.php"><img src="images/b2.jpg" alt="" /></a>
							<h4>Customers</h4>
						</div>
					</div>
					<div class="col-md-2 banner-grad"></div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
</body>	
</html>