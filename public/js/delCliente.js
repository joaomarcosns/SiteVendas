function delCliente(id, name){
    var resposta = confirm(`Deseja colocar o cliente "${name}" como inativo?`);

    if(resposta){
        window.location.href = `./apagarCliente.php?id=${id}`
    }
}