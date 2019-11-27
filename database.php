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

function add_task(mysqli $con, $list_category, $business){
    if(!empty($_FILES)){
        $file_uri = move_file_to_uploads();
    }
//    if(isset($_FILES['file'])){
//        $file_name = $_FILES['file']['name'];
//        $file_path = __DIR__ . '/uploads/';
//        $file_url = '/uploads/' . $file_name;
//        move_uploaded_file($_FILES['file']['tmp_name'], $file_path . $file_name);
//        $sql_add_task = 'INSERT INTO tasks (file_name, file_url) VALUES
//                                             ("'.$file_name.'","'.$file_url.'")';
//        $res_sql_add_task = mysqli_query($con, $sql_add_task);
//    }
    if(!empty($_POST['name']) && !empty($_POST['project']) && (strtotime($_POST['date'])>=time())){
        //echo 'add file if ok!';
        $task_name = $_POST['name'];
        $task_project = $_POST['project'];
        $task_deadline= $_POST['date'];

        $sql_add_task = 'INSERT INTO tasks (user_id,project_id,status,title,file,deadline) VALUES
                                             (3,"'.$task_project.'",0,"'.$task_name.'","'.$file_uri.'","'.$task_deadline.'")';
        $res_sql_add_task = mysqli_query($con, $sql_add_task);
        if($res_sql_add_task === false){
            die('Error while working with SQL request'.mysqli_error($con));
        }
        return 1;
    }
}

if(!$con){
    print('Error'.mysqli_connect_error());
}


view_tasks($list_category,$business);


ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$show_complete_tasks = rand(0, 1);

//$num_items = count($list_category);
$i = 0;
$j=0;
$num_items = count($list_category);
$num_items_business = count($business);
//$num_items_business = count($business);


$title="Заголовок страницы";
?>
