﻿<html>
<head>
<link href = 'css/style.css' rel = 'stylesheet'>
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
	
<?php

session_start();

$con=mysqli_connect("localhost","root","","notas");

if(!$con){
	echo"Error: Unable to connect to MySQL".PHP_EOL;
	echo"Debugging errno: ".mysqli_connect_errno().PHP_EOL;
	echo"Debugging error: ".mysqli_connect_error().PHP_EOL;
}else{
	
	$nome=$_POST["nome"];
	$email=$_POST["email"];
	$data=$_POST["data"];
	$sexo=$_POST["sexo"];
	$cpf=$_POST["cpf"];
	$serie=$_POST["serie"];
	
	$aluno=mysqli_query($con,"SELECT * FROM alunos WHERE nome = '$_SESSION[nome]'");
	
	if($array = mysqli_fetch_array($aluno)){
		$id=$array["IdAluno"];
		
		$serie=mysqli_query($con,"SELECT * FROM curso WHERE nomeC = '$serie'");
		
		if($array = mysqli_fetch_array($serie)){
			
			$serie2=$array["IdCurso"];
			
			$altera=mysqli_query($con,"UPDATE alunos SET nome='$nome', email='$email', data='$data', sexo='$sexo', cpf='$cpf', IdCurso='$serie2' WHERE IdAluno='$id'");
		
			if($altera==true){
				echo("<script type='text/javascript'> alert('alterado com sucesso !!'); location.href='alterar-aluno.php';</script>");
			}else{
				echo("<script type='text/javascript'> alert('error 3!!'); location.href='alterar-aluno.php';</script>");
			}
		}else{
			echo("<script type='text/javascript'> alert('error 2!!'); location.href='alterar-aluno.php';</script>");
		}
	}else{
			echo("<script type='text/javascript'> alert('error 1!!'); location.href='alterar-aluno.php';</script>");
		}
}	
?>

<br><br>

<table class="menu" bgcolor="lightblue" align="center">
<tr><td><a href="cadastrar-aluno.php">Cadastrar aluno  -</a></td>
<td><a href="lancar-notas.php"> Lançar notas  -</a></td>
<td><a href="alterar-notas.php"> Alterar notas  -</a></td>
<td><a href="professor.html"> Logout</a></td></tr>
</table>

</body>
</html>