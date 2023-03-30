<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cheezyapp";
 
$link = new mysqli($servername, $username, $password, $dbname);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud operation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="container">


  <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Wine</th>

    </tr>
  </thead>
  <tbody>

<?php

$tablename ="cheeses";
$columnname ="id_wines";
$FKtablename ="wines";
$FKcolumnname ="id_wines";

$id_FK = "2";

print_r('<br>--------- 1 ----------<br>');
//Get the Foreign Key
$sql_getfk = "SELECT *
FROM information_schema.TABLE_CONSTRAINTS
WHERE CONSTRAINT_TYPE = 'FOREIGN KEY'";
$result = mysqli_query($link, $sql_getfk);
print_r($result);
// if (mysqli_num_rows($result) > 0) {
// while($row = mysqli_fetch_assoc($result)) {
//     $fk_table = $row["FK Table"];
//     $fk_column = $row["FK Column"];
// }

print_r('<br>-------- 2 -----------<br>');

//Get the Foreign Key
$sql_getfk = "SELECT B.* FROM cheeses A INNER JOIN wines B ON A.id_wines = B.id_wines WHERE A.id_wines = 2;";
$result = mysqli_query($link, $sql_getfk);
print_r($result);
echo "<br />";
while($row = mysqli_fetch_assoc($result)){
    echo $row['name'];
    
}



print_r('<br>--------- 3 ----------<br>');
$query = "SELECT `" . $tablename . "`.`" . $columnname . "`, wines.id_wines, wines.name
FROM `" . $tablename . "`, `" . $FKtablename . "`
WHERE `" . $FKtablename . "` . `" . $FKcolumnname . "` = $id_FK"
;
// WHERE cheeses.id_wines = cheeses.id_wines";

$result = mysqli_query($link,$query) or die(mysql_error());
// while($row = mysqli_fetch_assoc($result)){
//     echo $row['name'];
//     echo "<br />";
// }


print_r($result);

print_r('<br>--------- 4 ----------<br>');

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo $row['name'];
        echo '<br>';
        $idValue = $row['name'];
    }
}

print_r('<br>----------END---------<br>');
















$sql = "SELECT  * from cheeses";
$result=mysqli_query($link,$sql);
if($result){
  $sn=1;
  while($row=mysqli_fetch_assoc($result)){

    $name=$row['name'];
    $id=$row['id_cheeses'];
    $name=$row['name'];
    $id_wines=$row['id_wines'];
    if($row['id_wines']==$id_FK){$id_wines=$idValue;}


 	$wine=$id_wines;


    echo'<tr>
    <th scope="row">'.$sn.'</th>
    <td>'.$name.'</td>
	<td>'.$wine.'</td>
     <td>

    </td>
  </tr>';
  $sn++;    
}
  
}

?>

</tbody>
</table>

   
</div>
</body>
</html>
