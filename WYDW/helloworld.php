<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('inventory.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

    $sql =<<<EOF
         CREATE TABLE INVENTORY(
         ITEM_NUMBER INT PRIMARY KEY NOT NULL,
         QUANTITY INT NOT NULL,
         TITLE TEXT NOT NULL,
         TOPIC TEXT NOT NULL,
         COST DOUBLE NOT NULL);
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo "Couldn't create table\n";
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
   }

 $sql =<<<EOF
INSERT INTO INVENTORY VALUES (53477, 1, 'Achieving Less Bugs in your Code', 'software systems', 19.99);

INSERT INTO INVENTORY VALUES (53573, 2, 'Software Design for Dummies', 'software systems', 29.99);

INSERT INTO INVENTORY VALUES (12365, 1, 'Surviving College', 'college life', 39.99);

INSERT INTO INVENTORY VALUES (12498, 3, 'Cooking for the Impatient Undergraduate', 'college life', 49.99);
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
   }

  $sql =<<<EOF
SELECT * from INVENTORY WHERE TOPIC='college life';
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray() ){
      echo "ITEM_NUMBER = ". $row['ITEM_NUMBER'] . "\n";
      echo "QUANTITY = ". $row['QUANTITY'] ."\n";
      echo "TITLE = ". $row['TITLE'] ."\n";
      echo "TOPIC =  ".$row['TOPIC'] ."\n\n";
      echo "COST =  ".$row['COST'] ."\n\n";
   }
   echo "Operation done successfully\n";
   $db->close();
?>
