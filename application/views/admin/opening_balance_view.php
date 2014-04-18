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
									<h3>បើកសមតុល្យដើមគ្រា</h3>

									<table width="100%">
										<tr>
								            <td>ប្រចាំខែ</td>            
								            <td><input data-role="datepicker" data-bind="value: month_of" data-start="year" data-depth="year" data-format="MM-yyyy" /></td>		            								            			            
								      	</tr>		          	
								      	<tr>		            
								            <td>ថ្ងៃចេញវិក្កយបត្រ</td>            
								            <td><input data-role="datepicker" data-bind="value: issued_date" data-format="dd-MM-yyyy" /></td>			            
								        </tr>
								      	<tr>		            
								            <td>ថ្ងៃបង់ប្រាក់</td>
								            <td><input data-role="datepicker" data-bind="value: due_date" data-format="dd-MM-yyyy" /></td>								            
								      	</tr>		          	
								    </table>

								    <div id="status"></div>

									<div class="span3" data-bind="click: btnOpenBalance, disabled: isDisable">
										<a href="#" class="widget-stats widget-stats-primary widget-stats-5">
											<span class="glyphicons book_open"><i></i></span>
											<span class="txt"><span>បើកសមតុល្យដើមគ្រា</span></span>
											<div class="clearfix"></div>
										</a>
									</div>

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
var account_receiveable_id = 3;
var open_balance_acct_id = 86;
var open_balance_item_id = 12;

//Datasource
var customerDS = new kendo.data.DataSource({
	transport: {
		read: {
			url: ARNY.baseUrl + "api/people_api/people",
			type: "GET",
			dataType: "json"
		}
	},
	filter: { field: "balance >", value: 0 },
	serverFiltering: true
});

var invoiceDS = new kendo.data.DataSource({
  	transport: {	  
	  	create: {
		  	url : ARNY.baseUrl + "api/invoices/invoice_batch",
		  	type: "POST",
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
			  id : "id"
	  	}		
  	}
});

var invoiceItemDS = new kendo.data.DataSource({
  	transport: {	  
	  	create: {
		 	url : ARNY.baseUrl + "api/invoice_items/invoice_item_batch",
		  	type: "POST",
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
		  	id : "id"
	  	}		
  	}
});

var journalDS = new kendo.data.DataSource({
  	transport: {	  
	    create: {
		  	url : ARNY.baseUrl + "api/accounting_api/journals",
		  	type: "POST",
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
		  	id : "id"
	  	}		
  	}
});

//View model
var viewModel = kendo.observable({
	month_of 		: new Date(),
	issued_date 	: new Date(),
	due_date 		: "",
	isDisable 		: false,

	invoiceList 	: [],
	invoiceItemList : [],

	pageLoad 		: function(){
		this.setDueDate();
		customerDS.read();				
	},
	setDueDate		: function(){
		var duedate = new Date();
		duedate.setDate(duedate.getDate()+7);
		this.set("due_date", kendo.toString(duedate,'dd-MM-yyyy'));
	},
	btnOpenBalance: function(){
		this.openBalance();		
		this.set("isDisable", true);
		$("#status").text("កត់ត្រាបានសំរេច").addClass("alert alert-success");			
	},
	openBalance 	: function(){
		var next_inv_id = "<?php echo $next_inv_id;?>";
		var last_no = "<?php echo $last_invoice_no;?>";

		var monthOf = new Date(this.get("month_of"));
		monthOf.setDate(1);
		monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

		var invoice_no = 0;
		if(last_no.length>7){
			invoice_no = parseInt(last_no.substr(7));

			//Apply invoice no back to 0000 for the new year
			var y = parseInt(last_no.substr(3,2));
			var yof = parseInt(new Date(this.get("month_of")).getFullYear().toString().substr(2,2));			
			if(yof>y){
				invoice_no = 0;
			}					
		}
		
		invoice_no++;		

		var str_inv_no = "INV" + kendo.toString(new Date(this.get("month_of")), "yy") 
								+ kendo.toString(new Date(this.get("month_of")), "MM");

		var invoice_id = kendo.parseInt(next_inv_id);
		var biller = <?php echo $this->session->userdata('user_id'); ?>;

		var amount = 0;
		for (var i=0;i<customerDS.total();i++) {
			var d = customerDS.at(i);			
			var inv_no = str_inv_no + kendo.toString(invoice_no, "00000");

			amount += kendo.parseFloat(d.balance);

			//Invoice
			this.invoiceList.push({
				number			: inv_no,
				type 			: "Invoice",	  
				status			: 0,
				amount 			: d.balance,
				biller			: biller,	  
				customer_id		: d.id,
				address			: d.address,
				issued_date		: kendo.toString(new Date(this.get("issued_date")), "yyyy-MM-dd"),				
				due_date		: kendo.toString(new Date(this.get("due_date")), "yyyy-MM-dd"),
				month_of 		: monthOf,				
				payment_term_id	: 0,	  	  	
				currency_id		: 0,
				memo			: "សមតុល្យដើមគ្រា"				
			});

			//Invoice item
			this.invoiceItemList.push({
				invoice_id	: invoice_id,
				item_id		: open_balance_item_id,	
				description	: "សមតុល្យដើមគ្រា",				
				quantity	: 1,	  
				unit_price	: d.balance,					  	  
				amount		: d.balance				
			});

			invoice_no++;
			invoice_id++;			
		}

		invoiceDS.add(this.get("invoiceList"));
		invoiceItemDS.add(this.get("invoiceItemList"));
		this.addJournal(biller, amount);

		invoiceDS.sync();
		invoiceItemDS.sync();
	},
	addJournal 		: function(biller, amount){		
		var d = new Date(this.get("month_of"));	
		var lastD = new Date(d.getFullYear(), d.getMonth() + 1, 0);
		var journalEntries = [];
						
		//A/R		
		journalEntries.push({				
			account_id	: account_receiveable_id,				
			dr			: amount, 
			cr			: 0,				
			class_id 	: 0,
			memo 		: "សមតុល្យដើមគ្រា"
		});
		

		//Open Balance		
		journalEntries.push({
			account_id	: open_balance_acct_id,
			dr			: 0, 
			cr			: amount,
			class_id 	: 0,
			memo 		: "សមតុល្យដើមគ្រា"
		});
							
		//Add new journal to database			
		journalDS.add({	 		
	 		memo		: "សមតុល្យដើមគ្រា", 
	 		voucher		: "",
	 		class_id	: 0,
	 		budget_id	: 0,
	 		donor_id	: 0,
	 		check_no	: "",
	 		location_id	: 0,
	 		transaction_type: "Invoice",
	 		people_id 	: 0,
	 		employee_id : biller,
	 		invoice_id 	: 0,
	 		payment_id  : 0,
	 		bill_id		: 0,	
	 		date 		: kendo.toString(lastD, "yyyy-MM-dd"), 
	 		receipt_id  : 0,
	 		item_receipt_id : 0,
	 		cashier 	: 0,
	 		journalEntries 	: journalEntries	 			 		
	 	});	 	

	 	journalDS.sync();	 	
	}	
});  
kendo.bind($("#example"), viewModel);

viewModel.pageLoad();

}); //End document ready
</script>