<?php 

function linha($semana)
{
	echo "<tr>";
	for ($i = 0; $i <= 6; $i++) {
		if (isset($semana[$i])) {
			$class = "";
			if($i == 5){
				$class = 'domingo';
			} else if ($i == 6){
				$class = 'sabado';
			}
			if ($semana[$i] == date('j')) {
				echo "<td class='{$class}'><strong>{$semana[$i]}</strong></td>";
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

    $hora = date('H');
    if($hora >= 6 && $hora <12)
        return 'Bom dia!';
    else if($hora > 12 && $hora < 18)
        return 'Boa tarde!';
    else
        return 'Boa noite!';
}  

echo saudacao();

function calendario($nome_mes, $qtd_dias, $dia_inicio)
{
    echo "<tr><th colspan='7'>$nome_mes</th></tr>";
    echo "<tr>
	<th>Seg</th>
	<th>Ter</th>
	<th>Qua</th>
	<th>Qui</th>
	<th>Sex</th>
	<th>Sáb</th>
	<th>Dom</th>
	</tr>";

    $dia = 1;
    $semana = array_fill(0, $dia_inicio, ''); // preenche o início do array com valores vazios para a semana começar no dia certo
    while ($dia <= $qtd_dias) {
        array_push($semana, $dia);
        if (count($semana) == 7) {
            linha($semana);
            $semana = array();
        }
        $dia++;
    }
    // completa o final da última semana com valores vazios
    while (count($semana) < 7) {
        array_push($semana, '');
    }
    linha($semana);
}
?>

<style>

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

	<?php 
	
	calendario("Janeiro", 31, 0);
	calendario("Fevereiro", 28, 3);
	calendario("Março", 31, 3);
	calendario("Abril", 30, 6);
	calendario("Maio", 31, 1);
	calendario("Junho", 30, 4);
	calendario("Julho", 31, 6);
	calendario("Agosto", 31, 2);
	calendario("Setembro", 30, 5);
	calendario("Outubro", 31, 0);
	calendario("Novembro", 30, 3);
	calendario("Dezembro", 31, 5);
	?>
</table>
