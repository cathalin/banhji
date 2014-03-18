<div class="container">
	<div class="row">
		<div class="span2">
			<?php $this->load->view('admin/admin_sidebar_view'); ?>
		</div>
		<div class="span10">
			<div id="application"></div>
			<div id="configList"></div>
		</div>
	</div>
</div>
<script type="text/x-kendo-template" id="appIndex">
	<div id="app"></div>
</script>
<script type="text/x-kendo-template" id="appDetail">
	Name: <span data-bind="text: model.name"></span><br>
	Fiscal Year: <span data-bind="text: model.fiscal_year"></span><br>
	Use Generator? <input type="checkbox" data-bind="enabled: checkEnabled, value: generator"><br> 
	Base Currency: <span data-bind="text: model.based_currency"></span><br>
	<a href="#/edit"><?=$this->lang->line('button_edit'); ?></a>
</script>
<script type="text/x-kendo-template" id="configTmpl">
	<label for="name">Name:</label>	
	<input type="text" data-bind="value: name">
	<label for="name">Fiscal Year:</label>	
	<input type="text" data-bind="value: fiscal_year" data-role="datepicker">
	<label for="name">Use Genderator:</label>
	<input type="checkbox" data-bind="enabled: checkEnabled, value: generator, click: use_generator"><br> 
	<label for="currency">Base Currency:</label>
	<input type="text" data-bind="source: currencies, value: currency" data-role="combobox" data-text-field="country_currency" data-value-field="code"><br>
	<button class="btn" data-bind="click: edit"><?=$this->lang->line('button_update'); ?></button>
	<button class="btn" data-bind="click: cancel"><?=$this->lang->line('button_cancel'); ?></button>
</script>

<script>
var configList	= new kendo.data.DataSource({
		transport	: {
			read	: {
				url	: ARNY.baseUrl + "api/settings/config",
				type: "GET",
				dataType: "json"
			},
			create	: {
				url	: ARNY.baseUrl + "api/settings/config",
				type: "POST",
				dataType: "json"
			},
			update	: {
				url	: ARNY.baseUrl + "api/settings/config",
				type: "PUT",
				dataType: "json"
			},
			destroy : {
				url	: ARNY.baseUrl + "api/settings/config",
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
		pageSize: 20,
		schema: {
			model: {
				id: "id",
				fields: {
					id: { editable: false, type: "number"},
					fiscal_year: { format: "{0:'dd,MM,yyyy'}" }
				}
			}
		}
});
var currencyDS 	= new kendo.data.DataSource({
	transport: {
		read: {
			url: ARNY.baseUrl + "api/currencies"
		}
	}
});
var confModel = kendo.observable({
	setModel: function() {
		this.set("model", configList.at(0));
		this.set("id", configList.at(0).id);
		this.set("name", configList.at(0).name);
		this.set("fiscal_year", configList.at(0).fiscal_year);
		this.set("generator", configList.at(0).use_generator);
		this.set("currency", configList.at(0).based_currency);
	},
	use_generator: function() {
		if(this.get("generator") === 0) {
			this.set("generator", 1);
		} else {
			this.set("generator", 0);
		}
	},
	account_payables 	: "",
	account_receivables : "",
	account_cash 		: "",
	account_cogs 		: "",
	checkEnabled: false,
	currencies: currencyDS,
	edit 	: function() {
		var con = configList.get(this.get("id"));
		var fisDate = kendo.toString(this.get("fiscal_year"), 'yyyy-MM-dd');
		con.set("name", this.get("name"));
		con.set("fiscal_year", fisDate);
		con.set("generator", this.get("generator"));
		con.set("based_currency", this.get("currency"));
		configList.sync();
		router.navigate("/");
		this.set("checkEnabled", false);
	},
	cancel 	: function() {
		router.navigate("/");
		this.set("checkEnabled", true);
	}
});
//views
var layout 		= new kendo.Layout("#appIndex");
var configView 	= new kendo.View("#appDetail", { model: confModel });
var editView 	= new kendo.View("#configTmpl", { model: confModel });
//route
var router = new kendo.Router({
	init: function() {
		layout.render("#application");
	}
});

router.route("/", function(){
	layout.showIn("#app", configView);
	configList.fetch(function(e){
		confModel.setModel();
	});
});

router.route("/edit", function(){
	layout.showIn("#app", editView);
	confModel.set("checkEnabled", true);
	// currencyDS.fetch(function(e){

	// });
});

$(function(){
	router.start();
});

</script>