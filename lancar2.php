<html>
<head>

<link href = "css/style.css" rel = "stylesheet">
<script type="text/javascript" src="valida-notas2.js"></script>

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

<center><h3>Selecione o aluno:</h3></center>

<br><br><br><br>

<form method="post" action="lancar3.php" id="lancar2" onsubmit="return validaForm();">

<table class="menu" bgcolor="lightblue" align="center">

<tr><td>Aluno:
</td><td><select name="aluno" id="aluno">
<option value=""></option>

<?php

	session_start();
	
	$serie=$_POST["serie"];
	
	$_SESSION["serie"]=$serie;
	
	$con=mysqli_connect("localhost","root","","notas");

	if(!$con){
		echo"Error: Unable to connect to MySQL".PHP_EOL;
		echo"Debugging errno: ".mysqli_connect_errno().PHP_EOL;
		echo"Debugging error: ".mysqli_connect_error().PHP_EOL;
	}else{
		
		$aluno= $con->query("SELECT * FROM alunos WHERE IdCurso = '$serie'");
		
		while($array = $aluno->fetch_array()){
			echo '<option value="'.$array["IdAluno"].'">'.$array["nome"].'</option>'; 
		}
	}
?>
</select>

<tr><td>Disciplina:
</td><td><select name="disc" id="disc">
<option value=""></option>

<?php	

	$serie=$_POST["serie"];
		
	$con=mysqli_connect("localhost","root","","notas");

	if(!$con){
		echo"Error: Unable to connect to MySQL".PHP_EOL;
		echo"Debugging errno: ".mysqli_connect_errno().PHP_EOL;
		echo"Debugging error: ".mysqli_connect_error().PHP_EOL;
	}else{
		
		$disc= $con->query("SELECT * FROM curso_disc,disciplinas WHERE IdCurso = '$serie' AND curso_disc.IdDisciplinas = disciplinas.IdDisciplinas");
		
		while($array = $disc->fetch_array()){
				echo '<option value="'.$array["IdDisciplinas"].'">'.$array["nomeD"].'</option>';	
		}
	}	
?>
</select>


<tr><td align="center"><input type="submit" value="Escolher">

</form>

</td></tr> 

</table>

<br><br>

<table class="menu" bgcolor="lightblue" align="center">
<tr><td><a href="cadastrar-aluno.php">Cadastrar aluno  -</a></td>
<td><a href="alterar-aluno.php"> Alterar aluno  -</a></td>
<td><a href="alterar-notas.php"> Alterar notas  -</a></td>
<td><a href="professor.html"> Logout</a></td></tr>
</table>

</body>
</html>