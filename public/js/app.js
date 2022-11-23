
const faqs = document.querySelectorAll('.faq');

faqs.forEach(faq => {
  faq.addEventListener('click', () => {
    faq.classList.toggle('open');

    const icon = faq.querySelector('.faq_icon i')

    if (icon.className === 'uil uil-plus') {
      icon.className = 'uil uil-minus'
    }
    else {
      icon.className = 'uil uil-plus'
    }
  })
})

window.addEventListener('scroll', () => {

  document.querySelector('nav').classList.toggle('window-scroll', window.scrollY > 0);

});

const menu = document.querySelector('.nav_menu')
const openBtn = document.querySelector('#open_btn')
const closeBtn = document.querySelector('#close_btn')


openBtn.addEventListener('click', () => {
  menu.style.display = "flex";
  openBtn.style.display = "none";
  closeBtn.style.display = "inline-block";

})

const closeNav = () => {
  menu.style.display = "none";
  openBtn.style.display = "inline-block"
  closeBtn.style.display = "none"

}
closeBtn.addEventListener('click', closeNav)


if (window.innerWidth < 1024) {
  document.querySelectorAll('.nav_menu li a').forEach(navitem => {
    navitem.addEventListener('click', closeNav)
  })
}


