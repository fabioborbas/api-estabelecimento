<?php
namespace App\Http\Controllers;

use App\estabelecimento;

class EstabelecimentoController extends BaseController
{
    public function __construct()
    {
        $this->classe = estabelecimento::class;
    }
}
