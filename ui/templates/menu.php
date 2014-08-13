<?php 

//print_r("<pre>".$_SESSION."</pre>");
$autoridade = '';
	if ($_SESSION['dados']['autoridade'] == 2){
			$autoridade = 'style ="display: none;"';
	}
?>
				<div class='outer-menu'>
					<ul class="sf-menu">
							<li class="current">
								<a href="cliente/FormCadastraCliente.php">Cadastrar Clientes<span class="ui-icon ui-icon-document" style="float: right; margin: -0.2em .3em .3em .3em;"></span></a>
							</li>
							<li class="current">
								<a href="cliente/FormConsultaClientes.php">Localizar Clientes<span class="ui-icon ui-icon-document" style="float: right; margin: -0.2em .3em .3em .3em;"></span></a>
							</li>
							<li>
								<a href="administracao/FormAlteraSenha.php">Alterar Senha<span class="ui-icon ui-icon-gear" style="float: right; margin: -0.2em .3em .3em .3em;"></span></a>
							</li>
							<li>
								<a href="../index.php?removeCookie=true">Sair<span class="ui-icon ui-icon-power" style="float: right; margin: -0.2em .3em .3em .3em;"></span> </a>
							</li>
							
					</ul>
					
				</div>
				<script>
					$('.sf-menu a').each(function(){
						href = $(this).attr('href');
//						alert(href);
						if(href!='#')
							$(this).attr('href', '<?php echo UI_FOLDER;?>' + href);
//						alert($(this).attr('href'));
					});
				</script>