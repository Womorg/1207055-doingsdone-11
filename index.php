<?php
// показывать или нет выполненные задачи
require_once ('helpers.php');
require_once('database.php');







$page_content = include_template('main.php', [
    'business' => $business,
    'list_category' => $list_category,
    'i' => $i,
    'j' => $j,
    'show_complete_tasks' => $show_complete_tasks,
    'num_items'=> $num_items,
    'num_items_business'=> $num_items_business,
    'choosen_project' => $choosen_project,
    'all_business' =>$all_business
]);

$layout_content = include_template('layout.php', [
    'content' =>$page_content ,
    'business' => $business,
    'list_category' => $list_category,
    'i' => $i,
    'j' => $j,
    'show_complete_tasks' => $show_complete_tasks,
    'num_items'=> $num_items,
    'num_items_business'=> $num_items_business,
    'choosen_project' => $choosen_project,
    'all_business' =>$all_business,

    'title' => 'Дела в порядке',
    //'choosen_project' => $choosen_project
]);

print($layout_content);
?>

