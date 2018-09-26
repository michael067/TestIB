<?php
session_start();
require_once '../model/model.php';
require_once 'controller.php';

$uri=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

if(('/controller/index.php'=== $uri) OR ('/controller/'=== $uri)){
    list_action();
}
elseif('/controller/index.php/show'===$uri && isset($_GET['id'])){
    show_action($_GET['id']);
}
elseif('/controller/index.php/edit'===$uri && isset($_GET['id'])){
    edit_action($_GET['id']);
}
elseif('/controller/index.php/edit'===$uri && isset($_POST)){
    edit_valid($_POST);
}
elseif('/controller/index.php/add'===$uri ){
        add_action();
}
elseif('/controller/index.php/delete'===$uri && isset($_GET['id'])){
    delete_action($_GET);
}else{
    header('HTTP/1.1 404 Not Found');
    echo $uri;
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}
?>