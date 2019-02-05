@component('mail::message')
         
Ha creado su cuenta, satisfactoriamente.

Nombre: {{ $client->name }} 
<br>
Usuario: {{ $client->email }}
<br>  
   
 

Gracias
<br>
                 
@endcomponent      