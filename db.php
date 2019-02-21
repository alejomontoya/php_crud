<?php 
session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'db_task'
);

// if(isset($conn)) {
//     echo 'DB is connect';
// }
 