<?php
  $sql = "CREATE TABLE dasha_categories(
     id    (int, Primary key, autoincrement),
       name    (varchar, 150, NOT NULL),
      parent_id    (int, Foreign key, NULL),
       deleted_at    (datetime, NULL)
  )";




?>