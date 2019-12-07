<?php
//LOG IN BOX HERE

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
<!-- this is my place-view page -->

<?php

if(isset($_GET['id'])) {
$id = (int)$_GET['id'];
}// closing he if
 else {
    header('Location: place.php');


}//closing the else

$sql = 'SELECT * FROM USRetire WHERE PlaceID = '.$id.'';
// we need to connect to the database

$iConn = mysqli_connect(DB_HOST,DB_USER, DB_PASSWORD, DB_NAME) or 
die(myerror(FILE_,__LINE__,mysquli_connect_error())) ;  

// we need to extract the data
$result = mysqli_query($iConn, $sql) or 
die(myerror(FILE_,__LINE__,mysquli_connect_error($iConn))) ;  

//we need an if statement asking if we have more than 0 rows
if(mysqli_num_rows($result) > 0) { //show the records

while($row = mysqli_fetch_assoc($result)){
// the mysqli fetch associative array will display the contents of the row
$City = stripcslashes($row['City']);
$Reason = stripcslashes($row['Reason']);
$PlaceID = stripcslashes($row['PlaceID']);
    
$Feedback = '';

    } //end while loop
} else { // end if statement and what if the customers does not exist

$Feedback = 'Hey, this city does not exist!!!';
}//end else


 //include('includes/header.php'); ?>

<h1><?php echo $City; ?></h1>
<?php
echo '<main class="view">';

echo '<ul class="view">';
echo '<li class="view"><strong> Ranking : </strong>#'.$PlaceID.'</li>';


echo '<li class="view"><strong> City : </strong>'.$City.'</li>';



echo '<li class="view"><strong> Reason : </strong>'.$Reason.'</li>';
echo '</ul>';
echo '</main>';


echo '<aside class="place">';

echo '<img src="images/place'.$id.'.jpg" alt="'.$City.' " class="view"> ';

echo '</aside>';


?>
<?php
//release web server

@mysqli_free_result($result);

//close the connection

@mysqli_close($iConn);

 include('includes/footer.php');

?>