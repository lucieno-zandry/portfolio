<div class="lang-selector-floating">
    <form action="" method="GET" id="langForm">
        <label for="lang-select" class="sr-only">Choose Language</label>
        <div class="select-wrapper">
            <svg class="lang-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="2" y1="12" x2="22" y2="12"></line>
                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
            </svg>

            <select name="lang" id="lang-select">
                <?php foreach (ALLOWED_LANGUAGES as $key => $value) : ?>
                    <option
                        value="<?= htmlspecialchars($key) ?>"
                        data-long="<?= htmlspecialchars($value['label']) ?>"
                        data-short="<?= htmlspecialchars(strtoupper($key)) ?>"
                        <?php if (load_lang() === htmlspecialchars($key)) echo "selected" ?>>
                        <?= htmlspecialchars($value['label']) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <button type="submit" class="lang-submit-btn sr-only" id="lang-submit-btn">Change</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const button = document.querySelector('#lang-submit-btn');
        const langSelect = document.querySelector('#lang-select');

        if (!button || !langSelect) return;

        // Swaps between target strings on window resize limits
        const adaptLabels = () => {
            const isMobile = window.innerWidth <= 760;
            langSelect.querySelectorAll('option').forEach(option => {
                option.textContent = isMobile ? option.dataset.short : option.dataset.long;
            });
        };

        // Initialize display configuration and track browser layout updates
        adaptLabels();
        window.addEventListener('resize', adaptLabels);

        langSelect.addEventListener('change', () => {
            button.click();
        });
    });
</script>