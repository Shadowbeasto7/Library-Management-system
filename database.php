<?php
session_start();
class database
{
    private  $conn = false;
    private  $db_host = 'localhost';
    private  $db_user = 'root';
    private  $db_pass = '';
    private  $db_name = 'elib';
    private $result = array();

    public function __construct()
    {

        if (!$this->conn) {

            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $this->conn = true;
            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli->connect_error);

                return false;
            }
        } else {
            return true;
        }
    }
    
    // insert
    public function insert($table, $params = array())
    {
        if ($this->tableExists($table)) {
            // print_r($params);

            $table_columns = implode(',', array_keys($params));
            $table_values = implode("','", $params);
            // echo $table_columns;
            // echo $table_value;
            $sql = "insert into $table($table_columns) values ('$table_values')";
            // echo $sql;

            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->insert_id);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;;
            }
        } else {
            return false;
        }
    }


    // select 
    public function select($table, $rows = '*', $join = null, $where = null, $order = null, $limit =  null)
    {
        if ($this->tableExists($table)) {
            $sql = "SELECT $rows FROM `$table`";
            if ($join != null) {
                $sql .= "$join ";
            }
            if ($where != null) {
                $sql .= "where $where ";
            }
            if ($order != null) {
                $sql .= "ORDER BY $order ";
            }

            //pagination

            if ($limit != null) {
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $start = ($page - 1) * $limit;
                $sql .= "LIMIT $start,$limit";
            }
            // echo $sql;
            $query = $this->mysqli->query($sql);
            if ($query) {
                $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return true;
            }
        } else {
            array_push($this->result, $this->mysqli->error);
        }
    }

    public function update($table, $params = array(), $where = null)
    {
        if ($this->tableExists($table)) {

            // print_r($params);
            $args = array();
            foreach ($params as $key => $value) {
                $args[] = "$key = '$value'";
            }
            // print_r($args);


            $sql = "UPDATE `$table` SET " . implode(', ', $args);
            // echo $sql;
            if ($where != null) {
                $sql .= " WHERE $where ";
            }
            // echo $sql;

            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
            }
        } else {
            return false;
        }
    }

    //delete
    public function delete($table, $where = null, $limit = null)
    {
        if ($this->tableExists($table)) {
            $sql = "DELETE FROM `$table`";
            if ($where != null) {
                $sql .= "WHERE $where";
            }
            if ($limit != null) {
                $sql .= " LIMIT $limit";
            }
            // echo $sql;
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
            }
        } else {
            return false;
        }
    }
    //tableexists
    private function tableExists($table)
    {
        $sql = "SHOW TABLES FROM `$this->db_name`  LIKE '$table' ";
        $tableInDb = $this->mysqli->query($sql);
        if ($tableInDb) {
            if ($tableInDb->num_rows == 1) {
                return  true;
            } else {
                array_push($this->result, $table . ' table doesnot exist in the database');
                // print_r($this->result);
                return false;
            }
        }
    }


    //for results
    public  function getResults()
    {
        $val = $this->result;
        $this->result = array();
        return $val;
    }
    //getting the last insert id
    public function last_Iid()
    {
        $last_Iid = $this->mysqli->insert_id;
        return $last_Iid;
    }
}
