<form action="{$_layoutParams.root}{$process}" method="post">
    <div class="mb-3">
        <label for="productos" class="form-label">productos</label>
        <div id="producto" class="form-text">Ingrese nombre para un nuevo producto</div>
        <input type="text" name="nombre" value="{$producto.nombre|default:""}" class="form-control" id="producto" aria-describedby="proveedore">

        <div id="producto" class="form-text">Ingrese el precio del producto</div>
        <input type="text" name="precio" value="{$producto.precio|default:""}" class="form-control" id="producto" aria-describedby="proveedore">

        <div id="producto" class="form-text">Ingrese el stock del producto</div>
        <input type="text" name="stock" value="{$producto.stock|default:""}" class="form-control" id="producto" aria-describedby="proveedore">

      
        
    </div>
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="send" value="{$send}">
    <button type="submit" class="btn btn-dark">Guardar cambios</button>
    <a href="{$_layoutParams.root}productos" class="btn btn-dark">Volver</a>
</form>