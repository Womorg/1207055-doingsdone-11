<?php
// показывать или нет выполненные задачи
require_once ('helpers.php');
$con = mysqli_connect("localhost", "root", "","doings_done");
mysqli_set_charset($con, "utf8");
$list_category = [];
$business = [];

if(!$con){
    print('Error'.mysqli_connect_error());
}
else{
    $sql_tasks = 'SELECT t.title,t.project_id,t.user_id,t.status,t.task_crete FROM users u
                    INNER JOIN tasks t
                    ON u.id = t.user_id
                    WHERE u.id = 3;';
    $sql_projects = 'SELECT id, name FROM projects
                    WHERE user_id = 3;';

    $res_tasks = mysqli_query($con, $sql_tasks);
    $res_categories = mysqli_query($con, $sql_projects);

    if($res_tasks === false && $res_categories === false){
        die('Error while working with SQL request'.mysqli_error($con));
    }

    $list_category = mysqli_fetch_all($res_categories, MYSQLI_ASSOC);
    $business = mysqli_fetch_all($res_tasks, MYSQLI_ASSOC);

}



//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

$show_complete_tasks = rand(0, 1);

//$num_items = count($list_category);
$i = 0;
$j=0;
$num_items = count($list_category);
$num_items_business = count($business);
//$num_items_business = count($business);


$title="Заголовок страницы";

$page_content = include_template('main.php', [
    'business' => $business,
    'list_category' => $list_category,
    'i' => $i,
    'j' => $j,
    'show_complete_tasks' => $show_complete_tasks,
    'num_items'=> $num_items,
    'num_items_business'=> $num_items_business
]);

$layout_content = include_template('layout.php', [
    'content' =>$page_content ,
    'title' => 'Дела в порядке',
]);

print($layout_content);
?>

