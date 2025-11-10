<?php 
    /* 
    * Arquivo de Funções 
    * Este arquivo contém a lógica para gerar a tabuada. 
    */ 
    /** 
    * Gera o HTML de uma tabuada para um número específico. 
    * 
    * @param int $numero O número do qual queremos a tabuada. 
    * @return string Uma string contendo o HTML da tabuada. 
    */ 
    function gerarTabuada($numero) 
    { 
        // 1. Inicializa uma variável vazia para guardar o resultado 
        $resultadoHtml = ""; 
        // 2. Cria um loop 'for' que conta de 1 até 10 
        for ($i = 1; $i <= 10; $i++) { 
            // 3. Calcula o resultado da multiplicação 
            $multiplicacao = $numero * $i; 
            // 4. Adiciona (concatena) esta linha ao nosso HTML 
            // O ".=" significa "pegue o que já existe e adicione isso" 
            $resultadoHtml .= "$numero x $i = $multiplicacao <br>"; 
        } 
        // 5. Retorna a string HTML completa 
        return $resultadoHtml; 
    }
?> 