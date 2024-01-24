<?php

function json_response(int $code, array $data = null)
{
    http_response_code($code);

    if ($data || is_array($data)) {
        echo json_encode($data);
    }
    exit;
}
