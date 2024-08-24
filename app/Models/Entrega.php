<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;


class Entrega {

    protected $fillable = [
        'UserID',
        'Address',
        'Price',
        'Entregue',
        'SaiuParaEntrega',
        'EntregaCancelada'
    ];

    protected $table = 'entregas';

}
