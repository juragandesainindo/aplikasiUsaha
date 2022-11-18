<?php

$input['harga_jual'] = str_replace('.', '', $input['harga_jual']);
$input['tonase_jual'] = str_replace('.', '', $input['tonase_jual']);

$input['total_jual'] = $input['harga_jual'] * $input['tonase_jual'];