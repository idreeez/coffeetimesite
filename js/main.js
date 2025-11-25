const skidka1btn = document.getElementById('skidka1btn') 
const skidka2btn = document.getElementById('skidka2btn')// уведомление
const toastskidka1= document.getElementById('skidka1')
const toastskidka2= document.getElementById('skidka2')

if (skidka1btn) {
  skidka1btn.addEventListener('click', () => {
    const toast = new bootstrap.Toast(toastskidka1)
    toast.show()
  })
}
if (skidka2btn) {
  skidka2btn.addEventListener('click', () => {
    const toast = new bootstrap.Toast(toastskidka2)
    toast.show()
  })
}


// взяли кнопку
let mybutton = document.getElementById("btn-back-to-top");
mybutton.style.display = "none";
// при пролистывании сайта на 20 пикс вниз, появляется кнопка
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 30 ||
    document.documentElement.scrollTop > 30
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// при нажатии кнопка поднимает вверх
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}