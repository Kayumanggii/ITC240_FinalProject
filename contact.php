<?php
$name = $email = $inquiry = $comments = $privacy = $phone = $inquiry = '';
$nameErr = $emailErr = $privacyErr = $commentsErr = $inquiryErr = $privacyErr = $phoneErr = '';
session_start();

if(!isset($_SESSION['UserName'])) {
$_SESSION['msg'] = 'You must log in first';
header('Location:login.php');
}//IF ISSET 1


if(isset($_GET['logout'])){
session_destroy();
unset($_SESSION['UserName']);
header('Location: login.php');
}//END ISSET 2

include "includes/config.php";
include "includes/header.php"; ?>

<div class="box">
<!-- NOTIFICATION MESSAGE -->
<?php 
if(isset($_SESSION['success'])){
echo $_SESSION['success'];
unset($_SESSION['success']);
}
?>

<!-- COMMUNICATE WITH THE LOGGED IN USER -->

<?php if(isset($_SESSION['UserName']))    :?>
<ul></ul>
<li class="welcome"> Welcome </li>
<li class="welcome"><strong> <?php echo $_SESSION['UserName']; ?> </strong></li>
<li class="welcome"> You are still logged in!!! </li>  
<li class="welcome"><button type="button" class="button">
<a href="index.php?logout='1'">
<span class="logout">Log Out</span></a></button></li>
<?php endif; ?>    
    
</div> <!-- END BOX -->

<h1> Contact Us </h1>   
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
<fieldset>

<label> Name </label>
<input type="text" name="name" value="
<?php if(isset($_POST['name']))
    echo htmlspecialchars($_POST['name']);?>"><br>
<span><?php echo $nameErr; ?></span>

<label> Email </label>
<input type="email" name="email" value="
<?php if(isset($_POST['email']))
    echo htmlspecialchars($_POST['email']); ?>"><br>
<span><?php echo $emailErr; ?></span>

<label> Phone Number </label>
<input type="text" name="phone" placeholder="xxx-xxx-xxxx" value="
<?php if(isset($_POST['phone']))
    echo htmlspecialchars($_POST['phone']); ?>"><br>
<span><?php echo $phoneErr; ?></span>


<label>What are you inquirying about? </label>
<ul>
<li><input type="checkbox" name="inquiry[]" value="US"
<?php if (isset($_POST['inquiry']) && in_array('product_question', $inquiry)) 
echo 'checked="checked"'; ?>> Question about retiring in the US </li>

<li><input type="checkbox" name="inquiry[]" value="internatinal"
<?php if (isset($_POST['inquiry']) && in_array('custom', $inquiry)) 
echo 'checked="checked"'; ?>> Question about retiring internationally </li>

<li><input type="checkbox" name="inquiry[]" value="other"
<?php if (isset($_POST['inquiry']) && in_array('other', $inquiry)) 
echo 'checked="checked"'; ?>> Other (Please explain in comments) </li><br>
</ul>
<span> <?php echo $inquiryErr; ?></span>

<label>Comments </label>
<textarea name="comments"><?php if(isset($_POST ['comments'])) echo $_POST['comments']; ?></textarea>
<span><?php echo $commentsErr; ?></span>

<br>
<label> Terms and Conditions </label>
<input type="radio" name="privacy" value="yes" 
<?php if(isset($_POST['privacy']) && $_POST ['privacy']=='yes')
echo 'checked = "checked"'; ?>> Yes! I agree. 
<span><?php echo $privacyErr; ?></span>

<input type="submit" name="submit" value="Send It!">
<!-- reset does not work well with complicated forms -->
<input type="button"  onclick="window.location.href = '<?php $_SERVER['PHP_SELF']; ?>'" value="Reset">

</fieldset>
</form>

<?php include "includes/footer.php";?>