<?php 
include("conection.php");
if(isset($_GET['resid'])){
  $rid =	$_GET['resid'];
}
else
{
	$rid = $_POST['rollno'];
}
$result= mysqli_query($conn, "SELECT * FROM studentdetails where studid='$rid' ");
$result1= mysqli_query($conn, "SELECT * FROM course");
$result2= mysqli_query($conn, "SELECT * FROM attendance");
$result3= mysqli_query($conn, "SELECT * FROM examination where studid='$rid'");
 while($row1 = mysqli_fetch_array($result))
  {
	  $regno = $row1['studid'];
	  $name = $row1['studfname'] . " " . $row1['studlname'] ;
	  $fathersname = $row1['fathername'];
	  $course = $row1['courseid'];
	  $semester = $row1['semester'];
	  $dob = $row1['dob'];
	  
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Result</title>
<style>
html {background:#fff; height:100%; width:100%;}
body {background:#f4f4f4; width:500px; margin:25px auto 25px; text-align:center; display:block; border:solid 1px #ccc; font:normal 14px "Trebuchet MS", Arial, Helvetica, sans-serif; line-height:22px; padding:50px;}
a {color:#F60;}
</style>
</head>

<body>

<form name="form1" method="post" action="">
  <p>
    <label for="textfield">Reg No:   </label>
 <?php echo $regno; ?> </p>
  <p>
    <label for="textfield2">Name: </label> <?php echo $name; ?>
  </p>
  <p>
  <label for="textfield3">Fathers Name:</label> <?php echo $fathersname; ?> </p>
  <p>
    <label for="select">Course</label>
:  <?php echo $course; ?> </p>
  <p>
    <label for="select2">Semester</label>
  : <?php echo $semester; ?></p>
  <p>
    <label for="textfield4">DOB</label>
    :  <?php echo $dob; ?>
  </p>
  <hr>
  <table width="100%" height="96" border="1">
    <tr>
      <td>Subject id</td>
      <td>Max Marks</td>
      <td>Scored marks</td>
      <td>Result</td>
    </tr>
    <tr>
      <?php
	      $i =1;
        while($row = mysqli_fetch_array($result)){
          echo "<tr>";
          echo "<td>&nbsp;"  . $i . "</td>";
          echo "<td>&nbsp;" . $row['subname'] . "</td>";
          $result4 = mysqli_query($conn, "SELECT * FROM subjects where subid='$row[subid]'");
          while($rowa= mysqli_fetch_array($result)){
            echo "<td>&nbsp;" . $rowa['studfname'] . " " . $rowa['studlname'] . "</td>";}
            $result55 = mysqli_query($conn, "SELECT * FROM subject where subid='$row[subid]'");
          }
  
?>
    </tr>
     <?php
     while($row3 = mysqli_fetch_array($result3))
  {?>
    <tr>
      <td>&nbsp;<?php echo $row3['subid']; ?> </td>
      <td>&nbsp;<?php echo $row3['maxmarks']; ?> </td>
       <td>&nbsp;<?php echo $row3['scored']; ?> </td>
      <td>&nbsp;<?php echo $row3['result']; ?> </td>
    </tr>
    <?php
  }
  ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Total</td>
      <td>&nbsp;
      <?php
       $result552 = mysqli_query($conn, "SELECT SUM(scored) as total FROM examination  where studid='$rid'");
while($row22 = mysqli_fetch_array($result552))
  {
	  echo $tota = $row22['total'];
  }
	   ?>
    	</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Percentage</td>
      <td>&nbsp; <?php
      	 $perca = $tota/ mysqli_num_rows($result3);
		echo number_format( $perca, 2, '.', '');
		  ?>
 </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="100%" border="1">
    <tr>
      <td height="45">Subject</td>
      <td >Total Classes</td>
      <td >Attended Classes</td>
      <td >Percentage</td>
      <td >Comment</td>
    </tr>
    <?php
     while($row4 = mysqli_fetch_array($result2))
  {?>
    <tr>
      <td>&nbsp;<?php echo $row4['subid']; ?></td>
      <td>&nbsp;<?php echo $row4['totalclasses']; ?> </td>
      <td>&nbsp;<?php echo $row4['attendedclasses']; ?> </td>
       <td>&nbsp;<?php echo $row4['percentage']; ?> </td>
      <td>&nbsp;<?php echo $row4['comment']; ?> </td>
    </tr>
    <?php
  }
  ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p><a href="viewresult.php"><strong>&lt;&lt;Back</strong></a><br>
  </p>
</form>
</body>
</html>
