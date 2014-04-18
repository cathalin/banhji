<div class="container">
	<div class="row">
		<div class="span2">
			<?php $this->load->view('admin/adminbar'); ?>
		</div>
		<div class="span10">
			<div id="application"></div>
		</div>
	</div>
</div>
<!--template section-->
<script type="text/x-kendo-template" id="appIndex">
	<div id="app"></div>
</script>
<script type="text/x-kendo-template" id="index">
	<div data-role="listview" data-bind="source: companies" data-template="item"></div>
</script>
<script type="text/x-kendo-template" id="item">
	<div class="companies">
		<p>Name: <span data-bind="text: name"></span></p>
		<p>Year: <span data-bind="text: year_founded"></span></p>
		<p>License No.: <span data-bind="text: operation_license"></span></p>
		<p>Phone: <span data-bind="text: phone"></span></p>
		<p>Mobile: <span data-bind="text: mobile"></span></p>
		<p>Address: <span data-bind="text: address"></span>
		<p>Rep: <span data-bind="text: representative"></span></p>
		<a href="\\#/edit/#:id#" class="btn btn-primary">Edit</a>
	</div>
</script>

<script type="text/x-kendo-template" id="editTemplate">
	<div id="companies">
		<label for="name">Name:</label>
		<input type="text" data-bind="value: name">
		<label for="year">Year:</label>
		<input type="text" data-bind="value: year">
		<label for="year">License No.:</label>
		<input type="text" data-bind="value: operation_license">
		<label for="phone">Phone:</label>
		<input type="text" data-bind="value: phone">
		<label for="mobile">Mobile:</label>
		<input type="text" data-bind="value: mobile">
		<label for="address">Address:</label>
		<input type="text" data-bind="value: address"><br>
		<label for="mobile">Rep:</label>
		<input type="text" data-bind="value: representative"><br>
		<button class="btn btn-primary" data-bind="click: edit">Update</button>
		<button data-bind="click: cancel" class="btn btn-error">Cancel</button>	
		
	</div>
</script>
<script type="text/x-kendo-template" id="createTemplate">
	<div id="companies">
		<label for="name">Name:</label>
		<input type="text" data-bind="value: name">
		<label for="year">Year:</label>
		<input type="text" data-bind="value: year">
		<label for="year">License No.:</label>
		<input type="text" data-bind="value: operation_license">
		<label for="phone">Phone:</label>
		<input type="text" data-bind="value: phone">
		<label for="mobile">Mobile:</label>
		<input type="text" data-bind="value: mobile">
		<label for="mobile">Rep:</label>
		<input type="text" data-bind="value: representative"><br>
		<button class="btn btn-primary" data-bind="click: save">Update</button>
		<button data-bind="click: cancel" class="btn btn-error">Cancel</button>
		
	</div>
</script>
<!--end of template section-->

<!--script section-->
<script>
	var companyDS = new kendo.data.DataSource({
		transport: {
			read: {
				url: ARNY.baseUrl + "api/settings/companies",
				type: "GET",
				dataType: "json"
			},
			create: {
				url: ARNY.baseUrl + "api/settings/companies",
				type: "POST",
				dataType: "json"
			},
			update: {
				url: ARNY.baseUrl + "api/settings/companies",
				type: "PUT",
				dataType: "json"
			},
			destroy: {
				url: ARNY.baseUrl + "api/settings/companies",
				type: "DELETE",
				dataType: "json"
			},
			parameterMap: function(options, operation) {
				if(operation !== "read" && options.models) {
					return { models: kendo.stringify(options.models)};
				}
				return options;
			}
		},
		schema: {
			model: {
				id: "id",
				fields: {
					id: {editable: false, type: "number" }
				}
			}
		}
	});

	var child_companies = new kendo.data.DataSource({
		transport: {
			read: {
				url: ARNY.baseUrl + "api/settings/sub_companies",
				type: "GET",
				dataType: "json"
			},
			create: {
				url: ARNY.baseUrl + "api/settings/sub_companies",
				type: "POST",
				dataType: "json"
			},
			update: {
				url: ARNY.baseUrl + "api/settings/sub_companies",
				type: "PUT",
				dataType: "json"
			},
			parameterMap: function(options, operation) {
				if(operation !== "read" && options.models) {
					return { models: kendo.stringify(options.models)};
				}
				return options;
			}
		},
		schema: {
			model: {
				id: "id",
				fields: {
					id: {editable: false, type: "number" }
				}
			}
		}
	});

	var companyModel = kendo.observable({
		companies 	: companyDS,
		setCurrent: function(company_id) {
			this.set("current", companyDS.get(company_id));
			this.set("name", this.get("current").name);
			this.set("year", this.get("current").year_founded);
			this.set("operation_license", this.get("current").operation_license);
			this.set("phone", this.get("current").phone);
			this.set("mobile", this.get("current").mobile);
			this.set("address", this.get("current").address);
			this.set("representative", this.get("current").representative);
		},
		edit: function() {
			var id 		= this.get("current").id;
			var model 	= companyDS.get(id);
			model.set("name", this.get("name"));
			model.set("year_founded", this.get("year"));
			model.set("operation_license", this.get("operation_license"));
			model.set("phone", this.get("phone"));
			model.set("mobile", this.get("mobile"));
			model.set("address", this.get("address"));
			model.set("representative", this.get("representative"));
			companyDS.sync();
			router.navigate("/");
		},
		save: function() {
			companyDS.add({
				name: this.get("name"),
				year_founded: this.get("year"),
				operation_license: this.get("operation_license"),
				phone: this.get("phone"),
				mobile: this.get("mobile"),
				address: this.get("address"),
				representative: this.get("representative")
			});
			companyDS.sync();
			router.navigate("/");
		},
		cancel: function() {
			router.navigate("/");
		},
		delete: function() {
			var id 		= this.get("current").id;
			var model 	= companyDS.get(id);

			companyDS.remove(model);
			companyDS.sync();
			router.navigate("/");
		}
	});

	//layout & view
	var layout 		= new kendo.Layout("#appIndex");
	var displayView = new kendo.View("#index", { model: companyModel });
	var editView 	= new kendo.View("#editTemplate", { model: companyModel });
	var createView 	= new kendo.View("#createTemplate", { model: companyModel });

	//routing config
	var router = new kendo.Router({
		init: function() {
			layout.render("#application");
		}
	});

	//routing
	router.route("/", function() {
		layout.showIn("#app", displayView);
		companyDS.fetch();
	});
	router.route("/create", function() {
		layout.showIn("#app", createView);
		this.set("name", this.get("current").name);
			this.set("year", "");
			this.set("operation_license", "");
			this.set("phone", "");
			this.set("mobile", "");
			this.set("representative", "");
	});
	router.route("/edit/:id", function(id) {
		layout.showIn("#app", editView);

		companyModel.setCurrent(id);
	});
	
	$(function(){
		router.start();
	});
</script>

<style scoped>
	.k-listview {
		border: 0;
		margin-bottom: 2px;
	}
	.companies {
		border: 1px solid #ccc;
		margin-bottom: 2px;
		padding: 5px;
	}
</style>