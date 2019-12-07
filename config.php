<?php

ob_start(); /*prevents header errors - read the whole test before you take the test*/
define ('DEBUG', TRUE); //we want to see all the errors

include('credentials.php'); 

$sitename = "Best Cities for Retirees";
$tagline = "Handmade Healthcare Hats and Baby Bits, Bows & Beanies";

define('THIS_PAGE', basename($_SERVER['PHP_SELF'])) ;

$nav1['index.php'] = 'Home';
$nav1['about.php'] = 'About';
$nav1['switch.php'] = 'Fun Facts';
$nav1['place.php'] = 'Best US Cities';
$nav1['contact.php'] = 'Contact Us';


switch (THIS_PAGE) {
case 'index.php':
$title = 'Home page for Best Cities for Retirees';
$body = 'home';
break;

case 'about.php':
$title = 'About page for Best Cities for Retirees';
$body = 'about inner';
break;

case 'switch.php':
$title = 'Fun Facts about Best Cities for Retirees';
$body = 'switch inner';
break;

case 'place.php':
$title = 'List for Best Cities in the US for Retirees';
$body = 'places inner';
break;

        
case 'contact.php':
$title = 'Contact page for Best Cities for Retirees';
$body = 'contact inner';
break;

default:
$title = THIS_PAGE;

}

function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG')&& DEBUG)
{
    echo "Error in file: <b>" .$myFile. "</b> on line:
    <b>" .$myLine. "</b> <br/>";

    echo "Error Message: <b>" . $errorMsg. "</b> <br/>";
    die();
}else {
    echo "I'm sorry, we have encountered an error. Would you like to buy some shoes?";
    die();
}
}

function makeLinks($nav1) {
$myReturn = ' ';
foreach($nav1 as $key => $value) {

    if(THIS_PAGE == $key) {
        $myReturn .='<li><a href=" '.$key.' " class="active"> '.$value.' </a></li>';

    } else {
        $myReturn .= '<li><a href=" '.$key.' "> '.$value.' </a></li>';
    } //end if else
    }//end foreach

return $myReturn;
}//end function



// FORM PHP

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

if (empty($_POST['name']) ){
$nameErr = '<p> Please Fill Out Your Name </p>';
}//end if
else {
$name = $_POST['name'];
}//end else

if (empty($_POST['email']) ){
$emailErr = '<p>Please Fill Out Your Email Address</p>';
}//end if
else {
$email = $_POST['email'];
}//end else

if(empty($_POST['phone'])) {  // if empty, type in your number
$phoneErr = '<p>Please Fill Out Your Phone Number!</p>';
} //end if
elseif(array_key_exists('phone', $_POST)){
if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone']))
{ // if you are not typing the requested format of xxx-xxx-xxxx, display Invalid format
$phoneErr = '<p>Invalid format!</p>';
} // end if
else{
$phone = $_POST['phone'];
    }//end else
    }//end elseif


if (empty($_POST['inquiry']) ){
    $inquiryErr = '<p>Please Check Your Inquiry Reason </p>';
        }//end if
else {
    $inquiry = $_POST['inquiry'];
        }//end else

 
if (empty($_POST['comments']) ){
    $commentsErr = '<p>Please fill out comments</p>';
    }//end if
    else {
    $comments = $_POST['comments'];
    }//end else

if (empty($_POST['privacy']) ){
    $privacyErr = '<p>Please agree to terms and conditions</p>';
    }//end if
    else {
    $privacy = $_POST['privacy'];
    }//end else 


    if (isset
    ($_POST['name'],
    $_POST['email'],
    $_POST['comments'],
    $_POST['privacy'],
    $_POST['inquiry'])){

$comments = $_POST['comments'];


//if not empty do something, (",",) arguement 1, arguement 2
function myInquiry (){
$myReturn = '';
if(!empty($_POST['inquiry'])) {
foreach($_POST['inquiry'] as $key => $value) {
    $myReturn = implode("", $_POST['inquiry']);
}//end foreach
}return $myReturn; //end if 

}//end function 


$to = 'mrsclaraposton@gmail.com';
$subject = 'Customer Inquiry' .date("m/d/y");
$body = '
'.$name.' '.PHP_EOL.'
'.$email.' '.PHP_EOL.'
'.$phone.' '.PHP_EOL.'
'.$comments.' '.PHP_EOL.'
'.$privacy.' '.PHP_EOL.'
'.myInquiry().' 
';

$headers = array(
    'From' => 'no-reply@claraposton.com',
    'Reply-to' => ''.$email.'');

if($_POST['name']!="" 
&& $_POST['email']!="" 
&& $_POST['inquiry']!="" 
&& $_POST['comments']!=""
&& $_POST['phone']!=""
&& $_POST['privacy']!="")
{

mail($to, $subject, $body, $headers);
header('Location:thx.php');
    }//End IF
    }//End isset
}//End Post

//index page

// include('credentials.php');

?>