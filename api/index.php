<?php

require_once './includes/SQLize.php';

// Set response headers to allow CORS
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: POST');

// Get Request method
$request_method = $_SERVER['REQUEST_METHOD'];

$data = json_decode(file_get_contents("php://input"));

if ($request_method == 'POST') {
    
    if ($data->action === "init") {
        $SQLize = new SQLize($data->dbName);
        echo json_encode(array("status" => 200, "responseText"=>"DataBase Initialized Successfully."));
    }

    if ($data->action == "create_table") {
        $SQLize = new SQLize($data->dbName);
        if($SQLize->createTable($data->table, $data->schema)){
            echo json_encode(array("status" => 200, "responseText"=>"Table Created Successfully."));
        }else{
            echo json_encode(array("status" => 404, "responseText"=>"SQLize API Action Failed."));
        }
    }

    if ($data->action == "drop_table") {
        $SQLize = new SQLize($data->dbName);
        if($SQLize->deleteTable($data->table)){
            echo json_encode(array("status" => 200, "responseText"=>"Table Deleted Successfully."));
        }else{
            echo json_encode(array("status" => 404, "responseText"=>"SQLize API Action Failed."));
        }
    }

    if ($data->action == "delete_data") {
        $SQLize = new SQLize($data->dbName);
        if($SQLize->deleteData($data->table, $data->condition)){
            echo json_encode(array("status" => 200, "responseText"=>"Data Deleted Successfully."));
        }else{
            echo json_encode(array("status" => 404, "responseText"=>"SQLize API Action Failed."));
        }
    }

    if ($data->action == "query_table") {
        $SQLize = new SQLize($data->dbName);
        if($SQLize->queryTable($data->table)){
            echo json_encode(array("status" => 200, "responseText"=>$SQLize->queryTable($data->table)));
        }else{
            echo json_encode(array("status" => 404, "responseText"=>"SQLize API Action Failed."));
        }
    }

    if ($data->action == "query_column") {
        $SQLize = new SQLize($data->dbName);
        if($SQLize->queryColumn($data->table, $data->column, $data->condition)){
            echo json_encode(array("status" => 200, "responseText"=>$SQLize->queryColumn($data->table, $data->column, $data->condition)));
        }else{
            echo json_encode(array("status" => 404, "responseText"=>"SQLize API Action Failed."));
        }
    }

    if ($data->action == "insert_data") {
        $Data = json_decode(file_get_contents("php://input"));
        $SQLize = new SQLize($Data->dbName);

        if($SQLize->insertData($Data->table, $Data->data)){
            echo json_encode(array("status" => 200, "responseText"=>"Data Inserted Successfully."));
        }else{
            echo json_encode(array("status" => 404, "responseText"=>"SQLize API Action Failed."));
        }
    }

    if ($data->action == "alter_table") {
        $SQLize = new SQLize($data->dbName);
        if($SQLize->alterTable($data->table, $data->function, $data->columnName, $data->datatype)){
            echo json_encode(array("status" => 200, "responseText"=>"Table Altered Successfully."));
        }else{
            echo json_encode(array("status" => 404, "responseText"=>"SQLize API Action Failed."));
        }
    }

    if ($data->action == "update_table") {
        $SQLize = new SQLize($data->dbName);

        if($SQLize->updateTable($data->table, $data->data, $data->condition)){
            echo json_encode(array("status" => 200, "responseText"=>"Table Updated Successfully."));
        }else{
            echo json_encode(array("status" => 404, "responseText"=>"SQLize API Action Failed."));
        }
    }

    if ($data->action == "list_table") {
        $SQLize = new SQLize($data->dbName);
        if($SQLize->getListTable()){
            echo json_encode(array("status" => 200, "responseText"=>$SQLize->getListTable()));
        }else{
            echo json_encode(array("status" => 404, "responseText"=>"SQLize API Action Failed."));
        }
    }
}else{
    http_response_code(405);
    echo json_encode(array("Error"=>"Method not Allowed"));
}
?>