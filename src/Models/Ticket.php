<?php
namespace HasanAhani\FilamentTicket\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;


    public function messages():HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function department():BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function getTable()
    {
        return config('filament-ticket.table_names.tickets', 'tickets');
    }
}
