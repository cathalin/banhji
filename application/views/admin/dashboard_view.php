<div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row-fluid row-merge widget-tabs-gray">

    <!-- Tabs Heading -->
    <div class="widget-head span3 hidden-print">
        <ul>
            <li class="active">
            	<a href="#tab1-1" class="glyphicons user" data-toggle="tab"><i></i>
            		<span class="strong">ក្រុមហ៊ុន</span>
            		<span>មធ្យោបាយផលិតកម្ម</span>
            	</a>
            </li>
            <li>
            	<a href="#tab2-1" class="glyphicons calculator" data-toggle="tab"><i></i>
            		<span class="strong">អ្នកប្រើសប្រាស់</span>
            		<span>ថាមពលផលិត</span>
            	</a>
            </li>
        </ul>
    </div>
    <!-- // Tabs Heading END -->

    <div class="widget-body span9">
        <div class="tab-content">

            <!-- Tab content -->
            <div class="tab-pane active" id="tab1-1">
                <h4>មធ្យោបាយផលិតកម្ម</h4>
                <label for="name">Company Name:</label>
				<input type="text" data-bind="value: name">
                <label for="license">License</label>
				<input type="text" data-bind="value: license">
                <label for="phone">Phone</label>
				<input type="text" data-bind="value: phone">
                <label for="email">email</label>
				<input type="text" data-bind="value: email">
                <label for="addres">Address</label>
				<input type="text" data-bind="value: address">
                <label for="cogs">Fiscal Year</label>
				<input type="text" data-bind="value: fiscalYear">
                <label for="cogs">Use Generator?</label>
				<input type="text" data-bind="value: useGenerator">
                <label for="cogs">Base Currency</label>
                <input type="text" data-bind="value: baseCurrency">
                <button data-bind="click: save">រក្សាទុក</button>

            </div>
            <!-- // Tab content END -->

            <!-- Tab content -->
            <div class="tab-pane" id="tab2-1">
                <h4>អ្នកប្រើសប្រាស់</h4>
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
<div id="options"></div>

<script>
	var MYAPP = MYAPP || {};
	MYAPP.setting = {
		user_role: "<?php echo $this->session->userdata('role_id'); ?>",
		username : "<?php echo $this->session->userdata('username'); ?>"
	};
	var user_role = "<?php echo $this->session->userdata('role_id'); ?>";
	var username  = "<?php echo $this->session->userdata('username'); ?>";
	var accountTransport = {
		read: {
			url: ARNY.baseUrl + "api/accounting_api/account",
			type: "GET",
			dataType: "json"
		},
		parameterMap : function(options, operation) {
			if( operation !== "read" && options.models ) {
				return { models: kendo.stringigy(options.models) };
			}
			return options;
		}
	};
	var companyDS = new kendo.data.DataSource({
		transport: {
			read: {
				url: ARNY.baseUrl + "api/companies/company",
				dataType: "json",
				type: "GET"
			},
			update: {
				url: ARNY.baseUrl + "api/companies/company",
				dataType: "json",
				type: "PUT"
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
		},
		filter: { field: "id", value: 1 },
		serverFiltering: true
	});

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

	var settings = new kendo.observable({
		current 		: "",
		setCurrent 		: function(index) {
			this.set("current", companyDS.at(index));
			this.set("name", this.get("current").name);
			this.set("license", this.get("current").license);
			this.set("phone", this.get("current").phone);
			this.set("email", this.get("current").email);
			this.set("address", this.get("current").address);
			this.set("fiscalYear", this.get("current").fiscal_year);
			this.set("baseCurrency", this.get("current").based_currency);
			this.set("accountPayables", this.get("current").account_payables);
			this.set("accountReceive", this.get("current").account_receivables);
			this.set("cogs", this.get("current").cogs_accounts);
		},
		recievableAC 	: new kendo.data.DataSource({
			transport: accountTransport,
			filter: [
				{ field: "type_id", opatation: "eq", value: "7"}
			]
		}),
		payableAC 		: new kendo.data.DataSource({
			transport: accountTransport,
			filter: [
				{ field: "type_id", opatation: "eq", value: "11"}
			]
		}),
		cogsAC 			: new kendo.data.DataSource({
			transport: accountTransport,
			filter: [
				{ field: "type_id", opatation: "eq", value: "9"}
			]
		}),
		name 			: "",
		license 		: "",
		phone 			: "",
		email 			: "",
		address 		: "",
		baseCurrency 	: "",
		accountPayables : "",
		accountReceive 	: "",
		cogs 			: "",
		useGenerator 	: false,
		fiscalYear 		: "",
		save 			: function() {
			var setting = companyDS.at(0);
			setting.set("name", this.get("name"));
			setting.set("license", this.get("license"));
			setting.set("phone", this.get("phone"));
			setting.set("email", this.get("email"));
			setting.set("address", this.get("address"));
			setting.set("based_currency", this.get("baseCurrency"));
			setting.set("use_generator", this.get("useGenerator"));
			setting.set("fiscal_year", this.get("fiscalYear"));
			// setting.set("account_payables", this.get("accountPayables"));
			// setting.set("account_receivables", this.get("accountReceive"));
			// setting.set("cogs_accounts", this.get("cogs"));

			companyDS.sync();
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
					if(this.get("current").role.id === user_role) {
						alert("You can't change your role!");
					} else {
						this.sync();
					}
				}
				
			}	
		},
		save 		: function() {
			if(!this.get("enabled")) {
				alert("You don't have permission to create!");
			} else {
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
			}			
		},
		sync 		: function() {
			credDS.sync();
		}
	});
	var wnd = $("#credDialogEdit").kendoWindow({
		title: "Edit",
		modal: true
	}).data("kendoWindow");
	function addNew(){
		credentials.addNew();
	}
	$(function() {

		kendo.bind("#tab1-1", settings);
		kendo.bind("#credDialogEdit", credentials);
		companyDS.fetch(function(e){
			settings.setCurrent(0);
		});

		var cred = $("#credentials").kendoGrid({
			dataSource: credDS,
			pageable: true,
			columns: [
				{ title: "តួនាទី", field: "role.id", template: "#=role.name#" },
				{ title: "Username", field: "username" },
				{ title: "តួនាទី", field: "created_at" },
				{ title: "តួនាទី", field: "updated_at" },
				{ command: [
						{ 
							name: "edit",
							text: "កែ",
							click: function(e) {
								var uid = $(e.target).closest("tr");
								var data = this.dataItem(uid);
								if(username === data.username) {
									credentials.set("enabled", true);
								} else if( username === data.username && user_role === data.id) {
									credentials.set("enabled", true);
								} else {
									credentials.set("enabled", false);
								}
								credentials.edit(data.id);
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