<?php 
get_header(); 

$layout=ThemexCore::getOption('posts_layout', 'right');
if($layout=='left') {
?>
<aside class="sidebar column fourcol">
<?php get_sidebar(); ?>
</aside>
<div class="column eightcol last">
<?php } else if($layout=='right') { ?>
<div class="column eightcol">
<?php } else { ?>
<div class="fullwidth-section">
<?php } ?>
	<?php the_post(); ?>
	<article class="single-post">
		<?php if(has_post_thumbnail() && !ThemexCore::checkOption('post_image')) { ?>
		<div class="post-image">
			<div class="bordered-image thick-border">
				<?php the_post_thumbnail('extended'); ?>
			</div>
		</div>
		<?php } ?>
		<div class="post-content">
			<?php the_content(); ?>
				<hr/>
				<!-- TradingView Widget BEGIN -->
				<script type="text/javascript" src="https://d33t3vvu2t2yu5.cloudfront.net/tv.js"></script>
				<script type="text/javascript">
				new TradingView.widget({
				  "width": "100%",
				  "height": 610,
				  "symbol": "<?=get_field('tradingview_symbol'); ?>",
				  "interval": "<?=get_field('tradingview_interval'); ?>",
				  "timezone": "America/Los_Angeles",
				  "theme": "White",
				  "style": "1",
				  "locale": "en",
				  "toolbar_bg": "#f1f3f6",
				  "allow_symbol_change": true,
				  "hideideas": true,
				  "show_popup_button": true,
				  "popup_width": "1000",
				  "popup_height": "650"
				});
				</script>
				<!-- TradingView Widget END -->
			<hr/>
			<h2>Case Study Explanation</h2>
			<div class="explanation">
				<?php echo get_field('explanation'); ?>
			</div>
			<hr/>
			<footer class="post-footer">
				<div class="sixcol column">
					<?php if(comments_open()) { ?>
					<div class="post-comment-count"><?php comments_number('0','1','%'); ?></div>
					<?php } ?>
					<?php if(!ThemexCore::checkOption('post_date')) { ?>
					<time class="post-date nomargin" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time>
					<?php } ?>
					<?php if(!ThemexCore::checkOption('post_author')) { ?>
					<div class="post-author nomargin">&nbsp;<?php _e('by', 'academy'); ?> <?php the_author_posts_link(); ?>&nbsp;<?php _e('in', 'academy'); ?>&nbsp;</div>
					<?php } ?>
					<div class="post-categories"><?php the_category(', '); ?></div>
				</div>
				<div class="sixcol column last">
					<div class="tagcloud"><?php the_tags('','',''); ?></div>
				</div>				
			</footer>
		</div>		
	</article>
	<?php comments_template(); ?>
</div>
<?php if($layout=='right') { ?>
<aside class="sidebar column fourcol last">
<?php get_sidebar(); ?>
</aside>
<?php } ?>
<?php get_footer(); ?>