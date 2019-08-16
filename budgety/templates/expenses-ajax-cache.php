<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'expenses';

		/* data for selected record, or defaults if none is selected */
		var data = {
			client: <?php echo json_encode(array('id' => $rdata['client'], 'value' => $rdata['client'], 'text' => $jdata['client'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for client */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'client' && d.id == data.client.id)
				return { results: [ data.client ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

