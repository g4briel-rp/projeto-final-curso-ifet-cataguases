<html>
<head>

<link href = "css/style.css" rel = "stylesheet">
<script type="text/javascript" src="valida-aluno.js"></script>

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

<form method="post" action="cadastrar2.php" id="cadastroAlu" onsubmit="return validaForm();">

<table class="menu" bgcolor="lightblue" align="center">

<tr><td>Nome:
</td><td><input type="text" name="nomeA" id="nomeA">
</td></tr>

<tr><td>Email:
</td><td><input type="email" name="email" id="email">
</td></tr>

<tr><td>Data de nascimento:
</td><td><input type="date" name="data" id="data">
</td></tr>

<tr><td>Sexo:
</td><td><select name="sexo" id="sexo">
<option value=""></option>
<option value="masculino">Masculino</option>
<option value="feminino">Feminino</option>
</select>
</td></tr>

<tr><td>CPF:
</td><td><input type="text" name="cpf" id="cpf" maxlength="11">
</td></tr>

<tr><td>Serie:
</td><td><select name="serie" id="serie">
<option value=""></option>

<?php
	$con=mysqli_connect("localhost","root","","notas");

	if(!$con){
		echo"Error: Unable to connect to MySQL".PHP_EOL;
		echo"Debugging errno: ".mysqli_connect_errno().PHP_EOL;
		echo"Debugging error: ".mysqli_connect_error().PHP_EOL;
	}else{
		
		$result= $con->query("SELECT * FROM curso");
		
		while($array = $result->fetch_array()){
			echo '<option value="'.$array["IdCurso"].'">'.$array["nomeC"].'</option>'; 
		}
	}	
?> 

</select>

<tr><td colspan="2" align="center"><input type="submit" value="Cadastrar">
</td></tr>

</form>

</table>

<br><br>

<table class="menu" bgcolor="lightblue" align="center">
<tr><td><a href="alterar-aluno.php">Alterar aluno  -</a></td>
<td><a href="lancar-notas.php"> Lançar notas  -</a></td>
<td><a href="alterar-notas.php"> Alterar notas  -</a></td>
<td><a href="professor.html"> Logout</a></td></tr>
</table>

</body>
</html>