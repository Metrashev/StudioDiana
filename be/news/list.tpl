<?php /* @var $this \ITTI\FP\ListForm */ ?>

<table id="list" class="BEListTable">
<thead>
<tr>
<th itti:model='_select'></th>
<th itti:model='_edit'></th>
<th itti:model='id'></th>
<?php if(empty($_GET['cid'])) {?><th itti:model='cid'></th><?php } ?>
<th itti:rep="lng" itti:model='lng_{$k}.title' class="lng_{$k}" itti:td-class="lng_{$k}"></th>
<th itti:model='leading_image' itti:td-style="text-align:center;"></th>
<th itti:model='from_date' itti:format="d.m.Y"></th>
<th itti:model='to_date' itti:format="d.m.Y"></th>

</tr>

</thead>
</table>
