<?php

include_once "../config/connection.php";
include_once "../utils/json_response.php";

class Book extends Database
{
    # GET
    public function findMany()
    {
        $sth = $this->dbh->query("SELECT * FROM $this->table");

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    # POST
    public function create(array $data)
    {
        ["name" => $name, "description" => $description, "author" => $author]  = $data;

        $sth = $this->dbh->prepare("
            INSERT INTO $this->table (name, description, author)
            VALUES (:name, :description, :author) RETURNING *
        ");

        $sth->bindValue(":name", $name, PDO::PARAM_STR);
        $sth->bindValue(":description", $description, PDO::PARAM_STR);
        $sth->bindValue(":author", $author, PDO::PARAM_STR);

        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    # GET UNIQUE
    public function findUnique(string $id)
    {
        $this->uuidIsValid($id);

        $sth = $this->dbh->prepare("SELECT * FROM $this->table WHERE id = :id");
        $sth->bindValue(':id', $id, PDO::PARAM_STR);
        $sth->execute();

        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    # PATCH
    public function update(string $id, array $data)
    {
        $this->uuidIsValid($id);
        $clauses = [];

        foreach ($data as $key => $value) {
            array_push($clauses, "$key = :$key");
        }
        $sth = $this->dbh->prepare(sprintf(
            "UPDATE $this->table SET %s WHERE id = :id RETURNING *",
            implode(", ", $clauses)
        ));

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value, PDO::PARAM_STR);
        }
        $sth->bindValue(":id", $id, PDO::PARAM_STR);

        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    # DELETE
    public function delete(string $id)
    {
        $this->uuidIsValid($id);

        $sth = $this->dbh->prepare("DELETE FROM $this->table WHERE id = :id");
        $sth->bindValue(":id", $id, PDO::PARAM_STR);
        $sth->execute();

        return $sth->rowCount() > 0;
    }

    # Verify UUID is valid
    private function uuidIsValid(string $id)
    {
        $regex = "/^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i";

        if (!preg_match($regex, $id)) {
            json_response(400, ["message" => "The id parameter is not a valid UUID"]);
        }
    }
}
