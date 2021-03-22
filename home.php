<?php 
/**
 * Plugin Name:       Woo Fail2Ban
 * Description:       Log failed woocommerce order to allow fail2ban to block spammers
 * Version:           1.0
 * Author:            Humberto Rodrigues
 * Author URI:        https://humbertorodrigues.com
 */

add_action('woocommerce_order_status_changed', 'fail2ban_ip_register',25);
function fail2ban_ip_register( $order_id ) {
    $order = wc_get_order( $order_id );
    
    $order_data = $order->get_data();
    $order_status = $order_data['status'];
    if($order_status == "failed"){
        saveIP();
    }
}
function saveIP(){
    $str = date("Y-m-d H:i:s")." Failed ".$_SERVER['REMOTE_ADDR'].PHP_EOL;
    $logfile = __DIR__."/ip_failed_orders.log";
    file_put_contents($logfile, $str, FILE_APPEND);
}

?>