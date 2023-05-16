# SQLize API Documentation

This is the documentation for the SQLize API, which provides functionality for interacting with a database. The API supports various actions for initializing, creating, dropping, querying, inserting, updating, and listing database tables.

## API Endpoint

The base URL for accessing the API is http://your-domain.com/sqlize-api/api/. Replace your-domain.com with the actual domain where the API is hosted.

## Request Format

The API expects requests to be in JSON format. The request body should include the following parameters:

| Parameter   | Type     | Description                                                  |

|-------------|----------|--------------------------------------------------------------|

| `action`    | string   | The action to perform (e.g., `init`, `create_table`, `query_table`). |

| `dbName`    | string   | The name of the database to perform actions on.               |

| `table`     | string   | The name of the table to perform actions on.                  |

| `data`      | object   | Data to be used in operations like inserting or updating rows. |

| `condition` | string   | The condition to apply in query or update operations.          |

| `schema`    | string   | The table schema when creating a table.                       |

| `column`    | string   | The name of the column to query.                              |

| `function`  | string   | The function to perform when altering a table.                 |

| `datatype`  | string   | The new datatype to assign to the column when altering a table.|

## Response Format

The API will respond with a JSON object containing the following properties:

| Property      | Type     | Description                                                  |

|---------------|----------|--------------------------------------------------------------|

| `status`      | number   | The HTTP status code of the response.                         |

| `responseText`| string   | A descriptive message indicating the result of the operation. |

## Actions

The SQLize API supports the following actions:

- `init`: Initializes the database connection.

- `create_table`: Creates a new table in the specified database.

- `drop_table`: Drops a table from the specified database.

- `delete_data`: Deletes data from a table based on a condition.

- `query_table`: Retrieves all data from a specified table.

- `query_column`: Retrieves specific columns from a table based on a condition.

- `insert_data`: Inserts data into a table.

- `alter_table`: Alters a table by adding or modifying columns.

- `update_table`: Updates rows in a table based on a condition.

- `list_table`: Retrieves a list of all tables in the specified database.

## Example Request

```json

{

    "action": "init",

    "dbName": "my_database"

}

```

## Example Response 

```json

{

    "status": 200,

    "responseText": "Database Initialized Successfully."

}

```
