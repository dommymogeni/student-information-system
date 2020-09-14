<?php 
include("header.php"); 
include("conection.php");//connection to the database page in php
session_start(); //starting of a session

if (isset($_SESSION["userid"])) {
  if ($_SESSION['type']=="admin") {
    header("Location: dashboard.php");
  }
  else {
    header("Location: lectureaccount.php");
  }
}

//processing the login data provided by the user
if(isset($_POST["submit"])){
  $admin_id=$_POST["uid"];
  $admin_password=$_POST["pwd"];

  //converting to md5 the pasword entered by the user
  $md5pwd=md5("$admin_password");

  //password: technology
  $login_admin=mysqli_query($conn, "SELECT * FROM administrator WHERE adminid='$admin_id' AND a_password='$md5pwd'");
  $count=mysqli_num_rows($login_admin);
  if($count==1){
    $_SESSION["userid"]=$admin_id;
    $_SESSION["type"]='admin';
    header("Location: ./dashboard.php");
  }
  else{
    echo ("<script>alert('wrong credentials')</script>");
  }
}


//lecturer login codes
if(isset($_POST["submit2"])){
  $lec_id=$_POST['lecid'];
  $lec_password=$_POST['lecpwd'];

  //converting to md5 the pasword entered by the user
  $lmd5pwd=md5("$lec_password");

  //password: a
  $login_lec=mysqli_query($conn, "SELECT * FROM `lectures` WHERE `lecid`='$lec_id' AND `l_password`='$lmd5pwd'");
  $count_lec=mysqli_num_rows($login_lec);
  if($count_lec==1){
    $_SESSION["userid"]=$lec_id;
    $_SESSION["type"]="lecturer";

    //obtainig the lec name from the database
    while ($row=$login_lec->fetch_assoc()) {
      $_SESSION['lecname']=$row['lecname'];
      $_SESSION['coid']=$row['courseid'];
      echo $_SESSION['coid'];
    }
    header("Location: ./lectureaccount.php");
  }
  else{
    echo ("<script>alert('wrong credentials')</script>");
  }
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
    <h2><u>Admin Login</u></h2>
  </header>

  <section class="entry">
    <form action="" method="post" class="form">
      <p class="textfield">
        <label for="author">
          <small>Admin Login ID (required)</small>
        </label>

        <input name="uid" id="uid" tabindex="1" type="text" autocomplete="off" required>
      </p>

      <p class="textfield">
        <label for="email">
          <small>Password (required)</small>
        </label>

        <input name="pwd" id="pwd" value="" size="22" tabindex="2" type="password" required>
      </p>

      <p>
        <input name="submit" id="submit" tabindex="5" type="submit" value="Login"/>
        <input name="comment_post_ID" value="1" type="hidden">
      </p>
      
      <div class="clear"></div>
    </form>


    <form action="" method="post" class="form">
      <div class="clear">
      <hr />
      <header class="postheader">
        <h2><u>Lectures Login</u></h2>
      </header>
      <section class="entry">

      <p class="textfield">
      <label for="author2"> <small><br />
      Lecture Login ID (required)</small> </label>
      <input name="lecid" id="lecid" tabindex="3" type="text" autocomplete="off" required>
      </p>
      <p class="textfield">
      <label for="email2"> <small>Password (required)</small> </label>
      <input name="lecpwd" id="lecpwd" size="22" tabindex="4" type="password" required>
      </p>
      <p>
      <input name="submit2" id="submit2" tabindex="5" type="submit" value="Login"/>
      <input name="comment_post_ID2" value="1" type="hidden" />
      </p>
      <div class="clear"></div>
    </form>
    
    <div class="clear"></div>
  </section>
</div>
</section>
</article>
</section>

<?php 
  include("adminmenu.php");
  include("footer.php"); 
?>
