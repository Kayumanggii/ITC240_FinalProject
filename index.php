<?php //THIS IS THE INDEX.PHP PAGE

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
?>

<?php include("includes/config.php"); ?>
<?php include("includes/header.php"); ?>

<aside class="index">
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
    
</aside>    


<!-- HOME PAGE STARTS HERE! -->
<main class="index">
<h1>Welcome to The Best Cities for Retirees </h1>
    
<h3>We welcome you to the official website for retireed seniors searching to find various cities to reside based on the cost of living, climate, and activities!</h3>
    
 <img src="images/index.jpg" alt="photo of Arizona landscape" class="index">   
      
</main>
<?php include ('includes/footer.php');?>