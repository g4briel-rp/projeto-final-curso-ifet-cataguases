<html>
<head>

<link href = "css/style.css" rel = "stylesheet">
<script type="text/javascript" src="valida-altera-notas3"></script>

</head>

<body>

<center>
<script>
hoje = new Date();

if(parseInt(hoje.getDay() + 1) == 1){
	document.write("Domingo, ");
}else if(parseInt(hoje.getDay() + 1) == 2){
	document.write("Segunda-feira, ");
}else if(parseInt(hoje.getDay() + 1) == 3){
	document.write("Terça-feira, ");
}else if(parseInt(hoje.getDay() + 1) == 4){
	document.write("Quarta-feira, ");
}else if(parseInt(hoje.getDay() + 1) == 5){
	document.write("Quinta-feira, ");
}else if(parseInt(hoje.getDay() + 1) == 6){
	document.write("Sexta-feira, ");
}else{
	document.write("Sabado, ");
}

if(parseInt(hoje.getMonth() + 1) == 1){
	document.write("Janeiro ");
}else if(parseInt(hoje.getMonth() + 1) == 2){
	document.write("Fevereiro ");
}else if(parseInt(hoje.getMonth() + 1) == 3){
	document.write("Março ");
}else if(parseInt(hoje.getMonth() + 1) == 4){
	document.write("Abril ");
}else if(parseInt(hoje.getMonth() + 1) == 5){
	document.write("Maio ");
}else if(parseInt(hoje.getMonth() + 1) == 6){
	document.write("Junho ");
}else if(parseInt(hoje.getMonth() + 1) == 7){
	document.write("Julho ");
}else if(parseInt(hoje.getMonth() + 1) == 8){
	document.write("Agosto ");
}else if(parseInt(hoje.getMonth() + 1) == 9){
	document.write("Setembro ");
}else if(parseInt(hoje.getMonth() + 1) == 10){
	document.write("Outubro ");
}else if(parseInt(hoje.getMonth() + 1) == 11){
	document.write("Novembro ");
}else{
	document.write("Dezembro ");
}

document.write(hoje.getDate() + " , ");

document.write(hoje.getFullYear());
</script>
</center>

<br>

<table border="0" width="62%" align="center">

<tr><td width="35%">
<a href="http://www.cataguases.mg.gov.br/" target="_blank"><img src="img/logo.jpg" height="90" width="300"/></a>

</td><td class="titulo"><a href="index.html">

SGN - Sistema de Gerenciamento de Notas</a></td></tr>
</table>

<br><br>

<hr>

<br><br>

<center><h3>Altere as notas do aluno:</h3></center>

<br><br><br><br>

<form method="post" action="alterar-n5.php" id="alterar-notas3" onsubmit="return validaForm();">

<?php

	session_start();
	
	$disc=$_POST["disc"];
	
	$_SESSION["disc"]=$disc;
	
	$con=mysqli_connect("localhost","root","","notas");

	if(!$con){
		echo"Error: Unable to connect to MySQL".PHP_EOL;
		echo"Debugging errno: ".mysqli_connect_errno().PHP_EOL;
		echo"Debugging error: ".mysqli_connect_error().PHP_EOL;
	}else{
		
		$aluno=mysqli_query($con,"SELECT * FROM alunos WHERE nome = '$_SESSION[nome]'");
	
		if($array = mysqli_fetch_array($aluno)){
			$id=$array["IdAluno"];
					
		$mostrar=mysqli_query($con,"SELECT * FROM avaliacoes,disciplinas WHERE IdAluno = '$id' AND avaliacoes.IdDisciplina = '$disc' AND disciplinas.IdDisciplinas = '$disc'");
		
		while($array = mysqli_fetch_array($mostrar)){
			echo"<table class='menu' bgcolor='lightblue' align='center'>";
			echo"<tr><td align='center'>Disciplina: </td><td>$array[nomeD]</td></tr>";
			echo"<tr><td align='center'>Avaliação 1: </td>";
			echo"<td><input type='text' name='av1' id='av1' size='5' value='$array[nota1]'></td></tr>";
			echo"<tr><td align='center'>Avaliação 2: </td>";
			echo"<td><input type='text' name='av2' id='av2' size='5' value='$array[nota2]'></td></tr>";
			echo"<tr><td align='center'>Avaliação 3: </td>";
			echo"<td><input type='text' name='av3' id='av3' size='5' value='$array[nota3]'></td></tr>";
			echo"<tr><td align='center'>Total: </td>";
			echo"<td><input type='text' name='total' id='total' size='5' value='$array[total]'></td></tr>";
			echo"<tr><td align='center'>Faltas: </td>";
			echo"<td><input type='text' name='faltas' id='faltas' size='5' value='$array[faltas]'></td></tr>";
			echo"</table><br>";
		}
		}else{
			echo("<script type='text/javascript'> alert('error !!'); location.href='alterar-notas.php';</script>");
		}
	}
?> 

<table class="menu" bgcolor="lightblue" align="center">
<tr><td align="center"><input type="submit" value="Alterar">
</td></tr>

</form>

</table>

<br><br>

<table class="menu" bgcolor="lightblue" align="center">
<tr><td><a href="cadastrar-aluno.php">Cadastrar aluno  -</a></td>
<td><a href="lancar-notas.php"> Lançar notas  -</a></td>
<td><a href="alterar-aluno.php"> Alterar aluno  -</a></td>
<td><a href="professor.html"> Logout</a></td></tr>
</table>

</body>
</html>