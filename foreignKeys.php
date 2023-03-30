###SQL

- get FK from a table
<sql code>
SELECT *
FROM information_schema.TABLE_CONSTRAINTS
WHERE CONSTRAINT_TYPE = 'FOREIGN KEY'
AND information_schema.TABLE_CONSTRAINTS.TABLE_NAME = 'cheeses';
</code>
