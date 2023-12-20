<?php
	include 'conexao.php';

	// Recebe o id da tarefa selecionada na página index
	$id_tarefas = $_GET['id_tarefas'];

	// Query para excluir a tarefa
	$delete_query = "DELETE FROM tarefas WHERE id_tarefas = '$id_tarefas'";
	$query_delete = mysqli_query($conexao, $delete_query);

	if ($query_delete) {
		echo '<script language="javascript">alert("Tarefa excluída com sucesso.")</script>';
		echo '<script language="javascript">window.location="../admin.php"</script>';
	} else {
		echo '<script language="javascript">alert("Ocorreu um erro ao excluir a tarefa.")</script>';
		echo '<script language="javascript">window.location="../admin.php"</script>';
	}

	mysqli_close($conexao);
?>
