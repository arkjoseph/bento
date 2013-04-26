<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
  <head>
    
    <title><?php print $head_title; ?></title>
    <?php print $head; ?>
    <?php print $styles; ?>
    <!--[if lte IE 6]><link type="text/css" rel="stylesheet" media="all" href="<?php print $base_path . path_to_theme(); ?>/css/ie6.css" /><![endif]-->
    <!--[if IE 7]><link type="text/css" rel="stylesheet" media="all" href="<?php print $base_path . path_to_theme(); ?>/css/ie7.css" /><![endif]-->
    <!--[if IE 8]><link type="text/css" rel="stylesheet" media="all" href="<?php print $base_path . path_to_theme(); ?>/css/ie8.css" /><![endif]-->
    <?php print $scripts; ?>
    
    <script type="text/javascript">

		$(function(){

		  function getLastSegmentOfPath(url) {
		      var matches = url.match(/\/([^\/]+)\/?$/);
		      if (matches) {
		          return matches[1];
		      }
		      return null;
		  }
		  var endPath = getLastSegmentOfPath(window.location.href);

		  var options = [];
	    $("#edit-field-content-month-value option").each(function() {
		    options.push($.trim(
			    $(this).text()).toLowerCase());
	    });
			
			// Focus the first table field 
			$(".views-row-first .views-field-nid a").trigger('click').focus();
			
		  // Fade the message area out after 5 seconds  
		  setTimeout(function() {
				$(".messages").fadeOut();
			},5000);
			
		  $(".parent-mlid-11 ul li a, .add_title a").attr('data-target','#rEdit');

		  $("#rEdit").hide();

		  $("[data-target]").live('click', function (event){

				 if($("#rEdit").is(":visible")){
				     $("#rEdit").fadeOut();
		      } 
			      
			    var target = $($(this).attr('data-target'));

			    // AHAH Call 
			    $(target).html("Loading...").load($(this).attr('href'),function(response, status, xhr){			    
		  	    if (status == "success") {
		         		// On Success   	  		
		        		$("#rEdit").fadeIn();
		        		$('#rEdit .date-clear-block input').datepicker();

		      		  $("#node-form[action*='add']").each(function(){
			      		  var action = $(this);
		      				console.log(endPath);
									console.log(options);


									// Check if value/array exists logic
									if( $.inArray((endPath), options) > 0) {
								    		return false;
									
									}  else {
							    			console.log("found a match");
									}


								});
				  
		  	    }
				    if (status == "error") {
				     	$(target).html("OOPS! Please contact the system admin!");
				    }

				  });

			    event.preventDefault(); // prevent anchor from changing window.location

			});
			
		});    
    </script>
    
  </head>
  <body class="<?php print $body_classes; ?>" id="front">
    <div id="skip">
     </div>

    <div id="page">

    <!-- ______________________ HEADER _______________________ -->

    <header>
      <?php if ($header): ?>
        <div id="header-region">
          <?php print $header; ?>    
        </div>
      <?php endif; ?>
		</header> <!-- /header -->

    <!-- ______________________ MAIN _______________________ -->

    <div id="main" class="clearfix">
    
      <div id="content">
        <div id="content-inner" class="inner column center">

          <?php if ($content_top): ?>
            <div id="content-top">
              <?php print $content_top; ?>
            </div> <!-- /#content-top -->
          <?php endif; ?>

          <?php if ($breadcrumb || $title || $mission || $messages || $help || $tabs): ?>
            <div id="content-header">
              
							<?php print $messages; ?>

              <?php print $help; ?> 
 
            </div> <!-- /#content-header -->
          <?php endif; ?>

          <?php if ($content_bottom): ?>
            <div id="content-bottom">
              <?php print $content_bottom; ?>
            </div><!-- /#content-bottom -->
          <?php endif; ?>

          <div id="content-area">
            <?php print $content; ?>
          
						<section><content id="rEdit"></content></section>
          
          </div> <!-- /#content-area -->

          </div>
        </div> <!-- /content-inner /content -->

        <?php if ($left): ?>
          <div id="sidebar-first" class="column sidebar first">
            <div id="sidebar-first-inner" class="inner">
              <?php print $left; ?>
            </div>
          </div>
        <?php endif; ?> <!-- /sidebar-left -->

        <?php if ($right): ?>
          <div id="sidebar-second" class="column sidebar second">
            <div id="sidebar-second-inner" class="inner">
              <?php print $right; ?>
            </div>
          </div>
        <?php endif; ?> <!-- /sidebar-second -->

      </div> <!-- /main -->

      <!-- ______________________ FOOTER _______________________ -->

      <?php if(!empty($footer_message) || !empty($footer_block)): ?>
        <footer>
          <?php print $footer_message; ?>
          <?php print $footer_block; ?>
        </footer> <!-- /footer -->
      <?php endif; ?>

    </div> <!-- /page -->
    <?php print $closure; ?>
  </body>
</html>
