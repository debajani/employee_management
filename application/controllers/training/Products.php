<?php
class Products extends CI_Controller {

    public function shoes($sandals, $id)
    {
        echo $sandals;
        echo $id;
    }
    public function _remap()
{
  echo "THIS IS THE REMAP FUNCTION";
}
}
?> 