<?php
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

<!--<img src="images/clara.jpg" class="desktop" alt="Portrait of Clara">-->
<main class="about">
    
<h1 class="about">About Us</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fringilla urna porttitor rhoncus dolor purus non enim. Faucibus interdum posuere lorem ipsum dolor sit amet consectetur. Scelerisque fermentum dui faucibus in ornare quam viverra. Orci a scelerisque purus semper eget duis at tellus at. Purus in mollis nunc sed id. </p>

<h2>What we do?</h2>

<p>At urna condimentum mattis pellentesque id nibh tortor id aliquet. Tempor orci eu lobortis elementum nibh tellus molestie. Commodo quis imperdiet massa tincidunt nunc pulvinar sapien et. Tempor orci dapibus ultrices in iaculis nunc sed augue. Tempor commodo ullamcorper a lacus vestibulum. Praesent tristique magna sit amet purus. Ut sem viverra aliquet eget. Metus dictum at tempor commodo ullamcorper a lacus. Nunc mi ipsum faucibus vitae aliquet nec ullamcorper. Viverra maecenas accumsan lacus vel facilisis volutpat est velit egestas.</p>

<h2>Our Team</h2>

<ul>
<li class="about"><img src="images/clara.jpg" class="about" alt="photo of Clara">
<h3 class="about">Clara Poston</h3>
<h4 class="about">Co-Owner</h4>
<p class="about">At urna condimentum mattis pellentesque id nibh tortor id aliquet. 
Tempor orci eu lobortis elementum nibh tellus molestie. 
Commodo quis imperdiet massa tincidunt nunc pulvinar sapien et. 
Tempor orci dapibus ultrices in iaculis nunc sed augue. 
Tempor commodo ullamcorper a lacus vestibulum.</p>
</li>
<br>
<li class="about"><img src="images/janet.jpg" class="about" alt="photo of Janet">
<h3 class="about">Janet Jackson</h3>
<h4 class="about">Co-Owner</h4>
<p class="about">At urna condimentum mattis pellentesque id nibh tortor id aliquet. 
Tempor orci eu lobortis elementum nibh tellus molestie. 
Commodo quis imperdiet massa tincidunt nunc pulvinar sapien et. 
Tempor orci dapibus ultrices in iaculis nunc sed augue. 
Tempor commodo ullamcorper a lacus vestibulum. 
</p>
</li>
</ul>


<h2>More about what we do...</h2>

<p>Porta non pulvinar neque laoreet suspendisse interdum consectetur. Purus faucibus ornare suspendisse sed nisi lacus sed viverra tellus. Non diam phasellus vestibulum lorem sed risus ultricies tristique nulla. Sodales ut eu sem integer vitae. Scelerisque varius morbi enim nunc faucibus. Sed egestas egestas fringilla phasellus. Magnis dis parturient montes nascetur ridiculus mus mauris vitae. Fames ac turpis egestas sed tempus urna et pharetra. Lorem donec massa sapien faucibus et molestie. Condimentum lacinia quis vel eros. Mus mauris vitae ultricies leo. Tincidunt arcu non sodales neque sodales ut etiam. Tellus orci ac auctor augue. </p>

</main>
<?php include('includes/footer.php'); ?>