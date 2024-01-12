
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sunflower - Blog</title>
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

</head>
<body>

<div id="tooplate_wrapper">
	<?php
        require './header.php';
        require './mainmenu.php';
        ?>
    
   <!-- end of tooplate_menu -->
    
    	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        
        <div class="col_w900">
            <div class="col_allw280 fp_service_box">
      
      
                <div class="cleaner">
                    
            </div>
	</div>
    
    	 <div class="col_w900 col_w900_last">
          <div class="col_w580 float_l" style="height: 350px">
          <div class="con_tit_01">
              <h1 align="center">Login Form</h1>
          </div>
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
//----------------session start new data-------------------
                      session_start();
                      $_SESSION['emailid']=$emailid;
                      $_SESSION['role']=$role;
                      $_SESSION['fnm']=$fnm;
//------------------------------------------------------------
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
            <div class="cleaner"></div>
		</div>
        
         <div class="col_w900 col_w900_last">
             <div class="col_w580 float_l" style="height: 350px">
            
            	            
            <div class="cleaner"></div>
		</div>
         </div>
        <div class="cleaner"></div>
    </div> 
        </div>
</div><!-- end of main -->
    <?php
    require './footer.php';
    ?><!-- end of footer -->
        
</div> <!-- end of wrapper -->
</body>
</html>