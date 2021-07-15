<main>
<section class="mt-3">
    <a href="index.php">
        <button class="btn btn-success">Voltar</button>
    </a>
</section>

<div class="mt-3">
    <h2>Excluir vaga</h2>
</div>

<div class="form mt-3">
    <form method="post">

    <div class="form-group">
        <p>Você deseja excluir a vaga <strong><?=$obVaga->titulo?></strong>?</p>
    </div>

        <div class="form-gourp mt-3">
            <button type ="button" class="btn btn-success">Cancelar</button>
            <button type ="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>
    </form>
</div>
</main>