<?php
include("conexao.php");
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title>
       Meu Estoque
        </title>
    </head>
   <body id="bg">
        <form id="f1">
        <h1 align="center"><bv>Meu Estoque</bv></h1>
        <br>
        <br>
        <menu>
            <h2 align="center">
                <a href="../index.html">Inicio</a>
                <a href="estoque.php">Estoque</a>
                <a href="../sobre.html">Sobre</a>
                <a href="../contato.html">Contato</a>
            </h2>
        </menu>
        <h3 align="center">Cadastro de Produto</h3>
            <div id="cadProd">
                Nome*:
                <br><input type="text" id="nome"><br>
        
                Quantidade*: 
                <!--<br><input type="text" id="quant"><br>-->
                <br><input type="text" id="quant" onkeyup="mascara(this, mnum);"/><br>
                Data de cadastro:
                <!--<br><input type="text" id="DataCad"><br>-->
                <br><input type="text" id="dataCad"onkeyup="mascara(this, mdata);" maxlength="10" />
                <div id="confCad">
                    <br>
                    <button type="button" value="ins" onclick="validaCampo(this);">Inserir</button>
                    <button type="button" value="del" onclick="validaCampo(this);">Deletar</button>
                    <button type="button" onclick="limpaCampo();">Limpar</button>
                    <button type="button" onclick="window.location='index.html';">Voltar</button>
                    
                </div>
            </div>
            <br>
            <div align="center">
                <h2>Lista de Produtos</h2>
                <br>
                <?php
                    //Select da tabela de produtos
                    $sql = "SELECT * from produtos";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "Nome: " , $row["Nome"] , " / Quantidade: " , $row["Quantidade"] , " / Data: " , $row["Data"],"<br>"  ;
                        }
                    } else {
                        echo "no results";
                    }
                ?>
            </div>
            
        </form>
    </body>
</html>

<script>
    
    function limpaCampo(){
        var nome,quant,dataCad; 
        nome = document.getElementById("nome");
        quant = document.getElementById("quant");
        dataCad = document.getElementById("dataCad");
        nome.value="";
        quant.value="";
        dataCad.value="";
    }
    
    function validaCampo(op){
        var nome,quant,dataCad; 
        nome = document.getElementById("nome");
        quant = document.getElementById("quant");
        dataCad = document.getElementById("dataCad");
        if(nome.value==""){
            alert("Favor preencher o campo nome!");
            return;
           
           }
        
        if(quant.value=="" && op.value=="ins"){
            alert("Favor preencher o campo quantidade!");
            return;
        }   
        
        if(dataCad.value==""){
            dataCad.value="branco";
        }
        window.location="controle.php?nome="+nome.value+"&quant="+quant.value+"&dataCad="+dataCad.value+"&op="+op.value;
    }

//Mascaras    
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}

    function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
//data
function mdata(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/(\d{2})(\d)/,"$1/$2");
    v=v.replace(/(\d{2})(\d)/,"$1/$2");

    v=v.replace(/(\d{2})(\d{2})$/,"$1$2");
    return v;
}
//numérica
function mnum(v){
    v=v.replace(/\D/g,"");
    return v;
}
    
</script>


