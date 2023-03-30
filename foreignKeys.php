###SQL

- get all FK from a Database
<sql code>
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
