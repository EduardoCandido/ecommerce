<?php

namespace Hcode\Model;
use Hcode\Model;
use Hcode\DB\Sql;

Class OrderStatus extends Model {

    const EM_ABERTO = 1;
    const AGUARDANDO_PAGAMENTO = 2;
    const PAGO = 3;
    const ENTREGUE = 4;

}


?>