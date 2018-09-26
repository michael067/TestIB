<?php
session_start();
require_once 'model/model.php';
require_once 'controller/controller.php';


$_SESSION['chemin'] = $_SERVER['SCRIPT_NAME'];

$uri=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

if(($_SESSION['chemin'] === $uri) OR ('/'=== $uri)){
    list_action();
}
elseif($_SESSION['chemin']."/show"===$uri && isset($_GET['id'])){
    show_action($_GET['id']);
}
elseif($_SESSION['chemin']."/edit"===$uri && isset($_GET['id'])){
    edit_action($_GET['id']);
}
elseif($_SESSION['chemin']."/edit"===$uri && isset($_POST)){
    edit_valid($_POST);
}
elseif($_SESSION['chemin']."/add"===$uri ){
        add_action();
}
elseif($_SESSION['chemin']."/delete"===$uri && isset($_GET['id'])){
    delete_action($_GET);
}else{
    header('HTTP/1.1 404 Not Found');
    echo $uri;
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}
?>