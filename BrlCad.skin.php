<?php
/**
 * Skin file for skin BrlCad Skin
 *
 * @file 
 * @ingroup Skins
 */


/**
 * Skin Template class for BrlCad Skin skin
 * @ingroup Skins
 */

class SkinBrlCad extends SkinTemplate {
	var $skinname = 'brlcad', $stylename = 'brlcad',
		$template = 'BrlCadTemplate', $useHeadElement = true;	
	/**
	 * @param $out OutputPage object
	 */

	function setupSkinUserCss( OutputPage $out ){
		parent::setupSkinUserCss( $out );
		$out->addModuleStyles( "skins.brlcad" );
	}
}

/**
 * @todo document
 * @ingroup Skins
 */
class BrlCadTemplate extends BaseTemplate {

	/**
	 * Template filter callback for BrlCad skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */
    
	function execute() {
        
		// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();

		$this->html( 'headelement' );
?>

<!-- MARK UP STARTS FROM HERE -->

<!-- BRL-CAD main website navigation -->
<div class="brlcad-site-nav">
<div class="container">
        <!-- the circular logo that also works as menu toggle -->
		<div class="id_logo" id='logo'>
            <span class="circle" href="#"> 
                <img src= <?php echo $this->getSkin()->getSkinStylePath( 'images/logo_70.png'); ?> width="40px" height="40px"/>
            </span> 
        </div>
        
        <!-- header code starts here -->
		<header class="head">
			 <nav class="navbar"> 
				<ul class="navigation id_main-nav" id="main-nav">				
					<li><a href="">
                        <img class = "icon" src=<?php echo $this->getSkin()->getSkinStylePath( 'images/icons/gallery.png'); ?>  />
                        Gallery</a></li>
                    <li><a href="">
                        <img class = "icon" src=<?php echo $this->getSkin()->getSkinStylePath( 'images/icons/wiki.png'); ?>  />
                        Blog</a></li>
                    <li><a href="">
                        <img class = "icon" src=<?php echo $this->getSkin()->getSkinStylePath( 'images/icons/contribute.png'); ?> >
                        Community</a></li> 
                    <li><a href="">
                        <img class = "icon" src= <?php echo $this->getSkin()->getSkinStylePath( 'images/icons/documentation.png'); ?> />
                        Documentation</a></li>
                    <li><a href=""> 
                        <img class = "icon" src= <?php echo $this->getSkin()->getSkinStylePath( 'images/icons/download-2.png'); ?> />
                        Download</a></li>
                    <li class="selected">
                        <a href="#about">
                             <img class = "icon" src=<?php echo $this->getSkin()->getSkinStylePath( 'images/icons/home.png'); ?>  />

                            About
                        </a>
                    </li>
                    
				</ul>
			</nav>
		</header>
</div>

<style>
    @font-face {
  font-family: "untitled-font-2";
  src:url("<?php echo $this->getSkin()->getSkinStylePath('stylesheets/fonts/untitled-font-2.eot');?>");
  src:url("<?php echo $this->getSkin()->getSkinStylePath('stylesheets/fonts/untitled-font-2.eot?#iefix');?>") format("embedded-opentype"),
    url("<?php echo $this->getSkin()->getSkinStylePath('stylesheets/fonts/untitled-font-2.ttf');?>") format("truetype"),
    url("<?php echo $this->getSkin()->getSkinStylePath('stylesheets/fonts/untitled-font-2.svg#untitled-font-2');?>") format("svg"),
    url("<?php echo $this->getSkin()->getSkinStylePath('stylesheets/fonts/untitled-font-2.woff');?>") format("woff");
  font-weight: normal;
  font-style: normal;
}
    
</style>
<!-- MOBILE ONLY NAVIGATIONS -->
<!-- set of full screen mobile navigation panels that appear only on smaller screens -->    

<!-- Toolbox navigation -->
<div class="mobile-nav mobile-nav-toolbox">
    
    <div class="m-nav-container">
    <!-- quit button on the right hand side -->
        <div class="nav-quit"><a class="nav-quit-X" href="#">X</a></div>
        
    <!-- personal tools -->
        <div class="m-nav-ptools">
            <!-- personal tools box called protlet, for mobile m-portlet -->
             <div class="m-portlet" id="m-p-personal" role="navigation">
                 <!-- portlet heading -->
		          <h3 id="m-personal-tools"><?php $this->msg( 'personaltools' ) ?></h3>
                 <!-- portlet body -->
		          <div class="m-pBody">
			         <ul<?php $this->html( 'userlangattributes' ) ?> class="m-nav-ul">
                         <?php  foreach ( $this->getPersonalTools() as $key => $item ) { 
				             echo $this->makeListItem( $key, $item ); 
                            } ?>
			         </ul>
		          </div>
                </div>
        </div>
    <!-- personal tools end here -->
        
    <!-- tools -->
        <div class=" m-nav-tools">
            <div class="m-portlet" id="m-p-tb" role="navigation">
                <h3><?php $this->msg( 'toolbox' ) ?></h3>
                <div class="m-pBody">
                    <ul class="m-nav-ul">
                    <?php foreach ( $this->getToolbox() as $key => $tbitem ) { 
                                echo $this->makeListItem( $key, $tbitem ); 
                            }
		                  wfRunHooks( 'BrlCadTemplateToolboxEnd', array( &$this ) );
		                  wfRunHooks( 'SkinTemplateToolboxEnd', array( &$this, true ) );
                    ?>
			     </ul>
		      </div>
	       </div>
        </div>
    <!-- tools end here -->    
    </div>
<!-- first nav container ends here -->
</div>
<!-- Tool box navigation ends here -->
    
<!-- Views mobile navigation -->
<div class="mobile-nav mobile-nav-views">
    <div class="m-nav-container m-nav-views">
        <div class="nav-quit"><a class="nav-quit-X" href="#">X</a></div>
        <div id="m-p-cactions" class="m-portlet" role="navigation">
		  <h3><?php $this->msg( 'views' ) ?></h3>
		  <div class="m-pBody">
            <ul class="m-nav-ul"><?php
				foreach ( $this->data['content_actions'] as $key => $tab ) {
					echo '
				' . $this->makeListItem( $key, $tab );
				} ?>
              </ul>
		</div>
	   </div>
    </div> 
</div>
<!-- ********* ---->

<!-- the content starts from here -->
<div class="content-wrapper">
<!-- left control bar acts as the wrapper for wiki article's views -->
    <div class = "left-control-bar"> <?php $this->cactions(); ?> </div>
    
<!-- Column content contains the wiki article container used to differentiate 
    from column-one which is container for sidebar -->
    
	<div class="column-content">

<!-- Notifications from mediawiki shows here -->
		<?php if ( $this->data['sitenotice'] ) { ?>
			<div id="siteNotice">
				<?php $this->html( 'sitenotice' ) ?>
			</div>
		<?php } ?>

<!-- The wiki article starts from here -->
		<div class="content mw-body-primary" role="main">
			<a id="top"></a>
        <!-- page top bar is a container for on-page navigation, page is the place 
            where all the content of wiki is stored. It appears currently (feb14,2014) 
            only on smaller screens -->
            <div class="page-top-bar">
                <div class="page-nav">
                <!-- d is home icon, C is toolbar icon (wrench) and e is quil signifying editing -->
                    <a class="page-nav-item" id="pn-home" href =
                       <?php echo $this->data['nav_urls']['mainpage']['href']; ?>
                        > d </a>
                    
                    <a class="page-nav-item" id="pn-tools" href ="#"> C </a> 
                    
                    <a class="page-nav-item" id="pn-views" href="#"> e </a> 
                    
                    <a class="page-nav-item" id="pn-brl-cad" href="http://brlcad.org">
                         <img src= 
                              <?php echo $this->getSkin()->getSkinStylePath( 'images/logo_70.png'); ?> 
                              width="30px" height="30px"
                            />
                    </a>
                </div>
                
                <div class ="page-search"> <?php $this->searchbox(); ?> </div>
            </div>
         
		<!-- Heading of the wiki article -->	
			<h1 class="first-heading" lang="<?php
				$this->data['pageLanguage'] = 
                    $this->getSkin()->getTitle()->getPageViewLanguage()->getHtmlCode();
				$this->text( 'pageLanguage' );
				?>">
                <span dir="auto"><?php $this->html( 'title' ) ?></span>
                
        <!-- Minutes show the number of minutes it would take to read the article
                It's value is populated from javascript 
                TODO: remove minutes div out of <h1>-->
                <div id="minutes"></div>
			</h1>
           
           
		<!-- Paragraphs and body of the wiki article -->
			<div class=" the-text mw-body">
				<div id="content-sub"<?php $this->html( 'userlangattributes' ) ?>>
                    <?php $this->html( 'subtitle' ) ?></div>

				<?php if ( $this->data['undelete'] ) { ?>
					<div class="content-sub-2">
						<?php $this->html( 'undelete' ) ?>
					</div>
				<?php } ?>

				<?php if ( $this->data['newtalk'] ) { ?>
						<div class="user-message">
							<?php $this->html( 'newtalk' ) ?>
						</div>
				<?php } ?>

				<div class="jump-to-nav mw-jump">
					<?php $this->msg( 'jumpto' ) ?> 
					<a href="#column-one"><?php $this->msg( 'jumptonavigation' ) ?></a>
					<?php $this->msg( 'comma-separator' ) ?>
					<a href="#searchInput"><?php $this->msg( 'jumptosearch' ) ?></a>
				</div>

			<!-- start content -->
				<?php $this->html( 'bodytext' ) ?>
				<?php if ( $this->data['catlinks'] ) { $this->html( 'catlinks' ); } ?>
			<!-- end content -->
                
                <a id="mw-page-bottom"></a>
                
		      <?php if ( $this->data['dataAfterContent'] ) { $this->html( 'dataAfterContent' ); } ?>
		      <div class="visualClear"></div>
	       </div> <!-- the-text ends here -->
        </div><!-- content ends here -->
        
    </div><!-- column content ends here -->
    
<!-- Column one is the container for the sidebar -->
<div id="column-one"<?php $this->html( 'userlangattributes' ) ?>>
    
    <!-- Main navigation, Search and tools -->
    <?php $this->renderPortals( $this->data['sidebar'] ); ?>
    
    <!-- Personal Tools -->
    <div class="portlet" id="p-personal" role="navigation">
		<h3 id="personal-tools"><?php $this->msg( 'personaltools' ) ?></h3>
		<div class="pBody">
			<ul class="sidebar-ul"<?php $this->html( 'userlangattributes' ) ?>>
                <?php foreach ( $this->getPersonalTools() as $key => $item ) { ?>
				    <?php echo $this->makeListItem( $key, $item ); ?>
                <?php } ?>
			</ul>
		</div>
	</div>
    
</div><!-- end of the sidebar -->

<div class="visualClear"></div>
    
    <?php
	   $validFooterIcons = $this->getFooterIcons( "icononly" );
	   $validFooterLinks = $this->getFooterLinks( "flat" ); // Additional footer links

	   if ( count( $validFooterIcons ) + count( $validFooterLinks ) > 0 ) { ?>
    <!-- Footer markup starts here -->
    <div id="footer" role="contentinfo"<?php $this->html( 'userlangattributes' ) ?>>
                <?php
		          $footerEnd = '</div>';
	   } else {
		  $footerEnd = '';
	   }
        
	   foreach ( $validFooterIcons as $blockName => $footerIcons ) { ?>
	       <div id="f-<?php echo htmlspecialchars( $blockName ); ?>ico">
                <?php foreach ( $footerIcons as $icon ) { ?>
		              <?php echo $this->getSkin()->makeFooterIcon( $icon ); ?>
                <?php } ?>
	       </div>
    <?php }

        if ( count( $validFooterLinks ) > 0 ) { ?>	
            <ul id="f-list">
                <?php foreach ( $validFooterLinks as $aLink ) { ?>
		          <li id="<?php echo $aLink ?>"><?php $this->html( $aLink ) ?></li>
                <?php } ?>
	       </ul>
                <?php } echo $footerEnd; ?>

        </div> <!-- footer ends -->

<!-- SCRIPTS DUNGEON -->    

    <!-- loading jquery,scrollbar plugin and their dependencies -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

     <!-- the mousewheel plugin - optional to provide mousewheel support -->
    <script type="text/javascript" src="<?php echo $this->getSkin()->getSkinStylePath( 'scripts/jquery.transit.min.js'); ?>"></script>
  
<!-- script for the toggle navigation menu -->
    <script type="text/javascript">
    var isMenuOpen = false;
    $("#logo").click(function(){
        var headHeight = $(".head").height();

        if(isMenuOpen)
        {
            $(".head").animate({
                "top":"-"+(headHeight*2)
            }, 1000 );
            isMenuOpen=false;
        }
        else
        {
            $(".head").animate({
                "top":"0px"
            }, 1000);
            isMenuOpen=true;
        }
    });
    </script>   
    
<!-- Script for mobile navigation menus -->
    <script type="text/javascript">
    $('.mobile-nav a').click(function(){
        console.log("done");
        $(".mobile-nav").transition({
            top:"-1000px"
        },700 );
        $('body').css({"overflow":"auto"});
    });
        
      $('#pn-tools').click(function(){
        $(".mobile-nav-toolbox").transition({
            "top":"0",
            delay:500
        },1000);
        $('body').css({"overflow":"hidden"});
    });
        
    $('#pn-views').click(function(){
        $(".mobile-nav-views").transition({
            "top":"0",
            delay:500
        },1000);
      $('body').css({"overflow":"hidden"});
    });
    
  
   
    </script>
 
    <!-- script to initiate scroll on same anchor, credits:css-tricks.com -->
    <script type="text/javascript">
    $(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
       
});
</script>
    
<!-- script to count the number of minutes it would take to read a wiki page -->
    <script type="text/javascript">
        var text = $("#mw-content-text").text();
        var wordCount = text.replace( /[^\w ]/g, "" ).split( /\s+/ ).length;
        var minutesToRead = Math.round(wordCount/300);
        $("#minutes").text(minutesToRead + "  min read");
    </script>
    
<?php
		$this->printTrail();
		echo Html::closeElement( 'body' );
		echo Html::closeElement( 'html' );
		wfRestoreWarnings();
	} // end of execute() method

	/*************************************************************************************************/

    
/********** FUNCTIONS DUNGEON exact as from monobook theme **********/
	/**
	 * @param $sidebar array
	 */
	protected function renderPortals( $sidebar ) {
		if ( !isset( $sidebar['SEARCH'] ) ) {
			$sidebar['SEARCH'] = true;
		}
		if ( !isset( $sidebar['TOOLBOX'] ) ) {
			$sidebar['TOOLBOX'] = true;
		}
		if ( !isset( $sidebar['LANGUAGES'] ) ) {
			$sidebar['LANGUAGES'] = true;
		}

		foreach ( $sidebar as $boxName => $content ) {
			if ( $content === false ) {
				continue;
			}

			if ( $boxName == 'SEARCH' ) {
				$this->searchBox();
			} elseif ( $boxName == 'TOOLBOX' ) {
				$this->toolbox();
			} elseif ( $boxName == 'LANGUAGES' ) {
				$this->languageBox();
			} else {
				$this->customBox( $boxName, $content );
			}
		}
	}

	function searchBox() {
		global $wgUseTwoButtonsSearchForm;
        ?>
	<div id="p-search" class="portlet" role="search">
		<h3><label for="searchInput"><?php $this->msg( 'search' ) ?></label></h3>
		<div id="searchBody" class="pBody">
			<form action="<?php $this->text( 'wgScript' ) ?>" id="searchform">
				<input type='hidden' name="title" value="<?php $this->text( 'searchtitle' ) ?>"/>
				<?php echo $this->makeSearchInput( array( "id" => "searchInput" ) ); ?>

				<?php echo $this->makeSearchButton( "go", array( "id" => "searchGoButton", "class" => "searchButton" ) );
				if ( $wgUseTwoButtonsSearchForm ) { ?>&#160;
				<?php echo $this->makeSearchButton( "fulltext", array( "id" => "mw-searchButton", "class" => "searchButton" ) );
				} else { ?>

				<div><a href="<?php $this->text( 'searchaction' ) ?>" rel="search"><?php $this->msg( 'powersearch-legend' ) ?></a></div><?php
				} ?>

			</form>
		</div>
	</div>
<?php
	}

	/**
	 * Prints the cactions bar.
	 * Shared between MonoBook and Modern
	 */
	function cactions() {
?>
	<div id="p-cactions" class="portlet" role="navigation">
		<h3><?php $this->msg( 'views' ) ?></h3>
		<div class="pBody">
             
			<ul><?php
				foreach ( $this->data['content_actions'] as $key => $tab ) {
					echo '
				' . $this->makeListItem( $key, $tab );
				} ?>

			</ul>
		</div>
	</div>
<?php
	}
	/*************************************************************************************************/
	function toolbox() {
?>
	<div class="portlet" id="p-tb" role="navigation">
		<h3><?php $this->msg( 'toolbox' ) ?></h3>
		<div class="pBody">
			<ul>
<?php
		foreach ( $this->getToolbox() as $key => $tbitem ) { ?>
				<?php echo $this->makeListItem( $key, $tbitem ); ?>

<?php
		}
		wfRunHooks( 'BrlCadTemplateToolboxEnd', array( &$this ) );
		wfRunHooks( 'SkinTemplateToolboxEnd', array( &$this, true ) );
?>
			</ul>
		</div>
	</div>
<?php
	}

	/*************************************************************************************************/
	function languageBox() {
		if ( $this->data['language_urls'] ) {
?>
	<div id="p-lang" class="portlet" role="navigation">
		<h3<?php $this->html( 'userlangattributes' ) ?>><?php $this->msg( 'otherlanguages' ) ?></h3>
		<div class="pBody">
			<ul>
<?php		foreach ( $this->data['language_urls'] as $key => $langlink ) { ?>
				<?php echo $this->makeListItem( $key, $langlink ); ?>

<?php		} ?>
			</ul>
		</div>
	</div>
<?php
		}
	}

	/*************************************************************************************************/
	/**
	 * @param $bar string
	 * @param $cont array|string
	 */
	function customBox( $bar, $cont ) {
		$portletAttribs = array( 'class' => 'generated-sidebar portlet', 'id' => Sanitizer::escapeId( "p-$bar" ), 'role' => 'navigation' );
		$tooltip = Linker::titleAttrib( "p-$bar" );
		if ( $tooltip !== false ) {
			$portletAttribs['title'] = $tooltip;
		}
		echo '	' . Html::openElement( 'div', $portletAttribs );
		$msgObj = wfMessage( $bar );
?>

		<h3><?php echo htmlspecialchars( $msgObj->exists() ? $msgObj->text() : $bar ); ?></h3>
		<div class='pBody'>
<?php   if ( is_array( $cont ) ) { ?>
			<ul>
<?php 			foreach ( $cont as $key => $val ) { ?>
				<?php echo $this->makeListItem( $key, $val ); ?>

<?php			} ?>
			</ul>
<?php   } else {
			# allow raw HTML block to be defined by extensions
			print $cont;
		}
?>
		</div>
	</div>
<?php
	}
} // end of class