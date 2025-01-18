// Fonction pour rendre une fenêtre déplaçable
function makeDraggable(element) {
  let isDragging = false;
  let offsetX = 0,
    offsetY = 0;

  const header = element.querySelector(".window-header");

  header.addEventListener("mousedown", (e) => {
    isDragging = true;
    offsetX = e.clientX - element.offsetLeft;
    offsetY = e.clientY - element.offsetTop;
    element.style.position = "absolute";
    element.style.zIndex = 1000;
  });

  document.addEventListener("mousemove", (e) => {
    if (isDragging) {
      element.style.left = e.clientX - offsetX + "px";
      element.style.top = e.clientY - offsetY + "px";
    }
  });

  document.addEventListener("mouseup", () => {
    isDragging = false;
  });
}

// Gestion des actions des boutons de la fenêtre
function addWindowControls(windowElement) {
  const closeButton = windowElement.querySelector(".close");
  const minimizeButton = windowElement.querySelector(".minimize");
  const maximizeButton = windowElement.querySelector(".maximize");
  const dockItems = document.querySelectorAll(".dock li a");

  // Trouver le logo actif dans le dock
  const activeDockIcon = [...dockItems]
    .find(
      (item) =>
        item.getAttribute("href") === window.location.pathname.split("/").pop()
    )
    ?.querySelector("img");

  // Créer le point blanc
  const restorePoint = document.createElement("div");
  restorePoint.classList.add("restore-point");
  restorePoint.style.display = "none"; // Caché par défaut
  document.body.appendChild(restorePoint);

  // Créer le message "OskarOs"
  const oskarOsMessage = document.createElement("div");
  oskarOsMessage.classList.add("oskaros-message");
  oskarOsMessage.textContent = "OskarOs";
  oskarOsMessage.style.display = "none"; // Caché par défaut
  document.body.appendChild(oskarOsMessage);

  // Bouton "Fermer"
  closeButton.addEventListener("click", () => {
    windowElement.classList.remove("show");
    setTimeout(() => {
      windowElement.style.display = "none";
      oskarOsMessage.style.display = "flex"; // Afficher le message "OskarOs"
    }, 300);
  });

  // Bouton "Maximiser / Restaurer"
  let isMaximized = false;
  maximizeButton.addEventListener("click", () => {
    const headerHeight = document.querySelector("header").offsetHeight;
    if (!isMaximized) {
      windowElement.style.top = `${headerHeight}px`;
      windowElement.style.left = "0";
      windowElement.style.width = "100%";
      windowElement.style.height = `calc(100vh - ${headerHeight}px)`;
      isMaximized = true;
    } else {
      windowElement.style.top = "100px";
      windowElement.style.left = "100px";
      windowElement.style.width = "800px";
      windowElement.style.height = "auto";
      isMaximized = false;
    }
  });

  // Bouton "Minimiser"
  minimizeButton.addEventListener("click", () => {
    if (activeDockIcon) {
      const activeIconRect = activeDockIcon.getBoundingClientRect();
      const windowRect = windowElement.getBoundingClientRect();

      // Positionner le point blanc au-dessus du logo actif
      restorePoint.style.left = `${
        activeIconRect.left + activeIconRect.width / 2 - 5
      }px`;
      restorePoint.style.top = `${activeIconRect.top - 15}px`;
      restorePoint.style.display = "block";

      windowElement.style.transition = "all 0.5s ease";
      windowElement.style.opacity = "0";
      windowElement.style.transform = `translate(
        ${activeIconRect.left - windowRect.left}px,
        ${activeIconRect.top - windowRect.top}px
      ) scale(0.1)`;

      setTimeout(() => {
        windowElement.style.display = "none";
        oskarOsMessage.style.display = "flex"; // Afficher le message "OskarOs"
      }, 300);
    }
  });

  // Restaurer la fenêtre en cliquant sur le point blanc
  restorePoint.addEventListener("click", () => {
    restorePoint.style.display = "none"; // Masquer le point blanc
    windowElement.style.display = "block";
    oskarOsMessage.style.display = "none"; // Masquer le message "OskarOs"
    setTimeout(() => {
      windowElement.style.opacity = "1";
      windowElement.style.transform = "scale(1)";
    }, 10);
  });
}

// Mise à jour automatique de l'heure
function updateClock() {
  const timeElement = document.querySelector(".current-time");
  const now = new Date();
  const hours = now.getHours().toString().padStart(2, "0");
  const minutes = now.getMinutes().toString().padStart(2, "0");
  timeElement.textContent = `${hours}:${minutes}`;
}

// Initialisation du script
document.addEventListener("DOMContentLoaded", () => {
  const draggableWindow = document.getElementById("draggable-window");
  makeDraggable(draggableWindow);
  addWindowControls(draggableWindow);

  // Affiche la fenêtre avec animation
  draggableWindow.classList.add("show");

  // Met à jour l'horloge au chargement
  updateClock();
  // Rafraîchit l'horloge toutes les minutes
  setInterval(updateClock, 60000);
});
