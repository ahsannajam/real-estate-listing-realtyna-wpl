<?php
/** no direct access **/
defined('_WPLEXEC') or die('Restricted access');
?>
<div class="short-code-wp wpl_shortcode_wizard_container" id="wpl_shortcode_wizard_container">
    <h2>
        <i class="icon-shortcode"></i>
        <span>
            <?php echo __('WPL Shortcodes', WPL_TEXTDOMAIN); ?>
            
        </span>
        <button class="wpl-button button-1" onclick="insert_shortcode();"><?php echo __('Insert', WPL_TEXTDOMAIN); ?></button>
    </h2>
    <div class="short-code-body">
        <!--<div class="plugin-row plugin-row-buttons"></div>-->
        <div class="plugin-row wpl_select_view">
            <label for="view_selectbox"><?php echo __('View', WPL_TEXTDOMAIN); ?></label>
            <select id="view_selectbox" onchange="wpl_view_selected(this.value);">
                <option value="property_listing"><?php echo __('Property listing', WPL_TEXTDOMAIN); ?></option>
                <option value="property_show"><?php echo __('Property show', WPL_TEXTDOMAIN); ?></option>
                <option value="profile_listing"><?php echo __('Profile/Agent listing', WPL_TEXTDOMAIN); ?></option>
            </select>
        </div>
		
        <div class="plugin-row wpl_shortcode_parameter wpl_hidden_element pr_property_listing">
            <?php $listings = wpl_global::get_listings(); ?>
            <label for="pr_listing_type_selectbox"><?php echo __('Listing type', WPL_TEXTDOMAIN); ?></label>
            <select id="pr_listing_type_selectbox" name="sf_select_listing">
            	<option value="-1"><?php echo __('All', WPL_TEXTDOMAIN); ?></option>
                <?php foreach($listings as $listing): ?>
				<option value="<?php echo $listing['id']; ?>"><?php echo __($listing['name'], WPL_TEXTDOMAIN); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="plugin-row wpl_shortcode_parameter wpl_hidden_element pr_property_listing">
            <?php $property_types = wpl_global::get_property_types(); ?>
            <label for="pr_property_type_selectbox"><?php echo __('Property type', WPL_TEXTDOMAIN); ?></label>
            <select id="pr_property_type_selectbox" name="sf_select_property_type">
            	<option value="-1"><?php echo __('All', WPL_TEXTDOMAIN); ?></option>
                <?php foreach($property_types as $property_type): ?>
				<option value="<?php echo $property_type['id']; ?>"><?php echo __($property_type['name'], WPL_TEXTDOMAIN); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="plugin-row wpl_shortcode_parameter wpl_hidden_element pr_property_listing">
            <label for="pr_only_featured_selectbox"><?php echo __('featured', WPL_TEXTDOMAIN); ?></label>
            <select id="pr_only_featured_selectbox" name="sf_select_sp_featured">
                <option value="-1"><?php echo __('Any', WPL_TEXTDOMAIN); ?></option>
                <option value="0"><?php echo __('No', WPL_TEXTDOMAIN); ?></option>
                <option value="1"><?php echo __('Yes', WPL_TEXTDOMAIN); ?></option>
            </select>
        </div>
        
        <div class="plugin-row wpl_shortcode_parameter wpl_hidden_element pr_property_listing">
            <label for="pr_only_hot_selectbox"><?php echo __('hot', WPL_TEXTDOMAIN); ?></label>
            <select id="pr_only_hot_selectbox" name="sf_select_sp_hot">
                <option value="-1"><?php echo __('Any', WPL_TEXTDOMAIN); ?></option>
                <option value="0"><?php echo __('No', WPL_TEXTDOMAIN); ?></option>
                <option value="1"><?php echo __('Yes', WPL_TEXTDOMAIN); ?></option>
            </select>
        </div>
        
        <div class="plugin-row wpl_shortcode_parameter wpl_hidden_element pr_property_listing pr_profile_listing">
            <?php $page_sizes = explode(',', trim($this->settings['page_sizes'], ', ')); ?>
            <label for="pr_limit_selectbox"><?php echo __('Listing per page', WPL_TEXTDOMAIN); ?></label>
            <select id="pr_limit_selectbox" name="limit">
                <?php foreach($page_sizes as $page_size): ?>
                    <option value="<?php echo $page_size; ?>" <?php if($this->settings['default_page_size'] == $page_size) echo 'selected="selected"'; ?>><?php echo $page_size; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="plugin-row wpl_shortcode_parameter wpl_hidden_element pr_property_listing">
            <?php $sort_options = wpl_sort_options::get_sort_options(0, 1);/** getting enaled sort options **/ ?>
            <label for="pr_orderby_selectbox"><?php echo __('Order by', WPL_TEXTDOMAIN); ?></label>
            <select id="pr_orderby_selectbox" name="wplorderby">
                <?php foreach($sort_options as $value_array): ?>
                    <option value="<?php echo $value_array['field_name']; ?>" <?php if($this->settings['default_orderby'] == $value_array['field_name']) echo 'selected="selected"' ?>><?php echo $value_array['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="plugin-row wpl_shortcode_parameter wpl_hidden_element pr_profile_listing">
            <?php $sort_options = wpl_sort_options::get_sort_options(2, 1);/** getting enaled sort options **/ ?>
            <label for="pr_orderby_user_selectbox"><?php echo __('Order by', WPL_TEXTDOMAIN); ?></label>
            <select id="pr_orderby_user_selectbox" name="wplorderby">
                <?php foreach($sort_options as $value_array): ?>
                    <option value="<?php echo $value_array['field_name']; ?>" <?php if($this->settings['default_profile_orderby'] == $value_array['field_name']) echo 'selected="selected"' ?>><?php echo $value_array['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="plugin-row wpl_shortcode_parameter wpl_hidden_element pr_property_listing pr_profile_listing">
            <label for="pr_order_selectbox"><?php echo __('Order', WPL_TEXTDOMAIN); ?></label>
            <select id="pr_order_selectbox" name="wplorder">
                <option value="DESC"><?php echo __('DESC', WPL_TEXTDOMAIN); ?></option>
                <option value="ASC"><?php echo __('ASC', WPL_TEXTDOMAIN); ?></option>
            </select>
        </div>

        <div class="plugin-row wpl_shortcode_parameter wpl_hidden_element pr_property_show">
            <label for="pr_mls_id_textbox"><?php echo __('Listing id', WPL_TEXTDOMAIN); ?></label>
            <input type="text" id="pr_mls_id_textbox" name="mls_id" />
        </div>

    </div>
</div>
<script type="text/javascript"><?php include ABSPATH.'wp-includes'.DS.'js'.DS.'tinymce'.DS.'tiny_mce_popup.js'; ?></script>
<script type="text/javascript">
wplj(document).ready(function()
{
	wpl_view_selected(wplj("#view_selectbox").val());
});

function insert_shortcode()
{
	var shortcode = '';
	var view = wplj("#view_selectbox").val();

	if (view == 'property_listing')
		shortcode += '[WPL';
	else if (view == 'profile_listing')
		shortcode += '[wpl_profile_listing';
	else if (view == 'property_show')
		shortcode += '[wpl_property_show';

	wplj("#wpl_shortcode_wizard_container .pr_" + view + " input:text, #wpl_shortcode_wizard_container .pr_" + view + " input[type='hidden'], #wpl_shortcode_wizard_container .pr_" + view + " select").each(function(ind, elm)
	{
		if(elm.name == '') return;
		shortcode += ' ' + elm.name + '="' + wplj(elm).val() + '"';
	});

	shortcode += ']';

	// inserts the shortcode into the active editor
	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);

	// closes Thickbox
	tinyMCEPopup.close();
}

function wpl_view_selected(view)
{
	if (!view) view = 'property_listing';

	wplj(".wpl_shortcode_wizard_container .wpl_shortcode_parameter").hide();
	wplj(".wpl_shortcode_wizard_container .pr_" + view).show();
}
</script>