<?php

include_once "../class/books.php";
include_once "../utils/json_response.php";
include_once "../utils/route_not_found.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $fields = ["name", "description", "author"];
    $missingKeys = array_diff($fields, array_keys($data ?? array()));

    if (!empty($missingKeys)) {
        json_response(400, ["message" => sprintf("Missing keys: %s", implode(", ", $missingKeys))]);
    }

    $book = new Book();
    $response = $book->create($data);

    json_response(201, $response);
}
routeNotFound();
