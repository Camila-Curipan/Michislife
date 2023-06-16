<form action="{$_layoutParams.root}{$process}" method="post">
    <div class="mb-3">
        <label for="proveedores" class="form-label">proveedores</label>
        <div id="proveedore" class="form-text">Ingrese nombre para nuevo proveedor</div>
        <input type="text" name="nombre" value="{$proveedore.nombre|default:""}" class="form-control" id="proveedore" aria-describedby="proveedore">

        <div id="proveedore" class="form-text">Ingrese direccion de proveedor</div>
        <input type="text" name="direccion" value="{$proveedore.direccion|default:""}" class="form-control" id="proveedore" aria-describedby="proveedore">

        <div id="proveedore" class="form-text">Ingrese telefono de proveedor</div>
        <input type="text" name="telefono" value="{$proveedore.telefono|default:""}" class="form-control" id="proveedore" aria-describedby="proveedore">
    </div>
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="send" value="{$send}">
    <button type="submit" class="btn btn-dark">Guardar cambios</button>
    <a href="{$_layoutParams.root}proveedores" class="btn btn-dark">Volver</a>
</form>