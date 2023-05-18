<?php
//require("../application/DBase.php");

use models\Categoria;

class categoriasController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->getMessages();

        //$categorias = array(
            //array('id_categorias' => 3, 'nombre' => 'Alimentos' ),
            //array('id_categoria' => 2, 'nombre' => 'Jugetes' ),
            //array('id_categoria' => 1, 'nombre' => 'Higiene' ),
        //);
        $this->_view->assign('title','Categorias');
        $this->_view->assign('asunto','Categorias de productos');
        $this->_view->assign('notice','No hay roles disponibles');
        $this->_view->assign('categorias',Categoria::select('id','nombre')->get());
        //$this->_view->assign('categorias', $categorias);

        $this->_view->render('index');
    }

    public function create()
    {
        $this->getMessages();

        $this->_view->assign('title','Categorias');
        $this->_view->assign('asunto','Nueva Categoria');
        $this->_view->assign('categoria',Session::get('data'));
        $this->_view->assign('process','categorias/store');
        $this->_view->assign('send',$this->encrypt($this->getForm()));

        $this->_view->render('create');
    }
   
    public function store()
    {
        #print_r($_POST);exit;
        $this->validateForm("categorias/create", [
            'nombre' => Filter::getText('nombre')
        ]);

        $categoria = Categoria::select('id')->where('nombre', Filter::getText('nombre'))->first();
       
        if($categoria){
            Session::set('msg_error','La categoria ingresada ya existe\nIntente ingresar otra categoria');
            $this->redirect('categorias/create');
        } 

        $categoria= new Categoria;
        $categoria->nombre = Filter::getText('nombre');
        $categoria->save();

        Session::destroy('data');
        Session::set('msg_success', 'La categoría se a guardado exitosamente');
        $this->redirect('categorias');

    }

    public function edit($id = null) {

        Validate::validateModel(Categoria::class, $id, 'error/error');
        $this->getMessages();

        $this->_view->assign('title','Categorias');
        $this->_view->assign('asunto','Editar');
        $this->_view->assign('categoria', Categoria::find(Filter::filterInt($id)));
        $this->_view->assign('process',"categorias/update/{$id}");
        $this->_view->assign('send',$this->encrypt($this->getForm()));

        $this->_view->render('edit');

    }

    public function update($id = null) {

        Validate::validateModel(Categoria::class, $id, 'error/error');
        $this->validatePUT();

        $this->validateForm("categorias/create", [
            'nombre' => Filter::getText('nombre')
        ]);
        $categoria= Categoria::find(Filter::filterInt($id));
        $categoria->nombre = Filter::getText('nombre');
        $categoria->save();

        Session::destroy('data');
        Session::set('msg_success', 'La categoría se a modificado exitosamente');
        $this->redirect('categorias/show/'.$id);


    }

    public function show($id=null)
    {
        Validate::validateModel(Categoria::class, $id, 'error/error');
        $this->getMessages();

        $this->_view->assign('title','Categorias');
        $this->_view->assign('asunto','Detalle de Categorias');
        $this->_view->assign('categoria',Categoria::find(Filter::filterInt($id)));

        $this->_view->render('show');

    }
}
