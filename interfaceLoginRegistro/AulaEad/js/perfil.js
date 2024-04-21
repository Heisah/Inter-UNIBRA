document.addEventListener("DOMContentLoaded", function() {
    // Simulando dados do perfil
    const perfil = {
        usuario: "joaosilva",
        nome: "João Silva",
        email: "joao@example.com",
        cpf: "123.456.789-00",
        genero: "Masculino",
        estado: "São Paulo"
    };

    // Preencher os campos do formulário com os dados do perfil
    document.getElementById("usuario").value = perfil.usuario;
    document.getElementById("nome").value = perfil.nome;
    document.getElementById("email").value = perfil.email;
    document.getElementById("cpf").value = perfil.cpf;
    document.getElementById("genero").value = perfil.genero;
    document.getElementById("estado").value = perfil.estado;

    // Adicionar evento de clique no botão de sair
    document.getElementById("logoutBtn").addEventListener("click", function() {
        // Simular ação de logout redirecionando para a página de login
        window.location.href = "login.html";
    });
});
