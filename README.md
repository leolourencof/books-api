## Inicializando aplicação

OBS: Tenha o docker compose instalado em sua máquina

Utilize o comando:

```bash
   docker compose up
```

<br/>

<hr/>

# Books API

### GET ALL

`GET | http://127.0.0.1:8000/api/read.php`

RESPONSE 200

```json
[
  {
    "id": "7b3c4bbe-ca89-4d54-9c9e-aaceed841718",
    "name": "Código limpo: habilidades práticas do Agile software",
    "description": "Mesmo um código ruim pode funcionar. Mas se ele não for limpo, pode acabar com uma empresa de desenvolvimento.",
    "author": "Robert C. Martin"
  },
  {
    "id": "7b3c4bbe-ca89-4d54-9c9e-aaceed841718",
    "name": "Código limpo: habilidades práticas do Agile software",
    "description": "Mesmo um código ruim pode funcionar. Mas se ele não for limpo, pode acabar com uma empresa de desenvolvimento.",
    "author": "Robert C. Martin"
  }
]
```

<br/>

### CREATE

`POST | http://127.0.0.1:8000/api/create.php`

<details open>
 <summary>REQUEST BODY</summary>

```json
{
  "name": "Código limpo: habilidades práticas do Agile software",
  "description": "Mesmo um código ruim pode funcionar. Mas se ele não for limpo, pode acabar com uma empresa de desenvolvimento.",
  "author": "Robert C. Martin"
}
```
</details>

RESPONSE 201

```json
{
  "id": "fe444f23-cebe-415c-8f65-af1caa2d7127",
  "name": "Código limpo: habilidades práticas do Agile software",
  "description": "Mesmo um código ruim pode funcionar. Mas se ele não for limpo, pode acabar com uma empresa de desenvolvimento.",
  "author": "Robert C. Martin"
}
```

<br/>

### GET UNIQUE

`GET | http://127.0.0.1:8000/api/read_one.php?id={book_id}`

RESPONSE 200

```json
{
  "id": "7b3c4bbe-ca89-4d54-9c9e-aaceed841718",
  "name": "Código limpo: habilidades práticas do Agile software",
  "description": "Mesmo um código ruim pode funcionar. Mas se ele não for limpo, pode acabar com uma empresa de desenvolvimento.",
  "author": "Robert C. Martin"
}
```

<br/>

### PATCH

`PATCH | http://127.0.0.1:8000/api/update.php?id={book_id}`

<details open>
 <summary>REQUEST BODY</summary>

```json
{
  "name": "Harry Potter e a Pedra Filosofal",
  "description": "Harry Potter é um garoto cujos pais, feiticeiros, foram assassinados por um poderosíssimo bruxo quando ele ainda era um bebê. Ele foi levado, então, para a casa dos tios que nada tinham a ver com o sobrenatural.",
  "author": "J.K. Rowling"
}
```

</details>

RESPONSE 200

```json
{
  "id": "fe444f23-cebe-415c-8f65-af1caa2d7127",
  "name": "Harry Potter e a Pedra Filosofal",
  "description": "Harry Potter é um garoto cujos pais, feiticeiros, foram assassinados por um poderosíssimo bruxo quando ele ainda era um bebê. Ele foi levado, então, para a casa dos tios que nada tinham a ver com o sobrenatural.",
  "author": "J.K. Rowling"
}
```

<br/>

### DELETE

`DELETE | http://127.0.0.1:8000/api/delete.php?id={book_id}`

RESPONSE 204