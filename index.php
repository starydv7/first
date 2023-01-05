<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
h2{
    justify-content: center;
    color: black;
    margin-left:45%;
}
h3{
    color: #FF0000;
    margin-left: 5%;
    font-size: 22px;
}
p{
    font-size: 14px;
    color: black;
    font-weight: 300;
    margin-top: -15px;
}
h1{
    color: black;
    margin-left: 41.5%;
}
hr{
    width:100%; 
    text-align:left;
    margin-left:0;
    font-weight: normal;
    height:2px;
    color:black;
    background-color:black;
}
h6{
    margin-left:90px;
    margin-top:-10px;
    font-size:16px;
   
}
table

{

border-style:solid;

border-width:2px;
width:100%;

border-color:green;
justify-items:space-between;
 

}
tr{
    width:100%;
    display:grid;
    grid-template-columns:repeat(9,1fr);
    grid-gap:10px;

}
div{
    background-color:"red";
}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Invoice</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="number" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
<div>
<?php
echo "<h2>Your Input:</h2>";
echo "<h3>Airmax pneumatics Ltd</h3>";
echo "<p>205-206,KAGDI ESTATE, UNIQUE INDUSTRIAL PARK,N/R, CHIRPAL CYCLE STAND,
<br></br>NAROL,AHEMDABAD-383 405,GUJRAT(INDIA)</p>";
echo "<hr>";
echo "<h1>Purchase Order</h1>";
echo "<hr>";
echo "<h5>To,</h5>";
echo "<h5>MARUTI BELT FILTER</h5>";
echo "<h5>A/75,SAGAR TENAMENT,NR.AMBE MATA MANDIR ,VINZOL CROSSING ROAD,VATVA,
<br></br>AHEMDABAD,GUJRAT,382440</h5>";
echo "<h4>GST NO   :24KXPY7865GAG</h4>";
echo "<hr>";
echo "<h4>Kind Attn.:SHAILESH KUMAR</h4>";
echo "<h6>Dear Sir,
<br></br>
Please supply the following matrials as per terms and condition mentioned below
</h6>";
echo "<hr/>";
echo "<table border='4'>

<tr>

<th>Sr.No</th>

<th>PI No</th>

<th>Description</th>

<th>HSN</th>
<th>QTY</th>
<th>Rate(INR)</th>
<th>Weight</th>
<th>Total</th>
<th>Rate</th>


</tr>";
echo "</table>";



echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
</div>

</body>
</html>