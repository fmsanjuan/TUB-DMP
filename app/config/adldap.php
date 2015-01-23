<?php

/* MANDATORY: account_suffix, base_dn, and domain_controllers
 * 
 */

return array(
    'account_suffix' => "@tu-berlin.de",
    'domain_controllers' => array("ldap.tu-berlin.de"), // An array of domains may be provided for load balancing.
    'base_dn' =>        'DC=domain,DC=local',
    'admin_username' => 'svc-depositonce',
    'admin_password' => 'a3L.27fc',
    //'real_primary_group' => true, // Returns the primary group (an educated guess).
    'use_ssl' => true, // If TLS is true this MUST be false.
    'use_tls' => false, // If SSL is true this MUST be false.
    //'recursive_groups' => true,
);