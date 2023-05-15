<?php

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
            //array('id_categorias' => 1, 'nombre' => 'Alimentos' ),
            //array('id_catego' => 2, 'nombre' => 'Jugetes' ),
            array('id_categoria' => 1, 'nombre' => 'Higiene' ),
        );
        $this->_view->assign('title','Categorias');
        $this->_view->assign('asunto','Categorias de productos');
        $this->_view->assign('notice','No hay roles disponibles');
        $this->_view->assign('categorias', $categorias);
        $this->_view->render('categorias');
    }
}
