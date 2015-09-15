<?php ThemexLesson::refresh($GLOBALS['lesson']->ID); ?>	
<div class="lesson-item">
	<div class="lesson-title">

		<?php if(ThemexCore::checkOption('lesson_collapse') && ($GLOBALS['lesson']->post_parent!=0 || isset(ThemexCourse::$data['lessons'][$GLOBALS['index']+1]) && ThemexCourse::$data['lessons'][$GLOBALS['index']+1]->post_parent!==0)) { ?>
		<div class="lesson-toggle toggle-element" data-class="toggle-<?php echo $GLOBALS['lesson']->ID; ?>"></div>
		<?php } ?>

		<div class="course-image">
			<a href="<?php echo get_permalink(ThemexLesson::$data['ID']); ?>"> <?php echo get_the_post_thumbnail(ThemexLesson::$data['ID'], array(420,420)); ?></a>
		</div>

		<h3 class="nomargin"><a href="<?php echo get_permalink(ThemexLesson::$data['ID']); ?>" class="<?php if(ThemexLesson::$data['status']=='free') { ?>disabled<?php } ?>"><?php echo get_the_title(ThemexLesson::$data['ID']); ?></a></h3>
		
		<?php if ( has_excerpt( ThemexLesson::$data['ID'] ) ) { ?>
		<p><?php echo nectary_get_the_excerpt(ThemexLesson::$data['ID']); ?></p>
		<?php } else { ?>
		<p>Bla bla bla</p>
		<?php } ?>

		<?php echo do_shortcode ('[button color="primary" size="small" url="' . get_permalink(ThemexLesson::$data['ID']) .  '" target="self"]進入課程[/button]'); ?>

		<?php if(ThemexCourse::isMember() && !empty(ThemexLesson::$data['quiz']) && !empty(ThemexLesson::$data['progress'])) { ?>
		<div class="course-progress">
			<span style="width:<?php echo ThemexLesson::$data['progress']; ?>%;"></span>
		</div>
		<?php } ?>
	</div>
	<?php if(!empty(ThemexLesson::$data['attachments'])) { ?>
	<div class="lesson-attachments">
		<?php foreach(ThemexLesson::$data['attachments'] as $attachment) { ?>
		<a href="<?php echo $attachment['redirect']; ?>" target="_blank" title="<?php echo $attachment['title']; ?>" class="<?php echo $attachment['type']; ?> <?php if(ThemexLesson::$data['status']=='free') { ?>disabled<?php } ?>"></a>
		<?php } ?>
	</div>
	<?php } else { ?>
	<div class="lesson-title"></div>
	<?php } ?>
</div>