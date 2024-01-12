<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Form</title>
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
        include './mainmenu.php';
        
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
   <span>Registration Form</span></div>
   <form method="post">
       <table border="1" align="center">
           <tr>
               <td>Full Name*</td>
               <td>
      <input type="text" name="fnm" required>
               </td>               
           </tr>
           <tr>
               <td>Select Gender</td>
               <td><input type="radio" name="gender" value="male">Male
               <input type="radio" name="gender" value="female">Female
               </td>
           </tr>
           <tr>
               <td>Mobile no*</td>
               <td>
      <input type="text" name="mno" required>
               </td>               
           </tr>
           <tr>
               <td>Email Id*</td>
               <td>
      <input type="email" name="emailid" required>
               </td>               
           </tr>
           <tr>
               <td>Password*</td>
               <td>
      <input type="password" name="pwd" required>
               </td>               
           </tr>
           <tr>
              
               <td colspan="2" align="center">
      <input type="submit" name="b1" value="Create Profile">
               </td>               
           </tr>
           
               </table>              
       
   </form>                    
<?php
if(isset($_REQUEST["b1"]))
{
    extract($_REQUEST);
    require './connection.php';
     $s="insert into user3 values('$fnm','$gender',"
            . " $mno,'$emailid','$pwd','student') ";
    mysqli_query($con, $s);   
    
    $n= mysqli_affected_rows($con);
    if($n>0)
        echo "<script>alert('registration successfull')</script>";   
    else 
        
    echo "<script>alert('try again')</script>";
    
        
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