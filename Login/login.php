
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="styleL.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        
</head>
<body>
  <div>
      <a href="../index.php" class="home-button"><i class="fas fa-home fa-2x" title="Home"></i></a>
        
  </div>
     
    <div>
       <h2>LOGIN</h2> 
       
       <form method ="post" action="loginIn.php">
        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
         <label>User Name</label>
         <input type="text" name="uname" placeholder="User name"><br>
         
         <label>Pass Word</label>
            <input type="password" name="password" placeholder="Password"><br>
         
         <button type ="submit">Login</button>
    </form>
    </div>
    

</body>
</html>





