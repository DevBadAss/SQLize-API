# SQLize API Documentation

This is the documentation for the SQLize API, which provides functionality for interacting with a database. The API supports various actions for managing tables and data.

## API Endpoint

The API endpoint for accessing the SQLize API is:

## Actions

The API supports the following actions:

- `init`: Initializes the database.

- `create_table`: Creates a new table in the database.

- `drop_table`: Deletes a table from the database.

- `delete_data`: Deletes data from a table based on a condition.

- `query_table`: Retrieves all data from a table.

- `query_column`: Retrieves specific column data from a table based on a condition.

- `insert_data`: Inserts new data into a table.

- `alter_table`: Modifies the structure of a table.

- `update_table`: Updates existing data in a table based on a condition.

- `list_table`: Lists all tables in the database.

## Request Format

All requests must be sent as POST requests to the API endpoint mentioned above. The request body should be a JSON object containing the following parameters:

- `action`: The action to perform (e.g., `init`, `create_table`, `delete_data`, etc.).

- `dbName`: The name of the database.

- `table`: The name of the table (used in `create_table`, `drop_table`, `delete_data`, `query_table`, `query_column`, `insert_data`, `alter_table`, `update_table` actions).

- `data`: The data to be inserted or updated (used in `insert_data` and `update_table` actions).

- `condition`: The condition to be used for filtering data (used in `delete_data`, `query_column`, and `update_table` actions).

- `schema`: The table schema (used in `create_table` action).

- `function`: The function to be used in altering the table (used in `alter_table` action).

- `columnName`: The name of the column to be altered (used in `alter_table` action).

- `datatype`: The new data type for the column (used in `alter_table` action).

## Response Format

The API response will be a JSON object containing the following properties:

- `status`: The HTTP status code of the response.

- `responseText`: A descriptive message indicating the result of the API action.

## Example Request

```json

{

    "action": "create_table",

    "dbName": "my_database",

    "table": "users",

    "schema": {

        "id": "INT(11) AUTO_INCREMENT PRIMARY KEY",

        "name": "VARCHAR(50)",

        "email": "VARCHAR(100)"

    }

}


## Example Response 

```json
{

    "status": 200,

    "responseText": "Table Created Successfully."

}



```


## PHP Implementation 

The provided PHP script demonstrates how to interact with the SQLize API. You can utilize the code as a starting point and customize it according to your specific requirements

