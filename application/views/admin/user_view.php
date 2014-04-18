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
									<button onClick="javascript:addNew();">ថែមថ្មី</button>
					                <div id="credentials"></div>
					                <div id="credDialogEdit">
					                	<label for="role">តួនាទី</label>
					                	<input type="text" data-role="dropdownlist" 
					                					   data-bind="source: role, value: role_id" 
					                					   data-text-field="name" 
					                					   data-value-field="id"
					                					   data-option-label="Choose One">
					                	<label for="username" data-bind="visible: isShown">Username</label>
					                	<input type="text" data-bind="value: username, visible: isShown">
					                	<label for="password">Password</label>
					                	<input type="password" data-bind="value: password">
					                	<label for="passwordCon">Confirm Password</label>
					                	<input type="password" data-bind="value: passwordCon"><br>
					                	<button data-bind="click: update, invisible: isShown">កែ</button><button data-bind="click: save, visible: isShown">រក្សាទុក</button>
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

var MYAPP = MYAPP || {};
MYAPP.setting = {
	user_role: "<?php echo $this->session->userdata('role_id'); ?>",
	username : "<?php echo $this->session->userdata('username'); ?>"
};
		
//Datasource
var credDS = new kendo.data.DataSource({
	transport: {
		read: {
			url: ARNY.baseUrl + "api/credentials",
			type: "GET",
			dataType: "json"
		},
		create: {
			url: ARNY.baseUrl + "api/credentials",
			type: "POST",
			dataType: "json"
		},
		update: {
			url: ARNY.baseUrl + "api/credentials",
			type: "PUT",
			dataType: "json"
		},
		destroy: {
			url: ARNY.baseUrl + "api/credentials",
			type: "DELETE",
			dataType: "json"
		},
		parameterMap: function(options, operation) {
			if( operation !== "read" && options.models ) {
				return { models: kendo.stringify(options.models) };
			}
			return options;
		}
	},
	pageSize: 20,
	//autSync: true,
	schema: {
		model: {
			id: "id"
		}
	}
});

var credentials = new kendo.observable({
		setCurrent: function(id) {
			this.set("current", credDS.get(id));
		},
		role 		: new kendo.data.DataSource({
			transport: {
				read: {
					url: ARNY.baseUrl + "api/employees/roles",
					type: "GET",
					dataType: "json"
				},
				parameterMap: function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringify(options.models) };
					}
					return options;
				}
			},
			schema: {
				model: {
					id: "id"
				}
			}
		}),
		isShown 	: false,
		enabled 	: false,
		role_id 	: "",
		username 	: "",
		password 	: "",
		passwordCon : "",
		edit 		: function(id) {
			this.setCurrent(id);
			if(this.get("isShown")) {
				this.set("isShown", false);
			}
			this.set("role_id", this.get("current").role.id);
			wnd.center().open();
		},
		addNew 		: function() {
			this.set("isShown", true);
			this.set("role_id", "");
			wnd.center().open();
		},
		update 		: function() {
			if(!this.get("enabled")) {
				alert("You don't have permission to edit or delete!");
			} else {
				this.get("current").set("role", this.get("role").get(this.get("role_id")));
				if(this.get("password") !== "" && this.get("passwordCon") !== "") {
					if(this.get("password") !== this.get("passwordCon")) {
						alert("Password does not match!");
					} else {
						this.sync();
					}
				} else {
					if(this.get("current").role.id === MYAPP.setting.user_role) {
						alert("You can't change your role!");
					} else {
						this.sync();
					}
				}
				
			}	
		},
		save 		: function() {
			//if(!this.get("enabled")) {
				//alert("You don't have permission to create!");
			//} else {
				if(this.get("password") === this.get("passwordCon") && this.get("username") !== "") {
					if(this.get("role_id") === "") {
						this.set("role_id", 5);
					}
					credDS.add({
						role: this.get("role").get(this.get("role_id")),
						username: this.get("username"),
						password: this.get("password")
					});
					this.sync();
				} else {
					// do something
					alert("Username is empty or Password does not match!");
				}
			//}			
		},
		sync 		: function() {
			credDS.sync();
		}
});

var wnd = $("#credDialogEdit").kendoWindow({
	title: "Edit",
	modal: true,
	visible: false
}).data("kendoWindow");
function addNew(){
	credentials.addNew();
}

$(function() {
	kendo.bind("#credDialogEdit", credentials);
	var cred = $("#credentials").kendoGrid({
		dataSource: credDS,
		pageable: true,
		columns: [
			{ title: "តួនាទី", field: "role.id", template: "#=role.name#" },
			{ title: "ឈ្មោះអ្នកប្រើប្រាស់", field: "username" },
			{ title: "ពេលបង្កើត", field: "created_at" },
			{ title: "ពេលកំនែ", field: "updated_at" },
			{ command: [
					{ 
						name: "edit",
						text: "កែ",
						click: function(e) {
							var uid = $(e.target).closest("tr");
							var data = this.dataItem(uid);
							// if(MYAPP.setting.username === data.username) {
							// 	credentials.set("enabled", true);
							// } else if( MYAPP.setting.username === data.username && MYAPP.setting.user_role === data.id) {
							// 	credentials.set("enabled", true);
							// } else {
							// 	credentials.set("enabled", false);
							// }
							credentials.edit(data.id);
							credentials.set("enabled", true);
							// console.log(MYAPP.setting.username);
						},
						template: "<a href='\\#' class='btn-action glyphicons pencil btn-success k-grid-edit'><i></i></a>"
					},
					{
						
						text: "del",
						click: function(e) {
							var uid = $(e.target).closest("tr");
							var data = this.dataItem(uid);
							var model = credDS.get(data.id);
							var ask = confirm("តើអ្នកពិតជាចង់លុបមែនទេ?");
							if( ask ) {
								credDS.remove(model);
								credDS.sync();
							}
							//console.log(model.id);
							
						},						
						template: "&nbsp;<a href='\\#' class='btn-action glyphicons remove_2 btn-danger k-grid-del'><i></i></a>"
					}
				],
				width: "80px"
			}
		]	
	});
	
});
</script>