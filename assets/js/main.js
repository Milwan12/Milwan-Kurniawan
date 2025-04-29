/*==================== MENU SHOW Y HIDDEN ====================*/
const navMenu = document.getElementById('nav-menu'),
    navToggle = document.getElementById('nav-toggle'),
    navClose =  document.getElementById('nav-close')


/*===== MENU SHOW =====*/
/* Validate if constant exists */
if (navToggle) {
    navToggle.addEventListener('click', () => {
        navMenu.classList.add('show-menu');
    })
}

/*===== MENU HIDDEN =====*/
/* Validate if constant exists */
if (navClose) {
    navClose.addEventListener('click', () => {
        navMenu.classList.remove('show-menu')
    })
}

/*==================== REMOVE MENU MOBILE ====================*/
const navLink = document.querySelectorAll('.nav__link')

function linkAction(){
    const navMenu = document.getElementById('nav-menu')
    // When we click on each nav__link, we remove the show-menu class
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

/*==================== ACCORDION SKILLS ====================*/
const skillsContent = document.getElementsByClassName('skills__content'),
        skillsHeader = document.querySelectorAll(".skills__header")

function toggleSkills(){
    let itemClass = this.parentNode.className

    for (i = 0; i < skillsContent.length; i++){
        skillsContent[i].className = "skills__content skills__close"
    }

    if ( itemClass === "skills__content skills__close"){
        this.parentNode.className = "skills__content skills__open"
    }
}

skillsHeader.forEach((e) => {
    e.addEventListener('click', toggleSkills)
})

/*==================== QUALIFICATION TABS ====================*/
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.qualification__button');
    const tabContents = document.querySelectorAll('.qualification__content');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const target = document.querySelector(button.dataset.target);

            // Hapus class active dari semua tab dan konten
            tabButtons.forEach(btn => btn.classList.remove('qualification__active'));
            tabContents.forEach(content => content.classList.remove('qualification__active'));

            // Tambahkan class active pada tab yang diklik dan kontennya
            button.classList.add('qualification__active');
            target.classList.add('qualification__active');
        });
    });
});



/*==================== SERVICES MODAL ====================*/
const modalViews = document.querySelectorAll('.services__modal'),
        modalBtns = document.querySelectorAll('.services__button'),
        modalCloses = document.querySelectorAll('.services__modal-close')

let modal = function(modalClick) {
    modalViews[modalClick].classList.add('active-modal')
}

modalBtns.forEach((modalBtn, i) => {
    modalBtn.addEventListener('click', () => {
        modal(i)
    })
})

modalCloses.forEach((modalClose) => {
    modalClose.addEventListener('click', () => {
        modalViews.forEach((modalView) => {
            modalView.classList.remove('active-modal')
        })
    })
})


/*==================== PORTFOLIO SWIPER  ====================*/
let swiper = new Swiper('.portfolio__container', {
    cssMode: true,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    mousewheel: true,
    keyboard: true, 
    
})

/*==================== Typed JS ====================*/
let typed = new Typed(".multiple-text", { 
    strings: ["Mahasiswa Aktif.", "Mahasiswa Aktif."],    
    smartBackspace: true, 
    showCursor: true,
    cursorChar: '|',
    autoInsertCss: true, 
    typeSpeed: 35,
    backSpeed: 35,
    backDelay: 1000,
    loop: true
})

/*==================== Scroll Reveal ====================*/
ScrollReveal({
    reset: true,
    distance: "80px",
    duration: 2000,
    delay: 200
});

ScrollReveal().reveal('.home__content, .section__title, .section__subtitle, .qualification', { origin: "top" });
ScrollReveal().reveal('.sertifikat__container', { origin: "bottom" }); 
ScrollReveal().reveal('.home__social, .about__img, .skills__open, .contact__information', { origin: "left" });   
ScrollReveal().reveal('.about__data, .skills__close, .contact__form', { origin: "right" });


/*==================== SCROLL SECTIONS ACTIVE LINK ====================*/
const sections = document.querySelectorAll('section[id]')

function scrollActive(){
    const scrollY = window.pageYOffset

    sections.forEach(current =>{
        const sectionHeight = current.offsetHeight
        const sectionTop = current.offsetTop - 50;
        sectionId = current.getAttribute('id')

        if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.add('active-link')
        }else{
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.remove('active-link')
        }
    })
}
window.addEventListener('scroll', scrollActive)

/*==================== PESAN EMAIL ====================*/ 
emailjs.init('UMrf74eYge0GZpCT2'); 

document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    emailjs.sendForm('service_ur9pbxl', 'template_nctu1on', this) 
        .then(function() {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Pesan berhasil dikirim!",
                showConfirmButton: false,
                timer: 2000
            });
            document.getElementById('contact-form').reset();
        }, function(error) {
            console.error('Gagal!', error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Pesan gagal dikirim. Coba lagi ya!',
                timer: 2000
            });
        });
});



/*==================== SHOW SCROLL UP ====================*/ 
function scrollUp(){
    const scrollUp = document.getElementById('scroll-up');
    // When the scroll is higher than 560 viewport height, add the show-scroll class to the a tag with the scroll-top class
    if(this.scrollY >= 560) scrollUp.classList.add('show-scroll'); else scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollUp)

/*==================== DARK LIGHT THEME ====================*/ 
const themeButton = document.getElementById('theme-button')
const darkTheme = 'dark-theme'
const iconTheme = 'uil-sun'

// Previously selected topic (if user selected)
const selectedTheme = localStorage.getItem('selected-theme')
const selectedIcon = localStorage.getItem('selected-icon')

// We obtain the current theme that the interface has by validating the dark-theme class
const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light'
const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'uil-moon' : 'uil-sun'

// We validate if the user previously chose a topic
if (selectedTheme) {
  // If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the dark
  document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)
  themeButton.classList[selectedIcon === 'uil-moon' ? 'add' : 'remove'](iconTheme)
}

// Activate / deactivate the theme manually with the button
themeButton.addEventListener('click', () => {
    // Add or remove the dark / icon theme
    document.body.classList.toggle(darkTheme)
    themeButton.classList.toggle(iconTheme)
    // We save the theme and the current icon that the user chose
    localStorage.setItem('selected-theme', getCurrentTheme())
    localStorage.setItem('selected-icon', getCurrentIcon())
})
