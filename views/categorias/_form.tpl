<form action="{$_layoutParams.root}{$process}" method="post">
    <div class="mb-3">
        <label for="categoria" class="form-label">categoria</label>
        <input type="text" name="nombre" value="{$categoria.nombre|default:""}" class="form-control" id="categoria" aria-describedby="categoria">
        <div id="categoria" class="form-text">Ingrese nombre para nueva categoria</div>
    </div>
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="send" value="{$send}">
    <button type="submit" class="btn btn-dark">Guardar cambios</button>
</form>