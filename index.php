<?php  include('server.php'); ?>
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
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Izyan's Bookshelf</title>
    <style>
body {
  background-image: url('bookshelf.jpg');
}
</style>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div id="page-container">
   <div id="content-wrap">
 
  <div class="text-center">
     <h1 class="py-4 bg-dark text-light rounded"> <i class="fas fa-swatchbook"></i> Izyan's Bookshelf</h1>
  </div>

  <div>
      <a href="Login/login2.php"><i class="fas fa-plus-square fa-2x" title='Add a Book'></i></a>    
      <a class = "float-right" href="Login/login.php"><i class="fas fa-edit fa-2x" title='Edit a Book'></i></a>
  </div>
   
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
<?php endif ?>
    <?php $results = mysqli_query($db, "SELECT * FROM  book_details"); ?>

    <table>
        <thead>
        <tr>
            <th><i class='fas fa-book'></i> Book Name</th>
            <th><i class='fas fa-people-carry'></i> Author</th>
            <th><i class="fas fa-book-open"></i> Isbn No</th>
            
        </tr>
        </thead>

        <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['author']; ?></td>
                <td><?php echo $row['IsbnNo'] ?></td>
                
            </tr>
        <?php } ?>
    </table>
    
</div>
   <footer id="footer"></footer>
 </div>

</body>
</html>

<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>