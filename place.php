<?php //THIS IS THE PLACEPAGE


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


<?php

$sql = 'SELECT * FROM USRetire';
// we need to connect to the database

$iConn = mysqli_connect(DB_HOST,DB_USER, DB_PASSWORD, DB_NAME) or 
die(myerror(FILE_,__LINE__,mysquli_connect_error())) ;  

// we need to extract the data
$result = mysqli_query($iConn, $sql) or 
die(myerror(FILE_,__LINE__,mysquli_connect_error($iConn))) ;  

//we need an if statement asking if we have more than 0 rows
if(mysqli_num_rows($result) > 0) { //show the records

     
echo '<main>' ;  
echo '<h1> Best Cities in the US for Retirees </h1>';  
    
while($row = mysqli_fetch_assoc($result)){
// the mysqli fetch associative array will display the contents of the row
    
echo '<ol>';
echo '<li class="place">'.$row['PlaceID'].'. '.$row['City'].' </li>';  
echo '</ol>';
echo '<ul>';
echo '<li class="info"> For more information about <a href="place-view.php?id='.$row['PlaceID'].'">'.$row['City'].'</a> </li>';
echo '</ul>';



    
 } //end while loop
} else { // end if statement and what if the customers does not exist
echo 'Sorry, no cities!';
}//end else


echo '</main>';


//release web server

@mysqli_free_result($result);

//close the connection

@mysqli_close($iConn);

 include('includes/footer.php');
?>