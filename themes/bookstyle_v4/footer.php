<footer id="footer" class="footer">
    <!-- Cat image (sitting on top of footer) -->
    <img src="<?php echo get_template_directory_uri(); ?>/images/hatchan.png" alt="BookStyle Cat" class="cat-image">

    <div class="footer-inner">
        <nav class="footMenu">
            <?php wp_nav_menu(array(
                'theme_location' => 'footMenu',
                'container' => false,
                'depth' => 1
            )); ?>
        </nav>
        
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
            <span class="modal-tags">#アンティーク #赤 #植物</span> <!-- Placeholder tags -->
        </div>
        <div class="modal-body">
            <div class="modal-image-container">
                <img id="modal-img" src="" alt="Book Cover">
            </div>
            <div class="modal-actions">
                <div class="terms-check">
                    <label><input type="checkbox"> 利用規約に同意する</label>
                </div>
                <div class="action-buttons">
                    <a href="#" class="btn btn-green">個人利用で使用する ></a>
                    <a href="#" class="btn btn-blue">商用利用で使用する ></a>
                </div>
            </div>
        </div>
    </div>
</div>

</div><!-- #wrapper -->

<?php wp_footer(); ?>
</body>
</html>
