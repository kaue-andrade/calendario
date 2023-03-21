<?php // Ínicio do programa PHP

// Algoritmo feito por Kauê Andrade dos Santos

function linha($semana, $mes_correspondente) // Início da função linha($semana, $mes_correspondente)
{
	echo "<tr>"; // Define a linha da tabela
	for ($i = 0; $i <= 6; $i++) { // Cria um for de 0 a 6
		if (isset($semana[$i])) { // Verifica se o valor foi e não é "null"
			$domingo_sabado = ""; // Cria a variável domingo_sabado que não recebe nada por enquanto
			if($i == 0){ // Verifica se a variável i recebe o valor 0 (domingo)
				$domingo_sabado = 'domingo'; // A variável recebe 'domingo' justamente para ser manipulada quando estilazamos
			} else if ($i == 6){ // Verifica se a variável i recebe o valor 6 (sábado)
				$domingo_sabado = 'sabado'; //  A variável recebe 'sábado' justamente para ser manipulada quando estilazamos
			}
			if ($semana[$i] == date('j') && $mes_correspondente == date('n')) { // Verifica se o valor do mês passado como parâmetro é igual ao do mês atual
				echo "<td class='{$domingo_sabado} hoje'>{$semana[$i]}</td>"; // Célula criada com a classe hoje (deixa com a cor laranja e em negrito)
			} else { // Senão
				echo "<td class='{$domingo_sabado}'>{$semana[$i]}</td>"; // Imprime um dia normal sem nenhuma modificação
			}
		} else {
			echo "<td></td>"; // Célula vazia é criada
		}
	}

	echo "</tr>"; // Fechamento do tr
}

function saudacao(){ // Início da função saudacao()

    date_default_timezone_set('America/Sao_Paulo'); // Define a timezone para America/Sao_Paulo

	echo '<strong>Hora atual em Brasília: </strong>' . date('H:i:s') . '<br>'; // Exibe a hora atual de Brasília

    $hora = date('H'); // Define a variável $hora com o valor da hora atual
    if($hora >= 6 && $hora <12) // Condição para dar "Bom dia!"
        return 'Bom dia!'; // Retorna "Bom dia!"
    else if($hora > 12 && $hora < 18) // Condição para dar "Boa noite!"
        return 'Boa tarde!'; // Retorna "Boa tarde!"
    else // Senão
        return 'Boa noite!'; // Se não ocorrer nenhum dos casos anteriores, mostra "Boa noite!"
}  

echo saudacao(); // Imprime o conteúdo de saudacao() na tela

function calendario($nome_mes, $mes_correspondente, $qtd_dias, $dia_inicio)
{
    echo "<tr><th colspan='7'>$nome_mes</th></tr>"; // Exibe o mês atual na parte superior
    echo "<tr> 
	<th>Dom</th>
	<th>Seg</th>
	<th>Ter</th>
	<th>Qua</th>
	<th>Qui</th>
	<th>Sex</th>
	<th>Sáb</th>
	</tr>"; // Gera linha de cabeçalho em uma tabela HTML com os nomes dos dias

	if ($dia_inicio == 0){ // Se a variável $dia_inicio receber o valor 0 (domingo), será somado + 1 (0+1 = 1)
        $dia_inicio++; // Incrementação
    } 

    $dia = 1; // Define a variável $dia como 1
    $semana = array_fill(0, $dia_inicio, ''); // Cria um array utilizando a função array_fill 
    while ($dia <= $qtd_dias) { // While utilizado para percorrer todos os dias do mês
        array_push($semana, $dia); // Número do dia é adicionado ao array
        if (count($semana) == 7) { // Se o número de elementos do array for igual a 7, ele entra no if
            linha($semana, $mes_correspondente); // Função chamada para imprimir a linha correspondente
            $semana = array(); // Array é resetado
        }
        $dia++; // Incrementa valor a variável dia
    }

    while (count($semana) < 7) { // Se o número de elementos for menor que 7, ele entra no while
        array_push($semana, ''); // Exibe elementos vazios
    }
    linha($semana, $mes_correspondente); // // Função chamada para imprimir a linha correspondente
}
?>

<style> 
	.hoje {
		font-weight: bold;
		background-color: orange;
	}

	td {
		padding: 2px;
		text-align: center;
	}

	.domingo {
		color: red;
	}

	.sabado {
		font-weight: bold;
	}
</style>

<table border="1"> 
	<?php calendario("Janeiro", 1, 31, 0); // Define os parâmetros do mês de Janeiro
	calendario("Fevereiro", 2, 28, 4); // Define os parâmetros do mês de Fevereiro
	calendario("Março", 3, 31, 4); // Define os parâmetros do mês de Março
	calendario("Abril", 4, 30, 0); // Define os parâmetros do mês de Abril
	calendario("Maio", 5, 31, 3); // Define os parâmetros do mês de Maio
	calendario("Junho", 6, 30, 6); // Define os parâmetros do mês de Junho
	calendario("Julho", 7, 31, 1); // Define os parâmetros do mês de Julho
	calendario("Agosto", 8, 31, 4); // Define os parâmetros do mês de Agosto
	calendario("Setembro", 9, 30, 5); // Define os parâmetros do mês de Setembro
	calendario("Outubro", 10, 31, 0); // Define os parâmetros do mês de Outubro
	calendario("Novembro", 11, 30, 4); // Define os parâmetros do mês de Novembro
	calendario("Dezembro", 12, 31, 6);// Define os parâmetros do mês de Dezembro
	?>
</table>
