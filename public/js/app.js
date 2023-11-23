console.log("hello world");

document.addEventListener("scroll", () => {
  const nav = document.querySelector(".navbar");

  if (window.scrollY > 0) {
    nav.classList.add("scrolled");
  } else {
    nav.classList.remove("scrolled");
  }
});
