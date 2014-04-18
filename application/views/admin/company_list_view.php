<div class="row-fluid">    
	<div class="span12">
		<div id="example" class="k-content">			

			<div class="relativeWrap" data-toggle="source-code" style="overflow: visible;">
				<div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row-fluid row-merge widget-tabs-gray">
				
					<!-- Tabs Heading -->
					<div class="widget-head span2">
						<?php $this->load->view('admin/adminbar'); ?>
					</div>
					<!-- // Tabs Heading END -->
					
					<div class="widget-body span10">
						<div class="tab-content">						
							<!-- Tab content -->
							<div class="tab-pane active" id="tab1-1">
								
								<button type="button" class="glyphicons circle_plus btn btn-primary btn-icon btn-small" 
										data-bind="click: btnAddNew"><i></i> បញ្ចូលថ្មី</button>
								
								<div id="grid" data-role="grid" data-bind="source: companyList"
					                data-row-template="RowTemplate"                  
					                data-columns='[{ "title": "ឈ្មោះ" }, 
					                    { "title": "លេខអាជ្ញាប័ណ្ណ" },                    
					                    { "title": "អ្នកតំណាង" },
					                    { "title": "ក្រុមហ៊ុនមេ" },
					                    { "title": "", width: 30 },
					                    { "title": "", width: 30 }
					                ]'>
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

<script id="RowTemplate" type="text/x-kendo-tmpl">
	<tr>
		<td>#: name #</td>
		<td>#: operation_license #</td>
		<td>#: representative #</td>
		<td>
			#if(parents.name!=null){#
				#: parents.name #
			#}#
		</td>		
		<td align="center"><i class="icon-edit" data-bind="click: editClick"></i></td>
		<td align="center"><i class="icon-remove" data-bind="click: deleteClick"></i></td>
    </tr>
</script>

<!-- Document ready -->
<script>
var MYAPP = MYAPP || {};
MYAPP.setting = {
	user_role: "<?php echo $this->session->userdata('role_id'); ?>",
	username : "<?php echo $this->session->userdata('username'); ?>"
};

$(document).ready(function() {
	if(MYAPP.setting.user_role !== "1") {
	 	window.location.href = ARNY.baseUrl + "customer";
	}
	//Datasources
	var companyDS = new kendo.data.DataSource({
		transport: {
			read: {
				url: ARNY.baseUrl + "api/companies/company",
				type: "GET",
				dataType: "json"
			},
			destroy: {
				url : ARNY.baseUrl + "api/companies/company",
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
		schema: {
			model: {
				id: "id"
			}
		},
		filter: { field: "id >", value: 0 },
		serverFiltering: true
	});
	
	//View model
	var viewModel = kendo.observable({
		companyList 	: companyDS,
		btnAddNew		: function(){
			window.location.href = ARNY.baseUrl + "admin/manage_company/0";
		},
		editClick 		: function(e){
			var d = e.data;			
			window.location.href = ARNY.baseUrl + "admin/manage_company/"+ d.id;
		},
		deleteClick 	: function(e){
			if (confirm("តើលោកអ្នកពិតជាចង់លុបទិន្នន័យនេះមែនឬទេ?")) {
				var d = e.data;
				var dataItem = companyDS.get(d.id);
				
				companyDS.remove(dataItem);
				companyDS.sync();
			}
		}
  			
	});  
	kendo.bind($("#example"), viewModel);	
		
});//End document ready
</script>