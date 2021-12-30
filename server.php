<?php
session_start();
$db = mysqli_connect('sql303.epizy.com', 'epiz_30490579', 'utwknhjE7cQDeC', 'epiz_30490579_crud');

// initialize variables
$name = "";
$author = "";
$id = 0;
$IsbnNo ="";
$update = false;
$username="";
$password="";
$save=true;
$nameErr="";

if (isset($_POST['save'])) {
    
    if (empty($_POST['name']) || strlen(trim($_POST['name']))==0) {
    $nameErr = 'You must enter a name' ;
    }else{
    $name = $_POST['name'];
    }
    
    if (empty($_POST['author']) || strlen(trim($_POST['author']))==0) {
    $nameErr = 'You must enter an author' ;
    }else{
         $author = $_POST['author'];
    }
    
    if(empty($_POST['IsbnNo']) || strlen(trim($_POST['Isbn']))==0){
     $nameErr = 'You must enter an Isbn' ;
    }else{
       $IsbnNo = $_POST['IsbnNo']; 
    }

    mysqli_query($db, "INSERT INTO book_details (name,author,IsbnNo) VALUES ('$name','$author','$IsbnNo')");
    $_SESSION['message'] = "Book saved";
    header('location: Login/home2.php');
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $author = $_POST['author'];
     $IsbnNo = $_POST['IsbnNo'];

    mysqli_query($db, "UPDATE book_details SET name='$name', author='$author', IsbnNo ='$IsbnNo' WHERE id=$id");
    $_SESSION['message'] = "Book updated!";
    header('location: Login/home.php');
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM book_details WHERE id=$id");
    $_SESSION['message'] = "Book deleted!";
    header('location: Login/home.php');
}



