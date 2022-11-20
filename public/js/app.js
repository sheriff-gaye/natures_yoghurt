
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

// const searchBtn = document.getElementById('search-item');

// searchBtn.addEventListener('keyup', () => {
//   const searchBox = document.getElementById('search-item').value.toUpperCase();
//   const proucts = document.getElementById('product-list');
//   const product = document.querySelectorAll('.course');
//   const pname = proucts.getElementsByTagName('h4');
//   const msg=document.querySelector('#search_msg')
//   let num=0

//   for (var i = 0; i < pname.length; i++) {
//     let match = product[i].getElementsByTagName('h4')[0];

//     if (match) {
//       let textValue = match.textContent || match.innerHTML;

//       if (textValue.toUpperCase().indexOf(searchBox) > -1) {
//         product[i].style.display = ''
//         num++


//       }
//       else {
//         product[i].style.display = 'none';

//       }
//     }
//   }

//   if (num==0) {
//     msg.style.display='block'
//   }


// })

