<div class="card">
    <div class="card-body">
        <h1 class="card-title">
            {$asunto}
            <a href="{$_layoutParams.root}proveedores/create" class="btn btn-outline-secondary">Nuevo Proveedor</a>
        </h1>
        {include file="../partials/_messages.tpl"}
        {if isset($proveedores) && count($proveedores)}
        <div class="row row-cols-1 row-cols-md-3 g-4">
            {foreach from=$proveedores item=model}
                <div class="col">
                    <div class="card h-100">
                    <!--modificar aca para poner una nueva imagen para la categoria-->
                    {html_image file="{$_layoutParams.route_img}nuevo1.svg" height=100px width=100px}
                    <div class="card-body">
                        <h5 class="card-title">{$model.nombre}</h5>
                        <h5 class="card-title">{$model.direccion}</h5>
                        <h5 class="card-title">{$model.telefono}</h5>
                    </div>
                    <div class="card-footer">
                        <a href="{$_layoutParams.root}proveedores/show/{$model.id}" class="btn btn-sm btn-success">Ver</a>
                        <a href="{$_layoutParams.root}proveedores/edit/{$model.id}" class="btn btn-warning btn-sm">Editar</a>
                    </div>
                    </div>
                </div>
            {/foreach}
        </div>
        {else}
            <p class="text-info">{$notice}</p>
        {/if}
        
    </div>
</div>