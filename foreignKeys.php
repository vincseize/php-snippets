###SQL

- get all FK from a Database
<code>
SELECT *
FROM information_schema.TABLE_CONSTRAINTS
WHERE CONSTRAINT_TYPE = 'FOREIGN KEY'
</code>

- get all FK from a Table
<sql code>
SELECT *
FROM information_schema.TABLE_CONSTRAINTS
WHERE CONSTRAINT_TYPE = 'FOREIGN KEY'
AND information_schema.TABLE_CONSTRAINTS.TABLE_NAME = 'your_table';
</code>

### PHP

- get all FK from a Database
<code>
include 'inc_connect.php';

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
