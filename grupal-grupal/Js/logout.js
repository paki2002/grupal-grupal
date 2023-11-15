const logoutBtn = document.querySelector(".logout");
logoutBtn.addEventListener("click", () => {
  const confirmed = confirm("¿Quieres cerrar sesión en tu sesión?");
  if (!confirmed) {
    event.preventDefault();
  }
});
