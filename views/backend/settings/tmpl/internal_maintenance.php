<?php
/** no direct access **/
defined('_WPLEXEC') or die('Restricted access');
?>
<div class="wpl_maintenance"><div class="wpl_show_message"></div></div>
<div class="wpl-maintenance-container">
	<ul>
    	<li onclick="wpl_clear_properties_cached_datas(0);">
            <i class="icon-trash"></i>
            <span class="wpl_ajax_loader" id="wpl_properties_cached_ajax_loader"></span>
            <span class="title">
                <?php echo __("Clear listings' cached data", WPL_TEXTDOMAIN); ?>
            </span>
        </li>
    </ul>
</div>