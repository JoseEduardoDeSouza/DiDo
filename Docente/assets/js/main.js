
/* set up XMLHttpRequest */
var servidores;
var url = "pessoalIFPR.xlsx";
var oReq = new XMLHttpRequest();
oReq.open("GET", url, true);
oReq.responseType = "arraybuffer";

oReq.onload = function(e) {
  var arraybuffer = oReq.response;

  /* convert data to binary string */
  var data = new Uint8Array(arraybuffer);
  var arr = new Array();
  for(var i = 0; i != data.length; ++i) arr[i] = String.fromCharCode(data[i]);
  var bstr = arr.join("");

  /* Call XLSX */
  var workbook = XLSX.read(bstr, {type:"binary"});

  /* DO SOMETHING WITH workbook HERE */
  var first_sheet_name = workbook.SheetNames[0];
  /* Get worksheet */
  var worksheet = workbook.Sheets[first_sheet_name];
  servidores = XLSX.utils.sheet_to_json(worksheet,{raw:true});
}

oReq.send();
var siape;
function myFunction(a){
  siape = a.value;
  verificar = 0;
  for (var i = 0; i < servidores.length; i++) {
    if(servidores[i].SIAPE==siape){

      document.getElementById("nomeCompleto").value=servidores[i].NOME;
      document.getElementById("lotacao").value=servidores[i].LOTAÇÃO;
      document.getElementById("cargo").value=servidores[i].CARGO;
        verificar = 1;
    }

  }
  if (verificar==0) {
    alert("SIAPE não registrado.")

  }

}



//Verificar login
function logar(){

  $.ajax({
  type: "POST",
  url: '/Login/verificarLogin',
  data: $('.tabela').serialize()
}).done(function(data) {
  console.log(data);
  var obj = JSON.parse(data);
    if (obj.caso==1) {
      alert("Preencha todos os campos.")
    }else if (obj.caso==2) {
      window.location.href = "/Sistema";
    }else if (obj.caso==3) {
      alert("Login ou senha incorreto")
    }
});
}

// Formulario de cadastro de docente


function cadProf(){

  $.ajax({
  type: "POST",
  url: '/Login/cadastrar',
  data: $('#formulario').serialize()}).done(
    function(data) {
      var obj = JSON.parse(data);
        if (obj.caso==1) {
          alert("Preencha todos os campos.")
        }else if (obj.caso==2) {
          alert("Cadastrado com sucesso.")

        }else if (obj.caso==3) {
          alert("SIAPE já cadastrado.")

        }else{
          alert("Erro! Entre em contato com o suporte. ")
        }
  });
}



// Cadastrar turma
function cadTurma(){
    $.ajax({
    type: "POST",
    url: '/Sistema/cadastrarTurma',
    data: $('.cadTurma').serialize()}).done(
      function(data){
        var obj = JSON.parse(data);
          if (obj.caso==1) {
            alert("Preencha todos os campos.")
          }else if (obj.caso==2) {
            alert("Cadastrado com sucesso.")

          }else if (obj.caso==3) {
            alert("Erro.")

          }

      });

}


// Enviar Arquivo]
function cadArquivo(){
  event.preventDefault();
  var form = $('#enviarArquivo')[0];
  $.ajax({
      url: "/Sistema/cadastrarArquivo",
      type: "post",
      enctype: 'multipart/form-data',
      processData: false,  // Important!
      contentType: false,
      cache: false,
      dataType: "JSON",
      data: new FormData(form)}).done(function(data){
        if (data=="erro") {
          alert("Erro!")
        }else{
          $('.tabela').children(1).remove();
          $('.tabela').append(data);
        }
      });

    }











// $( "#enviarArquivo" ).submit(function( event ) {
//     event.preventDefault();
//     $.ajax({
//         url: "/server/gerenciador.php",
//         type: "post",
//         dataType: "JSON",
//         data: new FormData(this),
//         processData: false,
//         contentType: false,
//         success: function (data, status)
//         {
//             console.log(data);
//
//             $('.tabela').children(1).remove();
//             $('.tabela').append(data);
//         },
//         error: function (xhr, desc, err)
//         {
//           console.log(xhr);
//
//         }
//     });
//
// });
