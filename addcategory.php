<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category Entry Form</title>
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
        include './adminmenu.php';
        
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
   <span>Category Entry Form</span></div>
   <form method="post">
       <table border="1" align="center">
           <tr>
               <td>Category Name*</td>
               <td>
<input type="text" name="ctgnm" required>
               </td>               
           </tr>           
           <tr>               
               <td colspan="2" align="center">
<input type="submit" name="b1" value="Add Category">
               </td>               
           </tr>
       </table> 
   </form>      
<?php    
if(isset($_REQUEST["b1"]))
{
    require './connection.php';   
    extract($_REQUEST); 
//-------dupication check----------
$query="select ctgnm from mstcategory where ctgnm='$ctgnm'";

$re=mysqli_query($con,$query);
$n= mysqli_num_rows($re);
if($n>0)
{
    die("<script>alert('Record Already Exists')</script>");
}

//----------end duplication----------
$s="insert into mstcategory(ctgnm) values('$ctgnm')";
mysqli_query($con,$s);
$t=mysqli_affected_rows($con);
if($t>0)
   echo "<script>alert('Record  Saved')</script>";
else
   echo "<script>alert('Record Not Saved')</script>";

}
?>
 <div class="cleaner"></div>
           </div>
	        
     
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