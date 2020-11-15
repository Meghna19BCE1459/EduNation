<!DOCTYPE html>
<html>
<head>
<title>Aviation and Aeronautics Colleges</title>
<style>
table {
border-collapse: collapse;
width: 1300px;
color: #588c7e;
font-family: monospace;
font-size: 25px;
margin-left: 23px;
}
th {
background-color: #588c7e;
color: white;
}
td{
  padding: 5px;
  padding-top: 6px;
  padding-bottom: 8px;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
<link rel="stylesheet" href="home-style.css">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--cookie message----->
<!----modal---->
<!----navbar------->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300">
</head>
<body>
  <div class="header">
    <img src="img/logo.png" alt="" height="100" width="550" align="center">
  </div>
  <!---navbar----->
  <div id="menu-nav">
  <div id="navigation-bar" style="te">
    <ul>
      <li><a href="newhome.html"><i class="fa fa-home"></i><span> Home</span></a></li>
      <li><a href="aboutus.html"><i class="fa fa-handshake"></i><span> About Us</span></a></li>
      <li><a href="logout.php"><i class="fa fa-user"></i><span> Logout</span></a></li>
     <li><a href="review.html"><i class="fa fa-comment"></i><span> Post Reviews</span></a></li>
      <li><a href="stickynotes/dashboard.php"><i class="fa fa-list-ol"></i> <span> Prioritize</span></a></li>
      <li style="font-weight:bold;"><a href="topuniversity.html"><i class="fa fa-graduation-cap"></i> <span><i>Top Universities</i></span></a></li>
    </ul>
  </div>

  </div>
  <h1 style="color: darkblue; font-family: verdana; text-align:center;">Take a look at some of the <b>Top Aeronautics and Aviation Universities</b> from across the globe!</h1>
<table>
<tr>
<th>Id</th>
<th>College Name</th>
<th>Official Website</th>
<th>Location</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "university");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, name, link, loc FROM aviation";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"] . "</td><td>"
. $row["link"]. "</td><td>". $row["loc"]."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
<br>
<br>
<div class="footer">
   <p style="text-align: left; margin-top: 13px;"> &nbsp &nbsp &copy IWP J component <span class="tab"> Made with <i style="color: red;" class="fa fa-heart fa-1x fa-beat" aria-hidden="true"></i> <b>EduNation</b></span></p>
</div>
</body>
</html>
