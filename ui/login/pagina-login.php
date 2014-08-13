<?php 
$raizTopo = dirname(__FILE__). "/../..";
$popup = isset($_REQUEST['popup'])? $_REQUEST['popup'] : false;
echo $popup;

include_once "$raizTopo/config.php";

//if(!$popup){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<?php 
			require_once ROOTFOLDER . "/ui/templates/header.php";
		?>
	</head>
	<body>
		<div id="div_layout" style="width: 100%;"> 
			<div id="div_conteudo" >
				<div class='out-topo'>
					<div class='inner-topo center'>
						<div class='left-topo'>
							
						</div>
						<div class='right-topo'></div>
					</div>
				</div>
				
				<div class='divBody' >
				
				<?php echo md5("123KmR2@*)&+");?>
				<div class='group-login'>
								<div class='faixa'>
									&nbsp;
								</div>
								<div class='inner-faixa'>
										<div class='apresentacao'>
											<br><br>
											- Solu&ccedil;&atilde;o para a sua Empresa.<br>
											- Alta Disponibilidade.<br>
											- Computa&ccedil;&atilde;o em N&uacute;vens.<br>
											- Emiss&atilde;o de NF-e.<br>
											- Ordem de Servi&ccedil;o.<br>
											- Controle de Estoque e muito mais.<br>
										</div>
										
										<div class='form-login-out'>
											<div class='form-login-in'>
												<h1>Login</h1><br />
												<div>
<!--													<form id="frmLogin" action="autentica.php" method="post" >-->
														<table style='width: 95%'>
															<tr>
																<td>
																	<label class='labelForm'><strong>Usuario</strong></label>
																</td>
															</tr>
															<tr>
																<td>
																	<input type="text" name="txtLogin" class='text' style='width:95%; text-align: center;' id="txtLogin" tabindex="1" title="campo Nome de usuario" />
																</td>
															</tr>
															<tr>
																<td>
																	<label class='labelForm'><strong>Senha</strong></label>
																</td>
															</tr>
															<tr>
																<td>
																	<input type="password" name="txtPassword" class='text' style='width:95%; text-align: center;' tabindex="2" id="txtPassword" title="campo Senha" />
																</td>
															</tr>
														
															<tr>
																
																<td style='text-align: right'>
																	<div id='manter conectado' style='display: inline;  float: left; margin-top: 0.68em'>
																		<input type="checkbox" id='chkManterConectado' title="Manter Conectado" /><label for="chkManterConectado"  style='font-size: .95em; margin-top: -0.2em'> Manter Conectado</label>
																	</div>
																	<div id='erroLogin' style='text-align: left; font-size: .9em; color: #990000; display: inline;'>
																		&nbsp;
																	</div>
																	
																	<button id="btnLogin" tabindex="3" style=';margin:0' title="Efetuar Login"  >Entrar</button>
																	<script>
																		
																	
																		$("#btnLogin").button({
																				text: true,
																				icons:{
																						primary: "ui-icon-locked"
																					}
																			});
																		$("#btnLogin").click(function(){
																			var login = new Usuario();
																			login.nome = $('#txtLogin').val();
																			login.senha = $('#txtPassword').val();
																			
																			login.keepConnected = $('#chkManterConectado').attr("checked");
																			
																			login.verificaAutenticacao(successLogin);
																		});

																		function successLogin(xml){
																			if($(xml).find('usuarioValido').text() == "1"){
																				utils.redirecionar('../PaginaInicial.php');
																			}
																			else{
																				$('#erroLogin').text("Login Invalido");
																			}
																		}
																		
																	</script>
																</td>
																
															</tr>
														</table>
														<div class='cadastrar-login-desc'>
															
																Sua Empresa ainda n&atilde;o possui um cadastro? Agende uma reuni&atilde;o com um representante da ContentSys. &Eacute; simples e sem burocracia. <a href='#'><span class='btnCadastrar'>Cadastre-se</span></a>
																
															
															
														</div>
<!--													</form>-->
												</div>
											</div>
										</div>
										
										<div class='novidades'>
											<div class='body-novidades'>
												<a href='https://twitter.com/#!/contentsys' target='_blank'><h1><span>imagem passarinho twitter</span> Novidades</h1></a>
												<div class='twitts'>
													<ul>
														
													</ul>
													<script type="text/javascript">
														$(document).ready(function(){
															getTwitter('contentsys', putTwittsDefault);
														});
														
													</script>
												</div>
											</div>
											
										</div>
								</div>
								
									
							</div>
							
							
			</div>
				
		</div>
		
	</div>
	
	<div class="footer-login">
					<div class='propaganda'>
						Utilize nossos sistemas e ajude o meio Ambiente. A computa&ccedil;&atilde;o em nuvem est&aacute; ligada a <span>TI verde</span>. Para utilizar o Admsys voc&ecirc; n&atilde;o precisa de supercomputadores, basta uma conex&atilde;o com a internet. <span class='btnCadastrar'><a href='#'>Cadastre-se</a></span> e solicite uma reuni&atilde;o para apresenta&ccedil;&atilde;o desse Produto. Aproveite a fase de desenvolvimento e ajude a construir o melhor e maior ERP do Brasil. A ContentSys acredida na uni&atilde;o de ideias diversificadas para criar e desenvolver solu&ccedil;&otilde;es inovadoras junto com cada cliente. Seja nosso Colaborador, cres&ccedil;a conosco.
					</div>
					<div class='direitos'>Contentsys Admsys - Todos os direitos reservados</div>
				</div>
				
				<div id='dialogCadastrar' >
					<form action="" name="form_enviaDadosContato" onsubmit="return false;">
						<table>
							<tr>
								<td><label class='labelForm'>Seu Nome*</label></td>
							</tr>
							
							<tr>
								<td><input type="text" id="txtSeuNome" name="txtSeuNome" class='text' title="Seu Nome" /></td>
							</tr>
							
							<tr>
								<td><label class='labelForm'>Razao Social*</label></td>
							</tr>
							
							<tr>
								<td><input type="text" id="txtRazaoSocial" name="txtRazaoSocial" class='text' title="Razao Social" /></td>
							</tr>
							
							<tr>
								<td><label class='labelForm'>CNPJ</label></td>
							</tr>
							<tr>
								<td><input type="text" id="txtCnpj" name="txtCnpj" class='text' title="CNPJ" /></td>
								<script>
									$("#txtCnpj").setMask('cnpj');
								</script>
							</tr>
							
							
							<tr>
								<td><label class='labelForm'>Nome Fantasia</label></td>
							</tr>
							
							<tr>
								<td><input type="text" id="txtNomeFantasia" name="txtNomeFantasia" class='text' title="Nome Fantasia" /></td>
							</tr>
							
							
							
							
							<tr>
								<td><label class='labelForm'>Telefone*</label></td>
							</tr>
							
							<tr>
								<td><input type="text" id="txtTelefone" name="txtTelefone" class='text' title="Telefone" /></td>
								<script>
									$("#txtTelefone").setMask('phone');
								</script>
							</tr>
							
							
							
							
							<tr>
								<td><label class='labelForm'>E-mail*</label></td>
							</tr>
							
							<tr>
								<td><input type="text" id="txtEmail" name="txtEmail" class='text' title="E-mail" /></td>
							</tr>
				
				
							<tr>
								<td><label class='labelForm'>Cidade*</label></td>
							</tr>
							
							<tr>
								<td><input type="text" id="txtCidade" name="txtCidade" class='text' title="Cidade" /></td>
							</tr>
							
							
							
							<tr>
								<td><label class='labelForm'>Estado*</label></td>
							</tr>
							
							<tr>
								<td><input type="text" id="txtEstado" name="txtEstado" maxlength="2" class='text' style='width: 20%;' title="Estado" value='SP' /></td>
							</tr>
										
							
						</table>
					</form>
				</div>
				
				
				<div id="popup">
				
				</div>
				
				<script type="text/javascript">
					$("#popup").dialog({
							autoOpen:false,
							width: 300
						})
				</script>
	<?php includeJs("twitter");
		  includeJs("login");
	?>
</body>
</html>
