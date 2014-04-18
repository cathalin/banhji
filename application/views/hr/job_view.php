<div class="container">
	<div class="row">
		<div class="span12">
			<?php $this->load->view('hr/toolbar'); ?>
			<div id="grid"></div>
		</div>
	</div>
</div>
<script>
var baseUrl = "<?php echo base_url(); ?>";
var departments	= new kendo.data.DataSource({
	transport	: {
		read	: {
			url	: baseUrl + "api/positions",
			type: "GET",
			dataType: "json"
		},
		create	: {
			url	: baseUrl + "api/positions",
			type: "POST",
			dataType: "json"
		},
		update	: {
			url	: baseUrl + "api/positions",
			type: "PUT",
			dataType: "json"
		},
		destroy : {
			url	: baseUrl + "api/positions",
			type: "DELETE",
			dataType: "json"
		},
		parameterMap : function(options, operation) {
			if( operation !== "read" && options.models ) {
				return { models: kendo.stringigy(options.models) };
			}
			return options;
		}
	},
	schema: {
		model: {
			id: "id",
			fields: {
				id: { editable: false, nullable: false },
				title: { editable: true, type: "string", validation: { required: true } },
				descripiton: { editable: true, type: "string" },
				created_at : { editable: false, type: "date" },
				updated_at : { editable: false, type: "date" }
			}
		}
	},
	pageSize: 10
});
$(function() {
	var jobGrid = $("#grid").kendoGrid({
		dataSource 	: departments,
		toolbar 	: ["create", "save", "cancel"],
		columns 	: [
			{ title: "ល.រ", field: "id", width: "100px" },
			{ title: "ឈ្មោះ", field: "title" },
			{ title: "Description", field: "description" },
			{ title: "created on", field: "created_at", width: "100px", template:"#=kendo.toString(created_at, 'dd-MM-yyyy')#" },
			{ title: "Updated On", field: "updated_at", width: "100px", template:"#=kendo.toString(updated_at, 'dd-MM-yyyy')#" },
			{ title: "&nbsp;", command: [{name:"destroy", text: "លុប"}] , width: "100px" }
		],
		editable: true,
		pageable: true 
	}).data("kendoGrid");
});
</script>