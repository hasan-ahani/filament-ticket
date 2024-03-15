<?php

namespace HasanAhani\FilamentTicket\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    public function getTable()
    {
        return config('filament-ticket.table_names.labels', 'labels');
    }
}
