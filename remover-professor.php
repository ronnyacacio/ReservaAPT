<?php
include_once 'conexao.php';
include 'professores.php';
$professor = $_POST['professor'];
$professorLogado = $_SESSION['nomeUsuario'];

if($professor != null || $professor != "" ) {

    $sqlBusca = "select * from professores where professor='$professor'";
    $sql = mysql_query($sqlBusca);
    $rsult = mysql_num_rows($sql);

    if($rsult>0){

        if($professor != $professorLogado){
            $sql = "delete from professores where professor = '$professor'";
          
            if(mysql_query($sql)) {
                echo "<script type=\"text/javascript\">alert('Professor removido com sucesso');</script>";
                $link = 'professores.php?pagina=teste'; // especifica o endereço
                redireciona($link); // chama a função   
            }
            else
                echo "<script type=\"text/javascript\">alert('Este professor não existe');</script>";
        } else {
            echo "<script type=\"text/javascript\">alert('Você não pode excluir uma conta que está logada');</script>";    
        }

    } else {
        echo "<script type=\"text/javascript\">alert('Este professor não existe');</script>"; 
    }

} else if($professor == ""){
    echo "<script type=\"text/javascript\">alert('O nome do professor é obrigatório para a remoção.');</script>";
}

    function redireciona($link){
        if ($link==-1){
        echo" <script>history.go(-1);</script>";
        }else{
        echo" <script>document.location.href='$link'</script>";
        }
    }   

?>
