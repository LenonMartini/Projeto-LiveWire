function buscaCep(){
  let url =  'https://api.postmon.com.br/v1/cep/';
  let cep = document.querySelector('#cep').value;
  let Urlparam = url + cep;
 
  
  fetch(Urlparam)
    .then(response => response.json())
    .then(result => {
      document.querySelector('#andress').value = result.logradouro;
      document.querySelector('#city').value = result.cidade;
      document.querySelector('#district').value = result.bairro;
      document.querySelector('#state').value = result.estado_info.nome;
      document.querySelector('#uf').value = result.estado;
     
    }) 
    .catch(function(err) { 
      console.error(err);
    });
     

  
}