<!doctype html>
<HTML lang="en">

  <HEAD>
    <meta charset="utf-8">
    <Title> Weight Tracker </TITLE>
  </HEAD>

  <BODY>
    
    <form action="update.php" method="post">
      Date:<input type="date" name="date" <?php echo "value=" . date("Y-m-d") ?> > <BR> 
      Weight: <input type="text" name="weight"><br>
      <input type="Submit">
    </form>
  </BODY>

</HTML>
