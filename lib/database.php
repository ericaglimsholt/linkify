<?php

$connection = mysqli_connect("localhost", "root", "root", "linkify");
mysqli_set_charset($connection, "utf8");


// Performs a MySQLi query and returns the results as either an associative or indexed array
// depending on the $single variable being true or false
function dbGet($connection, $query, $single = false)
{
    $result = mysqli_query($connection, $query);

    $data = ($single) ? mysqli_fetch_assoc($result):[];
    if (!$single) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    mysqli_free_result($result);
    return $data;
}

// Performs a MySQLi query and returns the status of the execution (success = true, failure = false)
function dbPost($connection, $query)
{
    return mysqli_query($connection, $query);
}
