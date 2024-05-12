<?php
include('error.php');
$page = "All";
if (isset($_GET['page'])){
    $page = $_GET['page'];
}
if($page =="All"){

$statment = $connect->prepare("SELECT * FROM employees");
$statment->execute();
$result =$statment->fetchAll();
foreach($result as $item){
    print "<hr>";
    echo "<h3>id:".$item["employee_id"]."</h3>";
    echo "<h3>username:".$item["username"]."</h3>";
    echo "<h3>pass:".$item["password"]."</h3>";
    echo "<h3>country:".$item["country"]."</h3>";
    echo "<h3>city:".$item["city"]."</h3>";
    echo "<h3>phone_number:".$item["phone_number"]."</h3>";
    echo "<a href='index.php?page=show&employee_id=".$item['employee_id']."'>"."show"."</a>";
    echo "<a href='index.php?page=delete&employee_id=".$item['employee_id']."'>"."delete"."</a>";
    print "<hr>";
}
}
else if ($page == "show") {
    if (isset($_GET['employee_id'])){
        $employee_id= $_GET['employee_id'];
    }
     $statment = $connect->prepare("SELECT * FROM employees WHERE employee_id =?");
$statment->execute(array($employee_id));
$item =$statment->fetch();

print "<hr>";
echo "<h1>id:".$item["employee_id"]."</h1>";
echo "<h1>username:".$item["username"]."</h1>";
echo "<h1>pass:".$item["password"]."</h1>";
echo "<h1>country:".$item["country"]."</h1>";
echo "<h1>city:".$item["city"]."</h1>";
echo "<h1>phone_number:".$item["phone_number"]."</h1>";
echo "<a href='index.php?page=All'>"."back to lobby"."</a>";
print "<hr>";
}
else if ($page == "delete") {
    if (isset($_GET['employee_id'])){
        $employee_id= $_GET['employee_id'];
    }
    $statment = $connect->prepare("DELETE FROM employees WHERE employee_id =?");
    $statment->execute(array($employee_id));
    header("location:index.php");
}
?>