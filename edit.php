<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Course list</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!--
Template 2039 Sunflower
http://www.tooplate.com/view/2039-sunflower
-->
<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:15,
		animSpeed:500,
		pauseTime:3000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>

</head>
<body>

<div id="tooplate_wrapper">
	<?php
        include './header.php';
        //include './mainmenu.php';
        
        ?>
	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        <div class="col_w900">
            <div class="col_allw280 fp_service_box">
      
      
            <div class="cleaner"></div>
		</div>
    
    	 <div class="col_w900 col_w900_last">
<div class="col_w580 float_l" style="height: 350px">
<div class="con_tit_01">
   <span>edit List</span></div>
    <div class="cleaner"></div>
           </div>
	        <?php
//echo "edit called";

$courseid=$_GET["courseid"];



//echo $id;
require './connection.php';

$query="select * from mstcourse where courseid='$courseid'";

$result= mysqli_query($con, $query);

$a= mysqli_fetch_array($result);
?>
<form method="post">
     Id<input type="text" name="id"
        readonly  value="<?php echo $a[0]; ?>">
     <br>
     Name<input type="text" name="name"
                value="<?php echo $a[1]; ?>">
     <br>
     Price<input type="text" name="price"
value="<?php echo $a[2]; ?>"     >
     <br>
     <input type="submit" name="update" value="update">
 </form>
<?php
if(isset($_POST["update"]))
{
    extract($_POST);
    require './connection.php';
    
    $query="update product set name='$name',
    price=$price where id=$id";
    
    mysqli_query($con, $query);
    
    $n= mysqli_affected_rows($con);
    
    if($n>0)
       header('location:show2.php');
    else
        echo "Try again";
}

?>
    
    

     
			</div>
        <div class="cleaner"></div>
    </div> <!-- end of main -->
    </div>
    <?php
        include './footer.php';
    ?>  
</div> <!-- end of wrapper -->
</body>
</html>