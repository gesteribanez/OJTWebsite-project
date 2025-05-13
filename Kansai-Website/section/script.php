<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script>
    $(document).ready(function () {
      $(".company-carousel").owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        autoplay: true,
        responsive: {
          0: { items: 1 },
          576: { items: 2 },
          768: { items: 3 },
          992: { items: 4 },
          1200: { items: 5 }
        }
      });
    });
  </script>
  <script>
    $(document).ready(function () {
      $(".cars-carousel").owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
          0: { items: 1 },    // 1 item on mobile
          600: { items: 2 },   // 2 items on tablet
          768: { items: 3 },   // 3 items on small desktop
          992: { items: 4 },   // 4 items on medium desktop
          1200: { items: 5 }, // 5 items on medium desktops (1200-1499px) 
        },
        onInitialized: startAnimation,
        onTranslate: resetAnimation,
        onTranslated: startAnimation
      });

      function startAnimation(event) {
        $('.owl-item.active .cars-details-overlay').css('opacity', '1');
      }

      function resetAnimation(event) {
        $('.cars-details-overlay').css('opacity', '0');
      }
    });
  </script>
  <script>
    function toggleView(viewType) {
      // Hide all views
      document.querySelectorAll('.truck-listings').forEach(el => {
        el.classList.add('d-none');
      });

      // Show selected view
      document.querySelector(`.${viewType}-view`).classList.remove('d-none');

      // Update active button
      document.querySelectorAll('.view-options .btn').forEach(btn => {
        btn.classList.remove('active');
      });
      document.querySelector(`.view-${viewType}`).classList.add('active');

      // Save to localStorage
      localStorage.setItem('truckViewPreference', viewType);
    }

    // Initialize view from localStorage or default to grid
    document.addEventListener('DOMContentLoaded', function () {
      const preferredView = localStorage.getItem('truckViewPreference') || 'grid';
      toggleView(preferredView);
    });
  </script>
   <!-- Add this JavaScript for enhanced effect -->
   <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Enhanced parallax effect on scroll
      const parallaxBg = document.querySelector('.parallax-background');
      
      window.addEventListener('scroll', function() {
        const scrollPosition = window.pageYOffset;
        const speed = 0.3; // Adjust this value to change parallax speed
        const offset = scrollPosition * speed;
        parallaxBg.style.transform = `translate3d(0, ${offset}px, 0)`;
      });
      
      // Initialize AOS if you're using it
      if (typeof AOS !== 'undefined') {
        AOS.init();
      }
    });
  </script>
  <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
  <script>
    // Initialize parallax
    $('.parallax-bridge').parallax({
      speed: 0.5, // Adjust speed (0.1 to 1)
      bleed: 50   // Helps with smooth transition
    });
    
    // Alternative for mobile devices
    if (window.innerWidth < 768) {
      $('.parallax-bridge').css('background-attachment', 'scroll');
    }
  </script>
  <script>
        // Theme management
    document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.querySelector('.dark-mode-toggle');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const currentTheme = localStorage.getItem('theme');
    
    // Set initial theme
    if (currentTheme === 'dark' || (!currentTheme && prefersDark)) {
        document.documentElement.setAttribute('data-theme', 'dark');
    }
    
    // Toggle theme
    themeToggle.addEventListener('click', () => {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    });
    
    // Watch for system theme changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
        if (!localStorage.getItem('theme')) {
        const newTheme = e.matches ? 'dark' : 'light';
        document.documentElement.setAttribute('data-theme', newTheme);
        }
    });
    });
</script>
<script>
function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });
  </script>
  <script>
  let scrollTop = document.querySelector('.scroll-top');

function toggleScrollTop() {
  if (scrollTop) {
    window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
  }
}
scrollTop.addEventListener('click', (e) => {
  e.preventDefault();
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});

window.addEventListener('load', toggleScrollTop);
document.addEventListener('scroll', toggleScrollTop);

/**
 * Animation on scroll function and init
 */
function aosInit() {
  AOS.init({
    duration: 600,
    easing: 'ease-in-out',
    once: true,
    mirror: false
  });
}
window.addEventListener('load', aosInit);

/**
 * Initiate glightbox
 */
const glightbox = GLightbox({
  selector: '.glightbox'
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.getElementById('filter-form');
    const gridView = document.querySelector('.truck-listings.grid-view');
    const listView = document.querySelector('.truck-listings.list-view');
    const loadingSpinner = document.createElement('div');
    loadingSpinner.className = 'text-center my-4';
    loadingSpinner.innerHTML = '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';
    
    // Debounce function to limit how often a function can fire
    function debounce(func, wait) {
        let timeout;
        return function() {
            const context = this, args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                func.apply(context, args);
            }, wait);
        };
    }

    // Function to update listings based on current filters
    const updateListings = debounce(function() {
        // Show loading indicator
        gridView.parentNode.insertBefore(loadingSpinner, gridView.nextSibling);
        gridView.style.opacity = '0.5';
        listView.style.opacity = '0.5';
        
        // Get all form data
        const formData = new FormData(filterForm);
        const params = new URLSearchParams();
        
        // Add all form values to params
        for (const [key, value] of formData.entries()) {
            if (value) params.append(key, value);
        }
        
        // Add current page if it exists
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('page')) {
            params.append('page', urlParams.get('page'));
        }
        
        // AJAX request
        fetch(`?${params.toString()}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            // Parse the response
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            
            // Update the listings
            gridView.innerHTML = doc.querySelector('.grid-view').innerHTML;
            listView.innerHTML = doc.querySelector('.list-view').innerHTML;
            
            // Update pagination
            const newPagination = doc.querySelector('nav[aria-label="Truck listings pagination"]');
            if (newPagination) {
                document.querySelector('nav[aria-label="Truck listings pagination"]').replaceWith(newPagination);
            }
            
            // Update URL without reloading
            const newUrl = `${window.location.pathname}?${params.toString()}`;
            window.history.pushState({}, '', newUrl);
        })
        .catch(error => {
            console.error('Error:', error);
        })
        .finally(() => {
            // Hide loading indicator
            if (loadingSpinner.parentNode) {
                loadingSpinner.parentNode.removeChild(loadingSpinner);
            }
            gridView.style.opacity = '1';
            listView.style.opacity = '1';
        });
    }, 300); // 300ms debounce delay

    // Event listeners for all filter inputs
    if (filterForm) {
      filterForm.querySelectorAll('input[type="checkbox"], select').forEach(input => {
        input.addEventListener('change', updateListings);
      });
      
      // Handle sort dropdown changes
      const sortSelect = document.querySelector('select[name="sort"]');
      if (sortSelect) {
        sortSelect.addEventListener('change', function() {
          const selectedSort = this.value;
          const currentUrl = new URL(window.location.href);
          currentUrl.searchParams.set('sort', selectedSort);
          
          // Show loading indicator
          const loadingSpinner = document.createElement('div');
          loadingSpinner.className = 'spinner-border text-primary';
          this.parentNode.appendChild(loadingSpinner);
          
          // Make AJAX request
          fetch(currentUrl.toString(), {
            headers: {
              'X-Requested-With': 'XMLHttpRequest'
            }
          })
          .then(response => response.text())
          .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            
            // Update the listings
            gridView.innerHTML = doc.querySelector('.grid-view').innerHTML;
            listView.innerHTML = doc.querySelector('.list-view').innerHTML;
            
            // Update URL without reload
            window.history.pushState({}, '', currentUrl.toString());
          })
          .catch(error => console.error('Error:', error))
          .finally(() => {
            loadingSpinner.remove();
          });
        });
      }
      
      // Special handling for range inputs (price, year)
      filterForm.querySelectorAll('input[name="sort"],dropdown').forEach(input => {
        input.addEventListener('change', updateListings);
      });
      
      // Special handling for search input with debouncing
      const searchInput = filterForm.querySelector('input[name="search"]');
      if (searchInput) {
        searchInput.addEventListener('input', debounce(updateListings, 500));
      }
    }
    // Special handling for search input with debouncing
    const searchInput = filterForm.querySelector('input[name="search"]');
    searchInput.addEventListener('input', debounce(updateListings, 500));
    
    // View toggle functionality
    function toggleView(viewType) {
        if (viewType === 'grid') {
            gridView.classList.remove('d-none');
            listView.classList.add('d-none');
            document.querySelector('.view-grid').classList.add('active');
            document.querySelector('.view-list').classList.remove('active');
        } else {
            gridView.classList.add('d-none');
            listView.classList.remove('d-none');
            document.querySelector('.view-grid').classList.remove('active');
            document.querySelector('.view-list').classList.add('active');
        }
        // Store view preference in localStorage
        localStorage.setItem('truckViewPreference', viewType);
    }
    
    // Initialize view from localStorage or default to grid
    const savedView = localStorage.getItem('truckViewPreference') || 'grid';
    toggleView(savedView);
    
    // View toggle buttons
    document.querySelector('.view-grid').addEventListener('click', () => toggleView('grid'));
    document.querySelector('.view-list').addEventListener('click', () => toggleView('list'));
    
    // Handle pagination clicks (event delegation)
    document.addEventListener('click', function(e) {
        if (e.target.closest('.page-link') && !e.target.closest('.page-link').classList.contains('disabled')) {
            e.preventDefault();
            const pageUrl = e.target.closest('.page-link').getAttribute('href');
            
            // Update URL and trigger listing update
            window.history.pushState({}, '', pageUrl);
            updateListings();
        }
    });
    
    // Handle browser back/forward navigation
    window.addEventListener('popstate', function() {
        updateListings();
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const emailForm = document.getElementById('emailsend');

    emailForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const formData = new FormData(emailForm);

      Swal.fire({
        title: 'Confirm Submission',
        html: '<p>Are you sure you want to send this email?</p>',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, send it!',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: 'Sending...',
            html: '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p>Please wait while we send your email.</p>',
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
              Swal.showLoading();
            }
          });

          fetch('contact.php', {
            method: 'POST',
            body: formData
          })
            .then((response) => response.text())
            .then((response) => {
              if (response.includes('Error')) {
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: response,
                  confirmButtonColor: '#d33'
                });
              } else {
                Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: 'Message successfully sent!',
                  confirmButtonColor: '#3085d6'
                });
                emailForm.reset();
              }
            })
            .catch((error) => {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                confirmButtonColor: '#d33'
              });
              console.error('Error:', error);
            });
        }
      });
    });
  });
</script>
<script>/* JavaScript for Image Slider */
document.addEventListener('DOMContentLoaded', function() {
  const slides = document.querySelectorAll('.slider-wrapper img');
  const dots = document.querySelectorAll('.dot');
  const thumbnails = document.querySelectorAll('.thumbnail-modern');
  const prevArrow = document.querySelector('.prev-arrow');
  const nextArrow = document.querySelector('.next-arrow');
  let currentSlide = 0;
  let slideCount = slides.length;
  let slideInterval;
  
  if (slideCount === 0) return;
  
  // Show a specific slide
  function showSlide(index) {
    // Remove active class from all slides/dots/thumbnails
    slides.forEach(slide => slide.classList.remove('active-slide'));
    dots.forEach(dot => dot.classList.remove('active'));
    thumbnails.forEach(thumb => thumb.classList.remove('active'));
    
    // Wrap around if needed
    if (index >= slideCount) currentSlide = 0;
    else if (index < 0) currentSlide = slideCount - 1;
    else currentSlide = index;
    
    // Add active class to current slide/dot/thumbnail
    slides[currentSlide].classList.add('active-slide');
    dots[currentSlide].classList.add('active');
    thumbnails[currentSlide].classList.add('active');
  }

  // Auto-advance slides
  function startSlideShow() {
    slideInterval = setInterval(() => {
      const newIndex = (currentSlide + 1) % slides.length;
      showSlide(newIndex);
    }, 5000);
  }

  function stopSlideShow() {
    clearInterval(slideInterval);
  }
  
  // Event listeners for arrows
  if (prevArrow) {
    prevArrow.addEventListener('click', () => {
      stopSlideShow();
      showSlide(currentSlide - 1);
      startSlideShow();
    });
  }
  
  if (nextArrow) {
    nextArrow.addEventListener('click', () => {
      stopSlideShow();
      showSlide(currentSlide + 1);
      startSlideShow();
    });
  }
  
  // Event listeners for dots
  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      stopSlideShow();
      showSlide(index);
      startSlideShow();
    });
  });
  
  // Event listeners for thumbnails
  thumbnails.forEach((thumb, index) => {
    thumb.addEventListener('click', () => {
      stopSlideShow();
      showSlide(index);
      startSlideShow();
    });
  });
  
  // Tab switching logic
  const tabLinks = document.querySelectorAll('.tab-link-modern');
  const tabPanes = document.querySelectorAll('.tab-pane-modern');
  
  tabLinks.forEach(link => {
    link.addEventListener('click', function() {
      // Remove active class from all tabs
      tabLinks.forEach(tab => tab.classList.remove('active'));
      tabPanes.forEach(pane => pane.classList.remove('active'));
      
      // Add active class to current tab
      this.classList.add('active');
      const tabId = this.getAttribute('data-tab');
      document.getElementById(tabId).classList.add('active');
    });
  });

  // Start the slideshow
  startSlideShow();
});
</script>
<script>
function openInquiryTab(truckId) {
  // Open the inquiry form in a new tab with the truck ID
  window.open('truck_inquiry.php?id=' + truckId, '_blank');
}
</script>
<script>
function openInquiry(truckId, truckCode) {
  // Open the inquiry form in a new tab with the truck ID and code
  window.open('truck_inquiry.php?id=' + truckId + '&code=' + truckCode, '_blank');
}
</script>
<script>
function openContactTab(truckId) {
  // Open the contact page in a new tab with the truck ID
  window.open('contact_form.php?id=' + truckId, '_blank');
}
</script>