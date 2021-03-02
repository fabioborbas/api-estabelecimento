<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class estabelecimento extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];
    protected $appends = ['links'];


    public function clientes()
    {
        return $this->hasMany(clientes::class);
    }

    public function getLinksAttribute(): array
    {
        return [
            'self' => '/api/estabelecimento/' . $this->id,
            'clientes' => '/api/clientes/' . $this->id . '/clientes'
        ];
    }
}