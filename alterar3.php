<html>
<head>

<link href = "css/style.css" rel = "stylesheet">
<script type="text/javascript" src="valida-altera-alu2.js"></script>

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

<center><h3>Forneça os dados sobre o aluno:</h3></center>

<br><br><br><br>

<form method="post" action="alterar4.php" id="alterar2" onsubmit="return validaForm();">

<table class="menu" bgcolor="lightblue" align="center">

<?php

	session_start();
	
	$con=mysqli_connect("localhost","root","","notas");

	if(!$con){
		echo"Error: Unable to connect to MySQL".PHP_EOL;
		echo"Debugging errno: ".mysqli_connect_errno().PHP_EOL;
		echo"Debugging error: ".mysqli_connect_error().PHP_EOL;
	}else{
		
		$aluno=$con->query("SELECT * FROM alunos WHERE nome = '$_SESSION[nome]'");
		
		while($array = $aluno->fetch_array()){
			echo "<tr><td>Nome: </td><td><input type='text' name='nome' id='nome' value='$array[nome]'></td></tr>";
			echo "<tr><td>Email: </td><td><input type='email' name='email' id='email' value='$array[email]'></td></tr>";
			echo "<tr><td>Data de nascimento: </td><td><input type='date' name='data' id='data' value='$array[data]'></td></tr>";
			echo "<tr><td>Sexo: </td><td><input type='text' name='sexo' id='sexo' value='$array[sexo]'></td></tr>";
			echo "<tr><td>CPF: </td><td><input type='text' name='cpf' id='cpf' value='$array[cpf]' maxlength='11'></td></tr>";
			$serie= $con->query("SELECT * FROM alunos,curso WHERE curso.IdCurso = '$array[IdCurso]'");
			if($array = $serie->fetch_array()){
				echo "<tr><td>Turma: </td><td><input type='text' name='serie' id='serie' value='$array[nomeC]'></td></tr>";
			}
		}
	}
?> 

</select>

<tr><td colspan="2" align="center"><input type="submit" value="Alterar">
</td></tr>

</form>

</table>

<br><br>

<table class="menu" bgcolor="lightblue" align="center">
<tr><td><a href="cadastrar-aluno.php">Cadastrar aluno  -</a></td>
<td><a href="lancar-notas.php"> Lançar notas  -</a></td>
<td><a href="alterar-notas.php"> Alterar notas  -</a></td>
<td><a href="professor.html"> Logout</a></td></tr>
</table>

</body>
</html>