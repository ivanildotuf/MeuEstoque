
<?php
$nome = $_GET['nome'];
$quant = $_GET['quant'];
$dataCad = $_GET['dataCad'];
$op = $_GET['op'];
include("conexao.php");

if($dataCad=="branco"){
    $dataCad="20".date("y-m-d");
}

$dataCad = date("y-m-d",strtotime($dataCad));
$dateSql = "20".$dataCad;
if ($op=="ins"){

    //Insert
$sql = "Insert into produtos(nome,quantidade,data) values('$nome','$quant','$dateSql')";
$result = mysqli_query($conn,$sql);    
}else{

    //Delete
$sql = "Delete from produtos where nome = '$nome' ";
$result = mysqli_query($conn,$sql);    
}

//echo $sql;
?>
<!--Voltando para o estoque -->
<script>
window.location="estoque.php";
</script>