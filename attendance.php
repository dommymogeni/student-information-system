<?php
session_start(); 
include("header.php"); 
include("conection.php");

if(isset($_POST['submit']))
{
  $result = mysqli_query($conn, 'SELECT * FROM administrator WHERE adminid="$_POST[uid]" and a_password="$_POST[pwd]"');
  if(mysqli_num_rows($result)==0)
  {
    $log =  "Login failed";
  }
  else
  {
    header("Location: dashboard.php");
  }
}
?>

<section id="page">
  <header id="pageheader" class="normalheader">
    <h2 class="sitedescription"> Dashboard.  </h2>
  </header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Attendance</h2>
 
<?php
$result = mysqli_query($conn, "SELECT * FROM course");
$result1 = mysqli_query($conn, "SELECT * FROM subject");
?>

<form name="form1" method="post" action="attendance.php">
  <p>
    <label for="course">Course</label>
    <label for="select"></label>

    <select name="course" >
     <option value="">Course Details</option>
     <?php
 while($row1 = mysqli_fetch_array($result))
  {
  echo "<option value='$row1[courseid]'>$row1[coursekey]</option>";
  }
  ?>     
    </select>
    
  </p>
  <p>
    <label for="subject">Semester</label>
    <label for="select2"></label>

    <select name="semester">
      <option value="1">First Semester</option>
      <option value="2">Second Semester</option>
      <option value="3">Third Semester</option>
      <option value="4">Fourth Semester</option>
      <option value="5">Fifth Semester</option>
      <option value="6">Sixth Semester</option>
    </select>
  </p>
  <p>
    <label for="student">Subject</label>
    <label for="select3"></label>
    <select name="subject" id="select3">
    <?php
 while($row2 = mysqli_fetch_array($result1))
  {
  echo "<option value='$row2[subid]'>$row2[subname]</option>";
  }
  ?>
    </select>
  </p>
  <p>
    <label for="totalclass">Total Classes</label>
    <input type="text" name="totalclass" id="totalclass">
  </p>
  <p>
    <input type="submit" name="submit" id="button" value="Submit" role="button">
    <input type="reset" name="button2" id="button2" value="Reset">
  </p>
</form>

  </header>
  <section class="entry"></section>
</article>

<article class="post">
  <header class="postheader"></header>
  <section class="entry"></section>
</article>



</section>


<?php 
	if($_SESSION["type"]=="admin")
	{
	include("adminmenu.php");
	}
	else
	{	
	include("lecturemenu.php");
	}
include("footer.php"); ?>
