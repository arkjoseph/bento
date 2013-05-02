<?php
/**
 * @file views-view-table.tpl.php
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $class: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * @ingroup views_templates
 */
?>

<header>
	<a class="add" href="/node/add/data-collection?<?php print drupal_get_destination(); ?>" title="Add a Title" data-target="#rEdit">+</a>
</header>

<figure><img src="/sites/all/themes/basic/images/viewLoad.gif" width="54" height="55" /></figure>

<section>
	<table style="display:none;" class="<?php print $class; ?>"<?php print $attributes; ?>>
	  <?php if (!empty($title)) : ?>
	    <caption><?php print $title; ?></caption>
	  <?php endif; ?>
	  <thead>
	    <tr>
	      <?php foreach ($header as $field => $label): ?>
	      
				<!-- Hide columns if they do not have any content-->
	      
		      <?php if ($column_has_content[$field]):  ?>
	     	   <th class="views-field views-field-<?php print $fields[$field]; ?>">
	      	    <?php print $label; ?>
	        	</th>
	      	<?php endif; ?>

	      <?php endforeach; ?>
	    </tr>
	  </thead>
	  <tbody>
	    <?php foreach ($rows as $count => $row): ?>
	      <tr class="<?php print implode(' ', $row_classes[$count]); ?>">
	        <?php foreach ($row as $field => $content): ?>
			
					<!-- Hide columns if they do not have any content-->

						<?php if ($column_has_content[$field]):  ?>
		          <td class="views-field views-field-<?php print $fields[$field]; ?>">
		            <?php print $content; ?>
		          </td>
		        <?php endif; ?>

	        <?php endforeach; ?>
	      </tr>
	    <?php endforeach; ?>
	  </tbody>
	</table>
</section>