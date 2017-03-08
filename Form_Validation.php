<html>
<body>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php

$nameErr = $emailErr = $genderErr = $websiteErr = $contactErr = "";
$name = $email = $gender =$website = $comment = $contact = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST["name"])){
		$nameErr = "Dunno ya name Buddy !!";
	}else{
		$name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z]*$/", $name)){
			$nameErr = "Only letters and white space allowed"
		}
	}
	if (empty($_POST["email"])){
		$emailErr = "It is mandatory";
	}else{
		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$emailErr = "Invelid email format";
		}
	}
	if (empty($_POST["website"])){
		$websiteErr = "";
	}else{
		$website = test_input($_POST["website"]);
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
           $websiteErr = "Invalid URL";
       }
        
	}
	if (empty($_POST["comment"])){
		$emailErr = "No Problem";
	}else{
		$comment = test_input($_POST["comment"])
	}
	if (empty($_POST["gender"])){
		$genderErr = "Have a doubt abba that?";
	}else{
		$gender = test_input($_POST["gender"])
	}
	if(isset($_POST["phone"])&& $_POST["contact"]!==""){
		$phone=user_input($_POST["contact"]);	
		if (!preg_match("/^[1-9][0-9]*$/",$contact)) {
      		$contactErr = "Did you just make that up?";	
      		}			
		}else{
			$contactErr="How will we call you?";
			}
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
<h2> PHP Form Validation Example</h2>
<p><span class="error"> *required field. </span></p>
<form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type = "text" name ="name">
  <span class ="error">*<?php echo $nameErr;?></span>
  <br><br>

  E-mail: <input type = "text" name ="email">
  <span class ="error">*<?php echo $emailErr;?></span>
  <br><br>
  Website: <input type = "text" name ="website">
  <span class ="error">*<?php echo $websiteErr;?></span>
  <br><br>
  Contact: <input type = "number" name ="ContactNumber">
  <span class = "error">*<?php echo $contactErr;?></span>
  <br><br>

  Comment: <textarea name = "Your comment goes here" rows="5"  cols = "40"></textarea>
  <br><br>

  Gender:
  <input type ="radio" name="gender" value = "female">Female
  <input type ="radio" name="gender" value = "male">Male
  <span class = "error">*<?php echo $genderErr;?></span>
  <br><br>

  <input type ="submit" name = "submit" value ="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
echo "<br>";
echo $contact;
echo "<br>";
?>

</body>
</html>