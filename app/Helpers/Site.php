<?php

function formatRupiah($angka)
{
    return "Rp. " . number_format($angka, 0, ',', '.');
}

function formatD($d)
{
    return \Carbon\Carbon::parse($d)->isoFormat('DD');
}

function formatTgl($tgl)
{
    return \Carbon\Carbon::parse($tgl)->isoFormat('DD-MM-Y');
}

function formatRupiahPdf($angka)
{
    return number_format($angka, 0, ',', '.');
}