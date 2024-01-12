<?php
ob_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dance</title>
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
    require './header.php';
    require './mainmenu.php';    
    require './slider.php';    
        
        
        ?>
    	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        <div class="col_w900">
            <div class="col_allw280 fp_service_box">
                
            <div class="cleaner"></div>
		</div>
    
    	 <div class="col_w900 col_w900_last">
    		<div class="col_w580 float_l">
                    <div class="con_tit_01">Welcome <span>Dance-Academy</span></div>
    <form method="post">
       <table border="1" align="center">
           <tr>
               <td>Email id*</td>
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
                <td><input type="submit" name="b1" value="login"></td>
                <td><a href="register.php">Register Here</a></td>
            </tr>   
       </table>              
       
   </form>                    
              <?php
              if(isset($_REQUEST["b1"]))
              {
                  require './connection.php';
                  extract($_REQUEST);
                  $s="select * from user3 where emailid='$emailid' and pwd='$pwd'";
                  $rs=mysqli_query($con, $s);                  
                  $n=mysqli_num_rows($rs);
                  if($n>0)              
                  {
                      $a=mysqli_fetch_array($rs);
                      $role=$a["role"];
                      //---session start new data
                      session_start();
                      $_SESSION['emailid']=$emailid;
                      $_SESSION['role']=$role;
                      //---------------------
                      if($role=="admin")
                      
                          header ('location:adminhome.php');  
                      else 
                          header ('location:studenthome.php');
                          
                          
                  }
                  else 
                  {
                      echo "<script><alert('Invalid Email or Password')></script>";
                  }
                  
              }
              
              ?>

                    <p><em>Ut faucibus massa nec ligula facilisis ac commodo diam porta. Sed volutpat suscipit nunc nec tempus. Duis leo libero, iaculis nec sed. Pellentesque congue viverra mauris, a semper elit viverra malesuada. Suspendisse pellentesque est et enim tincidunt sed facilisis libero dapibus.</em></p>
                    <p align="justify">Sunflower Theme is free website template by tooplate. Credits go to <a rel="nofollow" href="http://www.photovaco.com">Free Photos</a> for photos and <a rel="nofollow" href="http://www.brushking.eu/361/abstract-brush-pack-vol-7.html">forty-winks</a> for Photoshop brushes. Quisque in diam a justo condimentum molestie. Vivamus a velit. Vivamus leo velit, convallis id, ultrices sit amet, tempor a, libero. Quisque nulla quis sem. Mauris quis nulla sed ipsum pretium sagittis. Suspendisse feugiat. Ut sodales libero ut odio. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow"><strong>XHTML</strong></a> and <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow"><strong>CSS</strong></a>.</p>	
                    <div class="cleaner"></div>
           </div>
	        
                <div class="col_w280 float_r">
                	
                    <h2>Latest Updates</h2>
                    <div class="lbe_box">
                    <p class="date">March 27, 2048</p>
                    <h3><a href="#">Etiam a Dui et Eros Imperdiet</a></h3>
                    <p>Morbi pellentesque, libero vitae fermentum tincidunt libero accumsan erat.</p>
                    
                    </div>
                    <div class="lbe_box">
                    	<p class="date">March 17, 2048</p>
                        <h3><a href="#">Aenean Quis Nulla ac Nisl Rutrum</a></h3>
                        <p>Libero accumsan erat, sit amet ornare lectus urna a turpis libero nibh vulputate.</p>
                        
                        
                    </div>
                    <div class="lbe_box">
                    	<p class="date">March 10, 2048</p>
                        <h3><a href="#">Etiam bibendum cursus tristiqu</a></h3>
                        <p>Nam ac iaculis sapien. Duis nunc nisl, dignissim sed dictum in, eleifend a turpis.</p>
                    </div>                 
                	<div class="cleaner"></div>
            	</div>
			</div>
        <div class="cleaner"></div>
    </div> <!-- end of main -->
    
    <!-- end of footer -->
  <?php
      require './footer.php';
  
  ?>
</div> <!-- end of wrapper -->
</body>
</html>