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
									<h3>កំណត់ការលើកលែង</h3>

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
var exemptionDS = new kendo.data.DataSource({
	transport: {
		read: {
			url: ARNY.baseUrl + "api/exemptions/exemption",
			type: "GET",
			dataType: "json"
		},
		create: {
			url: ARNY.baseUrl + "api/exemptions/exemption",
			type: "POST",
			dataType: "json"
		},
		update: {
			url: ARNY.baseUrl + "api/exemptions/exemption",
			type: "PUT",
			dataType: "json"
		},
		destroy: {
			url: ARNY.baseUrl + "api/exemptions/exemption",
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
                id: { editable: false, nullable: true },                
                name: { type: "string", validation: { required: true } },
                amount: { type: "number", validation: { required: true }, defaultValue: 1 },
                exemption_type: { type: "string", validation: { required: true }, defaultValue: "kWh" }                
            }
		}
	},
	requestEnd: function(e) {
	    var response = e.response;
	    var type = e.type;
	    if(type!='read'){
	    	exemptionDS.read();
	    }
	}
});

//Type list 'kWh','%','៛'
var typeList = [
    { text: "kWh", value: "kWh" },
    { text: "%", value: "%" },
    { text: "៛", value: "៛" }    
];

//Grid tariff
$("#grid").kendoGrid({
    dataSource: exemptionDS,    
    toolbar: ["create"],
    columns: [
        { field: "name", title: "ឈ្មោះ" },
        { field: "amount", title:"តំលៃ" },
        { field: "exemption_type", title:"ប្រភេទ", editor: typeDDLEditor },        
        { command: ["edit", "destroy"], title: "&nbsp;", width: "210px" }],
    editable: "popup"    
});

function typeDDLEditor(container, options) {
    $('<input required data-text-field="text" data-value-field="value" data-bind="value:' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({
            autoBind: false,
            dataSource: typeList
        });
}


}); //End document ready
</script>