<?php
$con = mysqli_connect("localhost", "root", "","doings_done");
mysqli_set_charset($con, "utf8");
$list_category = get_categories($con);
//$choosen_project='null';
$all_business=get_all_tasks($con);


if (!empty($_GET['category'])) {
    $choosen_project = $_GET['category'];
};
if (empty($_GET['category']))
{
    $_GET['category']='null';
    $id_choosen_project = -1;
};
if (isset($_GET['category']) && !empty($_GET['category'])){
    $choosen_project = $_GET['category'];
};
if($choosen_project!='null' && !empty($list_category)){
    foreach ($list_category as $category) {
        if($category['alias'] === $choosen_project){
            $id_choosen_project = $category['id'];
        }
    }
}
else $id_choosen_project = -1;

//check_response($list_category,$choosen_project);
//$tasks = get_tasks_by_categories($con,$id_choosen_project);
$business = get_tasks_by_categories($con,$id_choosen_project);
check_response($list_category,$choosen_project);

if(!$con){
    print('Error'.mysqli_connect_error());
}


view_tasks($list_category,$business);


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
?>
