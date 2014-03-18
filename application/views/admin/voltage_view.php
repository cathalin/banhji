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
									<h3>តុងស្យុង</h3>

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
var voltageDS = new kendo.data.DataSource({
	transport: {
		read: {
			url : ARNY.baseUrl + "api/voltages/voltage",
			type: "GET",
			dataType: "json"
		},
		create: {
			url : ARNY.baseUrl + "api/voltages/voltage",
			type: "POST",
			dataType: "json"
		},
		update: {
			url : ARNY.baseUrl + "api/voltages/voltage",
			type: "PUT",
			dataType: "json"
		},
		destroy: {
			url : ARNY.baseUrl + "api/voltages/voltage",
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
	    	voltageDS.read();
	    }
	},	
	schema: {
		model: {
			id: "id",
            fields: {
                id      	: { editable: false, nullable: true },                
                voltage 	: { type: "string", validation: { required: true } },
                description : { type: "string" }                               
            }
		}
	}
});

//Grid
$("#grid").kendoGrid({		
	dataSource: voltageDS,		
	toolbar: ["create"],	
	columns: [			
		{ field: "voltage", title: "តុងស្យុង" },
		{ field: "description", title: "ពណ៌នា" },			
		{ command: ["edit", "destroy"], title: "&nbsp;", width: "210px" }],
	editable: "popup"
});
	
});
</script>