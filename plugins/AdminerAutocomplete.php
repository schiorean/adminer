<?php
/**
 * Autocomplete for keywords, tables and columns.
 * @author David Grudl
 * @license BSD
 */
class AdminerAutocomplete
{
	public $keywords = [
		'DELETE FROM', 'DISTINCT', 'EXPLAIN', 'FROM', 'GROUP BY', 'HAVING', 'INSERT INTO', 'INNER JOIN', 'IGNORE',
		'LIMIT', 'LEFT JOIN', 'NULL', 'ORDER BY', 'ON DUPLICATE KEY UPDATE', 'SELECT', 'UPDATE', 'WHERE',
	];
	public function head()
	{
		if (!isset($_GET['sql'])) {
			return;
		}
		$suggests = [];
		foreach ($this->keywords as $keyword) {
			$keyword = strtolower($keyword);
		    $suggests[] = "{$keyword} ";
		}
		foreach (array_keys(tables_list()) as $table) {
			$suggests[] = $table;
			foreach (fields($table) as $field => $foo) {
				$suggests[] = "$table.$field ";
			}
		} ?>
        <script<?php echo nonce();?> type="text/javascript" src="static/tabcomplete.js"></script>
        <style>.hint { color: #bdc3c7; }</style>
        <script<?php echo nonce();?> type="text/javascript">
            var sqlAutocomplete = (() => {
            	var init = () => {
            		self = this;
		            (function(){
			            var origBodyLoad = bodyLoad,
				            tags = document.getElementsByTagName('textarea');

			            bodyLoad = function(version) {
				            for (var i = 0; i < tags.length; i++) {
					            tags[i].className = tags[i].className.replace(/\bjush-\S+/, '');
				            }
				            return origBodyLoad.apply(window, arguments);
			            }
		            })();
		            $(function(){
			            $('.sqlarea').tabcomplete(<?=json_encode($suggests) ?>);
		            });
                };

                init();
            	return self;
            })({});
        </script>
		<?php
	}
}
