<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
	<div class="container main-container col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<!-- Trigger the modal with a button -->
		<input id="my-modal-btn" type="image" src="./assets/img/coffee-mug.png" alt="Submit Me" data-toggle="modal" data-target="#myModal">

	</div>
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Revenue Group</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="group-title">Revenue Group Title</label>
						<input type="text" name="group_title" class="form-control" id="group-title" placeholder="ads - 20%">
					</div>
					<div class="form-group">
						If&nbsp;<select class="dropdown-short form-control display-inline" name="if">
								<option>ALL</option>
								<option>SOME</option>
							</select>&nbsp;of the blow conditions are met
					</div>
					<table id="mytable" class="table table-responsive">
						<tbody id="mytableContent">
							<tr class="tbl_row full-width">
								<td class="width-20">
									<select class="form-control display-inline width-full" data-rule='1' name="rule[1][sub]">
										<option>aff_sub</option>
										<option>ads_sub</option>
									</select>
								</td>
								<td class="width-20">
									<select class="form-control display-inline" data-rule='1' name="rule[1][grammer]">
										<option>is</option>
										<option>are</option>
									</select>
								</td>
								<td class="width-50">
									<div class="form-group table-group">
										<input type="text" data-rule='1' data-parameter='1' name="rule[1][parameter][1]" class="parameter form-control" id="parameter" placeholder="insert parameter">
										<a class="color-blue display-inline add_small_rule" data-rule='1'>add rule</a>
									</div>
								</td>
								<td class="width-10">
									<div class="form-group">
										<button class="roundbutton remove_big_rule">-</button>
										<button class="roundbutton add_big_rule">+</button>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				    <div class="form-group">
		                <label for="revenue-is" class="control-label">then revenue is</label>
						<input type="number" name="revenue_is" class=" width-20 form-control display-inline" id="revenue-is" placeholder="%" />
				    </div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-warning">Confirm</button>
					<button class="btn btn-default"  data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="./assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#my-modal-btn').click();

			$('#mytableContent').on('click', '.add_small_rule', function() {
				var $rule_num = parseInt($(this).parents().closest('tr.tbl_row').find("td:eq(2) input.parameter").attr('data-rule'));
				var $parameter_num = parseInt($(this).parents().closest('tr.tbl_row').find("td:eq(2) input.parameter").attr('data-parameter'));
				var $parameter_new = $parameter_num +1;

		        $(this).parents().closest('tr.tbl_row').find("td:eq(2) input.parameter").attr({"data-rule": $rule_num, "data-parameter": $parameter_new , "name": 'rule['+$rule_num+'][parameter]['+$parameter_new+']'})
		        $(this).parents().closest('tr.tbl_row').before($(this).parents().closest('tr.tbl_row').clone());
		        $(this).parents().closest('tr.tbl_row').find("td").addClass('border-none').not('td:eq(2)').html('');

				$(this).text('remove rule');
				$(this).parents().closest('tr.tbl_row').find("td:eq(2) input.parameter").attr({"data-rule": $rule_num, "data-parameter" :$parameter_num, "name": 'rule['+$rule_num+'][parameter]['+$parameter_num+']'})
				$(this).removeClass('color-blue add_small_rule').addClass('color-red remove_small_rule');
			})	

			$('#mytableContent').on('click', '.remove_small_rule', function() {
				 $(this).parents().closest('tr.tbl_row').remove();
			})

			$('#mytableContent').on('click', 'button.add_big_rule', function() {
		        $(this).parents().closest('tr.tbl_row').find('td:not(:last-child)').each(function(){
		        	$rule_num = parseInt($(this).find('.form-control').attr('data-rule'));
		        	if (typeof $rule_num !== 'undefined') {
		        		$rule_new = $rule_num+1;
		        		$(this).find('.form-control').attr({'data-rule' : $rule_new, "name": 'rule['+$rule_new+'][parameter][1]'});
		        	}
		        })
		        $(this).parents().closest('tr.tbl_row').clone().appendTo("#mytableContent");

		        $(this).parents().closest('tr.tbl_row').find('td:not(:last-child)').each(function(){
		        	$rule_num = parseInt($(this).find('.form-control').attr('data-rule'));
		        	if (typeof $rule_num !== 'undefined') {
		        		$rule_ori = $rule_num-1;
		        		$(this).find('.form-control').attr({'data-rule' : $rule_ori, "name": 'rule['+$rule_ori+'][parameter][1]'});
		        	}
		        })
		        $(this).remove();
			})

			$('#mytableContent').on('click','button.remove_big_rule', function() {
				$rule_num = $(this).parents().closest('tr.tbl_row').find("td:eq(2) input.parameter").attr('data-rule');
				$('.form-control[name^="rule['+$rule_num+'][parameter]"]').parents().closest('tr.tbl_row').remove();
				$(this).parents().closest('tr.tbl_row').remove();
				$(this).parents().closest()
			})
		})
	</script>
</body>
</html>