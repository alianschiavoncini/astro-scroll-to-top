<?php
$enable_everywhere = get_option(ASTRO_STT_PREFIX . 'enable_everywhere');

if (!$enable_everywhere || $enable_everywhere == '') { return; }
?>
<div class="astro_stt">
    <div class="astro_stt_inner">
        <button class="astro_stt_button">
            <svg class="astro_stt_icon" width="15" height="15" viewBox="0 0 20 20"><path d="M10,0L9.4,0.6L0.8,9.1l1.2,1.2l7.1-7.1V20h1.7V3.3l7.1,7.1l1.2-1.2l-8.5-8.5L10,0z"></path></svg>
        </button>
    </div>
</div>
