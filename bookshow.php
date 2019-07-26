<?php
  include 'db/connection.php';
  if(isset($_POST['Submit'])){
    $book_stid=$mysqli->real_escape_string($_POST['book_stid']);
    $sl = "SELECT * FROM book  WHERE serial_inp='$book_stid'";
   $result = $mysqli->query($sl);
   if($result->num_rows >0){
     $row = $result->fetch_assoc();
   }else{

   }
}
if(isset($_GET['id'])){
  $id=$_GET['id'];
  echo $id;
  $sql="DELETE FROM book WHERE id='$id'";
  if($mysqli->query($sql)){
    header('location:bookshow');
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Book Show</title>
  </head>
  <body>
    <form action=""method="POST">
    <input type='text' required class="form-control" name="book_stid" />
    <button name="Submit"  style="font-size: 16px;">Submit</button>
  </form>
<?php
if(isset($row['id'])){
?>
<?php echo $row['book_name'];?>
<?php echo $row['author'];?>
<?php echo $row['cost_price'];?>
<button name="Submit"  style="font-size: 16px;" onclick="del(<?php echo $row['id']?>);">Delete</button>
<?php
}
 ?>
 <script type="text/javascript">
    function del(id) {
      location.href="bookshow.php?id="+id;
    }
  </script>
  </body>
</html>
