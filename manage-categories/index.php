<?php

require_once '../helpers/auth-helper.php';
require './model.php';

init_session();

if(!isset($_SESSION['categories'])){
    $_SESSION['categories']=[];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $latest = end($_SESSION['categories']);
        if ($latest) {
            array_push(
                $_SESSION['categories'],
                [ 'id' => ($latest['id'] + 1), 'name' => $_POST['name'] ]
            );
        } else {
            $_SESSION['categories'] = [
                [ 'id' => 1, 'name' => $_POST['name'] ]
            ];
        }
    }
    if(isset($_POST['save'])){
        foreach($_SESSION['categories'] as $key => $category) {
            if(strval($category['id']) === $_POST['id']) {
                $_SESSION['categories'][$key]['name'] = $_POST['name'];
                break;
            };
        }
    }
    if(isset($_POST['delete'])){

        function filter_category($category) {
            return strval($category['id']) === $_POST['id'];
        }

        $_SESSION['categories'] = array_filter($_SESSION['categories'], 'filter_category');
    }

}

require './view.php';
