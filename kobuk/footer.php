                        </section>

                        <section class="sidebar visible-sm visible-xs">
                            <?php include( TEMPLATEPATH . '/templates/components/sidebar.php' ); ?>
                        </section>
                    </div>
                </section>

                <footer>
                    <div class="container">
                        <?php include( TEMPLATEPATH . '/templates/components/meta-navigation-bottom.php' ); ?>

                        <div class="text">
                            <?php custom_echo_textelement( 'FOOTER_TEXT', 'html_text' ); ?>
                        </div>
                    </div>
                </footer>
            </main>

            <?php include( TEMPLATEPATH . '/templates/components/analytics.php' ); ?>

            <?php wp_footer(); ?>
        </main>
    </body>
</html>