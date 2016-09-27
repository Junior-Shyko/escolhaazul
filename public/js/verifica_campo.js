
//FUNCAO PARA MOSTRAR O LOAD APOS O CLICK
function mostrar_load(){
	if(form1.user_name.value == ""){
		alert('O Campo Nome Completo ou Razão Social deve está preenchido');
		//document.getElementById("info_nome").innerHTML="<span color='red'>O preenchimento do Nome é Obrigatório</span>"; 
		$('#nome_cadastro').focus();

//document.getElementById("proposal_email").innerHTML="<font color='red'>E-mail inválido </font>";
	}else if(form1.user_email.value == ""){
		alert('O preenchiemnto do E-mail é Obrigatório');
		//document.getElementById("info_email").innerHTML="<span color='red'>O preenchiemnto do E-mail é Obrigatório</span>"; 
		
		$('#email_cadastro').focus();
//document.getElementById("proposal_email").innerHTML="<font color='red'>E-mail inválido </font>";
	}else if(form1.user_password.value == ""){

		//document.getElementById("info_fone").innerHTML="<span color='red'>O preenchimento do Telefone é Obrigatório</span>"; 
		alert('O preenchimento do Telefone é Obrigatório');
		$('#user_password').focus();
//document.getElementById("proposal_email").innerHTML="<font color='red'>E-mail inválido </font>";
	}else{

		//mostra a div e envia o formulario
		//$('#load_cad').show();
		document.form1.submit();
	}
	

}

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