<?php 
//This is our register page
//Our Form resides here too

include("includes/server.php");
include("includes/header.php");
?>

<h3> Register </h3>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="post">
<fieldset>

<label>First Name</label>
<input type="text" name="FirstName" 
value="<?php echo htmlspecialchars($FirstName); ?>"><br>
<!-- make sure 'name' it matches how the database looks like -->

<label>Last Name</label>
<input type="text" name="LastName" 
value="<?php echo htmlspecialchars($LastName); ?>"><br>

<label>User Name</label>
<input type="text" name="UserName" 
value="<?php echo htmlspecialchars($UserName); ?>"><br>

<label>Email Address</label>
<input type="email" name="Email" 
value="<?php echo htmlspecialchars($Email); ?>"><br>

<label>Password</label>
<input type="password" name="Password_1"><br>

<label>Confirm Password</label>
<input type="password" name="Password_2"><br>

<span><?php include('includes/errors.php'); ?></span>

<button type="submit" class="button" name="reg_user"> Register </button>
<input type="button"  onclick="window.location.href = '<?php $_SERVER['PHP_SELF']; ?>'" value="Reset">

</fieldset>
</form>

<p class="register">
Already a member, <a href= "login.php"> Sign In! </a>
</p>

<?php include ('includes/footer.php');?>