<?php 
// index.php 
// 1. CONCEITO DA AULA 10: Carrega o autoload do Composer 
require_once 'vendor/autoload.php'; 
// 2. CONCEITO DA AULA 10: Importa a nossa classe usando "use" 
use Gioza\Aula10Composer\Conexao; 
echo "<h1>Teste do Composer e Autoload</h1>"; 
try { 
// 3. Usa a classe para pegar a conexão 
$pdo = Conexao::getConexao(); 
// 4. Testa a conexão 
$stmt = $pdo->query("SELECT * FROM usuarios LIMIT 1"); 
$usuario = $stmt->fetch(); 
if ($usuario) { 
echo "<p>Conexão bem-sucedida! Encontrei o usuário: " . 
htmlspecialchars($usuario['nome_completo']) . "</p>"; 
} else { 
echo "<p>Conexão bem-sucedida! (Nenhum usuário no banco para exibir).</p>"; 
} 
} catch (Exception $e) { 
echo "<p>Erro na conexão: " . $e->getMessage() . "</p>"; 
} 
?> 