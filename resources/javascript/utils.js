var ENVIROMENT = "development";

$(document).ready(function(){
	$('.tabs').tabs();
	$('input[type="text"]').addClass('inputText');
	$('input[type="password"]').addClass('inputText');
	$('select').selectmenu({
		width: 200
	});
	$('optgroup[hidden="true"]').css('display', 'none');
	$('button').button();
	$('button.add').button({
		icons: {
			primary: "ui-icon-plusthick"
		}
	});
	
	$('.field').each(function(){
		var cols = $(this).parent().attr('cols');
		if(parseInt(cols)>0){
			cols = parseInt(cols);
			tamanho = (60 / cols) + ((1/Math.pow(cols, 1000)) * (38) );
			
			$(this).css('width', tamanho + '%');
		}
	});
	
	
	$.mask.masks = {
			'phone'     : { mask : '(99) 9999-9999' },
			'nextel'     : { mask : '99 99 9999' },
			'phone-us'  : { mask : '(999) 9999-9999' },
			'cpf'       : { mask : '999.999.999-99' },
			'cnpj'      : { mask : '99.999.999/9999-99' },
			'date'      : { mask : '39/19/9999' }, //uk date
			'date-us'   : { mask : '19/39/9999' },
			'cep'       : { mask : '99999-999' },
			'time'      : { mask : '29:69' },
			'cc'        : { mask : '9999 9999 9999 9999' }, //credit card mask
			'integer'   : { mask : '999.999.999.999', type : 'reverse' },
			'decimal'   : { mask : '99,999.999.999.999', type : 'reverse', defaultValue: '000' },
			'decimal-us'    : { mask : '99.999,999,999,999', type : 'reverse', defaultValue: '000' },
			'signed-decimal'    : { mask : '99,999.999.999.999', type : 'reverse', defaultValue : '+000' },
			'signed-decimal-us' : { mask : '99,999.999.999.999', type : 'reverse', defaultValue : '+000' },
			'peso'    : { mask : '999.999999999999', type : 'reverse', defaultValue: '0000' },
			'dinheiro'    : { mask : '99.999999999999', type : 'reverse', defaultValue: '000' }
		};

});


function Utils(){
	this.ajax = function(action, param, success, method, typeRequeste){
		if(method == undefined)
			method = "post";
		
		if(typeRequeste == undefined)
			typeRequeste = "xml";
		
		var data = {
				action: action,
				typeRequest: typeRequeste
		};
		$.extend(data, param);
		$.ajax({
			
			
			url: '../../controller.xml.php',
			type: method,
			data: data,
			dataType: typeRequeste,
			success: success
		
			
		});
		
	};
	
	this.redirecionar = function(url) {
		window.location = url;
	};

	this.limparTabela = function(tabela) {
		var index = 0;
		$('tr', $(tabela)).each(function(cont) {

			if (cont > 0)
				$(this).remove();
		});
	};
	this.replaceAll = function(string, token, newtoken) {
		while (string.indexOf(token) != -1) {
			string = string.replace(token, newtoken);
		}
		return string;
	};
	
	this.gerarLinha = function(arrDados, columnId, prefixoId, index, showIdColum){
		
		if(showIdColum == undefined)
			showIdColum = false;
		
		tr = "<tr id="+prefixoId+"_"+arrDados[columnId]+" index='"+index+"' name='"+prefixoId+"'>";
		endTr = "</tr>";
		td = "<td>";
		endTd = "</td>";
		
		linha = "";
		
		linha += tr;
		for(i=0; i< arrDados.length; i++){
			linha += (columnId != i || showIdColum)? td + arrDados[i] + endTd:"";
		}
		linha += "<input type='hidden' value='"+arrDados[columnId]+"' name='hid"+prefixoId+"' />"
		return linha + endTr;
	};
	this.addArray = function(array, item){
		index = 0;
		$(array).each(function(){
			index++;
		});
		array[index] = item;
		array[length] = item;
	};
	this.redirecionar = function(url){
		window.location = url;
	};
};

if(ENVIROMENT!='test'){
	function alert(msg, title){
		
			if(title==undefined)
				title='Alert';
			showAlertPopup({
				msg: msg,
				title:title,
				width: 350,
				buttons: {
					"Ok": function(){
						closeAlertPopup();
					}
				}
			});
		}
		
		
		
};


function showAlertPopup(objAlert, msg, clazz){
	var mensagem = "";
	if(clazz==undefined)
		clazz = "";
	if(msg != undefined){
		mensagem = msg;
	}
	
	else{
		if(objAlert.msg == undefined){
			mensagem = "Mensagem indefinida";
		}
		else{
			mensagem = objAlert.msg;
		}
	}
	
	$("#AlertDefaultFramework").remove();
	
	var mydiv =  "<div id=\"AlertDefaultFramework\" class=\""+clazz+"\" >&nbsp;<div class=\"msg-alert-modal-csframework\">"+mensagem+"</div></div>";

	$("body").append(mydiv);
	var width =parseFloat(objAlert.width);
	
	$("#AlertDefaultFramework").dialog({
		
		title : objAlert.title,
		buttons : objAlert.buttons,
		hide: "drop",
		modal: true,
		
		width: width
			
	});

	
	
}
function closeAlertPopup(){
	$("#AlertDefaultFramework").dialog("close");
	
}
	
var utils = new Utils();


//  Mascaras 


function liberarNumeros(tecla){
	
	if((tecla > 47 && tecla < 58)){ 
		return true;
	}
	return false;
}

function liberarEspaco(tecla){
	if (tecla==32)
		return true;
	return false;
}

function liberarDelete(tecla){
	if(tecla == 8)
		return true;
	return false;
}

function liberarPontosNaoEspeciais(tecla){
	if((tecla > 39 && tecla < 48) || tecla == 37 ||	tecla == 59 ||
			tecla== 58 ||  tecla == 61 ||   tecla == 64)
		return true;
	return false;
}
function liberarEnter(tecla){
	if(tecla == 13)
		return true;
	return false;
}

function liberarLetras(tecla){
	if((tecla > 64 && tecla < 91) || (tecla > 93 && tecla < 123)){ 
		
		return true;
	}
	return false;
}


$(document).ready(function setDatePickerLanguage(){
	$.datepicker.setDefaults( 
		{dateFormat: 'dd/mm/yy',
			dayNames: ['Domingo', 'Segunda', 'Ter�a', 'Quarta', 'Quinta', 'Sexta', 'S�bado'] ,
			dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
			monthNames: ['Janeiro','Fevereiro','Marco','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
			monthNamesShort: ['Jan','Fev','Mar','abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']});
			}
);


function formatNumber(obj){
	
	var numero = parseFloat(obj.val());
	if( isNaN(numero)){
		numero = 0.00;
	}
	numero = numero.toFixed(2);
	obj.val(numero);
}



function acertaTxtValor(obj){

	if(obj.val() == ""){
		
		obj.val("0.00");
	}
	formatNumber(obj);
}


function mascara(o,f){
//	alert(maiusculo == f);
    if(f == maiusculo){
    	
    	$(o).keypress(defaultKeyPress);
		$(o).blur(defaultBlur);

    }
    else{
		v_obj=o;
	    v_fun=f;
	    setTimeout("execmascara()",1);
    }
}

function execmascara(){
    v_obj.value=v_fun(v_obj.value);
}

function leech(v){
    v=v.replace(/o/gi,"0");
    v=v.replace(/i/gi,"1");
    v=v.replace(/z/gi,"2");
    v=v.replace(/e/gi,"3");
    v=v.replace(/a/gi,"4");
    v=v.replace(/s/gi,"5");
    v=v.replace(/t/gi,"7");
    return v;
}

function soNumeros(v){
	v=v.replace(/[^0123456789]/g,"");
    return v;
}




function maiusculo(v){
	v=v.toUpperCase(); 
	return v;
}

function tiraVirgula(v){
	v=v.replace(/[,]/g,".");
	 return v;
}

function defaultKeyPress(event){
	
	var tecla = (event.which);
//	alert(tecla)
	return (liberarNumeros(tecla) || liberarLetras(tecla) || liberarDelete(tecla) || liberarEspaco(tecla) || liberarPontosNaoEspeciais(tecla) || tecla==0);
	
	
}


function defaultBlur(event){
	$(this).val($(this).val().toUpperCase());
	$(this).val($.trim($(this).val()));
}


function TopMessage(){
	this.t = "";
	this.message = "";
	this.isLoading = false;
	this.ramdon = Math.round( Math.random());
	this.clazz = "topMessage a" + this.ramdon;
	this.clazzJ ="." + this.clazz.replace(" ", ".");
	this.t1 = "";
	
	
	
	this.showTopMessage = function(){
		var thizz = this;
		var div = "<div class='"+this.clazz+"'><div> " + this.message + "</div></div>";
		$('body').append(div);
		$(this.clazzJ).fadeIn("fast", function (){
			if(thizz.isLoading == false){
				thizz.t = setTimeout("autoCloseTopMenu('"+thizz.clazzJ+"');",3000);
			}
				
		});
	};
	
	this.changeTopMessage = function (){
		var thizz = this;
		$(this.clazzJ+" div").html(this.message);
		
		thizz.t = clearTimeout();
		$(this.clazzJ).fadeIn("fast", function (){
			if(thizz.isLoading == false){
//				alert(thizz.clazzJ);
				thizz.t = setTimeout("autoCloseTopMenu('"+thizz.clazzJ+"');", 3000);
			}
				
		});
	};
	
	
}
function autoCloseTopMenu(obj){
//	alert(obj);
	$(obj).fadeOut('fast', function (){
		$(obj).remove();
	});
	
}