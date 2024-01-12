<?php
require './chksession.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admission Form</title>
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
        include './studentmenu.php';
        
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
   <span>Admission Form</span></div>
    <?php
    
      $batchid=$_REQUEST["batchid"];
      //echo $batchid;
      //die(); 
        require './connection.php';
       
$sql="select b.coursenm,b.duration,b.fees,DATE_FORMAT(a.startdate,'%d/%m/%Y') as startdate,
a.batchtime,a.insname,c.location,c.contactno,a.batchid
from mstbatch as a
inner join mstcourse as b on a.courseid=b.courseid
inner join mstbranch as c on a.branchid=c.branchid
where a.batchid=$batchid";
//echo    
//die;
  $rs=mysqli_query($con,$sql);
    $a=mysqli_fetch_array($rs);    
    ?>
    <form method="post">
        <table border="1" align="center">
<tr>
    <td>Batch No.</td>               
    <td>
<input type="text" value="<?php echo $a[8]; ?>"
       readonly>        
    </td>    
</tr> 
            <tr>
                <td>Course Name</td>
                <td><?php echo $a[0];?></td>
            </tr>
            <tr>
                <td>Course Duration</td>
                <td><?php echo $a[1];?></td>
            </tr>
              <tr>
                <td>Course Fees</td>
                <td><?php echo $a[2];?></td>
            </tr>
              <tr>
                <td>Start Date</td>
                <td><?php echo $a[3];?></td>
            </tr>
              <tr>
                <td>Batch Time</td>
                <td><?php echo $a[4];?></td>
            </tr>
              <tr>
                <td>Faculty Name</td>
                <td><?php echo $a[5];?></td>
            </tr>
              
              <tr>
                <td>branch Name</td>
                <td><?php echo $a[6];?></td>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="b1" value=" Click for Booking">
                    </td>
                </tr>
            
        </table>
    </form>
<?php
if(isset($_REQUEST["b1"]))
{
    //----session for fetching data--from admision database-------
    require './connection.php';
    $batchid=$_REQUEST["batchid"];
    //session_start();
    $emailid=$_SESSION["emailid"];
    $adate=date("y/m/d");
            
            
            
    //for duplicate checking ==============
$sql="select * from admission where emailid ='$emailid' and batchid=$batchid";
//echo $sql;
//die();
$re=mysqli_query($con,$sql);
$n=mysqli_num_rows($re);
if($n>0)
{
    die("<script>alert('Record Already Exists')</script>");
}


//
//==============record insertion in admission=======================
$str="insert into admission(batchid,emailid,adate) values('$batchid','$emailid','$adate')";    
//echo $str;
//die();
mysqli_query($con, $str);   
$n= mysqli_affected_rows($con);
if($n>0)

   echo "<script>alert('Batch registration sucessfull')</script>";

else

   echo "<script>alert('Try again  ')</script>";
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