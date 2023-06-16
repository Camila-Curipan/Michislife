<form action="{$_layoutParams.root}{$process}" method="post">
    <div class="mb-3">
        <label for="productos" class="form-label">productos</label>
        <div id="producto" class="form-text">Ingrese nombre para un nuevo producto</div>
        <input type="text" name="nombre" value="{$producto.nombre|default:""}" class="form-control" id="producto" aria-describedby="producto">

        <div id="producto" class="form-text">Ingrese el precio del producto</div>
        <input type="text" name="precio" value="{$producto.precio|default:""}" class="form-control" id="producto" aria-describedby="producto">

        <div id="producto" class="form-text">Ingrese el stock del producto</div>
        <input type="text" name="stock" value="{$producto.stock|default:""}" class="form-control" id="producto" aria-describedby="producto">
        
        <div id="producto" class="form-text">Ingrese la categoria del producto</div>
        <select class="form-select" aria-label="Default select example" name=categoria value="{$producto.categoria_id}" id="producto">
          {foreach from=$categorias item=model}
            <option value="{$model.id}">{$model.nombre}</option>
          {/foreach}
        </select>

        <div id="producto" class="form-text">Ingrese el proveedor del producto</div>
        <select class="form-select" aria-label="Default select example" name=proveedor value="{$producto.proveedore_id}" id="producto">
          {foreach from=$proveedores item=model}
            <option value="{$model.id}">{$model.nombre}</option>
          {/foreach}
        </select>
     
    </div>
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="send" value="{$send}">
    <button type="submit" class="btn btn-dark">Guardar cambios</button>
    <a href="{$_layoutParams.root}productos" class="btn btn-dark">Volver</a>
</form>