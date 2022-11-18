<?php

$input['harga_super'] = str_replace('.', '', $input['harga_super']);
$input['tonase_super'] = str_replace('.', '', $input['tonase_super']);

$input['total_biaya_beli'] = $input['harga_super'] * $input['tonase_super'];