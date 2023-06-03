<div class="card">
    <div class="card-body">
        <h1 class="card-title">
            {$asunto}
        </h1>
        {include file="../partials/_messages.tpl"}
        <table class="table table-hover"> 
            <tr>

                <th>id:</th>
                <td>{$proveedore.id}</td>
            </tr> 

            <tr>
                <th> Nombre:</th>
                <td>{$proveedore.nombre}</td>
            </tr>
            
            <tr>
                <th> direccion:</th>
                <td>{$proveedore.direccion}</td>
            </tr>

            <tr>
                <th> telefono:</th>
                <td>{$proveedore.telefono}</td>
            </tr>


            <tr>
                <th> Fecha de creación:</th>
                <td>{$proveedore.created_at}</td>
            </tr>

            <th> Fecha de modificación:</th>
            <td>{$proveedore.updated_at}</td>
        </tr>

        </table>
        <p> <a href="{$_layoutParams.root}proveedores" class="btn btn-dark">Volver</a></p>
        
    </div>
</div>