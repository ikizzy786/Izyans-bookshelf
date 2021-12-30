<?php  include('../server.php'); ?>

<?php 


if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>








<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM book_details WHERE id=$id");
    
    
    if (mysqli_num_rows($record) == 1 ) {
        $n = mysqli_fetch_array($record);
        $name = $n['name'];
        $author = $n['author'];
        $IsbnNo = $n['IsbnNo'];
    }
}
?>



<!doctype html> 
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">

    <title>Edit a Book</title>
    <style>
body {
  background-image: url('../bookshelf.jpg');
}
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    
</head>
<body>
 
   <div class="text-center">
     <h2 class="py-4 bg-dark text-light rounded"> <i class="fas fa-swatchbook"></i> Edit a Book</h2>
  </div>
    <div>
      <a href="index.php" class="home-button"><i class="fas fa-home fa-2x" title="Home"></i></a>
      <h3>Hello Izyan, </h3>
        <a href="logout.php" class ="btn btn-primary float-right" name="logout">Logout</a>
     </div>
      <?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM book_details WHERE id=$id");
    
    
    if (mysqli_num_rows($record) == 1 ) {
        $n = mysqli_fetch_array($record);
        $name = $n['name'];
        $author = $n['author'];
        $IsbnNo = $n['IsbnNo'];
    }
}
?>

  
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
<?php endif ?>
    <?php $results = mysqli_query($db, "SELECT * FROM book_details"); ?>

    <table>
        <thead>
        <tr>
            <th><i class='fas fa-book'></i>Book Name</th>
            <th><i class='fas fa-people-carry'></i>Author</th>
            <th><i class="fas fa-book-open"></i> Isbn No</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>

        <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['author']; ?></td>
                <td><?php echo $row['IsbnNo'] ?></td>
                <td>
                    <a href="home.php?edit=<?php echo $row['id']; ?>" class="edit_btn" class="edit_button"><i class='fas fa-pen-alt' title="Edit"></i></a>
                    
                    
                </td>
                <td>
                    <a href="../server.php?del=<?php echo $row['id']; ?>" class="del_btn" ><i class='fas fa-trash-alt' title="Delete"></i></a>
                    
                </td>
            </tr>
        <?php } ?>
    </table>


    <form method ="post" action="../server.php" >
        <div class="input-group">
            <label>Book Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
        <div class="input-group">
            <label>Author</label>
            <input type="text" name="author" value="<?php echo $author; ?>">
        </div>
        <div class="input-group">
            <label>Isbn No</label>
            <input type="text" name="IsbnNo" value="<?php echo $IsbnNo; ?>">
        </div>
        
        <div class="input-group">
            <?php if ($update == true): ?>
                <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
            <?php else: ?>
              <button  class="btn btn-primary" type="submit" name="update">update</button>
            <?php endif ?>
        </div>

    </form>

</body>
</html>


<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>
 


