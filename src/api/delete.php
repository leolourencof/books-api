<?php

include_once "../class/books.php";
include_once "../utils/json_response.php";
include_once "../utils/route_not_found.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] === "DELETE" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $book = new Book();
    $response = $book->delete($id);

    if (!$response) {
        json_response(404, ["message" => "Not found book"]);
    }
    json_response(204);
}
routeNotFound();
