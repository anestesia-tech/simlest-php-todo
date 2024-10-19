<?php
$user = "todouser";
$password = "todopasswd";
$database = "todo";
$table = "list";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>TODO</h2><ol>";
  foreach($db->query("SELECT * FROM $table") as $row) {
    echo "<li>" . $row['title'] . " <strong> NOTE:" . $row['note'] . "</strong>" . "</li>";
  }
  echo "</ol>";
} catch (PDOException $e) {
    print "Error! " . $e->getMessage() . "<br/>";
    die();
}
