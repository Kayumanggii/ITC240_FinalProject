<?php
session_start();
include('config.php');


//intialize our variables

$FirstName = '';
$LastName = '';
$UserName = '';
$Email= '';
$errors = array();

//connect to the database

$db =  mysqli_connect(DB_HOST,DB_USER, DB_PASSWORD, DB_NAME);
//  or die(myerror(FILE_,__LINE__,mysquli_connect_error())) ;  

//Register our user!

if(isset($_POST['reg_user'])) {
//we are going to recieve input values from our from
//mysqli_real_escape_string = escape special characters in a string
$FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
$LastName = mysqli_real_escape_string($db, $_POST['LastName']);
$UserName = mysqli_real_escape_string($db, $_POST['UserName']);
$Email = mysqli_real_escape_string($db, $_POST['Email']);
$Password_1 = mysqli_real_escape_string($db, $_POST['Password_1']);
$Password_2 = mysqli_real_escape_string($db, $_POST['Password_2']);

//form validation - want to make sure the form is filled out
//adding an array push - adds additional info

if(empty($FirstName)){
array_push($errors, 'First Name is required');
} // end if empty


    if(empty($LastName)){
    array_push($errors, 'Last Name is required');
    } // end if empty


        if(empty($UserName)){
            array_push($errors, 'User Name is required');
            } // end if empty


            if(empty($Email)){
                array_push($errors, 'Email Address is required');
                 } // end if empty


                 if(empty($Password_1)){
                    array_push($errors, 'Password is required');
                    } // end if empty

// Both passwords need to be equal

if($Password_1 != $Password_2) {
    array_push($errors, 'Passwords DO NOT match!');
        }// end if empty

// MAKE SURE THAT EMAIL AND USER NAME DOES NOT EXSIST

$user_check_query = "SELECT * FROM Users WHERE UserName = '$UserName' OR 
Email = '$Email' LIMIT 1";

$result = mysqli_query($db, $user_check_query);

$user = mysqli_fetch_assoc($result);

// if username or email exsist, danger will happen

if($user){

if($user['UserName'] == $UserName){
    array_push($errors, 'User Name already exsist!');
}//end if array

if($user['Email'] == $Email){
    array_push($errors, 'Email Address already used!');
}//end if array


}// end user and email if


//if there are zero errors, YAY!!

if(count($errors)== 0){

    $Password = md5($Password_1); //md5 encrypt the password before saving it to the database

    $query = "INSERT INTO Users (FirstName, LastName, UserName, Email, Password)
    VALUES ('$FirstName', '$LastName', '$UserName', '$Email', '$Password')";

    mysqli_query($db, $query);

    $_SESSION['UserName'] = $UserName;
    $_SESSION['success'] = 'You are now logged in!!';

    header('Location:login.php');


}//end if count errors


} //end if isset   

//LOGIN PAGE

if(isset($_POST['login_user'])) {
$UserName = mysqli_real_escape_string($db, $_POST['UserName']);
$Password = mysqli_real_escape_string($db, $_POST['Password']);



if(empty($UserName)){
array_push($errors, 'User Name is required');
} // end if empty

else {
    $UserName = $_POST['UserName'];
        }//end else


    if(empty($Password)){
    array_push($errors, 'Password is required');
    } // end if empty

    else {
        $Password = $_POST['Password'];
            }//end else

// IF WE HAVE ZERO ERRORS YAY!

if(count($errors)== 0){
$Password = md5($Password); //md5 encypts the password

$query = "SELECT * FROM Users WHERE UserName = '$UserName' AND password = '$Password'";

$result = mysqli_query($db, $query);
//first password is label type
    
if(mysqli_num_rows($result) == 1){
    $_SESSION['UserName'] = $UserName;
    $_SESSION['success'] = 'YOU ARE NOW LOGGED IN';
 
    header('Location:index.php');

} else {
    array_push($errors, "Wrong Username/ Password combination");
}// END ELSE
}//END IF COUNT
}//END IF ISSET