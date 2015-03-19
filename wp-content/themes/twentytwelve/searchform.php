<?php
echo '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/' ) ) . '" >
    <div><label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
        <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder='?><?php if (ICL_LANGUAGE_CODE=='he') {?>"חיפוש"<?php } else {?>"Search"<?php } echo '/>
        <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </div>
</form>';