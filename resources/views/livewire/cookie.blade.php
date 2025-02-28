<div>
    
  <!-- Cookie Consent Banner - Hidden by default -->
  <div id="cookie-banner" class="fixed bottom-0 left-0 right-0 bg-gray-800 text-white p-4 md:p-6 z-50 transform transition-transform duration-500 translate-y-full shadow-lg">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
      <div class="mb-4 md:mb-0 md:pr-8 md:w-3/4">
        <h3 class="text-lg font-semibold mb-2">Nous utilisons des cookies</h3>
        <p class="text-gray-300 text-sm md:text-base">
          Nous utilisons des cookies et des technologies similaires pour personnaliser le contenu, améliorer votre expérience et analyser notre trafic. En cliquant sur "Tout accepter", vous consentez à notre utilisation des cookies. Vous pouvez gérer vos préférences en cliquant sur "Paramètres des cookies".
        </p>
      </div>
      <div class="flex flex-col sm:flex-row gap-3">
        <button id="cookie-settings-btn" class="px-4 py-2 bg-transparent border border-white rounded-md hover:bg-gray-700 transition-colors duration-200 text-sm">
          Paramètres des cookies
        </button>
        <button id="accept-cookies-btn" class="px-4 py-2 bg-red-600 rounded-md hover:bg-red-700 transition-colors duration-200 text-sm font-medium">
          Tout accepter
        </button>
      </div>
    </div>
  </div>

  <!-- Cookie Settings Modal -->
  <div id="cookie-settings-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white text-gray-800 rounded-lg max-w-lg w-full mx-4 shadow-xl">
      <div class="p-5 border-b border-gray-200">
        <div class="flex justify-between items-center">
          <h3 class="text-xl font-semibold">Paramètres des cookies</h3>
          <button id="close-settings" class="text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
      
      <div class="p-5 max-h-96 overflow-y-auto">
        <div class="mb-6">
          <div class="flex items-center justify-between mb-2">
            <div>
              <h4 class="font-semibold">Cookies Essentiels</h4>
              <p class="text-sm text-gray-600">Ces cookies sont nécessaires au bon fonctionnement du site web.</p>
            </div>
            <div class="relative">
              <input type="checkbox" id="essential-cookies" class="opacity-0 absolute" checked disabled>
              <label for="essential-cookies" class="block w-10 h-6 rounded-full bg-gray-300 cursor-not-allowed"></label>
              <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform translate-x-4"></div>
            </div>
          </div>
        </div>
        
        <div class="mb-6">
          <div class="flex items-center justify-between mb-2">
            <div>
              <h4 class="font-semibold">Cookies Analytiques</h4>
              <p class="text-sm text-gray-600">Ces cookies nous aident à améliorer notre site web en collectant des données anonymes.</p>
            </div>
            <div class="relative">
              <input type="checkbox" id="analytics-cookies" class="sr-only">
              <label for="analytics-cookies" class="block w-10 h-6 rounded-full bg-gray-300 cursor-pointer transition"></label>
              <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform"></div>
            </div>
          </div>
        </div>
        
        <div class="mb-6">
          <div class="flex items-center justify-between mb-2">
            <div>
              <h4 class="font-semibold">Cookies Marketing</h4>
              <p class="text-sm text-gray-600">Ces cookies sont utilisés pour suivre les visiteurs sur les sites web afin d'afficher des publicités pertinentes.</p>
            </div>
            <div class="relative">
              <input type="checkbox" id="marketing-cookies" class="sr-only">
              <label for="marketing-cookies" class="block w-10 h-6 rounded-full bg-gray-300 cursor-pointer transition"></label>
              <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform"></div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="p-5 border-t border-gray-200 flex justify-end gap-3">
        <button id="save-preferences" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200 text-sm font-medium">
          Enregistrer les préférences
        </button>
      </div>
    </div>
  </div>

  <script>
    // DOM Elements
    const cookieBanner = document.getElementById('cookie-banner');
    const acceptCookiesBtn = document.getElementById('accept-cookies-btn');
    const cookieSettingsBtn = document.getElementById('cookie-settings-btn');
    const cookieSettingsModal = document.getElementById('cookie-settings-modal');
    const closeSettingsBtn = document.getElementById('close-settings');
    const savePreferencesBtn = document.getElementById('save-preferences');
    const analyticsCookiesToggle = document.getElementById('analytics-cookies');
    const marketingCookiesToggle = document.getElementById('marketing-cookies');

    // Toggle switches functionality
    document.querySelectorAll('input[type="checkbox"].sr-only').forEach(checkbox => {
      const label = checkbox.nextElementSibling;
      const dot = label.nextElementSibling;

      checkbox.addEventListener('change', function() {
        if (this.checked) {
          label.classList.remove('bg-gray-300');
          label.classList.add('bg-red-600');  // Changed to red
          dot.classList.add('translate-x-4');
        } else {
          label.classList.remove('bg-red-600');  // Changed to red
          label.classList.add('bg-gray-300');
          dot.classList.remove('translate-x-4');
        }
      });
    });

    // Check if cookies consent is already given
    function checkCookieConsent() {
      return localStorage.getItem('cookieConsent');
    }

    // Set cookie consent in localStorage
    function setCookieConsent(preferences) {
      localStorage.setItem('cookieConsent', JSON.stringify(preferences));
      hideCookieBanner();
    }

    // Show the cookie banner
    function showCookieBanner() {
      cookieBanner.classList.remove('translate-y-full');
      cookieBanner.classList.add('translate-y-0');
    }

    // Hide the cookie banner
    function hideCookieBanner() {
      cookieBanner.classList.remove('translate-y-0');
      cookieBanner.classList.add('translate-y-full');
    }

    // Show cookie settings modal
    function showCookieSettings() {
      cookieSettingsModal.classList.remove('hidden');
      
      // Load saved preferences if any
      const savedPreferences = JSON.parse(localStorage.getItem('cookieConsent') || '{}');
      if (savedPreferences.analytics) {
        analyticsCookiesToggle.checked = true;
        analyticsCookiesToggle.dispatchEvent(new Event('change'));
      }
      if (savedPreferences.marketing) {
        marketingCookiesToggle.checked = true;
        marketingCookiesToggle.dispatchEvent(new Event('change'));
      }
    }

    // Hide cookie settings modal
    function hideCookieSettings() {
      cookieSettingsModal.classList.add('hidden');
    }

    // Accept all cookies
    acceptCookiesBtn.addEventListener('click', function() {
      setCookieConsent({
        essential: true,
        analytics: true,
        marketing: true
      });
      console.log('Tous les cookies acceptés');
    });

    // Open cookie settings
    cookieSettingsBtn.addEventListener('click', showCookieSettings);

    // Close cookie settings
    closeSettingsBtn.addEventListener('click', hideCookieSettings);

    // Save preferences
    savePreferencesBtn.addEventListener('click', function() {
      setCookieConsent({
        essential: true, // Essential cookies are always required
        analytics: analyticsCookiesToggle.checked,
        marketing: marketingCookiesToggle.checked
      });
      console.log('Préférences de cookies enregistrées:', {
        essential: true,
        analytics: analyticsCookiesToggle.checked,
        marketing: marketingCookiesToggle.checked
      });
      hideCookieSettings();
    });

    // Initialize banner state
    document.addEventListener('DOMContentLoaded', function() {
      // Check for consent before showing banner
      if (!checkCookieConsent()) {
        // Only show banner if consent hasn't been given
        setTimeout(showCookieBanner, 300); // Small delay for better UX
      }
    });
  </script>

</div>