<?php

function config($file)
{
    return include __DIR__ . "/config/{$file}.php";
}
