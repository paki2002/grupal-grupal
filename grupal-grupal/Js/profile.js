const buttons = document.querySelectorAll(".submit-btn");
for (const button of buttons) {
  button.addEventListener("click", confirmDelete);
}

function confirmDelete() {
  const choice = confirm("¿Estás seguro de que quieres hacer esto?");
  if (!choice) {
    event.preventDefault();
  }
}
