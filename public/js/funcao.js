$(document).ready(function(){
	$('#reload').hide();
	$('#modalLoad').hide();
	$("#e_c").hide();
	$("#guarantor").hide();
	$("#load_upload_ambiente").hide();
	$("#sucesso_upload_proposal").hide();	
	$("#modal_reload").hide();
	$("#fiador_ec").hide();
	$("#sec_click").hide();
	
	//MOSTRADNO A DIV GUARANTOR SE O VALOR DO BANCO FOR FIADOR
	if($("#tipo_garantia").val() == "Fiador"){
		$("#guarantor").show();
	}else{
		$("#guarantor").hide();
	}
	//MOSTRADNO A DIV GUARANTOR SE O VALOR DO BANCO FOR ESTADO CIVIL
	if($("#estado_civil").val() == "Casado" || $("#estado_civil").val() == "União Estável" ){
		$("#e_c").show();
	}else{
		$("#e_c").hide();
	}
		
	
	  $('[data-toggle="popover"]').popover({
	  	placement : 'top',
	    html : true,
	  	title : 'Importante. <a href="#" class="close" data-dismiss="alert">×</a>'
	  });

	   $(document).on("click", ".popover .close" , function(){
        $(this).parents(".popover").popover('hide');
    });
	   // $("#guarantor").show();
});
 
// quando o documento estiver pronto, faça.
$(function(){
    /*
        Keyup é um evento que é disparado sempre que o usuário tirou o dedo da tecla.
        Ou seja, não queremos fazer nada quando o usuário clica, somente quando ele solta
        a tecla.
    */
    $("#obs_proposta").keyup(function(event){
 
        // abaixo algumas variáveis que iremos utilizar.
 
        // pega a span onde esta a quantidade máxima de caracteres.
        var target    = $("#resta");
 
        // pego pelo atributo title a quantidade maxima permitida.
        var max        = target.attr('title');
 
        // tamanho da string dentro da textarea.
        var len     = $(this).val().length;
 
        // quantidade de caracteres restantes dentro da textarea.
        var remain    = max - len;
 
        // caso a quantidade dentro da textarea seja maior que
        // a quantidade maxima.
        if(len > max)
        {
            // abaixo vamos pegar tudo que tiver na string e limitar
            // a quantidade de caracteres para o máximo setado.
            // isso significa que qualquer coisa que seja maior que
            // o máximo será cortado.
            var val = $(this).val();
            $(this).val(val.substr(0, max));
 
            // setamos o restante para 0.
            remain = 0;
        }
 
        // atualizamos a quantidade de caracteres restantes.
        target.html(remain);
 
    });
 
});
//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) { 
	var boleanoMascara; 
	
	var Digitato = evento.keyCode;
	exp = /\-|\.|\/|\(|\)| /g
	campoSoNumeros = campo.value.toString().replace( exp, "" ); 
   
	var posicaoCampo = 0;	 
	var NovoValorCampo="";
	var TamanhoMascara = campoSoNumeros.length;; 
	
	if (Digitato != 8) { // backspace 
		for(i=0; i<= TamanhoMascara; i++) { 
			boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
								|| (Mascara.charAt(i) == "/")) 
			boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
								|| (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
			if (boleanoMascara) { 
				NovoValorCampo += Mascara.charAt(i); 
				  TamanhoMascara++;
			}else { 
				NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
				posicaoCampo++; 
			  }	   	 
		  }	 
		campo.value = NovoValorCampo;
		  return true; 
	}else { 
		return true; 
	}
}

//valida numero inteiro com mascara
function mascaraInteiro(){
	if (event.keyCode < 48 || event.keyCode > 57){
		event.returnValue = false;
		return false;
	}
	return true;
}

function MascaraData(data){
	if(mascaraInteiro(data)==false){
		event.returnValue = false;
	}	
	return formataCampo(data, '00/00/0000', event);
}
//valida data
function ValidaData(data){
	var exp = /\d{2}\/\d{2}\/\d{4}/
	if(!exp.test(data.value)){
		data.value = "";
		alert('Data Invalida!');
		data.select();		
	}
	   }
	   
//adiciona mascara ao telefone
function MascaraTelefone(tel){	
	if(mascaraInteiro(tel)==false){
		event.returnValue = false;
	}	
	return formataCampo(tel, '(00) 0000-0000', event);
}	
//adiciona mascara de cnpj
function MascaraCNPJ(cnpj){
	if(mascaraInteiro(cnpj)==false){
		event.returnValue = false;
	}	
	return formataCampo(cnpj, '00.000.000/0000-00', event);
}   
function validaCampos(){
	
	/*if (form1.txtIndice.value == ""){
		alert("Campos obrigatórios faltando!");
		form1.txtIndice.focus();
		return false;
	}*/

	if(document.getElementById("proposal_reference").value.length < 3){
		alert('Por favor, preencha o campo de Endereço ou código do Imóvel');
		document.getElementById("proposal_reference").focus();
		$('#proposal_reference').css("border", "1px solid red");
		return false;
	}else if(document.getElementById("proposal_name").value.length < 3){
		alert('Preencha o campo do seu Nome Completo');
		document.getElementById("proposal_name").focus();
		$('#proposal_name').css("border", "1px solid red");
	return false;
	}else if(document.getElementById("cpf").value.length < 3){
		alert('Preencha o campo do seu CPF');
		document.getElementById("cpf").focus();
		$('#cpf').css("border", "1px solid red");
	return false;
	}else if(document.getElementById("proposal_filiation").value.length < 3){
		alert('Preencha o campo de Filiação');
		document.getElementById("proposal_filiation").focus();
		$('#proposal_filiation').css("border", "1px solid red");
	return false;
	}else if(document.getElementById("email_proponente").value.length < 3){
		alert('Preencha o campo de E-mail');
		document.getElementById("email_proponente").focus();
		$('#email_proponente').css("border", "1px solid red");
	return false;
	};
      
}

		//VALIDAÇÃO E FORMATAÇÃO DO CPF
		//FONTE: GUI
		function validaCPF(cpf)   
		{  
		  erro = new String;  
		  
		    if (cpf.value.length == 11)  
		    {     
		            cpf.value = cpf.value.replace('.', '');  
		            cpf.value = cpf.value.replace('.', '');  
		            cpf.value = cpf.value.replace('-', '');  
		  
		            var nonNumbers = /\D/;  
		      
		            if (nonNumbers.test(cpf.value))   
		            {  
		                    erro = "A verificacao de CPF suporta apenas números!";   
		            }  
		            else  
		            {  
		                    if (cpf.value == "00000000000" ||   
		                            cpf.value == "11111111111" ||   
		                            cpf.value == "22222222222" ||   
		                            cpf.value == "33333333333" ||   
		                            cpf.value == "44444444444" ||   
		                            cpf.value == "55555555555" ||   
		                            cpf.value == "66666666666" ||   
		                            cpf.value == "77777777777" ||   
		                            cpf.value == "88888888888" ||   
		                            cpf.value == "99999999999") {  
		                              
		                            erro = "Número de CPF inválido!"  
		                    }  
		      
		                    var a = [];  
		                    var b = new Number;  
		                    var c = 11;  
		  
		                    for (i=0; i<11; i++){  
		                            a[i] = cpf.value.charAt(i);  
		                            if (i < 9) b += (a[i] * --c);  
		                    }  
		      
		                    if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }  
		                    b = 0;  
		                    c = 11;  
		      
		                    for (y=0; y<10; y++) b += (a[y] * c--);   
		      
		                    if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }  
		      
		                    if ((cpf.value.charAt(9) != a[9]) || (cpf.value.charAt(10) != a[10])) {  
		                        erro = "Número de CPF inválido.";  
		                    }  
		            }  
		    }  
		    else  
		    {  
		        if(cpf.value.length == 0)  
		            return false  
		        else  
		            erro = "Número de CPF inválido.";  
		    }  
		    if (erro.length > 0) {  
		            alert(erro);  
		            cpf.focus();  
		            return false;  
		    }     
		    //return true; 
	    	//SE O RETORNO FOR VERDADEIRO O CAMPO FICARÁ MASCARADO CHAMANDO A FUNCAO FORMATACPF
		    formataCPF(cpf);  
		}  
  	
	//envento onkeyup  
	function maskCPF(CPF) {  
	    var evt = window.event;  
	    kcode=evt.keyCode;  
	    if (kcode == 8) return;  
	    if (CPF.value.length == 3) { CPF.value = CPF.value + '.'; }  
	    if (CPF.value.length == 7) { CPF.value = CPF.value + '.'; }  
	    if (CPF.value.length == 11) { CPF.value = CPF.value + '-'; }  
	}  
	  
	// evento onBlur  
	function formataCPF(CPF)  
	{  
	    with (CPF)  
	    {  
	        value = value.substr(0, 3) + '.' +   
	                value.substr(3, 3) + '.' +   
	                value.substr(6, 3) + '-' +  
	                value.substr(9, 2);  
	    }  
	}  
	function retiraFormatacao(CPF)  
	{  
	    with (CPF)  
	    {  
	        value = value.replace (".","");  
	        value = value.replace (".","");  
	        value = value.replace ("-","");  
	        value = value.replace ("/","");  
	    }  
	}  

	//valida o CNPJ digitado
	//http://www.fabiobmed.com.br/excelente-codigo-para-mascara-e-validacao-de-cnpj-cpf-cep-data-e-telefone/
	function ValidarCNPJ(ObjCnpj){
	        var cnpj = ObjCnpj.value;
	        var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
	        var dig1= new Number;
	        var dig2= new Number;
	
	        exp = /\.|\-|\//g
	        cnpj = cnpj.toString().replace( exp, "" ); 
	        var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));
	
	        for(i = 0; i<valida.length; i++){
	                dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);  
	                dig2 += cnpj.charAt(i)*valida[i];       
	        }
	        dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
	        dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));
	
	        if(((dig1*10)+dig2) != digito){
	        	 alert('CNPJ Invalido!');
	        	ObjCnpj.focus();
	        }    
	       
	
	}
	/*IRA VERIFICAR SE O PROTENSO INQUILINO ESTA DE ACORDO COM OS TERMOS PARA PASSAR PARA A TERMINAR O CADASTRO*/
	function validaTermos() {

		
		var x = document.getElementsByTagName("input");
  	    var i = 0;
  	    var c = new Array();
  	    a = 0;
  	    for (i = 0; i <= x.length - 1; i++) {
  	        if (x[i].type == "checkbox" && x[i].id == "acordo") {
  	            c[a] = x[i];
  	            a++;
  	        }
  	    }
  	    i = 0;
  	    var checked = false;
  	    for (i = 0; i <= c.length - 1; i++) {
  	        if (c[i].checked == true) {
  	            checked = true;
  	            break;
  	        }
  	    }
  	    
  	    if (!checked) {
  	        alert("Para enviar a proposta você precisa esta de acordo com os termos.");
  	         
  	        return false;
  	    }  else {
  	    	
  	    	document.form1.submit();
  	        return true;
		
  	    }
  	}
  
	function validaTermos() {
		
		var x = document.getElementsByTagName("input");
  	    var i = 0;
  	    var c = new Array();
  	    a = 0;
  	    for (i = 0; i <= x.length - 1; i++) {
  	        if (x[i].type == "checkbox" && x[i].id == "acordo") {
  	            c[a] = x[i];
  	            a++;
  	        }
  	    }
  	    i = 0;
  	    var checked = false;
  	    for (i = 0; i <= c.length - 1; i++) {
  	        if (c[i].checked == true) {
  	            checked = true;
  	            break;
  	        }
  	    }

  	    if (!checked) {
  	        alert("Para enviar a proposta você precisa esta de acordo com os termos.");
  	         
  	        return false;
  	    }  else {
  	    	
  	    	
  	    	document.form1.submit();
  	        return true;
		
  	    }
  	}
  	
	function validaTermosFiador() {
		
		 var x = document.getElementsByTagName("input");
  	    var i = 0;
  	    var c = new Array();
  	    a = 0;
  	    for (i = 0; i <= x.length - 1; i++) {
  	        if (x[i].type == "checkbox" && x[i].id == "acordo") {
  	            c[a] = x[i];
  	            a++;
  	        }
  	    }
  	    i = 0;
  	    var checked = false;
  	    for (i = 0; i <= c.length - 1; i++) {
  	        if (c[i].checked == true) {
  	            checked = true;
  	            break;
  	        }
  	    }
  	    
  	    	    if (!checked) {
  	        alert("Para enviar a proposta você precisa esta de acordo com os termos.");
  	         
  	        return false;
  	    }  else {
  	    	
  	    	 $('#reload').show(); // aparece o div
  	    	document.form1.submit();
  	        return true;
		
  	    }
  	}  	
//FUNCAO PARA O ALERTA ESTILIZADO
var ALERT_TITLE = "Ops!";
var ALERT_BUTTON_TEXT = "Ok";

if(document.getElementById) {
    window.alert = function(txt) {
        createCustomAlert(txt);
    };
};

function createCustomAlert(txt) {
    d = document;

    if(d.getElementById("modalContainer")) return;

    mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
    mObj.id = "modalContainer";
    mObj.style.height = d.documentElement.scrollHeight + "px";

    alertObj = mObj.appendChild(d.createElement("div"));
    alertObj.id = "alertBox";
    if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
    alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";
    alertObj.style.visiblity="visible";

    h1 = alertObj.appendChild(d.createElement("h1"));
    h1.appendChild(d.createTextNode(ALERT_TITLE));

    msg = alertObj.appendChild(d.createElement("h5"));
    //msg.appendChild(d.createTextNode(txt));
    msg.innerHTML = txt;

    btn = alertObj.appendChild(d.createElement("a"));
    btn.id = "closeBtn";
    btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
    btn.href = "#";
    btn.focus();
    btn.onclick = function() { removeCustomAlert();return false; }

    alertObj.style.display = "block";

};

function removeCustomAlert() {
    document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
};
/*PARA MASCARAR OS TELEFONES PARA 9 DIGITOS*/
/* Máscaras ER */
function mascara(o,f){
    v_obj=o;
    v_fun=f;
    setTimeout("execmascara()",1);
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value);
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	
	id('celular1').onkeyup = function(){
		mascara(this, mtel);
	};
	id('celular2').onkeyup = function(){
		mascara(this, mtel);
	};
	id('guarantor_cel1').onkeyup = function(){
		mascara(this, mtel);
	};
	id('guarantor_cel2').onkeyup = function(){
		mascara(this, mtel);
	};
	id('conjuge_celular1').onkeyup = function(){
		mascara(this, mtel);
	};
	id('conjuge_celular2').onkeyup = function(){
		mascara(this, mtel);
	};
	id('celular_imobiliaria').onkeyup = function(){
		mascara(this, mtel);
	};	
	id('celular2_imobiliaria').onkeyup = function(){
		mascara(this, mtel);
	};
	id('celular_comercial').onkeyup = function(){
		mascara(this, mtel);
	};
	id('celular2_comercial').onkeyup = function(){
		mascara(this, mtel);
	};
	id('celular_pessoal').onkeyup = function(){
		mascara(this, mtel);
	};
	id('celular2_pessoal').onkeyup = function(){
		mascara(this, mtel);
	};
	id('juridico_celular_imobiliaria').onkeyup = function(){
		mascara(this, mtel);
	};	
	id('juridico_celular2_imobiliaria').onkeyup = function(){
		mascara(this, mtel);
	};
	id('juridico_celular_comercial').onkeyup = function(){
		mascara(this, mtel);
	};
	id('juridico_celular2_comercial').onkeyup = function(){
		mascara(this, mtel);
	};
	id('juridico_celular_pessoal').onkeyup = function(){
		mascara(this, mtel);
	};
	id('juridico_celular2_pessoal').onkeyup = function(){
		mascara(this, mtel);
	};
	id('fone_rh_fiador').onkeyup = function(){
		mascara(this, mtel);
	};
	id('guarantor_phone_mobile').onkeyup = function(){
		mascara(this, mtel);
	};
	id('ember361').onkeyup = function(){
		mascara(this, mtel);
	};		
	id('').onkeyup = function(){
		mascara(this, mtel);
	};		
};
/*VALIDANDO EMAIL
 font:http://www.devmedia.com.br/validando-e-mail-em-inputs-html-com-javascript/26427*/
function validacaoEmail(field) { 
	usuario = field.value.substring(0, field.value.indexOf("@")); 
	dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length); 
	console.log(field.name);
	if ((usuario.length >=1) && (dominio.length >=3) && (usuario.search("@")==-1) && (dominio.search("@")==-1) && (usuario.search(" ")==-1) && (dominio.search(" ")==-1) && (dominio.search(".")!=-1) && (dominio.indexOf(".") >=1) && (dominio.lastIndexOf(".") < dominio.length - 1)) { 
		
		if(field.name == "proposal_email"){
			document.getElementById("proposal_email").innerHTML="<font color='blue'>E-mail válido </font>"; 
		}else if(field.name == "proposal_email_business"){
			document.getElementById("proposal_email_business").innerHTML="<font color='blue'>E-mail válido </font>"; 
		}
		
		//alert("E-mail valido"); 
		} else { 
				if(field.name == "proposal_email"){
				document.getElementById("proposal_email").innerHTML="<font color='red'>E-mail inválido </font>";
			 	alert("E-mail inválido"); 
				}else if(field.name == "proposal_email_business"){
					document.getElementById("proposal_email_business").innerHTML="<font color='red'>E-mail inválido </font>";
			 		alert("E-mail inválido"); 
				}
			
			 }
			 
	
}; 


/*PÁRA PÁGINA DO FIADOR*/
function verifica_fiador(){


if(form_guarantor_one.guarantor_type.value=="") {
		alert('Por favor, Informar o tipo do Cadastro');
		$("#guarantor_type").css("border", "1px solid red");
        document.getElementById("guarantor_type").focus(); 
        return false;  
        
   }else if(document.getElementById("guarantor_name").value.length < 3){
   		alert('Por favor, Informar o Nome Completo');
   		$("#guarantor_name").css("border", "1px solid red");
        document.getElementById("guarantor_name").focus(); 
        return false;    
        	
   }else if(form_guarantor_one.guarantor_cpf.value==""){
   		alert('Por favor, Informar o CPF');
   		$("#guarantor_cpf").css("border", "1px solid red");
        document.getElementById("guarantor_cpf").focus(); 
        return false; 
           	
   }else if(document.getElementById("guarantor_filiacion").value.length < 3){
   		alert('Por favor, preencher o campo Filiação');
   		$("#guarantor_filiacion").css("border", "1px solid red");
        document.getElementById("guarantor_filiacion").focus(); 
        return false;  
          	
   }else if(form_guarantor_one.guarantor_email.value==""){
   		alert('Por favor, preencher o campo E-mail');
   		$("#guarantor_email").css("border", "1px solid red");
        document.getElementById("guarantor_email").focus(); 
        return false;    

   }else if(form_guarantor_one.nome_proponente.value==""){
   		alert('Por favor, preencher o nome do Proponente');
        $("#nome_proponente").css("border", "1px solid red");
        document.getElementById("nome_proponente").focus();
        return false;    	
   };
   
//    //verifica o estado civil do conjuge
	if((form_guarantor_two.estado_civil.value=="Casado") || (form_guarantor_two.estado_civil.value=="União Estável")){
		
			document.getElementById("fiador_ec").style.display ="block";          
        }
        else{
            document.getElementById("fiador_ec").style.display ="none";            
      }
  
     if(form1.tipo_garantia.value=="Fiador") {
			
            document.getElementById("guarantor").style.display ="block";          
        }
        else{
            document.getElementById("guarantor").style.display ="none";            
      };
  
}

function validaFiadorJuridico(){
	if(form1.razao_social.value=="") {
		alert('Por favor, Informar a Razao Social');
        document.getElementById("razao_social").focus(); 
        return false;  
     }else if(form1.legal_cnpj.value==""){
     	alert('Por favor, Informar o CNPJ');
        document.getElementById("legal_cnpj").focus(); 
        return false; 
     	
     }else if(form1.email_legal.value==""){
     	alert('Por favor, Informar o E-mail');
        document.getElementById("email_legal").focus(); 
        return false; 
     	
     }else if(form1.legal_representantive_one.value==""){
     	alert('Por favor, Informar o Representante');
        document.getElementById("legal_representantive_one").focus(); 
        return false; 
     	
     }
}


//TIPOS DE GARANTIA	
$("#tipo_garantia").on('change', function(){
   console.log($("#tipo_garantia").val());
  	if($("#tipo_garantia").val() == "Outras") {
		//console.log(form1.tipo_garantia.value);
		alert('Por favor, Informar sua outra garantia no campo OBSERVAÇÃO!');
		document.getElementById("obs_proposta").focus(); 
   		return false;  
    };

	if($("#tipo_garantia").val() == "Fiador"){
	     	
	 	 $("#guarantor").show();

	}else{
		$("#guarantor").hide();
	}

});

//ESTADO CIVIL
$("#estado_civil").on('change', function(){
   
   if($("#estado_civil").val() == "Casado" || $("#estado_civil").val() == "União Estável" ){
   	 $("#e_c").show();
   	 $("#fiador_ec").show();
   	 
   }
});
