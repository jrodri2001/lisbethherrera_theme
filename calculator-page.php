<?php
/*
* Template Name: Calculator page template
* Description: Custom template for Calculators.
*/

// Code to display Page goes here...

function theme_name_scripts() {
  wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all' );
  wp_enqueue_style( 'bootstrap-print', get_stylesheet_directory_uri() . '/print.css', array(), false, 'print' );
  wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), '3.0.0', true );
  wp_enqueue_script( 'calculate_script', '/calcscript.js', array(), '1.0.0', true );
  wp_enqueue_script( 'calculate_script', get_stylesheet_directory_uri() . '/js/jquery.mask.min', array(), '1.0.0', true );
  
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );


get_header();
?>
<div class="printinfo" style="display: none;">info@lisbethherrera.com / (647) 833 1171</div>

<div id="main-content">	
  <div class="container">
	<div id="content-area" class="clearfix">
	  <div id="left-area">
		
		
		<?php while (have_posts()) : the_post();
		?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class();
		?>>
		  
		  <h1 class="main_title"><?php the_title();
			?></h1>
		  <?php
$thumb = '';
$width = (int)apply_filters('et_pb_index_blog_image_width', 1080);
$height = (int)apply_filters('et_pb_index_blog_image_height', 675);
$classtext = 'et_featured_image';
$titletext = get_the_title();
$thumbnail = get_thumbnail($width, $height, $classtext, $titletext, $titletext, false, 'Blogimage');
$thumb = $thumbnail["thumb"];

if ('on' === et_get_option('divi_page_thumbnails', 'false') && '' !== $thumb)
  print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height);
		  ?>
		  
		  
		  <div class="entry-content">
			<?php
the_content();
wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'Divi'), 'after' => '</div>'));
			?>
		  </div>
		  <!-- .entry-content -->
		  
		  <?php
if (!$is_page_builder_used && comments_open() && 'on' === et_get_option('divi_show_pagescomments', 'false')) comments_template('', true);
		  ?>
		  
		</article> <!-- .et_pb_post -->
		
		<?php endwhile;
		?>
		
		<!--bootstrap calculator-->
		<div class="container-fluid" style="padding-top: 30px;padding-bottom: 20px;">
		  <form class="form-horizontal" name="calculator">
			<div class="row">
			  <div class="col-xs-12">
				
				<!-- Text input-->
				<div class="form-group">
				  <label class=" control-label" for="price">Price</label>
				  
				  
				  <input id="price" name="price" type="text" placeholder="Property Price"
				  class="form-control input-md" required="">
				  
				</div>
				
			  </div>
			</div>
			
			<div class="row">
			  <div class="col-xs-12">
				<!-- Multiple Checkboxes -->
				<div class="form-group">
				  
				  
				  
				  
				  <div class="checkbox">
					<label>
					  <input type="checkbox" name="firsttimehomebuyer"
					  id="firsttimehomebuyer" value="1">
					  First Time Buyer
					</label>
				  </div>
				  <div class="checkbox disabled">
					<label>
					  <input type="checkbox" name="torontopurchase"
					  id="torontopurchase" value="1">
					  Property located in Toronto
					</label>
				  </div>
				  
				  
				  
				  
				</div>
			  </div>
			</div>
			
			
			
			
			  <div class="row calculateRow">
			  <div class="col-xs-12">
				<!-- Button -->
				<div class="form-group">
				  <label class="control-label" for="calculate"></label>
				  
				  <button id="calculate" name="calculate"  type="button" class="btn btn-primary btn-lg btn-block">
					  <span class="glyphicon glyphicon-th" aria-hidden="true"></span> Calculate
					</button>
				 
				  
				</div>
			  </div>
			</div>
			
			
			<div class="row">
			  <div class="col-xs-12">
				<!-- Text input-->
				<div class="form-group center">
				  
				  <!--<input id="tax" name="tax" type="text" placeholder="" class="form-control input-md">--><!---->
				  <div id="taxResult" class="calcResult">0</div>
				  <span class="help-block">Total transfer tax to pay</span>
				  
				</div>
			  </div>
			</div>
			
			
		  </form>		 
		</div>
		
		<div class="container-fluid" style="padding-top: 30px;padding-bottom: 20px;">
		  <form name="calculateThis" method="get">
			<input type="hidden" name="io_listing_afford" value="">
			<input type="hidden" name="io_gds" value="32.00">
			<input type="hidden" name="io_heating" value="0">
			
			<div class="row">
			  <div class="col-sm-3">
				<div class="form-group">
				  <label class="col-sm-12 control-label" for="io_price">Listing Price</label>
				  <input name="io_price" type="text" value=""  id="io_price" class="form-control input-md">
				</div>
			  </div>
			  <div class="col-sm-3">
				<div class="form-group">
				  <label class="col-sm-12 control-label" for="io_interest">Interest Rate</label>
				  <input name="io_interest" type="text" value="5.25" id="io_interest" class="form-control input-md">
				</div>
			  </div>
			  <div class="col-sm-3">
				<div class="form-group">
				  <label class="col-sm-12 control-label" for="io_taxes">Taxes (Anual)</label>
				  <input name="io_taxes" type="text" value="" id="io_taxes" class="form-control input-md">
				</div>
			  </div>
			  <div class="col-sm-3">
				<div class="form-group">
				  <label class="col-sm-12 control-label" for="io_condo">Condo fees</label>
				  <input name="io_condo" type="text" value="" id="io_condo" class="form-control input-md">
				</div>
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-6">
				<div class="form-group">
				  <label class="col-sm-12 control-label" for="io_amortization">Amortization</label>
				  <select name="io_amortization" onchange="doCalc();" class="form-control" id="io_amortization">
					<option value="10">10 years</option>
					<option value="15">15 years</option>
					<option value="20">20 years</option>
					<option value="25" selected="selected">25 years</option>
					<option value="30">30 years</option>
					<option value="35">35 years</option>
					<option value="40">40 years</option>
				  </select>
				</div>
			  </div>			  
			</div>
			
			<div class="row calculateRow">
			  <div class="col-sm-12">
				<div class="col-sm-6">
				  <div class="form-group">
					<button id="calculateBtn" type="button" class="btn btn-primary btn-lg btn-block">
					  <span class="glyphicon glyphicon-th" aria-hidden="true"></span> Calculate
					</button>
					
				  </div>
				</div>
				<div class="col-sm-6">
				  <div class="form-group">
					<input id="resetBtn" class="btn btn-default btn-lg btn-block" type="reset" value="Reset">
				  </div>
				</div>
			  </div>
			</div>
			
			<div class="row">			  
			  <div class="col-sm-3">
				
			  </div>
			  
			  <div class="col-sm-3">
				<div class="form-group">
				  <select id="percent_down1" name="percent_down1" onchange="doCalc();" class="form-control">
					<option value="0">0%</option>
					<option value="05" selected="selected">5%</option>
					<option value="15">15%</option>
					<option value="20">20%</option>
					<option value="25">25%</option>
					<option value="30">30%</option>
					<option value="35">35%</option>
					<option value="40">40%</option>
					<option value="45">45%</option>
					<option value="50">50%</option>
				  </select>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <select id="percent_down2" name="percent_down2" onchange="doCalc();" class="form-control">
					<option value="0">0%</option>
					<option value="05">5%</option>
					<option value="10" selected="selected">10%</option>
					<option value="15">15%</option>
					<option value="20">20%</option>
					<option value="25">25%</option>
					<option value="30">30%</option>
					<option value="35">35%</option>
					<option value="40">40%</option>
					<option value="45">45%</option>
					<option value="50">50%</option>
				  </select>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <select name="percent_down3" onchange="doCalc();" class="form-control">
					<option value="0">0%</option>
					<option value="05">5%</option>
					<option value="10">10%</option>
					<option value="15" selected="selected">15%</option>
					<option value="20">20%</option>
					<option value="25">25%</option>
					<option value="30">30%</option>
					<option value="35">35%</option>
					<option value="40">40%</option>
					<option value="45">45%</option>
					<option value="50">50%</option>
				  </select>
				</div>
			  </div>			  
			</div>
			
			
			<div class="row">			  
			  <div class="col-sm-3">
				Downpayment
			  </div>
			  
			  <div class="col-sm-3">
				<div class="form-group">
				  <input type="text" name="down_payment1" id="down_payment1" class="form-control input-md" readonly>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <input type="text" name="down_payment2"  id="down_payment2" class="form-control input-md" readonly>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <input type="text" name="down_payment3" id="down_payment3" class="form-control input-md" readonly>
				</div>
			  </div>			  
			</div>
			
			<div class="row">			  
			  <div class="col-sm-3">
				Mortgage
			  </div>
			  
			  <div class="col-sm-3">
				<div class="form-group">
				  <input type="text" name="first_mortgage1" id="first_mortgage1" class="form-control input-md" readonly>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <input type="text" name="first_mortgage2"  id="first_mortgage2" class="form-control input-md" readonly>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <input type="text" name="first_mortgage3"  id="first_mortgage3" class="form-control input-md" readonly>
				</div>
			  </div>			  
			</div>
			
			<div class="row">			  
			  <div class="col-sm-3">
				CMHC/GE Premium
			  </div>
			  
			  <div class="col-sm-3">
				<div class="form-group">
				  <input type="text" name="cmhc1"  id="cmhc1" class="form-control input-md" readonly>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <input type="text" name="cmhc2"  id="cmhc2" class="form-control input-md" readonly>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <input type="text" name="cmhc3"  id="cmhc3" class="form-control input-md" readonly>
				</div>
			  </div>			  
			</div>
			
			<div class="row">			  
			  <div class="col-sm-3">
				Financing
			  </div>
			  
			  <div class="col-sm-3">
				<div class="form-group">
				  <input type="text" name="total_financing1"  id="total_financing1" class="form-control input-md" readonly>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <input type="text" name="total_financing2"  id="total_financing2" class="form-control input-md" readonly>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <input type="text" name="total_financing3"  id="total_financing3" class="form-control input-md" readonly>
				</div>
			  </div>			  
			</div>
			
			<div class="row">			  
			  <div class="col-sm-3">
				Monthly payment
			  </div>
			  
			  <div class="col-sm-3">
				<div class="form-group">
				  <input type="text" name="monthly_payment1" id="monthly_payment1" class="form-control input-md" readonly>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <input type="text" name="monthly_payment2" id="monthly_payment2" class="form-control input-md" readonly>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <input type="text" name="monthly_payment3" id="monthly_payment3" class="form-control input-md" readonly>
				</div>
			  </div>			  
			</div>
			
			<div class="row">			  
			  <div class="col-sm-3">
				Expenses
			  </div>
			  
			  <div class="col-sm-3">
				<div class="form-group">
				  <input type="text" name="expenses1" id="expenses1" class="form-control input-md" readonly>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <input type="text" name="expenses2" id="expenses2" class="form-control input-md" readonly>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <input type="text" name="expenses3" id="expenses3" class="form-control input-md" readonly>
				</div>
			  </div>			  
			</div>
			
			<div class="row">			  
			  <div class="col-sm-3">
				Total Payment
			  </div>
			  
			  <div class="col-sm-3">
				<div class="form-group">
				  <input type="text" name="total_payment1" id="total_payment1" class="form-control input-md" readonly>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <input type="text" name="total_payment2" id="total_payment2" class="form-control input-md" readonly>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <input type="text" name="total_payment3" id="total_payment3" class="form-control input-md" readonly>
				</div>
			  </div>			  
			</div>
			
			<div class="row">			  
			  <div class="col-sm-3">
				Required Income
			  </div>
			  
			  <div class="col-sm-3">
				<div class="form-group">
				  <input type="text" name="income_required1" id="income_required1" class="form-control input-md" readonly>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <input type="text" name="income_required2" id="income_required2" class="form-control input-md" readonly>
				</div>
			  </div>
			  
			  <div class="col-sm-3 hidden-xs">
				<div class="form-group">
				  <input type="text" name="income_required3" id="income_required3" class="form-control input-md" readonly>
				</div>
			  </div>			  
			</div>
			
			
			<div class="row">
			  <div class="col-sm-12">
				<p>*Estimated calculations, actual results may differ</p>
			  </div>
			</div>
		  </form>
		</div>
		
		<script>
		  jQuery(document).ready(function(){
			jQuery('#calculate').on('click',function(event){
			  event.preventDefault();
			  calculate();
			  
			}
								   );
			
			jQuery('#calculateBtn').on('click',function(event){
			  event.preventDefault();
			  calculate();
			  
			  doCalc();
			  
			}
									  );
			
			/*
			jQuery("#tax").on('change', function(){
			jQuery('#tax').mask('000.000.000.000.000,00', {
			reverse: true}
			);
			}
			);
			*/
			
		  }
								);
		</script>
		<!--end bootstrap calculator-->
		
		
		
	  </div>
	  <!-- #left-area -->
	  
	  <?php get_sidebar();
	  ?>
	  
	</div>
	<!-- #content-area -->
	
  </div>
  <!-- .container -->
  
  
</div> <!-- #main-content -->


<?php get_footer();
?>