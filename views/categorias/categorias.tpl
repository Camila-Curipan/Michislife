<div class="card">
    <div class="card-body">
        <h1 class="card-title">
            {$asunto}
            <a href="{$_layoutParams.root}categorias/create" class="btn btn-outline-secondary">Nueva Categoria</a>
        </h1>

        {if isset($categorias) && count($categorias)}
        <div class="row row-cols-1 row-cols-md-3 g-4">
            {foreach from=$categorias item=model}
                <div class="col">
                    <div class="card h-100">
                    <!--<img src="..." class="card-img-top" alt="...">-->
                    <div class="card-body">
                        <h5 class="card-title">{$model.nombre}</h5>
                    </div>
                    <div class="card-footer">
                        <a href="{$_layoutParams.root}categorias/show" class="btn btn-success btn-sm">Ver</a>
                        <a href="{$_layoutParams.root}" class="btn btn-warning btn-sm">Editar</a>
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