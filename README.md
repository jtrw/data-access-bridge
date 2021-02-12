# Data Access Bridge

Bridge for DataBase and Api

Package Create endpoint for search in DB

Example JsonRPC
```json
{
    "jsonrpc": "2.0",
    "method": "select",
    "params": {
        "select": [
            "pages.*"
        ],
        "table": "pages",
        "search": {
            "pages.id&>=": 1
        },
        "join": [
            "LEFT JOIN pages_types ON pages_types.id = pages.type_id"
        ],
        "order": "pages.id DESC"
    },
    "id": 3
}
```

Result:
```json
[
    {
        "id": "2",
        "title": "Where does it come from?",
        "description": "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old",
        "text": "Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.",
        "type_id": "1",
        "created_at": "2021-02-12 15:27:33",
        "updated_at": "2021-02-12 15:27:35"
    },
    {
        "id": "1",
        "title": "Lorem Ipsum",
        "description": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",
        "text": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
        "type_id": "1",
        "created_at": "2021-02-12 15:25:49",
        "updated_at": "2021-02-12 15:25:53"
    }
]
```