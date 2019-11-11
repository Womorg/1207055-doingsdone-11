<?php
// показывать или нет выполненные задачи
require_once ('helpers.php');

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
$show_complete_tasks = rand(0, 1);
$list_category = ["Входящие", "Учёба", "Работа", "Домашние дела", "Авто"];
$num_items = count($list_category);
$i = 0;
$j=0;
$business = [
    [
        'task' => 'Собеседование в IT компании',
        'date' => '01.12.2019',
        'category' => 'Работа',
        'complite' => 0
    ],
    [
        'task' => 'Выполнить тестовое задание',
        'date' => '25.12.2019',
        'category' => 'Работа',
        'complite' => 0
    ],
    [
        'task' => 'Сделать задание первого раздела',
        'date' => '21.12.2019',
        'category' => 'Учёба',
        'complite' => 1
    ],
    [
        'task' => 'Встреча с другом',
        'date' => '22.12.2019',
        'category' => 'Входящие',
        'complite' => 0
    ],
    [
        'task' => 'Купить корм для кота',
        'date' => 'null',
        'category' => 'Домашние дела',
        'complite' => 0
    ],
    [
        'task' => 'Заказать пиццу',
        'date' => 'null',
        'category' => 'Домашние дела',
        'complite' => 0
    ],
];
$num_items_business = count($business);
function count_title($business, $title){
    $i=0;
    $count=0;
    $num_items_business = count($business);
    while ($i < $num_items_business){
        $del = $business[$i];
        if($del['category']===$title){
            $count++;
        }
        $i++;
    }
    return $count;
}


$title="Заголовок страницы";
 //$data=$layout_content;

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
    'title' => 'Дела в порядке'
]);

print($layout_content);
?>

