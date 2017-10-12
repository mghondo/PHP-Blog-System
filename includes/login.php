<?php include "db.php"; ?>
<?php session_start(); ?>


<?php

if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    
    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);
    
    if(!$select_user_query) {
        
        die("<div class='alert alert-danger' role='alert'>OH NO! LOGIN DIDN'T WORK. </div><br><br>" . mysqli_error($connection));
    } else {
        
        echo "<div class='alert alert-success' role='alert'>Congratties! The Login worked! </div>";
    }
    
    while($row = mysqli_fetch_array($select_user_query)) {
        
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];

    }
    
    
//    if($username !== $db_username && $password !== $db_user_password ) {
//        
//        header("Location: ../index.php ");
//        
//
//    } else if ($username == $db_username && $password == $db_user_password) {
//        
//        $_SESSION['username'] = $db_username;
//        $_SESSION['firstname'] = $db_firstname;
//        $_SESSION['lastname'] = $db_lastname;
//        $_SESSION['user_role'] = $db_user_role;
//        
//        header("Location: http://localhost/cms/admin/admin_index.php");
//
//    } else {
//        
//        header("Location: ../index.php");
//    }
//    
//    
//}

   // OR YOU CAN TRY IT THIS WAY
    
    if($username === $db_username && $password === $db_user_password ) {
        
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_firstname;
        $_SESSION['lastname'] = $db_lastname;
        $_SESSION['user_role'] = $db_user_role;
        
        header("Location: http://localhost/cms/admin/admin_index.php");

    } else {
        
        header("Location: ../index.php");
    }
    
    
}


?>