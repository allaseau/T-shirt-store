<?php 

session_start();

$folder_root = '/T-shirt-store-main/';
$root_path = $_SERVER['DOCUMENT_ROOT'] . $folder_root;

require_once($root_path . '/utils/utils.php');