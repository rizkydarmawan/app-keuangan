<?php

function kapital($value)
{
	return strtoupper($value);
}
function rupiah($value)
{
	return "Rp. ".number_format($value,2,",",".");
}
function tanggal ($tgl)
{
	$date = new DateTime($tgl);
	return $date->format('d  M Y');
}
?>