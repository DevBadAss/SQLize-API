# SQLize API

The SQLize API provides endpoints to interact with a SQL database, allowing you to initialize the database, create and delete tables, perform queries, insert and delete data, and more. It simplifies the process of executing SQL operations on the server-side.

## Usage

To use the SQLize API, send HTTP POST requests to the appropriate endpoints based on the desired action.

### Base URL

The base URL for accessing the API is `http://your-domain.com/sqlize-api/`. Replace `your-domain.com` with the actual domain where the API is hosted.

### API Actions

The following API actions are available:

- `init`: Initialize the database.
- `create_table`: Create a new table.
- `drop_table`: Delete an existing table.
- `delete_data`: Delete data from a table based on a condition.
- `query_table`: Perform a SELECT query on a table.
- `query_column`: Perform a SELECT query on a specific column of a table.
- `insert_data`: Insert data into a table.
- `alter_table`: Alter the structure of a table.
- `update_table`: Update data in a table based on a condition.
- `list_table`: Get a list of tables in the database.

### API Endpoints

The API endpoints are accessed by sending POST requests to the respective URLs.

- `POST /sqlize-api/?action=init`: Initialize the database.
- `POST /sqlize-api/?action=create_table`: Create a new table.
- `POST /sqlize-api/?action=drop_table`: Delete an existing table.
- `POST /sqlize-api/?action=delete_data`: Delete data from a table.
- `POST /sqlize-api/?action=query_table`: Perform a SELECT query on a table.
- `POST /sqlize-api/?action=query_column`: Perform a SELECT query on a specific column.
- `POST /sqlize-api/?action=insert_data`: Insert data into a table.
- `POST /sqlize-api/?action=alter_table`: Alter the structure of a table.
- `POST /sqlize-api/?action=update_table`: Update data in a table.
- `POST /sqlize-api/?action=list_table`: Get a list of tables.

### Request Headers

Make sure to set the following headers in your requests:

- `Content-Type: application/json`
- `Access-Control-Allow-Origin: *`
- `Access-Control-Allow-Method: POST`

### Request Examples

#### Initialize the Database

```php
POST /sqlize-api/?action=init
```

#### Create a Table

```php
POST /sqlize-api/?action=create_table

Body:
{
  "dbName": "<database name>",
  "table": "<table name>",
  "schema": "<table schema>"
}

```
#### Delete a Table

```php
POST /sqlize-api/?action=drop_table

Body:
{
  "dbName": "<database name>",
  "table": "<table name>"
}

```

#### Delete Data from a Table

```php
POST /sqlize-api/?action=delete_data

Body:
{
  "dbName": "<database name>",
  "table": "<table name>",
  "condition": "<condition>"
}

```

#### Perform a SELECT Query on a Table

```php
POST /sqlize-api/?action=query_table

Body:
{
  "dbName": "<database name>",
  "table": "<table name>"
}

```

#### Perform a SELECT Query on a Column

```php
POST /sqlize-api/?action=query_column

Body:
{
  "dbName": "<database name>",
  "table": "<table name>",
  "column": "<column name>",
  "condition": "<condition>"
}
```

#### Perform a SELECT Query on a Column

```php
POST /sqlize-api/?action=insert_data

Body:
{
  "dbName": "<database name>",
  "table": "<table name>",
  "data": "<data object>"
}
```
