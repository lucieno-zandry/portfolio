document.addEventListener('DOMContentLoaded', () => {
    const langSelect = document.getElementById('lang-select');
    const langForm = document.getElementById('langForm');

    if (langSelect && langForm) {
        // 1. Synchronize dropdown selection with the active URL parameter (?lang=xx)
        const urlParams = new URLSearchParams(window.location.search);
        const currentLang = urlParams.get('lang');

        if (currentLang) {
            langSelect.value = currentLang;
        }

        // 2. Automatically submit the form on change
        langSelect.addEventListener('change', () => {
            langForm.submit();
        });
    }
});