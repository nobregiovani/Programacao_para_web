<?php
    // editar.php
    require_once'conexao.php'; // Inclui a conexão
    $usuario = null;

    // --LOGICA DO UPDATE(U)--
    // Verifica se o formulário "Update" foi enviado
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_id'])) {

        $id = $_POST['update_id'];
        $nome = $_POST['update_nome'];
        $email = $_POST['update_email'];

        $sql = "UPDATE usuarios SET nome_completo = ?, email = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);

        if($stmt->execute([$nome,$email,$id])) {
            //Redireciona de volta para o index.php após salvar
            header("Location:index.php");
            exit;
        } else {
            echo "Erro ao atualizar o usuário";
        }  
    }

    // --- Lógica de leitura (para preencher o form)--
    // Pega o ID da URL (Via GET)
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $usuario = $stmt->fetch();
    }

    //Se não econtrou o usuário, volta no index
    if(!$usuario) {
        header("Location:index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <style> body{ font-family: san-serif; margin: 20px;}</style>
</head>
<body>
    <h1>Editar Usuário: <?= htmlspecialchars($usuario['nome_completo']) ?></h1>
    
    <a href="index.php">Voltar para a lista</a>

    <form method="POST">
        <input type="hidden" name="update_id" value="<?= $usuario['id'] ?>">
        <br><br>
        <label>Nome: </label>
        <input type="text" name="update_nome" value="<?= htmlspecialchars($usuario['nome_completo']) ?>" required>
        <br><br>
        <label>Email: </label>
        <input type="email" name="update_email" id="<?= htmlspecialchars($usuario['email']) ?>" required>
        <br><br>
        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>