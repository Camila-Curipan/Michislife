<div class="card">
    <div class="card-body">
        <h1 class="card-title">
            {$asunto}
        </h1>
        {include file="../partials/_messages.tpl"}
        <table class="table table-hover"> 
            <tr>

                <th>id:</th>
                <td>{$categoria.id}</td>
            </tr> 

            <tr>
                <th> Nombre:</th>
                <td>{$categoria.nombre}</td>
            </tr>

            <tr>
                <th> Fecha de creación:</th>
                <td>{$categoria.created_at}</td>
            </tr>

            <th> Fecha de modificación:</th>
            <td>{$categoria.updated_at}</td>
        </tr>

        </table>
        <p> <a href="{$_layoutParams.root}categorias" class="btn btn-dark">Volver</a></p>
        
    </div>
</div>