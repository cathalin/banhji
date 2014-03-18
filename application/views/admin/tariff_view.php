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
									<h3>កំណត់តំលៃលក់</h3>

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

//Tariff datasource
var tariffDS = new kendo.data.DataSource({
	transport: {
		read: {
			url: ARNY.baseUrl + "api/tariffs/tariff",
			type: "GET",
			dataType: "json"
		},
		create: {
			url: ARNY.baseUrl + "api/tariffs/tariff",
			type: "POST",
			dataType: "json"
		},
		update: {
			url: ARNY.baseUrl + "api/tariffs/tariff",
			type: "PUT",
			dataType: "json"
		},
		destroy: {
			url: ARNY.baseUrl + "api/tariffs/tariff",
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
	requestEnd: function(e) {
	    var response = e.response;
	    var type = e.type;
	    if(type!='read'){
	    	tariffDS.read();
	    }
	},		
	schema: {
		model: {
			id: "id",
            fields: {
                id: { editable: false, nullable: true },                
                name: { type: "string", validation: { required: true } },
                currency_id: { type: "number", defaultValue: 1 },                
                currencies: { defaultValue: { currency_id: 1, code: "KHR"} }
            }
		}
	}
});

//Grid tariff
$("#grid").kendoGrid({
    dataSource: tariffDS,    
    toolbar: ["create", "save", "cancel"],
    columns: [
        { field: "name", title: "ឈ្មោះតំលៃលក់" },
        { field: "currencies", title:"រូបិយប័ណ្ណ", editor: currencyDDLEditor, template: "#:currencies.code#" },        
        { command: ["destroy"], title: "&nbsp;", width: "200px" }],
    editable: true,
    detailInit: detailInit,
    save: function(data) {
		//Define currency_id
		if(data.values.currencies){							
			data.model.set("currency_id", data.values.currencies.id);							
		}			
	}
});

//Currency ddl editor
function currencyDDLEditor(container, options) {
    $('<input required data-text-field="code" data-value-field="id" data-bind="value:' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({
            autoBind: false,
            dataSource: {                
                transport: {
                    read: ARNY.baseUrl + "api/currencies/index"
                }
            }
        });
}

//Detail tariff item
function detailInit(e) {
    $("<div/>").appendTo(e.detailCell).kendoGrid({
        dataSource: {
            transport: {
				read: {
					url: ARNY.baseUrl + "api/tariff_items/tariff_item",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: ARNY.baseUrl + "api/tariff_items/tariff_item",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: ARNY.baseUrl + "api/tariff_items/tariff_item",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: ARNY.baseUrl + "api/tariff_items/tariff_item",
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
                        tariff_id: { editable: false, defaultValue: e.data.id },                                               
                        usage: { type: "number", validation: { required: true} },
                        price: { type: "number", validation: { required: true} },
                        is_flat: { type: "boolrean", defaultValue: 0 },
                        amount: { type: "number" }                        
                    }
				}
			},					            
            serverSorting: true,
            serverFiltering: true,
            sort: { field: "usage", dir: "asc" },
            filter: { field: "tariff_id", value: e.data.id }
        },
        toolbar: ["create","save", "cancel"],        
        columns: [            
            { field: "usage", title:"ចំនួនប្រើប្រាស់ចាប់ពី" },
            { field: "price", title:"តំលៃ", format: "{0:c}" },
            { field: "is_flat", title:"ថេរ", editor: isflatDDLEditor, template:'<input type="checkbox" #:is_flat==1?checked="checked": ""# disabled="disabled" />' },
            { field: "amount", title:"ទឺកប្រាក់", format: "{0:c}" },            
        	{ command: "destroy", title: " ", width: "100px" }
        ],
        editable: true
    });
}

//Status datasource
var isFlats = [
    { text: "ថេរ", value: "1" },
    { text: "អត់ថេរ", value: "0" }    
];

//Is flat ddl editor
function isflatDDLEditor(container, options) {
    $('<input required data-text-field="text" data-value-field="value" data-bind="value:' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({
            autoBind: false,
            dataSource: isFlats
        });
}


}); //End document ready
</script>