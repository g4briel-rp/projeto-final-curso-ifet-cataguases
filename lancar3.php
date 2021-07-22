<html>
<head>

<link href = "css/style.css" rel = "stylesheet">
<script type="text/javascript" src="valida-notas3.js"></script>

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

<center><h3>Preencha com as notas dos alunos:</h3></center>

<br><br><br><br>

<table class="menu" bgcolor="lightblue" align="center">

<?php	

	session_start();
		
	$con=mysqli_connect("localhost","root","","notas");

	if(!$con){
		echo"Error: Unable to connect to MySQL".PHP_EOL;
		echo"Debugging errno: ".mysqli_connect_errno().PHP_EOL;
		echo"Debugging error: ".mysqli_connect_error().PHP_EOL;
	}else{
		
		$aluno=$_POST["aluno"];
		$_SESSION["aluno"]=$aluno;
		$disc=$_POST["disc"];
		$_SESSION["disc"]=$disc;
		
		$al="SELECT * FROM alunos WHERE IdAluno = '$aluno'";
		
		$res = mysqli_query($con,$al);
		if($res==true){
			if($array = mysqli_fetch_array($res)){
				echo"<tr><td>Aluno:</td><td> $array[nome] -</td>";
			}
		}
		
		$se="SELECT * FROM curso WHERE IdCurso = '$_SESSION[serie]'";
		
		$res = mysqli_query($con,$se);
		if($res==true){
			if($array = mysqli_fetch_array($res)){
				echo"<td>Turma:</td><td> $array[nomeC] -</td>";
			}
		}
		
		$di="SELECT * FROM disciplinas WHERE IdDisciplinas = '$disc'";
		
		$res = mysqli_query($con,$di);
		if($res==true){
			if($array = mysqli_fetch_array($res)){
				echo"<td>Disciplina:</td><td> $array[nomeD]</td>";
			}
		}
	}	
?>

</table>

<br><br>

<table class="menu" bgcolor="lightblue" align="center">

<form method="post" action="lancar4.php" id="lancar3" onsubmit="return validaForm();">

<tr><td>Avaliação 1:</td><td><input type="text" name="av1" id="av1" size="5"></td></tr>
<tr><td>Avaliação 2:</td><td><input type="text" name="av2" id="av2" size="5"></td></tr>
<tr><td>Avaliação 3:</td><td><input type="text" name="av3" id="av3" size="5"></td></tr>
<tr><td>Faltas:</td><td><input type="text" name="fal" id="fal" size="5"></td></tr>

<tr><td align="center" colspan="2"><input type="submit" value="Lançar">

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