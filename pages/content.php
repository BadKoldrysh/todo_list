<?php
declare(strict_types = 1);

require_once(__DIR__ . "/../app/Database.php");
use App\Database;

$tblName = "projects";
$db = new Database("localhost", "root", "", "todo_list_db");
$db->connect();
// $res = $db->insert($tblName, []);
// $res = $db->delete($tblName, ['project_id' => 3]);
// echo $res;
$res = $db->update($tblName, ["name" => "'Project #4'"], ['project_id' => 4]);
$res = $db->select($tblName, []);
foreach ($res as $item) {
    foreach ($item as $key => $value) {
        echo($value . ' ');
    }
    echo '<br />';
}
?>

<body>
    <div>
        <h1 class="red">To-do list</h1>
    </div>
</body>
