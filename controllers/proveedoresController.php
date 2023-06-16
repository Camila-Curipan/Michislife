<?php
//require("../application/DBase.php");

use models\Proveedore;

class proveedoresController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->getMessages();

        $this->_view->assign('title','Proveedores');
        $this->_view->assign('asunto','Proveedores de productos');
        $this->_view->assign('notice','No hay proveedores disponibles');
        $this->_view->assign('proveedores',Proveedore::select('id','nombre','direccion','telefono')->get());

        $this->_view->render('index');
    }

    public function create()
    {
        $this->getMessages();

        $this->_view->assign('title','Proveedores');
        $this->_view->assign('asunto','Nuevo Proveedor');
        $this->_view->assign('proveedore',Session::get('data'));
        $this->_view->assign('process','proveedores/store');
        $this->_view->assign('send',$this->encrypt($this->getForm()));

        $this->_view->render('create');
    }
   
    public function store()
    {
        #print_r($_POST);exit;
        $this->validateForm("proveedores/create", [
            'nombre' => Filter::getText('nombre'),
            'direccion' => Filter::getText('direccion'),
            'telefono' => Filter::getText('telefono')
        ]);

        $proveedore = Proveedore::select('id')->where('nombre', Filter::getText('nombre'))->first();
       
        if($proveedore){
            Session::set('msg_error','El proveedor ingresado ya existe\nIntente ingresar otro proveedor');
            $this->redirect('proveedores/create');
        } 

        $proveedore= new Proveedore;
        $proveedore->nombre = Filter::getText('nombre');
        $proveedore->direccion = Filter::getText('direccion');
        $proveedore->telefono = Filter::getText('telefono');

        $proveedore->save();

        Session::destroy('data');
        Session::set('msg_success', 'El proveedor se a guardado exitosamente');
        $this->redirect('proveedores');
    }

    public function edit($id = null) {

        Validate::validateModel(Proveedore::class, $id, 'error/error');
        $this->getMessages();

        $this->_view->assign('title','Proveedores');
        $this->_view->assign('asunto','Editar');
        $this->_view->assign('proveedore', Proveedore::find(Filter::filterInt($id)));
        $this->_view->assign('process',"proveedores/update/{$id}");
        $this->_view->assign('send',$this->encrypt($this->getForm()));

        $this->_view->render('edit');
    }

    public function update($id = null) {

        Validate::validateModel(Proveedore::class, $id, 'error/error');
        $this->validatePUT();

        $this->validateForm("proveedores/create", [
            'nombre' => Filter::getText('nombre'),
        ]);
        $proveedore= Proveedore::find(Filter::filterInt($id));
        $proveedore->nombre = Filter::getText('nombre');
        $proveedore->direccion = Filter::getText('direccion');
        $proveedore->telefono = Filter::getText('telefono');
        $proveedore->save();

        Session::destroy('data');
        Session::set('msg_success', 'El proveedor se a modificado exitosamente');
        $this->redirect('proveedores/show/'.$id);
    }

    public function show($id=null)
    {
        Validate::validateModel(Proveedore::class, $id, 'error/error');
        $this->getMessages();

        $this->_view->assign('title','Categorias');
        $this->_view->assign('asunto','Detalle de Categorias');
        $this->_view->assign('proveedore',Proveedore::find(Filter::filterInt($id)));

        $this->_view->render('show');
    }
}