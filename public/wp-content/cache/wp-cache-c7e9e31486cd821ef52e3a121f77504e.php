<?php die(); ?><!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="http://wordpress.local/xmlrpc.php">
  <link href='https://fonts.googleapis.com/css?family=Source+Code+Pro' rel='stylesheet' type='text/css'>
		<meta name='robots' content='noindex,follow' />
<link rel="alternate" type="application/rss+xml" title="DarkShells &raquo; Why tiling window manager? Comments Feed" href="http://wordpress.local/2016/02/08/why-tiling-window-manager/feed/" />
		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"http:\/\/wordpress.local\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.4.2"}};
			!function(a,b,c){function d(a){var c,d=b.createElement("canvas"),e=d.getContext&&d.getContext("2d"),f=String.fromCharCode;return e&&e.fillText?(e.textBaseline="top",e.font="600 32px Arial","flag"===a?(e.fillText(f(55356,56806,55356,56826),0,0),d.toDataURL().length>3e3):"diversity"===a?(e.fillText(f(55356,57221),0,0),c=e.getImageData(16,16,1,1).data.toString(),e.fillText(f(55356,57221,55356,57343),0,0),c!==e.getImageData(16,16,1,1).data.toString()):("simple"===a?e.fillText(f(55357,56835),0,0):e.fillText(f(55356,57135),0,0),0!==e.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag"),unicode8:d("unicode8"),diversity:d("diversity")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag&&c.supports.unicode8&&c.supports.diversity||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
<link rel='stylesheet' id='open-sans-css'  href='https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.4.2' type='text/css' media='all' />
<link rel='stylesheet' id='dashicons-css'  href='http://wordpress.local/wp-includes/css/dashicons.min.css?ver=4.4.2' type='text/css' media='all' />
<link rel='stylesheet' id='admin-bar-css'  href='http://wordpress.local/wp-includes/css/admin-bar.min.css?ver=4.4.2' type='text/css' media='all' />
<link rel='stylesheet' id='darkshells-style-css'  href='http://wordpress.local/wp-content/themes/darkShells/style.css?ver=4.4.2' type='text/css' media='all' />
<link rel='https://api.w.org/' href='http://wordpress.local/wp-json/' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://wordpress.local/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://wordpress.local/wp-includes/wlwmanifest.xml" /> 
<meta name="generator" content="WordPress 4.4.2" />
<link rel="canonical" href="http://wordpress.local/2016/02/08/why-tiling-window-manager/" />
<link rel='shortlink' href='http://wordpress.local/?p=67' />
<link rel="alternate" type="application/json+oembed" href="http://wordpress.local/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fwordpress.local%2F2016%2F02%2F08%2Fwhy-tiling-window-manager%2F" />
<link rel="alternate" type="text/xml+oembed" href="http://wordpress.local/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fwordpress.local%2F2016%2F02%2F08%2Fwhy-tiling-window-manager%2F&#038;format=xml" />
    <style type="text/css">

       body { 
        background-image:url(http://c2.staticflickr.com/8/7669/17177189582_87cd779ef7_k.jpg);
        background-color: ; 
        color: ; 
      }

      .window-colors{ 
        background-color: ; 
      }

      h1 {color:}
      h2 {color:}
      h3 {color:}
      h4 {color:}
      h4 {color:}

      .arrows{display:flex;}

      .arrows .leftside-arrows .arrow:nth-child(1) { background-color: ; } 
      .arrows .leftside-arrows .arrow:nth-child(1):after { border-left-color: ; } 
      .arrows .leftside-arrows .arrow:nth-child(2) { background-color: ; }
      .arrows .leftside-arrows .arrow:nth-child(2):after { border-left-color:; } 
      .arrows .rightside-arrows .arrow:nth-child(1){ background-color: ; }
      .arrows .rightside-arrows .arrow:nth-child(1):before { border-right-color:; } 
      .arrows .rightside-arrows .arrow:nth-child(2){ background-color: ; } 
      .arrows .rightside-arrows .arrow:nth-child(2):before { border-right-color:; } 

    </style>
  <style type="text/css" media="print">#wpadminbar { display:none; }</style>
<style type="text/css" media="screen">
	html { margin-top: 32px !important; }
	* html body { margin-top: 32px !important; }
	@media screen and ( max-width: 782px ) {
		html { margin-top: 46px !important; }
		* html body { margin-top: 46px !important; }
	}
</style>
</head>
<body>
<div class="wrapper window-colors">
  <div class="header">

    <div class="home">
      <a href="http://wordpress.local/" rel="home">
        <h1> DarkShells </h1> 
      </a>
    </div>

      <div class="float-right"> <li id="search-7" class="widget widget_search"><form role="search" method="get" id="searchform" class="searchform" action="http://wordpress.local/">
				<div>
					<label class="screen-reader-text" for="s">Search for:</label>
					<input type="text" value="" name="s" id="s" />
					<input type="submit" id="searchsubmit" value="Search" />
				</div>
			</form></li>
 </div>

      <div class="horizontal-list float-right ">
        <div class="header-nav-menu"><ul id="menu-top-nav" class="menu"><li id="menu-item-158" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-158"><a href="http://wordpress.local/blog/">Blog</a></li>
<li id="menu-item-159" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-159"><a href="http://wordpress.local/">DarkShells</a></li>
<li id="menu-item-160" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-160"><a href="http://wordpress.local/about-me/">About Me</a></li>
<li id="menu-item-161" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-161"><a href="http://wordpress.local/links/">Links</a></li>
</ul></div>      </div>
    <div class="clear"></div>

  </div>

<div class="content">
  <div class="middle">
        
  <a href="http://wordpress.local/2016/02/08/why-tiling-window-manager/"><h2> Why tiling window manager?</h2></a>
  <p>People who&#8217;ve never learn how to use a tiling window manager (let&#8217;s call them peasants) often wonder what the point is, why bother learning a whole new way to manage windows. The old way is more intuitive they say. Which is of course what all people say about new game-changing technologies and breakthroughs. And then people who don&#8217;t really understand it, step in and try to explain it and it&#8217;s all a mess.</p>
<p>Well, I&#8217;d just like to once and for all just say that the reason as to why we like tiling window managers isn&#8217;t to &#8220;save screen real-estate&#8221;. It&#8217;s just really simple, it&#8217;s the same reason as to why people align papers on their desks when they clean it.</p>
<p>It&#8217;s about neatness!.. And one more thing.</p>
<p>Say all you will about touch displays or the imperfections of such devices, but there exists a more sinister type of interface, that is more imperfect and un-intuitive than a touchscreen, I&#8217;m talking of course about the dreaded Touchpad. And one of it&#8217;s greatest weknesses has always been the click and drag movement. Which is basically the only way to interact with windows in most desktops. Tiling window managers let the keyboard manage such things. And the keyboard is an extreemly accurate device, which is why tiling windowmanagers rock on laptops! And I personally think it&#8217;s even greater than the overated mouse.</p>
<p>So there you have it, neatness and mouse-hatred is what you should answer if a peasant asks.</p>
  <p> 
    <a href="http://wordpress.local/author/rickisen/" title="Posts by rickisen" rel="author">rickisen</a>  2016-Feb-Mon 22:33  </p> <br>

  <div class="taxonomies">Categories: <a href="http://wordpress.local/category/musings/">musings</a>.</div> 
  </div>
</div>

            <div class="footer">
        <div class="arrows flex-container">
          <span class="leftside-arrows">
            <span class="arrow">rickisen</span>
            <span class="arrow">Why tiling window manager?</span>
          </span>
          <span class="no-arrow"> http://wordpress.local/2016/02/08/why-tiling-window-manager/ </span>
          <span class="rightside-arrows">
            <span class="arrow">2016-02-Mon</span>
            <span class="arrow"> DarkShells </span>
          </span>
        </div>
      </div>
    </div> <!-- end of wrapper -->
          <div class="hidden-footer wrapper window-colors flex-container">
        <li id="text-2" class="widget widget_text"><h2 class="widgettitle">About this page</h2>
			<div class="textwidget">School assignment that äs what it iz</div>
		</li>
<li id="meta-2" class="widget widget_meta"><h2 class="widgettitle">Meta</h2>
			<ul>
			<li><a href="http://wordpress.local/wp-admin/">Site Admin</a></li>			<li><a href="http://wordpress.local/wp-login.php?action=logout&#038;_wpnonce=bc948fb84b">Log out</a></li>
			<li><a href="http://wordpress.local/feed/">Entries <abbr title="Really Simple Syndication">RSS</abbr></a></li>
			<li><a href="http://wordpress.local/comments/feed/">Comments <abbr title="Really Simple Syndication">RSS</abbr></a></li>
			<li><a href="https://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a></li>			</ul>
			</li>
      </div>
      </body>
</html>


<!-- Dynamic page generated in 0.412 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2016-02-15 15:27:23 -->
