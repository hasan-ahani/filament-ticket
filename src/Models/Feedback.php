<?php

namespace HasanAhani\FilamentTicket\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public function getTable()
    {
        return config('filament-ticket.table_names.feedbacks', 'feedbacks');
    }
}
