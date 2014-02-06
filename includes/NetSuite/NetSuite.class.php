<?php 
require_once(dirname(__FILE__) .'/PHPToolkit/PHPToolkit/NetSuiteService.php');
require_once(dirname(__FILE__).'/../SureDone_Startup.php');

class NetSuite {
    protected $netSuite_service;
    protected $sd_username;
    protected $sd_token;

    public function __construct($sd_username, $sd_token) {
        $this->sd_username = $sd_username;
        $this->sd_token = $sd_token;
        $this->netSuite_service = new NetSuiteService();
    }

    public function sync_orders() {
        $i = 0;
        while(true) {
            $i++;
            $response = SureDone_Store::get_shipped_orders($i, 'shiptracking', $this->sd_token, $this->sd_username);
            $orders = json_decode($response);
            if (!$orders) {
                break;
            }
            var_dump($response);
        }
    }
}
?>