<div class="col-md-12">
    <div class="card">
        <h5 class="card-header bg-dark text-light   ">
            {$asunto}
        </h5>
        <div class="card-body">
            <div class="col-md-6 col">
                <form action="{$_layoutParams.root}{$process}">
                    <div class="mb-3">
                    <label for="categoria" class="form-label">categoria</label>
                    <input type="text" class="form-control" id="categoria" aria-describedby="categoria">
                    <div id="categoria" class="form-text">Ingrese nombre para nueva categoria</div>
                    </div>
                    <input type="hidden" name="send" value="{$send}">
                    <button type="submit" class="btn btn-dark">Agregar categoria</button>
                </form>

            </div>
         

        </div>
    </div>
</div>
