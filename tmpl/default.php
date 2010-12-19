<?php // no direct access
defined('_JEXEC') or die('Restricted access');


$b = create_function('$x', 'return $x ? \'true\' : \'false\';');

$behavior_types = array(
  '1' => 'default',
  '2' => 'all'
);

$username = $params->get('username');

$rpp = $params->get('rpp');
$interval = $params->get('interval') * 1000;

if ($params->get('auto_width')) {
  $width = '\'auto\'';
} else {
  $width = $params->get('width');  
}
$height = $params->get('height');

$shell_background = $params->get('shell_background');
$shell_color = $params->get('shell_color');

$tweet_background = $params->get('tweet_background');
$tweet_color = $params->get('tweet_color');
$tweet_links = $params->get('tweet_links');

$scrollbar = $b($params->get('scrollbar'));
$loop = $b($params->get('loop'));

$live = $b($params->get('live'));

$hashtags = $b($params->get('hashtags'));
$timestamp = $b($params->get('timestamp'));
$avatars = $b($params->get('avatars'));

$_behavior = $params->get('behavior');
$behavior = isset($behavior_types[$_behavior])
  ? $behavior_types[$_behavior] : 'all';
?>
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script type="text/javascript">// <![CDATA[
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: <?php echo $rpp ?>,
  interval: <?php echo $interval ?>,
  width: <?php echo $width ?>,
  height: <?php echo $height ?>,
  theme: {
    shell: {
      background: '<?php echo $shell_background ?>',
      color: '<?php echo $shell_color ?>'
    },
    tweets: {
      background: '<?php echo $tweet_background ?>',
      color: '<?php echo $tweet_color ?>',
      links: '<?php echo $tweet_links ?>'
    }
  },
  features: {
    scrollbar: <?php echo $scrollbar ?>,
    loop: <?php echo $loop ?>,
    live: <?php echo $live ?>,
    hashtags: <?php echo $hashtags ?>,
    timestamp: <?php echo $timestamp ?>,
    avatars: <?php echo $avatars ?>,
    behavior: '<?php echo $behavior ?>'
  }
}).render().setUser('<?php echo $username ?>').start();
// ]]></script>