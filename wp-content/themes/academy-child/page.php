<?php get_header(); ?>
<?php the_post(); ?>
<?php the_content(); ?>
<?php if(is_front_page() && is_page()) { ?>
	<div class="home-banner">
		<img class="alignnone size-full wp-image-2273" src="http://localhost/esw/wp-content/uploads/2013/02/icon-collaboration.png" alt="collaboration" width="72" height="49" />
		<h4>此平台內容是經過與中青集團的合作及許可，才得以呈現在此平台。</h4>
		<p>中青集團是一家私募基金有限公司。如今，中青集團共有超過三十名富有雄厚經驗的外匯交易者，每一個都有不少於十年的外匯交易經驗，備受許多金融機構的追捧。因此，為了維護他們的身份，關於他們的資料將不會在此平台外傳。</p>
	</div>
	
	<div id="course-stock-footer" class="vertical-align">
		<div class="content-container">
		      <div class="content-title">外匯線上教學</div>
		      <div class="content-body">如果你是新的網上外匯交易，你會發現，95％的交易商迅速失去而失去。為了贏得在貨幣交易，你需要正確的外匯教學。</div>
		      <div><a href="#"class="element-button small primary content-button">註冊</a></div>
		</div>
	</div>
	<div class="clear"></div>
<?php } ?>
<?php get_footer(); ?>