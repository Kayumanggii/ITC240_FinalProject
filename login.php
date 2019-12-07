<?php
include "includes/server.php";
include "includes/header.php"; ?>


<h3> Log In </h3>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="post">
    
<fieldset>

<label>UserName</label>
<input type="text" name="UserName" class="login"
value="<?php echo htmlspecialchars($UserName); ?>"><br>

<label>Password</label>
<input type="password" name="Password"><br>

<button type="submit" class="button" name="login_user"> Login </button>

<!--button is the same as input for making buttons-->
    
<button type="button"  onclick="window.location.href = '<?php $_SERVER['PHP_SELF']; ?>'" value="Reset">Reset</button>

 <?php include('includes/errors.php'); ?>   
</fieldset>
</form>

<p class='login'>
Not yet a member?, <a href= "register.php"> Sign up </a>
</p>

   
<?php include ('includes/footer.php');?>