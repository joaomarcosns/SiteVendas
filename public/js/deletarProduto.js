function deletarProdutoduto(id, name){
    var respostas = confirm(`Deseja colocar o produto "${name}" como inativo?`);

    if(respostas){
        window.location.href = `./apagarProduto.php?id=${id}`
    }
}