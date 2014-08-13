<?php
use Entities\Funcionario;

include_once '../templates/topo.php';

$id= '';

if(isset($_REQUEST['id']))
	$id = $_REQUEST['id'];
	
$funcionario = $em->find("Entities\Funcionario", $id);
if(empty($funcionario))
	$funcionario = new Funcionario();
	
?>

	<div class="tabs center">
			<ul>
				<li><a href="#tabs-1">Funcionario</a></li>
			</ul>
			<div id="tabs-1">
				<div cols='4'>
					<div class='field' >
						<label>Nome</label>
						<input type="hidden" value="<?php echo $id;?>" id='hidId' onkeypress="mascara(this,maiusculo)" />
						<input type='text' id='txtNome' value='<?php echo $funcionario->getNome();?>' size='30' onkeypress="mascara(this,maiusculo)" />
					</div>
					<div class='field'>
						<label>Matricula</label>
						<input type='text' id='txtMatricula' value='<?php echo $funcionario->getMatricula();?>'  size='8' style='text-align: right;' />
					</div>
					<div class='field'>
						<label>Cargo</label>
						<select id='selCargo' >
							<option value="0" <?php if($funcionario->getCargo() == '0'){echo "selected='selected'";} ?> >Selecione</option>
							<option value="1" <?php if($funcionario->getCargo() == '1'){echo "selected='selected'";} ?> >Ajudante</option>
							<option value="2" <?php if($funcionario->getCargo() == '2'){echo "selected='selected'";} ?> >Armador</option>
							<option value="3" <?php if($funcionario->getCargo() == '3'){echo "selected='selected'";} ?> >Carpinteiro</option>
							<option value="4" <?php if($funcionario->getCargo() == '4'){echo "selected='selected'";} ?> >Encarregado</option>
							<option value="5" <?php if($funcionario->getCargo() == '5'){echo "selected='selected'";} ?> >Engenheiro</option>
							<option value="6" <?php if($funcionario->getCargo() == '6'){echo "selected='selected'";} ?> >Guincheiro</option>
							<option value="7" <?php if($funcionario->getCargo() == '7'){echo "selected='selected'";} ?> >Sinaleiro</option>
							<option value="8" <?php if($funcionario->getCargo() == '8'){echo "selected='selected'";} ?> >Tec. de seguran&ccedil;a</option>
						</select>
					</div>
					<div class='field'>
						<label>Obras</label>
						<select id='selObras' >
							<?php 
								$queryObras = $em->createQuery("select c from Entities\Obras c ");
								$obras = $queryObras->getResult();
								$seleciona = "";
								
								if($id == ''){
									$seleciona = "selected='selected'";
								}
								echo "<option value='0' ".$seleciona.">Selecione</option>";
								
								foreach ($obras as $obra) {
									$obraFuncionario = $funcionario->getObras();
									
									if(!empty($obraFuncionario)){
										if($funcionario->getObras()->getId() == $obra->getId()){
											$selected = "selected='selected'";
										}
									}
									
									
									echo "<option value='".$obra->getId()."'".$selected.">".$obra->getNomeObra()."</option>";
								}
							?>
						</select>
					</div>
					<div class='field'>
						<label>Telefone</label>
						<input type='text' id='txtTelefone' value='<?php echo $funcionario->getTelefone();?>' size='12' />
						<script type="text/javascript">
							$("#txtTelefone").setMask('phone');
						</script>
					</div>
					<div class='field'>
						<label>Nextel</label>
						<input type='text' id='txtNextel' value='<?php echo $funcionario->getNextel();?>' size='10' />
						<script type="text/javascript">
							$("#txtTelefone").setMask('phone');
						</script>
					</div>
					<div class='field'>
						<label>E-mail</label>
						<input type='text' id='txtEmail' value='<?php echo $funcionario->getEmail();?>'  size='25' />
					</div>
					<div class='field'>
						<label>ADM</label>
						<?php 
							if($funcionario->getIsAdm() == 1 ){?>
								<input type="checkbox" id="ckIsAdm" checked='checked' /><?php 								
							}else{?>
								<input type="checkbox" id="ckIsAdm" /><?php 
							}
						?>
					</div>
				</div>
			</div>
	
			<div class='footer'>
				<button id='btnSalvar'>Salvar</button>
				<script type="text/javascript">
					$("#btnSalvar").click(function(){
						if($('#txtNome').val() == '' || $('#txtMatricula').val() == '' ){
							alert('Nome e matricula sao dados obrigatorios!', 'Atencao');
						
						}else{
						
							utils.ajax('funcionario/salvar', {
								id: $("#hidId").val(),
								nome: $('#txtNome').val(),
								telefone: $('#txtTelefone').val(),
								matricula: $('#txtMatricula').val(),
								cargo: $('#selCargo').val(),
								obra: $('#selObras').val(),
								telefone: $('#txtTelefone').val(),
								nextel: $('#txtNextel').val(),
								email: $('#txtEmail').val(),
								isAdm: $('#ckIsAdm').attr("checked")
								
									
							}, function(xml){
									erro = $(xml).find('erro').text();
									if(parseInt(erro) == 0){
										msg = "O funcionario foi salvo com sucesso!";
	
										$('#hidId').val(''),
										$('#txtNome').val(''),
										$('#txtMatricula').val('');
										$('#selCargo').val('0');
										$('#selCargo').selectmenu();
										$('#txtTelefone').val('');
										$('#selObras').val('0');
										$('#selObras').selectmenu();
										$('#txtTelefone').val('');
										$('#txtNextel').val('');
										$('#txtEmail').val('');
										$('#ckIsAdm').attr("checked", false);

										
										
									}
									else{
										msg = "O contato NAO foi salvo com sucesso!";
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