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
									<h3>ប្រអប់កុងទ័រ</h3>

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
var electricityBoxDS = new kendo.data.DataSource({
	transport: {
		read: {
			url: ARNY.baseUrl + "api/electricity_boxes/electricity_box",
			type: "GET",
			dataType: "json"
		},
		create: {
			url: ARNY.baseUrl + "api/electricity_boxes/electricity_box",
			type: "POST",
			dataType: "json"
		},
		update: {
			url: ARNY.baseUrl + "api/electricity_boxes/electricity_box",
			type: "PUT",
			dataType: "json"
		},
		destroy: {
			url: ARNY.baseUrl + "api/electricity_boxes/electricity_box",
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
                box_no 			: { type: "string", validation: { required: true } },
                status 			: { type: "number", defaultValue: 1 },
                latitute 		: { type: "number", defaultValue: 0 },
                longtitute 		: { type: "number", defaultValue: 0 },
                description 	: { type: "string" }                
            }
		}
	},
	requestEnd: function(e) {
	    var response = e.response;
	    var type = e.type;
	    if(type!='read'){
	    	electricityBoxDS.read();
	    }
	},
	pageSize: 20
});

//Grid tariff
$("#grid").kendoGrid({
    dataSource: electricityBoxDS,
    pageable: true,    
    toolbar: ["create"],
    columns: [        
        { field: "box_no", title:"ឈ្មោះ" },
        { field: "latitute", title:"Latitute" },
        { field: "longtitute", title:"Longtitute" },
        { field: "description", title:"ពណ៌នា" },        
        { command: ["edit", "destroy"], title: "&nbsp;", width: "210px" }],
    editable: "popup"    
});


}); //End document ready
</script>