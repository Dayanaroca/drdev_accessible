document.addEventListener('DOMContentLoaded', function() {

  /* ------------------------------
   * BOTONES "VER MÁS" / LOAD MORE
   * ------------------------------ */
  document.querySelectorAll('[id^="load-more"]').forEach(btn => {
    let isMobile = window.innerWidth < 768;
    let paged = 2;
    const postsPerPage = btn.dataset.type === 'post' ? (isMobile ? 3 : 6) : 3;

    btn.addEventListener('click', function () {
        btn.disabled = true;
        btn.textContent = drdev_ajax.load_more_texts.loading;

        fetch(drdev_ajax.ajax_url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
            body: new URLSearchParams({
                action: 'drdev_load_more_posts',
                paged: paged,
                posts_per_page: postsPerPage,
                post_type: btn.dataset.type,
                template: btn.dataset.template
            })
        })
        .then(res => res.text())
        .then(html => {
            if (html.trim() !== '') {
                document.getElementById(btn.dataset.container).insertAdjacentHTML('beforeend', html);
                paged++;
                btn.disabled = false;
                btn.textContent = drdev_ajax.load_more_texts.load_more;
            } else {
                btn.textContent = drdev_ajax.load_more_texts.no_more;
                btn.disabled = true;
            }
        })
        .catch(() => {
            btn.textContent = drdev_ajax.load_more_texts.error;
        });
    });
});



  /* ------------------------------
   *  MENÚ MÓVIL
   * ------------------------------ */
  const toggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  const overlay = document.getElementById('menu-overlay');
  const close = document.getElementById('closemenu-toggle');

  if (toggle && mobileMenu && overlay) {
    function getFocusableElements(container) {
      return container.querySelectorAll('a, button, input, select, textarea, [tabindex]:not([tabindex="-1"])');
    }
    toggle.addEventListener('click', function() {
      mobileMenu.classList.remove('translate-x-full');
      mobileMenu.classList.add('translate-x-0');
      overlay.classList.remove('hidden');
      document.body.classList.add('overflow-hidden');
      mobileMenu.removeAttribute('hidden');
      mobileMenu.setAttribute('aria-hidden', 'false');
      toggle.setAttribute('aria-expanded', 'true');
      const focusableEls = getFocusableElements(mobileMenu);
      if (focusableEls.length) focusableEls[0].focus();
    });

    function closeMenu() {
      mobileMenu.classList.remove('translate-x-0');
      mobileMenu.classList.add('translate-x-full');
      overlay.classList.add('hidden');
      document.body.classList.remove('overflow-hidden');
      mobileMenu.setAttribute('hidden', 'true');
      mobileMenu.setAttribute('aria-hidden', 'true');
      toggle.setAttribute('aria-expanded', 'false');
      toggle.focus();
    }

    if (close) close.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);
  
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && !mobileMenu.hasAttribute('hidden')) {
        closeMenu();
      }
    });

    mobileMenu.addEventListener('keydown', function(e) {
      if (e.key === 'Tab') {
        const focusableEls = Array.from(getFocusableElements(mobileMenu));
        if (focusableEls.length === 0) return;

        const firstEl = focusableEls[0];
        const lastEl = focusableEls[focusableEls.length - 1];

        if (e.shiftKey) { // Shift + Tab
          if (document.activeElement === firstEl) {
            e.preventDefault();
            lastEl.focus();
          }
        } else { // Tab
          if (document.activeElement === lastEl) {
            e.preventDefault();
            firstEl.focus();
          }
        }
      }
    });
  }

  /* ------------------------------
   *  High contrast switch
   * ------------------------------ */
  const contrastToggle = document.getElementById('contrast-toggle');

// Restaurar preferencia guardada
if (localStorage.getItem('highContrast') === 'true') {
  document.body.classList.add('high-contrast');
}

contrastToggle.addEventListener('click', () => {
  document.body.classList.toggle('high-contrast');

  // Guardar estado
  const isActive = document.body.classList.contains('high-contrast');
  localStorage.setItem('highContrast', isActive);
});
 /* ---------
 * DESTINATIONS SLIDER 
 *----------*/
  new Swiper('.trips-slider', {
    slidesPerView: 2.2,      
    spaceBetween: 8,
    loop: false,
    pagination: false,
    navigation: false,
    breakpoints: {
      1024: {              
        slidesPerView: 4,   
        spaceBetween: 16,
        allowTouchMove: false 
      }
    },
    a11y: {
      enabled: true,
      prevSlideMessage: 'Anterior destino',
      nextSlideMessage: 'Siguiente destino',
      slideLabelMessage: '{{index}} de {{slidesLength}}: {{title}}',
    },
  });

});
 /* ---------
 * BLOG SLIDER 
 *----------*/
const blogSlider = new Swiper('.blog-slider', {
  loop: false,
  slidesPerView: 3,
  spaceBetween: 30,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  on: {
    init: function () {
      makeCarouselAccessible(this);
    },
    slideChange: function () {
      updateSlideAccessibility(this);
    }
  }
});

/* -----------------------------
   ACCESIBILIDAD DEL CARRUSEL
-------------------------------- */
function makeCarouselAccessible(swiper) {
  const wrapper = swiper.el.querySelector('.swiper-wrapper');
  wrapper.setAttribute('role', 'group');
  wrapper.setAttribute('aria-live', 'polite');

  swiper.slides.forEach((slide, index) => {
    slide.setAttribute('role', 'group');
    slide.setAttribute('aria-roledescription', 'slide');
    slide.setAttribute('aria-label', `Slide ${index + 1} de ${swiper.slides.length}`);

    // Solo el slide activo debe ser perceptible
    if (index !== swiper.activeIndex) {
      slide.setAttribute('aria-hidden', 'true');
      slide.tabIndex = -1;
    } else {
      slide.removeAttribute('aria-hidden');
      slide.tabIndex = 0;
    }
  });

  // Pausar desplazamiento cuando tiene foco (importante para WCAG)
  swiper.el.addEventListener('focusin', () => {
    swiper.autoplay?.stop();
  });

  swiper.el.addEventListener('focusout', () => {
    swiper.autoplay?.start();
  });

  // Accesibilidad para botones
  const prev = document.querySelector('.swiper-button-prev');
  const next = document.querySelector('.swiper-button-next');

  if (prev) prev.setAttribute('aria-controls', 'swiper-wrapper');
  if (next) next.setAttribute('aria-controls', 'swiper-wrapper');

  setArrowLabels(swiper);
}

function updateSlideAccessibility(swiper) {
  swiper.slides.forEach((slide, index) => {
    if (index === swiper.activeIndex) {
      slide.removeAttribute('aria-hidden');
      slide.tabIndex = 0;
    } else {
      slide.setAttribute('aria-hidden', 'true');
      slide.tabIndex = -1;
    }
  });

  setArrowLabels(swiper);
}

function setArrowLabels(swiper) {
  const prev = document.querySelector('.swiper-button-prev');
  const next = document.querySelector('.swiper-button-next');

  if (prev) prev.setAttribute('aria-label',
    swiper.activeIndex === 0
      ? 'No hay diapositiva anterior'
      : 'Ir a diapositiva anterior'
  );

  if (next) next.setAttribute('aria-label',
    swiper.activeIndex === swiper.slides.length - 1
      ? 'No hay más diapositivas'
      : 'Ir a diapositiva siguiente'
  );
}
/* ------------------------------
   main menu desktop accessibility
-------------------------------- */
document.querySelectorAll('.has-children > a').forEach(link => {
    link.addEventListener('focus', () => {
        link.parentElement.classList.add('focus');
    });
    link.addEventListener('blur', () => {
        link.parentElement.classList.remove('focus');
    });
});

