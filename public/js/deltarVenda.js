function deltarVenda(id){
    var resposta = confirm(`Deseja apagar a venda de id "${id}"?`);

    if(resposta){
        window.location.href = `./apagarVenda.php?id=${id}`
    }
}