function togglePassword(inputId, element) {
    const input = document.getElementById(inputId);
    if (input.type === "password") {
        input.type = "text";
        element.innerHTML = "🙈"; // Ícone para ocultar
    } else {
        input.type = "password";
        element.innerHTML = "👁"; // Ícone para mostrar
    }
}