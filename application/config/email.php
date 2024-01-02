<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
$config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'smtp.gmail.com', 
    'smtp_port' => 587,
    'smtp_user' => 'wdysarid1234@gmail.com', //alamat email yg di set up
    'smtp_pass' => 'vqniujiwwxcikxdf', //sandi yg di set up di app password
    'smtp_crypto' => 'tls', //can be 'ssl' or 'tls' for example
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);