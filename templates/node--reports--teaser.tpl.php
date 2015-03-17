<?php //dpm($variables); ?>

<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php if ($title_prefix || $title_suffix || $display_submitted || !$page): ?>
  <header>
    <?php print render($title_prefix); ?>
    <?php if (!$page): ?>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

  </header>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
	  hide($content['field_image']);
	  hide($content['field_title']);
	  hide($content['field_semana_id']);
      //print render($content);
      //hide($content[]);
      print render($content['field_image']);  
      print render($content['title_field']);      
 

    if ($display_submitted):    ?>
    <!--span class="glyphicon glyphicon-calendar" ></span--> 
      <div class="fecha">
        <?php // print $user_picture; ?>
        
        <?php
        


            switch ($categoria) {
				case '18':  // daily
				   print format_date($node->created, 'dia'); 
				   break;
				case '3':  // weekly
				   print render($content['field_semana_id'] );
				   print t(' of ') . t(format_date($node->created, 'mes')); 
				   break;
				case '4':  // monthly
				   print format_date($node->created, 'mes'); 
				   break;
				case '19': // quartly
				   print render($content['field_trimestre']);
				   print format_date($node->created, 'custom', t('Y')); 
				   break;
				case '20':  // special
				   print format_date($node->created, 'dia'); 
				   break;
				default:
				   print format_date($node->created, 'dia'); 
				   break;
				}
      
           
         ?>
      </div>
<?php endif;
  
      $cuerpo_truncado = truncate_utf8(strip_tags($node->body[$node->language]['0']['value']), 380, False, TRUE,1);
      print ('<div class="cuerpo_reportes">' .  render($cuerpo_truncado) . '</div>');  
      
    ?>
  </div>

  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
    <footer>
    <?php print render($content['field_tags']); ?>
    <?php print render($content['links']); ?>
    </footer>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

</article>
