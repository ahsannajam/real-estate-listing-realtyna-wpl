<?php
/** no direct access **/
defined('_WPLEXEC') or die('Restricted access');

$this->_wpl_import($this->tpl_path.'.scripts.js');

/** set params **/
$wpl_properties = isset($params['wpl_properties']) ? $params['wpl_properties'] : array();
$property_id = isset($wpl_properties['current']['data']['id']) ? $wpl_properties['current']['data']['id'] : NULL;

/** get params **/
$map_width = isset($params['map_width']) ? $params['map_width'] : 360;
$map_height = isset($params['map_height']) ? $params['map_height'] : 285;
$default_lt = isset($params['default_lt']) ? $params['default_lt'] : '38.685516';
$default_ln = isset($params['default_ln']) ? $params['default_ln'] : '-101.073324';
$default_zoom = isset($params['default_zoom']) ? $params['default_zoom'] : '4';

$listings = wpl_global::return_in_id_array(wpl_global::get_listings());
$markers = array();

$i = 0;
foreach($wpl_properties as $property)
{
	$markers[$i]['id'] = $property['raw']['id'];
	$markers[$i]['googlemap_lt'] = $property['raw']['googlemap_lt'];
	$markers[$i]['googlemap_ln'] = $property['raw']['googlemap_ln'];
	$markers[$i]['title'] = $property['raw']['googlemap_title'];
	
	$markers[$i]['pids'] = $property['raw']['id'];
	$markers[$i]['gmap_icon'] = $listings[$property['raw']['listing']]['gicon'];
	
	$i++;
}
?>
<div class="wpl_googlemap_container wpl_googlemap_plisting" id="wpl_googlemap_container<?php echo $this->activity_id; ?>">
	<div class="wpl_map_canvas" id="wpl_map_canvas<?php echo $this->activity_id; ?>" style="height: <?php echo $map_height ?>px;"></div>
</div>
<style type="text/css">
.wpl_map_canvas img{max-width:none !important;}
.wpl_map_canvas label{width:auto !important;display:inline !important;}
</style>
<script type="text/javascript">
var markers = <?php echo json_encode($markers); ?>;

/** default values in case of no marker to showing **/
var default_lt = '<?php echo $default_lt; ?>';
var default_ln = '<?php echo $default_ln; ?>';
var default_zoom = '<?php echo $default_zoom; ?>';
var wpl_map_initialized = false;

function wpl_pshow_map_init()
{
	if(wpl_map_initialized) return;
	
	wpl_initialize<?php echo $this->activity_id; ?>();
	
	/** restore the zoom level after the map is done scaling **/
	var listener = google.maps.event.addListener(wpl_map, 'idle', function(event)
	{
		wpl_map.setZoom(10);
		google.maps.event.removeListener(listener);
	});
	
	/** set true **/
	wpl_map_initialized = true;
}
</script>