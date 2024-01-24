<?php

require_once "../utils/json_response.php";

function routeNotFound()
{
    json_response(404, ["message" => "Cannot {$_SERVER["REQUEST_METHOD"]} {$_SERVER["REQUEST_URI"]}"]);
}
