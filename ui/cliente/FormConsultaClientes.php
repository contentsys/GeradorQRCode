<?php
use Entities\Funcionario;

include_once '../templates/topo.php';


?>
	
	<div class="tabs center">
			<ul>
				<li><a href="#tabs-1">Localizar Clientes</a></li>
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
					
					<div  style="display: table; margin: 1em; float: left; height: 70px;margin-top:23px">
						<label>&nbsp;</label>
						<button id='btnBuscar'>Buscar</button>
						<button id='btnEditar'>Editar</button>
						<button id='btnExcluir'>Excluir</button>
						<button id='btnQRCode'>Imprimir QR Code</button>
						<script type="text/javascript">
							$("#btnExcluir").click(function(){
									$("#popupExcluirCliente").dialog('open');
							})
							$('#btnEditar').click(function(){
								var idPrimeiroSelecionado = "";
								$('input[name="id"]:checked').each(function(){
									if(idPrimeiroSelecionado=="")
										idPrimeiroSelecionado = $(this).val();
									
								});
								if(idPrimeiroSelecionado != "")
									window.location = 'FormCadastraCliente.php?id=' + idPrimeiroSelecionado;
								else
									alert("Selecione um cliente");
							});
							$('#btnQRCode').click(function(){
								//abrir qrcode
								var data = "";
								$('input[name="id"]:checked').each(function(cont) {
									if(cont == 0)
										data = $(this).val();
									else
										data += "," + $(this).val();
								 	 
								});
								
								window.location = 'gerarQRCode.php?ids='+ data;
							});
							
						
							$(document).ready(function(){
								$("#btnBuscar").click(function(){
									$("#chkTodos").attr('checked', false);
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
											var chkbox = '<input type="checkbox" value="'+id+'" name="id" id="id'+id+'"/>';
											$('.table_consulta tbody').append(utils.gerarLinha([id,
											                                                    chkbox,
																								nome,
																								email,
																								telefone], 0, 'trConsulta', index++,false));
												$('#trConsulta_'+ id).click(function(){
														$('#id'+id).attr('checked', !$('#id'+id).attr('checked'));
													
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
							<th><input type="checkbox" id="chkTodos" value='todos' /> <label for="chkTodos" >(Todos)</label></th>
							<th>Nome</th>
							<th>Email</th>
							<th>Telefone</th>
						</tr>
						<tfoot>
							<tr>
								<td colspan="4">Nenhum Resultado Encontrado</td>
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
	$("#chkTodos").click(function(){
			
			var thizz = this;
			$('input[name="id"]').each(function(){
				$(this).attr("checked", $(thizz).is(":checked"));
				
			});
	}); 
	$('input[name="id"]').live('click',function(){
		if(!$(this).is('checked')){
			$("#chkTodos").attr('checked', false);
		}
	})
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
				var data = { 'ids[]' : []};
				$('input[name="id"]:checked').each(function() {
				 	 data['ids[]'].push($(this).val());
				});
				utils.ajax('cliente/excluir', data, function(xml){
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