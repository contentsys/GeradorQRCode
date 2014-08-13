function Usuario(){
	this.nome ='';
	this.senha = '';
	this.keepConnected = false;
	
	this.verificaAutenticacao = function(success){
		utils.ajax("login/verifica-autenticacao", {
			usuario : this.nome,
			senha: this.senha,
			rememberPass: this.keepConnected
		}, success, "post");
	};
}