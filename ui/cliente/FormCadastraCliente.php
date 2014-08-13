<?php
use Entities\Funcionario;

include_once '../templates/topo.php';

$id= '';

if(isset($_REQUEST['id']))
	$id = $_REQUEST['id'];
	
$cliente = $em->find("Entities\Cliente", $id);
if(empty($funcionario))
	$cliente = new Cliente();
	
?>

	<div class="tabs center">
			<ul>
				<li><a href="#tabs-1">Cliente</a></li>
			</ul>
			<div id="tabs-1">
				<div cols='4'>
					<div class='field' >
						<label>Nome</label>
						<input type="hidden" value="<?php echo $id;?>" id='hidId' onkeypress="mascara(this,maiusculo)" />
						<input type='text' id='txtNome' value='<?php echo $funcionario->getNome();?>' size='30' onkeypress="mascara(this,maiusculo)" />
					</div>
					
					<div class='field'>
						<label>E-mail</label>
						<input type='text' id='txtEmail' value='<?php echo $funcionario->getEmail();?>'  size='25' />
					</div>
					<div class='field'>
						<label>Telefone</label>
						<input type='text' id='txtTelefone' value='<?php echo $funcionario->getTelefone();?>' size='12' />
						<script type="text/javascript">
							$("#txtTelefone").setMask('phone');
						</script>
					</div>
					
				</div>
			</div>
	
			<div class='footer'>
				<button id='btnSalvar'>Salvar</button>
				<script type="text/javascript">
					$("#btnSalvar").click(function(){
						if($('#txtNome').val() == '' || $('#txtEmail').val() == '' ){
							alert('Nome e email sao dados obrigatorios!', 'Atencao');
						
						}else{
						
							utils.ajax('cliente/salvar', {
								id: $("#hidId").val(),
								nome: $('#txtNome').val(),
								telefone: $('#txtTelefone').val(),
								email: $('#txtEmail').val()
								
									
							}, function(xml){
									erro = $(xml).find('erro').text();
									if(parseInt(erro) == 0){
										msg = "O Cliente foi salvo com sucesso!";
										
										
									}
									else{
										msg = "Houve um erro. O cliente NAO foi salvo!";
									}
									alert(msg, 'Atencao');
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