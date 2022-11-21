   <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" contant="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <center>
    <h1>Pincode Location Finder </h1>
     <form method="POST" action="">
    <input type="text" name="pincode"><br><br>
    <input type ="submit" name="submit" class="btn btn-primary" value="submit">
    background: linear-gradient(to right,#3f5,#fc4);
</form>
</body>

<?php
if(isset($_POST['submit'])){

    $pincode=$_POST['pincode'];
    $url = "https://api.postalpincode.in/pincode/".$pincode."";
    $data=file_get_contents($url);
    $data = json_decode($data,true);
    echo$data[0]['Message'];

     // echo  "<pre>";print_r($data);
    echo"<br>";
 ?>
     <table class="table table-striped">
<?php
    foreach($data[0]['PostOffice'] as $res){
?>

<tr>
    <th>Name:</th>
    <td><font color="red"><?php echo $res['Name']."<br>";?></td>
 </tr>
 <tr>
    <th>BranchType:</th>
    <td><?php echo $res['BranchType']."<br>";?></td>
 </tr>
<tr>
    <th>DeliveryStatus:</th>
    <td><?php echo $res['DeliveryStatus']."<br>";?></td>
  </tr>
<tr>
    <th>Circle:</th>
    <td><?php echo $res['Circle']."<br>";?></td>
</tr>

 <tr>
    <th>District:</th>
    <td><?php echo $res['District']."<br>";?></td>
</tr>

<tr>
    <th>Division:</th>
    <td><?php echo $res['Division']."<br>";?></td>
</tr>

<tr>
    <th>Region:</th>
    <td><?php echo $res['Region']."<br>";?></td>
</tr>

<tr>
    <th>Block:</th>
    <td><?php echo $res['Block']."<br>";?></td>
</tr>

<tr>
    <th>State:</th>
    <td><?php echo $res['State']."<br>";?> <br></td>
</tr>
<?php
 }
}
?>
</table>
</center>
</html>