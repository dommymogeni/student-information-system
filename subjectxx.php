<?php
include("validation.php");
include("conection.php");

$subid=$_POST["subid"];
$subname = $_POST["subname"];
$courseid = $_POST["courseid"];
$lecid = $_POST["lecid"];
$subtype = $_POST["subtype"];
$semester = $_POST["semester"];
$comment = $_POST["comment"];

$totcourse = mysqli_query($conn, "SELECT * FROM subject");
$result1 = mysqli_query($conn, "SELECT * FROM course");
$reslec = mysqli_query($conn, "SELECT * FROM lectures");

$totid = mysqli_num_rows($totcourse);
while($row1 = mysqli_fetch_array($totcourse)){
  $totid = $row1[0]+1;
}

if(isset($_POST["button"]))
{
  $sql="INSERT INTO subject (subid, subname, comment, courseid, subtype, semester) VALUES ('$subid','$subname','$comment','$courseid','$subtype','$semester')";
  if (!mysqli_query($sql,$conn)){
    die('Error: ' . mysqli_error());
  }
  else
  {
	  echo "Record inserted Successfully...";
  }
}

if(isset($_POST["button2"]))
{
  mysqli_query($conn, "UPDATE subject SET subname='$subname',courseid='$courseid',lecid='$lecid',subtype='$subtype',semester='$semester',comment='$comment' WHERE subid='$subid'");
  echo "Record updated successfully...";
}


if($_GET["view"] = "subject")
{
  $result = mysqli_query($conn, "SELECT * FROM subject where subid='$_GET[slid]'");
  while($row1 = mysqli_fetch_array($result))
  {
    $totid = $row1["subid"];
    $subname = $row1["subname"];
    $comment = $row1["comment"];
    $courseid  = $row1["courseid"];
    $subtype = $row1["subtype"];
    $semester = $row1["semester"];
    $lecid = $row1["lecid"];
	}
}
?> 
<form name="form1" method="" action="" id="formID">
  <p>
    <label for="textfield">Subject ID</label>
    <input type="text" name="subid" id="textfield" class="validate[required] text-input" value="<?php echo $totid; ?>" readonly>
  </p>

  <p>
    <label for="textfield2">Sub Name</label>
    <input type="text" name="subname" id="textfield2" class="validate[required,custom[onlyLetterSp]] text-input" value="<?php echo $subname; ?>">
  </p>

  <p>
    <label for="textarea">Comment</label>
    <textarea name="comment" id="textarea" class="validate[required]" cols="25" rows="5"><?php echo $comment; ?></textarea>
  </p>
  
  <p>
    <label for="textfield7">Course </label>
    <select name="courseid" value="<?php echo $courseid; ?>">
     <option value="">Course Details</option>
      <?php
        while($row1 = mysqli_fetch_array($result1))
        {
          if($courseid  == $row1[courseid])
          {
            $selvar = "selected";
          }
          echo "<option value='$row1[courseid]' ". $selvar . ">$row1[coursekey]</option>";
          $selvar ="";
        }
      ?>
    </select>
  </p>

  <p>
    <label for="select">Subject Type</label>
    <select name="subtype" id="select" value="<?php echo $subtype; ?>">
      <option value="Language">Language</option>
      <option value="Theory">Theory</option>
      <option value="Lab">Lab</option>
    </select>
  </p>

  <p>
    <label for="select2">Semester</label>
    <select name="semester" id="semester" value="<?php echo $semester; ?>">
      <option value="1">First Semester</option>
      <option value="2">Second Semester</option>
      <option value="3">Third Semester</option>
      <option value="4">Fourth Semester</option>
      <option value="5">Fifth Semester</option>
      <option value="6">Sixth Semester</option>
    </select>
  </p>

  <p>Lecture 
    <select name="lecid" id="lecid" value="<?php echo $lecid; ?>">
      <?php
 while($row1 = mysqli_fetch_array($reslec))
  {
  echo "<option value='$row1[lecid]'>$row1[lecname]</option>";
  }
  ?>
    </select>
  </p>

  <p>
    <input type="submit" name="button" id="button" value="Submit">
    <input type="submit" name="button2" id="button2" value="Update">
    <input type="reset" name="button3" id="reset" value="Reset">
    <form id="myform">
      <p>
        <input type="button" value="Close" name="B1" onClick="parent.emailwindow.hide()" />
      </p>
    </form>
  </p>  
</form>

<a href='subject.php'><< Back </a>