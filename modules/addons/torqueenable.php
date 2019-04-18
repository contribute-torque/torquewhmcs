<?php

use Illuminate\Database\Capsule\Manager as Capsule;


function torqueEnable_config () {
    $result = Capsule::select("SELECT gateway, `value` FROM tblpaymentgateways WHERE setting = 'name' GROUP BY gateway");
    foreach($result as $row) {
        $pays[] = $row->gateway;
    }

    $pays = implode(',', $pays);
    
    $configarray = array(
        "name" => "Torque Enabler",
        "description" => "This module will allow you to disable fraud checking for Torque Payments.",
        "version" => "1.0",
        "author" => "Torque",
        "fields" => array(
            "option1" => array ("FriendlyName" => "Enable Checking", "Type" => "yesno", "Size" => "25",
                                  "Description" => "Enable checking for payment method by module", ),
            "option2" => array ("FriendlyName" => "Disable on Method", "Type" => "dropdown", "Options" => $pays,
                                  "Description" => "Select the Torque payment Gateway", ),
        )
    );

    return $configarray;
}

?>
