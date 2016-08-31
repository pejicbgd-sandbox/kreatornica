<?php

class DB
{
    private $_con;

    private $_query_type;

    private $_table;

    private $_group;

    private $_where;

    private $_where_equal_to;

    private $_between;

    private $_innerJoin;

    private $_insert_keys;

    private $_insert_values;

    private $_insert_options;

    private $_query_response;

    private $_result;

    /**
    *   Constructor function
    *   @param array
    */
    public function __construct()
    {
        $this->_con = Connection::getInstance();
        $this->_innerJoin = '';
        $this->_where = '';
    }

    /**
     * Select statement
     * @var string
     * @return object
     */
    public function select($select = '*')
    {
        $this->_group = $select;
        $this->_query_type = 'select';
        return $this;
    }

    public function from($table)
    {
        $this->_table = $table;
        return $this;
    }

    public function insertInto($table, $keys_and_values, $insert_options = '')
    {
        $this->_query_type = 'insert_into';
        $this->_table = $table;
        $insert_values = [];

        foreach($keys_and_values as $key => $value)
        {
            $insert_keys[] = $key;
            if(is_null($value))
            {
                $insert_values[] = 'NULL';
            }
            elseif(is_int($key))
            {
                $insert_values[] = $value;
            }
            elseif(is_array($value))
            {
                foreach ($value as $k => $v)
                {
                    $insert_values[] = sprintf('%s', mysqli_real_escape_string($this->_con, $v));
                }
            }
            else
            {
                $insert_values[] = sprintf('"%s"', mysqli_real_escape_string($this->_con, $value));
            }
        }

        $this->_insert_keys = $insert_keys;
        $this->_insert_values = $insert_values;

        return $this;
    }

    public function delete()
    {
        $this->_query_type = 'delete';
        return $this;
    }

    public function where($where_equal_to = [], $operand = '=')
    {
        $this->_where .= $this->setWhere($where_equal_to, $operand);
        return $this;
    }

    public function whereOr($where_equal_to = [])
    {
        $this->_where .= $this->setWhere($where_equal_to, 'or');
        return $this;
    }

    public function whereIn($where_in)
    {
        $this->_where .= $this->setWhere($where_in, 'in');
        return $this;
    }

    public function whereNotIn($where_not_in)
    {
        $this->_where .= $this->setWhere($where_not_in, 'not in');
        return $this;
    }

    public function innerJoin($innerJoin)
    {
        $this->setInnerJoin($innerJoin);
        return $this;
    }


    public function run($custom_query = false, $query_type = false)
    {
        $valid_query_types = $this->getValidQueryTypes();
        if($custom_query && !in_array($query_type, $valid_query_types))
        {
            $query_type = 'select';
        }

        if(!$custom_query)
        {
            return $this->runQuery();
        }
        else
        {
            //return self::run_custom_query($custom_query);
        }
    }

    public function getSelected()
    {
        if($this->_query_type == 'select')
        {
            $result = [];
            $i = 0;
            while( $i < $this->_result)
            {
                $result[] = mysqli_fetch_assoc($this->_query_response);
                $i++;
            }
            return $result;
        }
    }

    private function runQuery()
    {
        switch($this->_query_type)
        {
            case 'delete':
                $query = $this->getDeleteQuery();
                $this->_query_response = mysqli_query($this->_con, $query);

                return $this->getAffected();
            case 'insert_into':
                $query = $this->getInsertQuery();
                $this->_query_response = mysqli_query($this->_con, $query);

                return $this->getInsertedId();
            case 'replace_into':
                return self::getAffected();
            case 'select':
                $query = $this->getSelectQuery();
                $this->_query_response = mysqli_query($this->_con, $query);
var_dump($this->_query_response);
                if($this->_query_response)
                {   var_dump(1);
                    $this->_result = $this->getResults();
                }

                if($this->_result && $this->_result > 0)
                {
                    return $this->_result;
                }
                return false;
            case 'update':
                return self::getAffected();
            default:
                return false;
        }
    }

    public function show()
    {
        switch($this->_query_type) {
            case 'delete':
                echo "\n" . $this->getDeleteQuery();
            case 'insert_into':
                echo "\n" . $this->getInsertQuery();
            case 'replace_into':
                return self::getAffected();
            case 'select':
                echo "\n" . $this->getSelectQuery();
            case 'update':
                return self::getAffected();
            default:
                return false;
        }
    }

/*--------- GET SELECTED FORMATED QUERIES ------------*/

    private function getSelectQuery()
    {
        $query = 'SELECT ' . $this->_group . "\n\t";
        $query .= ' FROM ' . $this->_table . "\n\t";

        if($this->_innerJoin)
        {
            $query .= $this->_innerJoin . "\n\t";
        }

        $query .= $this->_where . "\n\t";

        if($this->_between)
        {
            $query .= $this->_between . "\n\t";
        }

        return $query;
    }

    private function getInsertQuery()
    {
        return 'INSERT ' . (empty($this->_insert_options) ? '' : $this->_insert_options . ' ') . 'INTO ' . $this->_table .
                ' (' . implode(',' . "\n\t", $this->_insert_keys) . ')' .
                ' VALUES (' . "\n\t" .
                implode(',' . "\n\t", $this->_insert_values) . "\n" .
                ')' . "\n" .
                '';
    }

    private function getDeleteQuery()
    {
        $query = 'DELETE ' . "\n\t";
        $query .= ' FROM ' . $this->_table . "\n\t";
        $query .= $this->_where . "\n\t";

        return $query;
    }

    private function setWhere($where_equal_to, $operand)
    {
        $operand = $this->validateOperand($operand);

        $wheres = [];
        if($this->isIterable($where_equal_to))
        {
            if($operand == 'between')
            {
                return $this->setBetween($where_equal_to);
            }

            if($operand == 'or')
            {
                return $this->setEqualToOr($where_equal_to);
            }

            if($operand == 'in')
            {
                return $this->setIn($where_equal_to);
            }

            if($operand == 'not in')
            {
                return $this->setNotIn($where_equal_to);
            }

            return $this->setEqualTo($where_equal_to, $operand);
        }
        return '';
    }

    private function setEqualTo($where_equal_to, $operand)
    {
        if($this->isIterable($where_equal_to))
        {
            foreach($where_equal_to as $key => $value)
            {
                if(is_null($value))
                {
                    $wheres[] = $key . ' IS NULL';
                }

                if(is_int($key))
                {
                    $wheres[] = $value;
                }

                if(is_int($value))
                {
                    $wheres[] = sprintf($key . ' ' . $operand . ' %s', mysqli_real_escape_string($this->_con, $value));
                }

                if(is_array($value))
                {
                    foreach ($value as $k => $v)
                    {
                        $wheres[] = sprintf($key . ' ' .$operand . ' "%s"', mysqli_real_escape_string($this->_con, $v));
                    }
                }

                if(is_string($value))
                {
                    $wheres[] = sprintf($key . ' ' . $operand . ' "%s"', mysqli_real_escape_string($this->_con, $value));
                }
            }
        }

        if($this->_where !== '')
        {
            if(count($wheres) == 1)
            {
                return "\n\t AND " . $wheres[0];
            }
            return "\n\t" . implode(' AND' . "\n\t", $wheres);
        }
        return " WHERE \n\t" . implode(" AND \n\t", $wheres);
    }

    public function setEqualToOr($where_equal_to)
    {
        $wheres = [];
        foreach ($where_equal_to as $k => $v)
        {
            if (is_null($v))
            {
                $wheres[] = $k . ' IS NULL';
            }
            elseif (is_int($k))
            {
                $wheres[] = $v;
            }
            elseif (is_array($v))
            {
                foreach ($v as $key => $value)
                {
                    if (is_null($value))
                    {
                        $wheres[] = $k . ' IS NULL';
                    }
                    elseif (is_int($k))
                    {
                        $wheres[] = $value;
                    }
                    else
                    {
                        $wheres[] = sprintf($k . ' = "%s"', mysqli_real_escape_string($this->_con, $value));
                    }
                }
            }
            else
            {
                $wheres[] = sprintf($k . ' = "%s"', mysqli_real_escape_string($this->_con, $v));
            }
        }

        if($this->_where !== '')
        {
            return " AND (\n\t" . implode(' OR' . "\n\t", $wheres) . "\n\t)";
        }
        return " WHERE (\n\t" . implode(' OR'  . "\n\t", $wheres) . "\n\t)";
    }

    private function setBetween($where_equal_to)
    {
        $parameter = $where_equal_to[0];
        $value1 = $where_equal_to[1][0];
        $value2 = $where_equal_to[1][1];

        if(!is_string($where_equal_to[0]) || !is_array($where_equal_to[1]))
        {
            //throw new InvalidValueFormatException();
        }

        $wheres[] = sprintf(' %s' . ' BETWEEN ' . $value1 . ' AND ' . $value2, mysqli_real_escape_string($this->_con, $parameter));

        if($this->_where !== '')
        {
            return "\n\t" . implode(" AND \n\t", $wheres);
        }
        return " WHERE \n\t" . implode(" AND \n\t", $wheres);
    }

    public function setIn($where_in)
    {
        $wheres = [];
        foreach ($where_in as $k => $v)
        {
            if (is_null($v))
            {
                $wheres[] = $k . ' IS NULL';
            }
            elseif (is_int($k))
            {
                $wheres[] = $v;
            }
            elseif (is_int($v))
            {
                $wheres[] = sprintf($k . ' IN (%s)', mysqli_real_escape_string($this->_con, $v));
            }
            elseif (is_array($v))
            {
                $values = array();
                foreach ($v as $value)
                {
                    $values[] = '"' . mysqli_real_escape_string($this->_con, $value) . '"';
                }
                $wheres[] = sprintf($k . ' IN (%s)', implode(', ', $values));
            }
            else
            {
                $wheres[] = sprintf($k . ' IN (%s)', mysqli_real_escape_string($this->_con, $v));
            }
        }

        if($this->_where !== '')
        {
            if(count($wheres) == 1)
            {
                return "\n\t AND " . $wheres[0];
            }
            return "\n\t" . implode(" AND \n\t", $wheres);
        }
        return " WHERE \n\t" . implode(" AND \n\t", $wheres);
    }

    public function setNotIn($where_not_in)
    {
        $wheres = [];
        foreach ($where_not_in as $k => $v)
        {
            if (is_null($v))
            {
                $wheres[] = $k . ' IS NULL';
            }
            elseif (is_int($k))
            {
                $wheres[] = $v;
            }
            elseif (is_int($v))
            {
                $wheres[] = sprintf($k . ' NOT IN (%s)', mysqli_real_escape_string($this->_con, $v));
            }
            elseif (is_array($v))
            {
                $values = array();
                foreach ($v as $value)
                {
                    $values[] = '"' . mysqli_real_escape_string($this->_con, $value) . '"';
                }
                $wheres[] = sprintf($k . ' NOT IN (%s)', implode(', ', $values));
            }
            else
            {
                $wheres[] = sprintf($k . ' NOT IN (%s)', mysqli_real_escape_string($this->_con, $v));
            }
        }

        if($this->_where !== '')
        {
            if(count($wheres) == 1)
            {
                return "\n\t AND " . $wheres[0];
            }
            return "\n\t" . implode(" AND \n\t", $wheres);
        }
        return " WHERE \n\t" . implode(" AND \n\t", $wheres);
    }


    private function setInnerJoin($innerJoin)
    {
        if(!empty($innerJoin))
        {
            foreach ($innerJoin as $join)
            {
                $this->_innerJoin .= ' INNER JOIN ' . $join . "\n\t";
            }
        }
    }

/*--------- RESULT GETTERS BASED ON QUERY TYPE  ------------*/

    public function getResults()
    {
        return mysqli_num_rows($this->_query_response);
    }

    public function getInsertedId()
    {
        return mysqli_insert_id($this->_con);
    }

    public function getAffected()
    {
        return mysqli_affected_rows($this->_con);
    }

/*--------- VARIOUS HELPERS  ------------*/

    private function getValidQueryTypes()
    {
        return ['delete','insert_into','select','update'];
    }

    private function getValidOperands()
    {
        return ['=', '!=', '<', '>', 'between', 'in', 'not in', 'or'];
    }

    private function validateOperand($operand)
    {
        $return = $operand;
        //TODO prebaci ovo u odvojenu get metodu
        $valid_operands = $this->getValidOperands();
        if(!in_array($operand, $valid_operands))
        {
            $return = '=';
        }
        return $return;
    }

    private function isIterable($where_equal_to)
    {
        return (is_array($where_equal_to) && count($where_equal_to));
    }
}
