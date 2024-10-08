
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="style.css">

<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<title>Home Page</title>
</head>
<body>
    <h1 id= "main_title"> CRUD APPLICATION IN PHP</h1>

    <div class="container">
<?php include("dbconn.php");?>
<div class ="box1">
<h3>Student Details</h3>

<?php
     

     if(isset($_GET['message'])){
      echo"<h6>".$_GET['message']."</h6>";
     }

     ?>

<?php
     

     if (isset($_GET['delete_msg'])) {
      echo "<h6>" . htmlspecialchars($_GET['delete_msg'], ENT_QUOTES, 'UTF-8') . "</h6>";
  }
  

     ?>




<form action="insert_data.php" method="post">
<button type="button" class="btn-btn primary" data-toggle="modal" data-target="#exampleModal">Add students</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="form group">
        <label for ="f_name">First Name</label>
        <input type="text" name="f_name" class="form control">
    
      </div>
      <div class="form group">
        <label for ="l_name">Last Name</label>
        <input type="text" name="l_name" class="form control">
    
      </div>
      <div class="form group">
        <label for ="age">Age</label>
        <input type="text" name="age" class="form control">
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>




    <table class="table table-hower table-bordered table-striped">
        <thead>
            <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
</tr>
</thead>

<tbody>

<?php
$query = "SELECT * FROM students";
$result = mysqli_query($connection, $query);

 if(!$result){

    die("query failed" .mysqli.error());

 }
 else {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>

<tr>

<td><?php echo $row['id']?></td>
<td><?php echo $row['first_name']?></td>
<td><?php echo $row['last_name']?></td>
<td><?php echo $row['age']?></td>

<td><a href="Update_page.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>

<td><a href="Delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>


</tr>
        <!-- Your HTML/PHP code here -->
        <?php



    } // Close the while loop
} // Close the else block


 ?>
</tr>

</table>






<?php include("footer.php");?>

