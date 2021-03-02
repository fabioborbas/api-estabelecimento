<?php
namespace App\Http\Controllers;

use App\clientes;

class ClientesController extends BaseController
{
    public function __construct()
    {
        $this->classe = clientes::class;
    }

    public function buscaPorClientes(int $estabelecimentoId)
    {
        $clientes = clientes::query()
            ->where('estabelecimento', $estabelecimentoId)
            ->paginate();

        return $clientes;
    }
}
