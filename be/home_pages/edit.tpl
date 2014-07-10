<?php
/* @var $this \ITTI\FP\EditForm */
?>
<script>
	jQuery(document).ready(function($){
		$('.simple-tabs').each(function(){
			var self = $(this);
			self.find('>div').hide();
			self.find('>div:first').show();
			self.find('>ul>li:first').addClass('active');
			self.find('>ul>li>a').click(function(){
				self.find('>ul>li').removeClass('active');
				$(this).parent().addClass('active');
				var currentTab = $(this).attr('href');
				self.find('>div').hide();
				console.log($(currentTab));
				self.find(currentTab).show();
				return false;
			});
		});
	});
</script>

<div class="simple-tabs">
	<ul>
		<li><a href="#tab_tb1">Text box 1</a></li>
		<li><a href="#tab_tb2">Text box 2</a></li>
		<li><a href="#tab_ib1">Image box 1</a></li>
		<li><a href="#tab_ib2">Image box 2</a></li>
		<li><a href="#tab_ib3">Image box 3</a></li>
	</ul>

	<div id="tab_tb1" itti:asis="">
		<table class="BEEditTable">
			<tr>
				<td><label for="cid"></label></td>
				<td><input name="cid" /></td>
			</tr>
			<?php
			foreach ($this->Languages as $k=>$v) {
			echo <<<EOD
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.text1_title">Title</label></td>
				<td><input name="lng_{$k}.text1_title" /></td>
			</tr>
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.text1_href">Link</label></td>
				<td><input name="lng_{$k}.text1_href" /></td>
			</tr>
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.text1_body">Body</label></td>
				<td><textarea name="lng_{$k}.text1_body" style='width:750px; height:250px;'></textarea></td>
			</tr>
EOD;
			}
			?>
		</table>
	</div>

	<div id="tab_tb2" itti:asis="">
		<table class="BEEditTable">
			<tr>
				<td><label for="cid"></label></td>
				<td><input name="cid" /></td>
			</tr>
			<?php
			foreach ($this->Languages as $k=>$v) {
			echo <<<EOD
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.text2_title">Title</label></td>
				<td><input name="lng_{$k}.text2_title" /></td>
			</tr>
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.text2_href">Link</label></td>
				<td><input name="lng_{$k}.text2_href" /></td>
			</tr>
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.text2_body">Body</label></td>
				<td><textarea name="lng_{$k}.text2_body" style='width:750px; height:250px;'></textarea></td>
			</tr>
EOD;
			}
			?>
		</table>
	</div>

	<div id="tab_ib1" itti:asis="">
		<table class="BEEditTable">
			<tr>
				<td><label for="cid"></label></td>
				<td><input name="cid" /></td>
			</tr>
			<?php
			foreach ($this->Languages as $k=>$v) {
			echo <<<EOD
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.image1_title">Title</label></td>
				<td><input name="lng_{$k}.image1_title" /></td>
			</tr>
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.image1_href">Link</label></td>
				<td><input name="lng_{$k}.image1_href" /></td>
			</tr>
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.image1_href">Image</label></td>
				<td><input name="lng_{$k}.image1_img" /></td>
			</tr>
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.image1_body">Body</label></td>
				<td><textarea name="lng_{$k}.image1_body" style='width:750px; height:250px;'></textarea></td>
			</tr>
EOD;
			}
			?>
		</table>
	</div>

	<div id="tab_ib2" itti:asis="">
		<table class="BEEditTable">
			<tr>
				<td><label for="cid"></label></td>
				<td><input name="cid" /></td>
			</tr>
			<?php
			foreach ($this->Languages as $k=>$v) {
			echo <<<EOD
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.image2_title">Title</label></td>
				<td><input name="lng_{$k}.image2_title" /></td>
			</tr>
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.image2_href">Link</label></td>
				<td><input name="lng_{$k}.image2_href" /></td>
			</tr>
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.image2_href">Image</label></td>
				<td><input name="lng_{$k}.image2_img" /></td>
			</tr>
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.image2_body">Body</label></td>
				<td><textarea name="lng_{$k}.image2_body" style='width:750px; height:250px;'></textarea></td>
			</tr>
EOD;
			}
			?>
		</table>
	</div>

	<div id="tab_ib3" itti:asis="">
		<table class="BEEditTable">
			<tr>
				<td><label for="cid"></label></td>
				<td><input name="cid" /></td>
			</tr>
			<?php
			foreach ($this->Languages as $k=>$v) {
			echo <<<EOD
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.image3_title">Title</label></td>
				<td><input name="lng_{$k}.image3_title" /></td>
			</tr>
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.image3_href">Link</label></td>
				<td><input name="lng_{$k}.image3_href" /></td>
			</tr>
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.image3_href">Image</label></td>
				<td><input name="lng_{$k}.image3_img" /></td>
			</tr>
			<tr class="lng_{$k}">
				<td><label for="lng_{$k}.image3_body">Body</label></td>
				<td><textarea name="lng_{$k}.image3_body" style='width:750px; height:250px;'></textarea></td>
			</tr>
EOD;
			}
			?>
		</table>
	</div>

</div>
