
  window.onload = function () {
    if (sessionStorage.getItem("cookiesAceptadas") !== "true") {
      const overlay = document.createElement("div");
      overlay.id = "cookie-overlay";
      overlay.innerHTML = `
        <div id="cookie-box">
          <p>Usamos cookies para mejorar tu experiencia. Al continuar aceptas nuestra 
            <a href="https://docs.google.com/document/d/1F1UD5oHRS_go1EvcgHGDA3F7oxCjqA27kPK8Crc-LgI/edit?usp=drive_link" target="_blank">política de privacidad</a>.
          </p>
          <button id="aceptar">Aceptar</button>
          <button id="rechazar">Rechazar</button>
        </div>
      `;
      document.body.appendChild(overlay);

      document.getElementById("aceptar").onclick = function () {
        sessionStorage.setItem("cookiesAceptadas", "true");
         window.location.href = "https://nesanchez000.github.io/codigoambulancia/index2.html";
        overlay.remove();
      };

      document.getElementById("rechazar").onclick = function () {
        window.location.href = "https://www.google.com";
      };
    }
  };
