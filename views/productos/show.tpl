<div class="card">
    <div class="card-body">
        <h1 class="card-title">
            {$asunto}
        </h1>
        {include file="../partials/_messages.tpl"}
        <table class="table table-hover"> 
            <tr>

                <th>id:</th>
                <td>{$producto.id}</td>
            </tr> 

            <tr>
                <th> Nombre:</th>
                <td>{$producto.nombre}</td>
            </tr>
            
            <tr>
                <th> Precio:</th>
                <td>{$producto.direccion}</td>
            </tr>

            <tr>
                <th> Stock:</th>
                <td>{$producto.telefono}</td>
            </tr>


            <tr>
                <th> Fecha de creación:</th>
                <td>{$producto.created_at}</td>
            </tr>

            <th> Fecha de modificación:</th>
            <td>{$producto.updated_at}</td>
        </tr>

        </table>
        <p> <a href="{$_layoutParams.root}productos" class="btn btn-dark">Volver</a></p>
        
    </div>
</div>