<div class="row-fluid">    
	<div class="span12">
		<div id="example" class="k-content">
			
			<div class="relativeWrap" data-toggle="source-code" style="overflow: visible;">
				<div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row-fluid row-merge widget-tabs-gray">
				
					<!-- Tabs Heading -->
					<div class="widget-head span2">
						<?php $this->load->view('admin/customerElectricityBar'); ?>
					</div>
					<!-- // Tabs Heading END -->
					
					<div class="widget-body span10">
						<div class="tab-content">						
							<!-- Tab content -->
							<div class="tab-pane active" id="tab1-1">								
								<div id="divCustomerType">
									<h3>Class</h3>

									<div id="grid"></div>
								</div>						
							</div>
							<!-- // Tab content END -->							
						</div>						
					</div>

				</div>
			</div>			

		</div> <!--end div example-->            
	</div> <!--End div span12-->		
</div> <!--End div row-fluid-->


<script>
$(document).ready(function() {

//Datasource
var classDS = new kendo.data.DataSource({
	transport: {
		read: {
			url: ARNY.baseUrl + "api/classes/class",
			type: "GET",
			dataType: "json"
		},
		create: {
			url: ARNY.baseUrl + "api/classes/class",
			type: "POST",
			dataType: "json"
		},
		update: {
			url: ARNY.baseUrl + "api/classes/class",
			type: "PUT",
			dataType: "json"
		},
		destroy: {
			url: ARNY.baseUrl + "api/classes/class",
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
                id 				: { editable: false, nullable: true },                
                name 			: { type: "string", validation: { required: true } },
                type 			: { type: "string", validation: { required: true } },
                description 	: { type: "string" }                                
            }
		}
	},
	requestEnd: function(e) {
	    var response = e.response;
	    var type = e.type;
	    if(type!='read'){
	    	classDS.read();
	    }
	}
});

//Grid
$("#grid").kendoGrid({
    dataSource: classDS,    
    toolbar: ["create"],
    columns: [
        { field: "name", title: "ឈ្មោះ" },
        { field: "type", title: "ប្រភេទ", editor: categoryDropDownEditor },
        { field: "description", title: "ពណ៌នា" },              
        { command: ["edit", "destroy"], title: "&nbsp;", width: "210px" }],
    editable: "popup"    
});

function categoryDropDownEditor(container, options) {
    $('<input required data-text-field="value" data-value-field="id" data-bind="value:' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({
            autoBind: false,
            dataSource: typeList
        });
}

var typeList = new Array(
    { id: "Class", value: "Class" },
    { id: "Budget", value: "Budget" },
    { id: "Donor", value: "Donor" },
    { id: "Location", value: "Location" }
);

}); //End document ready
</script>