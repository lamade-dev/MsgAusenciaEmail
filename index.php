<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de mensagem de ausencia</title>
	<meta charset="utf-8">
	<?php setlocale (LC_ALL, 'pt_br');  ?>
</head>
<body>

	<table>
		<form name="form-email" method="post" action="">
			<tr>
				<th>Gerar mensagem de Ausencia avulsa</th>
			</tr>

			<tr>
				<td>Nome do usuario ausente</td>
				<td><input type="text" name="usuario-ausente"></td>
			</tr>

			<tr>
				<td>Email de ausencia</td>
				<td><input type="text" name="email-ausente"></td>
			</tr>

			<tr>
				<td>Genero do usuario ausente</td>
				<td>
					<input type="radio" name="genero" value="Masculino"> Masculino
					<input type="radio" name="genero" value="Feminino"> Feminino
				</td>
			</tr>

			<tr>
				<td>Saudação</td>
				<td>
					<input type="radio" name="saudacao" value="Olá"> Olá
					<input type="radio" name="saudacao" value="Oi"> Oi
				</td>
			</tr>

			<tr>
				<td>Data de saida </td>
				<td><input type="date" name="data-saida"></td>
			</tr>

			<tr>
				<td>Data de retorno</td>
				<td><input type="date" name="data-retorno"></td>
			</tr>

			<tr>
				<td>Nome da pessoa para contato</td>
				<td><input type="text" name="nome-contato"></td>
			</tr>

			<tr>
				<td>Email do contato</td>
				<td><input type="text" name="email-contato"></td>
			</tr>

			<tr>
				<td>Despedida</td>
				<td>
					<input type="radio" name="desp" value="Atenciosamente">
					Atenciosamente<br/>
					(Nome do usuario ausente)<br/><br/>

					<input type="radio" name="desp" value="Agradeço a atenção">
					Agradeço a atenção<br/>
					(Nome do usuario ausente)<br/><br/>

					<input type="radio" name="desp" value="Até a proxima">
					Até a proxima<br/>
					(Nome do usuario ausente)
				</td>
			</tr>

			<tr>
				<td>Idioma</td>
				<td>
					<input type="checkbox" name="Portugues" checked=""> Portugues <br/>
					<input type="checkbox" name="Ingles"> Ingles <br/>
					<input type="checkbox" name="Espanhol"> Espanhol <br/>
				</td>
			</tr>

			<tr>
				<td><button name="bt_gerar">Gerar</button></td>
			</tr>
		</form>
	</table> 

	<?php 

		if (isset($_POST['bt_gerar'])) {

			$nome_ausente = $_POST['usuario-ausente'];
			$email_ausente = $_POST['email-ausente']; //Variavel não é utilizada no texto apenas para salvar no bd
			$genero = $_POST['genero']; //Variavel não é usada no texto apenas para configuração
			$saudacao = $_POST['saudacao'];
			$data_saida = $_POST['data-saida'];
			$data_retorno = $_POST['data-retorno'];
			$pessoa_contato = $_POST['nome-contato'];
			$email_contato = $_POST['email-contato'];
			$despedida = $_POST['desp'];

			if ($genero == "Masculino") {
				$genero = "Obrigado";
			}else{
				$genero = "Obrigada";
			}

			if (isset($_POST['Portugues'])) {
				echo "

					$saudacao,<br><br>
					$genero pelo seu email! Estarei fora do escritório entre os dias <strong> "; echo date('d/m/Y ', strtotime( $data_saida)); echo "</strong> à <strong>";  echo date ('d/m/Y ', strtotime($data_retorno)); echo "</strong>, não estarei acessando meu email durante esse periodo.<br>
					Se tiver algum assunto urgente, por favor contatar a $pessoa_contato em $email_contato
					<br><br>
					$despedida,<br>
					$nome_ausente 

				";
			}	
				echo "<br/><br/><hr><br/><br/>";

			if ($saudacao == "Olá") {
				$saudacao = "Hi";
			}else{
				$saudacao = "Hello";
			}

			$genero = "Thanks";

			$despedida = "Warm regards";


			if (isset($_POST['Ingles'])) {
				echo "

					$saudacao,<br><br>
					$genero for your email! I'll be out of the office between the days <strong> "; echo date('y/m/d ', strtotime( $data_saida)); echo "</strong> until <strong>";  echo date ('y/m/d ', strtotime($data_retorno)); echo "</strong>, I will not be accessing my email during this period.<br>
					If you have an urgent matter, please contact the $pessoa_contato in $email_contato
					<br><br>
					$despedida,<br>
					$nome_ausente 

				";
			}	

			echo "<br/><br/><hr><br/><br/>";

			if (isset($_POST['Espanhol'])) {

				echo "Plata o plumo? Brinks versão em Espanhol sendo desenvolvida!";
				// echo "

				// 	$saudacao,<br><br>
				// 	$genero for your email! I'll be out of the office between the days <strong> "; echo date('y/m/d ', strtotime( $data_saida)); echo "</strong> e <strong>";  echo date ('y/m/d ', strtotime($data_retorno)); echo "</strong>, I will not be accessing my email during this period.<br>
				// 	If you have an urgent matter, please contact the $pessoa_contato in $email_contato
				// 	<br><br>
				// 	$despedida,<br>
				// 	$nome_ausente 

				// ";
			}
		};

	 ?>
</body>
</html>