const buttons = document.querySelectorAll(".delete-btn");
for (const button of buttons) {
  button.addEventListener("click", confirmDelete);
}

function confirmDelete() {
  const choice = confirm("¿Eliminar tarea?");
  if (!choice) {
    event.preventDefault();
  }
}
