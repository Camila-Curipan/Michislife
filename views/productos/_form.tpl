

<form action="{$_layoutParams.root}{$process}" method="post">
    <div class="mb-3">
        <label for="productos" class="form-label">productos</label>
        <div id="producto" class="form-text">Ingrese nombre para un nuevo producto</div>
        <input type="text" name="nombre" value="{$producto.nombre|default:""}" class="form-control" id="producto" aria-describedby="producto">

        <div id="producto" class="form-text">Ingrese el precio del producto</div>
        <input type="text" name="precio" value="{$producto.precio|default:""}" class="form-control" id="producto" aria-describedby="producto">

        <div id="producto" class="form-text">Ingrese el stock del producto</div>
        <input type="text" name="stock" value="{$producto.stock|default:""}" class="form-control" id="producto" aria-describedby="producto">
        
        <div id="producto" class="form-text">Ingrese el proveedor del producto</div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Options</label>
            <select class="proveedores" id="proveedore">
                <option selected>Choose...</option>
                {foreach from=$proveedores item='model'}
                    <option value="1">One</option> 
                {/foreach}
                
            </select>
        </div>
        <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Dropdown button
        </button>
        <ul class="dropdown-menu">
        {foreach from=$proveedores item='proveedore'}
            <li><a class="dropdown-item" href="#"></a></li>       
        {/foreach}

          <!--<li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>-->
        </ul>
      </div>
     
    </div>
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="send" value="{$send}">
    <button type="submit" class="btn btn-dark">Guardar cambios</button>
    <a href="{$_layoutParams.root}productos" class="btn btn-dark">Volver</a>
</form>