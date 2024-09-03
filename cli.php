<?php

include __DIR__ . "/src/Framework/Database.php";

use Framework\Database;

$db = new Database('mysql', [
  'host' => 'localhost',
  'port' => 3306,
  'dbname' => 'personalbudget'
], 'root', "");

$sqlFile = file_get_contents("./database.sql");


// try {
//   $db->connection->beginTransaction();
//   $query = "SELECT * FROM incomes WHERE amount = :amount";


//   $stmt = $db->connection->prepare($query);
//   $stmt->bindValue('amount', 1000, PDO::PARAM_INT);
//   $stmt->execute();
//   var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
//   $db->connection->commit();
// } catch (Exception $e) {
//   if ($db->connection->inTransaction()) {
//     $db->connection->rollBack();
//   }
//   echo "Transaction failed";
// }
