<?php
class exampleModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // get all registers from a table
    public function getRegisters()
    {
        $data = $this->_db->query("SELECT id_categoria,nombre FROM categorias");

        return $data->fetchall();
    }

    // get a register from a table by id
    public function getRegisterId($id)
    {
        $data = $this->_db->prepare("SELECT id_categoria, nombre FROM categorias WHERE id_categoria = ?");
        $data->bindParam(1, $id);
        $data->execute();

        return $data->fetch();
    }

    // get a record by name
    // used to check for duplicate data
    public function getRegisterName($param)
    {
        $data = $this->_db->prepare("SELECT id_categoria FROM categorias WHERE titulo = ?");
        $data->bindParam(1, $param);
        $data->execute();

        return $data->fetch();
    }

    // add a record to the table
    public function addRegister($param)
    {
        $data = $this->_db->prepare("INSERT INTO categorias(nombre) VALUES(?)");
        $data->bindParam(1, $param);
        $data->execute();

        $row = $data->rowCount();
        return $row;
    }

    // edit a record in the table
    public function editRegister($id, $param)
    {
        $data = $this->_db->prepare("UPDATE categorias SET nombre = ?, WHERE id_categoria = ?");
        $data->bindParam(1, $param);
        $data->bindParam(2, $id);
        $data->execute();

        $row = $data->rowCount();
        return $row;
    }
}