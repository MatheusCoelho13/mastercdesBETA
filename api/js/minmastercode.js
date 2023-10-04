const checkbox = document.getElementById("acordo");
const botao = document.getElementById("button_isfalse");
const div = document.getElementById("img_buttonoff")
// Adiciona um ouvinte de eventos para a checkbox
checkbox.addEventListener("change", function() {
  // Verifica se a checkbox está marcada
  if (checkbox.checked) {
    // Habilita o botão se a checkbox estiver marcada
    botao.removeAttribute("disabled");
    
  } else {
    // Desabilita o botão se a checkbox não estiver marcada
    botao.setAttribute("disabled", "disabled");
  }
  if (div) {
    // Define o novo ID para o elemento <div>
    div.id = "img_button";
  }
});
    // Seleciona o elemento <div> pelo seu ID atual
  ;
  
    // Verifica se o elemento foi encontrado
    var googleUser = {};
  var startApp = function() {
    gapi.load('auth2', function(){
      // Retrieve the singleton for the GoogleAuth library and set up the client.
      auth2 = gapi.auth2.init({
        client_id: 'YOUR_CLIENT_ID.apps.googleusercontent.com',
        cookiepolicy: 'single_host_origin',
        // Request scopes in addition to 'profile' and 'email'
        //scope: 'additional_scope'
      });
      attachSignin(document.getElementById('customBtn'));
    });
  };

  function attachSignin(element) {
    console.log(element.id);
    auth2.attachClickHandler(element, {},
        function(googleUser) {
          document.getElementById('name').innerText = "Signed in: " +
              googleUser.getBasicProfile().getName();
        }, function(error) {
          alert(JSON.stringify(error, undefined, 2));
        });
  }