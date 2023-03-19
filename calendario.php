<?php

function linha($semana)
{
	echo "<tr>";
	for ($i = 0; $i <= 6; $i++) {
		if (isset($semana[$i])) {
			echo "<td>{$semana[$i]}</td>";
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

function calendario()
{
	$dia = 1;
	$semana = array();
	while ($dia <= 31) {
		array_push($semana, $dia);
		if (count($semana) == 7) {
			linha($semana);
			$semana = array();
		}
		$dia++;
	}
	linha($semana);
}
?>

<table border="1">
	<tr>
		<th>Dom</th>
		<th>Seg</th>
		<th>Ter</th>
		<th>Qua</th>
		<th>Qui</th>
		<th>Sex</th>
		<th>Sáb</th>
	</tr>
	<?php calendario(); ?>
</table>