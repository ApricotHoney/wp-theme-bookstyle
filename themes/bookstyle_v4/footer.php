</div><!-- #wrapper -->

<footer id="footer" class="footer">
    <!-- Cat image (sitting on top of footer) -->
    <img src="<?php echo get_template_directory_uri(); ?>/images/hatchan.png" alt="BookStyle Cat" class="cat-image">

    <div class="footer-inner">
        <p class="copyright">copyright© BookStyle All Rights Reserved.</p>
    </div>
</footer>

<!-- Modal Template -->
<div id="book-modal" class="modal">
    <div class="modal-overlay"></div>
    <div class="modal-content">
        <span class="modal-close">&times;</span>
        <div class="modal-header">
            <span id="modal-title">No.xxx</span>
            <span class="modal-tags"></span> <!-- Placeholder tags -->
        </div>
        <div class="modal-body">
            <!-- Swiper Container -->
            <div class="modal-image-container swiper">
                <div class="swiper-wrapper" id="modal-swiper-wrapper">
                    <!-- Slides injected by JS -->
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
            <div class="modal-actions">
                <div class="terms-check">
                    <label><input type="checkbox" id="modal-terms-checkbox"> <a
                            href="<?php echo esc_url(home_url('/about#ToS')); ?>"
                            target="_blank" rel="noopener noreferrer" class="bd-link">利用規約</a>に同意し使用する</label>
                </div>
                <div class="action-buttons">
                    <a href="#" id="modal-btn-personal" class="btn btn-green bd-disabled">個人利用する <span
                            class="arrow"></span></a>
                    <a href="#" id="modal-btn-commercial" class="btn btn-blue bd-disabled">商用利用する <span
                            class="arrow"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Swiper JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        var searchForms = document.querySelectorAll('.search-form');
        searchForms.forEach(function(searchForm) {
            var inputs = searchForm.querySelectorAll('select, input[type="radio"]');
            inputs.forEach(function (input) {
                input.addEventListener('change', function () {
                    // If it's a radio button, we might want to uncheck if clicked again? 
                    // Standard radio behavior is cannot uncheck. 
                    // Implementation: just submit on change.
                    searchForm.submit();
                });
            });
        });

        // Modal Terms Checkbox Logic
        const termsCheckbox = document.getElementById('modal-terms-checkbox');
        const btnPersonal = document.getElementById('modal-btn-personal');
        const btnCommercial = document.getElementById('modal-btn-commercial');

        if (termsCheckbox && btnPersonal && btnCommercial) {
            // Initial state (in case browser remembers checkbox state on reload)
            toggleButtons(termsCheckbox.checked);

            termsCheckbox.addEventListener('change', function () {
                toggleButtons(this.checked);
            });

            function toggleButtons(isChecked) {
                if (isChecked) {
                    btnPersonal.classList.remove('bd-disabled');
                    btnCommercial.classList.remove('bd-disabled');
                } else {
                    btnPersonal.classList.add('bd-disabled');
                    btnCommercial.classList.add('bd-disabled');
                }
            }
        }
    });
</script>
<?php wp_footer(); ?>
</body>

</html>