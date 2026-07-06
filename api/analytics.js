/**
 * Stealth Portfolio Visitor Tracker
 * Extracts traffic source, gathers minimal device context, 
 * cleans the URL, and alerts the backend API.
 */

(function() {
  // 1. Configuration
  const API_ENDPOINT = window.apiUrl; 
  const DELAY_MS = 2000; // 2-second delay to filter out instant bounces / fast bot hits

  // 2. Extract Traffic Source & Tracking Data
  function getTrafficSource() {
    const urlParams = new URLSearchParams(window.location.search);
    
    // Check for custom tracking token first (e.g., ?ref=resume_apple)
    if (urlParams.has('ref')) {
      return { source: urlParams.get('ref'), type: 'custom_token' };
    }
    
    // Fallback to standard marketing UTM tags
    if (urlParams.has('utm_source')) {
      return { source: urlParams.get('utm_source'), type: 'utm' };
    }
    
    // Fallback to native browser referrer (where they came from)
    if (document.referrer) {
      try {
        const referrerUrl = new URL(document.referrer);
        // Ignore internal navigation if they are browsing through your own pages
        if (referrerUrl.hostname !== window.location.hostname) {
          return { source: document.referrer, type: 'referrer' };
        }
      } catch (e) {
        return { source: document.referrer, type: 'referrer_error' };
      }
    }
    
    return { source: 'Direct / Unknown', type: 'direct' };
  }

  // 3. Clean the URL Bar Instantly (Seamless UI)
  function cleanUrlBar() {
    if (window.history && window.history.replaceState) {
      const url = new URL(window.location.href);
      // Remove tracking parameters from display
      url.searchParams.delete('ref');
      url.searchParams.delete('utm_source');
      url.searchParams.delete('utm_medium');
      url.searchParams.delete('utm_campaign');
      
      // Reconstruct clean URL string
      const cleanUrl = url.pathname + url.search + url.hash;
      window.history.replaceState({}, document.title, cleanUrl);
    }
  }

  // 4. Gather Payload & Fire API Call
  function trackVisit() {
    const traffic = getTrafficSource();
    
    // Clean URL bar immediately after extracting data so the user never notices
    cleanUrlBar();

    // Prepare payload
    const payload = {
      tracking: {
        source: traffic.source,
        type: traffic.type
      },
      context: {
        landingPage: window.location.pathname,
        fullUrl: window.location.href,
        timestamp: new Date().toISOString(),
        language: navigator.language || navigator.userLanguage
      },
      device: {
        screenResolution: `${window.screen.width}x${window.screen.height}`,
        viewportSize: `${window.innerWidth}x${window.innerHeight}`,
        userAgent: navigator.userAgent
      }
    };

    // Fire asynchronous background request
    // Using standard fetch with keepalive ensures it finishes even if they close the tab quickly
    fetch(API_ENDPOINT, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(payload),
      keepalive: true 
    })
    .then(response => {
      // Silent success - no console logs so it remains hidden
    })
    .catch(error => {
      // Silent catch to prevent throwing visible errors in the user's console
    });
  }

  // 5. Execution Trigger
  if (document.readyState === 'complete') {
    setTimeout(trackVisit, DELAY_MS);
  } else {
    window.addEventListener('load', () => {
      setTimeout(trackVisit, DELAY_MS);
    });
  }
})();