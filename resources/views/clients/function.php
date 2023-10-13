<?php
use App\Models\Machine;
use App\Models\Solarmachine;
use App\Models\Upsmachine;
 function getMachineNum($client): array{

    return [
        'nonsolar'=>$count=Machine::where('client_name', $client)->count(),
        'solar'=>$count=Solarmachine::where('client_name', $client)->count(),
        'ups'=>$count=Upsmachine::where('client_name', $client)->count(),
    ];

}