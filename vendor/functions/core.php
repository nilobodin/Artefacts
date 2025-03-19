<?php
session_start();

$link = mysqli_connect('localhost', 'root', '', 'artefacts_db');
$link->set_charset('utf8mb4');