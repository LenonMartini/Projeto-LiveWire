var cep = document.getElementById('cep');
var cnpj = document.getElementById('cnpj');
var fone = document.getElementById('fone');
let cepMask = IMask(cep, {
    mask: '00000-000',
    lazy: false,  // make placeholder always visible
    placeholderChar: '0'     // defaults to '_'
});


let cnpjMask = IMask(cnpj, {
    mask: '00.000.000/0000-00',
    lazy: false,  // make placeholder always visible
    placeholderChar: '0'     // defaults to '_'
});


let foneMask = IMask(fone, {
  mask: '(00) 0000-0000',
  lazy: false,  // make placeholder always visible
  placeholderChar: '0'     // defaults to '_'
});
