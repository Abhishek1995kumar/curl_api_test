<?php

function secure($value, $type)
{
    if (is_null($value)) {
        return NULL;
    }
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = env('ENCRYPTION_KEY');
    $secret_iv = md5(md5($secret_key));
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ($type == 'E') {
        $output = openssl_encrypt($value, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($type == 'D') {
        $output = openssl_decrypt(base64_decode($value), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}




