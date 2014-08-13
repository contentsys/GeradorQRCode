<?php
use Entities\Funcionario;

include_once '../templates/topo.php';


?>
	
	<div class="tabs center">
			<ul>
				<li><a href="#tabs-1">Buscar</a></li>
			</ul>
			<div id="tabs-1">
				<div cols='5'>
					<div class='field' >
						<label>Termo de Busca: </label>
						<input type='text' id='txtBusca' size='35'/>
					</div>
					<script>
						$('#txtBusca').keypress(function(e){
							if(e.which == 13){
								$('#btnBuscar').click();
							}
						});
					</script>
					
					<div class='field'>
						<label>&nbsp;</label>
						<button id='btnBuscar'>Buscar</button>
						<script type="text/javascript">
							$(document).ready(function(){
								$("#btnBuscar").click(function(){
									utils.ajax('cliente/pesquisarClientes', {
										strBusca: $('#txtBusca').val()
									}, function(xml){
										cont = 0;
										$('.table_consulta tbody tr').each(function(){
											if(cont!=0)
												$(this).remove();
											cont++;
										});
										index = 0;
										$(xml).find('cliente').each(function(){
											var id= $(this).find('id').text();
											var nome = $(this).find('nome').text();
											var email = $(this).find('email').text();
											var telefone = $(this).find('telefone').text();
											
											$('.table_consulta tbody').append(utils.gerarLinha([id,
																								nome,
																								email,
																								telefone], 0, 'trConsulta', index++,false));
												$('#trConsulta_'+ id).click(function(){
													$('#popupConsultaCliente').dialog('open');
													$('#hidIdPopup').val(id);
												});
										});
										$('.table_consulta tfoot tr td').html(index + ' Resultado(s) Encontrado(s)');
									});
								});

							});
						</script>
					</div>
					
				</div>
				<div>
					<table class='table_consulta'>
						<tr>
							<th>Nome</th>
							<th>Email</th>
							<th>Telefone</th>
						</tr>
						<tfoot>
							<tr>
								<td colspan="3">Nenhum Resultado Encontrado</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<div class='footer'>
				
			</div>
	</div>
<div id="popupConsultaCliente">
	<label>O que deseja fazer?</label>
	<input type="hidden" id="hidIdPopup" />
</div>
<script>
	$('#popupConsultaCliente').dialog({
		modal: true,
		title: 'Selecione Uma Opcao',
		autoOpen: false,
		width: 350,
		buttons: {
			"Excluir": function(){
				$(this).dialog('close');
				$('#popupExcluirCliente').dialog('open');
			
			},
			"Alterar": function(){
				window.location = 'FormCadastraCliente.php?id=' + $('#hidIdPopup').val();
				
			},
			"Cancelar": function(){
				$(this).dialog('close');
			}
		}
	});
</script>
<div id="popupExcluirCliente">
	<label>Deseja excluir esse cliente?</label>
</div>
<script>
	$('#popupExcluirCliente').dialog({
		modal: true,
		title: 'Excluir Cliente',
		autoOpen: false,
		width: 250,
		buttons: {
			"Sim": function(){
			$(this).dialog('close');
				utils.ajax('cliente/excluir', {
					id: $('#hidIdPopup').val()
					
						
				}, function(xml){
						erro = $(xml).find('erro').text();
						if(parseInt(erro) == 0){
							msg = "Cliente excluido com sucesso!";
	
							$("#btnBuscar").click();
							
						}
						else if(parseInt(erro) == 23000){
							msg = "NAO foi possivel excluir, este cliente possui itens relacionados!";
						}
						else{
							msg = "Cliente NAO foi excluido!";
						}
						alert(msg, 'Atencao');
				});
			
			},
			"Nao": function(){
				$(this).dialog('close');
			}
		}
	});
</script>

<?php 
if(!$popup)
	include_once '../templates/footer.php';
?>