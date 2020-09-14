<?php
include("header.php");
include("conection.php");
$result = mysqli_query($conn, "SELECT * FROM contact");
if($_GET["view"] = "delete")
{
  mysqli_query($conn, "DELETE FROM contact WHERE contactid ='$_GET[slid]'");
}
?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
 </h2>
</header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Contact Inbox</h2>
  </header>
  <section class="entry">
  <form name="form2" method="post" action="">
  <table width="485" border="1">
  <tr>
    <td width="56">&nbsp;</td>
    <td width="50"><strong>SNO</strong></td>
    <td width="150"><strong>Name</strong></td>
    <td width="150"><strong>Subject</strong></td>
    <td width="205"><strong>Message</strong></td>
  </tr>
  <?php
    $i =1;
    while($row = mysqli_fetch_array($result))
  {
    echo "<tr>";
    echo "<td>&nbsp";
  ?>
  <a href='contactview.php?slid=<?php echo $row['contactid']; ?>&view=delete'><img src='images/delete.png' width='32' height='32'  onclick="return confirm('Are you sure??')"/></a>
  <?php
  echo" </td>";
  echo "<td>&nbsp;" . $i . "</td>";
  echo "<td>&nbsp;" . $row['name'] . "</td>";
  echo "<td>&nbsp;<a href='inbox.php?cid=$row[contactid]'>" . $row['subject'] . "</a></td>";
  echo "<td>&nbsp;<a href='inbox.php?cid=$row[contactid]'>" . $row['message'] . "</a></td>";
  echo "</tr>&nbsp;";
  $i++;
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
    </form>
  </section>
</article>


</section>
<?php 
include("adminmenu.php");
include("footer.php"); ?>
