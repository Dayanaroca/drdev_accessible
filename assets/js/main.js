document.addEventListener('DOMContentLoaded', function() {
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
        if (e.shiftKey) {
          if (document.activeElement === firstEl) {
            e.preventDefault();
            lastEl.focus();
          }
        } else {
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
  if (localStorage.getItem('highContrast') === 'true') {
    document.body.classList.add('high-contrast');
  }
  if (contrastToggle) {
    contrastToggle.addEventListener('click', () => {
      document.body.classList.toggle('high-contrast');
      localStorage.setItem('highContrast', document.body.classList.contains('high-contrast'));
    });
  }

  /* ------------------------------
   * DESTINATIONS SLIDER
   * ------------------------------ */
  new Swiper('.trips-slider', {
    slidesPerView: 2.2,
    spaceBetween: 8,
    loop: false,
    pagination: false,
    navigation: false,
    breakpoints: {
       768: { slidesPerView: 3.2, spaceBetween: 10 },
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

  /* ------------------------------
   * DESTINATIONS SLIDER BLOG
   * ------------------------------ */
  new Swiper('.trips-blog-slider', {
    slidesPerView: 2.2,
    spaceBetween: 8,
    loop: false,
    pagination: false,
    navigation: false,
    breakpoints: {
       768: { slidesPerView: 3.2, spaceBetween: 10 },
      1024: {
        slidesPerView: 5,
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
  /* ------------------------------
   * BLOG SLIDER
   * ------------------------------ */
  const blogContainer = document.querySelector('.blog-slider-container');
  if (blogContainer) {
    const blogSlider = new Swiper(blogContainer.querySelector('.blog-slider'), {
      loop: false,
      slidesPerView: 1,
      spaceBetween: 30,
      navigation: {
        nextEl: blogContainer.querySelector('.swiper-button-next'),
        prevEl: blogContainer.querySelector('.swiper-button-prev'),
      },
      breakpoints: {
        768: { slidesPerView: 2, spaceBetween: 20, centeredSlides: false },
        1024: { slidesPerView: 3, spaceBetween: 30, centeredSlides: false }
      },
      on: {
        init: function() { makeCarouselAccessible(this, blogContainer); },
        slideChange: function() { updateSlideAccessibility(this, blogContainer); }
      }
    });
  }

  /* ------------------------------
   * TESTIMONIOS SLIDER
   * ------------------------------ */
  const testimoniosContainer = document.querySelector('.testimonios-container');
  if (testimoniosContainer) {
    const testimoniosSwiper = new Swiper(testimoniosContainer.querySelector('.testimoniosSwiper'), {
      //loop: true,
      slidesPerView: 1,
      spaceBetween: 20,
      centeredSlides: true,
      initialSlide: 0,
      grabCursor: true,
      watchOverflow: true,
      preloadImages: true,
      lazy: false,
      pagination: {
        el: testimoniosContainer.querySelector('.swiper-pagination'),
        clickable: true,
        bulletElement: 'span',
        type: 'bullets'
      },
      navigation: {
        nextEl: testimoniosContainer.querySelector('.swiper-button-next'),
        prevEl: testimoniosContainer.querySelector('.swiper-button-prev'),
      },
      breakpoints: {
        768: { slidesPerView: 1.2, spaceBetween: 20 },
        1024: { slidesPerView: 2.2, spaceBetween: 50 }
      },
      on: {
        init: function() { makeCarouselAccessible(this, testimoniosContainer); },
        slideChange: function() { updateSlideAccessibility(this, testimoniosContainer); }
      }
    });
  }

  /* ------------------------------
   * ACCESIBILIDAD DEL CARRUSEL
   * ------------------------------ */
  function makeCarouselAccessible(swiper, container) {
    const wrapper = container.querySelector('.swiper-wrapper');
    wrapper.setAttribute('role', 'group');
    wrapper.setAttribute('aria-live', 'polite');

    swiper.slides.forEach((slide, index) => {
      slide.setAttribute('role', 'group');
      slide.setAttribute('aria-roledescription', 'slide');
      slide.setAttribute('aria-label', `Slide ${index + 1} de ${swiper.slides.length}`);
      if (index !== swiper.activeIndex) {
        slide.setAttribute('aria-hidden', 'true');
        slide.tabIndex = -1;
      } else {
        slide.removeAttribute('aria-hidden');
        slide.tabIndex = 0;
      }
    });

    // Pausar autoplay si existe al enfocarse
    swiper.el.addEventListener('focusin', () => swiper.autoplay?.stop());
    swiper.el.addEventListener('focusout', () => swiper.autoplay?.start());

    // Botones accesibles
    const prev = container.querySelector('.swiper-button-prev');
    const next = container.querySelector('.swiper-button-next');
    if (prev) prev.setAttribute('aria-controls', 'swiper-wrapper');
    if (next) next.setAttribute('aria-controls', 'swiper-wrapper');

    setArrowLabels(swiper, container);
  }

  function updateSlideAccessibility(swiper, container) {
    swiper.slides.forEach((slide, index) => {
      if (index === swiper.activeIndex) {
        slide.removeAttribute('aria-hidden');
        slide.tabIndex = 0;
      } else {
        slide.setAttribute('aria-hidden', 'true');
        slide.tabIndex = -1;
      }
    });
    setArrowLabels(swiper, container);
  }

  function setArrowLabels(swiper, container) {
    const prev = container.querySelector('.swiper-button-prev');
    const next = container.querySelector('.swiper-button-next');

    if (prev) prev.setAttribute('aria-label',
      swiper.activeIndex === 0 ? 'No hay diapositiva anterior' : 'Ir a diapositiva anterior'
    );
    if (next) next.setAttribute('aria-label',
      swiper.activeIndex === swiper.slides.length - 1 ? 'No hay más diapositivas' : 'Ir a diapositiva siguiente'
    );
  }

  /* ------------------------------
   * MAIN MENU DESKTOP ACCESSIBILITY
   * ------------------------------ */
  document.querySelectorAll('.has-children > a').forEach(link => {
    link.addEventListener('focus', () => link.parentElement.classList.add('focus'));
    link.addEventListener('blur', () => link.parentElement.classList.remove('focus'));
  });

  /* ------------------------------
   * VIDEO ACCESSIBILITY
   * ------------------------------ */
  const playBtn = document.getElementById("playVideoButton");
  const cover = document.getElementById("videoCover");
  const container = document.getElementById("videoContainer");

  if (playBtn && cover && container) {
    playBtn.addEventListener("click", function() {
      cover.style.display = "none";
      container.innerHTML = `
        <iframe
          width="100%"
          height="500"
          src="https://www.youtube.com/embed/ixGRkYqX5cs?autoplay=1&rel=0&modestbranding=1"
          title="Reproductor del video sobre destinos accesibles"
          allow="autoplay; encrypted-media"
          allowfullscreen
        ></iframe>
      `;
      container.setAttribute("aria-hidden", "false");
    });
  }
});
/* ------------------------------
  * FAQ
  * ------------------------------ */
  function toggleFaq(index) {
    const answer = document.getElementById(`faq-answer-${index}`);
    const button = answer.previousElementSibling;
    const icon = button.querySelector('.faq-toggle-icon');
        
    // Toggle visibility
    answer.classList.toggle('hidden');
        
    // Update ARIA attributes
    const isExpanded = answer.classList.contains('hidden') ? 'false' : 'true';
    button.setAttribute('aria-expanded', isExpanded);
    const faqItem = button.closest('.faq-item');
    if (isExpanded === 'true') {
      faqItem.classList.remove('border-b', 'border-secondary');
      faqItem.classList.remove('pb-8');
      icon.innerHTML = `<path fill-rule="evenodd" clip-rule="evenodd" d="M6.28531 13.4103C6.74906 12.9466 7.50094 12.9466 7.96469 13.4103L19 24.4456L30.0353 13.4103C30.4991 12.9466 31.2509 12.9466 31.7147 13.4103C32.1784 13.8741 32.1784 14.6259 31.7147 15.0897L19.8397 26.9647C19.3759 27.4284 18.6241 27.4284 18.1603 26.9647L6.28531 15.0897C5.82156 14.6259 5.82156 13.8741 6.28531 13.4103Z" fill="currentColor"/>`;
    } else {
      faqItem.classList.add('border-b', 'border-secondary');
      faqItem.classList.add('pb-8');
      icon.innerHTML = `<path fill-rule="evenodd" clip-rule="evenodd" d="M4.75 19C4.75 18.3442 5.28166 17.8125 5.9375 17.8125H32.0625C32.7183 17.8125 33.25 18.3442 33.25 19C33.25 19.6558 32.7183 20.1875 32.0625 20.1875H5.9375C5.28166 20.1875 4.75 19.6558 4.75 19Z" fill="currentColor"/>
      <path fill-rule="evenodd" clip-rule="evenodd" d="M19 4.75C19.6558 4.75 20.1875 5.28166 20.1875 5.9375V32.0625C20.1875 32.7183 19.6558 33.25 19 33.25C18.3442 33.25 17.8125 32.7183 17.8125 32.0625V5.9375C17.8125 5.28166 18.3442 4.75 19 4.75Z" fill="currentColor"/>`;
    }
  };
    /* ------------------------------
  * currency
  * ------------------------------ */
  (function () {

    const RATE_EUR_TO_USD = 1.1;
    const STORAGE_KEY = 'currency';

    const toggle = document.getElementById('currency-toggle');
    const menu   = document.getElementById('currency-menu');
    const items  = menu.querySelectorAll('[role="menuitemradio"]');
    const priceElements = document.querySelectorAll('.travel-price');

    function updatePrices(currency) {

        priceElements.forEach(priceEl => {

            const basePrice = parseFloat(priceEl.dataset.basePrice);
            const valueEl  = priceEl.querySelector('.price-value');
            const symbolEl = priceEl.querySelector('.price-symbol');

            let price, symbol, label;

            if (currency === 'USD') {
               price = Math.round(basePrice * RATE_EUR_TO_USD);
                symbol = '$';
                label  = 'dólares estadounidenses';
            } else {
                price = Math.round(basePrice);
                symbol = '€';
                label  = 'euros';
            }

            valueEl.textContent  = price;
            symbolEl.textContent = symbol;

            priceEl.setAttribute('aria-label', `${price} ${label}`);
        });
    }

    /* =========================
       Toggle menú
       ========================= */
    toggle.addEventListener('click', () => {
        const expanded = toggle.getAttribute('aria-expanded') === 'true';
        toggle.setAttribute('aria-expanded', String(!expanded));
        menu.classList.toggle('hidden');
    });

    /* =========================
       Selección moneda
       ========================= */
    items.forEach(item => {
        item.addEventListener('click', () => {

            const currency = item.dataset.currency;

            localStorage.setItem(STORAGE_KEY, currency);

            items.forEach(i => i.setAttribute('aria-checked', 'false'));
            item.setAttribute('aria-checked', 'true');

            toggle.querySelector('span').textContent = currency;
            toggle.querySelector('img').src =
                `/wp-content/themes/drdevaccesible/assets/images/icons/${currency.toLowerCase()}.svg`;

            toggle.setAttribute('aria-expanded', 'false');
            menu.classList.add('hidden');

            updatePrices(currency);
        });
    });

    /* =========================
       Escape
       ========================= */
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') {
            toggle.setAttribute('aria-expanded', 'false');
            menu.classList.add('hidden');
        }
    });

    /* =========================
       Carga inicial
       ========================= */
    document.addEventListener('DOMContentLoaded', () => {
        const savedCurrency =
            localStorage.getItem(STORAGE_KEY) || 'EUR';

        const item =
            menu.querySelector(`[data-currency="${savedCurrency}"]`);

        if (item) item.click();
        else updatePrices('EUR');
    });

})();

document.getElementById('currency-selector').addEventListener('change', function () {
    document.getElementById('currency-status').textContent =
        this.value === 'USD'
            ? 'Mostrando precios en dólares estadounidenses'
            : 'Mostrando precios en euros';
});

