<?php 

// Algoritmo feito por Kauê Andrade dos Santos

function linha($semana, $mes_atual_da_maquina)
{
	echo "<tr>";
	for ($i = 0; $i <= 6; $i++) {
		if (isset($semana[$i])) {
			$class = "";
			if($i == 0){
				$class = 'domingo';
			} else if ($i == 6){
				$class = 'sabado';
			}
			if ($semana[$i] == date('j') && $mes_atual_da_maquina == date('n')) {
				echo "<td class='{$class} hoje'><strong>{$semana[$i]}</strong></td>";
			} else {
				echo "<td class='{$class}'>{$semana[$i]}</td>";
			}
		} else {
			echo "<td></td>";
		}
	}

	echo "</tr>";
}

function saudacao(){

    date_default_timezone_set('America/Sao_Paulo');

    echo '<strong>Hora atual em Brasília: </strong>' . date('H:i:s') . '<br>';

    $hora = date('H');
    if($hora >= 6 && $hora <12)
        return 'Bom dia!';
    else if($hora > 12 && $hora < 18)
        return 'Boa tarde!';
    else
        return 'Boa noite!';
}  


echo saudacao();

function calendario($nome_mes, $mes_atual_da_maquina, $qtd_dias, $dia_inicio)
{
    echo "<tr><th colspan='7'>$nome_mes</th></tr>";
    echo "<tr>
	<th>Dom</th>
	<th>Seg</th>
	<th>Ter</th>
	<th>Qua</th>
	<th>Qui</th>
	<th>Sex</th>
	<th>Sáb</th>
	</tr>";

	if ($dia_inicio == 0){ 
        $dia_inicio++; 
    } 

    $dia = 1;
    $semana = array_fill(0, $dia_inicio, ''); 
    while ($dia <= $qtd_dias) {
        array_push($semana, $dia);
        if (count($semana) == 7) {
            linha($semana, $mes_atual_da_maquina);
            $semana = array();
        }
        $dia++;
    }

    while (count($semana) < 7) {
        array_push($semana, '');
    }
    linha($semana, $mes_atual_da_maquina);
}
?>

<style>
	.hoje {
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

	<?php calendario("Janeiro", 1, 31, 0);
	calendario("Fevereiro", 2, 28, 3);
	calendario("Março", 3, 31, 3);
	calendario("Abril", 4, 30, 6);
	calendario("Maio", 5, 31, 1);
	calendario("Junho", 6, 30, 4);
	calendario("Julho", 7, 31, 6);
	calendario("Agosto", 8, 31, 2);
	calendario("Setembro", 9, 30, 5);
	calendario("Outubro", 10, 31, 0);
	calendario("Novembro", 11, 30, 4);
	calendario("Dezembro", 12, 31, 6);?>
</table>
