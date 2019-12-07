<?php
if(isset($_GET['today'])) {
$today = $_GET['today'];
} else {
$today = date('l');
}

switch($today){

case 'Sunday':
$fact = 'Seniors like movies'; 
$info = 'People ages 50 and older make up almost one-third of all trips to the movies in the United States, seeing an average of 6.8 movies per year, but 70% of the time they go before 7 p.m. And, as people get older, they tend to see more: According to AARP, people ages 65 and older see 7.3 movies per year.';
$color = '#8D9B6A';
$pic = 'movie.jpg';
$alt = "movie";
break;


case 'Monday':
$fact = 'Seniors live alone'; 
$info ='According to the Institute on Aging, nearly one in three seniors who weren&#8217;t in a nursing home lived alone, with older women almost twice as likely to live alone than men. And, seniors get more isolated as they get older: Nearly one in two senior women over age 75 live alone.';
$color = '#8A9EA7';
$pic = 'alone.jpg';
$alt = "live alone";
break;
        

case 'Tuesday':
$fact = 'Retirees Think They Have Plenty of Life Left'; 
$info ='Just because someone has retired doesn’t mean they expect to die in the near future. When the Transamerica Center for Retirement Studies surveyed baby boomers, 21% expected to live between 90 and 99 and another 10% expected to live to age 100 years old or older.';
$color = '#8F5834';
$pic = 'life.jpg';
$alt = "long life";
break;
 

case 'Wednesday':
$fact = 'Seniors Think Green'; 
$info ='Almost 70% of people ages 50 or older recycle regularly, and over 70% use energy-efficient bulbs. But, only about one-third buy locally grown food and about 2% own or lease hybrid vehicles.';
$color = ' #8D9B6A';
$pic = 'green.jpg';
$alt = "Seniors Think Green";
break;
        
        
 case 'Thursday':
$fact = ' Retirees Could Still Be Paying Off Student Loans'; 
$info ='If you think you won’t have to worry about student loans in retirement, you could be wrong. According to the Consumer Finance Protection Bureau, the number of older student loan borrowers — defined as ages 60 and older — increased by at least 20% in every state between 2012 and 2017. In more than half of states, the number increased by 46% or more during the same time period.';
$color = '#8A9EA7';
$pic = 'loans.jpg';
$alt = "Student loans";
break;
              
case 'Friday':
$fact = 'Cost of Living Matters Most to Retirees'; 
$info ='The single biggest factor for baby boomers when picking where to live is the cost of living. According to the Transamerica Center for Retirement Studies, 80% of baby boomers said it was a very important factor. The second-most frequently selected very important factor was close proximity to family and friends.';
$color = '#8A9EA7';
$pic = 'cost.jpg';
$alt = "Cost of living";
break;

case 'Saturday':
$fact = 'Retirees Qualify For Additional Tax Breaks as They Age'; 
$info ='As you get older, you qualify for additional tax breaks at both the state and federal levels. Seniors have a higher standard deduction, and 37 states don’t impose state income taxes on Social Security benefits. Potentially the weirdest of all: In New Mexico, if you make it to 100, you don’t have to pay state income taxes as long as no one else claims you as their dependent..';
$color = '#8F5834';
$pic = 'tax.jpg';
$alt = "Retirees Qualify For Additional Tax Breaks as They Age";
break;

}


//LOG IN DIV



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

<!-- SWITCH PAGE STARTS HERE -->

<main class="switch"> 
<h1 style = "color: <?= $color ?>">
<?php echo $fact; ?>
</h1>
    
<p><?php echo $info; ?></p>

<h3 class="switch">Find out other facts about retirement, by clicking on the link below! </h3>
<ul class="switch"> 
<li><a href="switch.php?today=Sunday">Seniors like moives</a></li><br>
<li><a href="switch.php?today=Monday">Retirees Think They Have Plenty of Life Left</a></li><br>
<li><a href="switch.php?today=Wednesday">Seniors Think Green</a></li><br>
<li><a href="switch.php?today=Thursday">Retirees Could Still Be Paying Off Student Loans</a></li><br>
<li><a href="switch.php?today=Friday">Cost of Living Matters Most to Retirees</a></li><br>
<li><a href="switch.php?today=Saturday">Retirees Qualify For Additional Tax Breaks as They Age</a></li><br>
</ul>
</main>

<aside class="switch">
<img src="images/<?= $pic ?>" class="shoes" alt="<?= $alt ?>">
</aside>

<?php include "includes/footer.php";?>