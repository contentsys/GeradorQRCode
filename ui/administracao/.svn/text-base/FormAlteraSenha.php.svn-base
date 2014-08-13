<?php
use Entities\Login;

include_once '../templates/topo.php';

$id = $_SESSION['dados']['idLogin'];

$usuario = $em->find("Entities\Login", $id);
if(empty($usuario))
	$usuario = new Login();
	
?>

	<div class="tabs center">
			<ul>
				<li><a href="#tabs-1">Alterar senha</a></li>
			</ul>
			<div id="tabs-1">
				<div cols='3'>
					<div class='field' >
						<label>Login:</label>
						<input type="hidden" value="<?php echo $id;?>" id='hidId'  />
						<input type='text' id='txtLogin' value='<?php echo $usuario->getUsername();?>' size='40' readonly="readonly"  />
					</div>
					<div class='field'>
						<label>Senha:</label>
						<input type="password" id='txtSenha'  />
					</div>
					<div class='field'>
						<label>Confirma senha:</label>
						<input type="password" id='txtConfirmaSenha'  />
					</div>
				</div>
			</div>
	
			<div class='footer'>
				<button id='btnSalvar'>Salvar</button>
				<script type="text/javascript">
					$("#btnSalvar").click(function(){
						if($('#txtSenha').val() != $('#txtConfirmaSenha').val()){
							alert('As senhas nao estao iguais!', 'Atencao');
						}else{
							utils.ajax('login/alterarSenha', {
								id: $("#hidId").val(),
								senha: $('#txtSenha').val()
									
							}, function(xml){
									erro = $(xml).find('erro').text();
									if(parseInt(erro) == 0){
										msg = "A senha foi alterada com sucesso!";
	
										$('#txtSenha').val(''),
										$('#txtConfirmaSenha').val('');
										
									}
									else{
										msg = "A senha NAO foi alterada com sucesso!";
									}
									alert(msg, 'Contato');
							});
						}
					});
				</script>
			</div>
	</div>

<?php 
if(!$popup)
	include_once '../templates/footer.php';
?>