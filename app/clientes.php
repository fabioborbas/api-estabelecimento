<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome','email', 'estabelecimento_id'];
    protected $appends = ['links'];

    public function estabelecimento()
    {
        return $this->belongsTo(estabelecimento::class);
    }

    public function getLinksAttribute(): array
    {
        return [
            'self' => '/api/clientes/' . $this->id,
            'estabelecimento' => '/api/estabelecimento/' . $this->estabelecimento_id
        ];
    }
}
