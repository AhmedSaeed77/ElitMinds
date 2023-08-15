<?php


namespace App\Payment;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Paytabscom\Laravel_paytabs\Facades\paypage;

class PayTabs extends paypage
{

    public function create_pay_page()
    {
        $this->paytabs_core->set99PluginInfo('Laravel',8,'1.4.0');
        $pp_params = $this->paytabs_core->pt_build();
        $response = $this->paytabs_api->create_pay_page($pp_params);
        return $response;
    }

}
