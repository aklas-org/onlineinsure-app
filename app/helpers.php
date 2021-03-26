<?php

function currency($value)
{
    return number_format($value / 100, 2);
}
