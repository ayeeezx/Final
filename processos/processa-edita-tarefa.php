<?php
include_once 'conexao.php';

$id_tarefa = $_POST['id_tarefa'];
$nova_categoria = $_POST['categoria'];
// Recupere os demais campos do formulário

// Atualize os dados da tarefa no banco de dados
$atualiza_tarefa = $conexao->query("UPDATE tarefas SET cod_categoria = $nova_categoria, ... WHERE id_tarefas = $id_tarefa");

if ($atualiza_tarefa) {
   // Redirecione para a página principal ou exiba uma mensagem de sucesso
   header('Location: admin.php');
   exit();
} else {
   // Exiba uma mensagem de erro se a atualização falhar
   echo "Erro ao atualizar a tarefa.";
}
?>
