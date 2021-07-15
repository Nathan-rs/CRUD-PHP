<main>

<section class="mt-3">
    <a href="index.php">
        <button class="btn btn-success">Voltar</button>
    </a>
</section>

<div class="mt-3">
    <h2><?=TITLE?></h2>
</div>

<div class="form mt-3">
    <form method="post">
        <div class="form-group">
            <label>Titulo</label>
                <input type="text" class="form-control" name="titulo" value="<?=$obVaga->titulo?>"/>
        </div>

        <div class="form-group mt-3">
            <label>Descrição</label>
            <textarea class="form-control" name="descricao" rows="5"><?=$obVaga->descricao?></textarea>
        </div>

        <div class="form-group mt-3">
            <label>Status</label>

            <div>
                <div class="form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="s" checked> Ativo
                    </label>
                </div>

                <div class="form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value = "n" <?=$obVaga->ativo == 'n'? 'checked' : ''?>> Inativo
                    </label>
                </div>

            </div>
        </div>

        <div class="form-gourp mt-3">
            <button type ="submit"class="btn btn-success">Enviar</button>
        </div>
    </form>
</div>
</main>