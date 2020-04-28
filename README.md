# JSON-RPC 2.0 Client and Server with Laravel 7.0


##Example
-->
```json
 {"jsonrpc": "2.0", "method": "getPageById","params": {"page_uid": "f09f7c040131"}, "id": "54645"}
 
```
<--
```json
{
    "jsonrpc": "2.0",
    "result": {
        "id": 2,
        "title": "Index Page",
        "content": "Content",
        "description": "Description",
        "page_uid": "f09f7c040131",
        "created_at": "2020-04-23T12:52:11.000000Z",
        "updated_at": "2020-04-23T12:52:11.000000Z"
    },
    "id": "54645"
}
```


