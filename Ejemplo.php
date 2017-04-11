<?php
/**
 * Created by PhpStorm.
 * User: cruz_
 * Date: 11/04/2017
 * Time: 18:18
 */
if(isset($_GET['aid']) && is_numeric($_GET['aid'])) {
    $aid = (int) $_GET['aid'];
} else {
    $aid = 1;
}

echo $aid;
?>