###SQL

- get all FK from a Database

<code>
SELECT *
FROM information_schema.TABLE_CONSTRAINTS
WHERE CONSTRAINT_TYPE = 'FOREIGN KEY'
</code>

- get all FK from a Table

<code>
SELECT * FROM information_schema.TABLE_CONSTRAINTS
WHERE CONSTRAINT_TYPE = 'FOREIGN KEY'
AND information_schema.TABLE_CONSTRAINTS.TABLE_NAME = 'your_table';
</code>

- get unique FK from a Table Column

<code>
SELECT B.* FROM cheeses A
INNER JOIN wines B ON A.id_wines = B.id_wines
WHERE A.id_wines = 2;
</code>

### PHP

<code>
include 'inc_connect.php';
</code>

- get all FK from a Database

<code>

$sql_getfk = "SELECT *
FROM information_schema.TABLE_CONSTRAINTS
WHERE CONSTRAINT_TYPE = 'FOREIGN KEY'";
$result = mysqli_query($link, $sql_getfk);
print_r($result);
// if (mysqli_num_rows($result) > 0) { // todo
// while($row = mysqli_fetch_assoc($result)) {
//     $fk_table = $row["FK Table"];
//     $fk_column = $row["FK Column"];
// }
</code>

- get unique FK from a Table Column

<code>

$sql_getfk = "SELECT B.* FROM cheeses A INNER JOIN wines B ON A.id_wines = B.id_wines WHERE A.id_wines = 2;";
$result = mysqli_query($link, $sql_getfk);
print_r($result);
echo "<br />";
while($row = mysqli_fetch_assoc($result)){
    echo $row['name'];
    
}
  
</code>
