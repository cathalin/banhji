<div id="people" class="container">
    <div class="k-toolbar k-grid-toolbar">
        <a class="k-button k-button-icontext k-grid-add" href="#">
            <span class="k-icon k-add"></span>
            Add Person
        </a>
        <div class="toolbar-filter">
            Filter: 
            <select data-role="dropdownlist" data-bind="source: roles, value: currentRoleId" 
                    data-select="filterRole" data-text-field="name" data-value-field="id" 
                    data-option-label="Select a Role">
            </select>
            <button data-bind="click: filterRole" class="k-button">Go</button>
        </div>
    </div>
    <div data-role="grid" 
         data-bind="source: people" 
         data-editable="true" 
         data-filterable="true"
         data-columns='[{"field": "firstName", "title": "First Name"}, 
                        {"field": "lastName", "title": "Last Name"}, 
                        {"field": "lastUpdated", "title": "Full Name", "template": "#= fullName() #"}, 
                        {"field": "roleId", "title": "Role", "template": "#= parent().parent().getRoleName(roleId) #"},
                        {"command": "destroy", "title": " ", "width": "110px"}]'>
    </div>
</div>

<script type="text/x-kendo-template" id="toolbar-template">
    <a class="k-button k-button-icontext k-grid-add" href="\#"><span class="k-icon k-add"></span>Add new record</a>
</script>	
<script>
	var Person = kendo.data.Model.define({
	    fields: {
	        "firstName": {
	            type: "string"
	        },
	        "lastName": {
	            type: "string"
	        },
	        "roleId": {
	            type: "number"                
	        },
	        "lastUpdated": {
	            type: "date",
	            editable: false
	        }
	    },
	    fullName : function() {
	        return this.get("firstName") + " " + this.get("lastName");
	    }
	});

	// Define a DataSource
	var peopleDataSource = new kendo.data.DataSource({
	    data: [
	        { id: 1, firstName: "John", lastName: "DeVight", roleId: 2 },
	        { id: 2, firstName: "Wendy", lastName: "Parry", roleId: 1 }
	    ],
	    schema: {
	        model: Person
	    }
	});

	peopleDataSource.bind("change", function(e) {
	    if (e.action === "itemchange") {
	        if (e.field === "firstName" || e.field === "lastName") {
	            e.items[0].dirty = true;
	            kendo.data.ObservableObject.fn.set.call(e.items[0], "lastUpdated", new Date());
	        }
	    }
	});

	// Create an observable object.
	var vm = kendo.observable({
	    people: peopleDataSource,
	    roles: [
	    {
	        id: 1,
	        name: "CEO"},
	    {
	        id: 2,
	        name: "Developer"},
	    {
	        id: 3,
	        name: "Tester"}
	    ],
	    getRoleName: function(roleId) {
	        var roleName = "";
	        $.each(this.roles, function(idx, role) {
	            if (role.id == roleId) {
	                roleName = role.name;
	                return false;
	            }
	        });
	        return roleName;
	    },
	    currentRoleId: 0,
	    filterRole: function() {
	        if (this.currentRoleId== 0) {
	            this.people.query();
	        } else {
	            this.people.filter({ field: "roleId", operator: "eq", value: this.currentRoleId});
	        }
	    }
	});

	kendo.bind($("#people"), vm);

	var roleEditor = function(container, options) {
	    $("<input name='" + options.field + "'/>")
	        .appendTo(container)
	        .kendoDropDownList({
	            dataSource: {
	                data: vm.roles
	            },
	            dataTextField: "name",
	            dataValueField: "id"
	        });
	};

	var grid = $("div[data-role='grid']").data("kendoGrid");
	$.each(grid.columns, function(idx, column) {
	    if (column.field == "roleId") {
	        column.editor = roleEditor;
	        return false;
	    }
	});

	$(".k-grid-toolbar").delegate(".k-grid-add", "click", function(e) {
	    e.preventDefault();
	    grid.addRow();
	});
</script>