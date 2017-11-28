<?php if( $paginationLinks ) { ?>
    <nav class="pagination">
        <ul>
            <?php foreach( $paginationLinks as $paginationLink ) { ?>
                <li>
                    <?php echo $paginationLink; ?>
                </li>
            <?php } ?>
        </ul>
    </nav>
<?php } ?>






