<?php

$input['harga_super'] = str_replace('.', '', $input['harga_super']);
$input['tonase_super'] = str_replace('.', '', $input['tonase_super']);
$input['harga_bulat'] = str_replace('.', '', $input['harga_bulat']);
$input['tonase_bulat'] = str_replace('.', '', $input['tonase_bulat']);
$input['harga_sortiran'] = str_replace('.', '', $input['harga_sortiran']);
$input['tonase_sortiran'] = str_replace('.', '', $input['tonase_sortiran']);

$input['total_super'] = $input['harga_super'] * $input['tonase_super'];
$input['total_bulat'] = $input['harga_bulat'] * $input['tonase_bulat'];
$input['total_sortiran'] = $input['harga_sortiran'] * $input['tonase_sortiran'];

$input['total_biaya_beli'] = $input['total_super'] + $input['total_bulat'] + $input['total_sortiran'];
$input['total_tonase_beli'] = $input['tonase_super'] + $input['tonase_bulat'] + $input['tonase_sortiran'];