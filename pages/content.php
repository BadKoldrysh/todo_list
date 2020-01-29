<?php
declare(strict_types = 1);

require_once(__DIR__ . "/../app/Database.php");
use App\Database;

$db = new Database("localhost", "root", "");
$db->connect();
?>

<body>
    <div>
        <h1 class="red">To-do list</h1>
    </div>
</body>
