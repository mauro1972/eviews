<?php

/**
 * @file
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */
 
global $base_path;

?>
<?php if (!empty($title)) : ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<table class="<?php print $class; ?>"<?php print $attributes; ?>>
  <?php if (!empty($caption)) : ?>
    <caption><?php print $caption; ?></caption>
  <?php endif; ?>

  <tbody>
    <?php foreach ($rows as $row_number => $columns): ?>
      <tr <?php if ($row_classes[$row_number]) { print 'class="' . $row_classes[$row_number] .'"';  } ?>>
        <?php foreach ($columns as $column_number => $item): ?>
          <td <?php if ($column_classes[$row_number][$column_number]) { print 'class="' . $column_classes[$row_number][$column_number] .'"';  } ?>>
            <?php if ($column_number < 2):  
              print $item; 
            else: ?>
                
				<div class="recomendados-grid-item">
				  <div class="recomendados-titulo"><a href="http://www.megainver.com/">MegaINVER</a></div>
				  <div class="recomendados-imagen"><img typeof="foaf:Image" src="<?php print ($base_path . path_to_theme());  ?>/compass/images/logo-megainver.png" width="290" height="223"  alt=""></div>
				</div>               
             <?php endif; ?>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

