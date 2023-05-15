<div class="card">
    <div class="card-body">
        <h1 class="card-title">
            {$asunto}
            <a href="{$_layoutParams.root}categorias/create" class="btn btn-outline-secondary">Nueva Categoria</a>
        </h1>
        {if isset($categorias) && count($categorias)}
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>id_categoria</th>
                        <th>nombres</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$categorias item=model}
                        <tr>
                            <td>{$model.id_categoria}</td>
                            <td>{$model.nombre}</td>
                            <td>
                                <a href="{$_layoutParams.root}categorias/show/"
                                    class="btn btn-success btn-sm">Ver</a>
                                <a href="{$_layoutParams.root}categorias/edit/" class="btn btn-warning btn-sm">Editar</a>
                            </td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        {else}
            <p class="text-info">{$notice}</p>
        {/if}
    </div>
</div>