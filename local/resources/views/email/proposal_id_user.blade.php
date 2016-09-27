@include('email.header_email')
       <table style="width:480px; margin-left:10px;height: 50px; background: #fff;">
       		<tr>
       			<td width="50%">Logo espindola</td>
       			<td width="50%">Mais informações</td>
       		</tr>
       </table>
       <table style="width:480px; margin-left:10px;height: 50px; background: #fff; text-align: center;">
       		<tr style="background:#244B97; height: 100px; color:#fff; font-family: monospace; ">
       			<td width="100%"><h1>Nova Proposta de Locação</h1></td>
       			
       		</tr>
       </table>
       <table style="width:480px; margin-left:10px;height: 50px; background: #fff;">
       		<tr style="color:#BBBBBB; font-family:sans-serif; padding: 10px; margin: 10px;">
       			<td width="100%"><h3>Olá</h3></td>       			
       		</tr>
       		<tr style="font-family:sans-serif;">
       			<td width="100%"><label>Uma proposta de locação foi feita para o imóvel:</label></td>       			
       		</tr>
       		
       </table>
        <table style="width:480px; margin-left:10px;height: 50px; background: #fff; text-align: center;">
       		<tr style="color:#F98B00; font-family:sans-serif; padding: 10px; margin: 10px;">
       			<td width="100%"><h3>Informações do Imóvel</h3></td>       			
       		</tr>
       		
       		<tr style="font-family:sans-serif; text-align: left;">
       			<td width="100%"><label>Referencia: {{ $proposal->proposal_reference }}</label></td>       			
       		</tr>
       		<tr style=" font-family:sans-serif;text-align: left;">
       			<td width="100%"><label>Tipo do Imóvel: {{ $proposal->proposal_time_contract }}</label></td>       			
       		</tr>
       		<tr style=" font-family:sans-serif;text-align: left;">
       			<td width="100%"><label>Finalidade:  {{ $proposal->proposal_finality }}</label></td>       			
       		</tr>
       		<tr style=" font-family:sans-serif;text-align: left;">
       			<td width="100%"><label>Prazo do Contrato:  {{ $proposal->proposal_time_contract }}</label></td>       			
       		</tr>
       		<tr style=" font-family:sans-serif;text-align: left;">
       			<td width="100%"><label>Tipo de Garantia:  {{ $proposal->proposal_type_guarantee }}</label></td>       			
       		</tr>
       		<tr style=" font-family:sans-serif;text-align: left;	">
       			<td width="100%"><label>Aluguel Proposto:  {{ $proposal->proposal_rent_proposed }}</label></td>       			
       		</tr>
       		<tr>
       			<td><hr></td>
       		</tr>
       		<tr >
       			<td> <h3>Corretor responsável pela proposta:</h3> </td>
       		</tr>
       		<tr style="color:#BBBBBB; font-family:sans-serif; padding: 10px; margin: 10px;">
       			<td> 
                              @foreach($user as $users)
                                    <h3>{{ $users->name }}</h3> 
                              @endforeach
                        </td>
       		</tr>
       		<tr>
       			<td><hr style="color: #c3c3c3; border: 2px groove;"></td>
       			
       		</tr>
       		<tr>
       			<td style="text-align: left;">
       				<h4>Equipe Espindola</h4>
       			</td>
       		</tr>
       </table>

  @include('email.footer_email')