<html lang = "en">
<body>
<div class="A option">
<title>Add Issue </title>
 <link rel="stylesheet" type ="text/css" href="Homepage.css"/>
<h1> KPG WORK ORDER SYSTEM </h1>
<ul>
     <li> <a href= "home.php"> Home </a> </li>
     <li> <a class = "current"  href = "add.php"> Add Issues </a> </li>
     <li> <a href = "query.php"> Query Issues </a> </li>
     <li> <a href = "login.html"> Worker Login </a> </li>
</ul>
<br><br>
<h3>New Issue Form</h3>
  <form name="add" action="" method="POST">
  First Name:    <input type="text" name="fnameadd" /><br>
  Last Name:     <input type="text" name="lnameadd" /><br>
  Issue Title:    <input type="text" name="issue_Title" /><br>
  Description:  <input type="text" name="description" /><br>
  Phone Number:          <input type="text" name="telephone" /><br>
  Email:        <input type="text" name="email" /><br>
  Username:	<input type ="text" name ="username" /><br>
  <!-- Helpdesk is auto assigned. Date/status is auto generated. Issue number is also auto generated-->
  <input type="submit">
  </form>
</div>
</body>
<?php
include ("connection.php");
$sql = NULL;
//double checks to see if everything is filled in
//query from 
if( (!isset($_POST['fnameadd']) || trim($_POST['fnameadd']) == "") || 
(!isset($_POST['lnameadd']) || trim($_POST['lnameadd']) == '') || 
(!isset($_POST['issue_Title']) || trim($_POST['issue_Title']) == '') ||
(!isset($_POST['telephone']) || trim($_POST['telephone']) == '') ||
(!isset($_POST['description']) || trim($_POST['description']) == '') ||
(!isset($_POST['username']) || trim($_POST['username']) == '') ||
(!isset($_POST['email']) || trim($_POST['email']) == ''))
{
   echo "Please fill out every field.";

} else {
	$sql = "INSERT INTO Tickets(fname, lname, title, description, phonenumber, email, username, date, status, assignee) 
VALUES ('$_POST[fnameadd]', '$_POST[lnameadd]','$_POST[issue_Title]', '$_POST[description]', '$_POST[telephone]', '$_POST[email]', '$_POST[username]', current_timestamp(), 'open', 'Helpdesk')"; //doubleCheck this
}

//Sees if this works out correctly and actually inserted
if ($sql == NULL){}
elseif ($db->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
$db->close();
?>
<br><br>
<input type="button" onclick="location.href='home.php';" value="Go Back to Menu" />
</body>
</html>
