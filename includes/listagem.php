<?php
$mensagem = '';

if(isset($_GET['status'])){

    switch($_GET['status']){
        case 'success':
            $mensagem = $mensagem.'<div class="alert alert-success mt-3">Ação executada com sucesso!</div>';
        break;

        case 'error':
            $mensagem = $mensagem.'<div class="alert alert-danger">Ação não executada</div>';
        break;

        default: break;
    }
}
$resultados = '';

foreach($vagas as $vaga){
    $resultados = $resultados.'<tr>
                                    <td>'.$vaga->id.'</td>
                                    <td>'.$vaga->titulo.'</td>
                                    <td>'.$vaga->descricao.'</td>
                                    <td>'.($vaga->ativo == 's'? 'Ativo' : 'Inativo').'</td>
                                    <td>'.date('d/m/Y à\s H:i:s',strtotime($vaga->data)).'</td>
                                    <td>
                                        <a href="editar.php?id='.$vaga->id.'">
                                            <button type="submit" class="btn btn-primary">Editar</button></a>

                                        <a href="excluir.php?id='.$vaga->id.'">
                                            <button class="btn btn-danger">Excluir</button></a>
                                    </td>
                                </tr>';
}


    $resultados = strlen($resultados) ? $resultados : '<tr>
                                                            <td colspan="6" class="text-center">
                                                            Nenhuma vaga encontrada
                                                            </td>
                                                        </tr>';
?>

<main>
    <?=$mensagem?>
<section class="mt-3">
    <a href="cadastrar.php">
        <button class="btn btn-success">Nova Vaga</button>
    </a>
</section>

<section>
    <table  style="text-align: center" class="table text-dark bg-light mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>TITULO</th>
                <th>DESCRIÇÃO</th>
                <th>ATIVO</th>
                <th>DATA</th>
                <th>OPÇÕES</th>
            </tr>
            
        </thead>
        <tbody>
            <?=$resultados?>
        </tbody>
    </table>
</section>
</main>