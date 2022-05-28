<?php

$mysqli = new mysqli("localhost", "root", "", "t-shirt store");

if($mysqli->connect_error) {
    exit('Error connecting to database');
}