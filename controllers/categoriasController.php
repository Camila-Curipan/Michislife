<?php
//require("../application/DBase.php");

class categoriasController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->getMessages();

        $categorias = array(
            //array('id_categorias' => 3, 'nombre' => 'Alimentos' ),
            //array('id_categoria' => 2, 'nombre' => 'Jugetes' ),
            array('id_categoria' => 1, 'nombre' => 'Higiene' ),
        );
        $this->_view->assign('title','Categorias');
        $this->_view->assign('asunto','Categorias de productos');
        $this->_view->assign('notice','No hay roles disponibles');
        $this->_view->assign('categorias', $categorias);
        $this->_view->render('categorias');
    }

    public function create()
    {
        $this->getMessages();

        $this->_view->assign('title','Categorias');
        $this->_view->assign('asunto','Nueva Categoria');
        $this->_view->assign('role',Session::get('data'));
        $this->_view->assign('process','categorias/store');
        $this->_view->assign('send',$this->encrypt($this->getForm()));

        $this->_view->render('create');
    }
}
