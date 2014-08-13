<?php 

//print_r("<pre>".$_SESSION."</pre>");
$autoridade = '';
	if ($_SESSION['dados']['autoridade'] == 2){
			$autoridade = 'style ="display: none;"';
	}
?>
				<div class='outer-menu'>
					<ul class="sf-menu">
							<li class="current" <?php echo $autoridade; ?> >
								<a href="#">Funcionarios<span class="ui-icon ui-icon-document" style="float: right; margin: -0.2em .3em .3em .3em;"></span></a>
									<ul>
										<li>
											<a href="funcionario/FormCadastraFuncionario.php">Cadastras funcionarios</a>
										</li>
										<li>
											<a href="funcionario/FormConsultaFuncionario.php">Localizar funcionarios</a>
										</li>
							   		</ul>
							</li>
							<li <?php echo $autoridade; ?>>
								<a href="#">Obras<span class="ui-icon ui-icon-extlink" style="float: right; margin: -0.2em .3em .3em .3em;"></span></a>
									<ul>
										<li>
											<a href="obras/FormCadastraObra.php">Cadastrar obras</a>
										</li>
										<li>
											<a href="obras/FormConsultaObra.php">Localizar obras</a>
										</li>
									</ul>
							</li>
							<li <?php echo $autoridade; ?>>
								<a href="#">Ferramentas<span class="ui-icon ui-icon-wrench" style="float: right; margin: -0.2em .3em .3em .3em;"></span></a>
									<ul>
										<li>
											<a href="#">Cadastrar ferramentas</a>
										</li>
										<li>
											<a href="#">Localizar ferramentas</a>
										</li>
									</ul>
							</li>
							<li <?php echo $autoridade; ?>>
								<a href="#">Materiais<span class="ui-icon ui-icon-document" style="float: right; margin: -0.2em .3em .3em .3em;"></span></a>
									<ul>
										<li>
											<a href="material/FormCadastraMaterial.php">Cadastrar materiais</a>
										</li>
										<li>
											<a href="material/FormConsultaMaterial.php">Localizar materiais</a>
										</li>
									</ul>
							</li>
							<li <?php echo $autoridade; ?>>
								<a href="#">Estoque<span class="ui-icon ui-icon-note" style="float: right; margin: -0.2em .3em .3em .3em;"></span></a>
									<ul>
										<li>
											<a href="#">Entrada</a>
												<ul>
													<li>
														<a href="#">Ferramentas</a>
													</li>
													<li>
														<a href="estoque/FormEntradaMateriais.php">Materiais</a>
													</li>
												</ul>
										</li>
										<li>
											<a href="#">Localizar</a>
											
											<ul>
												<li>
													<a href="#">Ferramentas</a>
												</li>
												<li>
													<a href="#">Materiais</a>
													<ul>
														<li>
															<a href="estoque/FormLocalizarMateriaisPorObra.php">Buscar por obra</a>
														</li>
														<li>
															<a href="estoque/FormLocalizarMateriaisPorMaterial.php">Buscar por material</a>
														</li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
							</li>
							<li>
								<a href="#">Aquisicoes<span class="ui-icon ui-icon-pencil" style="float: right; margin: -0.2em .3em .3em .3em;"></span></a>
								<ul>
										<li>
											<a href="#">Ferramentas</a>
											<ul>
												<li>
													<a href="#">Entregas / Devolucoes</a>
												</li>
											</ul>
										</li>
										<li>
											<a href="#">Materiais</a>
											<ul>
												<li>
													<a href="aquisicoes/formSalvarAquisicao_new.php">Entregas / Devolucoes</a>
												</li>
											</ul>
										</li>
								</ul>
							</li>
							<li>
								<a href="#">Pedido<span class="ui-icon ui-icon-cart" style="float: right; margin: -0.2em .3em .3em .3em;"></span></a>
								<ul>
										<li>
											<a href="pedido/FormRealizaPedido.php">Realizar pedido</a>
										</li>
								</ul>
							</li>
							<li <?php echo $autoridade; ?> >
								<a href="#">Locacoes<span class="ui-icon ui-icon-folder-collapsed" style="float: right; margin: -0.2em .3em .3em .3em;"></span></a>
								<ul>
										<li>
											<a href="locacao/FormCadastraLocacao.php">Registrar locacao</a>
										</li>
										<li>
											<a href="locacao/FormConsultaLocacao.php">Consultar locacao</a>
										</li>
								</ul>
							</li>
							<li>
								<a href="#">Administracao<span class="ui-icon ui-icon-gear" style="float: right; margin: -0.2em .3em .3em .3em;"></span></a>
									<ul>
										<li>
											<a href="administracao/FormAlteraSenha.php">Alterar Senha</a>
										</li>
										<li <?php echo $autoridade; ?>>
											<a href="#">Usuario</a>
											<ul>
												<li>
													<a href="administracao/FormCadastraUsuario.php">Novo</a>
												</li>
												<li>
													<a href="administracao/FormConsultaUsuario.php">Localizar</a>
												</li>
											</ul>
										</li>
									</ul>
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