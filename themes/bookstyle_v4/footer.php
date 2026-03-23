</div><!-- #wrapper -->

<?php if ( is_active_sidebar( 'before-footer-widget' ) ) : ?>
    <div class="before-footer-widgets l_wrap" style="padding: 40px 0; text-align: center; margin-bottom: 0;">
        <?php dynamic_sidebar( 'before-footer-widget' ); ?>
    </div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'right-floating-widget' ) ) : ?>
    <div class="right-floating-widgets">
        <?php dynamic_sidebar( 'right-floating-widget' ); ?>
    </div>
<?php endif; ?>

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



<?php wp_footer(); ?>
</body>

</html>