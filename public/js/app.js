
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



$('.coba').hover(function() {
  $(this).find('.coba').after('<p class="detail">lihat detail <i class="bi bi-chevron-double-right" ></i> </p>');
}, function() {
  // I assume you want to remove the content you added here as well...
  $(this).find('.detail').remove();
});


