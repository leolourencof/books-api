<?php

include_once "../class/books.php";
include_once "../utils/json_response.php";
include_once "../utils/route_not_found.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $book = new Book();
    $response = $book->findMany();

    json_response(200, $response);
}
routeNotFound();
