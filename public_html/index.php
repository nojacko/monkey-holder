<?php 
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
if ($page == '404') {
	header('HTTP/1.0 404 Not Found');
	header('Location: /');
	exit;
}

// Settings
date_default_timezone_set('UTC');

// Headers
header('Content-Type: text/html; charset=utf-8'); 

// Includes
include('../monkeys.php');
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Monkey Holder</title>
	<meta name="keywords" content="monkey, placeholder, awesome" />
	<meta name="description" content="Instant placeholder images of monkeys, for you. Why? Well kittens are cute, dogs are loyal... monkeys? Awesome!" />

	
	
	<link href="http://fonts.googleapis.com/css?family=Marko+One|Marvel" rel="stylesheet" type="text/css" />
	<style type="text/css">
 	* { 
 		border: 0; margin: 0; padding: 0px; box-sizing: border-box; 
		line-height: 1.2em;
		color: #42413B; 
		font-size: 1em;
	}
	body { margin: 5px; padding: 0px; }
	#container { margin: 0px auto; width: 800px; }
	#troop { position: relative; clear: both; width: 800px; height: 580px; }
	#troop img { margin: 2px; padding: 0px; z-index: 1;}
	#content { 
		position: absolute; top: 150px; left: 180px; z-index: 2; 
		width: 440px; 
		padding: 10px; 
		background-color: white;
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
		box-shadow: 0 0 10px #FFF; 
	}
	.monkey { float: left; margin: 1%; text-align: center; width: 23%; }
	#ad { text-align: center; margin-bottom: 20px; }

	p, footer { font-family: 'Marvel', sans-serif; }
	h1, h2, h3 { font-size: 1.3em; font-family: 'Marko One', serif; }
	h2 { font-size: 1.1em; }
	h3 { font-size: 1em; }
	
	p { margin-bottom: 1em; }
	footer { clear: both; text-align: right; }
	a { text-decoration: underline; }
	a:hover { color: orange; }
	</style>
</head>
<body>
	<div id="container">
		<div id="troop">
			<div id="content">
				<h1>MonkeyHolder.com</h1>
				<p>
					Instant placeholder images of monkeys, for your design or code. 
					<strong>Why?</strong> 
					Well kittens are cute, dogs are loyal... monkeys? Awesome!
				</p>
				<h2>Get some monkey...</h2>
				<p>
					<a href="/300x200">http://monkeyholder.com/300x200</a> (colour)<br />
					<a href="/g/300x200">http://monkeyholder.com/g/300x200</a> (black &amp; white)<br />
				</p>
				<p>
					<a href="/attribution">Image Attribution</a>
				</p>
			</div>
			<?php
			$grid = array(
				// gridx,gridy, width,height
				array(0,0, 3,2, 'g/'),
				array(3,0, 2,1, ''), 
				array(5,0, 2,3, 'g/'), 
				array(7,0, 1,1, ''),
				 
				array(3,1, 2,2, 'g/'), 
				array(7,1, 1,1, ''), 
				
				array(0,2, 1,2, 'g/'), 
				array(1,2, 2,3, ''), 
				array(7,2, 1,3, 'g/'), 
				
				array(3,3, 1,2, ''), 
				array(4,3, 2,2, 'g/'), 
				array(6,3, 1,2, ''), 
				
				array(0,4, 1,2, 'g/'), 
				
				array(1,5, 2,1, ''), 
				array(3,5, 1,1, 'g/'), 
				array(4,5, 1,1, ''), 
				array(5,5, 1,3, 'g/'), 
				array(6,5, 2,2, ''),
				
				array(0,6, 2,2, 'g/'),
				array(2,6, 3,2, ''),
				
				array(6,7, 2,1, 'g/')
			);
			
			$i = 1;
			foreach ($grid as $item) {
				$n = ($i++ % $NOMONKEYS) + 1;
				$x = $item[0] * 100;
				$y = $item[1] * 70;
				$w = $item[2] * 100 -4;
				$h = $item[3] * 70 -4;
				$g = $item[4];
				echo '<a href="/300x300/'. $n . '" title="Placeholder Monkey #'.$n.'">';
				echo '<img ';
				echo 'src="/'.$g.$w.'x'.$h.'/'.$n.'" ';
				echo 'style="position: absolute; top: '.$y.'px; left: '.$x.'px"; width: '.$w.'px; height: '.$h.'px" ';
				echo 'alt="" '; 
				echo '/>';
				echo '</a>';
			}
			?>	
		</div>
		
		<div id="ad">
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-3228709583299363";
			/* Monkey Holder - Leaderboard */
			google_ad_slot = "7588746931";
			google_ad_width = 728;
			google_ad_height = 90;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
		</div>
		
<?php if ($page === 'attribution') { ?>
		<h1>Image Attribution</h1>
		<p>
			<a href="/">MonkeyHolder.com</a> would be nothing without the following peoples' work. When using these images you should give proper attribution. 
		</p>
		<h2>Using a Specific Image</h2>
		<p>
			Just add the # to the URL: <br /> 
			<span style="font-family: monospace;">
				<a href="/300x200">http://monkeyholder.com/300x200</a>
				 (random)<br />
				<a href="/300x200/1">http://monkeyholder.com/300x200/1</a>
				 (image #1)
			</span>
		</p>
		
		<h3>The Troop</h3>
		<?php
		foreach ($MONKEYS as $m) {
		?>
			<div class="monkey">
				<a href="/300x300/<?php echo $m->id; ?>" title="Placeholder Monkey #<?php echo $m->id; ?>"><img 
					src="/150x100/<?php echo $m->id; ?>" 
					alt="Monkey #<?php echo $m->id; ?>" 
					style="width: 150px; height: 100px;"  
				/></a>
				<br />
				#<?php echo $m->id;?>
				<a href="<?php echo $m->source;?>"><?php echo $m->owner;?></a> 
			</div>
		<?php
		}	
		?>
<?php } ?>
		
		<div style="clear: both;"> </div>
		
		<footer>
			By <a href="http://www.jamesdavidjackson.com/">James David Jackson</a> 
			(<a href="http://twitter.com/nojacko">@nojacko</a>).
		</footer>
	</div>
	
	<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-366768-18']);
	_gaq.push(['_trackPageview']);
	
	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	</script>
</body>