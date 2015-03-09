<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
<div class="page-header">
<div class="container-fluid">
<div class="pull-right">
<button type="submit" form="form-latest-products" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
<a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
<h1><img src="view/image/feed.png" alt="" /> <?php echo $heading_title; ?></h1>
<ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
   <li> <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
    <?php } ?>
  </ul
  </div>
  </div>
<div class="panel panel-default">
<div class="panel-body">
<div class="container-fluid">
	<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-latest-products" class="form-horizontal">
<div class="form-group">
<label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
<div class="col-sm-10">
<select name="latest_products_rss_status" id="input-status" class="form-control">
<?php if ($latest_products_rss_status) {
 ?>
    			    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
    			    <option value="0"><?php echo $text_disabled; ?></option>
<?php } else { ?>
    			    <option value="1"><?php echo $text_enabled; ?></option>
    			    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
<?php } ?>
			</select>
			</div>
</div>
<div class="form-group">
		    <label class="col-sm-2 control-label" for="input-data-feed"><?php echo $entry_limit; ?></label>
		    <div class="col-sm-10">
			<input name="latest_products_rss_limit" value="<?php echo $latest_products_rss_limit ? $latest_products_rss_limit : '100'; ?>">
			<?php if ($error_limit) { ?>
    			<span class="error"><?php echo $error_limit; ?></span>
			<?php } ?>
</div>
</div>
    	<div class="form-group">
<label class="col-sm-2 control-label" for="input-data-feed"><?php echo $entry_show_price; ?></label>
    		   <div class="col-sm-10">
			   <input type="checkbox" name="latest_products_rss_show_price" value="1"<?php echo $latest_products_rss_show_price == 1 ? ' checked="checked"' : ''; ?>>
</div>
</div>
		<div class="form-group">
<label class="col-sm-2 control-label" for="input-data-feed"><?php echo $entry_include_tax; ?></label>
    		   <div class="col-sm-10"><input type="checkbox" name="latest_products_rss_include_tax" value="1"<?php echo $latest_products_rss_include_tax == 1 ? ' checked="checked"' : ''; ?>>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-data-feed"><?php echo $entry_show_image; ?></label>
    		   <div class="col-sm-10"><input type="checkbox" name="latest_products_rss_show_image" value="1"<?php echo $latest_products_rss_show_image == 1 ? ' checked="checked"' : ''; ?>>
</div>
</div>
 <div class="form-group">
<label class="col-sm-2 control-label" for="input-data-feed"><?php echo $entry_image_size; ?></label>
    		  <div class="col-sm-10"><input type="text" size="3" value="<?php echo $latest_products_rss_image_width; ?>" name="latest_products_rss_image_width">
    			x
    			<input type="text" size="3" value="<?php echo $latest_products_rss_image_height; ?>" name="latest_products_rss_image_height">
			<?php if ($error_image_dimensions) { ?>
    			<span class="error"><?php echo $error_image_dimensions; ?></span>
			<?php } ?>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-data-feed">
    		    <?php echo $entry_data_feed; ?></label>
    		    <div class="col-sm-10">
				<textarea cols="40" rows="5" readonly="readonly"><?php echo $data_feed; ?></textarea>
				</div>
</div>
    	</form>
        </div>
    </div>
</div>
<?php echo $footer; ?>