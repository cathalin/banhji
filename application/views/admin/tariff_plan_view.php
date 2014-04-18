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
									<h3>កំណត់ផែនការតំលៃ</h3>

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

//Tariff plan datasource
var tariffPlanDS = new kendo.data.DataSource({
	transport: {
		read: {
			url: ARNY.baseUrl + "api/tariff_plans/tariff_plan",
			type: "GET",
			dataType: "json"
		},
		create: {
			url: ARNY.baseUrl + "api/tariff_plans/tariff_plan",
			type: "POST",
			dataType: "json"
		},
		update: {
			url: ARNY.baseUrl + "api/tariff_plans/tariff_plan",
			type: "PUT",
			dataType: "json"
		},
		destroy: {
			url: ARNY.baseUrl + "api/tariff_plans/tariff_plan",
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
	    	tariffPlanDS.read();
	    }
	},		
	schema: {
		model: {
			id: "id",
            fields: {
                name: { type: "string", validation: { required: true } },
                status: { type: "number", validation: { required: true } }                
            }
		}
	}
});

//Grid tariff plan
$("#grid").kendoGrid({
    dataSource: tariffPlanDS,    
    toolbar: ["create"],
    columns: [
        { field:"name", title: "ឈ្មោះផែនការ" },
        { field: "status", title:"ស្ថានភាព", editor: statusDDLEditor, template: "#=status==1?'ប្រើប្រាស់':'ឈប់ប្រើ'#" },        
        { command: ["edit", "destroy"], title: "&nbsp;", width: "200px" }],
    editable: "popup",
    detailInit: detailInit    
});

//Status datasource
var statuses = [
    { text: "ប្រើប្រាស់", value: "1" },
    { text: "ឈប់ប្រើ", value: "0" }    
];

//Status ddl editor
function statusDDLEditor(container, options) {
    $('<input required data-text-field="text" data-value-field="value" data-bind="value:' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({
            autoBind: false,
            dataSource: statuses
        });
}

//Detail
function detailInit(e) {
    $("<div/>").appendTo(e.detailCell).kendoGrid({
        dataSource: {
            transport: {
				read: {
					url: ARNY.baseUrl + "api/plan_items/plan_item",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: ARNY.baseUrl + "api/plan_items/plan_item",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: ARNY.baseUrl + "api/plan_items/plan_item",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: ARNY.baseUrl + "api/plan_items/plan_item",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {					
					if (operation === "create") {			            
			            var d = new Date(options.start_date);			            
			            options.start_date = kendo.toString(new Date(options.start_date), "yyyy-MM-dd");
			            options.tariff_plan_id = e.data.id;
			        }else if (operation === "update") {			            
			            var d = new Date(options.start_date);			            
			            options.start_date = kendo.toString(new Date(options.start_date), "yyyy-MM-dd");
			        }else if (operation === "delete" && options.models) {			            
			            return {models: kendo.stringify(options.models)};
			        }		        
			        return options;
				}
			},
			change: function(e){			    
			    this.refresh;			    
			},								
			schema: {
				model: {
					id: "id",
                    fields: {
                        tariff_plan_id: { editable: false, defaultValue: e.data.id },
                        tariff_id: { type: "number", validation: { required: true } },                        
                        start_date: { type: "date", validation: { required: true } },
                        tariffs: { defaultValue: { tariff_id: 1 } }
                    }
				}
			},					            
            serverSorting: true,
            serverFiltering: true,
            sort: { field: "start_date", dir: "asc" },
            filter: { field: "tariff_plan_id", value: e.data.id }
        },
        toolbar: ["create","save", "cancel"],        
        columns: [            
            { field: "tariffs", title:"ឈ្មោះតំលៃលក់", editor: tariffDDLEditor, template: "#=tariffs.name#" },
            { field: "start_date", title:"ថ្ងៃប្រើប្រាស់", format: "{0:dd/MM/yyyy}" },            
        	{ command: "destroy", title: " ", width: "100px" }
        ],
        editable: true,
        save: function(data) {
			//Define tariff_id
			if(data.values.tariffs){							
				data.model.set("tariff_id", data.values.tariffs.id);							
			}			
		}
    });
}

//Tariff ddl editor
function tariffDDLEditor(container, options) {
    $('<input required data-text-field="name" data-value-field="id" data-bind="value:' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({
            autoBind: false,
            dataSource: {                
                transport: {
                    read: ARNY.baseUrl + "api/tariffs/tariff"
                }
            }
        });
}



}); //End document ready
</script>