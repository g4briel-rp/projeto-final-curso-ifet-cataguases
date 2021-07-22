<html>
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
	
	$av1=$_POST["av1"];
	$av2=$_POST["av2"];
	$av3=$_POST["av3"];
	$total=$av1 + $av2 + $av3;
	$faltas=$_POST["fal"];
	
	$result="INSERT INTO avaliacoes(IdAluno,IdDisciplina,nota1,nota2,nota3,total,faltas) VALUES ('$_SESSION[aluno]','$_SESSION[disc]','$av1','$av2','$av3','$total','$faltas')";
	
	if($con->query($result)==TRUE){
		echo("<script type='text/javascript'> alert('notas lançadas !!'); location.href='lancar-notas.php';</script>");
	}else{
		echo("<script type='text/javascript'> alert('erro!!'); location.href='lancar-notas.php';</script>");
	}
}
?>

<br><br>

<table class="menu" bgcolor="lightblue" align="center">
<tr><td><a href="cadastrar-aluno.php">Cadastrar aluno  -</a></td>
<td><a href="alterar-aluno.php"> Alterar aluno  -</a></td>
<td><a href="alterar-notas.php"> Alterar notas  -</a></td>
<td><a href="professor.html"> Logout</a></td></tr>
</table>

</body>
</html>