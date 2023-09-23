const forms = document.getElementById("formulario_S");



const pegarDados = async(event) => {
  event.preventDefault();

  // Pegando os dados do formulário
  
  const nome = document.querySelector("#nomee");
  const email = document.querySelector("#emaill");
  const senha = document.querySelector("#senhaa");

  // Criando um objeto com os dados a serem enviados
  const data = {
    nome: nome.value,
    email: email.value,
    senha: senha.value
  };
 await fetch("../../api/processa_cadastro.php",{
  method:"POST",
  headers:{
    "Content-Type":"application/json"
  },
  body : JSON.stringify(data)
})
}

forms.addEventListener("submit", pegarDados);