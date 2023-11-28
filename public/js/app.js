document.addEventListener("scroll", () => {
  const nav = document.querySelector(".navbar");
  const white = document.querySelectorAll(".color-white");

  if (window.scrollY > 0) {
    nav.classList.add("scrolled");
    white.forEach((element) => {
      element.classList.add("scrolled");
    });
  } else {
    nav.classList.remove("scrolled");
    white.forEach((element) => {
      element.classList.remove("scrolled");
    });
  }
});
