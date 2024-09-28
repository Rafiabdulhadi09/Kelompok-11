<?php
function formatRupiah($nominal)
{
  return "Rp " . number_format((int)$nominal, 0, ',', '.');
}
