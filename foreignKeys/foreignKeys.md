### SQL

- get all FK from a Database

<code>
SELECT *
FROM information_schema.TABLE_CONSTRAINTS
WHERE CONSTRAINT_TYPE = 'FOREIGN KEY'
</code>

---

- get all FK from a Table

<code>
SELECT * FROM information_schema.TABLE_CONSTRAINTS
WHERE CONSTRAINT_TYPE = 'FOREIGN KEY'
AND information_schema.TABLE_CONSTRAINTS.TABLE_NAME = 'your_table';
</code>

---

- get unique FK from a Table Column

<code>
SELECT B.* FROM cheeses A
INNER JOIN wines B ON A.id_wines = B.id_wines
WHERE A.id_wines = 2;
</code>


---

- get Primary Key from a Table

<code>
SHOW KEYS FROM your_table
</code>

---

### PHP

<code>
// include 'inc_connect.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_db";
$link = new mysqli($servername, $username, $password, $dbname);
</code>

---

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

---

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

---

- get Primary Key from a Table

<code>
$query = 'SHOW KEYS FROM your_table';
$result = mysqli_query($link,$query) or die(mysql_error());
while ($row = mysqli_fetch_array($result)) {
  if ($row['Key_name'] == 'PRIMARY') {
    echo $row['Column_name'];
  }
}
</code>

---
