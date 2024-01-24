<?php

include_once "../class/books.php";
include_once "../utils/json_response.php";
include_once "../utils/route_not_found.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] === "PATCH" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $data = json_decode(file_get_contents("php://input"), true);

    $allowedFields = ["name", "description", "author"];
    $data = array_intersect_key($data, array_flip($allowedFields));

    $book = new Book();
    $response = $book->update($id, $data);

    if (!$response) {
        json_response(404, ["message" => "Not found book"]);
    }
    json_response(200, $response);
}
routeNotFound();
