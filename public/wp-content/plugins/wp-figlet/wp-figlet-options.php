<div class="wrap" style="max-width:950px !important;">
	<h2>WP Figlet</h2>
				
	<div id="poststuff" style="margin-top:10px;">

	 <div id="sideblock" style="float:right;width:220px;margin-left:10px;"> 
		 <h3>Information</h3>
		 <div id="dbx-content" style="text-decoration:none;">
			 <img src="<?php echo $imgpath ?>/home.png"><a style="text-decoration:none;" href="http://www.prelovac.com/vladimir/wordpress-plugins/wp-figlet"> WP Figlet Home</a><br /><br />
			 <img src="<?php echo $imgpath ?>/help.png"><a style="text-decoration:none;" href="http://www.prelovac.com/vladimir/forum"> Plugins Forum</a><br /><br />
			 <img src="<?php echo $imgpath ?>/rate.png"><a style="text-decoration:none;" href="http://wordpress.org/extend/plugins/wp-figlet/"> Rate WP Figlet</a><br /><br />
			 <img src="<?php echo $imgpath ?>/more.png"><a style="text-decoration:none;" href="http://www.prelovac.com/vladimir/wordpress-plugins"> My WordPress Plugins</a><br /><br />
			 <br />
		
			 <p align="center">
			 <img src="<?php echo $imgpath ?>/p1.png"></p>
			
			 <p> <img src="<?php echo $imgpath ?>/idea.png"><a style="text-decoration:none;" href="http://www.prelovac.com/vladimir/services"> Need a WordPress Expert?</a></p>
 		</div>
 	</div>

	 <div id="mainblock" style="width:710px">
	 
		<div class="dbx-content">
		 	<form name="WPFiglet" action="<?php echo $action_url ?>" method="post">
					<input type="hidden" name="submitted" value="1" /> 
					<h3><?php _e('Usage')?></h3>
					<p><?php _e('You can write ASCII text by using the [ascii] code in your posts. For example:')?><br /><br />
					<strong>[ascii]</strong>WordPress rocks<strong>[/ascii]</strong><br /><br />
					<?php _e('You can supply font and smalltext parameters as well:')?> <br /><br />
					<strong>[ascii font="straight.flf" smalltext="for real!" ]</strong>WordPress rocks!<strong>[/ascii]</strong><br /><br/>
					</p>
					<h3><?php _e('Options')?></h3>
					<p><?php _e('You can enter the text here to appear in your HEAD section of every page.')?>
					</p>
					
					<h4><?php _e('Text in big (ASCII) font')?></h4>	
					<textarea name="bigtext"  rows="" cols="50"><?php echo $bigtext?></textarea>
					
					<h4><?php _e('Text in small (normal) font')?></h4>	
					<textarea name="smalltext"  rows="" cols="50"><?php echo $smalltext ?></textarea>
					
					<br />
					<h4><?php _e('Font')?></h4>
					<select name="font" id="font" >   
					<?php echo $select ?>
					</select>
					
					<br />
					<br />
					<input type="checkbox" name="printhead"  <?php echo $printhead ?>/><label for="printhead"><?php _e(' Add to HEAD section of your pages')?></label>
				
									
					<div class="submit"><input type="submit" name="Submit" value="<?php _e('Update')?>" /></div>
			</form>
		</div>
		
		<br/><br/><h3>&nbsp;</h3>	
	 </div>

	</div>
	
<h5>WordPress plugin by <a href="http://www.prelovac.com/vladimir/">Vladimir Prelovac</a></h5>
</div>