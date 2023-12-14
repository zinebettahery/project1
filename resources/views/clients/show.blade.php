<h1> les informations du client</h1>

@foreach ($clients as $client)


<li>
    {{ $client->id_client }} 
    {{ $client->nom_client }} 
    {{ $client->email }} 
    {{$client->q}}
    
    {{$client->date_com}}
    {{$client->p}}
    
</li>



    



@endforeach

