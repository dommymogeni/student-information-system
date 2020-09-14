<!doctype html>

<html lang="en-US">
<head>
	<meta charset="UTF-8" />
	<title>Student Information System</title>

	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="styles/print/main.css" rel="stylesheet" type="text/css" media="print">
	<script type="text/javascript">
		function Openeditcourse(a)
			{
				var links = "courseinsert.php?slid=" + a + "&view=course";
				var ReturnedValue = showModalDialog(links,"Passed String","dialogWidth:450px; dialogHeight:400px; status:no; center:yes");
				//alert("Modal Dialog returned '" + ReturnValued + "'");
			}
	</script>
</head>

<body>
<div id="wrap">

	<section id="top">
		<nav id="mainnav">
			<h1 id="sitename" class="logotext">
				<a href="index.php">Student info</a>
			</h1>

			<ul>
				<li class="active"><a href="index.php"><span>Home</span></a></li>
				<li><a href="viewresult.php"><span>STUDENTS</span></a></li>
				<li><a href="admin.php"><span>ADMIN</span></a></li>
				<li><a href="contact.php"><span>CONTACT-US</span></a></li>
			</ul>
		</nav>
	</section>