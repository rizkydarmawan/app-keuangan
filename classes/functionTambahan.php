<?php

function kapital($value)
{
	return strtoupper($value);
}
function rupiah($value)
{
	return "Rp. ".number_format($value,2,",",".");
}
?>