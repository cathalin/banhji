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
									<h3>ប្រភេទអតិថិជន</h3>

									<div id="grid" class="span6"></div>
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
		
//Customer Type datasource
var customerTypeDS = new kendo.data.DataSource({
	transport: {
		read: {
			url : ARNY.baseUrl + "api/people_api/people_type",
			type: "GET",
			dataType: "json"
		},
		create: {
			url : ARNY.baseUrl + "api/people_api/people_type",
			type: "POST",
			dataType: "json"
		},
		update: {
			url : ARNY.baseUrl + "api/people_api/people_type",
			type: "PUT",
			dataType: "json"
		},
		destroy: {
			url : ARNY.baseUrl + "api/people_api/people_type",
			type: "DELETE",
			dataType: "json"
		},
		parameterMap: function(options, operation) {
            if (operation !== "read" && options.models) {
                return {models: kendo.stringify(options.models)};
            }				
			return options;
        }
	},
	requestEnd: function(e) {
	    var response = e.response;
	    var type = e.type;
	    if(type!='read'){
	    	customerTypeDS.read();
	    }
	},	
	schema: {
		model: {
			id: "id",
            fields: {
                id: { editable: false, nullable: true },                
                name: { type: "string", validation: { required: true } },
                parent_id: { type: "number", defaultValue: 1 }                
            }
		}
	},
	filter: { field: "parent_id", value: 1 }	
});

//Customer type grid
$("#grid").kendoGrid({		
	dataSource: customerTypeDS,		
	toolbar: ["create"],	
	columns: [			
		{ field: "name", title: "ប្រភេទអតិថិជន" },			
		{ command: ["edit", "destroy"], title: "&nbsp;", width: "210px" }],
	editable: "popup"
});
	
});
</script>