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
								<table>				
									<tr>
										<td>ឈ្មោះ</td>
										<td>
											<input id="name" name="name" class="k-textbox" data-bind="value: name" required data-required-msg="ត្រូវការ ឈ្មោះ" />
										</td>
										<td valign="top" align="center" rowspan="12">											
											<img data-bind="attr: { src: imageUrl }" alt="" height="200", width="200" >
											<br>
											<input name="userfile" id="userfile" type="file" />
										</td>
									</tr>
									<tr>
										<td>ឈ្មោះជាទំរង់ខ្លី</td>
										<td>
											<input id="abbr" name="abbr" class="k-textbox" data-bind="value: abbr" required data-required-msg="ត្រូវការ ឈ្មោះជាទំរង់ខ្លី" />						
										</td>
										<td></td>
									</tr>
									<tr>
										<td>ឆ្នាំបង្កើត</td>
										<td>
											<input id="year_founded" name="year_founded" data-role="numerictextbox" data-format="#" data-bind="value: year_founded" required data-required-msg="ត្រូវការ ឆ្នាំបង្កើត" />						
										</td>
										<td></td>
									</tr>
									<tr>
										<td>លេខអាជ្ញាប័ណ្ណ</td>
										<td>
											<input id="operation_license" name="operation_license" class="k-textbox" data-bind="value: operation_license" required data-required-msg="ត្រូវការ លេខអាជ្ញាប័ណ្ណ" />	
										</td>
										<td></td>
									</tr>
									<tr>
										<td>លេខទូរស័ព្ទដៃ</td>
										<td>
											<input id="mobile" name="mobile" class="k-textbox" data-bind="value: mobile" required data-required-msg="ត្រូវការ លេខទូរស័ព្ទដៃ" />
										</td>
										<td></td>
									</tr>
									<tr>
										<td>Tel</td>
										<td>
											<input id="phone" name="phone" class="k-textbox" data-bind="value: phone" required data-required-msg="ត្រូវការ Tel" />
										</td>
										<td></td>
									</tr>
									<tr>
										<td>អីុមែល</td>
										<td>
											<input id="email" name="email" class="k-textbox" data-bind="value: email" required data-required-msg="ត្រូវការ អីុមែល" />
										</td>
										<td></td>
									</tr>
									<tr>
										<td valign="top">អាសយដ្ឋាន</td>
										<td>
											<input id="address" name="address" class="k-textbox" data-bind="value: address" 
													required data-required-msg="ត្រូវការ អាសយដ្ឋាន"></input>
										</td>
										<td></td>
									</tr>
									<tr>
										<td>អ្នកតំណាង</td>
										<td>
											<input id="representative" name="representative" class="k-textbox" data-bind="value: representative" required data-required-msg="ត្រូវការ អ្នកតំណាង" />
										</td>
									</tr>
									<tr>
										<td>ឆ្នាំសារពើពន្ធ</td>
										<td>
											<input id="fiscalYear" name="fiscalYear" data-role="datepicker" data-format="dd-MM-yyyy" 
													data-bind="value: fiscal_year" required data-required-msg="ត្រូវការ ឆ្នាំសារពើពន្ធ" />
										</td>
										<td></td>
									</tr>
									<tr>
										<td>VAT NO.</td>
										<td>
											<input id="vatNo" name="vatNo" class="k-textbox" data-bind="value: vat_no" />
										</td>
										<td></td>
									</tr>
									<tr>
										<td>រូបិយបណ្ណ</td>
										<td>
											<select id="basedCurrency" name="basedCurrency" data-role="dropdownlist" data-text-field="code" data-value-field="code" 
													data-bind="value: based_currency, source: currencyList" data-option-label="(--- ជ្រើសរើស ---)"
													required data-required-msg="ត្រូវការ រូបិយបណ្ណ"></select>											
									    </td>
									    <td></td>
									</tr>
									<tr>
										<td>ប្រើប្រាស់ម៉ាសីុនភ្លើង</td>
										<td>
											<select id="use_generator" name="use_generator" data-role="dropdownlist" data-text-field="name" data-value-field="id" 
									                			data-bind="source: useGenerators, value: use_generator"</select>
										</td>
										<td></td>
									</tr>
									<tr>
										<td>ក្រុមហ៊ុនមេ</td>
										<td>
											<select id="parents" name="parents" data-role="dropdownlist" data-text-field="name" data-value-field="id" 
						                			data-bind="source: parentList, value: parent_id" data-option-label="(--- ជ្រើសរើស ---)"></select>
									    </td>
									    <td></td>
									</tr>
									<tr>
										<td valign="top">បទបញ្ជាប្រើប្រាស់ចរន្តអគ្គសនី</td>										
										<td colspan="2">
											<textarea id="termOfCondition" name="termOfCondition" data-role="editor" data-bind="value: term_of_condition"></textarea>
										</td>										
									</tr>												
								</table>

								<div class="status"></div>
								
								<button type="button" class="glyphicons hdd btn btn-primary btn-icon btn-small" 
										data-bind="click: btnSave"><i></i> កត់ត្រា</button>						
							</div>
							<!-- // Tab content END -->							
						</div>						
					</div>

				</div>
			</div>			

		</div> <!--end div example-->            
	</div> <!--End div span12-->		
</div> <!--End div row-fluid-->


<!-- Document ready -->
<script>
var MYAPP = MYAPP || {};
MYAPP.setting = {
	user_role: "<?php echo $this->session->userdata('role_id'); ?>",
	username : "<?php echo $this->session->userdata('username'); ?>"
};

MYAPP.id = "<?php echo $this->uri->segment(3); ?>";

$(document).ready(function() {
	if(MYAPP.setting.user_role !== "1") {
	 	window.location.href = ARNY.baseUrl + "dashboard";
	}
	//Datasources
	var companyDS = new kendo.data.DataSource({
		transport: {
			read: {
				url: ARNY.baseUrl + "api/companies/company",
				type: "GET",
				dataType: "json"
			},
			create: {
				url: ARNY.baseUrl + "api/companies/company",
				type: "POST",
				dataType: "json"
			},		
			update: {
				url: ARNY.baseUrl + "api/companies/company",
				type: "PUT",
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
				id: "id"            
			}
		},		
		filter: { field: "id", value: MYAPP.id },
		serverFiltering: true
	});

	var parentDS = new kendo.data.DataSource({
		transport: {
			read: {
				url: ARNY.baseUrl + "api/companies/company",
				type: "GET",
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
				id: "id"            
			}
		},		
		filter: { field: "parent_id", value: 0 },
		serverFiltering: true
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

	//View model
	var viewModel = kendo.observable({
		id 				: MYAPP.id,		
		// name 			: "",
		parent_id 		: 0,
		// year_founded    : "",
		// image_url 		: "",
		// operation_license : "",
		// mobile 			: "",
		// phone 			: "",
		// email			: "",
		// address 		: "",
		// representative  : "",
		// fiscal_year 	: "",
		based_currency  : null,
		//use_generator 	: "គ្មាន",		
		
		useGenerators  	: [{id:0,name:"គ្មាន"},{id:1,name:"មាន"}],
		currencyList 	: currencyDS,
		parentList 		: parentDS,
		
		btnSave			: function(e){
			e.preventDefault();
	        if(validator.validate()){
	        	var id = kendo.parseInt(this.get("id"));	        	
	        	if(id>0){
	        		this.updateCompany();
	        	}else{
	        		this.addCompany();
	        	}
	        	
	            status.text("កត់ត្រាបានសំរេច")
	                .removeClass("alert alert-error")
	                .addClass("alert alert-success");
	        }else{
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
	                .addClass("alert alert-error");
	        }
		},
		addCompany 	: function(){
			var fiscalYear = kendo.toString(this.get("fiscal_year"),"yyyy-MM-dd");
			// var parents = this.get("parent_id");
			// var parentId = 0;
			// if(parents!=null){
			// 	parentId = parents.id;
			// }

			companyDS.add({				
				name 			: this.get("name"),
				abbr 			: this.get("abbr"),				
				year_founded	: this.get("year_founded"),
				image_url		: this.get("image_url"),
				operation_license: this.get("operation_license"),
				mobile			: this.get("mobile"),
				phone			: this.get("phone"),
				email			: this.get("email"),
				address			: this.get("address"),
				term_of_condition : this.get("term_of_condition"),
				representative	: this.get("representative"),				
				fiscal_year		: fiscalYear,
				vat_no 			: this.get("vat_no"),
				based_currency	: this.get("based_currency").code,
				use_generator	: this.get("use_generator"),
				parent_id		: this.get("parent_id")
			});		

			companyDS.sync();
		},
		updateCompany 	: function(){
			var id = this.get("id");
			var com = companyDS.get(id);

			var fiscalYear = kendo.toString(this.get("fiscal_year"),"yyyy-MM-dd");

			com.set("name",this.get("name"));
			com.set("abbr",this.get("abbr"));			
			com.set("year_founded",this.get("year_founded"));
			com.set("image_url",this.get("image_url"));
			com.set("operation_license",this.get("operation_license"));
			com.set("mobile",this.get("mobile"));
			com.set("phone",this.get("phone"));
			com.set("email",this.get("email"));
			com.set("address",this.get("address"));
			com.set("term_of_condition",this.get("term_of_condition"));
			com.set("representative",this.get("representative"));
			com.set("fiscal_year",fiscalYear);
			com.set("vat_no", this.get("vat_no"));
			com.set("based_currency",this.get("based_currency").code);
			com.set("use_generator",this.get("use_generator"));
			com.set("parent_id",this.get("parent_id"));

			companyDS.sync();
		}  			
	});  
	kendo.bind($("#example"), viewModel);
	
	var validator = $("#example").kendoValidator().data("kendoValidator"),
                    status = $(".status");

    if(MYAPP.id>0){
		companyDS.fetch(function(){
			var d = this.data()[0];
			var imgUrl = ARNY.baseUrl + d.image_url;

			// var currencyId = d.based_currency;
			// var currency = currencyDS.get(currencyId);
			
	    	viewModel.set("name",d.name);
	    	viewModel.set("abbr",d.abbr);	    	
			viewModel.set("year_founded",d.year_founded);
			viewModel.set("imageUrl",imgUrl);
			viewModel.set("image_url",d.image_url);
			viewModel.set("operation_license",d.operation_license);
			viewModel.set("mobile",d.mobile);
			viewModel.set("phone",d.phone);
			viewModel.set("email",d.email);
			viewModel.set("address",d.address);
			viewModel.set("term_of_condition",d.term_of_condition);
			viewModel.set("representative",d.representative);
			viewModel.set("fiscal_year",new Date(d.fiscal_year));
			viewModel.set("vat_no", d.vat_no);
			viewModel.set("based_currency", d.based_currency);
			viewModel.set("use_generator",d.use_generator);
			viewModel.set("parent_id",d.parent_id);		
		});
	}
		

	//Upload file
	$("#userfile").kendoUpload({
        async: {
            saveUrl: ARNY.baseUrl + "api/files/do_upload_image",
            removeUrl: "remove",
            autoUpload: true
        },
		localization: {
			dropFilesHere: "ទំលាក់រួបភាពទីនេះ",
			select : "រើសរូបភាព",
			statusUploading: "កំពុងទទួលយករូបភាព",
			statusFailed: "មិនអាចផ្ញើរ",
			retry: "សាកល្បងម្ដងទៀត",
			cancel: "មោឃ៖ភាព"
		},
		showFileList: false,
		success: function(e) {
			var files = e.files;
			var name, path;
			$.each(files, function(index, value){
				path = "./uploads/logo/" + value.name;
				viewModel.set("image_url", path);
			});
		} 
    });
		
});//End document ready
</script>