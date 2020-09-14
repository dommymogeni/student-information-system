
<?php
$course=$_REQUEST['course'];
$link = mysqli_connect('localhost', 'root', '', 'technology'); //changet the configuration in required
if (!$link) {
    die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($link, 'studentinfo');
$query="select subid,subname from subject where courseid=$course";
$result=mysqli_query($link, $query);

?>
<select name="subject">
<option>Select Subject</option>
<?php
    while($row=mysqli_fetch_array($result)) { 
?>
<option value="">
    <?php echo $row['subname']?>
</option>

<?php } ?>
</select>