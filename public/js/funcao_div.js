/*DESENVOLVIDO POR FRANCISCO DIA 27/03*/

//OCUTANDO DIV
$(document).ready(function(){
	$('#compoe_renda').hide();
	$('#referencia_imob').hide();
	$('#referencia_com').hide();	
	$('#referencia_banco').hide();	
	$('#referencia_pes').hide();
	$('#referencia_imoveis').hide();
	$('#referencia_veiculo').hide();

		
});

    function optRendaConjuge(){
    	//recebendo o click
        var option = document.getElementById("compoeRenda_conjuge");
        if(option.checked == true){
            document.getElementById("compoe_renda").style.display ="block";          
        }
        else{
            document.getElementById("compoe_renda").style.display ="none";
            
        }
        
    } //FIM DA FUNÇÃO
    
function optRefImobiliaria(){
	//recebendo o click
	var option = document.getElementById("ref_imobiliaria");
    if(option.checked == true){
        document.getElementById("referencia_imob").style.display ="block";          
    }
    else{
        document.getElementById("referencia_imob").style.display ="none";
        
    }
}    

function optRefComerciais(){
	//recebendo o click
    var option = document.getElementById("ref_comerciais");
    if(option.checked == true){
        document.getElementById("referencia_com").style.display ="block";          
    }
    else{
        document.getElementById("referencia_com").style.display ="none";        
    }	
}  
function optRefPessoais(){
	//recebendo o click
    var option = document.getElementById("ref_pessoais");
    if(option.checked == true){
        document.getElementById("referencia_pes").style.display ="block";          
    }
    else{
        document.getElementById("referencia_pes").style.display ="none";
        
    }
}    
function optRefBancarias(){
	//recebendo o click
    var option = document.getElementById("ref_bancarias");
    if(option.checked == true){
        document.getElementById("referencia_banco").style.display ="block";          
    }
    else{
        document.getElementById("referencia_banco").style.display ="none";
        
    }
} 

function optRefImoveis(){
		//recebendo o click
	var option = document.getElementById("ref_imoveis");
    if(option.checked == true){
        document.getElementById("referencia_imoveis").style.display ="block";          
    }
    else{
        document.getElementById("referencia_imoveis").style.display ="none";
        
    }
}

function optRefVeiculos(){
		//recebendo o click
	var option = document.getElementById("ref_veiculos");
    if(option.checked == true){
        document.getElementById("referencia_veiculo").style.display ="block";          
    }
    else{
        document.getElementById("referencia_veiculo").style.display ="none";
        
    }	
}
/*PÁGINA DO FIADOR*/
$(document).ready(function(){
	$('#rendaFiadorEsposa').hide();
});
function rendaFiadorConjuge(){
		//recebendo o click
	var option = document.getElementById("rendaConjugeFiador");
    if(option.checked == true){
        document.getElementById("rendaFiadorEsposa").style.display ="block";          
    }
    else{
        document.getElementById("rendaFiadorEsposa").style.display ="none";
        
    }	
}
