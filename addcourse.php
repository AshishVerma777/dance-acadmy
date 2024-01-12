<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Course Entry Form</title>
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
   <span>Course Entry Form</span></div>
    <form method="post" enctype="multipart/form-data">
        <table border="2" align="center">   
            <tr>
                <td>Select Name</td>
                <td>
                    <select name="ctgid">
                        <option value="0">Select Category</option>
                        <?php
                        
                        
                    require './connection.php';
                    $s="select * from mstcategory";
                    $rs= mysqli_query($con,$s);
                    while($a=mysqli_fetch_array($rs))
                   {
                    ?>
                        <option value="<?php echo $a[0];?>">
                            <?php echo $a[1]?></option>    
                        
                        <?php
                   }
                   ?>
                    </select>
                    
                </td>
            </tr>
            <tr>
                <td>Course Name</td>
                <td><input type="text" name="coursenm" required></td>

            </tr>
            <tr>
                <td>duration</td>
                <td><input type="text" name="duration" required>(in days)</td>

            </tr>
       
            <tr>
                <td>fees</td>
                <td><input type="text" name="fees" required></td>

            </tr>
            <tr>
                <td>Course Details</td>
                <td>
                    <textarea  rows="7" cols="35"
                               name="coursedetail"></textarea>
                </td>

                
            </tr>
             <tr>
    <td>Course Img*</td>               
    <td>
        <input type="file" name="courseimg" required>        
    </td>    
</tr>           

            <tr>
                <td><input type="submit" value="Add course" name="b1"></td>
                <td><input type="reset" value="clear"></td>
            </tr>       
       
        </table>
</form>      
<?php    
if(isset($_REQUEST["b1"]));
{
require './connection.php';
extract($_REQUEST);   

//---------for genrate course id------
$sql="select IFNULL(max(courseid),0)+1 as courseid from mstcourse";
$rs1=mysqli_query($con,$sql);
$a=mysqli_fetch_array($rs1);
$courseid=$a[0];

//------------------------------------------------

//for uploading file------------------------------

$filename=$_FILES["courseimg"]["name"];
$source=$_FILES["courseimg"]["tmp_name"];
$destination="uploads/".$filename;
move_uploaded_file($source,$destination);

//-------------------------------------------------

//for insert record--------------------------------




$str="insert into mstcourse values($ctgid,$courseid,'$coursenm'
        ,$duration,$fees,'$coursedetail','$destination')";
mysqli_query($con,$str);

$n=mysqli_affected_rows($con);

if($n>0)
    echo "<script>alert('Record saved')</script>"; 
else
    echo "<script>alert('Record   not saved')</script>";

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