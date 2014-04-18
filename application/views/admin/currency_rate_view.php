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
									<h3>អត្រាប្រាក់</h3>

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
var currencyRateDS = new kendo.data.DataSource({
	transport: {
		read: {
			url: ARNY.baseUrl + "api/currency_rates/currency_rate",
			type: "GET",
			dataType: "json"
		},
		create: {
			url: ARNY.baseUrl + "api/currency_rates/currency_rate",
			type: "POST",
			dataType: "json"
		},
		update: {
			url: ARNY.baseUrl + "api/currency_rates/currency_rate",
			type: "PUT",
			dataType: "json"
		},
		destroy: {
			url: ARNY.baseUrl + "api/currency_rates/currency_rate",
			type: "DELETE",
			dataType: "json"
		},
		parameterMap : function(options, operation) {					
			if( operation === "create" || operation === "update") {			            
	            var d = new Date(options.date);	            			            
	            options.date = kendo.toString(new Date(options.date), "yyyy-MM-dd");	                    
	        }else if (operation === "delete" && options.models) {			            
	            return {models: kendo.stringify(options.models)};
	        }		        
	        return options;
		}
	},		
	schema: {
		model: {
			id: "id",
            fields: {
                id 		: { editable: false, nullable: true },                
                code 	: { type: "string", validation: { required: true } },
                rate 	: { type: "string", validation: { required: true } },                
                date 	: { type: "date", validation: { required: true } },
                status 	: { type: "number", validation: { required: true } }                                
            }
		}
	},
	requestEnd: function(e) {
	    var response = e.response;
	    var type = e.type;
	    if(type!='read'){
	    	currencyRateDS.read();
	    }
	},
	sort: { field: "date", dir: "desc" }
});

var currencyDS = new kendo.data.DataSource({
	transport: {
		read: {
			url: ARNY.baseUrl + "api/currencies/index",
			type: "GET",
			dataType: "json"
		}
	}		
});

//Status datasource
var statuses = [
    { text: "ប្រើប្រាស់", value: "1" },
    { text: "ឈប់ប្រើ", value: "0" }    
];

//Grid
$("#grid").kendoGrid({
    dataSource: currencyRateDS,
    groupable: true,
    sortable: true,    
    toolbar: ["create"],
    columns: [
        { field: "code", title: "កូដ", editor: codeDDLEditor },
        { field: "rate", title: "អត្រាប្រាក់" },
        { field: "based", title: "មូលដ្ឋានកូដ", editor: codeDDLEditor },
        { field: "date", title: "កាលបរិច្ឆេទ", format: "{0:dd-MM-yyyy}" },
        { field: "status", title: "ស្ថានភាព", editor: statusDDLEditor, template: "#=status==1?'ប្រើប្រាស់':'ឈប់ប្រើ'#" },              
        { command: ["edit", "destroy"], title: "&nbsp;", width: "210px" }],
    editable: "popup"    
});

//Code DDL editor
function codeDDLEditor(container, options) {
    $('<input required data-text-field="code" data-value-field="code" data-bind="value:' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({
            autoBind: false,
            dataSource: currencyDS
        });
}

//Status DDL editor
function statusDDLEditor(container, options) {
    $('<input required data-text-field="text" data-value-field="value" data-bind="value:' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({
            autoBind: false,
            dataSource: statuses
        });
}

}); //End document ready
</script>