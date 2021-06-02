window.addEventListener("load", () => {
    const hamburger = document.querySelector(".header-hamburger i");
    const headerNav = document.querySelector(".header-nav");
    hamburger.addEventListener("click", () => {
      headerNav.classList.toggle("show");
    });
  });
  