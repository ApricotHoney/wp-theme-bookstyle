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
            <div class="modal-image-container">
                <img id="modal-img" src="" alt="Book Cover">
            </div>
            <div class="modal-actions">
                <div class="terms-check">
                    <label><input type="checkbox"> <a href="#" class="bd-link">利用規約</a>に同意する</label>
                </div>
                <div class="action-buttons">
                    <a href="#" class="btn btn-green">個人利用で使用する <span class="arrow"></span></a>
                    <a href="#" class="btn btn-blue">商用利用で使用する <span class="arrow"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        var searchForm = document.querySelector('.search-form');
        if (searchForm) {
            var inputs = searchForm.querySelectorAll('select, input[type="radio"]');
            inputs.forEach(function (input) {
                input.addEventListener('change', function () {
                    // If it's a radio button, we might want to uncheck if clicked again? 
                    // Standard radio behavior is cannot uncheck. 
                    // Implementation: just submit on change.
                    searchForm.submit();
                });
            });
        }
    });
</script>
<?php wp_footer(); ?>
</body>

</html>