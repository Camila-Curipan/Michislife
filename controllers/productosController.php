<?php
//require("../application/DBase.php");

use Illuminate\Support\Facades\File;
use models\Producto;
use models\Categoria;
use models\Proveedore;

class productosController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->getMessages();

        $this->_view->assign('title','Productos');
        $this->_view->assign('asunto','Nuestros Productos');
        $this->_view->assign('notice','No hay productos disponibles');
        $this->_view->assign('productos',Producto::with(['categoria','proveedore'])->orderBy('id','desc')->get());

        $this->_view->render('index');
    }

    public function create()
    {
        $this->getMessages();

        $this->_view->assign('title','Productos');
        $this->_view->assign('asunto','Nuevo Producto');
        $this->_view->assign('productos',Session::get('data'));
        $this->_view->assign('process','productos/store');
        $this->_view->assign('categorias', Categoria::with('productos')->get());
        $this->_view->assign('proveedores', Proveedore::with('productos')->get());
        $this->_view->assign('send',$this->encrypt($this->getForm()));

        $this->_view->render('create');
    }
   
    public function store()
    {
        #print_r($_POST);exit;
        $this->validateForm("productos/create", [
            'nombre' => Filter::getText('nombre'),
            'precio' => Filter::getText('precio'),
            'stock' => Filter::getText('stock'),
            'categoria' => Filter::getInt('categoria'),
            'proveedor' => Filter::getInt('proveedor')
        ]);

        $producto = Producto::select('id')->where('nombre', Filter::getText('nombre'))->first();
       
        if($producto){
            Session::set('msg_error','El producto ingresado ya existe\nIntente ingresar otro producto');
            $this->redirect('productos/create');
        } 
 
        $producto= new Producto();
        $producto->nombre = Filter::getText('nombre');
        $producto->precio = Filter::getText('precio');
        $producto->stock = Filter::getText('stock');
        $producto->categoria_id = Filter::getInt('categoria');
        $producto->proveedore_id = Filter::getInt('proveedor');

        $producto->save();

        Session::destroy('data');
        Session::set('msg_success', 'El producto se a guardado exitosamente');
        $this->redirect('productos');

    }

    public function edit($id = null) {

        Validate::validateModel(Producto::class, $id, 'error/error');
        $this->getMessages();

        $this->_view->assign('title','Productos');
        $this->_view->assign('asunto','Editar');
        $this->_view->assign('producto', Producto::find(Filter::filterInt($id)));
        $this->_view->assign('process',"productos/update/{$id}");
        $this->_view->assign('categorias', Categoria::with('productos')->get());
        $this->_view->assign('proveedores', Proveedore::with('productos')->get());
        $this->_view->assign('send',$this->encrypt($this->getForm()));

        $this->_view->render('edit');

    }

    public function update($id = null) {

        Validate::validateModel(Producto::class, $id, 'error/error');
        $this->validatePUT();

        $this->validateForm("productos/create", [
            'nombre' => Filter::getText('nombre'),
            'precio' => Filter::getText('precio'),
            'stock' => Filter::getText('stock'),
            'categoria' => Filter::getInt('categoria'),
            'proveedor' => Filter::getInt('proveedor')
        ]);
        $producto= Producto::find(Filter::filterInt($id));
        $producto->nombre = Filter::getText('nombre');
        $producto->precio = Filter::getText('precio');
        $producto->stock = Filter::getText('stock');
        $producto->categoria_id = Filter::getInt('categoria');
        $producto->proveedore_id = Filter::getInt('proveedor');
        $producto->save();

        Session::destroy('data');
        Session::set('msg_success', 'El producto se a modificado exitosamente');
        $this->redirect('productos/show/'.$id);
    }

    public function show($id=null)
    {
        Validate::validateModel(Producto::class, $id, 'error/error');
        $this->getMessages();

        $this->_view->assign('title','Productos');
        $this->_view->assign('asunto','Detalle de Productos');
        $this->_view->assign('producto',Producto::find(Filter::filterInt($id)));

        $this->_view->render('show');

    }
}