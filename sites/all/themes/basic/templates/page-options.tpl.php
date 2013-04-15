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
		$(document).ready(function(){

		  // TO DO...Timeout for status messages 
		  $(function() {
			    // setTimeout() function will be fired after page is loaded
			    // it will wait for 5 sec. and then will fire
			    // $("#successMessage").hide() function
			    setTimeout(function() {
			        $(".warning, .error, .status").hide('blind', {}, 500)
			    }, 5000);
			});
			
			// Options add content menu 
		  // declare vars 
//			var block1menu = $('#block-menu_block-1 ul.menu');
//		  var listItem = $('<li class="pull" style="display: block;"><span class="button red node-add">+</a></li>').prependTo(block1menu);
//		  var types = $(block1menu).find("li:not(:eq(0))").wrapAll("<ul class='down'>");

//			$(".down").appendTo(".pull");

//			$(".pull").hover(function(){
//				$(this).find(".down").fadeIn();
//			},function(){
//				$(this).find(".down").fadeOut();
//			});		
//			$(".down").click(function(){
//				$(this).fadeOut();
//			});

			// Add custom attribute for load function 
			$("#sidebar-first ul.menu li a").attr('data-target','#rEdit');
			
			// Load function for DOM hyperLinks. (NEEDS PRE-LOADER)
		  $("#rEdit").hide();		  
			$("[data-target]").live('click', function (e){
			    if($("#rEdit").is(":visible")){
				      $("#rEdit").fadeOut();
			      } 
			    var target = $($(this).attr('data-target'));
			    
			    $(target).load($(this).attr('href'),function(responseText, textStatus, XMLHttpRequest){
				    if (textStatus == "success") {
				      // all good!    
							$("#rEdit").fadeIn();
							console.log('success');
				    }
				    if (textStatus == "error") {
				     	alert("OOPS! Please contact the system admin!");
				    }
				  });
			    e.preventDefault(); // prevent anchor from changing window.location
				});
			
		});    
    </script>
    
  </head>
  <body class="<?php print $body_classes; ?>" id="options">
   <div id="skip">
      <a href="#content"><?php print t('Skip to Content'); ?></a>
      <?php if (!empty($primary_links) || !empty($secondary_links)): ?>
        <a href="#navigation"><?php print t('Skip to Navigation'); ?></a>
      <?php endif; ?>
    </div>

    <div id="page">

    <!-- ______________________ HEADER _______________________ -->

    <header>
				
        <?php if (!empty($logo)): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
          </a>
        <?php endif; ?>

      <?php if ($header): ?>
        <div id="header-region">
          <?php print $header; ?>
                    
          <!-- ______________ FPO MENU _______________ -->
   				<nav>
   					<ul class="menu" id="app-menu-main">
   						<li><a class="button node-add blue" data-target="#rEdit" href="/node/add/data-collection">+</a></li>
   						<li><a class="button node-add blue" data-target="" href="/">&#928;</a></li>
   					</ul>
   				</nav>        				
        </div>
      <?php endif; ?>

      <?php // Uncomment to add the search box.// print $search_box; ?>

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
            
          <section><content id="rEdit"></content></section>
            <?php print $content; ?>
          </div> <!-- /#content-area -->

          </div>
        </div> <!-- /content-inner /content -->

        <?php if (!empty($primary_links) || !empty($secondary_links)): ?>
          <div id="navigation" class="menu <?php if (!empty($primary_links)) { print "with-main-menu"; } if (!empty($secondary_links)) { print " with-sub-menu"; } ?>">
            <?php if (!empty($primary_links)){ print theme('links', $primary_links, array('id' => 'primary', 'class' => 'links main-menu')); } ?>
            <?php if (!empty($secondary_links)){ print theme('links', $secondary_links, array('id' => 'secondary', 'class' => 'links sub-menu')); } ?>
          </div> <!-- /navigation -->
        <?php endif; ?>

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
        <div id="footer">
          <?php print $footer_message; ?>
          <?php print $footer_block; ?>
        </div> <!-- /footer -->
      <?php endif; ?>

    </div> <!-- /page -->
    <?php print $closure; ?>
  </body>
</html>
