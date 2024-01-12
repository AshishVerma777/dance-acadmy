<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upcoming Batches</title>
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
   <span>Upcoming Batches</span></div>
<?php
        require './connection.php';
    $s="select b.coursenm,b.duration,b.fees,DATE_FORMAT(a.startdate,'%d/%m/%Y') as startdate,
        a.batchtime,a.insname,c.location,c.contactno,a.batchid from mstbatch as a 
        INNER JOIN mstcourse as b on a.courseid=b.courseid INNER JOIN
        mstbranch as c on a.branchid=c.branchid
        Where a.batchstatus=1 ORDER BY b.coursenm";
    
    $rs= mysqli_query($con,$s);
    $n= mysqli_num_rows($rs);
    if($n>0)
    {
        ?>
    <table align="center" border="5">
        <tr>
          <th>Course Name</th>
            <th>Duration/fees</th>
            <th>Start Date/Batch Time</th>
            <th>Faculty Name</th>
            <th>Branch Location/Contact No.
                
            </th>
        </tr>    
     <?php
     while($a= mysqli_fetch_array($rs))
     {
      ?>
        <tr> 
            <td><?php echo $a[0]; ?></td>
         <td><?php echo $a[1]."(in days)"."<br>".$a[2]."(in rs)"; ?></td>
            <td><?php echo $a[3]."<br>".$a[4]; ?></td>
            <td><?php echo $a[5]; ?></td>
                    
               <td> <?php echo $a[6]."<br>".$a[7]; ?>
            <br>
                
  <a href="admission.php?batchid=<?php echo $a[8]; ?>">select batch for addmision</a>                  
            </td>
        
        
        </tr> 
        <?php
     }
    }
 else 
 {
   echo "<script>alert('Record Not Found')</script>";      
  }
  ?>  
    
    </table>
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