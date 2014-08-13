<?php
use Entities\Funcionario;

include_once '../templates/topo.php';

$strBusca = (isset($_REQUEST['strBusca']))? $_REQUEST['strBusca']: '';

$campoBusca = (isset($_REQUEST['campoBusca']))? $_REQUEST['campoBusca']: '';

$q = $em->createQuery("select c from Entities\Funcionario c where 1=1 and :campoBusca = :strBusca");
$q->setParameter("campoBusca", $campoBusca);
$q->setParameter("strBusca", $strBusca);
$funcionarios = $q->getResult();

if(empty($funcionarios)){
	
	$funcionarios = new \Doctrine\Common\Collections\ArrayCollection();
}

?>
	
	<div class="tabs center">
			<ul>
				<li><a href="#tabs-1">Buscar</a></li>
			</ul>
			<div id="tabs-1">
				<div cols='5'>
					<div class='field' >
						<label>Texto</label>
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
						<label>Buscar Por</label>
						<select id='selBuscas'>
							<option value='nome'>Nome</option>
							<option value='matricula'>Matricula</option>
						</select>
					</div>
					<div class='field'>
						<label>&nbsp;</label>
						<button id='btnBuscar'>Buscar</button>
						<script type="text/javascript">
							$(document).ready(function(){
								$("#btnBuscar").click(function(){
									utils.ajax('funcionario/pesquisarFuncionarios', {
										tipoBusca: $('#selBuscas').val(),
										strBusca: $('#txtBusca').val()
									}, function(xml){
										cont = 0;
										$('.table_consulta tbody tr').each(function(){
											if(cont!=0)
												$(this).remove();
											cont++;
										});
										index = 0;
										$(xml).find('funcionario').each(function(){
											var id= $(this).find('id').text();
											var nome = $(this).find('nome').text();
											var matricula = $(this).find('matricula').text();
											var telefone = $(this).find('telefone').text();
											
											$('.table_consulta tbody').append(utils.gerarLinha([id,
																								nome,
																								matricula,
																								telefone], 0, 'trConsulta', index++,false));
												$('#trConsulta_'+ id).click(function(){
													$('#popupConsultaFuncionario').dialog('open');
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
							<th>Matricula</th>
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
<div id="popupConsultaFuncionario">
	<label>O que deseja fazer?</label>
	<input type="hidden" id="hidIdPopup" />
</div>
<script>
	$('#popupConsultaFuncionario').dialog({
		modal: true,
		title: 'Consulta funcionario',
		autoOpen: false,
		width: 350,
		buttons: {
			"Excluir": function(){
				$(this).dialog('close');
				$('#popupExcluirFuncionario').dialog('open');
			
			},
			"Alterar": function(){
				window.location = 'FormCadastraFuncionario.php?id=' + $('#hidIdPopup').val();
				
			},
			"Cancelar": function(){
				$(this).dialog('close');
			}
		}
	});
</script>
<div id="popupExcluirFuncionario">
	<label>Deseja excluir o funcionario?</label>
</div>
<script>
	$('#popupExcluirFuncionario').dialog({
		modal: true,
		title: 'Excluir funcionario',
		autoOpen: false,
		width: 250,
		buttons: {
			"Sim": function(){
			$(this).dialog('close');
				utils.ajax('funcionario/excluir', {
					id: $('#hidIdPopup').val()
					
						
				}, function(xml){
						erro = $(xml).find('erro').text();
						if(parseInt(erro) == 0){
							msg = "Funcionario excluido com sucesso!";
	
							$("#btnBuscar").click();
							
						}
						else if(parseInt(erro) == 23000){
							msg = "NAO foi possivel excluir, este funcionario possui itens relacionados!";
						}
						else{
							msg = "Funcionario NAO foi excluido com sucesso!";
						}
						alert(msg, 'Funcionario');
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