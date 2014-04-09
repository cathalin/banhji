<div id="wrapper"></div>
<script src="<?php echo base_url();?>resources/js/locale.js"></script>
<script src="<?php echo base_url();?>resources/js/cultures/kendo.culture.km-KH.min.js"></script>

<!--views-->
<!-- By Dararith -->
<script type="text/x-kendo-template" id="layout">
	<div id="layout-view">
	</div>
</script>
<script type="text/x-kendo-template" id="404">
	<div  class="container-fluid menu-hidden sidebar-hidden-phone fluid menu-left">
		<div class="row">
			<div class="span12">
				<div>
					<h3>Oops! We are running into a wall</h3>
					<p>Try going <a href="\\#" data-bind="click: back">back</a></p>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="index">
	<div id="header"></div>
	<div class="row-fluid">
		<div class="innerLR">
			<div class="span12">
				<div id="content"></div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="welcome">
	<div class="container">
		<div class="row-fluid">
			<div class="span6">
				<ul id="module-image">
					<li>
						<a href="<?php echo base_url(); ?>app#customers">
							<img src="<?php echo base_url(); ?>resources/img/Customer.png" alt="Customer">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>app#vendors">
							<img src="<?php echo base_url(); ?>resources/img/Vendor.png" alt="Vendor">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>app#accounting">
							<img src="<?php echo base_url(); ?>resources/img/Accounting.png" alt="Accounting">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>app#inventories">
							<img src="<?php echo base_url(); ?>resources/img/Inventory.png" alt="Inventory">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>app#Electricity">
							<img src="<?php echo base_url(); ?>resources/img/Electricity.png" alt="Electricity">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>app#electricity/transformer_list/">
							<img src="<?php echo base_url(); ?>resources/img/Water.png" alt="Water">
						</a>
					</li>
					<li></li>
					<li>
						<a href="<?php echo base_url(); ?>app#reports">
							<img src="<?php echo base_url(); ?>resources/img/Report.png" alt="Report">
						</a>
					</li>
					<li></li>
				</ul>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="menu">
	<div class="navbar navbar-fixed-top navbar-inverse" id="main-menu">
		<div class="navbar-inner">
			<div class="container">
				<ul class="nav">
					<li class="dropdown span2">
						<a href="\#" class="dropdown-toggle" data-toggle="dropdown" id="home-menu">Banhji</a>
						<ul class="dropdown-menu">
							#for(var i=0;i<data.length;i++) {#
					            <li><a href="\\##=data[i].menu#">#=data[i].locale#</a></li>
					        #}#
			        	</ul>
			        </li>
				</ul>
				<ul class="nav pull-right" id="secondary-menu">
				</ul>
			</div>
		</div>
	</div>
</script>

<script type="text/x-kendo-template" id="vendor">
	<div class="widget widget-heading-simple widget-body-gray widget-employees">			
		<!-- Widget Heading -->
		<!-- <div class="widget-head">
			<h4 class="heading glyphicons user"><i></i>ទំព័រអគ្គីសនី</h4>
		</div> -->
		<!-- // Widget Heading END -->		
		<div class="widget-body padding-none">	
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" style="height: 730px;">
					<div class="innerAll">
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" id="search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" value="" placeholder="ស្វែងរកត្រងស្វូ" id="searchField">
								</div>
							</div>
							<div class="select2-container" style="width: 100%;">
								<div class="overflow-hidden">
									<select name="" id="searchOptions" style="width: 100%;" tabindex="-1">
										<option value="class_id">Class</option>
						                <option value="name">ឈ្មោះ</option>
									</select>
								</div>
							</div>
						</form>
					</div>
					<span class="results"></span>
					<div class="table table-condensed" id="sidebar" style="height: 605px;"></div>
				</div>
				<div class="span9 detailsWrapper">
					<div class="innerLR">		
						<div id="vendorDetail"></div>
					</div>					
				</div>
			</div>	
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="vendorNew">
	<div id="vendor-form">
		<button class="btn btn-primary pull-right" data-bind="click: closeX">X</button>
		<ul class="nav nav-tabs">
			<li class="active"><a href="#company" data-toggle="tab">ព័ត៌មានទូទៅ</a></li>
			<li><a href="#contact" data-toggle="tab">ព័ត៌មានទំនាគ់ទំនង</a></li>
		</ul>
		<div id="myVendorTab" class="tab-content">
			<div class="tab-pane active" id="company">
				<table class="table">
					<tbody>
						<tr>
							<td width="100">ឈ្មោះ</td>
							<td><input type="text" data-bind="value: company"></td>
						</tr>
						<tr>
							<td>ប្រភេទ</td>
							<td><input type="text" data-role="combobox" 
												   data-bind="source: types, value: type_id" 
												   data-value-field="id" 
												   data-text-field="name"></td>
						</tr>
						<tr>
							<td>សំរាប់ក្រុមហ៊ុន</td>
							<td><input type="text" data-role="combobox" 
												   data-bind="source: classes, value: class_id" 
												   data-value-field="id" 
												   data-text-field="name"></td>
						</tr>
						<tr>
							<td>Lat</td>
							<td><input type="text" data-bind="value: lat"></td>
						</tr>
						<tr>
							<td>Long</td>
							<td><input type="text" data-bind="value: long"></td>
						</tr>
						<tr>
							<td>រូបិយ​ប័ណ្ណ</td>
							<td><input type="text" data-role="combobox" 
												   data-bind="source: currencyVM.ds, value: currency"
												   data-value-field="code"
												   data-text-field="name"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="tab-pane" id="contact">
				<table class="table">
					<tbody>
						<tr>
							<td width="100">នាមត្រកូល</td>
							<td><input type="text" data-bind="value: lastName"></td>
						</tr>
						<tr>
							<td>ឈ្មោះ</td>
							<td><input type="text" data-bind="value: firstName"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" data-bind="value: email"></td>
						</tr>
						<tr>
							<td>Phone</td>
							<td><input type="text" data-bind="value: phone"></td>
						</tr>
						<tr>
							<td>អាសយដ្ឋាន</td>
							<td><input type="text" data-bind="value: address"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<button class="btn btn-primary" data-bind="click: addVendor">កត្រា</button> 
	</div>
</script>
<script type="text/x-kendo-template" id="vendorInfo">
	<div class="span12">
		<div class="row-fluid">
			<div class="span3">
				<a href="#" data-bind="click: getPO" class="widget-stats widget-stats-2 widget-stats-easy-pie widget-stats-primary">
					<div data-percent="23" class="easy-pie primary easyPieChart" style="width: 50px; height: 50px; line-height: 50px;"><span class="value">បញ្ជាទិញ</span><canvas width="50" height="50"></canvas></div>
					<span class="txt"><span class="count text-large inline-block" data-bind="text: poCount"></span> មិនទាន់ទទួល</span>
					<div class="clearfix"></div>
				</a>
			</div>
			<div class="span3">
				<a href="#" data-bind="click: doNothing" class="widget-stats widget-stats-2 widget-stats-easy-pie widget-stats-default">
					<div data-percent="23" class="easy-pie primary easyPieChart" style="width: 50px; height: 50px; line-height: 50px;"><span class="value">ចំណាយសរុបប្រចាំខែ</span><canvas width="50" height="50"></canvas></div>
					<span class="txt"><span class="count text-large inline-block" data-bind="text: getMonthlyExpense, events: {click: showMonthlyExpense}"></span></span>
					<div class="clearfix"></div>
				</a>
			</div>
			<div class="span3">
				<a href="#" data-bind="click: payTo" class="widget-stats widget-stats-2 widget-stats-easy-pie widget-stats-primary">
					<div data-percent="23" class="easy-pie primary easyPieChart" style="width: 50px; height: 50px; line-height: 50px;"><span class="value">វិក្កយប័ត្រ</span><canvas width="50" height="50"></canvas></div>
					<span class="txt"><span class="count text-large inline-block" data-bind="text: billCount"></span> មិនទាន់ទូទាត់</span>
					<div class="clearfix"></div>
				</a>
			</div>
			<div class="span3">
				<a href="#" data-bind="click: payTo" class="widget-stats widget-stats-2 widget-stats-easy-pie widget-stats-warning">
					<div data-percent="23" class="easy-pie primary easyPieChart" style="width: 50px; height: 50px; line-height: 50px;"><span class="value">វិក្កយប័ត្រ</span><canvas width="50" height="50"></canvas></div>
					<span class="txt"><span class="count text-large inline-block" data-bind="text: billOverDueCount"></span> ហួសកំណត់</span>
					<div class="clearfix"></div>
				</a>
			</div>
		</div>
		<div class="separator bottom"></div>
		<div class="row-fluid">
			<div class="span6">
				<a href="#" data-bind="click: doNothing" class="widget-stats widget-stats-4 widget-stats-easy-pie widget-stats-warning">
					<span class="txt">សមតុល្យចុងគ្រា</span>
					<span class="count" data-bind="text:getAmountOwed"></span>
					<span class="glyphicons cup"><i></i></span>
					<div class="clearfix"></div>
				</a>
			</div>
			<div class="span6">
				Graph
			</div>
		</div>
		<div id="vendorSingleDetail"></div>		
	</div>
</script>
<script id="vendorListTmpl" type="text/x-kendo-template">
	<tr><td>
		<div class="media-body">
			<span class="strong">
				#if(company === "") {#
					#=surname# #=name#
				# } else { #
					#=company#
				# } #
			</span>			
		</div>
	</td></tr>
</script>
<script type="text/x-kendo-template" id="vendorSingle">
	<div class="span12">
		<div class="row-fluid">
			<div class="span3">
				<a href="#" data-bind="click: getPO" data-bind="click: home" class="widget-stats widget-stats-2 widget-stats-easy-pie widget-stats-primary">
					<div data-percent="23" class="easy-pie primary easyPieChart" style="width: 50px; height: 50px; line-height: 50px;"><span class="value">បញ្ជាទិញ</span><canvas width="50" height="50"></canvas></div>
					<span class="txt"><span class="count text-large inline-block" data-bind="text: poCount"></span> មិនទាន់ទទួល</span>
					<div class="clearfix"></div>
				</a>
			</div>
			<div class="span3">
				<a href="#" data-bind="click: doNothing" class="widget-stats widget-stats-2 widget-stats-easy-pie widget-stats-default">
					<div data-percent="23" class="easy-pie primary easyPieChart" style="width: 50px; height: 50px; line-height: 50px;"><span class="value">ចំណាយសរុបប្រចាំខែ</span><canvas width="50" height="50"></canvas></div>
					<span class="txt"><span class="count text-large inline-block" data-bind="text: getMonthlyExpense, events: {click: showMonthlyExpense}}"></span></span>
					<div class="clearfix"></div>
				</a>
			</div>
			<div class="span3">
				<a href="#" data-bind="click: payTo" class="widget-stats widget-stats-2 widget-stats-easy-pie widget-stats-primary">
					<div data-percent="23" class="easy-pie primary easyPieChart" style="width: 50px; height: 50px; line-height: 50px;"><span class="value">វិក្កយប័ត្រ</span><canvas width="50" height="50"></canvas></div>
					<span class="txt"><span class="count text-large inline-block" data-bind="text: billCount"></span> មិនទាន់ទូទាត់</span>
					<div class="clearfix"></div>
				</a>
			</div>
			<div class="span3">
				<a href="#" data-bind="click: payOverDueTo" class="widget-stats widget-stats-2 widget-stats-easy-pie widget-stats-warning">
					<div data-percent="23" class="easy-pie primary easyPieChart" style="width: 50px; height: 50px; line-height: 50px;"><span class="value">វិក្កយប័ត្រ</span><canvas width="50" height="50"></canvas></div>
					<span class="txt"><span class="count text-large inline-block" data-bind="text: billOverDueCount"></span> ហួសកំណត់</span>
					<div class="clearfix"></div>
				</a>
			</div>
		</div>
		<div class="separator bottom"></div>
		<div class="row-fluid">
			<div class="span6">
				<a href="#"  data-bind="click: doNothing" class="widget-stats widget-stats-4 widget-stats-easy-pie widget-stats-warning">
					<span class="txt">សមតុល្យចុងគ្រា</span>
					<span class="count" data-bind="text:getAmountOwed"></span>
					<span class="glyphicons cup"><i></i></span>
					<div class="clearfix"></div>
				</a>
			</div>
			<div class="span6">
				Graph
			</div>
		</div>	
	</div>
	<div>
		<div class="navbar span12" data-bind="visible: showSubMenu">
			<div class="navbar-inner">
				<ul class="nav">
					<li><a href="#" data-bind="click: dashboard"><i class="icon-home"></i></a></li>
					<li><a href="#" data-bind="click: home">ព័តមានលំអិតអ្នកផ្គត់ផ្គង់</a></li>
					<li><a href="#" data-bind="click: payTo">ទូទាត់វិក្កយប័ត្រ</a></li>
					<li><a href="#" data-bind="click: getBillHistory">ប្រត្តិប័ត្រការណ៍</a></li>
				</ul>
				<ul class="nav pull-right">
					<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-plus"></i></a>
						<ul class="dropdown-menu">
							<li><a href="#purchase">ទិញ</a></li>
						    <li><a href="#expense">ចំណាយ</a></li>
						    <li><a href="#po">បញ្ជាទិញ</a></li>
						    <li><a href="#" data-bind="visible: supplyElectricity, events: {click: getElectric}">អគ្គីសនី</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>	
	<div id="vendorSingleDetail"></div>
</script>
<script type="text/x-kendo-template" id="supplierInformation">
	<h3 align="center">ព័តមានអ្នកផ្គត់ផ្គង់</h3>
	<br>
	<ul class="nav nav-tabs">
		<li class="active"><a href="#company" data-toggle="tab">ព័ត៌មានទូទៅ</a></li>
		<li><a href="#contact" data-toggle="tab">ព័ត៌មានទំនាគ់ទំនង</a></li>
	</ul>
	<div id="myVendorTab" class="tab-content">
		<div class="tab-pane active" id="company">
			<table class="table">
				<tbody>
					<tr>
						<td width="100">ឈ្មោះ</td>
						<td><input type="text" data-bind="value: current.company"></td>
					</tr>
					<tr>
						<td>ប្រភេទ</td>
						<td><input type="text" data-role="dropdownlist" data-bind="source: types, value: current.people_type_id" data-value-field="id" data-text-field="name"></td>
					</tr>
					<tr>
						<td>សំរាប់ក្រុមហ៊ុន</td>
						<td><input type="text" data-role="dropdownlist" data-bind="source: classes, value: current.class_id" data-value-field="id" data-text-field="name"></td>
					</tr>
					<tr>
						<td>តាមរយៈទទឹង​ (Lat)</td>
						<td><input type="text" data-bind="value: current.latitute"></td>
					</tr>
					<tr>
						<td>តាមរយៈបណ្ដោយ Long</td>
						<td><input type="text" data-bind="value: current.longtitute"></td>
					</tr>
					<tr>
						<td>រូបិយ​ប័ណ្ណ</td>
						<td><input type="text" data-role="dropdownlist" 
											   data-bind="source: currencyVM.ds, value: current.currency_code"
											   data-value-field="code"
											   data-text-field="name"
											   data-option-label="[{name:'Select One'}]"></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="tab-pane" id="contact">
			<table class="table">
				<tbody>
					<tr>
						<td width="100">នាមត្រកូល</td>
						<td><input type="text" data-bind="value: current.surname"></td>
					</tr>
					<tr>
						<td>ឈ្មោះ</td>
						<td><input type="text" data-bind="value: current.name"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" data-bind="value: current.email"></td>
					</tr>
					<tr>
						<td>Phone</td>
						<td><input type="text" data-bind="value: current.phone"></td>
					</tr>
					<tr>
						<td>អាសយដ្ឋាន</td>
						<td><input type="text" data-bind="value: current.address"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<button class="btn btn-primary" data-bind="click: updateVendor">កត្រា</button> 
	<button class="btn btn-primary" data-bind="click: removeVendor">លុប</button>
</script>
<script id="paybill" type="text/x-kendo-template">
	<div id="billHead" data-role="validator">
		<h3 align="center">ទូទាត់វិក្កយប័ត្រ</h3>
		<br>
		<table class="table">
			<tbody>
				<tr>
					<td>គណនីសាច់ប្រាក់:</td>
					<td><input type="text" placeholder="គណនីសាច់ប្រាក់" data-bind="source: cashAccounts, value: cashAccount" data-role="combobox" data-text-field="name" data-value-field="id" style="width: 220px;" required data-required-msg="You need to enter a URL" data-text-msg="This url is invalid"></td>
					<td>លេខសែក:</td>
					<td><input type="text" placeholder="បើប្រើសេកដើម្បីទូទាត់"></td>
				</tr>
				<tr>
					<td>កាលបរិច្ឆេទទូទាត់</td>
					<td><input type="text" placeholder="កាលបរិច្ឆេទ" data-bind="value: date" data-role="datepicker" style="width: 220px;"></td>
					<td>លេខសក្ខីបត្រ័</td>
					<td><input type="text" placeholder="ពិពណ៍នារួម" data-bind="value: voucher" style="width: 155px">-
						<input type="text" placeholder="000" data-bind="value: postFix" style="width: 30px" maxLength="3">
					</td>
				</tr>
				<tr>
					<td>Class</td>
					<td><input type="text" placeholder="រើសយក license" data-bind="source: classes, value: class_id" data-role="combobox" data-text-field="name" data-value-field="id" style="width: 220px;"></td>
					<td>ពិពណ៍នារួម</td>
					<td><input type="text" placeholder="ពិពណ៍នារួម" data-bind="value: memo"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: right">ចំនួនដែលត្រូវទូទាត់</td>
					<td><span  style="font-size:30px;" data-bind="text: totalAmount"></span></td>
				</tr>
			</tbody>
		</table>
	</div>

	<table class="table" id="bills">
		<thead>
			<tr>
				<th><i class="icon-ok"></i></th>
				<th width="100">កាលបរិច្ឆេទ</th>
				<th>លេខវិក្កយប័ត្រ</th>
				<th>ប្រភេទប្រត្តិបត្រការ</th>
				<th>ចំណាយជំពាក់</th>
				<th>ចំនួនត្រូវទូទាត់</th>
				<th width="110">សាច់ប្រាក់</th>
			</tr>
		</thead>
		<tbody data-role="listview" data-bind="source: openBills" data-template="billList"></tbody>
	</table>
	<button class="btn" data-bind="click: pay_bill">ទូទាត់បំណុលទាំងនេះ</button>
</script>
<script id="billList" type="text/x-kendo-template">
	<tr data-id="#=id#">
		<td><input type="checkbox" name="bill-#=id#" class="checkBox" data-id="#=id#" data-bind="click: tick"></td>
		<td>
			<span data-bind="text: date" data-format="{dd-MM-yyyy}"></span>
		</td>
		<td>
			#=number#
		</td>
		<td>
			<span data-bind="text: transaction_type"></span>
		</td>
		<td>
			<span data-bind="text:amount_billed" data-format="{0,C}"></span>
		</td>
		<td>
			#=kendo.toString(amount_due, "c")#
		</td>
		<td>
			<input type="text" data-bind="value: amount_pay, events: {change: onEnter}"  class="amount" style="width: 100px; margin-bottom: 0;" data-format="{0,'c2'}">
		</td>	
	</tr>
</script>
<script id="paymentReview" type="text/x-kendo-template">
	<button class="btn btn-primary pull-right" data-bind="click: closeX">X</button>
	<div id="billHead" data-role="validator">
		<h3 align="center">ទូទាត់វិក្កយប័ត្រ</h3>
		<br>
		<table class="table">
			<tbody>
				<tr>
					<td>គណនីសាច់ប្រាក់:</td>
					<td><input type="text" placeholder="គណនីសាច់ប្រាក់" data-bind="source: cashAccounts, value: cashAccount" data-role="combobox" data-text-field="name" data-value-field="id" style="width: 220px;" required data-required-msg="You need to enter a URL" data-text-msg="This url is invalid"></td>
					<td>លេខសែក:</td>
					<td><input type="text" placeholder="បើប្រើសេកដើម្បីទូទាត់"></td>
				</tr>
				<tr>
					<td>កាលបរិច្ឆេទទូទាត់</td>
					<td><input type="text" placeholder="កាលបរិច្ឆេទ" data-bind="value: date" data-role="datepicker" style="width: 220px;"></td>
					<td>លេខសក្ខីបត្រ័</td>
					<td><input type="text" placeholder="ពិពណ៍នារួម" data-bind="value: voucher" style="width: 155px">-
						<input type="text" placeholder="000" data-bind="value: postFix" style="width: 30px" maxLength="3">
					</td>
				</tr>
				<tr>
					<td>Class</td>
					<td><input type="text" placeholder="រើសយក license" data-bind="source: classes, value: class_id" data-role="combobox" data-text-field="name" data-value-field="id" style="width: 220px;"></td>
					<td>ពិពណ៍នារួម</td>
					<td><input type="text" placeholder="ពិពណ៍នារួម" data-bind="value: memo"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: right">ចំនួនដែលត្រូវទូទាត់</td>
					<td><span  style="font-size:30px;" data-bind="text: totalAmount"></span></td>
				</tr>
			</tbody>
		</table>
	</div>

	<table class="table" id="bills">
		<thead>
			<tr>
				<th width="100">កាលបរិច្ឆេទ</th>
				<th>លេខវិក្កយប័ត្រ</th>
				<th>នៅជំពាក់</th>
				<th>បានទូទាត់រួច</th>
			</tr>
		</thead>
		<tbody data-role="listview" data-bind="source: paymentItems" data-template="paymentReviewList"></tbody>
	</table>
	<button class="btn" data-bind="click: pay_bill" disabled>កែតំរូវ</button>
</script>
<script id="paymentReviewList" type="text/x-kendo-template">
	<tr data-id="#=id#">
		<td>
			<span data-bind="text: date" data-format="{dd-MM-yyyy}"></span>
		</td>
		<td>
			#=bills.number#
		</td>
		<td>
			#=bills.amount_due#
		</td>
		<td>
			#=kendo.toString(amount_paid, "c")#
		</td>	
	</tr>
</script>
<script id="vendorHistory" type="text/x-kendo-template">
	<div>
		<h3 align="center">ប្រត្តិប័ត្រការណ៍</h3>
		<br>
		<div id="vendorHistoryGrid"></div>
	</div>
</script>
<script id="billGrid" type="text/x-kendo-template">
	<tr data-bind="events: {dblclick: onChange}" data-id="#:id#">
		<td>
			#=kendo.toString(date, 'dd-MM-yyyy')#
		</td>
		<td>
			#if(transaction_type === 'pmt') {#
				#=transaction_type.toUpperCase()#
			#} else {#
				#=transaction_type.toUpperCase() #
			#}#
			
		</td>
		<td style="text-align: right">
			#=kendo.toString(parseFloat(amount_billed), "c2")#
		</td>
		<td style="text-align: right">
			#=kendo.toString(amount_due, "c2")#
		</td>
		<td style="text-align: right">
			#=kendo.toString(amount_paid, "c2")#
		</td>	
		<td>
			# var date = new Date(), due_date = new Date(dueDate).getTime(), toDay = new Date(date).getTime(); #
			#if(status === "0") {#
				#if(due_date < toDay) {#
					លើសកំណត់ #:Math.floor((toDay - due_date)/(1000*60*60*24))# ថ្ងៃ
				#} else {#
					#:Math.floor((due_date - toDay)/(1000*60*60*24))# ថ្ងៃនឹងត្រូវទូទាត់
				#}#
			#} else {#
				ទូទាត់រួច
			#}#
		</td>
		<td>
			# var url= null;#
			
			# if (transaction_type !== "purchase" && transaction_type !== "expense") { #	
				<a href="\\##=transaction_type#/#=id#"><i class="icon-eye-open"></i></a>
			#} else { #
				#if(status === 1) {#
					<a href="\\##=transaction_type#/#=id#"><i class="icon-eye-open"></i></a>
				#} else {#
					<a href="\\##=transaction_type#/#=id#"><i class="icon-eye-open"></i></a> | <a href="\\#">Pay</a>
				#}#	
			# } #
		</td>
	</tr>
</script>
<script id="eBill" type="text/x-kendo-template">
	<div id="electricity">
		
		<div class="well"><div class="pull-right"><button class="btn btn-primary" data-bind="click: closeX">X</button></div>
			<table class="table">
				<tbody>
					<tr>
						<td>លេខវិក្កយប័ត្រ</td>
						<td><input type="text" placeholder="លេខវិក្កយប័ត្រអ្នកផ្គត់ផ្គង់" 
											   data-bind="value: invoiceNumber" 
											   id="invoiceNumber" 
											   required data-required-msg="សូមវាយលេលខវិក្ក័យប័ត្រ"
											   name="invoiceNumber">
							<span class="k-invalid-msg" data-for="invoiceNumber"></span>
						</td>
						<td>លេខសក្ខីបត្រ័</td>
						<td><input type="text" placeholder="លេខសក្ខីបត្រ័ជំពាក់" data-bind="value: ref" id="referenceNumber"></td>
					</tr>
					<tr>
						<td>Class</td>
						<td><input type="text" placeholder="រើសយក license" 
											   data-bind="source: classes, value: class_id" 
											   data-role="combobox" data-text-field="name" 
											   data-value-field="id" style="width: 220px;"
											   required data-required-msg="សូមរើសយកClassមួយ។"
											   name="class">
							<span class="k-invalid-msg" data-for="class"></span>
						</td>
						<td>កាលបរិច្ឆេទកត់ត្រា:</td>
						<td><input type="text" placeholder="Enter Date" data-role="datepicker" data-bind="value: date" id="date" style="width: 220px;"></td>
					</tr>
					<tr>
						<td>គឺតចាប់ពីថ្ងៃទី</td>
						<td><input type="text" placeholder="ពី" data-role="datepicker" data-bind="value: billFrom" id="from" style="width: 220px;"></td>
						<td>លក្ខខណ្ឌទូទាត់:</td>
						<td><input type="text" placeholder="Payment Term" data-role="dropdownlist" data-bind="source: paymentTerms, value: paymentTerm" data-text-field="term" data-value-field="id" id="pmtTerm" style="width: 220px;"></td>
					</tr>
					<tr>
						<td>ដល់ថ្ងៃទី</td>
						<td><input type="text" placeholder="ដល់" data-role="datepicker" data-bind="value: billTo" id="to" style="width: 220px;"></td>
						<td>កាលបរិច្ឆេទទូទាត់:</td>
						<td><input type="text" placeholder="Enter Date" data-role="datepicker" data-bind="value: dateDue" id="due_date" style="width: 220px;"></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div id="transformerGrid" data-role="grid" 
								  data-bind="source: transformers" 
								  data-editable="true" 
								  data-navigatable="true"
								  data-row-template="transformerList" 
								  data-columns="[
								  	{title:'ត្រង់ស្វូ', width:'190px'},
								  	{title:'អំនានថ្មី'},
								  	{title:'អំនានចាស់'},
								  	{title:'មេគុណ'},
								  	{title:'តម្លៃ'},
								  	{title:'', width:'30px'}
								  ]"></div>
		<div>
		<i class="icon-plus" data-bind="click: addNew"></i>
			<p style="text-align: right; font-size: 30px; margin: 20px 0;">សរុប:<span data-bind="text: cTotal"></span></p>
		</div>
		<button class="btn pull-right" data-bind="click: record">កត់ត្រាវិក្កយបត្រនេះ</button>
	</div>
</script>
<script id="transformerList" type="text/x-kendo-template">
	<tr>
			<td>
				<select name="" id="" 
						placeholder="Select One" 
						data-role="combobox" 
						data-option-label="Select One" 
						data-bind="source: transformerDS, value: transformer_id, events: {change: change}" 
						data-text-field="transformerNumber" 
						data-value-field="id">
				</select>
			</td>
			<td>
				<input type="text" data-bind="value: new_reading" style="width: 80px; margin-top: 13px">
			</td>
			<td>
				<input type="text" data-bind="value: prev_reading" style="width: 80px; margin-top: 13px">
			</td>
			<td>
				<input type="text" data-bind="value: multiplier" style="width: 80px; margin-top: 13px">
			</td>
			<td>
				<input type="text" data-bind="value: tariff" style="width: 80px; margin-top: 13px">
			</td>
			<td>
				<i class="icon-trash" data-bind="click: remove"></i>
			</td>	
		</tr>
</script>
<script id="purchase" type="text/x-kendo-template">
	<div id="purchase-form">
		<button class="pull-right" data-bind="click:closeX">X</button>
		<div id="payment">
			<div class="btn-group">
				<button class="btn" data-bind="disabled: paidCash, click: cashBtn">ទិញជាសាច់ប្រាក់</button>
				<button class="btn" data-bind="enabled: paidCash, click: cashBtn">ទិញជំពាក់</button>
			</div>

			<div id="cashPayment" data-bind="visible: paidCash" class="well">
				<table class="table">
					<tbody>
						<tr>
							<td>គណនីសាច់ប្រាក់</td>
							<td><input type="text" placeholder="គណនីសាច់ប្រាក់" 
												   data-bind="source: cashAccts, value: cashAcct" 
												   data-role="combobox" 
												   data-text-field="name" 
												   data-value-field="id" style="width: 220px;"
												   name="cashAccount" 
												   required data-required-msg="សូមផ្ដល់លេខគណនីសាច់ប្រាក់">
								<span class="k-invalid-msg" data-for="cashAccount"></span>
							</td>
							<td>កាលបរិច្ឆេទកត់ត្រា</td>
							<td><input type="text" data-role="datepicker" placeholder="cash" data-bind="value: date" style="width: 220px;"></td>
						</tr>
						<tr>
							<td>វិធីទូទាត់</td>
							<td><input type="text" placeholder="វិធីទូទាត់" data-bind="source: paymentMethod, value: pmtMethod" data-role="combobox" data-text-field="method" data-value-field="id" style="width: 220px;"></td>
							<td>លេខសក្ខីបត្រ័</td>
							<td><input type="text" placeholder="លេខសក្ខីបត្រ័" data-bind="value: ref"></td>
						</tr>
						<tr>
							<td>លេខសែក</td>
							<td><input type="text" placeholder="លេខសែក" data-bind="value: checkNo"></td>
							<td>ពិពណ៍នារួម</td>
							<td><input type="text" placeholder="ពិពណ៍នាសម្រាបសាច់ប្រាក់" data-bind="value: memo"></td>
						</tr>
						<tr>
							<td>Class</td>
							<td><input type="text" placeholder="រើសយក license" data-bind="source: classes, value: class_id" data-role="combobox" data-text-field="name" data-value-field="id" style="width: 220px;"></td>
							<td>P.O</td>
							<td>
								<input data-role="dropdownlist"
					                   data-placeholder="ទាញពីបញ្ជាទិញ"				                   
					                   data-text-field="number"
					                   data-value-field="id"
					                   data-bind="value: po_id, source: poList, events:{ change: poChange }"
					                   style="width: 220px" />
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			
			<div id="creditPayment" data-bind="invisible: paidCash" class="well">
				<table class="table">
					<tbody>
						<tr>	
							<td>គណនីជំពាក់</td>
							<td><input type="text" placeholder="គណនីអ្នកផ្គត់ផ្គង់" 
												   data-bind="source: creditAccts, value: creditAcct" 
												   data-role="combobox" 
												   data-text-field="name" 
												   data-value-field="id" 
												   style="width: 220px;"
												   name="creditAccount" 
												   required data-required-msg="សូមផ្ដល់លេខគណនីជំពាក់">
								<span class="k-invalid-msg" data-for="creditAccount"></span>
							</td>
							<td>កាលបរិច្ឆេទកត់ត្រា</td>
							<td><input type="text" data-role="datepicker" placeholder="Date" data-bind="value: date" style="width: 220px;"></td>
						</tr>
						<tr>
							<td>វិធីទូទាត់</td>
							<td><input type="text" placeholder="វិធីទូទាត់" data-bind="source: terms, value: paymentTerm" data-role="combobox" data-text-field="term" data-value-field="id" style="width: 220px;"></td>
							<td>លេខសក្ខីបត្រ័</td>
							<td><input type="text" placeholder="លេខសក្ខីបត្រ័" data-bind="value: ref"></td>

						</tr>
						<tr>
							<td>ថ្ងៃត្រូវទូទាត់</td>
							<td><input type="text" data-role="datepicker" placeholder="Due Date" data-bind="value: due_date" style="width: 220px;"></td>
							<td>ពិពណ៍នារួម</td>
							<td><input type="text" placeholder="ពិពណ៍នាសម្រាប់គណនីជំពាក់" data-bind="value: memo"></td>
						</tr>
						<tr>
							<td>Class</td>
							<td><input type="text" placeholder="រើសយក license" data-bind="source: classes, value: class_id" data-role="combobox" data-text-field="name" data-value-field="id" style="width: 220px;"></td>
							<td>លេខវិក្កយប័ត្រ</td>
							<td><input type="text" placeholder="លេខវិក្កយប័ត្រអ្នកផ្គត់ផ្គង់" data-bind="value: invoiceNumber"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>P.O</td>
							<td>
								<input data-role="dropdownlist"
					                   data-placeholder="ទាញពីបញ្ជាទិញ"				                   
					                   data-text-field="number"
					                   data-value-field="id"
					                   data-bind="value: po_id, source: poList, events:{ change: poChange }"
					                   style="width: 220px" />
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<input type="text" data-role="combobox" 
				   placeholder="Choose currency" 
				   data-bind="source: currencyVM.ds, 
				   			  value: currency,
				   			  events: {change: currencyChange}" 
				   data-text-field="name" 
				   data-value-field="code">
			<div data-role="grid" 
				   data-bind="source: cart" 
				   data-row-template="cartTmpl" 
				   data-columns="[
						{title:'', width: '40px'}, 
						{title: 'ឈ្មោះសន្និធិ', width: '250px'}, 
						{title:'ពិពណ៏នា'}, 
						{title:'តំលៃ', width: '190px'}, 
						{title:'ចំនួន', width: '100px'}, 
						{title:'សរុប', width: '120px'},
						{title: 'ពន្ធ', width: '40px'}]"
				   data-change="taxable">
			</div>

			<button class="btn btn-inverse" data-bind="click: addToCart"><i class="icon-plus"></i></button>
			
			<table style="width: 100%;">
				<tbody>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr align="right">
						<td width="80%" colspan="6">សរុប:</td>
						<td style="font-size: 30px;margin: 20px 0;"><span data-bind="text: subTotal"></span></td>
					</tr>
					<tr align="right">
						<td width="80%" colspan="6"><input style="width:90px;" placeholder="រើសពន្ធ" type="text" 
														   data-role="combobox" 
														   data-bind="source: vatDS, value: vat, events: {change: taxable}" 
														   data-text-field="name"
														   data-value-field="id"> ពន្ធ:</td>
						<td style="font-size: 30px;margin: 20px 0;"><span data-bind="text: taxedAmount"></span></td>
					</tr>
					<tr align="right">
						<td width="80%" colspan="6">សរុបទាំងអស់:</td>
						<td style="font-size: 30px;margin: 20px 0;"><span data-bind="text: grandTotal"></span></td>
					</tr>
				</tbody>
			</table>
			
			<button class="btn btn-primary pull-right" data-bind="visible: showRecordBtn, events: {click: record}"><i class="icon-ok-sign"></i> កត់ត្រា</button>
			<button class="btn btn-primary pull-right" data-bind="invisible: showRecordBtn, events: {click: update}"><i class="icon-ok-sign"></i> កត់ត្រា</button>
		</div>
	</div>	
</script>
<script id="cartTmpl" type="text/x-kendo-template">
	<tr>
		<td style="padding-bottom: 1px;"><i class="icon-trash" data-bind="events: {click: remove, change: paidTax}"></i></td>
		<td style="padding-bottom: 1px;"><input type="text" style='width: 100%;' placeholder="Select One" data-bind="source: items, value: item_id, events: {change: change}" data-role="combobox" data-text-field="name" data-value-field="id" style="width: 130px;"></td>
		<td style="padding-bottom: 1px;"><input type="text" style='width: 100%;' placeholder="Description" style="width: 145px;" data-bind="value: description"></td>
		<td style="padding-bottom: 1px;"><input type="text" style="width: 100%;" data-bind="value: cost, events: {change: total, paidTax}"></td>
		<td style="padding-bottom: 1px;"><input type="text" style="width: 60px;" data-bind="value: quantity, events: {change: total, paidTax}"></td>
		<td style="padding-bottom: 1px;"><input type="text" data-bind="value: amount"></td>
		<td><input type="checkbox" data-bind="checked: taxed, events: {change: paidTax}"></td>
	</tr>
</script>
<script id="expense" type="text/x-kendo-template">
	<button class="pull-right" data-bind="click:closeX">X</button>
	<div id="payment">
		<div class="btn-group">
			<button class="btn" data-bind="disabled: paidCash, click: cashBtn">ចំណាយជាសាច់ប្រាក់</button>
			<button class="btn" data-bind="enabled: paidCash, click: cashBtn">ចំណាយជំពាក់</button>
		</div>
		<div id="cashPayment" data-bind="visible: paidCash" class="well">
			<table class="table">
				<tbody>
					<tr>
						<td>គណនីសាច់ប្រាក់</td>
						<td><input type="text" placeholder="គណនីសាច់ប្រាក់" data-bind="source: cashAccts, value: cashAcct" data-role="combobox" data-text-field="name" data-value-field="id" style="width: 220px;"></td>
						<td>កាលបរិច្ឆេទកត់ត្រា</td>
						<td><input type="text" data-role="datepicker" placeholder="cash" data-bind="value: date" style="width: 220px;"></td>
					</tr>
					<tr>
						<td>វិធីទូទាត់</td>
						<td><input type="text" placeholder="វិធីទូទាត់" data-bind="source: paymentMethod, value: pmtMethod" data-role="combobox" data-text-field="method" data-value-field="id" style="width: 220px;"></td>
						<td>លេខសក្ខីបត្រ័</td>
						<td><input type="text" placeholder="លេខសក្ខីបត្រ័" data-bind="value: ref"></td>
					</tr>
					<tr>
						<td>លេខសែក</td>
						<td><input type="text" placeholder="លេខសែក" data-bind="value: checkNo"></td>
						<td>ពិពណ៍នារួម</td>
						<td><input type="text" placeholder="ពិពណ៍នារួម" data-bind="value: memo"></td>
					</tr>
					<tr>
						<td>Class</td>
						<td><input type="text" placeholder="រើសយក license" data-bind="source: classes, value: class_id" data-role="combobox" data-text-field="name" data-value-field="id" style="width: 220px;"></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div id="creditPayment" data-bind="invisible: paidCash" class="well">
			<table class="table">
				<tbody>
					<tr>
						<td>គណនីជំពាក់</td>
						<td><input type="text" placeholder="គណនីជំពាក់" data-bind="source: creditAccts, value: creditAcct" data-role="combobox" data-text-field="name" data-value-field="id" style="width: 220px;"></td>
						<td>កាលបរិច្ឆេទកត់ត្រា</td>
						<td><input type="text" data-role="datepicker" placeholder="cash" data-bind="value: date" style="width: 220px;"></td>
					</tr>
					<tr>
						<td>វិធីទូទាត់</td>
						<td><input type="text" placeholder="វិធីទូទាត់" data-bind="source: paymentTerms, value: paymentTerm" data-role="combobox" data-text-field="term" data-value-field="id" style="width: 220px;"></td>
						<td>លេខសក្ខីបត្រ័</td>
						<td><input type="text" placeholder="លេខសក្ខីបត្រ័" data-bind="value: ref"></td>
					</tr>
					<tr>
						<td>ថ្ងៃត្រូវបង់ប្រាក់</td>
						<td><input type="text" data-role="datepicker" placeholder="Due Date" data-bind="value: dateDue" style="width: 220px;"></td>
						<td>ពិពណ៍នារួម</td>
						<td><input type="text" placeholder="ពិពណ៍នារួម" data-bind="value: memo"></td>
					</tr>
					<tr>
						<td>Class</td>
						<td><input type="text" placeholder="រើសយក license" data-bind="source: classes, value: class_id" data-role="combobox" data-text-field="name" data-value-field="id" style="width: 220px;"></td>
						<td>លេខវិក្កយប័ត្រ</td>
						<td><input type="text" placeholder="លេខវិក្កយប័ត្រ" data-bind="value: invoiceNumber"></td>
					</tr>
				</tbody>
			</table>
		</div>
		<hr>
		
		<div data-role="grid" data-bind="source: expenses" 
								data-row-template="expenseCart"
								data-columns="[
									{title:'', width:'50px'},
									{title:'គណនី', width: '200px'},
									{title:'ចំនួន', width: '160px'},
									{title:'ពិពណ៍នាសម្រាប់គណនី'},
									{title:'Class', width:'140px'},
									{title:'ពន្ធ',width:'40px'}
								]">
		</div>

		<button class="btn btn-inverse" data-bind="click: addToCart"><i class="icon-plus"></i></button>
		<table width="100%">
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr align="right">
				<td width="80%" colspan="6">សរុប:</td>
				<td style="font-size: 30px;margin: 20px 0;"><span data-bind="text: total"></span></td>
			</tr>
			<tr align="right">
				<td width="80%" colspan="6"><input style="width:90px;" placeholder="រើសពន្ធ" type="text" 
												   data-role="dropdownlist" 
												   data-bind="source: vatDS, value: vat, events: {change: taxable}" 
												   data-text-field="name"
												   data-value-field="id"> ពន្ធ:</td>
				<td style="font-size: 30px;margin: 20px 0;"><span data-bind="text: paidTax"></span></td>
			</tr>
			<tr align="right">
				<td width="80%" colspan="6">សរុបទាំងអស់:</td>
				<td style="font-size: 30px;margin: 20px 0;"><span data-bind="text: grandTotal"></span></td>
			</tr>
		</table><br>
		<button class="btn btn-primary pull-right" data-bind="click: record">កត់ត្រាប្រតិបត្តិការនេះ</button>
	</div>
</script>
<script id="expenseCart" type="text/x-kendo-template">
	<tr>
		<td><i class="icon-trash" data-bind="click: remove"></i></td>
		<td><input style="width: 100%" type="text" placeholder="Select One" data-bind="source: expenseAccts, value: account_id, events: {change: change}" data-role="combobox" data-text-field="name" data-value-field="id" style="width: 130px;"></td>
		<td><input style="width: 90%; padding-buttom: 0px;margin-top: 4px;" type="text" data-bind="value: amount" data-format="{0:c}"></td>
		<td><input style="width: 98%; padding-buttom: 0px;margin-top: 4px;" type="text" placeholder="Description" data-bind="value: memo"></td>
		<td><input style="width: 100%" type="text" placeholder="Select One" data-bind="source: classes, value: class_id" data-role="combobox" data-text-field="name" data-value-field="id" style="width: 130px;"></td>
		<td><input style="width: 20px" type="checkbox" data-bind="checked: taxed, events: {change: paidTax}"></td>
	</tr>	
</script>
<script type="text/x-kendo-template" id="vendorPayable">
	<table>
		<tr>
			<td width="150"><input type="date" value="" id="as_of_date"></td>
			<td><input type="text" id="classes" placeholder="រើសមួយ..." value=""></td>
			<td><button class="btn" id="search">មើលរបយាការណ៍</button></td>
		</tr>
	</table>
		<h3 style="text-align:center; color: blue">តារាងតាមដានបំណុលអ្នកផ្គត់ផ្គង់តាមលក្ខខណ្ឌ័ទូទាត់</h3>
		<h5 style="text-align:center">Payable Tracking Center</h5>
		<p style="text-align:center" id="dateTime">គិតត្រឹម <span id="asOfDate"></span></p>
		<table class="table" id="listview">
			<thead>
				<tr>
					<th width="300"></th>
					<th style="text-align: center">បច្ចុប្បន្ន</th>
					<th style="text-align: center">1-30</th>
					<th style="text-align: center">31-60</th>
					<th style="text-align: center">61-90</th>
					<th style="text-align: center">> 90</th>
					<th style="text-align: center">សមតុល្យសរុប</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
</script>
<script type="text/x-kendo-template" id="poTracking">
	<div>
		<h3>តារាងតាមដានបញ្ជាទិញ</h3>
	</div>
	<div id="poTrackerList"></div>
</script>
<script type="text/x-kendo-template" id="poTrackingList">
	<tr>
		<td>#=created_at#</td>
		<td>
			#:people_name.company !== "" ? people_name.company: people_name.surname + ' ' + vpeople_name.name #
		</td>
		<td>#=number#</td>
		<td>
			#=amount_billed#
		</td>
		<td>
			#if(grn === "0") {#
				<a href="\#po/#=id#/grn">ទទួលទំនិញ</a>
			#} else {#
				បានទទួលរួច
			#}#
		</td>
		<td>
			#if(grn !== "0") {#
				<a href="\\#po/#=id#/bill">ទទួលវិក្កយបត្រ</a>
			#} else {#
				ទទួលវិក្កយបត្រ
			#}#
		</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="aging_summary_report">
	<tr data-id="#:vendor_id#">
		<td>
			#if(vendor_company) {#
				#=vendor_company#
			#} else { #
			#=vendor_surname# #=vendor_name#
			#}#
		</td>
		<td style="text-align: right">#=kendo.toString(aging_report.current, 'c2')#</td>
		<td style="text-align: right">#=kendo.toString(aging_report.in_thirty, 'c2')#</td>
		<td style="text-align: right">#=kendo.toString(aging_report.in_sixty, 'c2')#</td>
		<td style="text-align: right">#=kendo.toString(aging_report.in_ninety, 'c2')#</td>
		<td style="text-align: right">#=kendo.toString(aging_report.over_ninety, 'c2')#</td>
		<td style="text-align: right">#=kendo.toString((aging_report.current+aging_report.in_thirty+aging_report.in_sixty+aging_report.in_ninety+aging_report.over_ninety), 'c2')#</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="balanceSheet">
	<div class="span8 offset2" id="main-container">
		<input type="date" value="" id="as_of_date" class="date">
		<input type="text" id="classes" placeholder="រើសមួយ..." value=""> 
		<button data-bind="click: getIncome" class="btn">មើលរបយាការណ៍</button>
		<h3 style="text-align:center">របាយការណ៍តារាងតុល្យការ</h3>
		<p style="text-align:center" id="dateTime">សម្រាប់ថ្ងៃ <span data-bind="text: date"></span></p>
		<table class="table" id="income">
			<thead>
				<tr>
					<th width="400">ទ្រព្យសកម្ម Assets</th>
					<th style="text-align: center">ចំនួន</th>
				</tr>
			</thead>
			<tbody data-role="listview" data-bind="source: assets" data-template="assetTmpl"></tbody>
			<tfoot>
				<tr class="info">
					<td style="text-align: right">សរុបទ្រព្យសកម្ម:</td>
					<td style="text-align: right"><strong><span data-bind="text: assetTotal"></span></strong></td>
				</tr>
			</tfoot>
		</table>

		<table class="table" id="listview">
			<thead>
				<tr>
					<th width="400">ទ្រព្យអកម្ម Liability</th>
					<th style="text-align: center">ចំនួន</th>
				</tr>
			</thead>
			<tbody data-role="listview" data-bind="source: liability" data-template="liabilityTmpl"></tbody>
			<tfoot>
				<tr>
					<td style="text-align: right">សរុបទ្រព្យអកម្ម:</td>
					<td style="text-align: right"><span data-bind="text: expenseTotal"></span></td>
				</tr>
			</tfoot>
		</table>

		<table class="table" id="listview">
			<thead>
				<tr>
					<th width="400">ទ្រព្យម្ចាស់មូលធន Equity</th>
					<th style="text-align: center">ចំនួន</th>
				</tr>
			</thead>
			<tbody data-role="listview" data-bind="source: equity" data-template="equityTmpl"></tbody>
			<tfoot>
				<tr>
					<td style="text-align: right">សរុបទ្រព្យម្ចាស់មូលធន:</td>
					<td style="text-align: right"><span data-bind="text: equityTotal"></span></td>
				</tr>
			</tfoot>
		</table>
		<table class="table">
			<tbody>
				<tr>
					<td width="400" style="text-align: right">សរុបទ្រព្យអកម្ម និង ទ្រព្យម្ចាស់មូលធន</td>
					<td style="text-align: right"><strong><span data-bind="text: net"></span></strong></td>
				</tr>
			</tbody>
		</table>	
	</div>
</script>
<script type="text/x-kendo-template" id="assetTmpl">	
	<tr>
		<td>#=name#</td>
		<td style="text-align: right">#=kendo.toString(parseFloat(amount), 'c2')#</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="liabilityTmpl">	
	<tr>
		<td>#=name#</td>
		<td style="text-align: right">#=kendo.toString(parseFloat(amount), 'c2')#</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="equityTmpl">	
	<tr>
		<td>#=name#</td>
		<td style="text-align: right">${kendo.toString(parseFloat(amount), 'c2')}</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="plReport">
	<div class="container">
		<div class="row">
			<div class="span10 offset1">
				<input type="date" value="" id="startDate" class="date">
				- <input type="date" value="" id="endDate" class="date">
				<input type="text" id="classes" placeholder="រើសមួយ..." value=""> 
				<button data-bind="click: get_income" class="btn">មើលរបយាការណ៍</button>
				<h3 style="text-align:center">របាយការណ៍លទ្ធផល</h3>
				<p style="text-align:center" id="dateTime">សម្រាប់រយពេលពី <span data-bind="text: from"></span> ដល់ <span data-bind="text: date"></span></p>
				<table class="table" id="income">
					<thead>
						<tr>
							<th width="400">ចំណូល</th>
							<th>ចំនួន</th>
						</tr>
					</thead>
					<tbody data-role="listview" data-bind="source: incomes" data-template="incomeTmpl"></tbody>
					<tfoot>
						<tr>
							<td style="text-align: right">សរុបចំណូល:</td>
							<td style="text-align: right"><span data-bind="text: incomeTotal"></span></td>
						</tr>
					</tfoot>
				</table>

				<table class="table" id="listview">
					<thead>
						<tr>
							<th width="400">ចំណាយ</th>
							<th>ចំនួន</th>
						</tr>
					</thead>
					<tbody data-role="listview" data-bind="source: expense" data-template="expenseTmpl"></tbody>
					<tfoot>
						<tr>
							<td style="text-align: right">សរុបចំណាយ</td>
							<td style="text-align: right"><span data-bind="text: expenseTotal"></span></td>
						</tr>
					</tfoot>
				</table>
				<table class="table">
					<tbody>
						<tr>
							<td width="400">ចំណេញ (ខាត) សុទ្ធ</td>
							<td style="text-align: right"><span data-bind="text: net"></span></td>
						</tr>
					</tbody>
				</table>
				
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-tmpl" id="incomeTmpl">	
	<tr>
		<td>#=name#</td>
		<td style="text-align: right">#=kendo.toString(parseFloat(amount), 'c2')#</td>
	</tr>
</script>
<script type="text/x-kendo-tmpl" id="expenseTmpl">	
	<tr>
		<td>#=name#</td>
		<td style="text-align: right">#=kendo.toString(parseFloat(amount), 'c2')#</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="journalReport">
	<div class="hidden-print" style="margin-left: 5px;">
		<input type="text" class="date" id="startDate">-
		<input type="text" class="date" id="endDate"> 
		<input type="text" id="classes" placeholder="រើសមួយ..." value=""> 
		<button class="btn" id="search">មើលរបយាការណ៍</button>
	</div>
	<div id="detail" style="text-align:center; height: 100px;">
		<h1>របាយការណ៍ទិន្នានុប្បវត្តិ</h1>
		សម្រាប់រយពេលពី <span data-bind="text: startDate"></span> ដល់ <span data-bind="text: endDate"></span>
	</div>
	
	<table id="transactions" class="table">
		<thead>
			<td>ប្រភេទប្រតិបត្តិការ</td>
			<td>កាលបរិច្ឆេទ</td>
			<td>ពិពណ៍នា</td>
			<td>គណនី</td>
			<td>ឥណពន្ធ (Dr.)</td>
			<td>ឥណទាន (Cr.)</td>
		</thead>
		<tbody></tbody>
	</table>
</script>
<script type="text/x-kendo-template" id="journal">
	<tr>
		<td><a href="<?php echo base_url();?>app\\##:transaction_type#/#: id #">#: number #</a></td>
		<td>#: created_at#</td>
		<td>
			# for(var i = 0; i<journalEntries.length; i++) { # 
				#: journalEntries[i].memo # <br>
			# } #
		</td>
		<td>
			# for(var i = 0; i<journalEntries.length; i++) { # 
				#: journalEntries[i].account.code # &mdash; #: journalEntries[i].account.name # <br>
			# } #	
		</td>
		<td style="text-align: right">
			# var x = 0; #
			# for(var i = 0; i<journalEntries.length; i++) { # 
				# if(journalEntries[i].dr > 0.00) { #
					# x += parseFloat(journalEntries[i].dr); #
					#:kendo.toString(parseFloat(journalEntries[i].dr), 'c2') #
				# } # <br>
			# } #
			<div style="border-top: 1px solid black">
			<strong>#: kendo.toString(x, 'c2') #</strong>
			</div>
		</td>
		<td style="text-align: right">
			# var x = 0; #
			# for(var i = 0; i<journalEntries.length; i++) { # 
				# if(journalEntries[i].cr > 0.00) { #
					# x += parseFloat(journalEntries[i].cr); #
					#:kendo.toString(parseFloat(journalEntries[i].cr), 'c') #
				# } # <br>
			# } #
			<div style="border-top: 1px solid black">
			<strong>#: kendo.toString(x, 'c2') #</strong>
			</div>	
		</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="glReport">
	<div class="span12">
		<div class="hidden-print" style="margin-left: 5px;">
			<input type="text" class="date" id="startDate">-
			<input type="text" class="date" id="endDate"> 
			<input type="text" id="classes" placeholder="រើសមួយ..." value=""> 
			<button class="btn" id="search">មើលរបាយការណ៍</button>
		</div>
		<br>
		<div id="detail" style="text-align:center; height: 100px;">
			<h1>របាយការណ៍លំអិតតាមគណនី</h1>
			<h4>General Ledger</h4>
			ចាប់ពី <span id="glStartDate"></span> ដល់ <span id="glEndDate"></span>
		</div>
		
		<table id="transactions" class="table">
			<thead>
				<th width="150">ប្រភេទប្រតិបត្តិការ</th>
				<th>កាលបរិច្ឆេទ</th>
				<th width="300">ពិពណ៍នា</th>
				<th>ឥណពន្ធ Dr.</th>
				<th>ឥណទាន Cr.</th>
				<th>សមតុល្យ</th>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</script>
<script type="text/x-kendo-template" id="gl">
	<tr>
		<td colspan="6">គណនី #: ledger.code #&mdash;#:ledger.name#</td>
	</tr>
	#var totalDr = 0, totalCr = 0;#
	#if( transactions !== null ) {#
		#for(var i= 0; i< transactions.length; i++) {#
			# totalDr += parseFloat(transactions[i].dr); #
			# totalCr += parseFloat(transactions[i].cr); #
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;#: transactions[i].tranDescription#</td>
				<td>#= transactions[i].date #</td>
				<td>#= transactions[i].memo #</td>
				<td style="text-align: right">#= kendo.toString(parseFloat(transactions[i].dr), "c2") #</td>
				<td style="text-align: right">#= kendo.toString(parseFloat(transactions[i].cr), 'c2') #</td>
				<td style="text-align: right">#= kendo.toString(parseFloat(transactions[i].balance), 'c2') #</td>
			</tr>
		#}#
		<tr class="error">
			<td></td>
			<td></td>
			<td>សរុប</td>
			<td style="text-align: right">#=kendo.toString(totalDr, "c2")#</td>
			<td style="text-align: right">#=kendo.toString(totalCr, "c2")#</td>
			<td style="text-align: right">#= kendo.toString(parseFloat(transactions[transactions.length-1].balance), 'c2') #</td>
		</tr>
	#}#	
</script>
<script type="text/x-kendo-template" id="reports">
	<div  class="row-fluid">
		<div class="span3">
			<h3>Accounting</h3>
			<a href="\\#" data-bind="click: balanceSheet">តារាងតុល្យការ</a><br>
			<a href="\\#" data-bind="click: journal">ទិន្នានុប្បវត្តិ</a><br>
			<a href="\\#" data-bind="click: generalLedger">លំអិតតាមគណនី</a><br>
			<a href="\\#" data-bind="click: pl">របាយការណ៍លទ្ធិផល</a>
		</div>
		<div class="span3">
			<h3>Vendors</h3>
			<a href="\\#" data-bind="click: vendorAging">តារាងតាមដានបំនុល</a><br>
			<a href="\\#">តារាងតាមដានបញ្ជាទិញ</a><br>
		</div>
		<div class="span3">
			<h3>Customers</h3>
			<div class="row">
				<div class="span3">
					fsdfsd
				</div>
				<div class="span3">
					rtyrty
				</div>
			</div>
		</div>
		<div class="span3">
			<h3>Inventory</h3>
			<div class="row">
				<div class="span3">
					fsdfsd
				</div>
				<div class="span3">
					rtyrty
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-tmpl" id="transformer">
	<div class="widget widget-heading-simple widget-body-gray widget-employees">			
		<!-- Widget Heading -->
		<!-- <div class="widget-head">
			<h4 class="heading glyphicons user"><i></i>ទំព័រអគ្គីសនី</h4>
		</div> -->
		<!-- // Widget Heading END -->		
		<div class="widget-body padding-none">	
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" style="height: 730px;">
					<div class="innerAll">
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" id="search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" value="" placeholder="ស្វែងរកត្រងស្វូ" id="searchField">
								</div>
							</div>
							<div class="select2-container" style="width: 100%;">
								<div class="overflow-hidden">
									<select name="" id="searchOptions" style="width: 100%;" tabindex="-1">
										<option value="class_id">Class</option>
						                <option value="name">ឈ្មោះ</option>
									</select>
								</div>
							</div>
						</form>
					</div>
					<span class="results"></span>
					<ul class="list unstyled" id="transformers" style="height: 510px;"></ul>
				</div>
				<div class="span9 detailsWrapper">
					<div class="innerLR">
						<div class="navbar">
							<div class="navbar-inner">
								<ul class="nav">
									<li><a href="#/create">ថែមត្រង់ស្វូថ្មី</a></li>									
								</ul>
							</div>
						</div>
					</div>	
					<div class="innerAll" id="main-contents">
						<div id="info"></div>
						<div id="detail"></div>
					</div>
					
				</div>
			</div>	
		</div>
	</div>
</script>
<script id="transformersList" type="text/x-kendo-template">
	<li class="">
		<div class="media innerAll">
			<div class="media-object pull-left thumb hidden-phone"><img data-src="holder.js/51x51/dark" alt="51x51" style="width: 51px; height: 51px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADMAAAAzCAYAAAA6oTAqAAACAUlEQVRoQ+2Yv8upcRjGrxdFDEZKBmWxSIlFIgmRwSbl/6MUNkWUwSgZDAYxKEQMisGP0/c76NTRebl17t5O91PP4nku131dn++9PF+JROKO/+T6kjA/lKSQ+aFgIGSEDEMDcswYSiZZCBlSbQwiIcNQMslCyJBqYxAJGYaSSRZChlQbg0jIMJRMsiCRsVqt8Pv9uN1uMJlMWC6XWCwWeoBwOIzD4YDpdPp0oE+03yUkhXG73cjlcrhcLjrMZDLBcDhEJBKBx+PBfD5Hq9V66v2J9p+E8Xq9iEajqNfrOJ/P+nY6nUilUrBYLJjNZuh0Okgmk3A4HGg0GshkMjidTprYK9rvBn/2nEQmFovB5/M9/q/f72s66ioWi9jtdmi327DZbCiVSjAajfpIVqtVBAKBl7RsYex2uyaw2Wz0sMfjEc1m848w6odQKIRgMIjxeIzBYIB3tO8GIpHJ5/O4Xq/odruaxGq1euzI72TMZjPK5bLeK/V+pVJBPB5/SftuEPU+KYxa8nQ6rf3UkGp3ttvtg8x6vUav10M2m4XL5UKtVkOhUMB+v8doNHpJyxZGGRkMBr0T6ojd7+99e/9E+7eQJDKU1jg0EoajZYqHkKG0xqERMhwtUzyEDKU1Do2Q4WiZ4iFkKK1xaIQMR8sUDyFDaY1DI2Q4WqZ4CBlKaxyaXyM+XIKj6S59AAAAAElFTkSuQmCC"></div>
			<div class="media-body">
				<span class="strong">#=transformerNumber#</span>
				<span class="muted">#=license.name#</span>
				<span class="muted"></span>
				
			</div>
		</div>
	</li>
</script>
<script id="createView" type="text/x-kendo-template">
	<div class="well" id="create">
		<div class="row">
			<div class="span4">
				<label for="license">អាជ្ញាប័ណ្ណ៖ (ត្រូវការ)</label>
				<input type="text" id="license" name="license" data-role="dropdownlist" 
															   data-bind="source: classes, value: license" 
															   data-text-field="name" 
															   data-value-field="id" 
															   placeholder="Select One" 
															   style="width:220px;margin-bottom:11px;" required 
															   data-required-msg="YOu need this!">
				<label for="license">អ្នកផ្គត់ផ្គង់៖ (ត្រូវការ)</label>
				<input type="text" id="license" name="vendor" data-role="dropdownlist" 
															   data-bind="source: vendors, value: vendor" 
															   data-text-field="name" 
															   data-value-field="id" 
															   placeholder="Select One" 
															   style="width:220px;margin-bottom:11px;" required 
															   data-required-msg="YOu need this!">
				<label for="transformer">ឈ្មោះត្រងស្វូ៖ (ត្រូវការ)</label>
				<input type="text" data-bind="value: transformer">
				<label for="tranformerType">ប្រភេទ៖ (ត្រូវការ)</label>
				<input type="text" data-bind="value: transformerType">
				<label for="brand">ម៉ាក៖ (ត្រូវការ)</label>
				<input type="text" data-bind="value: brand">
			</div>
			<div class="span1"></div>
			<div class="span4">
				<label for="capacity">អនុភាព៖ (ត្រូវការ)</label>
				<input type="text" data-bind="value: capacity">
				<label for="location">ទីតាំង៖ (ត្រូវការ)</label>
				<input type="text" data-bind="value: location">
				<label for="latitute">រយះបណ្ដោយ៖</label>
				<input type="text" data-bind="value: latitute">
				<label for="longtitute">រយះទទឹង៖</label>
				<input type="text" data-bind="value: longtitute">
			</div>
		</div>
	</div>
	<div class="table" data-role="grid" data-bind="source: attributes.items" data-row-template="attributeList" 
		data-columns="[{title: 'ព៌ណនា៖'},{title: 'អនុភាព៖'},{title: 'ប្រភេទ៖'},{title: 'ចំនួន៖'}]">
	</div>
	<p></p>
	<button class="btn btn-primary" data-bind="click: record, visible: isCreating">Record</button>
	<button class="btn btn-primary" data-bind="click: update, invisible: isCreating">Update</button>&nbsp;
	<button class="btn" data-bind="click: reset">Reset</button>	
</script>
<script id="attributeList" type="text/x-kendo-template">
	<tr>
		<td>#=discription#</td>
		<td><input type="text" data-bind="value: capacity" placeholder="50KVA" style="width: 140px;"></td>
		<td><input type="text" data-bind="value: type" style="width: 140px;"></td>
		<td><input type="text" data-bind="value: unit" style="width: 140px;"></td>
	</tr>
</script>
<script id="informationView" type="text/x-kendo-template">
	<div class="title">
		<div class="row-fluid">
			<div class="span12">
				<div class="pull-right">
					<a class="btn" href="#Electricity"><i class="icon-home"></i></a>
					<button class="btn" data-bind="click: viewBtn, disabled: isDisabled"><i class="icon-eye-open"></i> របាយការណ៍ទិញថាមពល</button>
				  	<button class="btn" data-bind="click: updateBtn, disabled: isDisabled"><i class="icon-edit"></i> កែប្រែ</button>
				  	<button class="btn" data-bind="click: deleteBtn, disabled: isDisabled"><i class="icon-trash"></i> លុប</button>
				</div>
			</div>
			<div class="span4">
				<h4 class="text-primary">ត្រងស្វូ <i data-bind="text: current.transformerNumber"></i></h4>	
				<ul>
					<li>ម៉ាក <span data-bind="text: current.brand"></span></li>
					<li>ប្រភេទ <span data-bind="text: current.type"></span></li>
					<li>អនុភាព <span data-bind="text: current.capacity"></span> KVA</li>
					<li>តំបន់ <span data-bind="text: current.location"></span></li>
				</ul>
			</div>
			<div class="span7">
				<div class="chart" data-role="chart" data-bind="source:current.saleHistory"
									  data-legend="{position: 'bottom'}"
									  data-series="[
									  				{ type: 'line', field: 'usage', name: 'ការប្រើប្រាស់ប្រចាំខែ'},
									  				{ type: 'column', field: 'usage', name: 'ការប្រើប្រាស់ប្រចាំខែ'}
									  			   ]"
									  data-category-Axis="{field: 'month', labels: {rotation: 0}}"
									  data-value-Axis="{labels: {format: '0'}, 
									  					min:0, max: 1000, 
									  					majorUnit: 200,
									  					majorGridLines: { width: 1 }
									  					}"
									  data-tooltip="{visible: true, format: 'NO'}">
				</div>
			</div>
		</div>
	</div>
</script>
<script id="detailView" type="text/x-kendo-template">
	<table class="table table-primary">
		<thead>
			<tr class="info">
				<th>ព៌ណនា</th>
				<th>អនុភាព</th>
				<th>ប្រភេទ</th>
				<th>ចំនួន</th>
			</tr>
		</thead>
		<tbody data-role="listview" data-bind="source: current.attributes" data-template="list">
		</tbody>
	</table>
</script>
<script type="text/x-kendo-template" id="list">
	<tr>
		<td>#=discription#</td>
		<td>#=capacity#</td>
		<td>#=type#</td>
		<td>#=unit#</td>
	</tr>
</script>
<script id="blank" type="text/x-kendo-template">
	<div></div>
</script>
<script type="text/x-kendo-template" id="electricityReport">
	<div class="row-fluid">    
		<div class="span12">
			<div id="example" class="k-content">				
				<div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row-fluid row-merge widget-tabs-gray">
				
				    <!-- Tabs Heading -->
				    <div class="widget-head span3 hidden-print">
				        <ul>
				            <li class="active"><a href="#tab1-1" class="glyphicons user" data-toggle="tab"><i></i><span class="strong">Step 1</span><span>មធ្យោបាយផលិតកម្ម</span></a>
				            </li>
				            <li><a href="#tab2-1" class="glyphicons calculator" data-toggle="tab"><i></i><span class="strong">Step 2</span><span>ថាមពលផលិត</span></a>
				            </li>
				            <li><a href="#tab3-1" class="glyphicons credit_card" data-toggle="tab"><i></i><span class="strong">Step 3</span><span>មធ្យោបាយចែកចាយ</span></a>
				            </li>
				            <li><a href="#tab4-1" class="glyphicons circle_ok" data-toggle="tab"><i></i><span class="strong">Step 4</span><span>ព័ត៌មានលម្អិតតាមតរង់ស្វូ</span></a>
				            </li>
				            <li><a href="#tab5-1" class="glyphicons circle_ok" data-toggle="tab"><i></i><span class="strong">Step 5</span><span>ព័ត៌មានពំពីអតិថិជនជាអ្នកប្រើប្រាស់ផ្ទាល់</span></a>
				            </li>
				            <li><a href="#tab6-1" class="glyphicons circle_ok" data-toggle="tab"><i></i><span class="strong">Step 6</span><span>អតិថិជនកាន់អាជ្ញាប័ណ្ណ</span></a>
				            </li>
				            <li><a href="#tab7-1" class="glyphicons circle_ok" data-toggle="tab"><i></i><span class="strong">Step 7</span><span>ព័ត៌មានការលក់ថាមពលអោយអ្នកប្រើប្រាស់ផ្ទាល់</span></a>
				            </li>
				            <li><a href="#tab8-1" class="glyphicons circle_ok" data-toggle="tab"><i></i><span class="strong">Step 8</span><span>ព័ត៌មានថាមពលលក់អោយអ្នកកាន់អាជ្ញាប័ណ្ណ</span></a>
				            </li>
				            <li><a href="#tab9-1" class="glyphicons circle_ok" data-toggle="tab"><i></i><span class="strong">Step 9</span><span>ព័ត៌មានប្រភពទិញថាមពល</span></a>
				            </li>
				            <li><a href="#tab10-1" class="glyphicons circle_ok" data-toggle="tab"><i></i><span class="strong">Step 10</span><span>ព័ត៌មានអំពីការទិញថាមពល</span></a>
				            </li>
				            <li><a href="#tab11-1" class="glyphicons circle_ok" data-toggle="tab"><i></i><span class="strong">Step 11</span><span>តំបន់ចែកចាយក្នុងអាជ្ញាប័ណ្ណ</span></a>
				            </li>
				        </ul>
				    </div>
				    <!-- // Tabs Heading END -->

				    <div class="widget-body span9">
				        <div class="tab-content">

				            <!-- Tab content -->
				            <div class="tab-pane active" id="tab1-1">
				                <h4>មធ្យោបាយផលិតកម្ម</h4>
				                <div id="generationFacility"></div>
				            </div>
				            <!-- // Tab content END -->

				            <!-- Tab content -->
				            <div class="tab-pane" id="tab2-1">
				                <h4>dsfds</h4>	
				                <div id="generatorRecords"></div>
				            </div>
				            <!-- // Tab content END -->

				            <!-- Tab content -->
				            <div class="tab-pane" id="tab3-1">
				                <h4>មធ្យោបាយចែកចាយ</h4>
				                	<table class="table table-condensed table-hover" id="distribution">
										<thead>
											<tr>
												<th width="120">មធ្យោបាយចែកចាយ</th>
												<th>តង់ស្យុងផ្គត់ផ្គង់(kV)</th>
												<th>ចំនួនហ្វា</th>
												<th>ប្រវែងខ្សែ(សៀគ្វីម៉ែត្រ)</th>
												<th>ថ្ងៃចាប់ផ្ដើមប្រើ</th>
												<th>ថ្ងៃឈប់ប្រើ</th>
												<th width="35"></th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
				            </div>
				            <!-- // Tab content END -->

				            <!-- Tab content -->
				            <div class="tab-pane" id="tab4-1">
				                <h4>ព័ត៌មានលម្អិតតាមតរង់ស្វូ</h4>
				                <table id="transformers">
				                	<tbody></tbody>
				                </table>
				            </div>
				            <!-- // Tab content END -->

				            <!-- Tab content -->
				            <div class="tab-pane" id="tab5-1">
				                <h4>5 tab</h4>
				                <div id="customerSegment"></div>
				            </div>
				            <!-- // Tab content END -->

							<!-- Tab content -->
				            <div class="tab-pane" id="tab6-1">
				                <h4 class="printTitle">ព័ត៌មានអំពីអតិថិជនជាអ្នកកាន់អាជ្ញាប័ណ្ណ</h4>
				                <button class="btn btn-primary" id="addNewReseller">New</button>
								<div id="resellerGrid"></div>
				                <div id="resellerCreate">
				                	
				                	<label for="">អាជ្ញាប័ណ្ណ</label>
									<input type="text" data-bind="value: license_no">
									<label for="">អតិថិជន</label>
									<input type="text" data-role="dropdownlist" data-bind="source: customers, value: licensee_id"
									   				   data-text-field="name"
									   				   data-value-field="id"
									   				   data-option-label="--រើសយមកមួយ--">	
									<label for="">ឈ្មោះអាជ្ញាប័ណ្ណ</label>
									<input type="text" data-bind="value: licensee_name">
									<label for="">ទីតាំង</label>
									<input type="text" data-bind="value: location">
									<label for="">តង់ស្យុង</label>
									<input type="text" data-bind="value: voltage">
									<label for="">បញ្ជីថ្លៃលក់</label>
									<input type="text" data-bind="value: price"><br>
									<label for="">ចំនួនតភ្ជាប់</label>
									<input type="text" data-bind="value: connection_no"><br>
									<button class="btn btn-primary" data-bind="click: update, invisible: isShown">កែ</button>
									<button class="btn btn-primary" data-bind="click: save, visible: isShown">រក្សាទុក</button>
								</div>
				            </div>
				            <!-- // Tab content END -->

				            <!-- Tab content -->
				            <div class="tab-pane" id="tab7-1">
				                <h4>7 tab</h4>
				                
				            </div>
				            <!-- // Tab content END -->

				            <!-- Tab content -->
				            <div class="tab-pane" id="tab8-1">
				                <h4>8 tab</h4>
				                
				            </div>
							<!-- // Tab content END -->

				            <!-- Tab content -->
				            <div class="tab-pane" id="tab9-1">
				                <h4>ប្រភពទិញថាមពល</h4>
				                <table class="table" id="energySourcePurchased">
									<tbody></tbody>
								</table>
				            </div>
				            <!-- // Tab content END -->

				            <!-- Tab content -->
				            <div class="tab-pane" id="tab10-1">
				                <h4>ប្រភពទិញថាមពល</h4>
				                <table class="table" id="energyPurchased">
									<tbody></tbody>
								</table>
				            </div>
				            <!-- // Tab content END -->

				            <!-- Tab content -->
				            <div class="tab-pane" id="tab11-1">
				                <h4>11</h4>
				                <div id="distributionAreas"></div>
				            </div>
				            <!-- // Tab content END -->
				            
				        </div>

				    </div>
				</div>	

			</div> <!--end div example-->            
		</div> <!--End div span12-->		
	</div> <!--End div row-fluid-->
</script>
<script type="text/x-kendo-template" id="distributionTmpl">
	<h2 class="printTitle" style="text-align:center;">ព័ត៌មានអំពីអតិថិជនជាអ្នកកាន់អាជ្ញាប័ណ្ណ</h2>
</script>
<script type="text/x-kendo-template" id="powerTmpl">
	<h2 class="printTitle" style="text-align:center;">ព័ត៌មានអំពីអតិថិជនជាអ្នកកាន់អាជ្ញាប័ណ្ណ</h2>
	<p>Power</p>
</script>
<script type="text/x-kendo-template" id="tranTmpl">
	<h2 class="printTitle" style="text-align:center;">ព័ត៌មានអំពីអតិថិជនជាអ្នកកាន់អាជ្ញាប័ណ្ណ</h2>
	<p>transformer</p>
</script>
<script type="text/x-kendo-template" id="licenseeListTmpl">
	<tr>
		<td>#=license_no#</span></td>
		<td>#=licensee_name#</td>
		<td>#=customer.customer_no#</td>
		<td>#=location#</td>
		<td>#=voltage#</td>
		<td>#=price#</td>
		<td>#=connection_no#</td>
		<td>
			<div class="edit-buttons">
                <a class="k-edit-button" href="\\#"><i class="icon-edit"></i></a>
                <a class="k-delete-button" href="\\#"><i class="icon-trash"></i></a>
            </div>
		</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="editLicenseeListTmpl">
	<tr>
		<td><input type="text" data-bind="value: license_no"></span></td>
		<td>#=licensee_name#</td>
		<td>#=customer.name#</td>
		<td>#=location#</td>
		<td>#=voltage#</td>
		<td>#=price#</td>
		<td>#=connection_no#</td>
		<td>
            <div class="edit-buttons">
                <a class="k-update-button" href="\\#"><i class="icon-check"></i></a>
                <a class="k-cancel-button" href="\\#"><i class="icon-remove"></i></a>
            </div>
		</td>
	</tr>
</script>

<script type="text/x-kendo-template" id="distributionListTmpl">
	<tr>
		<td>#=line#</td>
		<td>#=voltage#kV</td>
		<td>#=phases#</td>
		<td>#=line_length#</td>
		<td>#=date_using#</td>
		<td>#=date_stopped#</td>
		<td>
			<div class="edit-buttons">
                <a class="k-edit-button" href="\\#"><i class="icon-edit"></i></a>
                <a class="k-delete-button" href="\\#"><i class="icon-trash"></i></a>
            </div>
		</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="editdistributionListTmpl">
	<tr>
		<td>#=line#</td>
		<td>#=voltage#kV</td>
		<td>#=phases#</td>
		<td>#=line_length#</td>
		<td>#=date_using#</td>
		<td>#=date_stopped#</td>
		<td>
			<div class="edit-buttons">
                <a class="k-update-button" href="\\#"><i class="icon-check"></i></a>
                <a class="k-cancel-button" href="\\#"><i class="icon-remove"></i></a>
            </div>
		</td>
	</tr>
</script>

<script type="text/x-kendo-template" id="transformerListTmpl">
	<tr>
		<td>#=line#</td>
		<td>#=voltage#kV</td>
		<td>#=phases#</td>
		<td>#=line_length#</td>
		<td>#=date_using#</td>
		<td>#=date_stopped#</td>
		<td>
			<div class="edit-buttons">
                <a class="k-edit-button" href="\\#"><i class="icon-edit"></i></a>
                <a class="k-delete-button" href="\\#"><i class="icon-trash"></i></a>
            </div>
		</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="editTransformerListTmpl">
	
</script>

<script type="text/x-kendo-template" id="purchaseListTmpl">
	<tr>
		<td>#=created_at#</td>
		<td>#=vendor.surname# #=vendor.name#</td>
		# var amount = 0; #
		# for(var i=0; i<records.length; i++) { #
			# amount += (records[i].new_reading - records[i].prev_reading); #
		# } #
		<td>#= amount #</td>
		<td>#=price#</td>
		<td>#=kendo.toString((amount*price), 'c2')#</td>
	</tr>
</script>

<script type="text/x-kendo-template" id="distributionAreaListTmpl">	
</script>

<script id="companyList" type="text/x-kendo-template">
	<div class="row-fluid">    
		<div class="span12">
			<div id="example" class="k-content">			

				<div class="relativeWrap" data-toggle="source-code" style="overflow: visible;">
					<div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row-fluid row-merge widget-tabs-gray">						
						<div class="widget-body span12">
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
</script>
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
<script id="userList" type="text/x-kendo-template">
	<div class="row-fluid">    
		<div class="span12">
			<div id="example" class="k-content">			

				<div class="relativeWrap" data-toggle="source-code" style="overflow: visible;">
					<div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row-fluid row-merge widget-tabs-gray">
						<div class="widget-body span12">
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
</script>

<script type="text/x-kendo-template" id="accounting">
	<div class="widget widget-heading-simple widget-body-gray widget-employees">	
		<div class="widget-body padding-none">	
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" style="height: 730px;">
					<div class="innerAll">
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" id="search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" value="" placeholder="ស្វែងរក" id="searchField">
								</div>
							</div>
							<div class="select2-container" style="width: 100%;">
								<div class="overflow-hidden">
									<select name="" id="searchOptions" style="width: 100%;" tabindex="-1">
										<option value="code">លេខកូដ</option>
						                <option value="name">ឈ្មោះ</option>
									</select>
								</div>
							</div>
							<!-- <div class="select2-container" id="s2id_autogen2" style="width: 100%;">
								<a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   
									<span>Design</span><abbr class="select2-search-choice-close" style="display:none;"></abbr>   
									<div><b></b></div></a><input class="select2-focusser select2-offscreen" type="text"></div>
									<select style="width: 100%;" class="select2-offscreen" tabindex="-1">
						               <optgroup label="Department">
						                   <option value="design">Design</option>
						                   <option value="development">Development</option>
						               </optgroup>
									</select> -->
						</form>
					</div>
					<div class="table table-condensed" id="acctGrid" style="height: 625px;"></div>
				</div>
				<div class="span9 detailsWrapper">
					<div class="innerLR">															
						<div class="navbar">
							<div class="navbar-inner">
								<ul class="nav">
									<li><a href="#"><i class="icon-home"></i></a></li>
							        <li>
							            <a href="#" data-bind="click: newBtn">
							            	បង្កើតថ្មី
							            </a>
							        </li>							        
								</ul>
							</div>
						</div>								
					</div>	
					<div class="innerAll">
						<div id="application"></div>
					</div>	
				</div>
			</div>	
		</div>
	</div>
</script>

<script id="acInfo" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span6">
			<div id="account-section"></div>
		</div>
		<div class="span6">
			<div class="innerAll padding-bottom-none-phone">
				<span class="widget-stats widget-stats-primary widget-stats-4">
					<span class="txt">សមតុល្យ</span>
					<span class="count" data-bind="text: currentBalance"></span>
					<span class="glyphicons refresh"><i></i></span>
					<div class="clearfix"></div>
					<i class="icon-play-circle"></i>
				</span>

			</div>
		</div>
	</div>

	<div class="span12">
		<input type="text" data-role="datepicker" data-bind="value: startDate" style="width: 123px">-
		<input type="text" data-role="datepicker" data-bind="value: endDate" style="width: 123px">
		<button class="btn btn-warning" data-bind="click: search"><i class="icon-search"></i></button>
		<table class="table">	
			<tbody data-role="grid" data-bind="source: transactions, events: {change: change}" 
									data-columns="[
										{ title: 'កាលបរិច្ឆេទ', field: 'created_at', width: '100px', format:'{0:dd-MM-yyyy}'},
										{ title: 'លេខ \#', width: '90px', field: 'journal_id.number', template:'<a href=<?php echo base_url();?>app\\##=journal_id.transaction_type#/#=journal_id.id#>#=journal_id.number#</a>' },
										{ title: 'ព៌ណនា', field: 'memo' },
										{ title: 'ឥណពន្ធ', field: 'dr', width: '100px', format:'{0:c2}' },
										{ title: 'ឥណទាន', field: 'cr', width: '100px', format:'{0:c3}'},
										{ title: 'សមតុល្យ', field: 'balance', width: '100px' },
									]"
									data-scrollable="true"
									data-pageable="{pageSize: 11}"
									data-height="368">
			</tbody>
		</table>
	</div>
	</div>
</script>
<script id="account-detail" type="text/x-kendo-template">
	<table class="table table-condensed">
		<tr>
			<td width="60">កូដគណនី៖</td>		
			<td>
				<span data-bind="text: current.code"></span> (<span data-bind="text: current.type"></span>)
			</td>
		</tr>
		<tr>
			<td>គណនី៖</td>		
			<td>
				<span data-bind="text: current.name"></span>
			</td>
		</tr>
		<tr>
			<td>ព៌ណនា៖</td>
			<td>
				<textarea style="width: 100%; height: 80px;" data-bind="value: current.description" editable="false"></textarea>
			</td>
		</tr>
		<tr>
			<td></td>
			<td style="text-align:right">
				<button class="btn" data-bind="click: editBtn">កែ</button>
				<button class="btn" data-bind="click: deleteBtn">លុប</button>
			</td>
		</tr>
	</table>
</script>
<script id="createNew" type="text/x-kendo-template">
	<div class="well">
		<label for="code">Code:(ត្រូវការ)</label>
		<input type="text" data-bind="value: code"> <span data-bind="html: errorCode" style="color: red"></span>
		<label for="name">Name:(ត្រូវការ)</label>
		<input type="text" data-bind="value: name"> <span data-bind="html: errorName" style="color: red"></span>
		<label for="type">Type:(ត្រូវការ)</label>
		<input type="text" data-role="dropdownlist" data-option="Select One" data-bind="source: types, value: type" data-text-field="name" data-value-field="id" style="width: 220px;"> <span data-bind="html: errorType" style="color: red"></span>
		<label for="description">Description:</label>
		<input type="text" data-bind="value: description">
		<label for="parent">គណនីមេ៖</label>
		<select name="account" id="account" data-role="combobox" data-bind="source: datasource, value: parent_ac_id" data-text-field="name" data-value-field="id" style="width: 220px;"></select>
		<button data-bind="click: add" class="btn">កត់ត្រា</button>
	</div>
</script>

<script id="editTmpl" type="text/x-kendo-template">
	<table class="table table-condensed">
		<tr>
			<td>កូដគណនី៖</td>		
			<td>
				<input data-bind="value: current.code">(<span data-bind="text: current.type"></span>)
			</td>
		</tr>
		<tr>
			<td>គណនី៖</td>		
			<td>
				<input data-bind="value: current.name">
			</td>
		</tr>
		<tr>
			<td>ព៌ណនា៖</td>
			<td>
				<textarea style="width: 100%; height: 80px;" data-bind="value: current.description"></textarea>
			</td>
		</tr>
		<tr>
			<td></td>
			<td style="text-align:right">
				<button data-bind="click: update" class="btn">កត់ត្រា</button>
				<button class="btn" data-bind="click: cancel">បោះបង់</button>
			</td>
		</tr>
	</table>
</script>

<script id="asideACTmpl" type="text/x-kendo-template">
	<tr>
		<td>
			<div class="media-body">
				<span class="strong">#=code#-#=name#</span>	
			</div>
		</td>
	</tr>
</script>

<script id="dashboard" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span5"></div>
		<div class="span4">Dashboard</div>
	</div>	
</script>

<script type="text/x-kendo-template" id="accountingJournal">
	<div class="span12">
		<h2 style="text-align: center;">កត់ត្រាទិន្នានុប្បវត្តិ</h2>
		<div id="application">
			<div class="well">
				<input type="text" data-role="datepicker" data-bind="value: date">
				<input type="text" placeholder="លេខសក្ខីបត្រ័" data-bind="value: entryNumber" style="margin-top: 10px;">
			</div>
			<i class="icon-plus" data-bind="click: addNew"></i>
			<div id="grid" data-role="grid" 
					 	   data-bind="source: journalItem.items" 
					 	   data-row-template="gridTmpl" 
					 	   data-columns="[
					 	   	  {title: 'គណនី', width:'265px'},
					 	   	  {title:'ឥណពន្ធ (Dr.)', width:'120px'},
					 	   	  {title:'ឥណទាន (Cr.)', width:'120px'},
					 	   	  {title:'Class', width:'180px'},
					 	   	  {title:'ពិពណ៍នា'},
					 	   	  {title:'', width:'30px'}]"></div>
			<table class="table">
				<tbody>
					<tr>
						<td width="310"></td>
						<td width="103"><span data-bind="text: debit"></span></td>
						<td width="103"><span data-bind="text: credit"></span></td>
						<td></td>
					</tr>
					<tr>
						<td width="310">លំអៀង </td>
						<td width="103"><span data-bind="text: dif"></span></td>
						<td width="103"></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<div class="span3 pull-right">
				<button class="btn pull-right" data-bind="click: cancel">មិនយក</button>
				<button class="btn pull-right" data-bind="visible: isNew, events: {click: record}">កត់ត្រាប្រត្តិការនេះ</button>
				<button class="btn pull-right" data-bind="invisible: isNew, events: {click: update}">កែប្រត្តិការនេះ</button>
			</div>
			<span data-bind="text: journalItem.items.account_id"></span>
		</div>
	</div>
</script>
<script id="layout" type="text/x-kendo-template">	
</script>
<script id="gridTmpl" type="text/x-kendo-template">
	<tr>
		<td>
			<select data-role="combobox" name="account" id="account" 
					data-bind="source: accounts, value: account_id" 
					data-text-field="name" 
					data-value-field="id" 
					style="width: 250px"></select>
			
		</td>
		<td>
			<input type="text" data-bind="value: dr" style="width: 90px; margin-top: 9px;">
		</td>
		<td>
			<input type="text" data-bind="value: cr" style="width: 90px; margin-top: 9px;">
		</td>
		<td>
			<select data-role="combobox" name="account" id="account" 
					data-bind="source: classes, value: class_id" 
					data-text-field="name" 
					data-value-field="id" 
					style="width: 160px"></select>
		</td>
		<td>
			<input type="text" data-bind="value: memo" style="width: 180px;; margin-top: 9px;">
		</td>
		<td>
			<i class="icon-trash" data-bind="click: remove"></i>
		</td>
	</tr>	
</script>

<script type="text/x-kendo-template" id="accountingItems">
	<div class="widget widget-heading-simple widget-body-gray widget-employees">
			
		<!-- Widget Heading -->
		<!-- <div class="widget-head">
			<h4 class="heading glyphicons usd"><i></i>ទំព័រវត្ថុ</h4>
		</div> -->
		<!-- // Widget Heading END -->		
		<div class="widget-body padding-none">	
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" style="height: 730px;">
					<div class="innerAll">
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" id="search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" value="" placeholder="ស្វែងរក" id="searchField">
								</div>
							</div>
							<div class="select2-container" style="width: 100%;">
								<div class="overflow-hidden">
									<select name="" id="searchOptions" style="width: 100%;" tabindex="-1">
										<option value="code">លេខកូដ</option>
						                <option value="name">ឈ្មោះ</option>
									</select>
								</div>
							</div>
							<!-- <div class="select2-container" id="s2id_autogen2" style="width: 100%;">
								<a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   
									<span>Design</span><abbr class="select2-search-choice-close" style="display:none;"></abbr>   
									<div><b></b></div></a><input class="select2-focusser select2-offscreen" type="text"></div>
									<select style="width: 100%;" class="select2-offscreen" tabindex="-1">
						               <optgroup label="Department">
						                   <option value="design">Design</option>
						                   <option value="development">Development</option>
						               </optgroup>
									</select> -->
						</form>
					</div>
					<span class="results"></span>
					<ul class="list unstyled" id="items" style="height: 510px;"></ul>
				</div>
				<div class="span9 detailsWrapper">
					<div class="innerLR">
						<div class="navbar">
							<div class="navbar-inner">
								<ul class="nav">
									<li><a href="#"><i class="icon-home"></i></a></li>
							        <li>
							            <a href="#/new">
							            	បង្កើតថ្មី
							            </a>
							        </li>							        
								</ul>
							</div>
						</div>
					</div>	
					<div class="innerAll">
						<div id="application"></div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</script>
<script id="asideTmpl" type="text/x-kendo-template">
	<li class="">
		<div class="media innerAll">
			<div class="media-object pull-left thumb hidden-phone"><img data-src="holder.js/51x51/dark" alt="51x51" style="width: 51px; height: 51px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADMAAAAzCAYAAAA6oTAqAAACAUlEQVRoQ+2Yv8upcRjGrxdFDEZKBmWxSIlFIgmRwSbl/6MUNkWUwSgZDAYxKEQMisGP0/c76NTRebl17t5O91PP4nku131dn++9PF+JROKO/+T6kjA/lKSQ+aFgIGSEDEMDcswYSiZZCBlSbQwiIcNQMslCyJBqYxAJGYaSSRZChlQbg0jIMJRMsiCRsVqt8Pv9uN1uMJlMWC6XWCwWeoBwOIzD4YDpdPp0oE+03yUkhXG73cjlcrhcLjrMZDLBcDhEJBKBx+PBfD5Hq9V66v2J9p+E8Xq9iEajqNfrOJ/P+nY6nUilUrBYLJjNZuh0Okgmk3A4HGg0GshkMjidTprYK9rvBn/2nEQmFovB5/M9/q/f72s66ioWi9jtdmi327DZbCiVSjAajfpIVqtVBAKBl7RsYex2uyaw2Wz0sMfjEc1m848w6odQKIRgMIjxeIzBYIB3tO8GIpHJ5/O4Xq/odruaxGq1euzI72TMZjPK5bLeK/V+pVJBPB5/SftuEPU+KYxa8nQ6rf3UkGp3ttvtg8x6vUav10M2m4XL5UKtVkOhUMB+v8doNHpJyxZGGRkMBr0T6ojd7+99e/9E+7eQJDKU1jg0EoajZYqHkKG0xqERMhwtUzyEDKU1Do2Q4WiZ4iFkKK1xaIQMR8sUDyFDaY1DI2Q4WqZ4CBlKaxyaXyM+XIKj6S59AAAAAElFTkSuQmCC"></div>
			<div class="media-body">
				<span class="strong">#=name#</span>
				<span class="muted"><i class="icon-shopping-cart"></i> #=kendo.toString(parseFloat(cost), 'c')#</span>
				<span class="muted"><i class="icon-dollar"></i> &nbsp;#=kendo.toString(parseFloat(price), 'c')#</span>
				
			</div>
		</div>
	</li>
</script>
<script type="text/x-kendo-template" id="layoutView">
	<div id="pre_content"><a href="#/edit" class="btn" data-bind="enabled: isEditable"><i class="icon-edit"></i> Edit</a></div>
	<div id="content"></div>
</script>

<script type="text/x-kendo-template" id="itemView">
	<div id="detail">
		<table class="table">
			<tr>
				<td>SKU:</td><td><span data-bind="text: current.item_sku"></span></td>
				<td>ឈ្មេាះ</td><td><span data-bind="text: current.name"></span></td>
			</tr>
			<tr>
				<td>តំលៃ</td><td><span data-bind="text: current.cost"></span></td>
				<td>ពិព៌ណាទិញ</td><td><span data-bind="text: current.purchase_description"></span></td>
			</tr>
			<tr>
				<td>តំលៃ</td><td><span data-bind="text: current.price" data-format="{0: 'c'}"></span></td>
				<td>ពិព៌ណាលក់</td><td><span data-bind="text: current.sale_description"></span></td>
			</tr>
			<tr>
				<td>ប្រភេទ</td><td><span data-bind="text: current.type_name.name"></span></td>
				<td>Account</td><td><span data-bind="text: current.account_name.code"></span>-<span data-bind="text: current.account_name.name"></span></td>
			</tr>
			<tr>
				<td></td><td></td>
				<td>Account</td><td><span data-bind="text: current.income_account.code"></span>-<span data-bind="text: current.income_account.name"></span></td>
			</tr>
			<tr>
				<td></td><td></td>
				<td>Account</td><td><span data-bind="text: current.cogs_account.code"></span>-<span data-bind="text: current.cogs_account.name"></span></td>
			</tr>
		</table>
		<div id="itemList" data-role="grid" 
						   data-bind="source: itemRecords"
						   data-pageable="true"
						   data-editable="ture"
						   data-selectable="true"
						   data-columns="[
						   		{title: 'Description', field: 'description'},
						   		{title: 'Quanity', field: 'quantity'},
						   		{title: 'Cost', field: 'cost'}
						   ]"></div>
	</div>
	<div id="report"></div>
</script>
<script type="text/x-kendo-template" id="itemEditView">
	<div id="newForm" data-role="validator">
		<label for="sku">SKU</label>
		<input type="text" name="sku" data-bind="value: sku" required validationMessage="Please provide the stock keeping unit number">
		<span class="k-invalid-msg" data-for="search"></span>

		<label for="name">Name</label>
		<input type="text" name="name" data-bind="value: name" required validationMessage="Please provide name">
		<span class="k-invalid-msg" data-for="name"></span>

		<label for="measure">Unit of Measure</label>
		<input type="text" name="measure" data-role="combobox" 
										  data-text-field="type" 
										  data-value-field="id" 
										  data-bind="source: measures, value: measure_id" required validationMessage="Please provide measurement">
		<span class="k-invalid-msg" data-for="measure"></span>

		<label for="cost">Cost</label>
		<input type="text" name="cost" data-role="numerictextbox" data-bind="value: cost" required validationMessage="Please provide cost">
		<span class="k-invalid-msg" data-for="cost"></span>

		<label for="price">price</label>
		<input type="text" name="price" data-role="numerictextbox" data-bind="value: price" required validationMessage="Please provide price">
		<span class="k-invalid-msg" data-for="price"></span>

		<label for="sale_descript">Sale Description</label>
		<input type="text" name="sale_descript" data-bind="value: sale_descript" required validationMessage="Please provide sale Description">
		<span class="k-invalid-msg" data-for="sale_descript"></span>

		<label for="purchase_descript">Purchase Description</label>
		<input type="text" name="purchase_descript" data-bind="value: purchase_descript" required validationMessage="Please provide Purchase Description">
		<span class="k-invalid-msg" data-for="purchase_descript"></span>

		<label for="type">Type</label>
		<input type="text" name="type" data-role="combobox" 
									   data-text-field="name" 
									   data-value-field="id" 
									   data-bind="source: types, value: type" required validationMessage="Please provide type">
		<span class="k-invalid-msg" data-for="type"></span>

		<label for="account">General Account</label>
		<input type="text" name="account" data-role="combobox" 
										  data-text-field="name" 
										  data-value-field="id" 
										  data-bind="source: accounts, value: account" required validationMessage="Please provide account">
		<span class="k-invalid-msg" data-for="account"></span>

		<label for="cogs">Cost of Goods Sold</label>
		<input type="text" name="cogs" data-role="combobox" 
									   data-text-field="name" 
									   data-value-field="id" 
									   data-bind="source: accounts, value: cogs_account" required validationMessage="Please provide cost of goods sold">
		<span class="k-invalid-msg" data-for="cogs"></span>

		<label for="income_account">Income Account</label>
		<input type="text" name="income_account" data-role="combobox" 
												 data-text-field="name" 
												 data-value-field="id" 
												 data-bind="source: accounts, value: income_account" required validationMessage="Please provide income account">
		<span class="k-invalid-msg" data-for="income_account"></span>

		<label for="status">Status</label>
		<input type="checkbox" name="status" data-bind="checked: status">
		<span class="k-invalid-msg" data-for="status"></span><br>
		<button class="btn" data-bind="click: update">Update</button>
	</div>
</script>
<script type="text/x-kendo-template" id="itemNewView">
	<div id="newForm" data-role="validator">
		<label for="sku">SKU</label>
		<input type="text" name="sku" data-bind="value: sku" required validationMessage="Please provide the stock keeping unit number">
		<span class="k-invalid-msg" data-for="search"></span>

		<label for="name">Name</label>
		<input type="text" name="name" data-bind="value: name" required validationMessage="Please provide name">
		<span class="k-invalid-msg" data-for="name"></span>

		<label for="measure">Unit of Measure</label>
		<input type="text" name="measure" data-role="combobox" 
										  data-text-field="type" 
										  data-value-field="id" 
										  data-bind="source: measures, value: measure_id" required validationMessage="Please provide measurement">
		<span class="k-invalid-msg" data-for="measure"></span>

		<label for="cost">Cost</label>
		<input type="text" name="cost" data-role="numerictextbox" data-bind="value: cost" required validationMessage="Please provide cost">
		<span class="k-invalid-msg" data-for="cost"></span>

		<label for="price">price</label>
		<input type="text" name="price" data-role="numerictextbox" data-bind="value: price" required validationMessage="Please provide price">
		<span class="k-invalid-msg" data-for="price"></span>

		<label for="sale_descript">Sale Description</label>
		<input type="text" name="sale_descript" data-bind="value: sale_descript" required validationMessage="Please provide sale Description">
		<span class="k-invalid-msg" data-for="sale_descript"></span>

		<label for="purchase_descript">Purchase Description</label>
		<input type="text" name="purchase_descript" data-bind="value: purchase_descript" required validationMessage="Please provide Purchase Description">
		<span class="k-invalid-msg" data-for="purchase_descript"></span>

		<label for="type">Type</label>
		<input type="text" name="type" data-role="combobox" 
									   data-text-field="name" 
									   data-value-field="id" 
									   data-bind="source: types, value: type" required validationMessage="Please provide type">
		<span class="k-invalid-msg" data-for="type"></span>

		<label for="account">General Account</label>
		<input type="text" name="account" data-role="combobox" 
										  data-text-field="name" 
										  data-value-field="id" 
										  data-bind="source: accounts, value: account" required validationMessage="Please provide account">
		<span class="k-invalid-msg" data-for="account"></span>

		<label for="cogs">Cost of Goods Sold</label>
		<input type="text" name="cogs" data-role="combobox" 
									   data-text-field="name" 
									   data-value-field="id" 
									   data-bind="source: accounts, value: cogs_account">
		<span class="k-invalid-msg" data-for="cogs"></span>

		<label for="income_account">Income Account</label>
		<input type="text" name="income_account" data-role="combobox" 
												 data-text-field="name" 
												 data-value-field="id" 
												 data-bind="source: accounts, value: income_account">
		<span class="k-invalid-msg" data-for="income_account"></span>

		<label for="status">Status</label>
		<input type="checkbox" name="status" data-bind="checked: status">
		<span class="k-invalid-msg" data-for="status"></span><br>
		<button class="btn" data-bind="click: record">Record</button>
	</div>
</script>
<script type="text/x-kendo-template" id="itemDeleteView">
	kljlkj
</script>
<script type="text/x-kendo-template" id="po">
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<div align="right">
						<button type="button" aria-hidden="true" data-bind="click:closeX">X</button>
					</div>
					
					<div class="widget-head">			        				        	
			        	<h3 class="heading glyphicons cart_in"><i></i>បញ្ជាទិញ</h3>
					</div>
									
					<div class="row-fluid">
						<div class="span4">				
							<table cellpadding="2" cellspacing="2">					          
								<tr>				
									<td>លេខបញ្ជាទិញ</td>
									<td><input class="k-textbox" data-bind="value: number" style="width:140px;" readonly /></td>
								</tr>									                      
								<tr>
					                <td>Class</td>
					              	<td><select id="classes" name="classes" data-role="combobox" 
					              				data-text-field="name" data-value-field="id" 
					              				data-bind="source: classList, value: class_id"
					              				required data-required-msg="ត្រូវការ Class"></select>
					              	</td>
					            </tr>            
								<tr>
									<td colspan="2">
										អាសយដ្ឋាន
										<br>
										<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: address"></textarea>
									</td>
								</tr>
							</table>
						</div>

					    <div class="span4">
					    	<div align="center">
					    		<span class="glyphicons standard circle_ok" data-bind="visible: paid"><i></i> ទូទាត់រួច</span>				    	
					    	</div>
					    </div>

						<div class="span4">
							<table cellpadding="2" cellspacing="2">	
								<tr>
									<td>កាលបរិច្ឆេទ</td>
									<td>
										<input id="issuedDate" name="issuedDate" data-role="datepicker" 
												data-bind="value: issued_date" data-format="dd-MM-yyyy" 
												required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" />
									</td>
								</tr>				
								<tr>
									<td>ថ្ងៃរំពឹងទុក</td>
									<td>
										<input id="expectedDate" name="expectedDate" data-role="datepicker" 
												data-bind="value: expected_date" data-format="dd-MM-yyyy" 
												required data-required-msg="ត្រូវការ ថ្ងៃរំពឹងទុក" />
									</td>
								</tr>					            
								<tr>
									<td colspan="2">
										ការដឹកជញ្ជូនទៅកាន់
										<br>
										<textarea id="shipTo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: ship_to"></textarea>
									</td>
								</tr>
							</table>           		          	
					    </div>
					</div>
								
					<div data-role="grid" data-bind="source: invoiceItemList"
				        data-auto-bind="false"				        
				        data-row-template="invoiceRowTemplate"				                        
				        data-columns='[{ title: "", width: 20 },
				        	{ title: "ល.រ", width: 35 },
				            { title: "ទំនិញ", width: 200 },	                     
				            { title: "ពណ៌នា", width: 200 },
				            { title: "ចំនួន", width: 85 },
				            { title: "តំលៃ", width: 115 },		            
				            { title: "ទឹកប្រាក់", width: 80 },
				            { title: "vat", width: 30 }	                    	                    
				            ]'>
					</div>
					<button class="btn btn-inverse" data-bind="click: addNewRow"><i class="icon-plus icon-white"></i></button>
					
					<br>
					
					<div class="row-fluid">				
						<div class="span8">
							សំគាល់:
							<br>
							<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
							<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
						</div>

						<div class="span4">
							<table width="100%">
								<tr align="right">
									<td>សរុបរង:</td>
									<td width="50%"><span data-bind="text: sub_total"></span></td>
								</tr>
								<tr align="right">
									<td align="top">
										<select data-role="combobox" data-text-field="name" data-value-field="id" 
												data-bind="source: vatList, value: vat_id, events: {change: change}" placeholder="VAT" style="width:90px"></select>								
									</td>
									<td><span data-bind="text: vat"></span></td>
								</tr>
								<tr align="right">
									<td>សរុប:</td>
									<td bgcolor="#00BFFF"><span data-bind="text: total"></span></td>
								</tr>						
							</table>
						</div>													
					</div>

					<br>

					<div class="row-fluid">				
						<div class="span12" align="right">
							<div id="status"></div>
							<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isUpdate"><i></i> បោះពុម្ព</span>						
							<button id="save" type="submit" class="btn btn-icon btn-primary glyphicons cart_in"><i></i> រៀបចំវិក្កយបត្រ</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<!--   Class Section -->
<script type="text/x-kendo-template" id="classesTmpl">
	<div class="row-fluid">
		<div class="span12">
			<div id="clsGrid"></div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="newClsTmpl">
	fdjflksjlfd
</script>
<!--End Class Section-->
<!--   Item Section  -->
<script type="text/x-kendo-template" id="itemsView">
	<div class="widget widget-heading-simple widget-body-gray widget-employees">			
		<!-- Widget Heading -->
		<!-- <div class="widget-head">
			<h4 class="heading glyphicons user"><i></i>ទំព័រអគ្គីសនី</h4>
		</div> -->
		<!-- // Widget Heading END -->		
		<div class="widget-body padding-none">	
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" style="height: 730px;">
					<div class="innerAll">
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" id="search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" value="" placeholder="រកសន្និធិ" id="searchField">
								</div>
							</div>
							<div class="select2-container" style="width: 100%;">
								<div class="overflow-hidden">
									<select name="" id="searchOptions" style="width: 100%;">
									</select>
								</div>
							</div>
						</form>
					</div>
					<span class="results"></span>
					<div class="table table-condensed" id="itemsSidebar" style="height: 605px;"></div>
				</div>
				<div class="span9 detailsWrapper">
					<div class="innerLR">		
						<div id="itemDetail"></div>
					</div>					
				</div>
			</div>	
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="itemsDetailView">
	<div data-role="tabstrip">
		<ul>
			<li class="k-state-active">ព័តមានលំអិត</li>
			<li>ប្រត្តិប័ត្រការណ៍</li>
			<li>របាយការណ៍</li>
		</ul>
		<div>
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td>ឈ្មោះៈ</td>
						<td><input type="text" data-bind="value: current.name"></td>
						<td>SKU</td>
						<td><input type="text" data-bind="value: current.sku"></td>
					</tr>
					<tr>
						<td>តំលៃទិញចូលៈ</td>
						<td><input type="text" data-bind="value: current.cost"></td>
						<td>តំលៃលក់ចេញៈ</td>
						<td><input type="text" data-bind="value: current.price"></td>
					</tr>
					<tr>
						<td>ពិពណ៌នាទិញចូលៈ</td>
						<td><textarea type="text" data-bind="value: current.purchase_description"></textarea></td>
						<td>ពិពណ៌នាលក់ចេញៈ</td>
						<td><textarea type="text" data-bind="value: current.sale_description"></textarea></td>
					</tr>
					<tr>
						<td>សល់ៈ</td>
						<td><input type="text" data-bind="value: current.quantity"></td>
						<td>ចំនួនទាបត្រូវទិញចូលៈ</td>
						<td><input type="text" data-bind="value: current.order_point"></td>
					</tr>
					<tr>
						<td>ប្រភេទៈ</td>
						<td><input type="text" data-role="dropdownlist" data-bind="source: typesStore, value: current.type.id"
											   data-text-field="name"
											   data-value-field="id"></td>
						<td>រង្វាស់ៈ</td>
						<td><input type="text" data-role="dropdownlist" data-bind="source: unitMeasure, value: current.measurement"
											   data-text-field="type"
											   data-value-field="id"></td>
					</tr>
					<tr>
						<td>គណនីៈ</td>
						<td><input type="text" data-role="dropdownlist" data-bind="source: accountStore, value: current.general_account.id"
											   data-text-field="name"
											   data-value-field="id"></td>
						<td>គណនីចំណូលៈ</td>
						<td><input type="text" data-role="dropdownlist" data-bind="source: accountStore, value: current.income_account.id"
											   data-text-field="name"
											   data-value-field="id"></td>
					</tr>
					<tr>
						<td>គណនីថ្លៃដើមៈ</td>
						<td><input type="text" data-role="dropdownlist" data-bind="source: accountStore, value: current.cogs_account.id"
											   data-text-field="name"
											   data-value-field="id"></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<button class="btn" data-bind="visible: shown, click: cancelChange">មិនយក</button>
			<button class="btn" data-bind="visible: shown, click: record">រក្សាទុក</button>
		</div>
		<div>
			<div id="itemTransDetail" class="table table-bordered"  style="height: 200px; overflow: auto;">
			</div>
		</div>
		<div>
			<table id="itemReportTable" class="table table-condensed"  style="height: 200px; overflow: auto;">
				<thead>
					<tr>
						<th>នៅសល់ជាក់ស្ដែង</th>
						<th>ស្នើរលក់ចេញ</th>
						<th>វិក្កយប័ត្រ</th>
						<th>អាចលក់បាន</th>
						<th>បញ្ជាទិញ</th>
						<th>អាចប្រើបាន</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="itemsNewView">
	<div class="span8 offset2">
		<button class="btn pull-right" data-bind="click: closeX">X</button>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td>ឈ្មោះៈ</td>
					<td><input type="text" data-bind="value: current.name"></td>
					<td>SKU</td>
					<td><input type="text" data-bind="value: current.sku"></td>
				</tr>
				<tr>
					<td>តំលៃទិញចូលៈ</td>
					<td><input type="text" data-bind="value: current.cost"></td>
					<td>តំលៃលក់ចេញៈ</td>
					<td><input type="text" data-bind="value: current.price"></td>
				</tr>
				<tr>
					<td>ពិពណ៌នាទិញចូលៈ</td>
					<td><textarea type="text" data-bind="value: current.purchase_description"></textarea></td>
					<td>ពិពណ៌នាលក់ចេញៈ</td>
					<td><textarea type="text" data-bind="value: current.sale_description"></textarea></td>
				</tr>
				<tr>
					<td>សល់ៈ</td>
					<td><input type="text" data-bind="value: current.quantity"></td>
					<td>ចំនួនទាបត្រូវទិញចូលៈ</td>
					<td><input type="text" data-bind="value: current.order_point"></td>
				</tr>
				<tr>
					<td>ប្រភេទៈ</td>
					<td><input type="text" data-role="dropdownlist" data-bind="source: typesStore, value: current.type.id"
										   data-text-field="name"
										   data-value-field="id"></td>
					<td>រង្វាស់ៈ</td>
					<td><input type="text" data-role="dropdownlist" data-bind="source: unitMeasure, value: current.measurement"
										   data-text-field="type"
										   data-value-field="id"></td>
				</tr>
				<tr>
					<td>គណនីៈ</td>
					<td><input type="text" data-role="dropdownlist" data-bind="source: accountStore, value: current.general_account.id"
										   data-text-field="name"
										   data-value-field="id"></td>
					<td>គណនីចំណូលៈ</td>
					<td><input type="text" data-role="dropdownlist" data-bind="source: accountStore, value: current.income_account.id"
										   data-text-field="name"
										   data-value-field="id"></td>
				</tr>
				<tr>
					<td>គណនីថ្លៃដើមៈ</td>
					<td><input type="text" data-role="dropdownlist" data-bind="source: accountStore, value: current.cogs_account.id"
										   data-text-field="name"
										   data-value-field="id"></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<button class="btn" data-bind="visible: shown, click: cancelChange">មិនយក</button>
		<button class="btn" data-bind="visible: shown, click: record">រក្សាទុក</button>
	</div>
</script>
<script type="text/x-kendo-template" id="itemsRecordView">
	<tr>
		<td>#=kendo.toString(created_at, 'dd-MM-yyyy')#</td>
		<td><a href="<?php echo base_url();?>app\##:type.type ? type.type : "request"#/#=type.id#">#:type.type ? type.type : "request"#</a></td>
		<td>#:kendo.toString(quantity, 'n2')#</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="itemsRequestView">
</script>
<script type="text/x-kendo-template" id="itemsReportView">
	<tr>
		<td>#=actual#</td>
		<td>#=so#</td>
		<td>#=inv#</td>
		<td>#=parseInt(actual)-(parseInt(so)+parseInt(inv))#</td>
		<td>#=po#</td>
		<td>#=parseInt(po)+(parseInt(actual)-(parseInt(so)+parseInt(inv)))#</td>
	</tr>
</script>
<!-- End Item Section-->

<script id="clsTmpl" type="text/x-kendo-template">
	<div class="span10 offset1">
		<button id="newCls" data-role="button">ចំណាត់ថ្នាក់ថ្មី</button>
		<div id="clsGrid"></div>
		<div id="clsModal">
			<table class="table">
				<tr>
					<td>ឈ្មោះ</td>
					<td><input type="text" id="clsName" data-bind="value: current.name"></td>
				</tr>
				<tr>
					<td>ពណ៌នា</td>
					<td><input type="text" id="clsDescription" data-bind="value: current.description"></td>
				</tr>
				<tr>
					<td>ប្រភេទៈ</td>
					<td><input type="text" id="clsType"  data-bind="value: current.type"></td>
				</tr>
				<tr>
					<td></td>
					<td><button data-bind="click: save">រក្សាទុក</button> <button data-bind="click: cancel">មិនយក</button></td>
				</tr>
			</table>
		</div>
	</div>
</script>

<!-- By Visal -->
<!-- InventoryView -->
<script type="text/x-kendo-template" id="inventory">
	<div class="container">
		<div class="row">
			<div class="span12">
				<div id="header"></div>
			</div>
			
		</div>
	</div>

	<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
	    <!-- Tabs Heading -->
	    <div class="widget-head">
	        <ul>
	            <li class="" style="width:100px;">
	            	<a href="#inventory" class="glyphicons home"><i></i><span>សន្និធិ</span></a>
	            </li>
	            <li class="" style="width:120px;">
	            	<a href="#inventoryItem" class="glyphicons user_add"><i></i><span> <?=$this->lang->line('inventory_item'); ?> </span></a>
	            </li>
	            <li class="<?php if($this->uri->segment(2) == "load_unit_measure") { echo "active"; } ?>" style="width:100px;">
	                <a href="#unit_measure" class="glyphicons dashboard"><i></i><span>អំនានកុងទ័រ</span></a>
	            </li>
	            <li class="<?php if($this->uri->segment(2) == "load_adjustment") { echo "active"; } ?>" style="width:100px;">
	            	<a href="#load_adjustment" class="glyphicons calculator"><i></i><span> <?=$this->lang->line('inventory_adjustment'); ?> </span></a>
	            </li> 
	            <li style="width:100px;">
	                <a href="#grnView" class="glyphicons track"><i></i><span>លិខិតដឹកជញ្ជូន</span></a>
	            </li>           
	        </ul>
	    </div>
	    <!-- // Tabs Heading END -->
	</div>

	<div id="main"></div>
	<script type="text/x-kendo-template" id="homeInventory">
		<div id="cont"></div>
</script>

<!-- HomeInventory -->
<script type="text/x-kendo-template" id="homeIn">
	<div class="widget widget-heading-simple widget-body-gray widget-employees">
	
	<!-- Widget Heading -->
	<!-- <div class="widget-head">
		<h4 class="heading glyphicons usd"><i></i>ទំព័រសន្និធិ</h4>
	</div> -->
	<!-- // Widget Heading END -->
	
	<div class="widget-body padding-none">	
		<div class="row-fluid row-merge">
			<div class="span3 listWrapper" style="height: 630px;">
				<div class="innerAll"  style="background:#006dcc; padding:20px 26px;">
					<form autocomplete="off" class="form-inline" style="margin-left:-5px;">
						<div class="widget-search separator bottom">
							<button type="button" class="btn btn-default pull-right" id="search"><i class="icon-search"></i></button>
							<div class="overflow-hidden">
								<input type="search" value="" placeholder="ស្វែងរកត្រងស្វូ" id="searchField">
							</div>
						</div>
						<div class="select2-container" style="width: 100%;">
							<div class="overflow-hidden">
								<select name="" id="searchOptions" style="width: 100%;" tabindex="-1">
									<option value="code">លេខកូដ</option>
					                <option value="name">ឈ្មោះ</option>
								</select>
							</div>
						</div>
					</form>
				</div>
				<div class="table table-condense" id="items" style="margin-top:2px; height: 500px;" data-role="grid" 
																	   data-row-template="asideItemTmpl" 
																	   data-bind="source: products"
																	   data-columns="[{title:'&nbsp;'}]" 
																	   data-selectable="true"></div>			
			</div>
			<div class="span9 detailsWrapper">
				<div class="innerLR">
					<div class="navbar">
						<div class="navbar-inner">
							<ul class="nav">
								<li><a href="#inventory"><i class="icon-home"></i></a></li>
						        <li>
						            <a href="#inventory/new">
						            	បង្កើតថ្មី
						            </a>
						        </li>
						        <li class="<?php if($this->uri->segment(2) == "journal") { echo "active"; } ?>">
						            <a href="#">
						            	របាយការណ៍
						            </a>
						        </li>
						        <li class="<?php if($this->uri->segment(2) == "journal") { echo "active"; } ?>">
						            <a href="#inventory/itemReport">
						            	ផ្ទៀងផ្ទាត់និងកែតំរូវ
						            </a>
						        </li>
							</ul>
						</div>
					</div>
				</div>	
				<div class="innerAll">
					<div id="application"></div>
				</div>
				
			</div>
		</div>	
	</div>
	</div>
</script>
<script id="asideItemTmpl" type="text/x-kendo-template">
	<tr data-bind="click: onChange">
		<td>
			<div class="media-body" data-id="#=id#">
				<span class="strong">#=name#</span>
			</div>
		</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="layoutView">
	<div id="pre_content"><a href="#inventory/edit" class="btn" data-bind="enabled: isEditable"><i class="icon-edit"></i> Edit</a></div>
	<div id="content"></div>
</script>
<script type="text/x-kendo-template" id="itemView">
	<div id="detail">
		<table class="table">
			<tr>
				<td>SKU:</td><td><span data-bind="text: current.item_sku"></span></td>
				<td>ឈ្មេាះ</td><td><span data-bind="text: current.name"></span></td>
			</tr>
			<tr>
				<td>តំលៃ</td><td><span data-bind="text: current.cost"></span></td>
				<td>ពិព៌ណាទិញ</td><td><span data-bind="text: current.purchase_description"></span></td>
			</tr>
			<tr>
				<td>តំលៃ</td><td><span data-bind="text: current.price" data-format="{0: 'c'}"></span></td>
				<td>ពិព៌ណាលក់</td><td><span data-bind="text: current.sale_description"></span></td>
			</tr>
			<tr>
				<td>ប្រភេទ</td><td><span data-bind="text: current.type_name.name"></span></td>
				<td>Account</td><td><span data-bind="text: current.account_name.code"></span>-<span data-bind="text: current.account_name.name"></span></td>
			</tr>
			<tr>
				<td></td><td></td>
				<td>Account</td><td><span data-bind="text: current.income_account.code"></span>-<span data-bind="text: current.income_account.name"></span></td>
			</tr>
			<tr>
				<td></td><td></td>
				<td>Account</td><td><span data-bind="text: current.cogs_account.code"></span>-<span data-bind="text: current.cogs_account.name"></span></td>
			</tr>
		</table>

		<!-- data-bind="source: recordsDS" -->
		<div id="itemList" data-role="grid"						   
						   
						   data-pageable="true"
						   data-editable="ture"
						   data-selectable="true"
						   data-columns="[
						   		{title: 'Description', field: 'description'},
						   		{title: 'Quanity', field: 'quantity'},
						   		{title: 'Cost', field: 'cost'}
						   ]"></div>
	</div>
	<div id="report"></div>
</script>
<script type="text/x-kendo-template" id="itemEditView">
	<div id="newForm" data-role="validator">
		<label for="sku">SKU</label>
		<input type="text" name="sku" data-bind="value: sku" required validationMessage="Please provide the stock keeping unit number">
		<span class="k-invalid-msg" data-for="search"></span>

		<label for="name">Name</label>
		<input type="text" name="name" data-bind="value: name" required validationMessage="Please provide name">
		<span class="k-invalid-msg" data-for="name"></span>

		<label for="measure">Unit of Measure</label>
		<input type="text" name="measure" data-role="combobox" 
										  data-text-field="type" 
										  data-value-field="id" 
										  data-bind="source: measures, value: measure_id" required validationMessage="Please provide measurement">
		<span class="k-invalid-msg" data-for="measure"></span>

		<label for="cost">Cost</label>
		<input type="text" name="cost" data-role="numerictextbox" data-bind="value: cost" required validationMessage="Please provide cost">
		<span class="k-invalid-msg" data-for="cost"></span>

		<label for="price">price</label>
		<input type="text" name="price" data-role="numerictextbox" data-bind="value: price" required validationMessage="Please provide price">
		<span class="k-invalid-msg" data-for="price"></span>

		<label for="sale_descript">Sale Description</label>
		<input type="text" name="sale_descript" data-bind="value: sale_descript" required validationMessage="Please provide sale Description">
		<span class="k-invalid-msg" data-for="sale_descript"></span>

		<label for="purchase_descript">Purchase Description</label>
		<input type="text" name="purchase_descript" data-bind="value: purchase_descript" required validationMessage="Please provide Purchase Description">
		<span class="k-invalid-msg" data-for="purchase_descript"></span>

		<label for="type">Type</label>
		<input type="text" name="type" data-role="combobox" 
									   data-text-field="name" 
									   data-value-field="id" 
									   data-bind="source: types, value: type" required validationMessage="Please provide type">
		<span class="k-invalid-msg" data-for="type"></span>

		<label for="account">General Account</label>
		<input type="text" name="account" data-role="combobox" 
										  data-text-field="name" 
										  data-value-field="id" 
										  data-bind="source: accounts, value: account" required validationMessage="Please provide account">
		<span class="k-invalid-msg" data-for="account"></span>

		<label for="cogs">Cost of Goods Sold</label>
		<input type="text" name="cogs" data-role="combobox" 
									   data-text-field="name" 
									   data-value-field="id" 
									   data-bind="source: accounts, value: cogs_account" required validationMessage="Please provide cost of goods sold">
		<span class="k-invalid-msg" data-for="cogs"></span>

		<label for="income_account">Income Account</label>
		<input type="text" name="income_account" data-role="combobox" 
												 data-text-field="name" 
												 data-value-field="id" 
												 data-bind="source: accounts, value: income_account" required validationMessage="Please provide income account">
		<span class="k-invalid-msg" data-for="income_account"></span>

		<label for="status">Status</label>
		<input type="checkbox" name="status" data-bind="checked: status">
		<span class="k-invalid-msg" data-for="status"></span><br>
		<button class="btn" data-bind="click: update">Update</button>
	</div>
</script>
<script type="text/x-kendo-template" id="itemNewView">
	<div id="newForm" data-role="validator">
		<label for="sku">SKU</label>
		<input type="text" name="sku" data-bind="value: sku" required validationMessage="Please provide the stock keeping unit number">
		<span class="k-invalid-msg" data-for="search"></span>

		<label for="name">Name</label>
		<input type="text" name="name" data-bind="value: name" required validationMessage="Please provide name">
		<span class="k-invalid-msg" data-for="name"></span>

		<label for="measure">Unit of Measure</label>
		<input type="text" name="measure" data-role="combobox" 
										  data-text-field="type" 
										  data-value-field="id" 
										  data-bind="source: measures, value: measure_id" required validationMessage="Please provide measurement">
		<span class="k-invalid-msg" data-for="measure"></span>

		<label for="cost">Cost</label>
		<input type="text" name="cost" data-role="numerictextbox" data-bind="value: cost" required validationMessage="Please provide cost">
		<span class="k-invalid-msg" data-for="cost"></span>

		<label for="price">price</label>
		<input type="text" name="price" data-role="numerictextbox" data-bind="value: price" required validationMessage="Please provide price">
		<span class="k-invalid-msg" data-for="price"></span>

		<label for="sale_descript">Sale Description</label>
		<input type="text" name="sale_descript" data-bind="value: sale_descript" required validationMessage="Please provide sale Description">
		<span class="k-invalid-msg" data-for="sale_descript"></span>

		<label for="purchase_descript">Purchase Description</label>
		<input type="text" name="purchase_descript" data-bind="value: purchase_descript" required validationMessage="Please provide Purchase Description">
		<span class="k-invalid-msg" data-for="purchase_descript"></span>

		<label for="type">Type</label>
		<input type="text" name="type" data-role="combobox" 
									   data-text-field="name" 
									   data-value-field="id" 
									   data-bind="source: types, value: type" required validationMessage="Please provide type">
		<span class="k-invalid-msg" data-for="type"></span>

		<label for="account">General Account</label>
		<input type="text" name="account" data-role="combobox" 
										  data-text-field="name" 
										  data-value-field="id" 
										  data-bind="source: accounts, value: account" required validationMessage="Please provide account">
		<span class="k-invalid-msg" data-for="account"></span>

		<label for="cogs">Cost of Goods Sold</label>
		<input type="text" name="cogs" data-role="combobox" 
									   data-text-field="name" 
									   data-value-field="id" 
									   data-bind="source: accounts, value: cogs_account">
		<span class="k-invalid-msg" data-for="cogs"></span>

		<label for="income_account">Income Account</label>
		<input type="text" name="income_account" data-role="combobox" 
												 data-text-field="name" 
												 data-value-field="id" 
												 data-bind="source: accounts, value: income_account">
		<span class="k-invalid-msg" data-for="income_account"></span>

		<label for="status">Status</label>
		<input type="checkbox" name="status" data-bind="checked: status">
		<span class="k-invalid-msg" data-for="status"></span><br>
		<button class="btn" data-bind="click: record">Record</button>
	</div>
</script>

<!-- ItemReport -->
<script type="text/x-kendo-template" id="#itemReport">
	<div class="row-fluid">    
		<div class="span12">
			<div id="example" class="k-content">			

				<div id="content">
					<input data-role="datepicker" id="as_of_date" data-bind="value: displayDatePickerValue" >
					<!--<select data-role="dropdownlist" id="classes" data-bind="source: classDS, value: dropDownListValue" data-text-field="name" data-value-field="id"></select>-->
					<select data-role="dropdownlist"
			            data-text-field="name"
			            data-value-field="id"
			            data-bind="source: classDS, value: dropDownListValue">
			        </select>

					<button class="btn" id="search">មើលរបយាការណ៍</button>
					<h3 style="text-align:center">របាយការណ៍បំណុលអ្នកផ្គត់ផ្គង់តាមលក្ខខណ្ឌ័ទូទាត់</h3>
					<p style="text-align:center" id="dateTime">គិតត្រឹម <span data-bind="text: date"></span></p>
					<table class="table" id="listview">
						<thead>
							<tr>
								<th width="300"></th>
								<th style="text-align: center">បច្ចុប្បន្ន</th>
								<th style="text-align: center">1-30</th>
								<th style="text-align: center">31-60</th>
								<th style="text-align: center">61-90</th>
								<th style="text-align: center">> 90</th>
								<th style="text-align: center">សមតុល្យសរុប</th>
							</tr>
						</thead>
						<tbody data-role="listview" data-template="aging_summary_report" data-bind="source: reportAging" data-selectable="true" ></tbody>
					</table>
				</div>
				
			</div> <!--end div example-->            
		</div> <!--End div span12-->		
	</div> <!--End div row-fluid-->


	<!-- Modal -->
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Modal header</h3>
	  </div>
	  <div class="modal-body" style="height: 300px;">
	    <div id="billDetail" class="table"></div>
	  </div>
	  <div class="modal-footer">
	    <button class="btn" data-dismiss="modal" aria-hidden="true">បិទ</button>
	  </div>
	</div>
	<script type="text/x-kendo-tmpl" id="aging_summary_report">
		<tr data-id="#:vendor_id#">
			<td>#=vendor_name#</td>
			<td style="text-align: right">#=kendo.toString(aging_report.current, 'c2')#</td>
			<td style="text-align: right">#=kendo.toString(aging_report.in_thirty, 'c2')#</td>
			<td style="text-align: right">#=kendo.toString(aging_report.in_sixty, 'c2')#</td>
			<td style="text-align: right">#=kendo.toString(aging_report.in_ninety, 'c2')#</td>
			<td style="text-align: right">#=kendo.toString(aging_report.over_ninety, 'c2')#</td>
			<td style="text-align: right">#=kendo.toString((aging_report.current+aging_report.in_thirty+aging_report.in_sixty+aging_report.in_ninety+aging_report.over_ninety), 'c2')#</td>
		</tr>
	</script>
</script>

<!-- ItemView -->
<script type="text/x-kendo-template" id="inIview">
	<div class="span12">
	<h1 style="text-align:center;">េសវាកម្ម សន្និធិ និងអចលនទ្រព្យ</h1>
	<br>
	
	<form class="navbar-search pull-left">
	
		<br>
	<!-- Button to trigger add new modal -->

	   	 <button id="openSaveNewWindow" data-bind="events:{click: openSaveNewWindow}" class="btn btn-primary" type="button"><i class="icon-pencil icon-white"></i> បង្កើតឈ្មោះថ្មី</button>
	 <button id="openEditWindow" data-bind="events:{click: openEditWindow}" class="btn btn-primary" disabled="disabled" type="button"><i class="icon-edit icon-white"></i> កែប្រែ</button>
	<!-- Add New Modal and Edit Model -->			 	
	 											 
			 <div id="window" data-role="window"
	                 data-title="បញ្ចូលពត័មាន"
					 data-actions= '["Refresh", "Maximize", "Minimize", "Close"]'
	                 data-modal= "true"
	                 data-width="950"
	                 data-resizable= "true"
	                 data-draggable= "true"
	                 data-visible= "false"
	                 data-bind=" events: { refresh: onRefresh } ">
 			 <div id="example" class="k-content">
		 				
	   <div id="item">
			<table>
				<tr align="top">
					<td width="100" valign="top"><span>ជ្រើសរើសប្រភេទ:</span></td>
					<td width="180" valign="top"><select id="item_type_id" name="item_type_id" data-role="dropdownlist" data-bind="source: itemType , value: item_type_id, events:{ change: onChanges }" data-text-field="name" data-value-field="id"  placeholder="---ជ្រើសរើសយកមួយ---" required data-required-msg="ត្រូវការ ្របភេទ" ></select></td>			  
			 				
					<td width="80" valign="top"><span>លេខកូដ sku:</span><span style="color:red">*</span></td>
					<td valign="top"><input type="text" id="item_sku" name="item_sku" data-bind="value: item_sku" class="span2" required validationMessage="ត្រូវការ លេខកូដ sku" ></td>
					<td width="90" valign="top"><span>ឈ្មោះ:</span><span style="color:red">*</span></td>
					<td width="200" valign="top"><input type="text" id="item_name" name="item_name" data-bind="value: name" class="span3" required validationMessage="ត្រូវការ ឈ្មោះ"  ></td>
				</tr>
				<tr>
					<td valign="top"><span>គណនី:</span><span style="color:red">*</span></td>
					<td valign="top"><select id="general_account_id" name="general_account_id" data-value-field="id" data-text-field="name" data-role="combobox" data-bind="source: general_account_Source, value: general_account_id" placeholder="---ជ្រើសរើសយកមួយ---" required data-required-msg="ត្រូវការ គណនី"  ></td>
				<td valign="top"><span>គណនី COGS/Expense:</span></td>
				<td valign="top"><select id="cogs_account_id" name="cogs_account_id" data-role="combobox" data-text-field="name" data-value-field="id" data-bind="source: cogs_account_Source, value: cogs_account_id" placeholder="---ជ្រើសរើសយកមួយ---"  ></select></td>
				<td valign="top"><span>គណនី Income:</span></td>
				<td valign="top"><select id="income_account_id" name="income_account_id" data-role="combobox" data-text-field="name" data-value-field="id" data-bind="source: income_account_Source , value: income_account_id" placeholder="---ជ្រើសរើសយកមួយ---"  ></select></td>
				</tr>		
				<tr>
					<td><span id="unit_measure_title" >រង្វាស់:</span></td>
					<td><span id="unit_measure_input" ><select id="unit_measure_id" name="unit_measure_id" data-role="combobox" data-bind="source: unit_measure_Source, value: unit_measure_id " data-text-field="type" data-value-field="id" placeholder="---ជ្រើសរើសយកមួយ---" ></select></span></td>
					<td><span id="quantity_title" >ចំនួន:</span></td>
					<td><span id="quantity_input" ><input data-role="numerictextbox" id="numerictextbox" name="quantity" data-bind="value: quantity" min="0" value="0" ></span></td>
				</tr>	
				
				<tr>
					<td><span>ពិពណ៏នាទិញចូល:</span></td>
					<td><textarea id="purchase_description" name="purchase_description" rows="3" data-bind="value: purchase_description"></textarea></td>
					<td><span>ពិពណ៏នាលក់ចេញ:</span></td>
					<td><textarea id="sale_description" name="sale_description" rows="3" data-bind="value: sale_description"></textarea></td>
				</tr>
				<tr>
					<td> ថ្លៃដើម:</td>
					<td><input data-role="numerictextbox" data-format="c" id="cost" name="cost" min="0" value="0" data-bind="value: cost"></td>
					<td>តំលៃ:</td>
					<td><input data-role="numerictextbox" data-format="c" id="price" name="price" min="0" value="0" data-bind="value: price"></td>
				<td></td>
				<td > <label class="checkbox"><input type="checkbox" id="status" name="status" data-bind="checked: status"/> Active</label></td>
				</tr>
			<tr>
				<td><span id="phase_title" style="display: none;">Phase:</span></td>
				<td><span id="phase_input" style="display: none;"><select id="phase" name="phase" data-role="combobox" data-text-field="phase" data-value-field="id" data-bind="source: phaseSource , value: phase" placeholder="---ជ្រើសរើសយកមួយ---"  ></select></span></td>
				<td><span id="ampere_title" style="display: none;">Ampere:</span></td>
				<td><span id="ampere_input" style="display: none;"><select id="ampere" name="ampere" data-role="combobox" data-text-field="ampere" data-value-field="id" data-bind="source: ampereSource , value: ampere" placeholder="---ជ្រើសរើសយកមួយ---"  ></select></span></td>						
			</tr>
			<tr>
				<td><span id="fuse_title" style="display: none;">Fuse:</span></td>
				<td><span id="fuse_input" style="display: none;"><select id="fuse" name="fuse" data-role="combobox" data-value-field="id" data-text-field="fuse" data-bind="source: fuseSource, value: fuse" placeholder="---ជ្រើសរើសយកមួយ---"  ></select></span></td>
				<td><span id="voltage_title" style="display: none;">voltage:</span></td>
				<td><span id="voltage_input" style="display: none;"><select id="voltage" name="voltage" data-role="combobox" data-text-field="voltage" data-value-field="id" data-bind="source: voltageSource , value: voltage" placeholder="---ជ្រើសរើសយកមួយ---"  ></select></span></td>						
			</tr>
			<tr>
				<td></td>
				<td><button id="add" data-bind="events: {click: adds} " class="btn btn-primary" type="button" ><i class="icon-hdd icon-white"></i> កត់ត្រា</button><button id="edit" data-bind="events: { click: edits }" class="btn btn-primary" type="button" ><i class="icon-edit icon-white"></i> កែប្រែ</button><span> </span><button id="close" data-bind="events: {click: closes} " class="btn " type="submit" ><i class="icon-remove-circle icon-black"> </i> បិទ</button></td>						
			</tr> 
														 
		   </table>
	   <div class="status" align="center"></div>
	   
      </div>
	   </div>
    </div>
 	<!--End of Add New Modal and Edit Model -->
	   
		<div 
				data-role="grid"
				data-sortable= "true"
				data-navigatable= "true"
				data-selectable= "true"
				data-editable= "popup"
					
				data-bind="source: itemDS, events:{change: onSchange}"
               	data-columns= '[		
		{ field: "item_sku", title: "លេខកូដ sku" , width: "80px"},		
		{ field: "name", title: "ឈ្មោះ" , width: "100px"},	
		{ field: "purchase_description", title: "ពិពណ៏នា", width: "150px" },	
		{ field: "item_type_id", title: "ប្រភេទ",  width: "120px", template: "#= type_name.name #" },
		{ field: "general_account_id", title: "គណនី", width: "150px", template: "#= account_name.name #"},	
		{ field: "quantity", title: "ចំនួន" , width: "50px"},
		{ field: "price", title: "តំលៃ" , width: "100px", format: "{0:c}" },
		{ field: "status", title: "ប្រើការ" , width: "50px" },
		{ command: [{ name: "destroy", text: "លុប", template:"" }], title: "&nbsp;", width: "100px" }]'
						data-pageable= '[{
									         "refresh": "true",
									         "pageSizes": "true",
									         "buttonCount": 5
									     }]'


		></div>			   
	</form>
</div>
</script>

<!-- unit_measure -->
<script type="text/x-kendo-template" id="unit_measure">
	<div class="span12">
		<h1>រង្វាស់សន្និធិ</h1>
		<br>

		<div id="grid" data-role="grid" data-bind="source: unitMeasureDS"
				sortable= "true"
				data-navigatable= "true"		
				data-toolbar= '[{name:"create",text:"<b>បង្កើតថ្មី</b>"},{name:"save", text: "<b>កត់ត្រា</b>"}]'
				data-columns= '[			
					{ field: "type", title: "រង្វាស់សន្និធិ", width: "150px" },	
					{ field: "description", title: "ពិពណ៏នា" , width: "250px"},			
					{ command: [{ name: "destroy", text: "លុប" }], title: "&nbsp;", width: "190px" }]'
				data-editable= "true"
			
		>
			

		</div>	
	</div>
</script>

<!-- adjustment -->
<script type="text/x-kendo-template" id="adjustment">
	<div class="span12">
		<h1>Item Adjustment</h1>
		<br>
		<!-- Select Adjustment Info-->
		<div id="example">
			<div id="validate">
				<div class="well well-small">
			 			<table>
						<tr>														
							</td>
							<td>
								Adjustment Date: <span style="color:red">*</span>
							</td>
							<td width="300">
								<input id="date" name="date" data-role="datepicker" data-bind="value: date" required data-required-msg="Require Adjustment Date"/>		 
								
							</td>								
							
							<td>
								Ref No:
							</td>
							<td>
								<input id="voucher"  name="voucher" class="k-textbox span2" data-bind="value: voucher"/>
							</td>
						</tr>
						<tr>														
							</td>
							<td>
								
							</td>
							<td width="300">
								
								 <span class="k-invalid-msg" data-for="date"></span>
							</td>								
							
							<td>
								
							</td>
							<td>
								
							</td>
						</tr>
						<tr>														
							<td>
								Expense Account: <span style="color:red">*</span>
							</td>
							<td width="300">
								<select id="expense_account_id" name="expense_account_id" data-role="combobox" data-bind="source: expense_account_Source, value: expense_account_id" data-text-field="name" data-value-field="id" placeholder="---ជ្រើសរើសយកមួយ---" required data-required-msg="Require Adjustment Account (Expense)"></select>		 
							
							</td>								
							
							<td>
								Class:
							</td>
							<td>
								<select id="class" name="class" data-role="combobox" data-text-field="name" data-value-field="id" placeholder="---ជ្រើសរើសយកមួយ---"  data-bind="source: classSource, value: class"></select>
							</td>
						</tr>
						<tr>														
							<td>
								
							</td>
							<td width="300">
								 <span class="k-invalid-msg" data-for="expense_account_id"></span>
							</td>								
							
							<td>
								
							</td>
							<td>
								
							</td>
						</tr>
						<tr>														
							<td>
								Income Account: <span style="color:red">*</span>
							</td>
							<td width="300">
								<select id="income_account_id" name="income_account_id" data-role="combobox" data-bind="source: income_account_Source, value: income_account_id" data-text-field="name" data-value-field="id" placeholder="---ជ្រើសរើសយកមួយ---" required data-required-msg="Require Adjustment Account (Income)"></select> 
								
							</td>								
							
							<td>
								Memo:
							</td>
							<td>
								<input id="memo" name="memo"  data-bind="value: memo" class="k-textbox span3" />
							</td>
						</tr>
						<tr>														
							<td>
								
							</td>
							<td width="300">
									 
								 <span class="k-invalid-msg" data-for="income_account_id"></span>
							</td>								
							
							<td>
								
							</td>
							<td>
								
							</td>
						</tr>
					</table>			
				</div>
			    <div class="status" align="center"></div>		
				
				<div align="left">
					<br>
		   			<button id="add" class="btn btn-primary" type="button" data-bind="events:{ click: addEvent }" ><i class="icon-hdd icon-white"></i> កត់ត្រា</button><span> </span><button id="clear" class="btn " data-bind="events:{ click: clearEvent }" type="submit" ><i class="icon-remove-circle icon-black"> </i> មោឃភាព</button>
		   	 		<br>
				</div>
		  		<div id="grid"
		  				data-role="grid"
						data-bind="source: itemDS"
						data-sortable= "true"
						data-navigatable= "true"
						data-selectable= "true"					
						data-columns= '[						
							{ field: "name", title: "ឈ្មោះ" , width: "230px"},	
							{ field: "purchase_description", title: "ពិពណ៏នា", width: "250px" },		
							{ field: "quantity", title: "ចំនួន" , width: "100px"},
							{ field: "new_quantity", title: "ចំនួនថ្មី" , width: "100px" },		
							{ field: "adjustment_outcome", title: "ចំណេញ/ខាត" , width: "100px" },
							{ command: [{ name: "destroy", text: "លុប" }], title: "&nbsp;", width: "100px" }
							]'
						data-editable= "true"
						data-pageable= '[{
									         "refresh": "true",
									         "pageSizes": "true",
									         "buttonCount": 5
									     }]'



		  		></div>
		  	    
			</div>
	   </div>				
	</div>		

	<!-- Success Modal Start -->
	<div id="successModal" class="modal hide fade">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h3>Message</h3>
	  </div>
	  <div class="modal-body">
	    <p>Receipt has been created successfully.</p>
	  </div>
	  <div class="modal-footer">
	    <a href="#" id="close" class="btn" data-bind="events:{ click: close }">Close</a>
	  </div>
	</div>
	 <!-- Success Modal End -->
</script>

<!-- Goods Reciept Note -->
<script id="grnView" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<button class="btn btn-inverse pull-right" data-bind="click: closeX">X</button>
			<div id="grnVa">
				<h4 align="center">លិខិតដឹកជញ្ជូន</h4>
				<div class="row-fluid">
					<div class="span8">						
						អ្នក់ផ្គត់ផ្គង់
						<input type="text" id="vendor" name="vendor" placeholder="---ជ្រើសយកមួយ---" data-bind="value: vendor.company" required data-required-msg="ត្រូវការអ្នកផ្គត់ផ្គង់មួយ">
						<br/><br/>
						អាសយដ្ឋាន
						<br>
						<textarea readonly id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: vendor.address"></textarea>								
					</div>

					<div class="span4">			
						<table>
							<tr>
								<td>
									លេខលិខិតដឹកជញ្ជូន
								</td>
								<td>
									<input class="k-textbox" data-bind="value: number" style="width:138px;" readonly />
								</td>
							</tr>							
							<tr>
								<td>
									កាលបរិច្ឆេទ
								</td>
								<td>
									<input data-role="datepicker" data-bind="value: date" data-format="dd-MM-yyyy" />
								</td>
							</tr>
							<tr>
				                <td>Class</td>
				              	<td><select id="classes" name="classes" data-role="combobox" 
				              				data-text-field="name" data-value-field="id" 
				              				data-bind="source: classDS, value: class_id"
				              				required data-required-msg="ត្រូវការ Class" placeholder="---ជ្រើសយកមួយ---" ></select>
				              	</td>
				            </tr>					
						</table>
					</div>							         		          	
			    </div>			
				
				<br>

				<div data-role="grid" data-bind="source: itemsList"
			        data-auto-bind="false"				        
			        data-row-template="grnRowTemplate"				                        
			        data-columns='[{ title: "", width: 20 },
			        	{ title: "ល.រ", width: 35 },
			            { title: "ទំនិញ", width: 200 },
			            { title: "តំលៃ", width: 85 },                
			            { title: "ចំនួនបញ្ជាទិញ", width: 200 },
			            { title: "ចំនួនទទួល", width: 85 }           	                    
			            ]'>
				</div>
				<br/>
				<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>
				
				<div class="row-fluid">
					<div class="span8">
						<br/>
						<b>សំគាល់:</b>
						<br>
						<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
						<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: remark" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
						<br/><br/>
						<span id="status"></span>
					</div>
					<div class="span4" align="left">
						<div class="right">
							ចំនួនសរុប:
							<span bgcolor="#00BFFF" data-bind="text: totalQuantity"></span>								
						</div>
						<p></p>			
						<button id="save" class="btn btn-primary" data-bind="click: save"><i class="icon-hdd icon-white"></i> កត់ត្រា</button> 					
					</div>		
				</div>
			</div>

		</div>
	</div>		
</script>

<script id="grnRowTemplate" type="text/x-kendo-tmpl">		
	<tr>		
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>			
		</td>
		<td class="sno">1</td>
		<td>
			<select id="item" name="item" data-role="combobox" 
					data-text-field="name" data-value-field="id" 
					data-bind="source: items, value: item_id, events: {change : itemChange}"
					required data-required-msg="ត្រូវការ ទំនិញ" style="width:200px">
			</select>
		</td>		
		<td>
			<input id="description" name="description" type="text" 
					data-bind="value: unit_price" style="margin-bottom: 0;" 
					required data-required-msg="ត្រូវការ ពណ៌នា" />
		</td>
		<td>
			<input id="quantity" name="quantity" data-role="numerictextbox" 
					data-format="n0" data-min="1"
					data-bind="value: qty_ordered, events: {change : change}"
					style="width: 80px;" />
		</td>
		<td>
			<input id="quantity" name="quantity" data-role="numerictextbox" 
					data-format="n0" data-min="1"
					data-bind="value: quantity, events: {change : change}"
					required data-required-msg="ត្រូវការ ចំនួន" style="width: 80px;" />
		</td>				
    </tr>   
</script>
<!-- End InventoryView -->


<!-- BY DAWINE ================================================== -->
<!-- Customer -->
<script id="customer" type="text/x-kendo-template">
	<div class="span12" id="header"></div>

	<div id="content" class="row">
		<div class="widget widget-heading-simple widget-body-gray widget-employees">		
			<div class="widget-body padding-none">	
				<div class="row-fluid row-merge">
					<div class="span3 listWrapper" style="height: 500px;">
						<div class="innerAll">
							<form autocomplete="off" class="form-inline">
								<div class="widget-search separator bottom">
									<button type="button" class="btn btn-default pull-right" id="search"><i class="icon-search"></i></button>
									<div class="overflow-hidden">
										<input id="searchField" name="searchField" type="search" value="" placeholder="ស្វែងរក អតិថិជន">
									</div>
								</div>
								<div class="select2-container" style="width: 100%;">
									<div class="overflow-hidden">
										<input id="company" name="company" placeholder="អាជ្ញាបណ្ណ" style="width: 100%" tabindex="-1" />
										<input id="transformer" name="transformer" placeholder="តំបន់" disabled="disabled" style="width: 100%" tabindex="-1" />										
									</div>
								</div>
							</form>
						</div>						
						<div class="table table-condensed" id="sidebar" style="height: 605px;"></div>
					</div>
					<div class="span9 detailsWrapper">
						<div class="innerLR">
							<div class="navbar" data-bind="visible: showMenu">
								<div class="navbar-inner">					
									<ul class="nav">
										<li><a href="#" data-bind="click: goDashBoard">ប្រតិបត្តិការ</a></li>
										<li><a href="#" data-bind="click: goDetail">ព័តមានលំអិតអថិជន</a></li>
										<li><a href="#" data-bind="click: goStatement">បញ្ជីបំណុល</a></li>
										<li><a href="#invoice">វិក្កយប័ត្រ</a></li>
										<li><a href="#receipt">បង្កាន់ដៃលក់</a></li>				
										<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">ផ្នែកអគ្គីសនី <i class="caret"></i></a>
											<ul class="dropdown-menu">
												<li><a href="#" data-bind="click: goEMeter">កុងទ័រ</a></li>
											    <li><a href="#" data-bind="click: goEReadingSingle">អំនានកុងទ័រ</a></li>
											    <li><a href="#" data-bind="click: goNotice">លិខិតរំលឹក</a></li>
											</ul>
										</li>
										<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">ផ្សេងៗ <i class="caret"></i></a>
											<ul class="dropdown-menu">
												<li><a href="#so">បញ្ជាលក់</a></li>
											    <li><a href="#estimate">សម្រង់តម្លៃ</a></li>
											    <li><a href="#gdn">លិខិតដឹកជញ្ជូន</a></li>
											</ul>
										</li>
									</ul>
								</div>
							</div>

							<div id="detail"></div>							
						</div>					
					</div>
				</div>	
			</div>
		</div>
	</div>
</script>
<script id="customerListTmpl" type="text/x-kendo-template">
	<tr>
		<td>
			<div class="media-body">
				<span class="strong">
					#if(company==""){#
						#=number# #=surname# #=name#
					#}else{#
						#=number# #=company#
					#}#					
				</span>
			</div>
		</td>
	</tr>
</script>
<script id="customerDashboard" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">

				<div class="row-fluid">
					<div class="span3" data-bind="click: loadOpenEstimate" style="color: white; font-size: 20px; background-color:Purple; border:0px solid black; padding: 10px;">
						សម្រង់តម្លៃ
						<br><br>
						<span data-bind="text: totalEstimate" ></span>
						<span style="font-size: 14px">មិនទាន់យល់ព្រម</span>
					</div>
					
					<div class="span3" data-bind="click: loadOpenSO" style="color: white; font-size: 20px; background-color:MediumSeaGreen; border:0px solid black; padding: 10px;">
						បញ្ជាលក់
						<br><br>
						<span data-bind="text: totalSO" ></span>
						<span style="font-size: 14px">មិនទាន់រៀបចំ</span>
					</div>

					<div class="span3" data-bind="click: loadOpenInvoice" style="color: white; font-size: 20px; background-color:Orange; border:0px solid black; padding: 10px;">
						វិក្កយបត្រ
						<br><br>
						<span data-bind="text: totalOpenInvoice" ></span>
						<span style="font-size: 14px">មិនទាន់ទូទាត់</span>
					</div>

					<div class="span3" data-bind="click: loadOverDueInvoice" style="color: white; font-size: 20px; background-color:Crimson; border:0px solid black; padding: 10px;">
						វិក្កយបត្រ
						<br><br>
						<span data-bind="text: totalOverDue" ></span>
						<span style="font-size: 14px">ហួសកំណត់</span>
					</div>		          	
	          	</div>

	          	<div class="row">
					<div class="span6">
						<div class="innerAll padding-bottom-none-phone">
							<a href="" class="widget-stats widget-stats-primary widget-stats-4">
								<span class="txt">សមតុល្យសរុប</span>
								<span class="count" style="font-size: 35px;" data-bind="text: balance"></span>
								<span class="glyphicons coins"><i></i></span>
								<div class="clearfix"></div>
								<i class="icon-play-circle"></i>
							</a>
						</div>
					</div>					
					<div class="span6">
						<div class="chart" data-role="chart" data-bind="source: monthlySaleList"
							data-auto-bind="false"
						  	data-legend="{position: 'bottom'}"
						  	data-series="[			  				
							  				{ type: 'line', field: 'amt' },
							  				{ type: 'column', field: 'amt' }
						  			   	]"			  	
						  	data-category-Axis="{ field: 'month',			  						   
						  						  labels: { rotation: 0
						  								  } 
												}"
						  	data-value-Axis="{ labels: {format: '0'}, 
							  					min:0, max: 100000, 
							  					majorUnit: 10000,
							  					majorGridLines: { width: 1 }
						  					}"
						  	data-chart-area="{ height: 180 }"
						  	data-tooltip="{ visible: true, format: 'NO' }">
						</div>	
					</div>					
				</div>

				<div>
					<select id="dateSorter" data-role="dropdownlist" data-bind="value: date_sorter, events:{change:dateSorterChange}">
					   	<option value="today">ថ្ងៃនេះ</option>
					  	<option value="week">សប្ដាស៍នេះ</option>
					  	<option value="month">ខែនេះ</option>
					  	<option value="year">ឆ្នាំនេះ</option>
					</select>					
					<input data-role="datepicker" data-bind="value: start_date" data-format="dd-MM-yyyy" placeHolder="ចាប់ពីថ្ងៃទី" />
					<input data-role="datepicker" data-bind="value: end_date" data-format="dd-MM-yyyy" placeHolder="ដល់" />
					<button type="button" class="btn btn-default" data-bind="click: loadStatementCollection"><i class="icon-search"></i></button>				
				</div>

				<div data-role="grid" data-bind="source: statementCollectionList"
			        data-row-template="statementCollectionRowTemplate" 
			        data-pageable="true" 
			        data-auto-bind="false"
			        data-sortable="true"              
			        data-columns="[{ title: 'កាលបរិច្ឆេទ' }, 
			            { title: 'ប្រភេទ' },	                     
			            { title: 'លេខកូដ' },	                                      
			            { title: 'ទឹកប្រាក់' },
			            { title: 'ស្ថានភាព' },
			            { title: 'ធ្វើការ'}                    
			            ]">
				</div>

			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->
</script>
<script id="statementCollectionRowTemplate" type="text/x-kendo-tmpl">
    <tr>        
        <td>#:kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
        <td>#:typeName#</td>
        <td>
        	#if(type==="Invoice"){#								
				<a href="\#invoice/#=id#"><i></i> #=number#</a>	
			#}else if(type==="Receipt"){#
        		<a href="\#receipt/#=id#"><i></i> #=number#</a>        	        		
			#}else if(type==="SO"){#
        		<a href="\#so/#=id#"><i></i> #=number#</a>
        	#}else if(type==="Estimate"){#        		
        		<a href="\#estimate/#=id#"><i></i> #=number#</a>
        	#}else if(type==="GDN"){#        		
        		<a href="\#gdn/#=id#"><i></i> #=number#</a>
        	#}else{#
        		#=number#
        	#}#
        </td>
        <td align="right">#:kendo.toString(kendo.parseFloat(amount)/kendo.parseFloat(rate), "c", sub_code)#</td>
        <td>        	
        	#if(type==="Invoice" || type==="eInvoice" || type==="Notice"){#
        		#if(status==="0" || status==="2") {#
        			# var date = new Date(), dueDate = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
					#if(dueDate < toDay) {#
						លើសកំណត់ #:Math.floor((toDay - dueDate)/(1000*60*60*24))# ថ្ងៃ
					#} else {#
						#:Math.floor((dueDate - toDay)/(1000*60*60*24))# ថ្ងៃនឹងត្រូវទូទាត់
					#}#
				#} else {#
					ទូទាត់រួច
				#}#
        	#}else if(type==="SO" || type==="GDN"){#
        		#if(status==="0"){#
        			មិនទាន់រៀបចំ
        		#}else{#
        			រៀបចំរូច        			
        		#}#
        	#}else if(type==="Estimate"){#        		
        		#if(status==="0"){#
        			មិនទាន់យល់ព្រម
        		#}else{#
        			យល់ព្រម        			
        		#}#
        	#}#			
		</td> 
		<td align="center">
			#if(type==="Invoice"){#
				#if(status==="0" || status==="2"){#					
					<a href="\#cashier_single/#=id#"><i></i> ទទួលប្រាក់</a>
				#}#
			#}else if(type==="eInvoice"){#
        		#if(status==="0" || status==="2"){#
        			<a href="\#cashier_single/#=id#"><i></i> ទទួលប្រាក់</a>
        		#}#
        	#}else if(type==="Notice"){#
        		#if(status==="0" || status==="2"){#
        			<a href="\#cashier_single/#=id#"><i></i> ទទួលប្រាក់</a>
        		#}#
			#}else if(type==="SO"){#
        		#if(status==="0"){#
        			
        		#}#
        	#}else if(type==="Estimate"){#        		
        		#if(status==="0"){#
        			
        		#}#
        	#}else if(type==="GDN"){#        		
        		#if(status==="0"){#
        			
        		#}#
        	#}#
		</td>        
   	</tr>
</script>
<script id="customerSingle" type="text/x-kendo-template">	
	<div class="row-fluid">    
		<div class="span12">			
			<div id="example" class="k-content">						

				<div class="row-fluid">
					<div class="span3">
						<label for="company">អាជ្ញាបណ្ណ <span style="color:red">*</span></label>									 
						<select id="company" name="company" data-role="dropdownlist" 
								data-text-field="abbr" data-value-field="id" 
              					data-bind="source: companyList, value: company_id"
              					data-option-label="(--- ជ្រើសរើស ---)"	              					
              					required data-required-msg="ត្រូវការ អាជ្ញាបណ្ណ"></select>
					</div>							
					<div class="span3">											
						<label for="customerType">ប្រភេទអតិថិជន <span style="color:red">*</span></label>							
			            <select id="customerType" name="customerType" data-role="dropdownlist" 
			            		data-text-field="name" data-value-field="id" 
	                			data-bind="source: customerTypeList, value: people_type_id, events:{ change: peopleTypeChange}"
	                			data-option-label="(--- ជ្រើសរើស ---)" 
	                			required data-required-msg="ត្រូវការ ប្រភេទអតិថិជន"></select>
					</div>
					<div class="span3">
						<label for="classes">Class <span style="color:red">*</span></label>
			            <select id="classes" name="classes" data-role="dropdownlist" 
	              				data-text-field="name" data-value-field="id" 
	              				data-bind="source: classList, value: class_id"
	              				data-option-label="(--- Class ---)"
	              				required data-required-msg="ត្រូវការ Class"></select>
					</div>					
					<div class="span3">
						<label for="registered_date">ថ្ងៃចុះឈ្មោះ <span style="color:red">*</span></label>
			            <input id="registered_date" name="registered_date" data-role="datepicker" 
            					data-bind="value: registered_date" data-format="dd-MM-yyyy" 
            					placeholder="ថ្ងែ-ខែ-ឆ្នាំ" required data-required-msg="ត្រូវការ ថ្ងៃចុះឈ្មោះ" />
					</div>																
				</div>						

				<br>
				<div class="separator line bottom"></div>

				<div class="row-fluid">									
					<div class="span3">						
						<label for="number">លេខកូដ <span style="color:red">*</span></label>
              			<input id="number" name="number" class="k-textbox"
	              				data-bind="value: number, events: { change: checkExistingNumber }" 
	              				placeholder="e.g. AB0001" required data-required-msg="ត្រូវការ លេខកូដ" />
	              		<span data-bind="text: msgCustomerNo" style="color: red;"></span>
					</div>
					<div class="span3">
						<label for="surname">គោត្តនាម <span style="color:red">*</span></label>
	              		<input id="surname" name="surname" class="k-textbox" data-bind="value: surname" 
			              		placeholder="ត្រកូល" required data-required-msg="ត្រូវការ គោត្តនាម" />
					</div>
					<div class="span3">							
						<label for="name">នាម <span style="color:red">*</span></label>
			            <input id="name" name="name" class="k-textbox" data-bind="value: name" 
			              		placeholder="ឈ្មោះ" required data-required-msg="ត្រូវការ នាម" />
					</div>
					<div class="span3" data-bind="visible: isCompany">
						<label for="companyName">ក្រុមហ៊ុន <span style="color:red">*</span></label>
						<input id="companyName" name="companyName" class="k-textbox" data-bind="enabled: isCompany, value: company" 
								required data-required-msg="ត្រូវការ ក្រុមហ៊ុន"
								placeholder="e.g. PCG & Partner" />	
					</div>										
				</div>

				<br>
				<div class="separator line bottom"></div>

				<div class="row-fluid">					
					<div class="span3">						
			            <label for="currencyCBB">រូបិយ​ប័ណ្ណ <span style="color:red">*</span></label>
			            <input id="currencyCBB" name="currencyCBB" data-bind="value: currency_code" 
			            		required data-required-msg="ត្រូវការ រូបិយ​ប័ណ្ណ"/>
			        </div>
					<div class="span3">
						<label for="ar">គណនីអតិថិជន <span style="color:red">*</span></label>
			            <select id="ar" name="ar" data-role="dropdownlist" 
			            		data-text-field="name" data-value-field="id" 
	            				data-bind="source: accountList, value: account_receiveable_id" 
	            				data-option-label="(--- ជ្រើសរើស ---)" 
	            				required data-required-msg="ត្រូវការ គណនីចំណូល"></select>
					</div>
					<div class="span3">
						<label for="revenueAccount">គណនីចំណូល <span style="color:red">*</span></label>
			            <select id="revenueAccount" name="revenueAccount" data-role="dropdownlist" 
			            		data-text-field="name" data-value-field="id" 
	            				data-bind="source: revenueAccountList, value: revenue_account_id"
	            				data-option-label="(--- ជ្រើសរើស ---)" 
	            				required data-required-msg="ត្រូវការ គណនីចំណូល"></select>
					</div>
					<div class="span3" data-bind="visible: isCompany">
						<label for="vatNo">លេខ VAT</label>								
	            		<input id="vatNo" name="vatNo" class="k-textbox" data-bind="value: vat_no" 
								placeholder="e.g. 01234567897">												
					</div>					
				</div>

				<br>
				<div class="separator line bottom"></div>						

				<div class="row-fluid">							
					<input type="checkbox" data-bind="checked: use_electricity"> ប្រើប្រាស់សេវាកម្មអគ្គីសនី																
				</div>

				<br>
				<div class="separator line bottom"></div>

				<!-- // Inner Tabs -->
				<div class="row-fluid">								
					<div class="box-generic">
					    <!-- //Tabs Heading -->
					    <div class="tabsbar tabsbar-2">
					        <ul class="row-fluid row-merge">					            					            
					            <li class="span3 glyphicons circle_info active"><a href="#tab1-4" data-toggle="tab"><i></i> <span>ពត័មានផ្សេងៗ</span></a>
					            </li>
					            <li class="span3 glyphicons electricity" data-bind="visible: use_electricity"><a href="#tab2-4" data-toggle="tab"><i></i> <span>ពត័មានភ្ជាប់ចរន្តអគ្គីសនី</span></a>
					            </li>
					            <li class="span3 glyphicons phone"><a href="#tab3-4" data-toggle="tab"><i></i> <span>ទំនាក់ទំនង</span></a>
					            </li>
					            <li class="span3 glyphicons home"><a href="#tab4-4" data-toggle="tab"><i></i> <span>អាសយដ្ឋាន</span></a>
					            </li>								            
					        </ul>
					    </div>
					    <!-- // Tabs Heading END -->

					    <div class="tab-content">					        

					        <!-- //OTHER INFOMATION Tab content -->
					        <div class="tab-pane active" id="tab1-4">
				            	<table width="100%" cellpadding="5" cellspacing="5">						            	
				            		<tr>
						                <td>ស្ថានភាព <span style="color:red">*</span></td>
						              	<td>
						              		<input id="status" name="status" data-role="dropdownlist"
							            		data-text-field="name"
				           						data-value-field="id" 
							            		data-bind="source: statusList, value: status"					            							            		
							            		data-option-label="(--- ជ្រើសរើស ---)"
							            		required data-required-msg="ត្រូវការ ស្ថានភាព" />
						              	</td>
						              	<td>លេខអត្តសញ្ញាណប័ណ្ណ</td>
						              	<td><input id="card_number" class="k-textbox" data-bind="value: card_number" placeholder="e.g. 123456789" /></td>								            	
						            </tr>
						            <tr>
						              	<td>ភេទ</td>
						              	<td><select data-role="dropdownlist" data-bind="source: genders, value: gender"></select></td>
						              	<td>សមាជិកគ្រួសារ</td>
						              	<td><input id="family_member" class="k-textbox" data-bind="value: family_member" placeholder="e.g. 3" /></td>
						            </tr>
						            <tr>
						            	<td>ថ្ងៃកំណើត</td>
						              	<td><input id="dob" data-role="datepicker" data-bind="value: dob" data-format="dd-MM-yyyy" placeholder="ថ្ងែ-ខែ-ឆ្នាំ" /></td>									              	
						              	<td>មុខរបរ</td>
						              	<td><input id="job" class="k-textbox" data-bind="value: job" placeholder="e.g. គ្រូបង្រៀន" /></td>
						            </tr>
						            <tr valign="top">
						              	<td>ទីកន្លែងកំណើត</td>
						              	<td><input id="pob" class="k-textbox" data-bind="value: pob" placeholder="e.g. ផ្ទះ ផ្លូវ ភូមិ សង្កាត់ ខណ្ឌ" />						            
						            	<td>សំគាល់</td>
						              	<td><input class="k-textbox" data-bind="value: memo" placeholder="..." /></td>									              							              									              	
						            </tr>								            								            								            			            
						        </table>
				        	</div>
					        <!-- // Tab content END -->

					        <!-- //ELECTRICITY INFORMATION Tab content -->
					        <div class="tab-pane" id="tab2-4" data-bind="visible: use_electricity">
				            	<table width="100%" cellpadding="5" cellspacing="5">							            
						            <tr>
						            	<td width="150px">តំបន់ <span style="color:red">*</span></td>
										<td>
											<select id="transformer" name="transformer" data-role="dropdownlist" data-text-field="transformer_number" data-value-field="id"
						              				data-cascade-from="company" data-bind="enabled: use_electricity, source: transformerList, value: transformer_id" data-auto-bind="false" 
						              				data-option-label="(--- ជ្រើសរើស ---)" required data-required-msg="ត្រូវការ តំបន់"></select>
										</td>
										<td>ផែនការតំលៃលក់ <span style="color:red">*</span></td>
						                <td><select id="tariff_plan" name="tariff_plan" data-role="dropdownlist" data-text-field="name" data-value-field="id" 
						                			data-bind="enabled: use_electricity, source: tariffPlanList, value: tariff_plan_id" data-option-label="(--- ជ្រើសរើស ---)"
						                			required data-required-msg="ត្រូវការ ផែនការតំលៃលក់"></select></td>									            										                								                						                
						            </tr>
						            <tr>
						            	<td>អាំងតង់សុីតេ <span style="color:red">*</span></td>		                    
						                <td><select id="ampere" name="ampere" data-role="dropdownlist" data-text-field="ampere" data-value-field="id" 
						                			data-bind="enabled: use_electricity, source: ampereList, value: ampere_id" data-option-label="(--- ជ្រើសរើស ---)"
						                			required data-required-msg="ត្រូវការ អាំងតង់សុីតេ"></select></td>									            	
						                <td>បញ្ចុះតំលៃ</td>		                    
						                <td><select id="exemption" name="exemption" data-role="dropdownlist" data-text-field="name" data-value-field="id" 
						                			data-bind="enabled: use_electricity, source: exemptionList, value: exemption_id" data-option-label="(--- ជ្រើសរើស ---)"></select></td>							                						                
						            </tr>
						            <tr>
						            	<td>ចំនួនហ្វា <span style="color:red">*</span></td>		                    
						                <td><select id="phase" name="phase" data-role="dropdownlist" data-text-field="phase" data-value-field="id" 
						                			data-bind="enabled: use_electricity, source: phaseList, value: phase_id" data-option-label="(--- ជ្រើសរើស ---)"
						                			required data-required-msg="ត្រូវការ ចំនួនហ្វា"></select></td>									            					            	
						            	<td>ថែទាំ</td>		                    
						                <td><select id="maintenance" name="maintenance" data-role="dropdownlist" data-text-field="name" data-value-field="id" 
						                			data-bind="enabled: use_electricity, source: maintenanceList, value: maintenance_id" data-option-label="(--- ជ្រើសរើស ---)"></select></td>								            	
						            </tr>
						            <tr>
						            	<td>តុងស្យុង <span style="color:red">*</span></td>		                    
						                <td><select id="voltage" name="voltage" data-role="dropdownlist" data-text-field="voltage" data-value-field="id" 
						                			data-bind="enabled: use_electricity, source: voltageList, value: voltage_id" data-option-label="(--- ជ្រើសរើស ---)"
						                			required data-required-msg="ត្រូវការ តុងស្យុង"></select></td>				            	
						            	<td></td>
						            	<td></td>
						            </tr>
						        </table> 
				        	</div>
					        <!-- // Tab content END -->

					        <!-- //CONTACT Tab content -->
					        <div class="tab-pane" id="tab3-4">
				            	<table width="100%" cellpadding="5" cellspacing="5">
									<tr valign="top">													
										<td>
											<div class="input-prepend">
												<span class="add-on glyphicons phone"><i></i></span>
												<input type="tel" id="inputPhone" class="input-large" placeholder="លេខទូរស័ព្ទ" data-bind="value: phone">
											</div>
										</td>													
										<td>
											<div class="input-prepend">
												<span class="add-on glyphicons google_maps"><i></i></span>
												<input type="tel" id="inputPhone" class="input-large" placeholder="latitute" data-bind="value: latitute">
											</div>
										</td>										
									</tr>
									<tr valign="top">													
										<td>
											<div class="input-prepend">
												<span class="add-on glyphicons envelope"><i></i></span>
												<input type="email" id="inputEmail" class="input-large" placeholder="អីុម៉ែល" data-bind="value: email">
											</div>
										</td>
										<td>
											<div class="input-prepend">
												<span class="add-on glyphicons pinboard"><i></i></span>
												<input type="tel" id="inputPhone" class="input-large" placeholder="longtitute" data-bind="value: longtitute">
											</div>
										</td>																				
									</tr>
									<tr>
										<td>
											<div class="input-prepend">
												<span class="add-on glyphicons globe_af"><i></i></span>
												<input type="text" id="inputZipCode" class="input-large" placeholder="zip code" data-bind="value: zip_code">
											</div>
										</td>
										<td></td>
									</tr>																																									
								</table>
					        </div>
					        <!-- // Tab content END -->

					        <!-- //ADDRESS Tab content -->
					        <div class="tab-pane" id="tab4-4">
				            	<table width="100%" cellpadding="5" cellspacing="5">
									<tr valign="top">													
										<td>
											<div class="input-prepend">
												<span class="add-on glyphicons home"><i></i></span>
												<input type="text" id="inputAddress1" class="input-large" placeholder="អាសយដ្ឋាន ១" data-bind="value: address">
											</div>														
										</td>										
										<td>ខេត្ត/រាជធានី</td>
										<td>
											<select id="province" name="province" data-role="dropdownlist" data-text-field="name" data-value-field="id" 
	              									data-bind="source: provinceList, value: province_id" data-option-label="(--- ជ្រើសរើស ---)"></select>
										</td>
									</tr>
									<tr valign="top">													
										<td>
											<div class="input-prepend">
												<span class="add-on glyphicons home"><i></i></span>
												<input type="text" id="inputAddress2" class="input-large" placeholder="អាសយដ្ឋាន ២" data-bind="value: address2">
											</div>														
										</td>										
										<td>ស្រុក/ខណ្ឌ</td>
										<td>
											<select id="district" name="district" data-role="dropdownlist" data-text-field="name" data-value-field="id" data-auto-bind="false" 
	              									data-cascade-from="province" data-bind="source: districtList, value: district_id" data-option-label="(--- ជ្រើសរើស ---)"></select>
										</td>
									</tr>
									<tr valign="top">													
										<td>
											<div class="input-prepend">
												<span class="add-on glyphicons home"><i></i></span>
												<input type="text" id="inputAddress3" class="input-large" placeholder="អាសយដ្ឋាន ៣" data-bind="value: address3">
											</div>														
										</td>										
										<td>ឃុំ/សង្កាត់</td>
										<td>
											<select id="commune" data-role="dropdownlist" data-text-field="name" data-value-field="id" data-auto-bind="false"
	              									data-cascade-from="district" data-bind="source: communeList, value: commune_id" data-option-label="(--- ជ្រើសរើស ---)"></select>
										</td>											
									</tr>
									<tr valign="top">													
										<td>
											<div class="input-prepend">
												<span class="add-on glyphicons home"><i></i></span>
												<input type="text" id="inputAddress4" class="input-large" placeholder="អាសយដ្ឋាន ៤" data-bind="value: address4">
											</div>														
										</td>										
										<td>ភូមិ/ក្រុម</td>
										<td>
											<select id="village" data-role="dropdownlist" data-text-field="name" data-value-field="id" data-auto-bind="false"
	              									data-cascade-from="commune" data-bind="source: villageList, value: village_id" data-option-label="(--- ជ្រើសរើស ---)"></select>
										</td>
									</tr>																							
								</table>
					        </div>
					        <!-- // Tab content END -->					        								        

					    </div>
					</div>
				</div>							
				
				<!-- //Form actions -->
				<div class="form-actions" style="margin: 0;" align="center">
					<div id="status"></div>								
					<button id="save" type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i> កត់ត្រា</button>
				</div>
				<!-- // Form actions END -->							
			</div> <!-- // End div example-->  
		</div> <!-- // End div span12-->		
	</div> <!-- // End div row-fluid-->	
</script>
<script id="newCustomer" type="text/x-kendo-template">	
	<div id="slide-form" class="container">
		<div class="row">
			<div class="span12">
				<div id="example" class="k-content">						
					<div align="right">			        				        	
			        	<button type="button" aria-hidden="true" data-bind="click:closeX">X</button>			        	
					</div>
					<h3 class="heading glyphicons user_add"><i></i>ចុះឈ្មោះអតិថិជនថ្មី</h3>

					<div>
						<div class="row-fluid">
							<div class="span3">
								<label for="company">អាជ្ញាបណ្ណ <span style="color:red">*</span></label>									 
								<select id="company" name="company" data-role="dropdownlist" 
										data-text-field="abbr" data-value-field="id" 
		              					data-bind="source: companyList, value: company_id, events:{ change: companyChange}"
		              					data-option-label="(--- ជ្រើសរើស ---)"	              					
		              					required data-required-msg="ត្រូវការ អាជ្ញាបណ្ណ"></select>
							</div>							
							<div class="span3">											
								<label for="customerType">ប្រភេទអតិថិជន <span style="color:red">*</span></label>							
					            <select id="customerType" name="customerType" data-role="dropdownlist" 
					            		data-text-field="name" data-value-field="id" 
			                			data-bind="source: customerTypeList, value: people_type_id, events:{ change: peopleTypeChange}"
			                			data-option-label="(--- ជ្រើសរើស ---)" 
			                			required data-required-msg="ត្រូវការ ប្រភេទអតិថិជន"></select>
							</div>
							<div class="span3">								
								<label for="classes">Class <span style="color:red">*</span></label>
					            <select id="classes" name="classes" data-role="dropdownlist" 
			              				data-text-field="name" data-value-field="id" 
			              				data-bind="source: classList, value: class_id"
			              				data-option-label="(--- Class ---)"
			              				required data-required-msg="ត្រូវការ Class"></select>
							</div>					
							<div class="span3">
								<label for="registered_date">ថ្ងៃចុះឈ្មោះ <span style="color:red">*</span></label>
					            <input id="registered_date" name="registered_date" data-role="datepicker" 
		            					data-bind="value: registered_date" data-format="dd-MM-yyyy" 
		            					placeholder="ថ្ងែ-ខែ-ឆ្នាំ" required data-required-msg="ត្រូវការ ថ្ងៃចុះឈ្មោះ" />
							</div>																
						</div>						

						<br>
						<div class="separator line bottom"></div>

						<div class="row-fluid">									
							<div class="span3">						
								<label for="number">លេខកូដ <span style="color:red">*</span></label>
		              			<input id="number" name="number" class="k-textbox"
			              				data-bind="value: number, events: { change: checkExistingNumber }" 
			              				placeholder="e.g. AB0001" required data-required-msg="ត្រូវការ លេខកូដ" />
			              		<span data-bind="text: msgCustomerNo" style="color: red;"></span>
							</div>
							<div class="span3">
								<label for="surname">គោត្តនាម <span style="color:red">*</span></label>
			              		<input id="surname" name="surname" class="k-textbox" data-bind="value: surname" 
					              		placeholder="ត្រកូល" required data-required-msg="ត្រូវការ គោត្តនាម" />
							</div>
							<div class="span3">							
								<label for="name">នាម <span style="color:red">*</span></label>
					            <input id="name" name="name" class="k-textbox" data-bind="value: name" 
					              		placeholder="ឈ្មោះ" required data-required-msg="ត្រូវការ នាម" />
							</div>
							<div class="span3" data-bind="visible: isCompany">
								<label for="companyName">ក្រុមហ៊ុន <span style="color:red">*</span></label>
								<input id="companyName" name="companyName" class="k-textbox" data-bind="enabled: isCompany, value: company" 
										required data-required-msg="ត្រូវការ ក្រុមហ៊ុន"
										placeholder="e.g. PCG & Partner" />	
							</div>										
						</div>

						<br>
						<div class="separator line bottom"></div>

						<div class="row-fluid">					
							<div class="span3">						
					            <label for="currencyCBB">រូបិយ​ប័ណ្ណ <span style="color:red">*</span></label>
					            <input id="currencyCBB" name="currencyCBB" data-bind="value: currency_code" 
					            		required data-required-msg="ត្រូវការ រូបិយ​ប័ណ្ណ"/>
					        </div>
							<div class="span3">
								<label for="ar">គណនីអតិថិជន <span style="color:red">*</span></label>
					            <select id="ar" name="ar" data-role="dropdownlist" 
					            		data-text-field="name" data-value-field="id" 
			            				data-bind="source: accountList, value: account_receiveable_id" 
			            				data-option-label="(--- ជ្រើសរើស ---)" 
			            				required data-required-msg="ត្រូវការ គណនីចំណូល"></select>
							</div>
							<div class="span3">
								<label for="revenueAccount">គណនីចំណូល <span style="color:red">*</span></label>
					            <select id="revenueAccount" name="revenueAccount" data-role="dropdownlist" 
					            		data-text-field="name" data-value-field="id" 
			            				data-bind="source: revenueAccountList, value: revenue_account_id"
			            				data-option-label="(--- ជ្រើសរើស ---)" 
			            				required data-required-msg="ត្រូវការ គណនីចំណូល"></select>
							</div>
							<div class="span3" data-bind="visible: isCompany">
								<label for="vatNo">លេខ VAT</label>								
			            		<input id="vatNo" name="vatNo" class="k-textbox" data-bind="value: vat_no" 
										placeholder="e.g. 01234567897">												
							</div>					
						</div>

						<br>
						<div class="separator line bottom"></div>						

						<div class="row-fluid">							
							<input type="checkbox" data-bind="checked: use_electricity"> ប្រើប្រាស់សេវាកម្មអគ្គីសនី																
						</div>

						<br>
						<div class="separator line bottom"></div>

						<!-- // Inner Tabs -->
						<div class="row-fluid">								
							<div class="box-generic">
							    <!-- //Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">					            					            
							            <li class="span3 glyphicons circle_info active"><a href="#tab1-4" data-toggle="tab"><i></i> <span>ពត័មានផ្សេងៗ</span></a>
							            </li>
							            <li class="span3 glyphicons electricity" data-bind="visible: use_electricity"><a href="#tab2-4" data-toggle="tab"><i></i> <span>ពត័មានភ្ជាប់ចរន្តអគ្គីសនី</span></a>
							            </li>
							            <li class="span3 glyphicons phone"><a href="#tab3-4" data-toggle="tab"><i></i> <span>ទំនាក់ទំនង</span></a>
							            </li>
							            <li class="span3 glyphicons home"><a href="#tab4-4" data-toggle="tab"><i></i> <span>អាសយដ្ឋាន</span></a>
							            </li>								            
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">					        

							        <!-- //OTHER INFOMATION Tab content -->
							        <div class="tab-pane active" id="tab1-4">
						            	<table width="100%" cellpadding="5" cellspacing="5">
						            		<tr>
								                <td>ស្ថានភាព <span style="color:red">*</span></td>
								              	<td>
								              		<input id="status" name="status" data-role="dropdownlist"
									            		data-text-field="name"
						           						data-value-field="id" 
									            		data-bind="source: statusList, value: status"					            							            		
									            		data-option-label="(--- ជ្រើសរើស ---)"
									            		required data-required-msg="ត្រូវការ ស្ថានភាព" />
								              	</td>
								              	<td>លេខអត្តសញ្ញាណប័ណ្ណ</td>
								              	<td><input id="card_number" class="k-textbox" data-bind="value: card_number" placeholder="e.g. 123456789" /></td>								            	
								            </tr>						            	
								            <tr>
								              	<td>ភេទ</td>
								              	<td><select data-role="dropdownlist" data-bind="source: genders, value: gender"></select></td>								              	
								            	<td>សមាជិកគ្រួសារ</td>
								              	<td><input id="family_member" class="k-textbox" data-bind="value: family_member" placeholder="e.g. 3" /></td>								            	
								            </tr>
								            <tr>
								            	<td>ថ្ងៃកំណើត</td>
								              	<td><input id="dob" data-role="datepicker" data-bind="value: dob" data-format="dd-MM-yyyy" placeholder="ថ្ងែ-ខែ-ឆ្នាំ" /></td>									              	
								              	<td>មុខរបរ</td>
								              	<td><input id="job" class="k-textbox" data-bind="value: job" placeholder="e.g. គ្រូបង្រៀន" /></td>
								            </tr>
								            <tr valign="top">
								              	<td>ទីកន្លែងកំណើត</td>
								              	<td><input id="pob" class="k-textbox" data-bind="value: pob" placeholder="e.g. ផ្ទះ ផ្លូវ ភូមិ សង្កាត់ ខណ្ឌ" />								            
								            	<td>សំគាល់</td>
								              	<td><input class="k-textbox" data-bind="value: memo" placeholder="..." /></td>								              										              	
								            </tr>								            								            								            			            
								        </table>
						        	</div>
							        <!-- // Tab content END -->

							        <!-- //ELECTRICITY INFORMATION Tab content -->
							        <div class="tab-pane" id="tab2-4" data-bind="visible: use_electricity">
						            	<table width="100%" cellpadding="5" cellspacing="5">							            
								            <tr>
								            	<td width="150px">តំបន់ <span style="color:red">*</span></td>
												<td>
													<select id="transformer" name="transformer" data-role="dropdownlist" data-text-field="transformer_number" data-value-field="id"
								              				data-cascade-from="company" data-bind="enabled: use_electricity, source: transformerList, value: transformer_id" data-auto-bind="false" 
								              				data-option-label="(--- ជ្រើសរើស ---)" required data-required-msg="ត្រូវការ តំបន់"></select>
												</td>
												<td>ផែនការតំលៃលក់ <span style="color:red">*</span></td>
								                <td><select id="tariff_plan" name="tariff_plan" data-role="dropdownlist" data-text-field="name" data-value-field="id" 
								                			data-bind="enabled: use_electricity, source: tariffPlanList, value: tariff_plan_id" data-option-label="(--- ជ្រើសរើស ---)"
								                			required data-required-msg="ត្រូវការ ផែនការតំលៃលក់"></select></td>									            										                								                						                
								            </tr>
								            <tr>
								            	<td>អាំងតង់សុីតេ <span style="color:red">*</span></td>		                    
								                <td><select id="ampere" name="ampere" data-role="dropdownlist" data-text-field="ampere" data-value-field="id" 
								                			data-bind="enabled: use_electricity, source: ampereList, value: ampere_id" data-option-label="(--- ជ្រើសរើស ---)"
								                			required data-required-msg="ត្រូវការ អាំងតង់សុីតេ"></select></td>									            	
								                <td>បញ្ចុះតំលៃ</td>		                    
								                <td><select id="exemption" name="exemption" data-role="dropdownlist" data-text-field="name" data-value-field="id" 
								                			data-bind="enabled: use_electricity, source: exemptionList, value: exemption_id" data-option-label="(--- ជ្រើសរើស ---)"></select></td>							                						                
								            </tr>
								            <tr>
								            	<td>ចំនួនហ្វា <span style="color:red">*</span></td>		                    
								                <td><select id="phase" name="phase" data-role="dropdownlist" data-text-field="phase" data-value-field="id" 
								                			data-bind="enabled: use_electricity, source: phaseList, value: phase_id" data-option-label="(--- ជ្រើសរើស ---)"
								                			required data-required-msg="ត្រូវការ ចំនួនហ្វា"></select></td>									            					            	
								            	<td>ថែទាំ</td>		                    
								                <td><select id="maintenance" name="maintenance" data-role="dropdownlist" data-text-field="name" data-value-field="id" 
								                			data-bind="enabled: use_electricity, source: maintenanceList, value: maintenance_id" data-option-label="(--- ជ្រើសរើស ---)"></select></td>								            	
								            </tr>
								            <tr>
								            	<td>តុងស្យុង <span style="color:red">*</span></td>		                    
								                <td><select id="voltage" name="voltage" data-role="dropdownlist" data-text-field="voltage" data-value-field="id" 
								                			data-bind="enabled: use_electricity, source: voltageList, value: voltage_id" data-option-label="(--- ជ្រើសរើស ---)"
								                			required data-required-msg="ត្រូវការ តុងស្យុង"></select></td>				            	
								            	<td></td>
								            	<td></td>
								            </tr>
								        </table> 
						        	</div>
							        <!-- // Tab content END -->

							        <!-- //CONTACT Tab content -->
							        <div class="tab-pane" id="tab3-4">
						            	<table width="100%" cellpadding="5" cellspacing="5">
											<tr valign="top">													
												<td>
													<div class="input-prepend">
														<span class="add-on glyphicons phone"><i></i></span>
														<input type="tel" id="inputPhone" class="input-large" placeholder="លេខទូរស័ព្ទ" data-bind="value: phone">
													</div>
												</td>													
												<td>
													<div class="input-prepend">
														<span class="add-on glyphicons google_maps"><i></i></span>
														<input type="tel" id="inputPhone" class="input-large" placeholder="latitute" data-bind="value: latitute">
													</div>
												</td>										
											</tr>
											<tr valign="top">													
												<td>
													<div class="input-prepend">
														<span class="add-on glyphicons envelope"><i></i></span>
														<input type="email" id="inputEmail" class="input-large" placeholder="អីុម៉ែល" data-bind="value: email">
													</div>
												</td>
												<td>
													<div class="input-prepend">
														<span class="add-on glyphicons pinboard"><i></i></span>
														<input type="tel" id="inputPhone" class="input-large" placeholder="longtitute" data-bind="value: longtitute">
													</div>
												</td>																				
											</tr>
											<tr>
												<td>
													<div class="input-prepend">
														<span class="add-on glyphicons globe_af"><i></i></span>
														<input type="text" id="inputZipCode" class="input-large" placeholder="zip code" data-bind="value: zip_code">
													</div>
												</td>
												<td></td>
											</tr>																																									
										</table>
							        </div>
							        <!-- // Tab content END -->

							        <!-- //ADDRESS Tab content -->
							        <div class="tab-pane" id="tab4-4">
						            	<table width="100%" cellpadding="5" cellspacing="5">
											<tr valign="top">													
												<td>
													<div class="input-prepend">
														<span class="add-on glyphicons home"><i></i></span>
														<input type="text" id="inputAddress1" class="input-large" placeholder="អាសយដ្ឋាន ១" data-bind="value: address">
													</div>														
												</td>										
												<td>ខេត្ត/រាជធានី</td>
												<td>
													<select id="province" name="province" data-role="dropdownlist" data-text-field="name" data-value-field="id" 
			              									data-bind="source: provinceList, value: province_id" data-option-label="(--- ជ្រើសរើស ---)"></select>
												</td>
											</tr>
											<tr valign="top">													
												<td>
													<div class="input-prepend">
														<span class="add-on glyphicons home"><i></i></span>
														<input type="text" id="inputAddress2" class="input-large" placeholder="អាសយដ្ឋាន ២" data-bind="value: address2">
													</div>														
												</td>										
												<td>ស្រុក/ខណ្ឌ</td>
												<td>
													<select id="district" name="district" data-role="dropdownlist" data-text-field="name" data-value-field="id" data-auto-bind="false" 
			              									data-cascade-from="province" data-bind="source: districtList, value: district_id" data-option-label="(--- ជ្រើសរើស ---)"></select>
												</td>
											</tr>
											<tr valign="top">													
												<td>
													<div class="input-prepend">
														<span class="add-on glyphicons home"><i></i></span>
														<input type="text" id="inputAddress3" class="input-large" placeholder="អាសយដ្ឋាន ៣" data-bind="value: address3">
													</div>														
												</td>										
												<td>ឃុំ/សង្កាត់</td>
												<td>
													<select id="commune" data-role="dropdownlist" data-text-field="name" data-value-field="id" data-auto-bind="false"
			              									data-cascade-from="district" data-bind="source: communeList, value: commune_id" data-option-label="(--- ជ្រើសរើស ---)"></select>
												</td>											
											</tr>
											<tr valign="top">													
												<td>
													<div class="input-prepend">
														<span class="add-on glyphicons home"><i></i></span>
														<input type="text" id="inputAddress4" class="input-large" placeholder="អាសយដ្ឋាន ៤" data-bind="value: address4">
													</div>														
												</td>										
												<td>ភូមិ/ក្រុម</td>
												<td>
													<select id="village" data-role="dropdownlist" data-text-field="name" data-value-field="id" data-auto-bind="false"
			              									data-cascade-from="commune" data-bind="source: villageList, value: village_id" data-option-label="(--- ជ្រើសរើស ---)"></select>
												</td>
											</tr>																							
										</table>
							        </div>
							        <!-- // Tab content END -->					        								        

							    </div>
							</div>
						</div>

					</div>							
					
					<!-- //Form actions -->
					<div class="form-actions" style="margin: 0;" align="center">
						<div id="status"></div>								
						<button id="save" type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i> កត់ត្រា</button>
					</div>
					<!-- // Form actions END -->							
				</div> <!-- // End div example-->  
			</div> <!-- // End div span12-->		
		</div> <!-- // End div row-fluid-->
	</div>	
</script>

<!-- Invoice -->
<script id="invoice" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">									
					<div align="right">			        				        	
			        	<button type="button" aria-hidden="true" data-bind="click:closeX">X</button>			        	
					</div>
					<h3 class="heading glyphicons cart_in"><i></i> វិក្កយបត្រ</h3>		        						
									
					<div class="row-fluid">
						<div class="span4">				
							<table cellpadding="2" cellspacing="2">					          
								<tr>				
									<td>លេខវិក្ក​យបត្រ</td>
									<td><input class="k-textbox" data-bind="value: number" style="width:140px;" readonly /></td>
								</tr>
								<tr>
									<td>ថ្ងៃចេញវិក្កយបត្រ</td>
									<td>
										<input id="issuedDate" name="issuedDate" data-role="datepicker" 
												data-bind="value: issued_date" data-format="dd-MM-yyyy" 
												required data-required-msg="ត្រូវការ ថ្ងៃចេញវិក្កយបត្រ" />
									</td>
								</tr>		                      
								<tr>
					                <td>Class</td>
					              	<td><select id="classes" name="classes" data-role="combobox" 
					              				data-text-field="name" data-value-field="id" 
					              				data-bind="source: classList, value: class_id"
					              				required data-required-msg="ត្រូវការ Class"></select>
					              	</td>
					            </tr>            
								<tr>
									<td colspan="2">
										អាសយដ្ឋាន
										<br>
										<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: address"></textarea>
									</td>
								</tr>
							</table>
						</div>

					    <div class="span4">
					    	<div align="center">
					    		<span class="glyphicons standard circle_ok" data-bind="visible: paid"><i></i> ទូទាត់រួច</span>				    	
					    	</div>
					    </div>

						<div class="span4">
							<table cellpadding="2" cellspacing="2">	
								<tr>
					                <td>កាលកំណត់</td>
					              	<td>
					              		<select data-role="dropdownlist" data-text-field="term" 
					              				data-value-field="id" data-bind="source: paymentTermList, value: payment_term_id" 
					              				data-option-label="(--- ជ្រើសរើស ---)"></select>
					              	</td>
					            </tr>				
								<tr>
									<td>ថ្ងៃបង់ប្រាក់</td>
									<td>
										<input id="dueDate" name="dueDate" data-role="datepicker" 
												data-bind="value: due_date" data-format="dd-MM-yyyy"
												required data-required-msg="ត្រូវការ ថ្ងៃបង់ប្រាក់" />
									</td>
								</tr>					
					            <tr>
					            	<td>លេខបញ្ជាលក់</td>				
									<td><select data-role="dropdownlist" data-text-field="number" data-value-field="id" 
												data-auto-bind="false" data-bind="source: soList, value: so_id, events:{ change: soChange}" 
												data-option-label="(--- ជ្រើសរើស ---)"></select></td>
								</tr>
								<tr>
					            	<td>លេខសម្រង់តំម្លៃ</td>				
									<td><select data-role="dropdownlist" data-text-field="number" data-value-field="id" 
												data-auto-bind="false" data-bind="source: estimateList, value: estimate_id, events:{ change: estimateChange}" 
												data-option-label="(--- ជ្រើសរើស ---)"></select></td>
								</tr>
								<tr>
					            	<td>លេខលិខិតដឺកជញ្ជូន</td>				
									<td><select data-role="dropdownlist" data-text-field="number" data-value-field="id" 
												data-auto-bind="false" data-bind="source: gdnList, value: gdn_id, events:{ change: gdnChange}" 
												data-option-label="(--- ជ្រើសរើស ---)"></select></td>
								</tr>
							</table>           		          	
					    </div>
					</div>
								
					<div data-role="grid" data-bind="source: invoiceItemList"
				        data-auto-bind="false"				        
				        data-row-template="invoiceRowTemplate"				                        
				        data-columns='[{ title: "", width: 20 },
				        	{ title: "ល.រ", width: 35 },
				            { title: "ទំនិញ", width: 200 },	                     
				            { title: "ពណ៌នា", width: 200 },
				            { title: "ចំនួន", width: 85 },
				            { title: "តំលៃ", width: 115 },		            
				            { title: "ទឹកប្រាក់", width: 80 },
				            { title: "vat", width: 30 }	                    	                    
				            ]'>
					</div>
					<button class="btn btn-inverse" data-bind="click: addNewRow"><i class="icon-plus icon-white"></i></button>
					
					<br>
					
					<div class="row-fluid">				
						<div class="span8">
							សំគាល់:
							<br>
							<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
							<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
						</div>

						<div class="span4">
							<table width="100%">
								<tr align="right">
									<td>សរុបរង:</td>
									<td width="50%"><span data-bind="text: sub_total"></span></td>
								</tr>
								<tr align="right">
									<td align="top">
										<select data-role="combobox" data-text-field="name" data-value-field="id" 
												data-bind="source: vatList, value: vat_id, events: {change: change}" placeholder="VAT" style="width:90px"></select>								
									</td>
									<td><span data-bind="text: vat"></span></td>
								</tr>
								<tr align="right">
									<td>សរុប:</td>
									<td bgcolor="#00BFFF"><span data-bind="text: total"></span></td>
								</tr>						
							</table>
						</div>													
					</div>

					<br>

					<div class="row-fluid">				
						<div class="span12" align="right">
							<div id="status"></div>
							<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isUpdate"><i></i> បោះពុម្ព</span>						
							<button id="save" type="submit" class="btn btn-icon btn-primary glyphicons cart_in"><i></i> រៀបចំវិក្កយបត្រ</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="receipt" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<div align="right">			        				        	
		        	<button type="button" aria-hidden="true" data-bind="click:closeX">X</button>		        	
				</div>
				<h3 class="heading glyphicons cart_in"><i></i>បង្កាន់ដៃលក់</h3>			
				
				<div class="row-fluid">				
					<div class="span8">
						<table cellpadding="2" cellspacing="2">
							<tr>				
								<td>លេខបង្កាន់ដៃលក់</td>
								<td><input class="k-textbox" data-bind="value: number" style="width:138px;" readonly /></td>
							</tr>
							<tr>
								<td>កាលបរិច្ឆេទ</td>
								<td>
									<input id="issuedDate" name="issuedDate" data-role="datepicker" 
											data-bind="value: issued_date" data-format="dd-MM-yyyy" 
											required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" />
								</td>
							</tr>					         
							<tr>
				                <td>Class</td>
				              	<td>
				              		<select id="classes" name="classes" data-role="combobox" data-text-field="name" data-value-field="id" 
				              				data-bind="source: classList, value: class_id"
				              				required data-required-msg="ត្រូវការ Class"></select>
				              	</td>
				            <tr>            
							<tr>
								<td colspan="2">
									អាសយដ្ឋាន
									<br>
									<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: address"></textarea>
								</td>
							</tr>
						</table>
					</div>

					<div class="span4">			
						<table cellpadding="2" cellspacing="2">					
							<tr>
				                <td>វីធីបង់ប្រាក់</td>
				              	<td>
				              		<select id="paymentMethod" name="paymentMethod" data-role="dropdownlist" 
				              				data-text-field="name" data-value-field="id" 
				              				data-bind="source: paymentMethodList, value: payment_method_id" 
				              				data-option-label="(--- ជ្រើសរើស ---)"
				              				required data-required-msg="ត្រូវការ វីធីបង់ប្រាក់"></select>
				              	</td>
				            <tr>
							<tr>
				                <td>លេខកូដសែក</td>
				                <td><input id="check_no" class="k-textbox" data-bind="value: check_no" /></td>
				            <tr>
				            <tr>
								<td>គណនីសាច់ប្រាក់</td>
								<td>
									<select id="cashAccount" name="cashAccount" data-role="combobox" 
											data-text-field="name" data-value-field="id" 
											data-bind="source: cashAccountList, value: cash_account_id"
											required data-required-msg="ត្រូវការ គណនីសាច់ប្រាក់"></select>
								</td>
							</tr>					
							<tr>
				            	<td>លេខបញ្ជាលក់</td>				
								<td><select data-role="dropdownlist" data-text-field="number" data-value-field="id" data-auto-bind="false" data-bind="source: soList, value: so_id, events:{ change: soChange}" data-option-label="(--- ជ្រើសរើស ---)"></select></td>
							</tr>
							<tr>
				            	<td>លេខសម្រង់តំម្លៃ</td>				
								<td><select data-role="dropdownlist" data-text-field="number" data-value-field="id" data-auto-bind="false" data-bind="source: estimateList, value: estimate_id, events:{ change: estimateChange}" data-option-label="(--- ជ្រើសរើស ---)"></select></td>
							</tr>
							<tr>
				            	<td>លេខលិខិតដឺកជញ្ជូន</td>				
								<td><select data-role="dropdownlist" data-text-field="number" data-value-field="id" data-auto-bind="false" data-bind="source: gdnList, value: gdn_id, events:{ change: gdnChange}" data-option-label="(--- ជ្រើសរើស ---)"></select></td>
							</tr>
						</table>           		          	
				    </div>			    			
				</div>			

				<div data-role="grid" data-bind="source: invoiceItemList"
			        data-auto-bind="false" data-row-template="invoiceRowTemplate"                  
			        data-columns='[{ title: "", width: 20 },
			        	{ title: "ល.រ", width: 35 },
			            { title: "ទំនិញ", width: 200 },	                     
			            { title: "ពណ៌នា", width: 200 },
			            { title: "ចំនួន", width: 85 },
			            { title: "តំលៃ", width: 115 },		            
			            { title: "ទឹកប្រាក់", width: 80 },
			            { title: "vat", width: 30 }	                    	                    
			            ]'>
				</div>
				<button class="btn btn-inverse" data-bind="click: addNewRow"><i class="icon-plus icon-white"></i></button>
				
				<div class="row-fluid">				
					<div class="span8">
						សំគាល់:
						<br>
						<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
						<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
					</div>

					<div class="span4">
						<table width="100%">
							<tr align="right">
								<td>សរុបរង:</td>
								<td width="50%"><span data-bind="text: sub_total"></span></td>
							</tr>
							<tr align="right">
								<td align="top">
									<select data-role="combobox" data-text-field="name" data-value-field="id" 
											data-bind="source: vatList, value: vat_id, events: {change: change}" placeholder="VAT" style="width:90px"></select>								
								</td>
								<td><span data-bind="text: vat"></span></td>
							</tr>
							<tr align="right">
								<td>សរុប:</td>
								<td bgcolor="#00BFFF"><span data-bind="text: total"></span></td>
							</tr>						
						</table>
					</div>													
				</div>

				<br>

				<div class="row-fluid">				
					<div class="span12" align="right">
						<div id="status"></div>
						<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isUpdate"><i></i> បោះពុម្ព</span>						
						<button id="save" type="submit" class="btn btn-icon btn-primary glyphicons cart_in"><i></i> រៀបចំបង្កាន់ដៃ</button>
					</div>
				</div>		
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->
</script>
<script id="so" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<div align="right">			        				        	
			        	<button type="button" aria-hidden="true" data-bind="click:closeX">X</button>			        	
					</div>
					<h3 class="heading glyphicons cart_in"><i></i>បញ្ជាលក់</h3>
									
					<div class="row-fluid">
						<div class="span4">				
							<table cellpadding="2" cellspacing="2">					          
								<tr>				
									<td>លេខបញ្ជាលក់</td>
									<td><input class="k-textbox" data-bind="value: number" style="width:140px;" readonly /></td>
								</tr>
								<tr>
									<td>កាលបរិច្ឆេទ</td>
									<td>
										<input id="issuedDate" name="issuedDate" data-role="datepicker" 
												data-bind="value: issued_date" data-format="dd-MM-yyyy" 
												required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" />
									</td>
								</tr>
								<tr>
									<td>ថ្ងៃរំពឹងទុក</td>
									<td>
										<input id="expectedDate" name="expectedDate" data-role="datepicker" 
												data-bind="value: expected_date" data-format="dd-MM-yyyy" 
												required data-required-msg="ត្រូវការ ថ្ងៃរំពឹងទុក" />
									</td>
								</tr>		                      
								<tr>
					                <td>Class</td>
					              	<td><select id="classes" name="classes" data-role="combobox" 
					              				data-text-field="name" data-value-field="id" 
					              				data-bind="source: classList, value: class_id"
					              				required data-required-msg="ត្រូវការ Class"></select>
					              	</td>
					            </tr>            
								<tr>
									<td colspan="2">
										អាសយដ្ឋាន
										<br>
										<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: address"></textarea>
									</td>
								</tr>
							</table>
						</div>

					    <div class="span4">
					    	<div align="center">
					    		<span class="glyphicons standard circle_ok" data-bind="visible: paid"><i></i> ទូទាត់រួច</span>				    	
					    	</div>
					    </div>

						<div class="span4">
							<table cellpadding="2" cellspacing="2">								
								<tr>
					            	<td>លេខសម្រង់តំម្លៃ</td>				
									<td><select data-role="dropdownlist" data-text-field="number" data-value-field="id" 
												data-auto-bind="false" data-bind="source: estimateList, value: estimate_id, events:{ change: estimateChange}" 
												data-option-label="(--- ជ្រើសរើស ---)"></select></td>
								</tr>
								<tr>
					            	<td>លេខលិខិតដឺកជញ្ជូន</td>				
									<td><select data-role="dropdownlist" data-text-field="number" data-value-field="id" 
												data-auto-bind="false" data-bind="source: gdnList, value: gdn_id, events:{ change: gdnChange}" 
												data-option-label="(--- ជ្រើសរើស ---)"></select></td>
								</tr>
							</table>           		          	
					    </div>
					</div>
								
					<div data-role="grid" data-bind="source: invoiceItemList"
				        data-auto-bind="false"				        
				        data-row-template="invoiceRowTemplate"				                        
				        data-columns='[{ title: "", width: 20 },
				        	{ title: "ល.រ", width: 35 },
				            { title: "ទំនិញ", width: 200 },	                     
				            { title: "ពណ៌នា", width: 200 },
				            { title: "ចំនួន", width: 85 },
				            { title: "តំលៃ", width: 115 },		            
				            { title: "ទឹកប្រាក់", width: 80 },
				            { title: "vat", width: 30 }	                    	                    
				            ]'>
					</div>
					<button class="btn btn-inverse" data-bind="click: addNewRow"><i class="icon-plus icon-white"></i></button>
					
					<br>
					
					<div class="row-fluid">				
						<div class="span8">
							សំគាល់:
							<br>
							<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
							<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
						</div>

						<div class="span4">
							<table width="100%">
								<tr align="right">
									<td>សរុបរង:</td>
									<td width="50%"><span data-bind="text: sub_total"></span></td>
								</tr>
								<tr align="right">
									<td align="top">
										<select data-role="combobox" data-text-field="name" data-value-field="id" 
												data-bind="source: vatList, value: vat_id, events: {change: change}" placeholder="VAT" style="width:90px"></select>								
									</td>
									<td><span data-bind="text: vat"></span></td>
								</tr>
								<tr align="right">
									<td>សរុប:</td>
									<td bgcolor="#00BFFF"><span data-bind="text: total"></span></td>
								</tr>						
							</table>
						</div>													
					</div>

					<br>

					<div class="row-fluid">				
						<div class="span12" align="right">
							<div id="status"></div>
							<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isUpdate"><i></i> បោះពុម្ព</span>						
							<button id="save" type="submit" class="btn btn-icon btn-primary glyphicons cart_in"><i></i> រៀបចំបញ្ជាលក់</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="estimate" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<div align="right">			        				        	
			        	<button type="button" aria-hidden="true" data-bind="click:closeX">X</button>			        	
					</div>
					<h3 class="heading glyphicons cart_in"><i></i>សម្រង់តម្លៃ</h3>
									
					<div class="row-fluid">
						<div class="span4">				
							<table cellpadding="2" cellspacing="2">					          
								<tr>				
									<td>លេខសម្រង់តម្លៃ</td>
									<td><input class="k-textbox" data-bind="value: number" style="width:140px;" readonly /></td>
								</tr>
								<tr>
									<td>កាលបរិច្ឆេទ</td>
									<td>
										<input id="issuedDate" name="issuedDate" data-role="datepicker" 
												data-bind="value: issued_date" data-format="dd-MM-yyyy" 
												required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" />
									</td>
								</tr>		                      
								<tr>
					                <td>Class</td>
					              	<td><select id="classes" name="classes" data-role="combobox" 
					              				data-text-field="name" data-value-field="id" 
					              				data-bind="source: classList, value: class_id"
					              				required data-required-msg="ត្រូវការ Class"></select>
					              	</td>
					            </tr>            
								<tr>
									<td colspan="2">
										អាសយដ្ឋាន
										<br>
										<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: address"></textarea>
									</td>
								</tr>
							</table>
						</div>

					    <div class="span4">
					    	<div align="center">
					    		<span class="glyphicons standard circle_ok" data-bind="visible: paid"><i></i> ទូទាត់រួច</span>				    	
					    	</div>
					    </div>

						<div class="span4">
							         		          	
					    </div>
					</div>
								
					<div data-role="grid" data-bind="source: invoiceItemList"
				        data-auto-bind="false"				        
				        data-row-template="invoiceRowTemplate"				                        
				        data-columns='[{ title: "", width: 20 },
				        	{ title: "ល.រ", width: 35 },
				            { title: "ទំនិញ", width: 200 },	                     
				            { title: "ពណ៌នា", width: 200 },
				            { title: "ចំនួន", width: 85 },
				            { title: "តំលៃ", width: 115 },		            
				            { title: "ទឹកប្រាក់", width: 80 },
				            { title: "vat", width: 30 }	                    	                    
				            ]'>
					</div>
					<button class="btn btn-inverse" data-bind="click: addNewRow"><i class="icon-plus icon-white"></i></button>
					
					<br>
					
					<div class="row-fluid">				
						<div class="span8">
							សំគាល់:
							<br>
							<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
							<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
						</div>

						<div class="span4">
							<table width="100%">
								<tr align="right">
									<td>សរុបរង:</td>
									<td width="50%"><span data-bind="text: sub_total"></span></td>
								</tr>
								<tr align="right">
									<td align="top">
										<select data-role="combobox" data-text-field="name" data-value-field="id" 
												data-bind="source: vatList, value: vat_id, events: {change: change}" placeholder="VAT" style="width:90px"></select>								
									</td>
									<td><span data-bind="text: vat"></span></td>
								</tr>
								<tr align="right">
									<td>សរុប:</td>
									<td bgcolor="#00BFFF"><span data-bind="text: total"></span></td>
								</tr>						
							</table>
						</div>													
					</div>

					<br>

					<div class="row-fluid">				
						<div class="span12" align="right">
							<div id="status"></div>
							<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isUpdate"><i></i> បោះពុម្ព</span>						
							<button id="save" type="submit" class="btn btn-icon btn-primary glyphicons cart_in"><i></i> រៀបចំសម្រង់តម្លៃ</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="gdn" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<div align="right">			        				        	
			        	<button type="button" aria-hidden="true" data-bind="click:closeX">X</button>			        	
					</div>
					<h3 class="heading glyphicons cart_in"><i></i>លិខិតដឹកជញ្ជូន</h3>
									
					<div class="row-fluid">
						<div class="span4">				
							<table cellpadding="2" cellspacing="2">					          
								<tr>				
									<td>លេខលិខិតដឹកជញ្ជូន</td>
									<td><input class="k-textbox" data-bind="value: number" style="width:140px;" readonly /></td>
								</tr>
								<tr>
									<td>កាលបរិច្ឆេទ</td>
									<td>
										<input id="issuedDate" name="issuedDate" data-role="datepicker" 
												data-bind="value: issued_date" data-format="dd-MM-yyyy" 
												required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" />
									</td>
								</tr>		                      
								<tr>
					                <td>Class</td>
					              	<td><select id="classes" name="classes" data-role="combobox" 
					              				data-text-field="name" data-value-field="id" 
					              				data-bind="source: classList, value: class_id"
					              				required data-required-msg="ត្រូវការ Class"></select>
					              	</td>
					            </tr>            
								<tr>
									<td colspan="2">
										អាសយដ្ឋាន
										<br>
										<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: address"></textarea>
									</td>
								</tr>
							</table>
						</div>

					    <div class="span4">
					    	<div align="center">
					    		<span class="glyphicons standard circle_ok" data-bind="visible: paid"><i></i> ទូទាត់រួច</span>				    	
					    	</div>
					    </div>

						<div class="span4">
							          		          	
					    </div>
					</div>
								
					<div data-role="grid" data-bind="source: invoiceItemList"
				        data-auto-bind="false"				        
				        data-row-template="gdnRowTemplate"				                        
				        data-columns='[{ title: "", width: 20 },
				        	{ title: "ល.រ", width: 35 },
				            { title: "ទំនិញ", width: 200 },	                     
				            { title: "ពណ៌នា", width: 200 },
				            { title: "ចំនួន", width: 85 }				            	                    	                    
				            ]'>
					</div>
					<button class="btn btn-inverse" data-bind="click: addNewRow"><i class="icon-plus icon-white"></i></button>
					
					<br>
					
					<div class="row-fluid">				
						<div class="span8">
							សំគាល់:
							<br>
							<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
							<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
						</div>

						<div class="span4">
							<table width="100%">								
								<tr align="right">
									<td>សរុប:</td>
									<td bgcolor="#00BFFF"><span data-bind="text: totalQuantity"></span></td>
								</tr>						
							</table>
						</div>													
					</div>

					<br>

					<div class="row-fluid">				
						<div class="span12" align="right">
							<div id="status"></div>
							<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isUpdate"><i></i> បោះពុម្ព</span>						
							<button id="save" type="submit" class="btn btn-icon btn-primary glyphicons cart_in"><i></i> រៀបចំលិខិតដឹកជញ្ជូន</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="invoiceRowTemplate" type="text/x-kendo-tmpl">		
	<tr>		
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>			
		</td>
		<td class="sno">1</td>
		<td>
			<select id="item" name="item" data-role="combobox" 
					data-text-field="name" data-value-field="id" 
					data-bind="source: itemList, value: item_id, events: {change : itemChange}"
					required data-required-msg="ត្រូវការ ទំនិញ" style="width:200px">
			</select>
		</td>		
		<td>
			<input id="description" name="description" type="text" 
					data-bind="value: description" style="margin-bottom: 0;" 
					required data-required-msg="ត្រូវការ ពណ៌នា" />
		</td>
		<td>
			<input id="quantity" name="quantity" data-role="numerictextbox" 
					data-format="n0" data-min="1"
					data-bind="value: quantity, events: {change : change}"
					required data-required-msg="ត្រូវការ ចំនួន" style="width: 80px;" />
		</td>				
		<td>
			<input id="price" name="price" data-role="numerictextbox" 
					data-format="c" data-culture=#:sub_code#
					data-bind="value: unit_price, events: {change : change}" 
					required data-required-msg="ត្រូវការ តំលៃ" style="width: 110px;" />
		</td>		
		<td align="right">
			#:kendo.toString(kendo.parseFloat(quantity)*(kendo.parseFloat(unit_price)), "c", sub_code)#			
		</td>
		<td>
			<input type="checkbox" data-bind="checked: vat, events: {change : change}" />			
		</td>		
    </tr>   
</script>
<script id="gdnRowTemplate" type="text/x-kendo-tmpl">		
	<tr>		
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>			
		</td>
		<td class="sno">1</td>
		<td>
			<select id="item" name="item" data-role="combobox" 
					data-text-field="name" data-value-field="id" 
					data-bind="source: itemList, value: item_id, events: {change : itemChange}"
					required data-required-msg="ត្រូវការ ទំនិញ" style="width:200px">
			</select>
		</td>		
		<td>
			<input id="description" name="description" type="text" 
					data-bind="value: description" style="margin-bottom: 0;" 
					required data-required-msg="ត្រូវការ ពណ៌នា" />
		</td>
		<td>
			<input id="quantity" name="quantity" data-role="numerictextbox" 
					data-format="n0" data-min="1"
					data-bind="value: quantity, events: {change : change}"
					required data-required-msg="ត្រូវការ ចំនួន" style="width: 80px;" />
		</td>				
    </tr>   
</script>

<!-- eMeter -->
<script id="eMeter" type="text/x-kendo-template">	
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">
				<h4 align="center">កុងទ័រ</h4>

				<div id="meter-window" data-role="window" data-visible="false" data-modal="true" data-resizable="false" data-iframe="true" data-min-width="600px" data-height="400px">
			    	<table cellpadding="5" cellspacing="5">
		                <tr>
		                  	<td>អតិថិជន</td>
		                  	<td><span data-bind="text: fullIdName"></span></td>                 
		                  	<td>ថ្ងៃប្រើប្រាស់</td>	                  	
		                  	<td><input data-role="datepicker" data-bind="value: date_used" data-format="dd-MM-yyyy" /></td> 
		                </tr>
		                <tr>
		                  	<td>ប្រភេទ</td>
		                  	<td><select data-role="combobox" data-text-field="name" data-value-field="id" data-bind="source: meterItemList, value: item_id"></select></td> 
		                  	<td>កុងទ័របំរុងនៃ</td>
		                  	<td><select data-role="combobox" data-text-field="meter_no" data-value-field="id" data-bind="source: parentMeterList, value: parent_id"></select></td>	                  	                             
		                </tr>
		                <tr>
		                  	<td>លេខកូដកុងទ័រ</span></td>                    
		                  	<td><input class="k-textbox" data-bind="value: meter_no" /></td>                             
		                  	<td>មេគុណ</td>
		                  	<td><input data-role="numerictextbox" data-bind="value: multiplier" data-format="#" min="1" step="100" /></td>                                   
		                </tr>
		                <tr>             
		                  <td>សំណគំរបខ្សែ</td>
		                  	<td><select data-role="dropdownlist" data-text-field="name" data-value-field="value" data-bind="source: hasOrNot, value: cover_sealed"></select></td>	                  	  	             
		                  	<td>ស្ថានភាព</td>
		                  	<td><select data-role="dropdownlist" data-text-field="name" data-value-field="value" data-bind="source: statuses, value: status"></select></td>                                    
		                </tr>
		                <tr>             
		                  	<td>សំណត្រចៀក</td>
		                  	<td><select data-role="dropdownlist" data-text-field="name" data-value-field="value" data-bind="source: hasOrNot, value: ear_sealed"></select></td>	                  	  	
		                  	<td></td>
		                  	<td><input type="checkbox" data-bind="checked: hasTariff, click: clearTariff" /> មានអំនាន Reactive</td>                                   
		                </tr>
		                <tr>
		                	<td>ចំនួនខ្ទង់នាឡិកា</td>
		                	<td><input data-role="numerictextbox" data-bind="value: max_digit" data-format="n0" min="0" placeholder="ឧ.10000" /></td>                  	
		                  	<td>តំលៃ</td>
		                  	<td><select data-role="combobox" data-text-field="name" data-value-field="id" data-bind="source: tariffList, enabled: hasTariff, value: tariff_id"></select></td>	                  	                        
		                </tr>
		                <tr>
		                  	<td>ត្រង់ស្វូ</td>
		                  	<td><select data-role="combobox" data-text-field="transformer_number" data-value-field="id" data-bind="source: transformerList, value: transformer_id"></select></td>	                  	
		                  	<td rowspan="2" valign="top">កំណត់សំគាល់</td>
		                  	<td rowspan="2" valign="top"><textarea name="memo" id="address" cols="" rows="2" data-bind="value: memo"></textarea></td>
		                </tr>
		                <tr>
		               	  	<td>ប្រអប់</td>
		                  	<td><select data-role="combobox" data-text-field="box_no" data-value-field="id" data-bind="source: electricityBoxList, value: electricity_box_id"></select></td>
		                  	<td></td>
		                  	<td></td>
		                </tr>
		          	</table>
		          	
		          	<br>

		          	<div align="center">
		          		<button class="btn btn-primary" data-bind="click: meterSaveClick"><i class="icon-hdd icon-white"></i> កត់ត្រា</button>                                  
		                <button class="btn" data-bind="click: closeMeterWindow"><i class="icon-off"></i> បិទ</button>
		                <button class="btn btn-danger" data-bind="visible: isEditMode, click: deleteMeter"><i class="icon-trash icon-white"></i> លុប</button>
		          	</div>
			    </div>

				<button class="btn btn-inverse" data-bind="click: btnAddNewMeterClick"><i class="icon-plus icon-white"></i></button>
				<br>
				<div data-role="grid" data-bind="source: meterList, events: { change: meterGridChange }"
			        data-auto-bind="false"
			        data-selectable="true"				        
			        data-row-template="eMeterRowTemplate"				                        
			        data-columns='[{ title: "កាលបរិច្ឆេទ", width: 90 },
			        	{ title: "#កុងទ័រ", width: 90 },
			            { title: "ប្រភេទ" },	                     
			            { title: "បំរុងនៃ" },
			            { title: "ប្រអប់", width: 90 },
			            { title: "ត្រ.", width: 35 },		            
			            { title: "គំរ.", width: 35 },
			            { title: "ស្ថានភាព", width: 90 }	                    	                    
			            ]'>
				</div>

				<br><br>

				<h4 align="center">ឌីស្យុងទ័រ</h4>			
			
				<div id="breaker-window" data-role="window" data-visible="false" data-modal="true" data-resizable="false" data-iframe="true" data-min-width="300px" data-height="250px">
			    	<table cellpadding="5" cellspacing="5">
		                <tr>
		                  	<td>អតិថិជន</td>
		                  	<td><span data-bind="text: fullIdName"></span></td>
		                </tr>
		                <tr>                 
		                  	<td>ថ្ងៃប្រើប្រាស់</td>	                  	
		                  	<td><input data-role="datepicker" data-bind="value: date_used_brker" data-format="dd-MM-yyyy" /></td> 
		                </tr>
		                <tr>
		                  	<td>ប្រភេទ</td>
		                  	<td><select data-role="combobox" data-text-field="name" data-value-field="id" data-bind="source: breakerItemList, value: item_id_brker"></select></td> 
		                </tr>
		                <tr>
		                  	<td>ឈ្មោះឌីស្យុងទ័រ</span></td>                    
		                  	<td><input class="k-textbox" data-bind="value: name_brker" /></td>	                  	
		                </tr>
		                <tr>	                  
		                  	<td>ស្ថានភាព</td>
		                  	<td><select data-role="dropdownlist" data-text-field="name" data-value-field="value" data-bind="source: statuses, value: status_brker"></select></td>                                    
		                </tr>	                
		          	</table>
		          	
		          	<br>

		          	<div align="center">
		          		<button class="btn btn-primary" data-bind="click: breakerSaveClick"><i class="icon-hdd icon-white"></i> កត់ត្រា</button>                                  
		                <button class="btn" data-bind="click: closeBreakerWindow"><i class="icon-off"></i> បិទ</button>
		                <button class="btn btn-danger" data-bind="visible: isEditModeBrker, click: deleteBreaker"><i class="icon-trash icon-white"></i> លុប</button>
		          	</div>
			    </div>
			    		
				<button class="btn btn-inverse" data-bind="click: btnAddNewBreakerClick"><i class="icon-plus icon-white"></i></button>
				<br>
				<div id="brkerGrid" data-role="grid" data-bind="source: breakerList, events: { change: breakerGridChange }"
		            data-selectable="true" data-row-template="breakerRowTemplate"                  
		            data-columns='[{ title: "កាលបរិច្ឆេទ" }, 
		                    { title: "ឈ្មោះឌីស្យុងទ័រ"}, 
		                    { title: "ប្រភេទ" },                        
		                    { title: "ស្ថានភាព" }]'>
				</div>

			</div>
		</div>
	</div>		
</script>
<script id="eMeterRowTemplate" type="text/x-kendo-template">	
	<tr>
		<td>
			#if(date_used!="0000-00-00"){#
				#:kendo.toString(new Date(date_used), "dd-MM-yyyy")#
			#}#
		</td>
		<td>#:meter_no#</td>
		<td>#:items.name#</td>
		<td>
			#if(parents.meter_no!=null){#
				#:parents.meter_no#
			#}#
		</td>		
		<td>
			#if(electricity_boxes.box_no!=null){#
				#:electricity_boxes.box_no#
			#}#
		</td>
		<td><input type="checkbox" #: ear_sealed==1 ? checked="checked" : "" # disabled="disabled" /></td>
		<td><input type="checkbox" #: cover_sealed==1 ? checked="checked" : "" # disabled="disabled" /></td>
		<td>#:status==1 ? "ប្រើប្រាស់" : "ឈប់ប្រើ"#</td>		
	</tr>
</script>
<script id="breakerRowTemplate" type="text/x-kendo-template">	
	<tr>
		<td>#:kendo.toString(new Date(date_used), "dd-MM-yyyy")#</td>
		<td>#:name#</td>
		<td>#:items.name#</td>		
		<td>#:status==1 ? "ប្រើប្រាស់" : "ឈប់ប្រើ"#</td>		
	</tr>
</script> 

<!-- eReading -->
<script id="eReadingSingle" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<h4 align="center">អំនានកុងទ័រ</h4>

			<div id="meterRecord-window" data-role="window" data-visible="false" data-modal="true" data-resizable="false" data-iframe="true" data-min-width="600px" data-height="400px">
		    	<table cellpadding="5" cellspacing="5">
	                <tr>
	                  	<td>អំនានចាស់</td>
	                  	<td><span data-bind="text: editData.meter_records.prev_reading"></span></td>
	                  	<td>អំនានចាស់ Reactive</td>
	                  	<td><span data-bind="text: editData.meter_records.reactive_prev_reading"></span></td>	                  	                 
	                </tr>	                
	                <tr>
	                  	<td>អំនានថ្មី</span></td>                    
	                  	<td><input class="k-textbox" data-bind="value: new_reading, events: { change: editChange }" /></td>
	                  	<td>អំនានថ្មី Reactive</span></td>                    
	                  	<td><input class="k-textbox" data-bind="value: reactive_new_reading, enabled: hasReactive, events: { change: editChange }" /></td>	                  	                                  
	                </tr>
	                <tr>
	                	<td></td>
	                	<td><input type="checkbox" data-bind="checked: new_round, events: { change: editChange }"> ជំុថ្មី</td>
	                	<td></td>
	                	<td><input type="checkbox" data-bind="checked: reactive_new_round, enabled: hasReactive, events: { change: editChange }"> ជំុថ្មី</td>
	                </tr>
	                <tr>
	                	<td>សរុប</td>
	                	<td><span data-bind="text: active_usage"></span></td>
	                	<td>សរុប Reactive</td>
	                	<td><span data-bind="text: reactive_usage"></span></td>
	                </tr>	                
	          	</table>

	          	<table data-bind="visible: isVisible" cellpadding="5" cellspacing="5">
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
			            <td><input data-role="datepicker" data-bind="value: payment_date" data-format="dd-MM-yyyy" /></td>
			      	</tr>
			      	<tr>		            
			            <td>ថ្ងៃផុតកំណត់</td>
			            <td><input data-role="datepicker" data-bind="value: due_date" data-format="dd-MM-yyyy" /></td>
			      	</tr>		          	
			    </table>
	          	
	          	<br>

	          	<div align="center">
	          		<button class="btn btn-primary" data-bind="click: saveEditClick"><i class="icon-hdd icon-white"></i> កែប្រែ</button>                                  
	                <button class="btn" data-bind="click: closeWindow"><i class="icon-off"></i> បិទ</button>	                
	          	</div>
		    </div>			

			<div id="addMeterRecordGrid" data-role="grid" data-bind="source: meterReadingList"
				data-auto-bind="false"				
                data-row-template="eReadingSingleRowTemplate"                  
                data-columns='[
                	{ title: "ប្រចាំខែ", width: 80 },
                	{ title: "ប្រអប់", width: 70 }, 
                    { title: "#កុងទ័រ", width: 60 },                    	                
	                { title: "ជំុ", width: 25 },
	                { title: "អំ.ចាស់(R)", width: 80 },
	                { title: "អំ.ថ្មី(R)", width: 80 },
	                { title: "សរុប" },
	                { title: "ជំុ", width: 25 },
	                { title: "អំ.ចាស់", width: 80 },
	                { title: "អំ.ថ្មី", width: 80 },
					{ title: "សរុប" },
                    ]'>
			</div>

	        <br />

	        <div class="AddMeterRecordStatus" align="center"></div>
	        
	        <div class="pull-right">
	        	<table cellspacing="5" cellpadding="5">
		          	<tr>		            
			            <td align="right">ថាមពលប្រើប្រាស់សរុប:</td>            
			            <td align="right"><span data-bind="text: total_active"></span></td>
		          	</tr>
		          	<tr>		            
			            <td align="right">ថាមពល Reactive សរុប:</td>            
			            <td align="right" width="90px"><span data-bind="text: total_reactive"></span></td>
		          	</tr>
		          	<tr>
		          		<td></td>
		          		<td align="right">
		          			<button class="btn btn-primary" data-bind="click: addMeterRecord"><i class="icon-hdd icon-white"></i> កត់ត្រា</button>     
		          		</td>
		          	</tr>
		        </table>
	        </div>

	        <div>
		        <table>
		          <tr>
		            <td>ប្រចាំខែ</td>
		            <td><input data-role="datepicker" data-bind="value: month_of" data-start="year" data-depth="year" data-format="MM-yyyy" /></td>
		            <td></td>
		            <td></td>		            
		          </tr>
		          <tr>
		            <td>ថ្ងៃអានចាប់ពី</td>
		            <td><input data-role="datepicker" data-bind="value: date_read_from" data-format="dd-MM-yyyy" /></td>
		            <td>ដល់</td>
		            <td><input data-role="datepicker" data-bind="value: date_read_to" data-format="dd-MM-yyyy" /></td>		            
		          </tr>
		          <tr>
		            <td>អ្នកអាន</td>
		            <td>
		            	<select data-role="combobox" data-text-field="fullname" data-value-field="id" data-bind="source: readerList, value: reader_id"></select>
		            	<span id="reader"></span>
		            </td>
		            <td></td>
		            <td></td>		            
		          </tr>
		        </table>
	        </div>    			
		</div>
	</div>	
</script>
<script id="eReadingSingleRowTemplate" type="text/x-kendo-tmpl">
	<tr id="rowGrid-#:id#">					
		<td>
			<i class="icon-edit" data-bind="click: editReadingClick"></i>
			#if(meter_records.month_of!=null){#
				#:kendo.toString(new Date(meter_records.month_of), "MM-yyyy")#				
			#}#
			<span id="msgD-#:id#"></span>
		</td>
		<td>#: electricity_boxes.box_no #</td>
		<td>#: meter_no #</td>
		<td align="center">
		   <input type="checkbox" data-bind="checked: rcheckNewRound, events: { change: change }" 
		   		#: tariff_id==0 ? disabled="disabled" : "" # />
		</td>
		<td>
			<input data-role="numerictextbox" data-format="n0" data-min="0" 
		   		data-bind="value: reactive_prev_reading, events: { change: change }" style="width: 70px;" 
		   		#: tariff_id==0 || meter_records.reactive_new_reading!=null ? disabled="disabled" : "" # />
		</td>
		<td>
		   <input data-role="numerictextbox" data-format="n0" data-min="0"
		   		data-bind="value: reactive_new_reading, events: { change: change }" 		   		
		   		#: tariff_id==0 ? disabled="disabled" : "" # 
		   		style="width: 70px;" />		   		   
		</td>
		<td>
			#if(reactive_new_reading!==""){#
				#if(rcheckNewRound){#
					#:kendo.parseInt(reactive_new_reading) + kendo.parseInt(max_digit) - kendo.parseInt(reactive_prev_reading)#
				#}else{#
					#:kendo.parseInt(reactive_new_reading) - kendo.parseInt(reactive_prev_reading)#
				#}#
			#}#
			<span id="msgR-#:id#"></span>
		</td>
		<td align="center">
		   <input type="checkbox" data-bind="checked: checkNewRound, events: { change: change }" />
		</td>		
		<td>
			<input data-role="numerictextbox" data-format="n0" data-min="0" 
		   		data-bind="value: prev_reading, events: { change: change }" 
		   		#: meter_records.new_reading!=null ? disabled="disabled" : "" # 
		   		style="width: 70px;" />
		</td>
		<td>
		   <input class="txt-#:id#" data-role="numerictextbox" data-format="n0" data-min="0" 
		   		data-bind="value: new_reading, events: { change: change }" style="width:70px;" />		   		   			
		</td>
		<td>
			#if(new_reading!==""){#
				#if(checkNewRound){#
					#:kendo.parseInt(new_reading) + kendo.parseInt(max_digit) - kendo.parseInt(prev_reading)#
				#}else{#
					#:kendo.parseInt(new_reading) - kendo.parseInt(prev_reading)#
				#}#
			#}#
			<span id="msg-#:id#"></span>
		</td>		
    </tr>
</script>
<script id="eReading" type="text/x-kendo-template">
	<div class="row-fluid">    
		<div class="span12">
			<div id="example" class="k-content">

				<h3>អំនានកុងទ័រ</h3>

				<div id="top" align="right">
					<a href="#bottom">ទៅកាន់ផ្នែកខាងក្រោម &darr;</a>
				</div>

				<div class="accordion" id="accordion">
				    <!-- //Accordion Item -->
				    <div class="accordion-group">
				        <div class="accordion-heading">
			            	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-1">
								វ៉ាយបញ្ចូលអំនានដោយផ្ទាល់ដៃ
							</a>
				        </div>
				        <div id="collapse-1" class="accordion-body in collapse" style="height: auto;">
				            <div class="accordion-inner">
				            	<select id="company" name="company" data-role="dropdownlist" data-text-field="abbr" data-value-field="id" 
								        data-bind="source: companyList, value: company_id" data-option-label="(--- រើស អាជ្ញាប័ណ្ណ ---)"></select>
							    <select id="transformer" name="transformer" data-role="dropdownlist" data-text-field="transformer_number" data-value-field="id"
				          				data-cascade-from="company" data-bind="source: transformerList, value: transformer_id" data-auto-bind="false" 
				          				data-option-label="(--- រើស ត្រង់ស្វូ ---)"></select>          		
				          		<input type="text" data-bind="value: meter_no" style="width:100px" placeholder="លេខកូដកុងទ័រ">
				          		<input data-role="datepicker" data-bind="value: month_of_search" data-start="year" data-depth="year" data-format="MM-yyyy" placeHolder="ខែមិនទាន់បញ្ចូលអំនាន" />
				          		<button type="button" class="btn btn-default" data-bind="click: search"><i class="icon-search"></i></button>	
				            </div>
				        </div>
				    </div>
				    <!-- // Accordion Item END -->

				    <!-- //Accordion Item -->
				    <div class="accordion-group">
				        <div class="accordion-heading">
			            	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-2">
					        	បញ្ចូលអំនានតាម IR Reader
					      	</a>
				        </div>
				        <div id="collapse-2" class="accordion-body collapse" style="height: 0px;">
				            <div class="accordion-inner">
				            	<table>
					        	  	<tr>
						        	  	<td>ជំហ៊ានទី១ </td>
						        	  	<td><input name="userfile" id="userfile" type="file" /></td>                    	  	
						        	  	<td>ជំហ៊ានទី២ </td>
						        	  	<td><button class="btn btn-info" data-bind="click: readFile">ទាញយកទិន្នន័យ</button></td>
					        	  	</tr>
					        	</table>
				            </div>
				        </div>
				    </div>
				    <!-- // Accordion Item END -->
				</div>

				<div id="grid" data-role="grid" data-bind="source: meterList"
		            data-row-template="eReadingRowTemplate"
		            data-edit-able="true"
		            data-pageable="true"		            
		            data-auto-bind="false"                  
		            data-columns='[
		            	{ "title": "ប្រចាំខែ", width: 70 },		            	
		                { "title": "ឈ្មោះ", width: 130 },		                		                 
		                { "title": "ប្រអប់", width: 80 },
		                { "title": "#កុងទ័រ", width: 80 },
		                { "title": "ជំុ(R)", width: 40 },
		                { "title": "អំ.ចាស់(R)", width: 90 },
		                { "title": "អំ.ថ្មី(R)", width: 90 },
		                { "title": "សរុប" },
		                { "title": "ជំុថ្មី", width: 40 },
		                { "title": "អំ.ចាស់", width: 90 },
		                { "title": "អំ.ថ្មី", width: 90 },
						{ "title": "សរុប" }
		                ]'>
				</div>

				<br />

				<div id="status" align="center"></div>		    
		        
	        	<table width="100%">
		          	<tr>
		          		<td>ប្រចាំខែ</td>
			            <td>
			            	<input id="monthOf" name="monthOf" data-role="datepicker" data-bind="value: month_of" 
			            			data-start="year" data-depth="year" data-format="MM-yyyy"
			            			required data-required-msg="ត្រូវការ ប្រចាំខែ" />
			            </td>
			            <td></td>
		          		<td></td>
		          		<td>ចំនួនកុងទ័រសុរប:</td>
		          		<td align="center"><span data-bind="text: total_meter"></span></td>		            
			            <td align="right" width="250px">ថាមពលប្រើប្រាស់សរុប:</td>            
			            <td align="right"><span data-bind="text: total_active"></span></td>
		          	</tr>
		          	<tr>
		          		<td>ថ្ងៃអានចាប់ពី</td>
		            	<td>
		            		<input id="dateFrom" name="dateFrom" data-role="datepicker" 
		            				data-bind="value: date_read_from" 
		            				data-format="dd-MM-yyyy" 
		            				required data-required-msg="ត្រូវការ ថ្ងៃអានចាប់ពី" />
		            	</td>		            
		          		<td>ដល់</td>
		            	<td>
		            		<input id="dateTo" name="dateTo" data-role="datepicker" 
		            				data-bind="value: date_read_to" 
		            				data-format="dd-MM-yyyy"
		            				required data-required-msg="ត្រូវការ ដល់ថ្ងៃ" />
		            	</td>
		          		<td style="color: red;">មិនមានអំនាន:</td>
		          		<td align="center" style="color: red;"><span data-bind="text: total_unread"></span></td>		            
			            <td align="right">ថាមពល Reactive សរុប:</td>            
			            <td align="right" width="90px"><span data-bind="text: total_reactive"></span></td>
		          	</tr>
		          	<tr>
		          		<td>ថាមពលប្រើប្រាស់ត្រង់ស្វូ(LV)</td>
	            		<td><input data-role="numerictextbox" data-format="n0" data-min="0" data-bind="value: usage" /></td>			            	
		          		<td>អ្នកអាន</td>
		            	<td>
		            		<select id="reader" name="reader" data-role="combobox" data-text-field="fullname" data-value-field="id" 
		            				data-bind="source: readerList, value: reader_id"
		            				required data-required-msg="ត្រូវការ អ្នកអាន"></select>			            		
		            	</td>
		          		<td>មានអំនាន:</td>
		          		<td align="center"><span data-bind="text: total_read"></span></td>
		          		<td></td>			          		
		          		<td align="right">
		          			<button id="save" class="btn btn-primary"><i class="icon-hdd icon-white"></i> កត់ត្រា</button>     
		          		</td>
		          	</tr>			          	
		        </table>		       

		        <div id="bottom" align="right">
					<a href="#top">ទៅកាន់ផ្នែកខាងលើ &uarr;</a>
				</div>
					
			</div> <!-- //End div example-->            
		</div> <!-- //End div span12-->		
	</div> <!-- //End div row-fluid-->
</script>
<script id="eReadingRowTemplate" type="text/x-kendo-tmpl">
	<tr id="rowGrid-#:id#">					
		<td>
			#if(month_of!=""){#
				#:kendo.toString(new Date(month_of), "MM-yyyy")#				
			#}#
			<span id="msgD-#:id#"></span>
		</td>
		<td>#:people.surname# #:people.name#</td>		
		<td>#: electricity_boxes.box_no #</td>
		<td>#: meter_no #</td>
		<td align="center">
		   <input type="checkbox" data-bind="checked: rcheckNewRound, events: { change: change }" #: tariff_id==0 ? disabled="disabled" : "" # />
		</td>
		<td>
			<input data-role="numerictextbox" data-format="n0" data-min="0" 
		   		data-bind="value: reactive_prev_reading, events: { change: change }" style="width: 80px;" #: tariff_id==0 || reactive_prev_reading!="" ? disabled="disabled" : "" # />
		</td>
		<td>
		   <input data-role="numerictextbox" data-format="n0" data-min="0" 
		   		data-bind="value: reactive_new_reading, events: { change: change }" style="width: 80px;" #: tariff_id==0 ? disabled="disabled" : "" # />		   		   
		</td>
		<td>
			#if(reactive_new_reading!==""){#
				#if(rcheckNewRound){#
					#:kendo.parseInt(reactive_new_reading) + kendo.parseInt(max_digit) - kendo.parseInt(reactive_prev_reading)#
				#}else{#
					#:kendo.parseInt(reactive_new_reading) - kendo.parseInt(reactive_prev_reading)#
				#}#
			#}#
			<span id="msgR-#:id#"></span>
		</td>
		<td align="center">
		   <input type="checkbox" data-bind="checked: checkNewRound, events: { change: change }" />
		</td>		
		<td>
			<input data-role="numerictextbox" data-format="n0" data-min="0" 
		   		data-bind="value: prev_reading, events: { change: change }" style="width: 80px;" #: prev_reading!="" ? disabled="disabled" : "" # />
		</td>
		<td>
		   <input class="txt-#:id#" data-role="numerictextbox" data-format="n0" data-min="0"
		   		data-bind="value: new_reading, events: { change: change }" style="width: 80px;" />		   		   			
		</td>
		<td>
			#if(new_reading!==""){#
				#if(checkNewRound){#
					#:kendo.parseInt(new_reading) + kendo.parseInt(max_digit) - kendo.parseInt(prev_reading)#
				#}else{#
					#:kendo.parseInt(new_reading) - kendo.parseInt(prev_reading)#
				#}#
			#}#
			<span id="msg-#:id#"></span>
		</td>
    </tr>
</script>

<!-- eInvoice -->
<script id="eInvoice" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<h3>រៀបចំវិក្កយបត្រអគ្គីសនី</h3>

				<br>
				
				<div>				
					<select id="company" name="company" data-role="dropdownlist" data-text-field="abbr" data-value-field="id" 
				            data-bind="source: companyList, value: company_id" data-option-label="(--- រើស អាជ្ញាប័ណ្ណ ---)"></select>

				    <select id="transformer" name="transformer" data-role="dropdownlist" data-text-field="transformer_number" data-value-field="id"
			  				data-cascade-from="company" data-bind="source: transformerList, value: transformer_id" data-auto-bind="false" 
			  				data-option-label="(--- រើស ត្រង់ស្វូ ---)"></select>				
					<input data-role="datepicker" data-bind="value: monthOfSearch" data-start="year" data-depth="year" data-format="MM-yyyy" placeHolder="អំនានប្រចាំខែ" />
					<button type="button" class="btn btn-default" data-bind="click: searchReading"><i class="icon-search"></i></button>
					<button type="button" class="btn btn-default" data-bind="click: linkPrint"><i class="icon-print"></i></button>				
				</div>											

				<br>
				
				<table class="table table-bordered table-striped table-white">
			        <thead>
			            <tr>
			                <th><input type="checkbox" data-bind="checked: checkAll, events: {change : changeAll}" /></th>
			                <th>អំនានប្រចាំខែ</th>
			                <th>លេខកូដ</th>
			                <th>អតិថិជន</th>	                    
			                <th>លេខប្រអប់</th>
			                <th>លេខកុងទ៍រ</th>
			                <th>មេគុណ</th>
			                <th>អំនានចាស់R</th>
			                <th>អំនានថ្មីR</th>
			                <th>សរុប Reactive</th>
			                <th>អំនានចាស់</th>
			                <th>អំនានថ្មី</th>
			                <th>សរុប Active</th>	                    
			            </tr>
			        </thead>
			        <tbody data-role="listview" data-template="eInvoiceRowTemplate" data-auto-bind="false" data-bind="source: meterRecordList">
			        </tbody>	            
			    </table>

			    <br>
			    
			    <table width="100%">
					<tr>
			            <td>ប្រចាំខែ</td>            
			            <td><input id="monthOf" name="monthOf" data-role="datepicker" 
			            			data-bind="value: month_of"	data-start="year" 
			            			data-depth="year" data-format="MM-yyyy"
			            			required data-required-msg="ត្រូវការ ប្រចាំខែ" /></td>		            
			            <td></td>
			            <td></td>	
			            <td align="right">ចំនួនអំនានសរុប:</td>            
			            <td align="right" width="90px">
			            	<span data-bind="text: totalSelected"></span> /			            	
			            	<span data-bind="text: total_reading"></span>
			            </td>		            		            
			      	</tr>		          	
			      	<tr>		            
			            <td>ថ្ងៃចេញវិក្កយបត្រ</td>            
			            <td><input id="issuedDate" name="issuedDate" data-role="datepicker" 
			            			data-bind="value: issued_date" data-format="dd-MM-yyyy"
			            			required data-required-msg="ត្រូវការ ថ្ងៃចេញវិក្កយបត្រ" /></td>
			            <td>Class</td>
			            <td>
			            	<select id="classes" name="classes" data-role="combobox" data-text-field="name" data-value-field="id" 
				            	data-bind="source: classList, value: class_id" placeholder="(--- រើស Class ---)"
				            	required data-required-msg="ត្រូវការ Class"></select>		            	
				        </td>			            
			            <td align="right">ចំនួនប្រើប្រាស់ Active សរុប:</td>            
			            <td align="right" width="90px"><span data-bind="text: total_active"></span></td>
			      	</tr>
			      	<tr>		            
			            <td>ថ្ងៃបង់ប្រាក់</td>
			            <td><input id="paymentDate" name="paymentDate" data-role="datepicker" 
			            			data-bind="value: payment_date" data-format="dd-MM-yyyy"
			            			required data-required-msg="ត្រូវការ ថ្ងៃបង់ប្រាក់" /></td>
			            <td>ថ្ងៃផុតកំណត់</td>
			            <td><input id="dueDate" name="dueDate" data-role="datepicker" 
			            			data-bind="value: due_date" data-format="dd-MM-yyyy"
			            			required data-required-msg="ត្រូវការ ថ្ងៃផុតកំណត់" /></td>
			            <td align="right">ចំនួនប្រើប្រាស់ Reactive សរុប:</td>            
			            <td align="right" width="90px"><span data-bind="text: total_reactive"></span></td>		            
			      	</tr>		          	
			    </table>
			         
			    <br />
			    
			    <div align="right">
			      	<div id="status"></div> 
			      	<button id="save" class="btn btn-primary"><i class="icon-list-alt icon-white"></i> រៀបចំវិក្កយបត្រ</button>     
			    </div>			   
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->
</script>
<script id="eInvoiceRowTemplate" type="text/x-kendo-tmpl">
	<tr>
		<td align="center">
		   <input type="checkbox" data-bind="checked: isCheck, events: {change : change}" #: invoice_id>0 ? disabled="disabled" : "" # />
		</td>
		<td>#:kendo.toString(new Date(month_of), "MM-yyyy") #</td>
		<td>#:people.number#</td>			
		<td>#:people.surname# #:people.name#</td>		
		<td>#:electricity_boxes.box_no#</td>
		<td>#:meter_no#</td>
		<td>#:multiplier#</td>				
		<td align="right">#:reactive_prev_reading #</td>
		<td align="right">#:reactive_new_reading #</td>
		<td align="right">#:reactive_usage #</td>
		<td align="right">#:prev_reading #</td>
		<td align="right">#:new_reading #</td>		
		<td align="right">#:active_usage#</td>		
    </tr>
</script>

<!-- Notice -->
<script id="notice" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">			
			<div class="widget widget-tabs widget-tabs-double widget-tabs-gray">			
				
				<div class="widget-head">
					<ul>
						<li class="active"><a href="#tab1-2" class="glyphicons calculator" data-toggle="tab"><i></i><span class="strong">ជំហានទី ១</span><span>រកថាមពលមធ្យម</span></a></li>
						<li><a href="#tab2-2" class="glyphicons notes" data-toggle="tab"><i></i><span class="strong">ជំហានទី ២</span><span>បង្កើតលិខិតរំលឹក</span></a></li>						
					</ul>
				</div>				
				
				<div class="widget-body">
					<div class="tab-content">					
						 
						<div class="tab-pane active" id="tab1-2">
							<div>											
								<select data-role="dropdownlist" data-text-field="meter_no" data-value-field="id"
									data-auto-bind="false" 
									data-bind="source: meterList, value: meter, events: {change : meterChange}" 
									data-option-label="(--- ជ្រើសរើស ---)" ></select>				
							</div>
							
							<div class="row-fluid">
								<div class="span6">
									<div data-role="grid" data-bind="source: readingList"
							            data-auto-bind="false" data-row-template="readingRowTemplate"                  
							            data-columns='[	                 	
							                { title: "", width: 30 },
							                { title: "ថ្ងៃអាន" },
							                { title: "ដល់" },	                     
							                { title: "អំនានសរុប" }							                                    	                    
							                ]'>
									</div>									
								</div>

								<div class="span6">
									<table width="100%">
										<tr>
											<td>ថាមពលមធ្យម</td>
											<td>
												<span data-bind="text: totalReading"></span> Kw
												/
												<span data-bind="text: selectedReading"></span>
												=
												<span data-bind="text: avg"></span> Kw
											</td>											
										</tr>
										<tr>
											<td>ថាមពលប្រើប្រាស់ក្នុងមួយថ្ងៃ</td>
											<td>
												<span data-bind="text: avg"></span> Kw
												/ 30 ថ្ងៃ =												
												<span data-bind="text: usage_per_day"></span> Kw
											</td>											
										</tr>
									</table>

									<span class="btn btn-primary btn-icon glyphicons refresh" data-bind="click: reset"><i></i>លុបចោល</span>
									
								</div>
							</div>
						</div>
						
						<div class="tab-pane" id="tab2-2">
							<h4 align="center">លិខិតរំលឹក</h4>

							<div class="row-fluid">
								<div class="span8">
									<table cellpadding="2" cellspacing="2">										        
										<tr>
							                <td>Class</td>
							              	<td><select data-role="combobox" data-text-field="name" data-value-field="id" data-bind="source: classList, value: class_id"></select></td>
							            <tr>            
										<tr>
											<td colspan="2">
												ទីតាំង
												<br>
												<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: address"></textarea>
											</td>
										</tr>
									</table>
								</div>	

								<div class="span4">							
									<table cellpadding="2" cellspacing="2">
										<tr>				
											<td>លេខវិក្ក​យបត្រ	</td>
											<td><input class="k-textbox" data-bind="value: number" style="width:140px;" readonly /></td>
										</tr>			
										<tr>
											<td>ថ្ងៃចេញលិខិតរំលឹក</td>
											<td><input data-role="datepicker" data-bind="value: issued_date" data-format="dd-MM-yyyy" /></td>
										</tr>
										<tr>
							                <td>កាលកំណត់</td>
							              	<td><select data-role="combobox" data-text-field="term" data-value-field="id" data-bind="source: paymentTermList, value: payment_term_id"></select></td>
							            <tr>
										<tr>
											<td>ថ្ងៃបង់ប្រាក់</td>
											<td><input data-role="datepicker" data-bind="value: due_date" data-format="dd-MM-yyyy" /></td>
										</tr>																            
									</table>
								</div>           		          	
						    </div>													

							<div data-role="grid" data-bind="source: noticeItemList"
						        data-auto-bind="false" data-row-template="noticeRowTemplate"                  
						        data-columns='[						        	
						            { title: "អំនានប្រចាំខែ", width: 135 },	                     
						            { title: "ចំនួនថ្ងៃ", width: 85 },
						            { title: "Kw/ថ្ងៃ", width: 55 },
						            { title: "ថាមពល", width: 60 },						            
						            { title: "តំលៃរាយ" },
						            { title: "ទឹកប្រាក់" },
						            { title: "ប្រាក់បង់រូច" },
						            { title: "ទឹកប្រាក់សរុប" }	                    	                    
						        ]'>
							</div>							
							<button class="btn btn-inverse" data-bind="click: addNewRow"><i class="icon-plus icon-white"></i></button>
							
							<div class="row-fluid">
								<div class="span8">
									អាសយដ្ឋាន
									<br>
									<textarea id="memo" cols="0" rows="4" class="k-textbox" style="width:300px" data-bind="value: memo"></textarea>								
								</div>

								<div class="span4">			
									<div class="innerAll padding-bottom-none-phone">
										<a data-bind="click: createNotice" class="widget-stats widget-stats-primary widget-stats-4">
											<span class="txt">សរុប</span>
											<span class="count" style="font-size: 35px;" data-bind="text: total"></span>
											<span class="glyphicons cart_in"><i></i></span>
											<div class="clearfix"></div>
											<i class="icon-play-circle"></i>
										</a>
									</div>	 					
								</div>			
							</div>

						</div>
						
						
					</div>					
				</div>
			</div>
		</div>	
	</div>		
</script>
<script id="readingRowTemplate" type="text/x-kendo-tmpl">		
	<tr>
		<td><input type="checkbox" data-bind="checked: isCheck, events: {change : checkboxChange}"></td>				
		<td>#:kendo.toString(date_read_from, 'dd-MM-yyyy')#</td>		
		<td>#:kendo.toString(date_read_to, 'dd-MM-yyyy')#</td>		
		<td>#:active_usage#</td>				
    </tr>   
</script>
<script id="noticeRowTemplate" type="text/x-kendo-tmpl">		
	<tr>				
		<td>
			<input data-role="datepicker" data-bind="value: month_of, events: {change : monthOfChange}" 
				data-start="year" data-depth="year"	data-format="MM-yyyy" style="width:120px;" />
		</td>		
		<td>
			<input data-role="numerictextbox" data-format="n0" data-min="0" data-max="30" 
				data-bind="value: days" style="width: 70px;">
		</td>
		<td align="right">#:usage_per_day#</td>
		<td align="right">#:kendo.parseInt(days*usage_per_day)#</td>
		<td align="right">#:kendo.toString(unit_price, 'c0')#</td>
		<td align="right">#:kendo.toString((kendo.parseInt(days*usage_per_day))*unit_price, 'c0')#</td>
		<td align="right">#:kendo.toString(amount_paid, 'c0')#</td>		
		<td align="right">
			#:kendo.toString(((kendo.parseInt(days*usage_per_day))*unit_price)-amount_paid, 'c0')#
			<i class="icon-trash" data-bind="events: { click: removeRow "></i>
		</td>					
    </tr>   
</script> 

<!-- Statement -->
<script id="statement" type="text/x-kendo-template">
	<div class="row-fluid">    
		<div class="span12">
			<div id="example" class="k-content">
				<div>
					<input data-role="datepicker" data-format="dd-MM-yyyy" data-bind="value: statement_date" placeholder="កាលបរិច្ឆេទ" />
					<br>
					<input data-role="datepicker" data-format="dd-MM-yyyy" data-bind="value: start_date" placeholder="ចាប់ពី" />
					<input data-role="datepicker" data-format="dd-MM-yyyy" data-bind="value: end_date" placeholder="ដល់" />
					<button type="button" class="btn btn-default" data-bind="click: loadStatement"><i class="icon-search"></i></button>
					<button type="button" class="btn btn-default" data-bind="click: printStatement"><i class="icon-print"></i></button>					
				</div>				

				<div id="divStatement">
					<h3 align="center">បញ្ជីបំណុល</h3>
			        
		        	<div class="pull-right">		          	
			          	<p>
			              	កាលបរិច្ឆេទ
			              	<span data-bind="text: statement_date_text"></span>
			              	<br>
				          	ប្រាក់ត្រូវបង់
			          	</p>		          	

			          	<div align="right">		          		
			          		<span data-bind="text: amount_due"
			          			style="color: white; font-size: 30px; background-color:maroon; border:0px solid black; padding: 5px;"></span>		          			          		
			          	</div>		          	
			        </div>

			        <div>
			        	ឈ្មោះ : 
			        	<span data-bind="text: fullname"></span>
			        	<br>
			          	អាសយដ្ឋាន
			          	<br>
			          	<textarea name="address" id="address" class="k-textbox" cols="0" rows="2" data-bind="text: address"></textarea>
			        </div>

			        <div data-role="grid" data-bind="source: statementList"
				        data-auto-bind="false" 
				        data-row-template="statementRowTemplate"                  
				        data-columns='[						        	
				            { title: "កាលបរិច្ឆេទ" },	                     
				            { title: "បរិយាយ" },
				            { title: "ទឹកប្រាក់" },
				            { title: "សមតុល្យ" }                    	                    
				        ]'>
					</div>

					<br>

					<div data-role="grid" data-bind="source: agingList"
				        data-auto-bind="false" 
				        data-row-template="agingRowTemplate"                  
				        data-columns='[						        	
				            { title: "បច្ចុប្បន្ន" },	                     
				            { title: "១-៣០ថ្ងៃ" },
				            { title: "៣១-៦០ថ្ងៃ" },
				            { title: "៦១-៩០ថ្ងៃ" },
				            { title: "លើសពី ៩០ថ្ងៃ" },
				            { title: "ទឹកប្រាក់ត្រូវបង់" }                    	                    
				        ]'>
					</div>			        

				</div>

			</div>           
		</div> 		
	</div> 		
</script>
<script id="statementRowTemplate" type="text/x-kendo-tmpl">		
	<tr>		
		<td>#:kendo.toString(new Date(issued_date), 'dd-MM-yyyy')#</td>
		<td>
			#if(kendo.parseFloat(amount)>0){#
				<a href="\#invoice/#=id#">#:description#</a>
			#}else{#
				#:description#
			#}#
		</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(amount), 'c0')#</td>		
		<td align="right">
			#:kendo.toString(kendo.parseFloat(balance), 'c0')#			
		</td>					
    </tr>   
</script>
<script id="agingRowTemplate" type="text/x-kendo-tmpl">		
	<tr>		
		<td align="right">#:kendo.toString(kendo.parseFloat(current), 'c')#</td>		
		<td align="right">#:kendo.toString(kendo.parseFloat(within30), 'c')#</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(within60), 'c')#</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(within90), 'c')#</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(over90), 'c')#</td>
		<td align="right">
			#:kendo.toString(kendo.parseFloat(current) +
							kendo.parseFloat(within30) +
							kendo.parseFloat(within60) +
							kendo.parseFloat(within90) +
							kendo.parseFloat(over90), 'c')#
		</td>					
    </tr>   
</script>

<!-- Cashier -->
<script id="cashier" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">			
			<div id="example">
				<div class="span3">				
			      	<div class="innerAll">
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button id="btnSearch" type="button" class="btn btn-default pull-right" data-bind="click: customerSearch"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input id="txtSearch" type="text" placeholder="លេខកូដអតិថិជន..." data-bind="value: searchField">
								</div>
							</div>						
						</form>
					</div>							
			      					
					<h5><i class="icon-info-sign"></i> ពត៌មានសង្ខេបអតិថិជន</h5>				
					<table width="100%" style="background-color:Silver; color:black;">
						<tr>
							<td colspan="2">
								<i class="icon-user icon-li icon-fixed-width"></i> 
								<span data-bind="text: customer.number"></span>
								<span data-bind="text: customer.surname"></span> 
								<span data-bind="text: customer.name"></span>
							</td>																			
						</tr>
						<tr>
							<td colspan="2">								
								សមតុល្យ: <span data-bind="text: balance"></span>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								ប្រាក់កក់: <span data-bind="text: deposit_amount"></span>
							</td>							
						</tr>
						<tr>
							<td>
								<i class="icon-group icon-li icon-fixed-width"></i> <span data-bind="text: customer.people_types.name"></span>
							</td>
							<td>
								<i class="icon-phone icon-li icon-fixed-width"></i> <span data-bind="text: customer.phone"></span>
							</td>
						</tr>											
						<tr>
							<td colspan="2">
								<i class="icon-home icon-li icon-fixed-width"></i> <span data-bind="text: customer.address"></span>
							</td>						
						</tr>
					</table>

					<br>			
					
					<h5><i class="icon-list"></i> ប្រតិបត្តិការ</h5>
					
					<div id="transactionGrid" data-role="grid" data-bind="source: statementCollectionList"
			            data-row-template="transactionRowTemplate" data-auto-bind="false"                  
			            data-columns='[{ title: "កាលបរិច្ឆេទ", width: 75 }, 
			                { title: "ប្រភេទ", width: 60 },	                     
			                { title: "ទឹិកប្រាក់" }	                    
			                ]'>
					</div>
				
				</div> <!-- //End span3 -->

				<div class="span9">
					<div class="row-fluid">
						<div class="span4">
							<div class="innerAll padding-bottom-none-phone">
								<a href="javascript:void(0)" class="widget-stats widget-stats-gray widget-stats-4"> 
									<span class="txt">អតិថិជន</span>
									<span class="count" data-bind="text: total_customer"></span>
									<span class="glyphicons user"><i></i></span>
									<div class="clearfix"></div>
									<i class="icon-play-circle"></i> 
								</a>
							</div>
						</div>

						<div class="span4">
							<div class="innerAll padding-bottom-none-phone">
								<a href="#daily_payment" class="widget-stats widget-stats-primary widget-stats-4">
									<span class="txt">បង់ប្រាក់ប្រចាំថ្ងៃ</span>
									<span class="count"><span data-bind="text: total_payment" style="font-size: 35px;"></span></span>
									<span class="glyphicons coins"><i></i></span>
									<div class="clearfix"></div>
									<i class="icon-play-circle"></i>
								</a>
							</div>
						</div>

						<div class="span4">
							<div class="innerAll padding-bottom-none-phone">
								<a href="#reconcile" class="widget-stats widget-stats-inverse widget-stats-5">
									<span class="glyphicons refresh"><i></i></span>
									<span class="txt">ផ្ទៀងផ្ទាត់ &<br><br> ផ្ទេរសាច់ប្រាក់</span>
									<div class="clearfix"></div>
								</a>
							</div>
						</div>				

					</div> <!-- //End row-fluid -->
					
					<br>

					<div class="row-fluid">
						<div class="span4">						
							<table>								
								<tr>
					                <td>Class</td>
					              	<td><select id="classes" name="classes" data-role="combobox" 
					              				data-text-field="name" data-value-field="id" 
					              				data-bind="source: classList, value: class_id"
					              				required data-required-msg="ត្រូវការ Class"></select>
					              	</td>
					            </tr>
								<tr>
				                    <td>វីធីបង់ប្រាក់</td>
				                  	<td>
				                  		<select id="paymentMethod" name="paymentMethod" data-role="combobox"
				                  				data-text-field="name" data-value-field="id" 
				                  				data-bind="source: paymentMethodList, value: payment_method_id"
				                  				required data-required-msg="ត្រូវការ វីធីបង់ប្រាក់"></select>
				                  	</td>
				                <tr>
								<tr>
					                <td>លេខកូដសែក</td>
					                <td><input id="check_no" class="k-textbox" data-bind="value: check_no" /></td>
					            <tr>
					            <tr>
									<td>គណនីសាច់ប្រាក់</td>
									<td>
										<select id="cashAccount" name="cashAccount" data-role="combobox" 
												data-text-field="name" data-value-field="id" 
												data-bind="source: cashAccountList, value: cash_account_id"
												required data-required-msg="ត្រូវការ គណនីសាច់ប្រាក់"></select>
									</td>
								</tr>
							</table>							
						</div>
						<div class="span4">

						</div>
						<div class="span4">
							<p>
				              	ថ្ងៃទទួលប្រាក់
				              	<input id="paymentDate" name="paymentDate" data-role="datepicker" 
				              			data-bind="value: payment_date" data-format="dd-MM-yyyy"
				              			required data-required-msg="ត្រូវការ ថ្ងៃទទួលប្រាក់" />
				              	<br>
					          	ប្រាក់ត្រូវបង់
				          	</p>		          	

				          	<div align="right">		          		
				          		<span style="color: white; font-size: 30px; background-color:maroon; border:0px solid black; padding: 5px;" data-bind="text: total"></span>		          			          		
				          	</div>
						</div>
					</div>
					
					<br>

					<div data-role="grid" data-bind="source: invoiceList"
			            data-auto-bind="false" data-row-template="invoiceCashierRowTemplate"                  
			            data-columns='[{ title: "", width: 25 },	                 	
			                { title: "ល.រ", width: 40 },
			                { title: "កាលបរិច្ឆេទ", width:80 },	                     
			                { title: "ឈ្មោះ" },
			                { title: "# វិក្កយបត្រ" },
			                { title: "ទឹកប្រាក់" },	                    	                     
			                { title: "ទទួលប្រាក់" }	                    	                    
			                ]'>
					</div>
					
					<br>

					<div id="status"></div>

					<div class="row-fluid">
						<div class="span6">
							<div class="innerAll padding-bottom-none-phone">
								<a id="save" name="save" class="widget-stats widget-stats-info widget-stats-4">
									<span class="txt">ទឹកប្រាក់ទទួលបាន</span>
									<span class="count" style="font-size: 35px;" data-bind="text: pay_amount"></span>
									<span class="glyphicons cart_in"><i></i></span>
									<div class="clearfix"></div>
									<i class="icon-play-circle"></i>
								</a>
							</div>
						</div>
						<div class="span2">

						</div>
						<div class="span4">
							<table>
								<tr>
									<td>ទឹកប្រាក់ត្រូវបង់:</td>
									<td align="right"><span data-bind="text: total"></span></td>
								</tr>
								<tr>
									<td>បញ្ចុះតំលៃ:</td>
									<td><input data-role="numerictextbox" data-format="c0" data-bind="value: discount, events: {change : change}" /></td>
								</tr>
								<tr>
									<td>ទឹកប្រាក់ពិន័យ:</td>							
									<td><input data-role="numerictextbox" data-format="c0" data-bind="value: fine, events: {change : change}" /></td>
								</tr>
								<tr>
									<td>ទឹកប្រាក់ទទួលបាន:</td>
									<td align="right"><span data-bind="text: pay_amount"></span></td>
								</tr>
								<tr>
									<td>នៅសល់:</td>
									<td align="right"><span data-bind="text: remain"></span></td>
								</tr>
							</table>
						</div>
					</div>
				</div> <!-- //End span9 -->
			</div> <!-- //End example -->
		</div>
	</div>
</script>
<script id="cashierSingle" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">			
				<div id="example">
					<div align="right">			        				        	
			        	<button type="button" aria-hidden="true" data-bind="click:closeX">X</button>			        	
					</div>
					<h3 class="heading glyphicons cart_in"><i></i> ទទួលប្រាក់</h3>

					<div class="row-fluid">
						<div class="span4">						
							<table>								
								<tr>
					                <td>Class</td>
					              	<td><select id="classes" name="classes" data-role="combobox" 
					              				data-text-field="name" data-value-field="id" 
					              				data-bind="source: classList, value: class_id"
					              				required data-required-msg="ត្រូវការ Class"></select>
					              	</td>
					            </tr>
								<tr>
				                    <td>វីធីបង់ប្រាក់</td>
				                  	<td>
				                  		<select id="paymentMethod" name="paymentMethod" data-role="combobox"
				                  				data-text-field="name" data-value-field="id" 
				                  				data-bind="source: paymentMethodList, value: payment_method_id"
				                  				required data-required-msg="ត្រូវការ វីធីបង់ប្រាក់"></select>
				                  	</td>
				                <tr>
								<tr>
					                <td>លេខកូដសែក</td>
					                <td><input id="check_no" class="k-textbox" data-bind="value: check_no" /></td>
					            <tr>
					            <tr>
									<td>គណនីសាច់ប្រាក់</td>
									<td>
										<select id="cashAccount" name="cashAccount" data-role="combobox" 
												data-text-field="name" data-value-field="id" 
												data-bind="source: cashAccountList, value: cash_account_id"
												required data-required-msg="ត្រូវការ គណនីសាច់ប្រាក់"></select>
									</td>
								</tr>
							</table>							
						</div>
						<div class="span4">

						</div>
						<div class="span4">
							<p>
				              	ថ្ងៃទទួលប្រាក់
				              	<input id="paymentDate" name="paymentDate" data-role="datepicker" 
				              			data-bind="value: payment_date" data-format="dd-MM-yyyy"
				              			required data-required-msg="ត្រូវការ ថ្ងៃទទួលប្រាក់" />
				              	<br>
					          	ប្រាក់ត្រូវបង់
				          	</p>		          	

				          	<div align="right">		          		
				          		<span style="color: white; font-size: 30px; background-color:maroon; border:0px solid black; padding: 5px;" data-bind="text: total"></span>		          			          		
				          	</div>
						</div>
					</div>
					
					<br>

					<div data-role="grid" data-bind="source: invoiceList"
			            data-auto-bind="false" data-row-template="invoiceCashierSingleRowTemplate"                  
			            data-columns='[{ title: "", width: 50 },	                 	
			                { title: "ល.រ", width: 70 },
			                { title: "កាលបរិច្ឆេទ" },			                
			                { title: "# វិក្កយបត្រ" },
			                { title: "ទឹកប្រាក់" },	                    	                     
			                { title: "ទទួលប្រាក់" }	                    	                    
			                ]'>
					</div>
					
					<br>

					<div id="status"></div>

					<div class="row-fluid">
						<div class="span6">
							<div class="innerAll padding-bottom-none-phone">
								<a id="save" name="save" class="widget-stats widget-stats-info widget-stats-4">
									<span class="txt">ទឹកប្រាក់ទទួលបាន</span>
									<span class="count" style="font-size: 35px;" data-bind="text: pay_amount"></span>
									<span class="glyphicons cart_in"><i></i></span>
									<div class="clearfix"></div>
									<i class="icon-play-circle"></i>
								</a>
							</div>
						</div>
						<div class="span2">

						</div>
						<div class="span4">
							<table>
								<tr>
									<td>ទឹកប្រាក់ត្រូវបង់:</td>
									<td align="right"><span data-bind="text: total"></span></td>
								</tr>
								<tr>
									<td>បញ្ចុះតំលៃ:</td>
									<td><input data-role="numerictextbox" data-format="c0" data-bind="value: discount, events: {change : change}" /></td>
								</tr>
								<tr>
									<td>ទឹកប្រាក់ពិន័យ:</td>							
									<td><input data-role="numerictextbox" data-format="c0" data-bind="value: fine, events: {change : change}" /></td>
								</tr>
								<tr>
									<td>ទឹកប្រាក់ទទួលបាន:</td>
									<td align="right"><span data-bind="text: pay_amount"></span></td>
								</tr>
								<tr>
									<td>នៅសល់:</td>
									<td align="right"><span data-bind="text: remain"></span></td>
								</tr>
							</table>
						</div>
					</div>				
				</div> <!-- //End example -->
			</div>
		</div>
	</div>
</script>
<script id="transactionRowTemplate" type="text/x-kendo-tmpl">
    <tr>        
        <td>#:kendo.toString(new Date(issued_date), "dd-MM-yy")#</td>
        <td>#:type#</td>
        <td>#:kendo.toString(kendo.parseFloat(amount), "c", sub_code)#</td>        
   	</tr>
</script>
<script id="invoiceCashierSingleRowTemplate" type="text/x-kendo-tmpl">		
	<tr id="rowGrid-#:id#">
		<td>
			<input type="checkbox" data-bind="checked: isPay, events:{change: checkPay}">			
		</td>
		<td class="sno">1</td>			
		<td>#:kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>		
		<td>#:number#</td>				
		<td align="right">#:kendo.toString(total, "c", sub_code)#</td>
		<td>
			<input id="payment" name="payment" data-role="numerictextbox" 
					data-format="c" data-culture=#:sub_code#
					data-bind="value: pay_amount, events: {change : change}" 
					style="width: 120px;">
			<i class="icon-trash" data-bind="events: { click: remove "></i>						
		</td>				
    </tr>   
</script>
<script id="invoiceCashierRowTemplate" type="text/x-kendo-tmpl">		
	<tr id="rowGrid-#:id#">
		<td>
			<input type="checkbox" data-bind="checked: isPay, events:{change: checkPay}">			
		</td>
		<td class="sno">1</td>			
		<td>#:kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>		
		<td>#:fullname#</td>
		<td>#:number#</td>				
		<td align="right">#:kendo.toString(total, "c", sub_code)#</td>
		<td>
			<input id="payment" name="payment" data-role="numerictextbox" 
					data-format="c" data-culture=#:sub_code#
					data-bind="value: pay_amount, events: {change : change}" 
					style="width: 120px;">
			<i class="icon-trash" data-bind="events: { click: remove "></i>						
		</td>				
    </tr>   
</script>

<script id="dailyPayment" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<div align="right">			        				        	
			        	<button type="button" aria-hidden="true" data-bind="click:closeX">X</button>			        	
					</div>
					
					<div>
						<input data-role="datepicker" data-bind="value: payment_date_from" data-format="dd-MM-yyyy" placeHolder="ចាប់ពី" />
						<input data-role="datepicker" data-bind="value: payment_date_to" data-format="dd-MM-yyyy" placeHolder="ដល់" />
						<button type="button" class="btn btn-default" data-bind="click: searchPayment"><i class="icon-search"></i></button>
					</div>

					<div align="center">
						<h4>របាយការណ៍ទទួលប្រាក់</h4>
						ថ្ងៃទី
						<span data-bind="text: payment_date_from_str"></span>																	
						<span data-bind="text: payment_date_to_str"></span>
						<br>									
						ដោយ
						<span data-bind="text: cashier_name"></span>									
					</div>

					<br>

					<div data-role="grid" data-bind="source: paymentList"
						data-pageable="true"
				        data-auto-bind="false" data-row-template="dailyPaymentRowTemplate"                  
				        data-columns='[	                
				            { title: "ថ្ងៃបង់ប្រាក់" },				            
				            { title: "ឈ្មោះ" },						                
				            { title: "លេខវិក្កយបត្រ" },
				            { title: "វិធីបង់ប្រាក់" },
				            { title: "ទឹកប្រាក់" },	                    	                     
				            { title: "ប្រាក់ទទួលបាន" }	                    	                    
				            ]'>
					</div>

					<br>

					<div class="row-fluid">				
						<div class="span4 offset8">
							<div class="innerAll padding-bottom-none-phone">
								<a href="#" class="widget-stats widget-stats-primary widget-stats-4">
									<span class="txt">សរុប</span>
									<span class="count"><span data-bind="text: totalPaid" style="font-size: 35px;"></span></span>
									<span class="glyphicons coins"><i></i></span>
									<div class="clearfix"></div>
									<i class="icon-play-circle"></i>
								</a>
							</div>
						</div>				
					</div>
				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->
	</div>	
</script>
<script id="dailyPaymentRowTemplate" type="text/x-kendo-tmpl">		
	<tr>					
		<td>#:kendo.toString(new Date(payment_date), "dd-MM-yyyy")#</td>
		<td>#:customers.number# #:customers.surname# #:customers.name#</td>		
		<td>#:invoices.number#</td>
		<td>#:payment_methods.name#</td>				
		<td align="right">#:kendo.toString(kendo.parseFloat(invoices.amount), "c")#</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(amount_paid), "c")#</td>				
    </tr>   
</script>
<script id="reconcile" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<div align="right">			        				        	
			        	<button type="button" aria-hidden="true" data-bind="click:closeX">X</button>			        	
					</div>

					<div align="center">
						<h4>របាយការណ៍ផ្ទៀងផ្ទាត់ និង ផ្ទេរសាច់ប្រាក់</h4>
						ថ្ងៃទី
						<span data-bind="text: today"></span>
						<br>
						ដោយ
						<span data-bind="text: cashier_name"></span>
					</div>

					<div data-role="grid" data-bind="source: denominationList" data-editable="true"						
			            data-row-template="denominationRowTemplate"                  
			            data-columns='[	                
			                { title: "ប្រាក់", width: 65 },	                
			                { title: "ចំនួនប្រាក់ដុល្លា" },
			                { title: "ចំនួនប្រាក់រៀល" },	                    	                     
			                { title: "ទឹកប្រាក់ជាដុល្លា" },
			                { title: "ទឹកប្រាក់ជារៀល" },
			                { title: "ចំ.ប្រាក់ដុល្លាផ្ទេរ" },
			                { title: "ចំ.ប្រាក់រៀលផ្ទេរ" },	                    	                     
			                { title: "ប្រាក់ជាដុល្លាផ្ទេរ" },
			                { title: "ប្រាក់ជារៀលផ្ទេរ" }	                    	                    
			                ]'>
					</div>

					<br>

					<div class="row-fluid">
						<!-- //Reconcile -->
						<div class="span6">
							<h4 class="heading">ផ្ទៀងផ្ទាត់</h4>

							<table class="table table-condensed">
								<tr>
									<td>ប្រាក់ទទួលបាន</td>
									<td></td>											
									<td align="right"><span class="count" data-bind="text: totalReceive"></span></td>												
								</tr>
								<tr>
									<td>ប្រាក់នៅសល់ពីមុន</td>
									<td></td>											
									<td align="right" style="border-bottom: 1px solid black;"><span class="count" data-bind="text: prevRemain"></span></td>												
								</tr>
								<tr>
									<td>សមតុល្យសាច់ប្រាក់(ក)</td>
									<td></td>												
									<td align="right"><span class="count" data-bind="text: totalCash"></span></td>
								</tr>

								<!-- Reconcile -->
								<tr>
									<td>ប្រាក់ជាដុល្លា</td>
									<td>
										$<span class="count" data-bind="text: totalD"></span> x
										<input data-role="numerictextbox" data-format="c0" data-min="0" data-bind="value: rate"  style="width:70px;">
									</td>
									<td align="right"><span class="count" data-bind="text: totalDtoR"></span></td>												
								</tr>
								<tr>
									<td>ប្រាក់ជារៀល</td>
									<td></td>
									<td align="right" style="border-bottom: 1px solid black;"><span class="count" data-bind="text: totalR"></span></td>												
								</tr>
								<tr>
									<td>សាច់ប្រាក់ទទួលជាក់ស្ដែងសរុប(ខ)</td>
									<td></td>												
									<td align="right"><span class="count" data-bind="text: totalDR"></span></td>
								</tr>
								<tr id="reconcileBalance">
									<td>ផ្ទៀងផ្ទាត់(ក-ខ)</td>
									<td></td>												
									<td align="right"><span class="count" data-bind="text: reconcileBalance"></span></td>
								</tr>																				
							</table>
						</div>

						<!-- //Transfer -->
						<div class="span6">
							<div class="heading">
								<h4>
									ផ្ទេរសាច់ប្រាក់
									<span class="btn btn-mini btn-primary btn-icon glyphicons share" data-bind="click: transferAll"><i></i> ផ្ទេរទាំងអស់</span>
								</h4>											
							</div>
							
							<table class="table table-condensed">
								<tr>
									<td>ប្រាក់ផ្ទេរជាដុល្លា</td>
									<td>
										$<span class="count" data-bind="text: totalDT"></span> x
										<input data-role="numerictextbox" data-format="c0" data-min="0" data-bind="value: rate"  style="width:70px;">												
									</td>
									<td align="right"><span class="count" data-bind="text: totalDTtoRT"></span></td>												
								</tr>
								<tr>
									<td>ប្រាក់ផ្ទេរជារៀល</td>
									<td></td>
									<td align="right" style="border-bottom: 1px solid black;"><span class="count" data-bind="text: totalRT"></span></td>												
								</tr>
								<tr>
									<td>ប្រាក់ផ្ទេរសរុប</td>
									<td></td>												
									<td align="right"><span class="count" data-bind="text: totalTransferCash"></span></td>
								</tr>
								<tr>
									<td>សាច់ប្រាក់ចុងគ្រា</td>
									<td></td>												
									<td align="right"><span class="count" data-bind="text: transferBalance"></span></td>
								</tr>
								<tr>
									<td>ផ្ទេរទៅគណនីណាមួយ</td>
									<td>
										<select id="transferAccountId" name="transferAccountId" data-role="combobox" 
												data-text-field="name" data-value-field="id" 
												data-bind="source: accountList, value: transfer_account_id"
												required data-required-msg="ត្រូវការ ផ្ទេរទៅគណនីណាមួយ"></select>
									</td>
									<td><select id="classes" name="classes" data-role="combobox" 
					              				data-text-field="name" data-value-field="id" 
					              				data-bind="source: classList, value: class_id"
					              				placeholder="Class"
					              				required data-required-msg="ត្រូវការ Class"></select></td>
								</tr>
								<tr align="top">
									<td>សំគាល់:</td>
									<td colspan="2">
										<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: memo"></textarea>
									</td>
								</tr>								
							</table>
							
							<div align="right">
								<div id="status"></div>
								<span id="save" class="btn btn-success btn-icon glyphicons hdd"><i></i>កត់ត្រាផ្ទៀងផ្ទាត់ និង ផ្ទេរសាច់ប្រាក់</span>											
							</div>																			
						</div>									
					</div>				
				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->
	</div>	
</script>
<script id="denominationRowTemplate" type="text/x-kendo-tmpl">		
	<tr align="right">				
		<td>#:kendo.toString(kendo.parseFloat(denomination), "n0")#</td>
		<td>
			<input data-role="numerictextbox" data-format="n0" data-min="0" style="width:90px;"
				data-bind="value: qty_usd, events: {change : change}" #: denomination>100 ? disabled="disabled" : "" # >
		</td>
		<td>
			<input data-role="numerictextbox" data-format="n0" data-min="0" style="width:90px;"
				data-bind="value: qty_khr, events: {change : change}" #: denomination<100 ? disabled="disabled" : "" # >
		</td>
		<td>$#:kendo.toString(denomination * qty_usd,'n0')#</td>
		<td>#:kendo.toString(denomination * qty_khr,'c0')#</td>

		<td bgcolor="silver">
			<input data-role="numerictextbox" data-format="n0" data-min="0" style="width:90px;"
				data-bind="value: qty_usd_transfer, events: {change : change}" #: denomination>100 ? disabled="disabled" : "" # >
		</td>
		<td bgcolor="silver">
			<input data-role="numerictextbox" data-format="n0" data-min="0" style="width:90px;"
				data-bind="value: qty_khr_transfer, events: {change : change}" #: denomination<100 ? disabled="disabled" : "" # >
		</td>
		<td bgcolor="silver">$#:kendo.toString(denomination * qty_usd_transfer,'n0')#</td>
		<td bgcolor="silver">#:kendo.toString(denomination * qty_khr_transfer,'c0')#</td>					
    </tr>   
</script>

<script id="customerBalance" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<h3 align="center">បញ្ជីអតិថិជន</h3>	

					<div id="top" align="right">
						<a href="#bottom">ទៅកាន់ផ្នែកខាងក្រោម &darr;</a>
					</div>

					<div>
						<input id="company" name="company" placeholder="អាជ្ញាបណ្ណ" />
						<input id="transformer" name="transformer" placeholder="តំបន់" disabled="disabled" />					    
						<button id="search" type="button" class="btn btn-default"><i class="icon-search"></i></button>						
					</div>

					<div id="grid"></div>	

					<br>

				    <div id="bottom" align="right">
						<a href="#top">ទៅកាន់ផ្នែកខាងលើ &uarr;</a>
					</div>					
				</div> <!-- //End div example--> 
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->
	</div>	
</script>
<script id="agingSummary" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">				
					<div>						
						<select id="company" name="company" data-role="dropdownlist" 
								data-text-field="abbr" data-value-field="id" 
								data-bind="source: companyList, value: company_id" 
								data-option-label="(--- អាជ្ញាបណ្ណ ---)"></select>
						<select id="transformer" name="transformer" data-role="dropdownlist" 
								data-text-field="transformer_number" data-value-field="id"
		          				data-cascade-from="company" data-bind="source: transformerList, value: transformer_id" 
		          				data-auto-bind="false" data-option-label="(--- តំបន់ ---)"></select>
						<input data-role="datepicker" data-bind="value: issued_date" data-format="dd-MM-yyyy" placeHolder="កាលបរិច្ឆេទ" />
						<button id="search" type="button" class="btn btn-default"><i class="icon-eye-open"></i></button>				
					</div>

					<div id="divAging">
						<div align="center">
							<h3>បំណុលអតិថិជនសង្ខេប</h3>
							គិតត្រឹម
							<span data-bind="text: issued_date_text"></span>
						</div>
						
						<div data-role="grid" data-bind="source: agingList"
					        data-auto-bind="false" data-row-template="agingSummaryRowTemplate"
					        data-pageable="true"                  
					        data-columns='[			            
					            { title: "លេខកូដ" },
					            { title: "ឈ្មោះ" },
					            { title: "បច្ចុប្បន្ន" },	                     
					            { title: "១-៣០ថ្ងៃ" },
					            { title: "៣១-៦០ថ្ងៃ" },
					            { title: "៦១-៩០ថ្ងៃ" },
					            { title: "លើសពី ៩០ថ្ងៃ" },
					            { title: "សរុប" }                    	                    
					        ]'>
						</div>
					</div>					
				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->	
	</div>	
</script>
<script id="agingSummaryRowTemplate" type="text/x-kendo-tmpl">		
	<tr>		
		<td>#:number#</td>
		<td>#:fullname#</td>		
		<td align="right">#:kendo.toString(kendo.parseFloat(current), 'c0')#</td>		
		<td align="right">#:kendo.toString(kendo.parseFloat(within30), 'c0')#</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(within60), 'c0')#</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(within90), 'c0')#</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(over90), 'c0')#</td>
		<td align="right">
			#:kendo.toString(kendo.parseFloat(current) +
							kendo.parseFloat(within30) +
							kendo.parseFloat(within60) +
							kendo.parseFloat(within90) +
							kendo.parseFloat(over90), 'c0')#
		</td>					
    </tr>   
</script>
<script id="agingDetail" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">				
					<div>
						<select id="company" name="company" data-role="dropdownlist" 
								data-text-field="abbr" data-value-field="id" 
								data-bind="source: companyList, value: company_id" 
								data-option-label="(--- អាជ្ញាបណ្ណ ---)"></select>
						<select id="transformer" name="transformer" data-role="dropdownlist" 
								data-text-field="transformer_number" data-value-field="id"
		          				data-cascade-from="company" data-bind="source: transformerList, value: transformer_id" 
		          				data-auto-bind="false" data-option-label="(--- តំបន់ ---)"></select>
						<input data-role="datepicker" data-bind="value: issued_date" data-format="dd-MM-yyyy" placeHolder="កាលបរិច្ឆេទ" />
						<button id="search" type="button" class="btn btn-default"><i class="icon-eye-open"></i></button>				
					</div>
					
					<div align="center">
						<h3>បំណុលអតិថិជនលំអិត</h3>
						គិតត្រឹម
						<span data-bind="text: issued_date_text"></span>
					</div>
					
					<div data-role="grid" data-bind="source: agingList"
				        data-auto-bind="false" data-row-template="agingDetailRowTemplate"
				        data-pageable="true"                 
				        data-columns='[				            
				            { title: "ឈ្មោះ" },				            
				            { title: "លេខវិក្កយបត្រ" },
				            { title: "ថ្ងៃចេញវិក្កយបត្រ" },	                     
				            { title: "ថ្ងៃផុតកំណត់" },
				            { title: "អាយុកាល" },				            
				            { title: "ទឹកប្រាក់" }               	                    
				        ]'>
					</div>									
				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->	
	</div>	
</script>
<script id="agingDetailRowTemplate" type="text/x-kendo-tmpl">		
	<tr>		
		<td>#:number# #:surname# #:name#</td>		
		<td></td>		
		<td></td>
		<td></td>
		<td></td>
		<td></td>
    </tr>
    #var total = 0;#
    #if(invoices.length>0){#    	
    	#for (var i=0;i<invoices.length;i++) {#
    		#total += kendo.parseFloat(invoices[i].amount)/kendo.parseFloat(invoices[i].rate)#    	
	    	<tr>	    		
	    		<td align="right">
	    			#if(invoices[i].type==="eInvoice"){#								
						វិក្កយបត្រអគ្គីសនី
					#}else if(invoices[i].type==="Notice"){#
						លិខិតរំលឹក
		        	#}else{#
		        		វិក្កយបត្រ
		        	#}#	    			
	    		</td>
				<td>
					#if(invoices[i].type==="Invoice"){#								
						<a href="\#invoice/#=invoices[i].id#"><i></i> #=invoices[i].number#</a>					
		        	#}else{#
		        		#=invoices[i].number#
		        	#}#					
				</td>		
				<td>#:kendo.toString(new Date(invoices[i].issued_date), "dd-MM-yyyy")#</td>
				<td>#:kendo.toString(new Date(invoices[i].due_date), "dd-MM-yyyy")#</td>
				<td>
					# var date = new Date(), dueDate = new Date(invoices[i].due_date).getTime(), toDay = new Date(date).getTime();#
					#if(dueDate < toDay) {#
						លើសកំណត់ #:Math.floor((toDay - dueDate)/(1000*60*60*24))# ថ្ងៃ
					#} else {#
						#:Math.floor((dueDate - toDay)/(1000*60*60*24))# ថ្ងៃនឹងត្រូវទូទាត់
					#}#
				</td>
				<td align="right">
					#:kendo.toString(kendo.parseFloat(invoices[i].amount)/kendo.parseFloat(invoices[i].rate), "c", invoices[i].sub_code)#
				</td>
	    	</tr>
    	#}#
    #}#
    #if(invoices.length>0){#
    	<tr>		
			<td>សរុប:</td>			
			<td></td>		
			<td></td>
			<td></td>
			<td></td>
			<td align="right" style="border:solid;border-bottom:thick;border-left:thick;border-right:thick;">
				#=kendo.toString(total, "c", invoices[0].sub_code)#
			</td>
	    </tr>
    #}#   
</script>
<script id="lowConsumption" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">														
				<div>
					<select id="company" name="company" data-role="dropdownlist" data-text-field="abbr" data-value-field="id" 
				            data-bind="source: companyList, value: company_id" data-option-label="(--- រើស អាជ្ញាប័ណ្ណ ---)"></select>

				    <select id="transformer" name="transformer" data-role="dropdownlist" data-text-field="transformer_number" data-value-field="id"
	          				data-cascade-from="company" data-bind="source: transformerList, value: transformer_id" data-auto-bind="false" 
	          				data-option-label="(--- រើស ត្រង់ស្វូ ---)"></select>
					
					<input data-role="datepicker" data-bind="value: reading_date" data-format="dd-MM-yyyy" placeHolder="កាលបរិច្ឆេទ" />
					<input data-role="numerictextbox" data-format="<= # kw" data-min="0" data-bind="value: usage" placeHolder="ថាមពល">
					<button type="button" class="btn btn-default" data-bind="click: search"><i class="icon-eye-open"></i></button>				
				</div>

				<br>

				<div id="divConsumption">
					<div align="center">
						<h3>អតិថិជនប្រើប្រាស់ថាមពលជាអប្បបរិមា</h3>
						គិតត្រឹម
						<span data-bind="text: reading_date_text"></span>
					</div>
					
					<div data-role="grid" data-bind="source: consumptionList"
				        data-auto-bind="false" data-row-template="lowConsumptionRowTemplate"
				        data-pageable="true"                  
				        data-columns='[			            
				            { title: "លេខកូដ" },
				            { title: "ឈ្មោះ" },
				            { title: "កុងទ័រ" },
				            { title: "៣ ខែមុន" }	,
				            { title: "២ ខែមុន" },
				            { title: "១ ខែមុន" },
				            { title: "បច្ចុប្បន្ន" }			            		                             	                    
				        ]'>
					</div>
				</div>					
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->	
</script>
<script id="lowConsumptionRowTemplate" type="text/x-kendo-tmpl">		
	<tr>		
		<td>#:customers.number#</td>
		<td>#:customers.surname# #:customers.name#</td>	
		<td>#:meter#</td>	
		<td align="right">#:month3#</td>		
		<td align="right">#:month2#</td>
		<td align="right">#:month1#</td>
		<td align="right">#:current#</td>							
    </tr>   
</script>
<script id="disconnectList" type="text/x-kendo-template">
	<div>				
		<select id="company" name="company" data-role="dropdownlist" data-text-field="abbr" data-value-field="id" 
	            data-bind="source: companyList, value: company_id" data-option-label="(--- រើស អាជ្ញាប័ណ្ណ ---)"></select>	
		<input data-role="numerictextbox" data-format=">= # ថ្ងៃ" data-min="1" data-bind="value: over_due_day" placeHolder="ចំនួនថ្ងៃផុតកំណត់">
		<button type="button" class="btn btn-default" data-bind="click: search"><i class="icon-eye-open"></i></button>				
	</div>

	<div align="center">
		<h3>តារាងផ្ដាច់ចរន្ត</h3>
		ចំនួនថ្ងៃផុតកំណត់លើសចាប់ពី  
		<span data-bind="text: over_due_day"></span> ថ្ងៃ
	</div>
	
	<div data-role="grid" data-bind="source: disconnectList"
        data-auto-bind="false" data-row-template="disconnectListRowTemplate"
        data-pageable="true"                  
        data-columns='[        				            
            { title: "លេខកូដ" },
            { title: "ឈ្មោះ" },
            { title: "#វិក្កយបត្រ", width: 110 },								            	                     
            { title: "ថ្ងៃចេញវិក្កយបត្រ" },
            { title: "ថ្ងៃផុតកំណត់" },
            { title: "ចំនួនថ្ងលើស" },
            { title: "ទឹកប្រាក់" },
            { title: "ប្រាក់បង់រូច" },
            { title: "សមតុល្យ" }			                              	                    
        ]'>
	</div>	
</script>
<script id="disconnectListRowTemplate" type="text/x-kendo-tmpl">		
	<tr>		
		<td>#:people.number#</td>
		<td>#:people.surname# #:people.name#</td>
		<td>#:number#</td>				
		<td>#:kendo.toString(new Date(issued_date), 'dd-MM-yyyy')#</td>
		<td>#:kendo.toString(new Date(due_date), 'dd-MM-yyyy')#</td>
		<td align="right">#:over_due_day# ថ្ងៃ</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(total_amount), 'c0')#</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(total_paid), 'c0')#</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(total), 'c0')#</td>							
    </tr>   
</script>

<script id="eInvoicePreview" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<div class="hidden-print">								
					<select id="company" name="company" data-role="dropdownlist" 
							data-text-field="abbr" data-value-field="id" 
				            data-bind="source: companyList, value: company_id" data-option-label="(--- រើស អាជ្ញាប័ណ្ណ ---)"></select>
				    <select id="transformer" name="transformer" data-role="dropdownlist" 
				    		data-text-field="transformer_number" data-value-field="id"
	          				data-cascade-from="company" data-bind="source: transformerList, value: transformer_id" 
	          				data-auto-bind="false" data-option-label="(--- រើស ត្រង់ស្វូ ---)"></select>	
					<input id="mof" name="mof" data-role="datepicker" 
							data-bind="value: month_of" data-start="year" data-depth="year" 
							data-format="MM-yyyy" placeHolder="ប្រចាំខែ" />
					<input type="text" data-bind="value: invoice_no" style="width:100px" placeholder="លេខវិក្កយបត្រ">
					<button type="button" class="btn btn-default" data-bind="click: search"><i class="icon-search"></i></button>
					<button type="button" class="btn btn-default" data-bind="click: printInvoice"><i class="icon-print"></i></button>				
					<input id="chkVisible" type="checkbox" data-bind="events: {click: print}" /> ប្រើក្រដាសពុម្ព																			
				</div>
				
				<div data-role="listview" data-bind="source: invoiceList" 
					data-template="eInvoicePreviewTemplate" data-auto-bind="false"></div>
	
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->	
</script>
<script id="eInvoicePreviewTemplate" type="text/x-kendo-tmpl">	
  	<div class="print">
  		<table width="100%">
	    	<tr>
	    		<td valign="top" align="left" width="250">
	    			<img src="/banhji/#:companys.image_url#" height="200" width="300" >
	    		</td>
	    		<td style="float:left;">
	    			<div class="center">
		    			<h4>#:companys.name#</h4>
						<p>
							#:companys.address# <br>
							#:companys.phone# /
							#:companys.mobile#							
						</p>
					</div>
	    		</td>
	    	</tr>
	    </table>							
	
		<table width="100%" class="table table-condensed" style="margin-top: 15px">
			<tr>
				<td valign="top" rowspan="6">
					<span class="#:number#"></span>
					#:customers.number# #:customers.surname# #:customers.name# <br>
					#:address#
				</td>
				<td class="hiddenPrint">លេខវិក្កយបត្រ INVOICE NO</td>
				<td>#:number#</td>							
			</tr>
			<tr>
				<td class="hiddenPrint">វិក្កយបត្រ INVOICE DATE</td>
				<td>#:kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>											
			</tr>
			<tr>
				<td class="hiddenPrint" width="150px">តំបន់ AREA</td>
				<td width="150px">#:transformers.transformer_number#</td>							
			</tr>
			<tr>
				<td class="hiddenPrint" width="150px">លេខប្រអប់ BOX NO</td>
				<td width="150px">#:box_no#</td>				
			</tr>
			<tr>
				<td class="hiddenPrint">គិតចាប់ពីថ្ងៃទី FROM</td>
				<td>#:kendo.toString(new Date(date_read_from), "dd-MM-yyyy")#</td>							
			</tr>
			<tr>
				<td class="hiddenPrint">ដល់ថ្ងៃទី TO</td>
				<td>#:kendo.toString(new Date(date_read_to), "dd-MM-yyyy")#</td>
			</tr>
		</table>															
	
		<table class="hiddenPrint" border="1" width="100%">
			<tr>
				<td align="center" width="100">លេខកុងទ័រ <br> METER</td>
				<td align="center" width="80">អំនានចាស់ <br> PREVIOUS</td>
				<td align="center" width="80">អំនានថ្មី <br> CURRENT</td>
				<td align="center" width="70">មេគុណ <br> <span style="font-size:x-small">MULTIPLICATION</span></td>
				<td align="center" width="100">ប្រើប្រាស់ <br> CONSUMPTION</td>
				<td align="center" width="80">តំលៃឯកត្តា <br> RATE</td>
				<td align="center" width="100">តំលៃសរុប <br> AMOUNT</td>	
			</tr>
		</table>
							
		<table align="right">
			<tr>
				<td>ប្រាក់ជំពាក់ខែមុន</td>
				<td width="150px" align="right">#:kendo.toString(kendo.parseFloat(tdebt)/kendo.parseFloat(rate), 'c', sub_code)#</td>
			</tr>
			<tr>
				<td>ប្រាក់សងខែមុន</td>
				<td align="right">#:kendo.toString(kendo.parseFloat(tpayment)/kendo.parseFloat(rate), 'c', sub_code)#</td>
			</tr>
			<tr>
				<td>ប្រាក់នៅជំពាក់</td>
				<td align="right">#:kendo.toString(kendo.parseFloat(tremain)/kendo.parseFloat(rate), 'c', sub_code)#</td>
			</tr>
		</table>
		
		<div style="height:350px">
			<table width="100%">
				#for(var i=0; i < invoice_items.length; i++) {#
					<tr>
						<td width="100">#:invoice_items[i].meter_no#</td>
						<td align="right" width="80">#:invoice_items[i].prev_reading#</td>
						<td align="right" width="80">#:invoice_items[i].new_reading#</td>
						<td align="center" width="70">#:invoice_items[i].multiplier#</td>
						<td align="right" width="100">#:kendo.toString(kendo.parseInt(invoice_items[i].quantity), 'n0')#</td>
						<td align="right" width="80">#:kendo.toString(kendo.parseFloat(invoice_items[i].unit_price)/kendo.parseFloat(rate), 'c', sub_code)#</td>
						<td align="right" width="100">#:kendo.toString(kendo.parseFloat(invoice_items[i].amount)/kendo.parseFloat(rate), 'c', sub_code)#</td>
					</tr>
				# } #
			</table>

			<p>#:memo#</p>
		</div>		

        <table class="hiddenPrint" width="100%" border="1" cellpadding="5" cellspacing="5">
        	<tr>
        		<td rowspan="5" style="font-size:smaller">
        			#=companys.term_of_condition#
        		</td>
        		<td width="200">
        			<div style="float:left;text-align:left;">បំណុលសរុបខែនេះ</div>
  					<div style="float:right;text-align:right;">TOTAL BALANCE</div>
        		</td>
        		<td width="110" align="right" style="visibility:visible;">#:kendo.toString(kendo.parseFloat(total)/kendo.parseFloat(rate), 'c', sub_code)#</td>
        	</tr>
        	<tr>
        		<td>
        			<div style="float:left;text-align:left;">ទឹកប្រាក់ត្រូវបង់</div>
  					<div style="float:right;text-align:right;">TOTAL DUE</div>
        		</td>
        		<td align="right" style="visibility:visible;">#:kendo.toString(kendo.parseFloat(tdue)/kendo.parseFloat(rate), 'c', sub_code)#</td>        		
        	</tr>
        	<tr>
        		<td>
        			<div style="float:left;text-align:left;">ថ្ងៃផុតកំណត់បង់ប្រាក់</div>
  					<div style="float:right;text-align:right;">DUE DATE</div>
        		</td>
        		<td align="right" style="visibility:visible;">#:kendo.toString(new Date(due_date), 'dd-MM-yyyy')#</td>        		
        	</tr>
        	<tr>
        		<td>
        			<div style="float:left;text-align:left;">ថ្ងៃបង់ប្រាក់</div>
  					<div style="float:right;text-align:right;">PAY DATE</div>
        		</td>
        		<td></td>        		
        	</tr>
        	<tr>
        		<td>
        			<div style="float:left;text-align:left;">ចំនួនទឹកប្រាក់បានបង់</div>
  					<div style="float:right;text-align:right;">PAY AMOUNT</div>
        		</td>
        		<td></td>        		
        	</tr>
        </table>			

		<div class="hiddenPrint" style="border-top: 1px dashed black; margin: 7px 5px 5px 5px;"></div>

		<table class="hiddenPrint" width="100%" border="1" cellpadding="5" cellspacing="5">
			<tr>							
				<td rowspan="4">
					<table width="100%">
						<tr>
							<td></td>
							<td style="visibility:visible;">
								<span class="#:number#"></span>
							</td>							
						</tr>
						<tr valign="top" style="visibility:visible;">
							<td>វិក្កយបត្រ</td>
							<td>#:number#</td>
						</tr>
						<tr valign="top" style="visibility:visible;">
							<td>អតិថិជន</td>
							<td>#:customers.number# #:customers.surname# #:customers.name#</td>
						</tr>
						<tr valign="top" style="visibility:visible;">
							<td>អាសយដ្ឋាន</td>
							<td>#:address#</td>
						</tr>
						<tr valign="top" style="visibility:visible;">
							<td>ទីតាំងចរន្ត</td>
							<td>#:transformers.transformer_number#, #:box_no#</td>
						</tr>
					</table>
				</td>				
				<td width="200">
					<div style="float:left;text-align:left;">ទឹកប្រាក់ត្រូវបង់</div>
  					<div style="float:right;text-align:right;">TOTAL DUE</div>
				</td>
				<td width="110" align="right" style="visibility:visible;">#:kendo.toString(kendo.parseFloat(tdue)/kendo.parseFloat(rate), 'c', sub_code)#</td>
			</tr>
			<tr>			    
				<td>
					<div style="float:left;text-align:left;">ថ្ងៃផុតកំណត់បង់ប្រាក់</div>
  					<div style="float:right;text-align:right;">DUE DATE</div>
				</td>
				<td align="right" style="visibility:visible;">#:kendo.toString(new Date(due_date), 'dd-MM-yyyy')#</td>
			</tr>
			<tr>			    
				<td>
					<div style="float:left;text-align:left;">ថ្ងៃបង់ប្រាក់</div>
  					<div style="float:right;text-align:right;">PAY DATE</div>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<div style="float:left;text-align:left;">អ្នកទទួលប្រាក់</div>
  					<div style="float:right;text-align:right;">CASHIER</div>
				</td>
				<td></td>
			</tr>
		</table>
	</div>
</script>

<!-- New company -->
<script id="newCompany" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<h1>ចុះឈ្មោះជាមួយ BANHJI <span>ដោយឥតគិតថ្លៃ</span></h1>

				<br>

				<div class="row-fluid">
					<div class="span4">
						<table>
							<tr>
								<td>ប្រភេទក្រុមហ៊ុន</td>
								<td>
									<select id="companyType" name="companyType" data-role="dropdownlist" 
										data-text-field="name" data-value-field="id" 
		              					data-bind="source: companyTypeList, value: company_type_id"
		              					data-option-label="(--- ជ្រើសរើស ---)"	              					
		              					required data-required-msg="ត្រូវការ ប្រភេទក្រុមហ៊ុន"></select>
								</td>
							</tr>
							<tr>
								<td>ឈ្មោះក្រុមហ៊ុន</td>
								<td>
									<input id="name" name="name" class="k-textbox" data-bind="value: name" required data-required-msg="ត្រូវការ ឈ្មោះក្រុមហ៊ុន" />
								</td>
							</tr>
							<tr>
								<td>ឈ្មោះជាទំរង់ខ្លី</td>
								<td>
									<input id="abbr" name="abbr" class="k-textbox" data-bind="value: abbr" required data-required-msg="ត្រូវការ ឈ្មោះជាទំរង់ខ្លី" />						
								</td>						
							</tr>
							<tr>
								<td>ឆ្នាំបង្កើត</td>
								<td>
									<input id="year_founded" name="year_founded" data-role="numerictextbox" data-format="#" data-bind="value: year_founded" required data-required-msg="ត្រូវការ ឆ្នាំបង្កើត" />						
								</td>						
							</tr>
							<tr>
								<td>លេខអាជ្ញាប័ណ្ណ</td>
								<td>
									<input id="operation_license" name="operation_license" class="k-textbox" data-bind="value: operation_license" required data-required-msg="ត្រូវការ លេខអាជ្ញាប័ណ្ណ" />	
								</td>						
							</tr>
							<tr>
								<td>លេខទូរស័ព្ទដៃ</td>
								<td>
									<input id="mobile" name="mobile" class="k-textbox" data-bind="value: mobile" required data-required-msg="ត្រូវការ លេខទូរស័ព្ទដៃ" />
								</td>						
							</tr>
							<tr>
								<td>លេខទូរស័ព្ទតុ</td>
								<td>
									<input id="phone" name="phone" class="k-textbox" data-bind="value: phone" required data-required-msg="ត្រូវការ លេខទូរស័ព្ទតុ" />
								</td>						
							</tr>
							<tr>
								<td>អីុមែល</td>
								<td>
									<input id="email" name="email" class="k-textbox" data-bind="value: email" required data-required-msg="ត្រូវការ អីុមែល" />
								</td>						
							</tr>
							<tr>
								<td valign="top">អាសយដ្ឋាន</td>
								<td>
									<input id="address" name="address" class="k-textbox" data-bind="value: address" 
											required data-required-msg="ត្រូវការ អាសយដ្ឋាន"></input>
								</td>						
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
							</tr>
							<tr>
								<td>រូបិយ​ប័ណ្ណ</td>
								<td>
									<input id="currencyCBB" name="currencyCBB" 
											data-bind="value: based_currency" 
					            			required data-required-msg="ត្រូវការ រូបិយ​ប័ណ្ណ"/>
								</td>
							</tr>
							<tr>
								<td>VAT NO.</td>
								<td>
									<input id="vatNo" name="vatNo" class="k-textbox" data-bind="value: vat_no" />
								</td>						
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
								<td>Logo</td>
								<td>
									<input name="userfile" id="userfile" type="file" />
									ទំហំតូចជាង 1MB | 1024*768 pixels
								</td>
							</tr>
						</table>
					</div>
					<div class="span8">						
						<div class="row-fluid">
							<div class="widget widget-heading-simple widget-body-white">
							    <div class="widget-body">
							        <div class="innerL">
							            <div class="separator bottom"></div>
							            <div class="glyphicons glyphicon-large group">
						                	<i></i>
						                	<h4>Multi-Company</h4>
							                <p>AAAAA</p>
							            </div>
							        </div>
							    </div>
							</div>
							<div class="widget widget-heading-simple widget-body-white">
							    <div class="widget-body">
							        <div class="innerL">
							            <div class="separator bottom"></div>
							            <div class="glyphicons glyphicon-large phone">
						                	<i></i>
						                	<h4>No Installation</h4>
							                <p>BBBBB</p>
							            </div>
							        </div>
							    </div>
							</div>
							<div class="widget widget-heading-simple widget-body-white">
							    <div class="widget-body">
							        <div class="innerL">
							            <div class="separator bottom"></div>
							            <div class="glyphicons glyphicon-large display">
						                	<i></i>
						                	<h4>Free</h4>
							                <p>BBBBB</p>
							            </div>
							        </div>
							    </div>
							</div>
						</div>						
					</div>
				</div>
				
				<br>
				
				<h5 class="heading glyphicons warning_sign" style="background-color: Orange;color: Black;">
						<i></i>សូមចុចប៊ូតុងខាងក្រោម, ដើម្បីយល់ព្រមជាមួយនឹងលក្ខខណ្ឌរបស់ក្រុមហ៊ុនយើងខ្ញុំ។</h5>

				<br><br>
					           
				<div id="status"></div>
				
				<span id="save" class="btn btn-icon-stacked btn-block btn-success glyphicons lock" style="width:260px">
						<i></i><span>ចុះឈ្មោះជាមួយ BANHJI ដែលមាន</span><span class="strong">ប្រព័ន្ធសុវត្ថិភាពលំដាប់ពិភពលោក</span></span>
				
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->	
</script>
<script id="users" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<h3>អ្នកប្រើប្រាស់</h3>

				<div id="grid" class="span6"></div>

				<div class="row-fluid">
					<div class="span2">
						
					</div>
					<div class="span2 offset8" align="right">
						<a href="#currency_rates" class="btn btn-reverse btn-large btn-icon glyphicons right_arrow"><i></i> បន្តទៅមុខ</a>
					</div>						
				</div>
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->
</script>
<script id="currencyRates" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<h3>អត្រាប្ដូរប្រាក់</h3>

				<div id="grid" class="span6"></div>

				<div class="row-fluid">
					<div class="span2">
						<a href="#users" class="btn btn-reverse btn-large btn-icon glyphicons left_arrow"><i></i> ត្រលប់ក្រោយវិញ</a>
					</div>
					<div class="span2 offset8" align="right">
						<a href="#customer_types" class="btn btn-reverse btn-large btn-icon glyphicons right_arrow"><i></i> បន្តទៅមុខ</a>
					</div>						
				</div>
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->
</script>
<script id="customerTypes" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<h3>ប្រភេទអតិថិជន</h3>

				<div id="grid" class="span6"></div>

				<div class="row-fluid">
					<div class="span2">
						<a href="#currency_rates" class="btn btn-reverse btn-large btn-icon glyphicons left_arrow"><i></i> ត្រលប់ក្រោយវិញ</a>
					</div>
					<div class="span2 offset8" align="right">
						<a href="#classes" class="btn btn-reverse btn-large btn-icon glyphicons right_arrow"><i></i> បន្តទៅមុខ</a>
					</div>						
				</div>
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->
</script>
<script id="classes" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<h3>Class</h3>

				<div id="grid" class="span6"></div>

				<div class="row-fluid">
					<div class="span2">
						<a href="#customer_type" class="btn btn-reverse btn-large btn-icon glyphicons left_arrow"><i></i> ត្រលប់ក្រោយវិញ</a>
					</div>
					<div class="span2 offset8" align="right">
						<a href="#use_electricity" class="btn btn-reverse btn-large btn-icon glyphicons right_arrow"><i></i> បន្តទៅមុខ</a>
					</div>						
				</div>
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->
</script>

<!-- Electricity setting -->
<script id="useElectricity" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<div class="row-fluid">			
					<div class="span6 offset3 well">
						<div align="center">
							<h1>ប្រើប្រាស់សេវាកម្មចែកចាយអគ្គីសនី?</h1>
							<br><br>
							<p>
								Description
							</p>
							<br><br>
							<a href="#eSetting" class="btn btn-primary btn-large btn-icon glyphicons ok_2"><i></i> ប្រើប្រាស់</a>	
							<a href="#finish_register" class="btn btn-danger btn-large btn-icon glyphicons remove_2"><i></i> គិតមើលសិន</a>										
						</div>										
					</div>
				</div>
				<div class="row-fluid">
					<div class="span2">
						<a href="#classes" class="btn btn-reverse btn-large btn-icon glyphicons left_arrow"><i></i> ត្រលប់ក្រោយវិញ</a>
					</div>
					<div class="span2 offset8" align="right">
						<a href="#finish_register" class="btn btn-reverse btn-large btn-icon glyphicons right_arrow"><i></i> បន្តទៅមុខ</a>
					</div>						
				</div>
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->	
</script>
<script id="eSetting" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<div class="row-fluid">
					<h3>កំណត់ផ្នែកអគ្គីសនី</h3>

					<a href="#amperes" class="heading pull-left"><i class="icon-bar-chart icon-fixed-width text-primary"></i> អាំងតង់សុីតេ</a>
					<br>
					<a href="#voltages" class="heading pull-left"><i class="icon-bar-chart icon-fixed-width text-primary"></i> តុងស្យុង</a>
				</div>

				<div class="row-fluid">
					<div class="span2">
						<a href="#use_electricity" class="btn btn-reverse btn-large btn-icon glyphicons left_arrow"><i></i> ត្រលប់ក្រោយវិញ</a>
					</div>
					<div class="span2 offset8" align="right">
						<a href="#amperes" class="btn btn-reverse btn-large btn-icon glyphicons right_arrow"><i></i> បន្តទៅមុខ</a>
					</div>						
				</div>
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->	
</script>
<script id="amperes" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<h3>អាំងតង់សុីតេ</h3>

				<div id="grid" class="span6"></div>				
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->
</script>
<script id="voltages" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<h3>តុងស្យុង</h3>

				<div id="grid" class="span6"></div>				
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->
</script>
<script id="electricityBoxes" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<h3>ប្រអប់កុងទ័រ</h3>

				<div id="grid" class="span6"></div>
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->
</script>
<script id="tariffPlans" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<h3>ផែនការតំលៃលក់</h3>

				<div id="grid" class="span6"></div>				
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->
</script>
<script id="tariffs" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<h3>តំលៃលក់</h3>

				<div id="grid" class="span6"></div>				
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->
</script>
<script id="exemptions" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<h3>លើកលែង</h3>

				<div id="grid" class="span6"></div>
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->
</script>
<script id="maintenances" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<h3>ថ្លៃថែទាំ</h3>

				<div id="grid" class="span6"></div>				
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->
</script>

<script id="finishRegister" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">			
				<div class="span8 offset2 well">
					<div align="center">
						<h1>ការចុះឈ្មោះជាមួយ BANHJI បានជោគជ័យហើយ...!</h1>
						
						<br>

						<div class="glyphicons glyphicon-xlarge glyphicon-top ok glyphicon-primary">
							<i></i>
						</div>

						<p>
							អបអសាទរ ចំពោះការជ្រើសរើសដ៏ឈ្លាសវៃរបស់លោកអ្នក។ ក្រុមហ៊ុនយើងខ្ញុំប្ដេជ្ញាថា 
							នឹងព្យាយាមឱ្យអស់ពីសមត្ថភាព​ ដើម្បីផ្ដល់សេវាកម្មដ៏ល្អហើយ 
							និងផ្ដល់ទំនុកចិត្តទៅកាន់អតិថិជន។
						</p>
						<br><br>						 
						<a href="#" class="btn btn-primary btn-large btn-icon glyphicons share"><i></i>ចូលទៅកាន់គេហទំព័រ</a>																
					</div>
				</div>
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->	
</script>
<!-- END OF DAWINE -->


<!-- Application -->
<script>
	var banhji = banhji || {};
	banhji.baseUrl = "<?php echo base_url(); ?>";

	banhji.config = {
		title: "Banhji Online Application",
		userData: {
			userId : <?php echo $this->session->userdata('user_id'); ?>,
			username: "<?php echo $this->session->userdata('username'); ?>",
			firstName: "<?php echo $this->session->userdata('userData')->first_name; ?>",
			lastName: "<?php echo $this->session->userdata('userData')->last_name; ?>",
			fullName: "<?php echo $this->session->userdata('userData')->last_name; ?>"+" <?php echo $this->session->userdata('userData')->first_name; ?>",
			allowedModules: [<?php echo $this->session->userdata('userData')->allowedModules; ?>],
			type: "paid",
			company: "<?php echo $this->session->userdata('userData')->company_id; ?>",
			language: "km-KH"
		}
	};

	kendo.culture(banhji.config.userData.language);	
</script>
<script src="<?php echo base_url(JS."libs/kendo.data.localstoragedatasource.js");?>"></script>
<script>
	//By Dararith -----------------------------------
	var PaymentTermDS = new kendo.data.DataSource({
        transport: {
	        read: banhji.baseUrl + "api/accounting_api/payment_term",
	        type: "GET",
	        dataType: "json"
        },
        schema: {
        	model: {
        		id: "id"
        	}
        }
    });
    PaymentTermDS.read();
    var transformerDS = new kendo.data.DataSource({
		transport: {
			read: {
				url: banhji.baseUrl + "api/electricities/transformers/",
				type: "GET",
				dataType: "json"
			},
			create: {
				url: banhji.baseUrl + "api/electricities/transformers/",
				type: "POST",
				dataType: "json"
			},
			update: {
				url: banhji.baseUrl + "api/electricities/transformers/",
				type: "PUT",
				dataType: "json"
			},
			destroy: {
				url: banhji.baseUrl + "api/electricities/transformers/",
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
				id: "id"
			}
		}
	});
	var transformerRecordDS = new kendo.data.DataSource({
		transport: {
			read: {
				url: banhji.baseUrl + "api/electricities/transformerRecords/",
				type: "GET",
				dataType: "json"
			},
			create: {
				url: banhji.baseUrl + "api/electricities/transformerRecords/",
				type: "POST",
				dataType: "json"
			},
			update: {
				url: banhji.baseUrl + "api/electricities/transformerRecords/",
				type: "PUT",
				dataType: "json"
			},
			destroy: {
				url: banhji.baseUrl + "api/electricities/transformerRecords/",
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
		serverFiltering: true,
		schema: {
			model: {
				id: "id"
			}
		}
	});
	banhji.account = (function(){
		var account = new kendo.data.Model.define({
			id: "id",
			fields: {
				company_id: { type: "string", nullable: false, defaultValue: banhji.config.userData.company },
				account_type_id: { type: "number" },
				code: {type: "string" },
				name: { type: "string" },
				name_en: { type: "string" },
				description: { type: "string" },
				parent_id: { type: "string" },
				created_at: { type: "date", format: 'dd-MM-yyyy' }
			}
		});
		var datasource = new kendo.data.DataSource({
		    transport: {
			    read: {
			    	url: banhji.baseUrl + "api/accounting_api/account",
				    type: "GET",
				    dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/accounting_api/account",
				    type: "POST",
				    dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/accounting_api/account",
				    type: "PUT",
				    dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/accounting_api/account",
				    type: "DELETE",
				    dataType: "json"
				},
				parameterMap: function(options, operation) {
					if(operation !== "read" && options.models) {
						return {models: kendo.stringigy(options.models)};
					}
					return options;
				}
		    },
		    serverFiltering: true,
		    filter: [
	        	{ field: "company_id", value: banhji.config.userData.company},
	        	{ field: "status", value: 1}
	        ],
	        schema: {
	        	model: account
	        }
	    });
		var viewModel = kendo.observable({
			formId: null,
			types: new kendo.data.DataSource({
				transport: {
					read: {
						url : ARNY.baseUrl + "api/account_types/account_type",
						type: "GET",
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
			}),
			datasource: datasource,
			setCurrent: function(id){
				this.set("current", this.get("datasource").get(id));
			},
			currentBalance: function(){
				var balance = 0;
				if(this.get("current")) {
					$.each(this.get("transactions"), function(i,value){
						balance += kendo.parseFloat(value.balance);
					});
					return balance;
				} else {
					return balance;
				}
			},
			code: null,
			name: null,
			type: null,
			parent_ac_id: null,
			description: null,
			transactions: [],
			validated: false,
			errorArray: [],
			errorCode: null,
			errorName: null,
			errorType: null,
			editBtn: function(e) {
				e.preventDefault();
				banhji.view.acInfo.showIn("#account-section", banhji.view.acEdit);
			},
			newBtn: function(e) {
				e.preventDefault();
				banhji.view.accounting.showIn("#application", banhji.view.acCreate);
			},
			validate 		: function() {
				if(this.errorArray.length > 0) {
					this.errorArray.splice(0, this.errorArray.length);
					this.set("errorCode", null);
					this.set("errorName", null);
					this.set("errorType", null);
				}
				if(this.get("code") === null) {
					this.errorArray.push({error: 'errorCode', message: '<i class="icon-info-sign"></i> សូមវាយលេខកូដគណនី'});
				}

				if(this.get("name") === null) {
					this.errorArray.push({error: 'errorName', message: '<i class="icon-info-sign"></i> សូមវាយឈ្មោះគណនី'});
				}

				if(this.get("type") === null) {
					this.errorArray.push({error: 'errorType', message: '<i class="icon-info-sign"></i> សូមរឿសប្រភេទគណនី'});
				}

				if(this.errorArray.length === 0) {
					return true;
				} else {
					for(var i=0; i < this.errorArray.length; i++) {
						this.set(this.errorArray[i].error, this.errorArray[i].message);
					}
					return false;
				}
			},
			add: function(){
				var validated = this.validate();
				var self = this;
				if(validated === true) {
					this.get("datasource").add({
						code: this.get("code"),
						name: this.get("name"),
						account_type_id: this.get("type"),
						description: this.get("description"),
						parent_id: this.get("parent_ac_id")
					});
					this.get("datasource").sync();
					this.get("datasource").bind('requestEnd',function(e){
						self.set("code", null);
						self.set("name", null);
						self.set("description", null);
						self.set("type", null);
						self.set("parent_ac_id", null);
					});
				}
			},
			change: function() {
				// 
			},
			update: function() {
				if(this.get("current").dirty) {
					this.get("datasource").sync();
					this.get("datasource").bind("requestEnd", function(e){
						if(e.type === "update") {
							banhji.view.acInfo.showIn("#account-section", banhji.view.accDetail);
						}
					});
				}
			},
			deleteBtn: function(){
				this.get("datasource").remove(this.get('current'));
				this.get("datasource").sync();
				this.get("datasource").bind('requestEnd', function(e){

					alert("គណនីត្រូវបានលុប។");
				});
				this.get("datasource").bind('error', function(e){
					alert("ការលុបមិនបានសំរេចទេ!");
				});
			},
			cancel: function() {
				banhji.view.acInfo.showIn("#account-section", banhji.view.accDetail);
			},
			filterByAccount: function() {
				var dfd = $.Deferred();
				var datasource = new kendo.data.DataSource({
				    transport: {
					    read: {
					    	url: banhji.baseUrl + "api/accounting_api/account_trans",
						    type: "GET",
						    dataType: "json"
						},
						parameterMap: function(options, operation) {
							if(operation !== "read" && options.models) {
								return {models: kendo.stringigy(options.models)};
							}
							return options;
						}
				    },
				    serverFiltering: true,
			        schema: {
			        	model: {
			        		id: "id"
			        	},
			        	data: "results"
			        }
			    });

			    datasource.filter(
			    	{ field: "account", value: this.get("current").id}
			    );
			    datasource.bind("requestEnd", function(e){
			    	dfd.resolve(e.response);
			    });
			    datasource.bind("error", function(e){
			    	dfd.reject(e.response);
			    });
			    return dfd.promise();
			},
			search: function() {},
			startDate		: function() {
				var date = new Date();
				var month = date.getMonth()+1;
				var year = date.getFullYear();
				return year+'-'+month+'-01';
			},
			endDate 		: function(){
				return new Date();
			},
			getACTran: function(){
				var searchField = [
					{ field: ""}
				];
			},
			addAccount: function(data) {
				// insert to model
				var model = new account(data);
				// console.log(model.uid);
				// 1. validation
				var $form = $(this.get("formId")).kendoValidator().data("kendoValidator");

				if($form.validate()) {					
					if(model.isNew || model.dirty) {
						datasource.add(model);
					}
				}
			}
		});

		return viewModel;
	}());
	
	banhji.ds = (function(){
		var vendors = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/vendors/",
					type: "GET",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/vendors/",
					type: "PUT",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/vendors/",
					type: "POST",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/vendors/",
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
			serverFiltering: true,
			filter: {field: "company_id", value: banhji.config.userData['company']},
			schema: {
				model: {
					id: "id",
					fields: {
						"id": {editable: false, type: "string", nullable: true}
					}
				},
				data: "results",
				total: "count"
			}
		});
		var classDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/accounting_api/class_dropdown",
					type: "GET",
					dataType: "json"
				}
			}		
		});
		var paymentTermDS = new kendo.data.DataSource({
	        transport: {
		        read: banhji.baseUrl + "api/accounting_api/payment_term",
		        type: "GET",
		        dataType: "json"
	        },
	        serverFiltering: true,
	        schema: {
	        	model: "id",
	        }
	    });
	    var transformerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/transformers/",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/electricities/transformers/",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/electricities/transformers/",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/electricities/transformers/",
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
					id: "id"
				}
			}
		});
		var transformerRecordDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/transformerRecords/",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/electricities/transformerRecords/",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/electricities/transformerRecords/",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/electricities/transformerRecords/",
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
			serverFiltering: true,
			schema: {
				model: {
					id: "id"
				}
			}
		});
		var accountDS = new kendo.data.DataSource({
		    transport: {
			    read: banhji.baseUrl + "api/accounting_api/account",
			    type: "GET",
			    dataType: "json"
		    },
		    filter: [
	        	{ field: "company_id", value: banhji.config.userData.company}
	        ],
	        schema: {
	        	model: {
	        		id: "id"
	        	}
	        }
	    });
		var cashAccountDS = new kendo.data.DataSource({
		    transport: {
			    read: banhji.baseUrl + "api/accounting_api/cash_account",
			    type: "GET",
			    dataType: "json"
		    }
	    });
	    var creditAccountDS = new kendo.data.DataSource({
			transport: {
				read: banhji.baseUrl + "api/accounting_api/liability_account",
				type: "GET",
				dataType: "json"
			}
	    });
		var bills = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/bills/",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/electricities/bills/",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/electricities/bills/",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/electricities/bills/",
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
			serverFiltering: true,
			filter: [
				{field: 'status', value: 0},
				{field: 'created_at', value: '2014-01-01'}
			],
			schema: {
				model: {
					id: "id",
					fields: {
						id: { editable: false }
					}
				},
				data: "bills"
			},
			error	: function(e) {
				console.log(e.status);
			}
		});
		var poDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
				  	dataType: "json"
			  	}
		  	},
		  	schema: {
			  	model: {
				  	id : "id"
			  	}		
		  	},	  		  		  	
		  	serverFiltering : true,
		  	filter:[
		  		{ field: "type", value: "PO" },
		  		{ field: "status", value: 0}
		  	]  	
		});

		var journal = new kendo.data.DataSource({
			transport: {
				create: {
					url: banhji.baseUrl + "api/accounting_api/journals/",
					type: "POST",
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
			}
		});

		return {
			vendors: vendors,
			classes: classDS,
			bills: bills,
			cashAccounts: cashAccountDS,
			creditAccounts: creditAccountDS,
			paymentTerms: PaymentTermDS,
			trasformers: transformerDS,
			accounts: accountDS,
			po: poDS,
			transformRecords: transformerRecordDS,
			journalDS: journal
		};
	}());

	banhji.classes = (function(){
		var classDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/accounting_api/class_dropdown",
					type: "GET",
					dataType: "json"
				}
			},
			schema: {
				model: {id : "id"},
				data: "results"
			}		
		});

		var viewModel = kendo.observable({
			classes: null
		});

		return { 
			viewModel: viewModel,
			ds: classDS
		};
	}());
	banhji.currency = (function(){		
		var viewModel = kendo.observable({
			currencies: [],
			ds: [{code:"KHR", name:"ខ្មែររៀល"}, {code:"USD", name:"ដុល្លាអាមេរិក"}, {code:"THB", name:"ថៃបាត"}],
			systemCurrency: "USD",
			peopleCurrency: null,
			setCurrency: function(currencyCode) {
				this.set("peopleCurrency", currencyCode);
			},
			companyCurrency: null,
			setCompanyCurrency: function(companyId) {
				var self = this;
				var company = new kendo.data.DataSource({
					transport: {
						read: {
							url: ARNY.baseUrl + "api/companies/company",
							type: "GET",
							dataType: "json"
						},
						parameterMap: function(options, operation) {
							if(operation !== "read" && options.models) {
								return { models: kendo.stringify(options.models) };
							}
							return options;
						}			
					},
					serverFiltering: true,
					filter: [
						{ field: "id", value: companyId }
					],
					schema: {
						model: {
							id: "id"
						}
					}
				});
				
				company.fetch(function(){	
					var data = this.data();
					if(data.length > 0) {
						self.set("companyCurrency", data[0].based_currency);
					}
				});
			},
			getCompanyCurrency: function(companyId) {
				var self = this;
				var company = new kendo.data.DataSource({
					transport: {
						read: {
							url: ARNY.baseUrl + "api/companies/company",
							type: "GET",
							dataType: "json"
						},
						parameterMap: function(options, operation) {
							if(operation !== "read" && options.models) {
								return { models: kendo.stringify(options.models) };
							}
							return options;
						}			
					},
					serverFiltering: true,
					filter: [
						{ field: "id", value: companyId }
					],
					schema: {
						model: {
							id: "id"
						}
					}
				});
				
				company.fetch(function(){	
					var data = this.data();
					if(data.length > 0) {
						self.set("companyCurrency", data[0].based_currency);
					}
				});
				return this.get("companyCurrency");
			},
			getCurrency: function() {
				return this.get("peopleCurrency");
			},
			getSystemCurrency: function() {
				return this.get("systemCurrency");
			},
			getCurrencyRateByCode 	: function(code){
				var rate = 0;
				$.each(this.get("currencies"), function(i,value){
					if(value.code === code) {
						rate = value.rate;
						return false;
					}
				});
				
				return kendo.parseFloat(rate);
			},
			getEX: function(from, to){
				var rate = 1;
				var foreignX = kendo.parseFloat(this.getCurrencyRateByCode(from)); 
				var localX = kendo.parseFloat(this.getCurrencyRateByCode(to));
				if(from === to) {
					rate = foreignX;
				} else if(from === 'USD') {
					rate = localX;
				} else if(to === 'USD') {
					rate = foreignX;
				} else {
		        	if(foreignX>0 && localX>0){
		        		rate = localX/foreignX;
		        	}
		        }
		        return rate;
			}
		});

		(function(){
			var currencyDB = new kendo.data.DataSource({
				transport: {
					read: {
						url: ARNY.baseUrl + "api/currency_rates/currency_rate",
						type: "GET",
						dataType: "json"
					}
				},
				serverFiltering: true,
				filter: [
					{ field: "status", value: 1 }
				]	
			});
			currencyDB.fetch(function(){
				$.each(this.data(), function(index, value){
					viewModel.get("currencies").push(value);
				});
			});
		}());

		return viewModel;
	}());

	banhji.user = (function() {
		var userModel = kendo.data.Model.define({
			id: 'id',
			fields: {
				token: {type: "string"},
				username: {type: "string"},
				company: { type: "string"}
			}
		});
		var localDS = new kendo.data.extensions.LocalStorageDataSource({
			itemBase: 'banhji-user',
			schema: {
				model: userModel
			}
		});
		var viewModel = kendo.observable({
			credentials: {},
			createUser: function(newUserData) {},
			logIn: function(username, password){},
			logOut: function(){},
			editPassword: function(oldPassword, newPassword) {},
			loggedIn: function(){
				// check if use session is created and cached locally
				var login;
				function getLoggedIn(value) {
					login = value;
				}
				localDS.fetch(function(){
					if(this.data()>0) {
						getLoggedIn(true);
					} else {
						getLoggedIn(false);
					}
				});
				return login;
			},
			getToken: function(){
				// return user id if it is cached and existed
				if(this.loggedIn()) {
					//get user id
				}
			}
		});

		return viewModel;
	}());

	banhji.transaction = (function(){
		var model = new kendo.data.Model.define({
			id: "id",
			fields: {
				company_id : { type: "string", nullable: false, editable: false }
			}
		});
		var datasource = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/accounting_api/journals/",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/accounting_api/journals/",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/accounting_api/journals/",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/accounting_api/journals/",
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
			serverFiltering: true,
			filter: [
				{ field: "company_id", value: banhji.config.userData.company },
				{ field: "archived", value: 0}
			],
			schema: {
				model: model,
				data: "results"
			}
		});
		var viewModel = kendo.observable({
			model: model,
			database: datasource,
			transaction_type: [
				{id: 0, name: "PMT", description: "Payment"},
				{id: 1, name: "RPT", description: "Recipt"},
				{id: 2, name: "Bill", description: "Bill"},
				{id: 3, name: "EBill", description: "Electricity Bill"},
				{id: 4, name: "eINV", description: "electricity invoice"},
				{id: 5, name: "INV", description: "Invoice"},
				{id: 6, name: "PO", description: "Purchase Order"},
				{id: 7, name: "SO", description: "Sales Order"},
				{id: 8, name: "GRN", description: "Goods Recipt Note"},
				{id: 9, name: "GDN", description: "Goods Delivery Note"},
				{id: 10, name: "Purchase", description: "Purchasing Goods"},
				{id: 11, name: "Expense", description: "Pay expenses"}
			],
			setCurrent: function(transaction) {
				this.set("current", transaction);
			},
			getById: function(id) {
				var self = this, dfd = $.Deferred();
				datasource.filter(
					{ field: "id", value: id}
				);
				this.get("database").bind("requestEnd", function(e){
					dfd.resolve(e.response);
				});
				this.get("database").bind("error", function(e){
					dfd.reject(e.response);
				});
				return dfd;
			},
			getAll: function() {
				// get all transaction by company
				var self = this, promise = $.Deferred();
				datasource.fetch();
				datasource.bind("requestEnd", function(e){
					promise.resolve(e.response.results);
				});
				datasource.bind("error", function(e){
					promise.reject(e.response.message);
				});

				return promise;
			},
			getBy: function(criteria) {
				var self = this, dfd = $.Deferred();
				datasource.filter(criteria);

				this.get("database").bind("requestEnd", function(e){
					dfd.resolve(e.response);
				});
				this.get("database").bind("error", function(e){
					dfd.reject(e.response);
				});
				return dfd.promise();
			},
			save: function(data){
				var self = this, promise = $.Deferred();
				self.get("database").add(data);
				self.get("database").sync();
				self.get("database").bind("requestEnd", function(e){
					promise.resolve(e.response);
				});
				self.get("database").bind("error", function(e){
					promise.reject(e.response);
				});

				return promise;
			},
			update: function(id, data){
				var self = this;
				this.getById(id)
				.then(function(res) {
					self.get('database').filter({field: "id", value: res.results[0].id});
					self.get('database').fetch(function(){
						var result = this.data();
						var model = self.get('database').get(result[0].id);
						for(key in data) {
							model.set(key, data[key]);
						}			
						self.get('database').sync();
						alert("ការកែប្រែបានសំរច។");
					});
				}, function(error){
					alert("Counld not update. Error: " + error);
				});
			},
			remove: function(id){
				var self = this;
				this.getById(id)
				.then(function(res) {
					self.get('database').filter({field: "id", value: res.results[0].id});
					self.get('database').fetch(function(){
						var data = this.data();
						var model = self.get('database').get(data[0].id);
						model.set("archived", 1);
						self.get('database').sync();
					});
				}, function(error){
					alert("Counld not delete. Error: " + error);
				});
			}
		});

		return viewModel;
	}());

	var Transaction = kendo.Class.extend({
		dataSource 	: new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/accounting_api/journals/",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/accounting_api/journals/",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/accounting_api/journals/",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/accounting_api/journals/",
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
			serverFiltering: true,
			filter: [
				{ field: "company_id", value: banhji.config.userData.company },
				{ field: "archived", value: 0}
			],
			schema: {
				model: { id: "id"},
				data: "results"
			}
		}),
		model 		: kendo.data.Model.define({
			id: "id"
		}),
		setCurrent 	: function(tranId){
			this.set('current', this.dataSource.get(tranId));
		},
		getCurrent 	: function() {
			return this.get('current');
		},
		query 		: function(query) {},
		getById 	: function(id) {
			var self = this, dfd = $.Deferred();
			this.dataSource.filter(
				{ field: "id", value: id}
			);
			this.dataSource.bind("requestEnd", function(e){
				dfd.resolve(e.response);
			});
			this.dataSource.bind("error", function(e){
				dfd.reject(e.response);
			});
			return dfd.promise();
		},
		getBy 		: function(criteria) {
			var self = this, dfd = $.Deferred();
			this.dataSource.filter(criteria);
			this.dataSource.bind("requestEnd", function(e){
				dfd.resolve(e.response);
			});
			this.dataSource.bind("error", function(e){
				dfd.reject(e.response);
			});
			return dfd.promise();
		},
		add 		: function(data) {
			this.dataSource.add(data);
		},
		cancel 		: function() {
			this.dataSource.cancelChanges();
		},
		save 		: function() {
			this.dataSource.sync();	
		}
	});
	banhji.vendor = (function(){
		// get a copy of vendors datasource
		var vendorDS = banhji.ds.vendors;
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
		var viewModel = kendo.observable({
			transactions: [],
			currency: {KHR: "km-KH", USD:"en-US", THB:"th-TH", VND: "vi-VN"},
			init: function() {
				var self = this;
				banhji.transaction.getBy([
						{ field: "status", value: 0},
						{ field: "company_id", value: banhji.config.userData.company}
				]).done(function(data){
					if(data.status === "OK") {
						self.set("transactions", data.results);
					} else {
						self.set("transactions", null);
					}		
				});
			},
			doNothing: function(e) {
				e.preventDefault();
			},
			current: {id: null},
			currencyVM: banhji.currency,
			vendorsList: banhji.ds.vendors,
			company: null,
			taxNum: null,
			address: null,
			bankNum: null,
			types: new kendo.data.DataSource({
				transport: {
					read: {
						url: banhji.baseUrl + "api/vendors/types/",
						type: "GET",
						dataType: "json"
					},
					create: {
						url: banhji.baseUrl + "api/vendors/types/",
						type: "POST",
						dataType: "json"
					},
					update: {
						url: banhji.baseUrl + "api/vendors/types/",
						type: "PUT",
						dataType: "json"
					},
					destroy: {
						url: banhji.baseUrl + "api/vendors/types/",
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
						id: "id"
					},
					data: "results"
				}
			}),
			classes: companyDS,
			type_id: null,
			class_id: null,
			firstName: null,
			lastName: null,
			email: null,
			phone: null,
			lat: null,
			long: null,
			currency_code: function(){
				if(this.get('current').id !== null) {
					return this.get('current').currency_code;
				} else {
					return "USD";
				}
			},
			isCompany: false,
			reset: function() {
				this.set("company", null);
				this.set("address", null);
				this.set("type_id", null);
				this.set("class_id", null);
				this.set("firstName", null);
				this.set("lastName", null);
				this.set("email", null);
				this.set("phone", null);
				this.set("lat", null);
				this.set("long", null);
			},
			closeX: function() {
				window.history.go(-1);
			},
			supplyElectricity: function() {
				if(this.get("current").use_electricity === "true") {
					return true;
				} else {
					return false;
				}
			},
			showCompany: function() {
				if(this.get("isCompany") === true) {
					alert("company");
				} else {
					alert("normal vendor");
				}
			},
			showSubMenu: function(){
				if(this.get("current").id !== null) {
					return true;
				} else {
					return false;
				}
			},
			setCurrent: function(id) {
				this.set("current", this.vendorsList.get(id));
			},
			addVendor: function() {
				var vendor = [];
				if(this.get("company") === null) {
					// alert about the mistake
				} else {
					if(vendor.length > 0) {
						vendor.splice(0, vendor.length);
					}
					vendor.push();
					this.vendorsList.add({
						id: null,
						company: this.get("company"),
						address: this.get("address"),
						surname: this.get("lastName"),
						name: this.get("firstName"),
						email: this.get("email"),
						phone: this.get("phone"),
						latitute: this.get("lat"),
						longtitute: this.get("long"),
						people_type_id: this.get("type_id"),
						class_id: this.get("class_id"),
						currency: this.get("currency"),
						// created_by: user,
						// upated_by: user,
						company_id: banhji.config.userData['company']
					});
					this.vendorsList.sync();
					this.vendorsList.remove(this.vendorsList.at(0));
					this.reset();
				}
			},
			updateVendor: function() {
				var vendorModel = this.vendorsList.get(this.get("current").id);

				if(vendorModel.dirty) {
					vendorModel.set("updated_at", kendo.toString(new Date(), 'yyyy-MM-dd'));
					this.vendorsList.sync();
				}
			},
			removeVendor: function(){
				var vendor = this.vendorsList.get(this.get("current").id);
				this.vendorsList.remove(vendor);
				this.vendorsList.sync();
			},
			buyItemFrom: function(){
				// purchase items from vendor
			},
			buyElectricity: function(){
				//
			},
			returnItem: function() {
				// return item back to vendor
			},
			payTo: function(e) {
				e.preventDefault();
				var that = this;
				var now  = new Date();
				var year = ""+now.getFullYear();
				var month= (now.getMonth() +1) < 10 ? "0" + (now.getMonth() +1) : (now.getMonth() +1);
				banhji.bill.viewModel.set("voucher", "pmt" + month+ "" + year.substr(2,2));
				banhji.bill.viewModel.getBillsByVendor(this.get('current').id);
			},
			payOverDueTo: function(e) {
				e.preventDefault();
				var that=this;
				banhji.bill.viewModel.getOverDueByVendor(this.get('current').id);
			},
			query: function(queryStatement){
				vendorDS.filter(queryStatement);
				vendorDS.bind('requestEnd', function(e){
					// e.response is the result from the query
					e.response.results;
				});
			},
			getPO: function(e){
				e.preventDefault();
				var poDS = [];				

				if(this.get("current").id === null) {
					if(this.get('transactions') !== null) {
						banhji.view.vendorInfo.showIn("#vendorSingleDetail", banhji.view.poTracker);
						$.each(this.get("transactions"), function(index, value){
							if(value.transaction_type==='po') {
								poDS.push(value);
							}
						});
						$("#poTrackerList").kendoGrid({
							dataSource: poDS,
							columns: [
								{ title: "កាលបរិច្ឆេទ"},
								{ title: "អ្នកផ្គត់ផ្គង់"},
								{ title: "លេខបញ្ជាទិញ"},
								{ title: "សរុប"},
								{ title: "GRN"},
								{ title: "Bill"}
							],
							rowTemplate: kendo.template($("#poTrackingList").html())
						});
					} else {
						banhji.view.vendorSingle.showIn("#vendorSingleDetail", banhji.view.blank);
						alert(":(");
					}
				} else {
					banhji.transaction.getBy([
						{ field: "status", value: 0}, 
						{ field: "transaction_type", value: "po"}, 
						{ field: "people_id", value: this.get("current").id}
					]).then(
						function(data){
							
							if(data.status === "OK") {
								banhji.view.vendorSingle.showIn("#vendorSingleDetail", banhji.view.poTracker);
								var data = data.results;
								$("#poTrackerList").kendoGrid({
									dataSource: data,
									columns: [
										{ title: "កាលបរិច្ឆេទ"},
										{ title: "អ្នកផ្គត់ផ្គង់"},
										{ title: "លេខបញ្ជាទិញ"},
										{ title: "សរុប"},
										{ title: "GRN"},
										{ title: "Bill"}
									],
									rowTemplate: kendo.template($("#poTrackingList").html())
								});
							} else {
								banhji.view.vendorSingle.showIn("#vendorSingleDetail", banhji.view.blank);
							}	
						},
						function(error){
							alert("Error");
						}
					);
				}				
			},
			poCount: function() {
				var count = 0, self = this;
				var tranx = this.get("transactions");
				if(this.get("current").id !== null) {
					if(tranx) {
						$.each(tranx, function(index, value){
							if(value.transaction_type === "po" && value.people_name.id === self.get("current").id) {
								count++;
							}
						});
					}
				} else {
					if(tranx) {
						$.each(tranx, function(index, value){
							if(value.transaction_type === "po") {
								count++;
							}
						});
					}
				}
				return count;
			},
			billCount: function() {
				var count = 0, self = this;
				var tranx = this.get("transactions");
				if(this.get("current").id !== null) {
					if(tranx) {
						$.each(tranx, function(index, value){
							if(value.transaction_type === "purchase" || value.transaction_type === "expense") {
								if(value.people_name.id === self.get("current").id) {
									count++;
								}
							}
						});
					}
				} else {
					if(tranx) {
						$.each(tranx, function(index, value){
							if(value.transaction_type === "purchase" || value.transaction_type === "expense") {
								count++;
							}
						});
					}
				}
				return count;
			},
			billOverDueCount: function() {
				var count = 0, self = this;
				var tranx = this.get("transactions");
				if(this.get("current").id !== null) {
					if(tranx) {
						$.each(tranx, function(index, value){
							if(value.transaction_type !== "po" && value.people_name.id === self.get("current").id) {
								var today = new Date();
								if(today.getTime() > new Date(value.dueDate).getTime()){
									count++;
								}
							}
						});
					}
				} else {
					if(tranx) {
						$.each(tranx, function(index, value){
							if(value.transaction_type !== "po") {
								var today = new Date();
								if(today.getTime() > new Date(value.dueDate).getTime()){
									count++;
								}
							}
						});
					}
				}
				return count;
			},
			getAmountOwed: function() {
				var amount = 0, self = this;
				var currency = '';
				var tranx = this.get("transactions");
				if(this.get("current").id !== null) {
					if(tranx) {
						$.each(tranx, function(index, value){
							if(value.transaction_type !== "po" && value.people_name.id === self.get("current").id) {
								amount += kendo.parseFloat(value.amount_due);
							}
						});
					}
					currency = banhji.vendor.currency[this.currency_code()];
				} else {
					if(tranx) {
						$.each(tranx, function(index, value){
							if(value.transaction_type !== "po") {
								amount += kendo.parseFloat(value.amount_due);
							}
						});
					}
					currency = 'USD';
				}
				return kendo.toString(amount, 'c2', currency);
				// console.log(this.get("currency")[this.get("current").currency_code]);
			},
			getMonthlyExpense: function() {
				// e.preventDefault();
				var amount = 0;
				var currency = '';
				var tranx = this.get("transactions");
				if(this.get("current").id !== null) {
					if(tranx) {
						var self = this;
						$.each(tranx, function(index, value){
							if(value.transaction_type !== "po" && value.people_name.id === self.get("current").id) {
								var today = new Date();
								var month = "0" + (today.getMonth() +1);
								var sMonth = today.getFullYear() + month + '01'; 
								var now = today.getFullYear() + month + today.getDate();
								if(new Date(value.created_at) >= sMonth && new Date(value.created_at) >= now){
									amount+= kendo.parseFloat(value.amount_billed);
								}
							}
						});
					}
					currency = banhji.vendor.currency[this.currency_code()];
				} else {
					if(tranx) {
						$.each(tranx, function(index, value){
							if(value.transaction_type !== "po") {
								var today = new Date();
								var month = "0" + (today.getMonth() +1);
								var sMonth = today.getFullYear() + month + '01'; 
								var now = today.getFullYear() + month + today.getDate();
								if(new Date(value.created_at) >= sMonth && new Date(value.created_at) >= now ){
									amount+= kendo.parseFloat(value.amount_billed);
								}
							}
						});
					}
					currency = 'USD';
				}
				return kendo.toString(amount, 'c2', currency);
			},
			showMonthlyExpense: function(e) {
				e.preventDefault();
				banhji.view.vendorSingle.showIn("#vendorSingleDetail", banhji.view.vendorHistory);
				var tranx = this.get("transactions");
				var temp = [];
				if(this.get("current").id !== null) {
					banhji.view.vendorSingle.showIn("#vendorSingleDetail", banhji.view.vendorHistory);
					if(tranx) {
						$.each(tranx, function(index, value){
							if(value.transaction_type !== "po" && value.people_name === this.get("current")) {
								var today = new Date();
								var month = "0" + (today.getMonth() +1);
								var sMonth = today.getFullYear() + month + '01'; 
								var now = today.getFullYear() + month + today.getDate();
								if(value.created_at >= sMonth && value.created_at <= now){
									temp.push(value)
								}
							}
						});
					}
				} else {
					banhji.view.vendorInfo.showIn("#vendorSingleDetail", banhji.view.vendorHistory);
					if(tranx) {
						$.each(tranx, function(index, value){
							if(value.transaction_type !== "po") {
								var today = new Date();
								var month = "0" + (today.getMonth() +1);
								var sMonth = today.getFullYear() + month + '01'; 
								var now = today.getFullYear() + month + today.getDate();
								if(value.created_at >= sMonth && value.created_at <= now){
									temp.push(value)
								}
							}
						});
					}
				}
				$("#vendorHistoryGrid").kendoGrid({
					dataSource: temp,
					filterable: true,
					pageable: {
						pageSize: 20,
						pageSizes: [20, 40, 60],
						messages: {
							empty: "មិនមានទិន្ន័យ",
							display: "{0}-{1} នៃ {2} ទិន្ន័យ",
							itemsPerPage: "ប្រត្តិបត្រ័ការក្នុងមួយទំព័រ"
						}
					},
					selectable: true,
					columns: [
						{ title: "កាលបរិច្ឆេទ", width: "100px" },
						{ title: "ប្រភេទវិក្កយប័ត្រ", width: "120px" },
						{ title: "ចំណាយជំពាក់", width: "130px" },
						{ title: "ចំនួនត្រូវទូទាត់", width: "130px" },
						{ title: "ចំនួនទូទាត់រួច", width: "130px" },
						{ title: "ទូទាត់" },
						{ title: "&nbsp;", width: "80px" }
					],
					rowTemplate: kendo.template($("#billGrid").html())
				});
			},
			dashboard: function(e){
				e.preventDefault();
				this.set("current", {id: null});
				banhji.view.vendor.showIn("#vendorDetail", banhji.view.vendorInfo);
			},
			home: function(e) {
				e.preventDefault();
				banhji.view.vendorSingle.showIn("#vendorSingleDetail", banhji.view.vendorInformation);
			},
			getBillHistory 	: function(e) {
				e.preventDefault();
				if(this.get("current").id !== null) {
					banhji.view.vendorSingle.showIn("#vendorSingleDetail", banhji.view.vendorHistory);
					var now = new Date();
					var month = now.getMonth() + 1;
					banhji.transaction.getBy([{field: "people_id", value: this.get("current").id}, {field: "created_at >=", value: now.getFullYear() + "-" + month + "-01"}])
					.then(
						function(data){
							var ds=[];
							if(data.results.length>0) {
								$.each(data.results, function(i,v){
									ds.push(v);
								});
							}
							$("#vendorHistoryGrid").kendoGrid({
								dataSource: ds,
								filterable: true,
								pageable: {
									pageSize: 20,
									pageSizes: [20, 40, 60],
									messages: {
										empty: "មិនមានទិន្ន័យ",
										display: "{0}-{1} នៃ {2} ទិន្ន័យ",
										itemsPerPage: "ប្រត្តិបត្រ័ការក្នុងមួយទំព័រ"
									}
								},
								selectable: true,
								columns: [
									{ title: "កាលបរិច្ឆេទ", width: "100px" },
									{ title: "ប្រភេទវិក្កយប័ត្រ", width: "120px" },
									{ title: "ចំណាយជំពាក់", width: "130px" },
									{ title: "ចំនួនត្រូវទូទាត់", width: "130px" },
									{ title: "ចំនួនទូទាត់រួច", width: "130px" },
									{ title: "ទូទាត់" },
									{ title: "&nbsp;", width: "80px" }
								],
								rowTemplate: kendo.template($("#billGrid").html())
							});
						},
						function(error){
							console.log(error);
						}
					);
				} else {
					banhji.view.vendorInfo.showIn("#vendorSingleDetail", banhji.view.vendorHistory);
					// banhji.view.vendorSingle.showIn("#vendorSingleDetail", banhji.view.vendorHistory);
					banhji.transaction.getBy([{field: "people_id", value: this.get('current').id}, {field: "created_at >=", value: "2014-01-01"}])
					.then(
						function(data){
							var ds = data? data: [];
							$("#vendorHistoryGrid").kendoGrid({
								dataSource: ds,
								filterable: true,
								pageable: {
									pageSize: 20,
									pageSizes: [20, 40, 60],
									messages: {
										empty: "មិនមានទិន្ន័យ",
										display: "{0}-{1} នៃ {2} ទិន្ន័យ",
										itemsPerPage: "ប្រត្តិបត្រ័ការក្នុងមួយទំព័រ"
									}
								},
								selectable: true,
								columns: [
									{ title: "កាលបរិច្ឆេទ", width: "100px" },
									{ title: "ប្រភេទវិក្កយប័ត្រ", width: "120px" },
									{ title: "ចំណាយជំពាក់", width: "130px" },
									{ title: "ចំនួនត្រូវទូទាត់", width: "130px" },
									{ title: "ចំនួនទូទាត់រួច", width: "130px" },
									{ title: "ទូទាត់" },
									{ title: "&nbsp;", width: "80px" }
								],
								rowTemplate: kendo.template($("#billGrid").html())
							});
						},
						function(error){
							console.log(error);
						}
					);
				}
			},
			getElectric: function(e) {
				e.preventDefault();
				banhji.router.navigate("#ebill", false);
			}
		});

		return viewModel;
	}());	
	
	banhji.bill = (function(){
		var billPayments = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/bill_payments/",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/electricities/bill_payments/",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/electricities/bill_payments/",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/electricities/bill_payments/",
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
			serverFiltering: true,
			schema: {
				model: {
					id: "id"
				},
				data: "results"
			}
		});
		var billModel = kendo.observable({
			openBills 		: [],
			payments 		: [],
			cashAccounts 	: banhji.ds.cashAccounts,
			cashAccount 	: null,
			classes 		: banhji.classes.ds,
			class_id 		: "",
			paymentMethod 	: [
				{ id: 1, method: "Cash"},
				{ id: 2, method: "Check"},
				{ id: 3, method: "Credit Card"}
			],
			close 		: function(e) {
				e.preventDefault();
				layout.showIn("#info", vendor);
				var uri = "/"+vendorModel.vendor.id;
				banhji.router.navigate(uri, false);
			},
			getBillsByVendor: function(vendorId) {
				var that = this;
				banhji.transaction.getBy([
					{field: "people_id", value: vendorId},
					{field: "transaction_type <>", value: "po"}, 
					{field: "status", value: 0}
				])
				.then(
					function(data){
						if(data) {
							if(that.get("openBills").length>0) {
								that.get("openBills").splice(0,that.get("openBills").length);
							}

							$.each(data.results, function(index, value){
								that.get("openBills").push(value);
							});
							banhji.view.vendorSingle.showIn("#vendorSingleDetail", banhji.view.vendorBill);
						}
					},
					function(error){
						if(that.get("openBills").length>0) {
							that.get("openBills").splice(0,that.get("openBills").length);
						}
					}
				);
			},
			getOverDueByVendor : function(vendorId) {
				var that = this;
				banhji.transaction.getBy([
					{field: "people_id", value: vendorId},
					{field: "transaction_type <>", value: "po"}, 
					{field: "status", value: 0}
				])
				.then(
					function(data){
						if(data) {
							if(that.get("openBills").length>0) {
								that.get("openBills").splice(0,that.get("openBills").length);
							}
							that.get("openBills").push()
							$.each(data.results, function(index, value){
								var today = new Date();
								if(today.getTime() > new Date(value.dueDate).getTime()){
									that.get("openBills").push(value);
								}
								
							});
							banhji.view.vendorSingle.showIn("#vendorSingleDetail", banhji.view.vendorBill);
						}
					},
					function(error){
						if(that.get("openBills").length>0) {
							that.get("openBills").splice(0,that.get("openBills").length);
						}
					}
				);
			},
			pmtMethod 		: "",
			pmtMethods 		: "cash",
			date 			: new Date(),
			payment_note	: "",
			payBtn 			: false,
			checkNo 		: "",
			ref 			: "from pay bill page.",
			voucher 		: null,
			tick 			: function(e) {
				//console.log($(e.currentTarget).is(":checked"));
				//console.log(e.data);
				var $current = $(e.currentTarget);
				var data 	= e.data;
				var found 	= false;
				if($current.is(":checked") === true) {
					if(this.payments.length > 0) {
						for(var i=0; i < this.payments.length; i++) {
							if(data.id === this.payments[i].bill_id) {
								$current.closest("tr").find(".amount").val(data.amount_due);
								this.payments[i].set("amount_paid", data.amount_due);
								found = true;
								break;
							}
						}
					} 
					if(found === false) {
						$current.closest("tr").find(".amount").val(data.amount_due);
						this.payments.push({
								bill_id: data.id,
								payment_id: null,
							 	amount_paid: data.amount_due,
							 	date: kendo.toString(this.get("date"),"yyyy-MM-dd"),
							 	payment_note: this.get("payment_note")
						});
					}	
				} else {
					$current.closest("tr").find(".amount").val("");
					if(this.payments.length > 0) {
						for(var i=0; i < this.payments.length; i++) {
							if(data.id === this.payments[i].bill_id) {
								this.payments.splice(i, 1);
								break;
							}
						}
					}
				}
			},
			onEnter 		: function(e) {
				var current = $(e.currentTarget);
				var data 	= e.data;
				var found 	= false;
				// if(e.which == 13) {
					if(current.closest("tr").find('.amount').val() > data.amount_due) {
						current.closest("tr").find('.amount').val("");
						current.closest("tr").find('.amount').focus();
					} else {
						if(this.payments.length > 0) {
							for(var i=0; i < this.payments.length; i++) {
								if(data.id === this.payments[i].bill_id) {
									this.payments[i].set("amount_paid", current.closest("tr").find('.amount').val());
									current.closest("tr").find(".checkbox").attr('checked');
									found = true;
									break;
								}
							}	
						}

						if(found === false) {
							this.payments.push({
									bill_id: data.id,
									payment_id: null,
								 	amount_paid: current.closest("tr").find('.amount').val(),
								 	date: kendo.toString(this.get("date"),"yyyy-MM-dd"),
								 	payment_note: this.get("payment_note")
							});
							current.closest("tr").find(".checkbox").attr('checked');
						}
					}
				// }	
			},
			total 			: function() {
				return this.get("payments").length;
			},
			totalAmount		: function() {
				var total = 0;
					for(var i=0; i<this.get("payments").length; i++) {
						total = parseFloat(total) + parseFloat(this.get("payments")[i].amount_paid);
					}
				return total;
			},
			empty 			: function() {
				
			},
			showDetail  : function(e) {
				if(e.type == 'dblclick') {
					alert("show detial");
				}	
			},
			pay_bill	: function() {
				var self = this;
				if(this.get("cashAccount") === null) {
					alert("សូមរើសគណនីសាច់ប្រាក់");
				} else {
					if(this.get("payments").length > 0) {	
						var journalEntries = [];
						journalEntries.push(
					 	{
					 		account_id: 30, //this logs to account payables should this be saved by the config setting
					 		dr: this.totalAmount(), 
					 		cr: 0, 
					 		memo: this.get('payment_note'), 
					 		class_id: this.get("class_id"),
					 		voucher: this.get('ref'),
					 		people_id: 4, 
					 		check_no: this.get('checkNo'),
					 		date: kendo.toString(this.get("date"), "yyyy-MM-dd"), 
					 		transaction_type: "សងបំណុល",
					 		exchange_rate: 0.00,
					 		main: 0
				 		});
						journalEntries.push({
					 		account_id: this.get("cashAccount").id, 
					 		dr: 0, 
					 		cr: this.totalAmount(), 
					 		memo: this.get('payment_note'),
					 		class_id: this.get("class_id"), 
					 		voucher: this.get('ref'),
					 		people_id: 4,
					 		check_no: this.get('checkNo'),
					 		date: kendo.toString(this.get("date"), "yyyy-MM-dd"), 
					 		transaction_type: "សងបំណុល",
					 		exchange_rate: 0.00,
					 		main: 1
						 });
						if(journalEntries.length > 0) {
						 	banhji.transaction.save({
								company_id: banhji.config.userData.company,
								vendor_id: banhji.vendor.get("current").id,
								employee_id: banhji.config.userData.userId,
								payment_id: 0,
								transaction_type: "pmt",
								payment_method: "cash",
								check_no: "",
								memo: "ទូទាត់បំណុល" + self.get("memo"),
								date: kendo.toString(self.get("date"), "yyyy-MM-dd"),
								due_date: null,
								amount_billed: self.totalAmount(),
								amount_due: 0,
								amount_paid: self.totalAmount(),
								voucher: self.get("ref"),
								number: self.get("voucher"),
								invoiceNumber: 0,
								class_id: self.get("class_id"),
								status: 1,
								reference: "",
								journalEntries: journalEntries,
								inJournal: 1							
							}).then(
								function(data){
									self.set("cashAcct", "");
									self.set("checkNo", "");
									self.set("payment_not", "");
									journalEntries.splice(0, journalEntries.length);
									for(var i=0;i<self.get("payments").length;i++) {
										self.get("payments")[i].payment_id = data.results[0].id;
									}
									billPayments.add(self.get("payments"));
									billPayments.sync();
									billPayments.bind('requestEnd', function(e){
										billModel.payments.splice(0, self.payments.length);
										for(var i = 0; i < this.data().length; i++) {
											billPayments.remove(billPayments.at(0));
										}
									});
								},
								function(error){
									console.log(error);
								}
							);	
						}
						totalPaid = 0;
					}					
				}
			},
			getPaymentById: function(id) {
				var dfd = $.Deferred();
				billPayments.filter(
					{ field: "payment_id", value: id}
				)
				billPayments.bind("requestEnd", function(e){
					dfd.resolve(e.response);
				});
				billPayments.bind("error", function(e){
					dfd.reject(e.response);
				});

				return dfd.promise();
			}
		});

		return { viewModel: billModel };
	}());

	banhji.eBill= (function(){
		$.getJSON(banhji.baseUrl + "api/electricities/transformers/", function(data) {
		 	$.each(data, function(key, val) {
		    	viewModel.transformerDS.push({	id: val.id, 
		    									transformerNumber: val.transformerNumber, 
		    									lastReading: val.lastInvoice.new_reading=== ""? 0:val.lastInvoice.new_reading, 
		    									lastTariff: val.lastInvoice.tariff
		    								});
			});	
		});
		var viewModel = kendo.observable({
			paymentTerms 	: PaymentTermDS,
			transformerDS 	: [],
			transformerHist : transformerRecordDS,
			classes 		: banhji.classes.ds,
			transformers 	: [{
				transformer_id: null, new_reading: 0, prev_reading: 0, multiplier: 1, tariff: 0, vendor_id: null
			}],
			paymentTerm 	: "",
			invoiceNumber 	: "",
			ref 			: "",
			billFrom 		: "",
			billTo 			: "",
			class_id 		: "",
			date 			: new Date(),
			closeX 			: function(e) {
				e.preventDefault();
				window.history.go(-1);
			},
			remove 			: function(e) {
				 for (var i = 0; i < this.transformers.length; i ++) {
		            var current = this.transformers[i];
		            if (current === e.data) {
		                this.transformers.splice(i, 1);
		                break;
		            }
		        }
			},
			dateDue 	: function() {
				var date;
				if(this.get("paymentTerm") !== "") {
					
					var net = parseInt(PaymentTermDS.get(this.get("paymentTerm")).net_due_in);
					var due_date = new Date(this.get("date"));
					due_date.setDate(due_date.getDate() + net);
					date = new Date(due_date);
				} else {
					date = new Date();
				}
				return date;
			},
			close 			: function(e) {
				e.preventDefault();
				layout.showIn("#info", vendor);
				var uri = "/"+vendorModel.vendor.id;
				router.navigate(uri, false);
			},
			tempValue 		: "",
			change 			: function(e) {
				for (var i = 0; i < this.transformers.length; i ++) {
		            var current = this.transformers[i];
		            if (current === e.data) {
		            	//loop through tranformerDS to find the last reading
		            	for(var i=0; i<this.get("transformerDS").length; i++) {
		            		if(this.get("transformerDS")[i].id === e.data.transformer_id) {
		            			//if(this.get("transformerDS")[i].lastReading === "undefined") {
		            				//current.set("preve_reading", 1);
		            				
		            			//} else {
		            				current.set("prev_reading", this.get("transformerDS")[i].lastReading);
		            				current.set("tariff", this.get("transformerDS")[i].lastTariff);
		            			//}
		            			break;
		            		}
		            	}
		                break;
		            }
		        }
			},
			addNew 		: function() {
				this.transformers.push({transformer_id: '', new_reading: 0, prev_reading: 0, multiplier: 1, tariff: 0, vendor_id: banhji.vendor.viewModel.get("current").id});
			},
			journalEntries 	: [],
			record 			: function(e) {
				e.preventDefault();
				var amount_due = 0;
				var amount_s =0;
				var validator = $(e.currentTarget).parent();
				var validated = validator.kendoValidator().data("kendoValidator");
				if(validated.validate()){
					if(this.get("transformers").length > 0) {
						this.journalEntries.push(
						 	{
						 		account_id: 30,
						 		dr: 0, 
						 		cr: kendo.parseFloat(this.total()),
						 		class_id: 0, 
						 		memo: "ប្រត្តិបត្រ័ការទិញអគ្គសនីពី " + kendo.toString(this.get("billFrom"), 'yyyy-MM-dd') + " ដល់ " + kendo.toString(this.get("billTo"), 'yyyy-MM-dd'),
						 		exchange_rate: 0.00,
							 	main: 0
					 		},
					 		{
						 		account_id: 52,
						 		dr: this.total(), 
						 		cr: 0, 
						 		class_id: 0,
						 		memo: "ប្រត្តិបត្រ័ការទិញអគ្គសនីពី " + kendo.toString(this.get("billFrom"), 'yyyy-MM-dd') + " ដល់ " + kendo.toString(this.get("billTo"), 'yyyy-MM-dd'),
						 		exchange_rate: 0.00,
							 	main: 0
							}
			 			);

						banhji.transaction.save({
							company_id: banhji.config.userData.company,
							vendor_id: banhji.vendor.get("current").id,
							employee_id: banhji.config.userData.userId,
							payment_id: this.get("paymentTerm"),
							transaction_type: "ebill",
							payment_method: "credit",
							check_no: 0,
							memo: "ជំពាក់អគ្គីសនី" + this.get("memo"),
							date: kendo.toString(this.get("date"), "yyyy-MM-dd"),
							due_date: kendo.toString(new Date(this.dateDue()), "yyyy-MM-dd"),
							amount_billed: parseFloat(this.total()),
							amount_due: 0,
							amount_paid: 0,
							voucher: this.get("ref"),
							number: this.get("invoiceNumber"),
							class_id: this.get("class_id"),
							status: 0,
							journalEntries: this.journalEntries,
							inJournal: 1							
						}).then(
							function(data){
								viewModel.sync(data.results[0].id);
								viewModel.journalEntries.splice(0, viewModel.journalEntries.length);;
							},
							function(error){
								console.log(error);
							}
						);				
					} else {
						alert("សូមបញ្ចូលទិន្ន័យសំរាប់តរ្ង់ស្វូ");
					}	
				} else {
				}
			},
			total 			: function(e) {
				var total = 0;
				if( this.get("transformers").length > 0) {
					for(var i=0; i < this.get("transformers").length; i++) {
						var usage = this.get("transformers")[i].new_reading - this.get("transformers")[i].prev_reading;
						var actual= usage * this.get("transformers")[i].multiplier;
						var t = actual * this.get("transformers")[i].tariff;
						total += t;
					}
				}
				this.set("cTotal", kendo.toString(total, "c2"));
				return parseFloat(total);


				//to add the reading to each tranformer
			},
			cTotal 			: function(e) {
				var total = 0;
				if( this.get("transformers").length > 0) {
					for(var i=0; i < this.get("transformers").length; i++) {
						var usage = this.get("transformers")[i].new_reading - this.get("transformers")[i].prev_reading;
						var actual= usage * this.get("transformers")[i].multiplier;
						var t = actual * this.get("transformers")[i].tariff;
						total += t;
					}
				}
				return kendo.toString(parseFloat(total), "c2");


				//to add the reading to each tranformer
			}
		});
		
		return { viewModel: viewModel};
	}());

	banhji.purchase = (function(){
		banhji.currency.setCompanyCurrency(banhji.config.userData.company);
		var itemRecordDS = new kendo.data.DataSource({
	        transport: {
		        create: {
			        url : banhji.baseUrl + "api/inventory_api/item_record",
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
			batch: false,	                            
		 	schema: {
				model: {
					id : "id"
				}		 
			}  
		});

		var viewModel = kendo.observable({
			ds 		: banhji.ds.bills,
			currency: null,
			currencyVM: banhji.currency,
			grn 	: null,
			current_id: null,
			showRecordBtn: function() {
				if(this.get("current_id") ===null) {
					return true;
				} else {
					return false;
				}
			},
			currencyChange: function(e) {
				this.set("currency", e.sender._selectedValue);
			},
			closeX 	: function () {
				//kendo.fx($("#purchase-form")).slideIn("up").play();
				window.history.go(-1);
			},
			getVendor 	: function() {
				if(this.get("vendor")==="") {
					return true;
				} else {
					return false;
				}
			},
			items 		: [],
			vatDS 		: [],
			cashAccts	: banhji.ds.cashAccounts,
			creditAccts : banhji.ds.creditAccounts,
			terms 		: banhji.ds.paymentTerms,
			classes 		: banhji.ds.classes,
			class_id 		: "",
			paymentMethod: [
				{ id: 1, method: "Cash"},
				{ id: 2, method: "Check"},
				{ id: 3, method: "Credit Card"}
			],
			pmtMethod 	: "",
			cashAcct 	: "",
			creditAcct 	: "",
			checkNo 	: "",
			paymentTerm : null,		
			vendor  	: "",
			billed 		: false,
			cart 		: [],
			journalEntries: [],
			paidCash   	: true,
			checkoutBtn	: false,
			date 		: new Date(),
			invoiceNumber : "",
			ref 	 	: "",
			memo 		: "",
			po_id 		: null,			
			poList 		: banhji.ds.po,
			vat 		: "",
			loadPO 		: function(id){
				this.get("poList").filter({
					filters: [
						{ field: "vendor_id", value: id },
						{ field: "status", value: 0 },
						{ field: "type", value: "PO" }
					]
				});
			},
			poChange	: function(e){
				var d = e.sender;
				banhji.transaction.getById(id)
				.then(function(data){
					banhji.purchase.viewModel.set("vendor", data.results[0].people_name);
					banhji.purchase.viewModel.set("po_id", data.results[0].id);
					if(data.results[0].entries) {
						for(var i=0;i<data.results[0].entries.length;i++) {
							banhji.purchase.viewModel.get("cart").push({
								bill_id: data.results[0].entries[i].bill_id, 
								item_id: data.results[0].entries[i].item_id, 
								description: data.results[0].entries[i].description, 
								quantity: data.results[0].entries[i].quantity, 
								cost: data.results[0].entries[i].cost, 
								price: data.results[0].entries[i].price, 
								amount: data.results[0].entries[i].amount, 
								account_id: 0
							});
						}
					}
				});		
			},

			due_date 	: function() {
				var date;
				if(this.get("paymentTerm") !== null) {	
					var net = parseInt(PaymentTermDS.get(this.get("paymentTerm")).net_due_in);
					var due_date = new Date(this.get("date"));
					due_date.setDate(due_date.getDate() + net);
					date = new Date(due_date);
				} else {
					date = new Date();
				}
				return date;
			},
			dateDue 	: function() {
				var date;
				if(this.get("paymentTerm") !== "") {
					
					var net = parseInt(PaymentTermDS.get(this.get("paymentTerm")).net_due_in);
					var due_date = new Date(this.get("date"));
					due_date.setDate(due_date.getDate() + net);
					date = new Date(due_date);
				} else {
					date = new Date();
				}
				return date;
			},
			cashBtn 	: function() {
				if(this.get("paidCash")) {
					this.set("paidCash", false);
				} else {
					this.set("paidCash", true);
				}
			},
			cleared: false,
			addToCart 	: function(e) {
				this.cart.push({bill_id: 0, item_id: "", description: "", quantity: 0, cost: 0, price: 0, amount: 0, account_id: 0, taxed: false});
			},
			total : function(e) {
				for(var i=0;i<this.cart.length;i++) {
					var current = this.cart[i];
					if(current === e.data) {
						var amount = this.cart[i].price * this.cart[i].quantity;
						this.cart[i].set('amount', amount);
						break;
					}
				}
			},
			cTotal  : 0,
			taxedAmount: 0,
			taxable 	: function(e) {
				
				this.set('vat', kendo.parseFloat(this.get("vatDS")[e.sender.selectedIndex].price));
		    		
		    	var amount=0;
				var cart = this.get("cart");
				if(cart.length > 0) {
					for(var i = 0; i < cart.length; i++) {
						if(cart[i].taxed === true) {
							amount += parseFloat(cart[i].amount);
						}
					}	
				}
				this.set("taxedAmount", kendo.toString(amount* this.get("vat"), '##,#.00'));
				this.journalEntries.push({
			 		account_id: this.get("vatDS")[e.sender.selectedIndex].cogs_account_id,
			 		dr: this.paidTax(), 
			 		cr: 0, 
			 		class_id: this.get("class_id"),
			 		memo: "VAT",
			 		exchange_rate: 0,
				 	main: 0 
				});
		    },
		    paidTax 	: function(e) {
		    	var amountTaxed = 0;
		    	for(var i=0;i<this.get('cart').length; i++) {
		    		if(this.get('cart')[i].taxed === true) {
		    			amountTaxed += this.get('cart')[i].amount * this.get('vat');
		    		}
		    	}
		    	this.set("taxedAmount", amountTaxed);
		    },
			subTotal 	: function() {
				var total=0;
				var cart = this.get("cart");
				if(cart.length > 0) {
					for(var i = 0; i < cart.length; i++) {
						total += parseFloat(cart[i].amount);
					}	
				}
				// this.set("cTotal", kendo.toString(total, '##,#.00','en-US'));
				return kendo.toString(total, '##,#.00','en-US');
			}, 
			grandTotal 	: function() {
				var amount = 0;
					amount = parseFloat(this.subTotal()) + parseFloat(this.get("taxedAmount"));
				return kendo.toString(amount, 'c2','en-US');
			},
			cartCount 	: function() {
				return this.cart.length;
			},
			remove		: function(e) {
		        for (var i = 0; i < this.cart.length; i ++) {
		            var current = this.cart[i];
		            if (current === e.data) {
		                this.cart.splice(i, 1);
		                var amountTaxed = 0;
		                for(var i=0;i<this.get('cart').length; i++) {
				    		if(this.get('cart')[i].taxed === true) {
				    			amountTaxed += this.get('cart')[i].amount * this.get('vat');
				    		}
				    	}
				    	this.set("taxedAmount", amountTaxed);
		                break;
		            }
		        }
		    },
			empty: function() {
		        var contents = this.get("cart");
		        contents.splice(0, contents.length);
		        this.journalEntries.splice(0, this.journalEntries.length);
		        this.set("grn", null);
		        this.set("current_id", null);
		        this.set("checkoutBtn", false);
		        this.set("currency", null);
		    },
		    clear: function() {
		        var contents = this.get("contents");
		        contents.splice(0, contents.length);
		        this.set("cleared", true);
		        this.set("checkoutBtn", true);
		    },
			checkout 		: function() {
				var uri = "/vendor/" + vendorModel.get("vendor").id + "/checkout";
				router.navigate(uri);
			},
			change 			: function(e) {
            	for(var i=0; i<this.get("items").length; i++) {
            		if(this.get("items")[i].id === e.data.item_id) {	            			
            				e.data.set("description", this.get("items")[i].purchase_description);
            				e.data.set("cost", this.get("items")[i].cost);
            				e.data.set("account_id", this.get("items")[i].general_account_id);
            				// console.log(this.item[i].general_account);
            			break;
            		}
            	}
			},
			record 			: function(e) {
				var self = this;
				var validator;
				
				if(this.get("paidCash")) {
					validator = $(e.currentTarget).parent().find("#cashPayment");
				} else {
					validator = $(e.currentTarget).parent().find("#creditPayment");
				}
				
				var validated = validator.kendoValidator().data("kendoValidator");

				if( validated.validate() ) {
					if(this.cartCount() > 0) {
						if(this.get("paidCash")) {

							this.journalEntries.push({
						 		account_id: this.get("cashAcct"), 
						 		dr: 0, 
						 		cr: kendo.parseFloat(this.grandTotal()) * kendo.parseFloat(banhji.currency.getEX(banhji.vendor.get("current").currency_code, banhji.currency.getCompanyCurrency(banhji.config.userData.company))),
						 		class_id: this.get("class_id"),
								memo: this.get('memo'),
							 	exchange_rate: banhji.currency.getEX(banhji.vendor.get("current").currency_code, banhji.currency.getCompanyCurrency(banhji.config.userData.company)),
							 	main: 1
						 	});
							for(var i=0; i < this.cart.length; i++) {
								this.journalEntries.push({
							 		account_id: this.cart[i].account_id,
							 		dr: this.cart[i].amount, 
							 		cr: 0,
							 		class_id: this.get("class_id"), 
							 		memo: this.cart[i].description,
							 		exchange_rate: banhji.currency.getEX(banhji.vendor.get("current").currency_code, banhji.currency.getCompanyCurrency(banhji.config.userData.company)),
							 		main: 0
								});
							}

							banhji.transaction.save({
								company_id: banhji.config.userData.company,
								vendor_id: banhji.vendor.get("current").id,
								employee_id: banhji.config.userData.userId,
								payment_id: this.get("paymentTerm"),
								transaction_type: "purchase",
								payment_method: "cash",
								check_no: this.get("checkNo"),
								memo: "ទិញទំនិញ" + this.get("memo"),
								date: kendo.toString(this.get("date"), "yyyy-MM-dd"),
								due_date: null,
								amount_billed: kendo.parseFloat(this.grandTotal()) * kendo.parseFloat(banhji.currency.getEX(banhji.vendor.get("current").currency_code, banhji.currency.getCompanyCurrency(banhji.config.userData.company))),
								amount_due: 0,
								amount_paid: 0,
								voucher: this.get("ref"),
								invoiceNumber: this.get("invoiceNumber"),
								class_id: this.get("class_id"),
								status: 1,
								reference: this.get("po_id"),
								journalEntries: self.get("grn") === null ? []:journalEntries,
								inJournal: 1							
							}).then(
								function(data){
									viewModel.sync(data.results[0].id);
									viewModel.empty();
								},
								function(error){
									console.log(error);
								}
							);

							//By Dawine
							// var items = this.get("cart");
							// itemRecordDS.add(items);
							// itemRecordDS.sync();

							//empty to prepare datasource for new insertion
						} else {
							this.journalEntries.push({
						 		account_id: this.get("creditAcct"), 
						 		dr: 0, 
						 		cr: kendo.parseFloat(this.grandTotal().substr(1,this.grandTotal().length - 1)),
						 		class_id: this.get("class_id"), 
						 		memo: this.get('memo'), 
						 		exchange_rate: banhji.currency.getEX(banhji.vendor.get("current").currency_code, banhji.currency.getCompanyCurrency(banhji.config.userData.company)),
							 	main: 1
						 	});
							for(var i=0; i < this.cart.length; i++) {
								this.journalEntries.push({
							 		account_id: this.cart[i].account_id,
							 		dr: this.cart[i].amount, 
							 		cr: 0, 
							 		class_id: this.get("class_id"),
							 		memo: this.cart[i].description,
							 		exchange_rate: banhji.currency.getEX(banhji.vendor.get("current").currency_code, banhji.currency.getCompanyCurrency(banhji.config.userData.company)),
							 		main: 0
								});
							}
							banhji.transaction.save({
								company_id: banhji.config.userData.company,
								vendor_id: banhji.vendor.get("current").id,
								employee_id: banhji.config.userData.userId,
								payment_id: this.get("paymentTerm"),
								transaction_type: "purchase",
								payment_method: "credit",
								check_no: this.get("checkNo"),
								memo: "ទិញទំនិញជំពាក់" + this.get("memo"),
								date: kendo.toString(this.get("date"), "yyyy-MM-dd"),
								due_date: kendo.toString(new Date(this.dateDue()), "yyyy-MM-dd"),
								amount_billed: parseFloat(this.total()),
								amount_due: 0,
								amount_paid: 0,
								voucher: this.get("ref"),
								number: this.get("invoiceNumber"),
								class_id: this.get("class_id"),
								status: 0,
								reference: this.get("po_id"),
								journalEntries: self.get("grn") === null ? []:this.journalEntries							
							}).then(
								function(data){
									if(self.get("grn") !== null) {
										viewModel.sync(data.results[0].id);
									}
									if(self.get("po_id") !== null) {
										banhji.transaction.update(self.get("po_id"), {status: 1});
									}
									viewModel.empty();
								},
								function(error){
									console.log(error);
								}
							);	
						}
						if(this.get("po_id")!== null) {
							this.updatePO();
						}		
					} else {
						alert("cart empty");
					}
				} else {
					alert("oops!");
				}

				journalEntries.splice(0, journalEntries.length);
			},
			sync 			: function(billId) {
				var rate = banhji.currency.getEX(banhji.get("currency"),banhji.currency.getCompanyCurrency(banhji.config.userData.company));
				//2. get the bill id and save to item_records table
				for(var i = 0; i < this.cartCount(); i++) {
					var cost = kendo.parseFloat(this.cart[i].cost);
					var converted = cost * kendo.parseFloat(rate);
					var amount = converted * kendo.parseInt(this.cart[i].quantity);

					this.cart[i].set("bill_id", billId);
					this.cart[i].set("cost", converted);
					this.cart[i].set("amount", amount);
				}
				itemRecordDS.add(this.cart);
				itemRecordDS.sync();
			
				//empty to prepare datasource for new insertion
				if(this.cart.length > 0) {		
					for(var i = 0; i < this.cart.length; i++) {
						itemRecordDS.remove(itemRecordDS.at(i))
					}
					this.cart.splice(0, this.cart.length);
					this.set("creditAcct", "");
					this.set("paymentTerm", "");
					this.set("pmtMethod", "");
					
				}
			}
		});

		(function(){
			var itemDS = new kendo.data.DataSource({
				transport: {
					read: {
						url: banhji.baseUrl + "api/inventory_api/items",
						type: "GET",
						dataType: "json"
					}
				},
				filter: [
					{ field: "status", value: 1 },
					{ field: "parent_id >", value: 0},
					{ field: "item_type_id", value: 1}
				],
				serverFiltering: true
			});

			var vatDS = new kendo.data.DataSource({
				transport: {
					read: {
						url: banhji.baseUrl + "api/inventory_api/items",
						type: "GET",
						dataType: "json"
					}
				},
				filter: { field: "item_type_id", value: 6 },
				serverFiltering: true
			});

			itemDS.fetch(function(){
				var data = this.data();
				if(data.length>0) {
					$.each(data, function(index,value){
						viewModel.get("items").push(value);
					});
				}
			});
			vatDS.fetch(function(){
				var data = this.data();
				if(data.length>0) {
					$.each(data, function(index,value){
						viewModel.get("vatDS").push(value);
					});
				}
			});
		}());

		return {viewModel: viewModel};
	}());
	banhji.expense = (function(){
		$.getJSON(banhji.baseUrl + "api/accounting_api/expense_account", function(data) {
		 	$.each(data, function(key, val) {
		    	viewModel.expenseAccts.push({	account_type_id 	: val.account_type_id, 
		    								id 					: val.id,
	    									code 				: val.code,
	    									name 				: val.name,
	    									description 		: val.description
		    								});
			});	
		});
		var viewModel = kendo.observable({
			cashAccts	: banhji.ds.cashAccounts,
			expenseAccts: [],
			vatDS 		: [],
			creditAccts : banhji.ds.creditAccounts,
			accounts 	: banhji.ds.accounts,
			paymentTerms : banhji.ds.paymentTerms,
			classes 	: banhji.ds.classes,
			class_id 	: "",
			invoiceNumber: "",
			paymentMethod: [
				{ id: 1, method: "Cash"},
				{ id: 2, method: "Check"},
				{ id: 3, method: "Credit Card"}
			],
			closeX 	: function () {
				kendo.fx($("#purchase-form")).slideIn("up").play();
				window.history.go(-1);
			},
			pmtMethod 	: "",
			cashAcct 	: "",
			ExpAcct 	: "",
			creditAcct 	: "",
			checkNo 	: "",
			paymentTerm : "",		 
			vendor  	: "",
			billed 		: false,
			journalEntries: [],
			expenses	: [
				{account_id: "", code: 0, account_name: 0, amount: 0, memo: "", class_id: ""}
			],
			paidCash   	: true,
			checkoutBtn	: false,
			date 		: new Date(),
			ref 		: "",
			memo 		: "",
			vat 		: "",
			taxedAmount : 0,
			dateDue 	: function() {	
				var date;	
				
				if(this.get("paymentTerm") !== "") {
					
					var net = parseInt(PaymentTermDS.get(this.get("paymentTerm")).net_due_in);
					var due_date = new Date(this.get("date"));
					due_date.setDate(due_date.getDate() + net);
					date = new Date(due_date);
				} else {
					date = new Date();
				}
				
				return date;
			},
			cashBtn 	: function() {
				if(this.get("paidCash")) {
					this.set("paidCash", false);
				} else {
					this.set("paidCash", true);
				}
			},
			cleared: false,
			addToCart 	: function(e) {
				this.expenses.push(
					{account_id: "", code: 0, account_name: 0, amount: 0, memo: "", class_id: "", taxed: false}
				);
			},
			change 	: function(e) {
				for (var i = 0; i < this.expenses.length; i ++) {
		            var current = this.expenses[i];
		            if (current === e.data) {
		            	//loop through items to find the last reading
		            	for(var i=0; i<this.get("expenseAccts").length; i++) {
		            		if(this.get("expenseAccts")[i].id === e.data.account_id) {	            			
		            				current.set("memo", this.get("expenseAccts")[i].description);
		            			break;
		            		}
		            	}
		                break;
		            }
		        }
			},
			taxable 	: function(e) {	
				this.set('vat', kendo.parseFloat(this.get("vatDS")[e.sender.selectedIndex].price));
		    	this.paidTax();
		    	this.journalEntries.push({
			 		account_id: this.get("vatDS")[e.sender.selectedIndex].cogs_account_id,
			 		dr: this.paidTax(), 
			 		cr: 0, 
			 		class_id: this.get("class_id"),
			 		memo: "VAT",
			 		exchange_rate: 0,
				 	main: 0 
				});
		    },
		    paidTax 	: function(e) {
		    	var amountTaxed = 0;
		    	for(var i=0;i<this.get("expenses").length; i++) {
		    		if(this.get("expenses")[i].taxed === true) {
		    			if(this.get("vat")!== "") {
		    				amountTaxed += this.get("expenses")[i].amount * this.get("vat");
		    			}
		    		}
		    	}
		    	return amountTaxed;
		    },
			total 	: function() {
				var total=0;
				var expenses = this.get("expenses");
				if(expenses.length > 0) {
					for(var i = 0; i < expenses.length; i++) {
						total += parseFloat(expenses[i].get("amount"));
					}	
				}
				
				return total;
			},
			grandTotal 	: function() { 
				var grandTotal = this.total() + this.paidTax();
				return kendo.toString(grandTotal, 'c2'); 
			},
			cartCount 	: function() {
				return this.get("expenses").length;
			},
			remove		: function(e) {
				for (var i = 0; i < this.expenses.length; i ++) {
		            var current = this.expenses[i];
		            if (current === e.data) {
		                this.expenses.splice(i, 1);
		                break;
		            }
		        }	        
		    },
			empty: function() {
		        var contents = this.get("expenses");
		        contents.splice(0, contents.length);
		        this.journalEntries.splice(0,this.journalEntries.length);
		        this.set("checkoutBtn", false);
		    },
		    clear: function() {
		        var contents = this.get("expenses");
		        contents.splice(0, contents.length);
		        this.set("cleared", true);
		        this.set("checkoutBtn", true);
		    },
			record 			: function() {
				var amount_due = 0;
				var amount_s =0;
				if(this.cartCount() > 0) {
					if(this.get("paidCash")) {
						this.journalEntries.push(
						 	{
						 		account_id: this.get("cashAcct"),
						 		dr: 0, 
						 		cr: this.total(),
						 		class_id: this.get("class_id"), 
					 			memo: this.get('memo'), 
					 			exchange_rate: 4000,
							 	main: 1 
					 		});

						for(var i = 0; i<this.cartCount(); i++) {
							this.journalEntries.push({
						 		account_id: this.expenses[i].account_id,
						 		dr: this.expenses[i].amount, 
						 		cr: 0, 
						 		class_id: this.get("class_id"),
						 		memo: this.expenses[i].memo,
						 		exchange_rate: 4000,
							 	main: 0 
							});
						}

						banhji.transaction.save({
							company_id: banhji.config.userData.company,
							vendor_id: banhji.vendor.get("current").id,
							employee_id: banhji.config.userData.userId,
							payment_id: this.get("paymentTerm"),
							transaction_type: "expense",
							payment_method: "cash",
							check_no: this.get("checkNo"),
							memo: "ចំណាយជាសាច់ប្រាក់" + this.get("memo"),
							date: kendo.toString(this.get("date"), "yyyy-MM-dd"),
							due_date: kendo.toString(this.dateDue, "yyyy-MM-dd"),
							amount_billed: parseFloat(this.total()),
							amount_due: parseFloat(this.total()),
							amount_paid: 0,
							voucher: this.get("ref"),
							number: this.get("invoiceNumber"),
							class_id: this.get("class_id"),
							status: 1,
							journalEntries: this.journalEntries,
							inJournal: 1						
						}).then(
							function(data){
								viewModel.empty();
								viewModel.set("account_id", "");
								viewModel.set("pmtMethod", "");
								viewModel.set("class_id", "");
								viewModel.set("checkNo", "");
								viewModel.set("ref", "");
								viewModel.set("memo", "");
							},
							function(error){
								console.log(error);
							}
						);
					} else {
						this.journalEntries.push(
						 	{
						 		account_id: this.get("creditAcct"), 
						 		payment_id: this.get("paymentTerm"),
						 		dr: 0, 
						 		cr: this.total(), 
						 		memo: this.get('memo'), 
						 		class_id: this.get("class_id"),
						 		exchange_rate: 4000,
							 	main: 1 
					 		});
						for(var i = 0; i<this.cartCount(); i++) {
							this.journalEntries.push({
						 		account_id: this.expenses[i].account_id,
						 		dr: this.expenses[i].amount, 
						 		cr: 0, 
						 		memo: this.expenses[i].memo,
						 		class_id: this.expenses[i].class_id,
						 		exchange_rate: 4000,
							 	main: 0
							});
						}

						banhji.transaction.save({
							company_id: banhji.config.userData.company,
							vendor_id: banhji.vendor.get("current").id,
							employee_id: banhji.config.userData.userId,
							payment_id: this.get("paymentTerm"),
							transaction_type: "expense",
							payment_method: "cash",
							check_no: this.get("checkNo"),
							memo: "ចំណាយជំពាក់" + this.get("memo"),
							date: kendo.toString(this.get("date"), "yyyy-MM-dd"),
							due_date: kendo.toString(this.dateDue, "yyyy-MM-dd"),
							amount_billed: parseFloat(this.total()),
							amount_due: parseFloat(this.total()),
							amount_paid: 0,
							voucher: this.get("ref"),
							number: this.get("invoiceNumber"),
							class_id: this.get("class_id"),
							status: 0,
							journalEntries: this.journalEntries							
						}).then(
							function(data){
								viewModel.empty();
								viewModel.set("account_id", "");
								viewModel.set("pmtMethod", "");
								viewModel.set("class_id", "");
								viewModel.set("checkNo", "");
								viewModel.set("ref", "");
								viewModel.set("memo", "");
							},
							function(error){
								console.log(error);
							}
						);
					}		
				} else {
					alert("cart empty");
				}
			}
		});

		(function(){
			var vatDS = new kendo.data.DataSource({
				transport: {
					read: {
						url: banhji.baseUrl + "api/inventory_api/items",
						type: "GET",
						dataType: "json"
					}
				},
				filter: { field: "item_type_id", value: 6 },
				serverFiltering: true
			});
			vatDS.fetch(function(){
							var data = this.data();
							if(data.length>0) {
								$.each(data, function(index,value){
									viewModel.get("vatDS").push(value);
								});
							}
						});
		}());

		return {viewModel: viewModel};
	}());

	banhji.payment = (function(){
		var dataSource = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/bill_payments/",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/electricities/bill_payments/",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/electricities/bill_payments/",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/electricities/bill_payments/",
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
			serverFiltering: true,
			schema: {
				model: {
					id: "id"
				},
				data: "results"
			}
		});

		var viewModel = kendo.observable({
			dataSource 	: dataSource,
			paymentItems: [],
			startDate 	: null,
			endDate 	: null,
			cashAccounts 	: banhji.ds.cashAccounts,
			cashAccount 	: null,
			classes 		: banhji.classes.ds,
			class_id 		: "",
			date 			: new Date(),
			payment_note	: "",
			payBtn 			: false,
			checkNo 		: "",
			ref 			: "from pay bill page.",
			voucher 		: null,
			closeX 	: function () {
				//kendo.fx($("#purchase-form")).slideIn("up").play();
				window.history.go(-1);
			},
			setDate 		: function(){
				var now = new Date();
				var month = now.getMonth() + 1;
				var year= now.getFullYear();

				if(this.get("startDate") === null) {
					this.set("startDate", year + "-" + month + "-01");
				}
				if(this.get("endDate") === null) {
					this.set("endDate", year + "-" + month + "-" + now.getDate());
				}
			},
			getById 	: function(paymentId){
				var dfd = $.Deferred();
				viewModel.get("dataSource").filter({field: "payment_id", value: paymentId});
				viewModel.get("dataSource").bind("requestEnd", function(e){
					if(typeof e.response.results !== undefined && e.response.results.length > 0) {
						dfd.resolve(e.response.results);
					}
				});
				viewModel.get("dataSource").bind("error", function(e){
					if(typeof e.response.results !== undefined) {
						dfd.reject(e.response.results);
					}
				});

				return dfd.promise();
			}
		});

		return viewModel;
	}());

	banhji.po = (function(){		
		var companyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/companies/company",
					type: "GET",
					dataType: "json"
				}			
			},
			serverFiltering: true
		});		
		
		var customerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/people_api/people/2",
					type: "GET",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "PUT",
					dataType: "json"
				}
			},		
			schema: {
				model: {
					id: "id"
				}
			},			
			serverFiltering: true
		});			

		var currencyRateDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/currency_rates/currency_rate",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "status", value: 1 },
			serverFiltering: true		
		});

		var itemDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/item_dropdown",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var vatDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/items",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "item_type_id", value: 6 },
			serverFiltering: true
		});

		var classDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/classes/class",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "type", value: "Class" },
			serverFiltering: true		
		});

		var invoiceItemDS = new kendo.data.DataSource({
		  	transport: {		  	
			  	read: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "PUT",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	destroy: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
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
				  	id : "id"
			  	}		
		  	},
		  	serverFiltering: true	  		  	
		});
		

		//ViewModel
		var viewModel = kendo.observable({								
			biller				: banhji.config.userData.userId,	
			
			address				: "",
			ship_to 			: "",		  	  
			issued_date			: new Date(),
			expected_date  		: "",		
								
			memo				: "",
			memo2 				: "",
			class_id			: "",

			vat_id				: "",			
			customer_rate_to_company_rate : 1,
			customer 			: null,						    
								
			itemList 			: [],

			invoiceItemList 	: invoiceItemDS,
			vatList 			: vatDS,								
			classList 			: classDS,
							
			pageLoad 			: function(customer_id){
				invoiceItemDS.data([]);

				this.setNumber();
				this.setExpectedDate();
				this.setItemSource();
				this.loadReferences(customer_id);				
				this.loadCustomer(customer_id);			
				this.addNewRow();
			},
			closeX 				: function () {
				kendo.fx($("#slide-form")).slideIn("up").play();				
				window.history.go(-1);
			},							
		    setItemSource 		: function(){
		    	var self = this;	    		    	
				itemDS.fetch(function(){
				  	var d = this.data();			  	
				  	$.each(d, function(index, data) {		    				    		
			    		self.itemList.push({
			    			id 		: data.id,
			    			name 	: data.item_sku +' '+ data.name	    			
			    		});
			    	});
				});				    			  	    	
		    },	    	    
		    setNumber 			: function(){
		    	var self = this;
		    	$.ajax({
					type: "GET",
					url: banhji.baseUrl + "api/invoices/last_number",			
					data: { type: "Estimate" },
					dataType: "json",
					success: function (response) {
						//var data = response.d;
						var last_no = response;		
						var no = 0;
						if(last_no.length>6){
							no = parseInt(last_no.substr(6));			
						}
						no++;

						var str_inv_no = "QO" + kendo.toString(new Date(self.get("issued_date")), "yy") + kendo.toString(new Date(self.get("issued_date")), "MM");
						var number = str_inv_no + kendo.toString(no, "00000");

						self.set("number", number);
					}
				});		    	
		    },
		    setRate 			: function(){
				var rate = 1;
				var companyCode = this.get("company_code");
				var customerCode = this.get("customer").currency_code;
				
		        if(companyCode!==customerCode){
		        	var companyCodeRate = this.getCurrencyRateByCode(companyCode);
		        	var customerCodeRate = this.getCurrencyRateByCode(customerCode);

		        	if(companyCodeRate>0 && customerCodeRate>0){
		        		rate = companyCodeRate/customerCodeRate;
		        	}	
		        }

		        this.set("rate", rate);
			},					    
			loadReferences 		: function(customer_id){
				currencyRateDS.fetch();				
			},
		    loadCustomer 		: function(id){
		    	var self = this;
				
		    	customerDS.filter({ field: "id", value: id });
		    	customerDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;

					if(type==="read"){
					  	var d = response[0];					  	
					  	self.set("customer", d);		  	
					  	self.set("address", d.address);
					  	self.set("sub_code", d.currencies.sub_code);
					  	self.set("company_code", d.companies.based_currency);
					  	self.setRate();

					  	if(invoiceItemDS.data().length<1){
					  		self.addNewRow();
					  	}
				  	}			  	  			  	
				});															    			  	    	
		    },
		    setExpectedDate		: function(){
				var exdate = new Date();
				exdate.setDate(exdate.getDate()+7);
				this.set("expected_date", exdate);
			},			
		    loadInvoice			: function(id){			  	
			  	var self = this;			  					
			  	this.setItemSource();

			  	invoiceDS.filter({ field: "id", value: id });
			  	invoiceItemDS.filter({ field: "invoice_id", value: id });
			 			  	
			  	invoiceDS.bind("requestEnd", function(e){
			  		var response = e.response;
    				var type = e.type;

			  		if(type==="read"){
				  		var d = response[0];
				  		
					  	self.set("number", d.number);					  	
					  	self.set("total", kendo.toString(kendo.parseFloat(d.amount), "c"));						
						self.set("vat", kendo.toString(kendo.parseFloat(d.vat), "c"));
						self.set("vat_id", d.vat_id);
						self.set("status", d.status);						
						self.set("address", d.address);
						self.set("ship_to", d.ship_to);	  	  
						self.set("issued_date", new Date(d.issued_date));
						self.set("expected_date", new Date(d.expected_date));						
						self.set("class_id", d.class_id);			
						self.set("memo", d.memo);
						self.set("memo2", d.memo2);						

						var sub = d.amount - d.vat;
						self.set("sub_total", kendo.toString(kendo.parseFloat(sub), "c"));								  	

						//Status
						if(d.status==1){
							self.set("paid", true);
						}else{
							self.set("paid", false);
						}

						//Load customer
						customerDS.filter({ field: "id", value: d.customer_id });
						customerDS.bind("requestEnd", function(e){
					  		var response = e.response;
		    				var type = e.type;

					  		if(type==="read"){
						  		var d = response[0];
						  		self.set("customer", d);
						  	}
						});
						
						self.loadReferences(d.customer_id);
						self.autoIncreaseNo();
					}																		
			 	});				
			},			
			autoIncreaseNo 		: function(){
				$(".sno").each(function(index,element){                 
				   $(element).text(index + 1); 
				});
			},
			addNewRow 			: function(){
				invoiceItemDS.add({
					'invoice_id' 	: 0,
					'item_id' 		: "",
					'description' 	: "",				
					'quantity' 		: 1,
					'unit_price' 	: 0,								
					'amount' 		: 0,
					'rate'			: this.get("rate"),
					'sub_code'		: this.get("sub_code"),
					'vat' 			: false,
					'so_id'			: 0		
				});
				this.autoIncreaseNo();			
			},
			removeRow 			: function(e){
				var item = e.data;     
		        invoiceItemDS.remove(item);
		        this.change();
			},		
			change				: function(){
				if(invoiceItemDS.total()>0){			
					var subTotal = 0;
					var vat = 0;
					var vatAmount = 0;

					var vat_id = this.get("vat_id");			
					if(vat_id>0 || vat_id!=""){				
						var vatItem = vatDS.get(vat_id);
						vatAmount = vatItem.price;
					}

					$.each(invoiceItemDS.data(), function(index, data) {				
						var amt = data.quantity * data.unit_price;
						subTotal += amt;

						if(data.vat && vatAmount>0){
							vat += amt * vatAmount;						
						}
			        });

			        var total = subTotal + vat;			

			        this.set("sub_total", kendo.toString(subTotal, "c", this.get("sub_code")));
			        this.set("vat", kendo.toString(vat, "c", this.get("sub_code")));			
					this.set("total", kendo.toString(total, "c", this.get("sub_code")));
					
			    	this.autoIncreaseNo();
		    	}else{
		    		this.set("sub_total", kendo.toString(0, "c", this.get("sub_code")));
			        this.set("vat", kendo.toString(0, "c", this.get("sub_code")));			
					this.set("total", kendo.toString(0, "c", this.get("sub_code")));
		    	}    	
			},
			itemChange 			: function(e){								
				var data = e.data;				
		        var rate = this.get("rate");		        
		        var item = itemDS.get(data.item_id);		 
		        		        
	    		data.set("description", item.name);
		        data.set("unit_price", item.price/rate);
		        	        
		        this.change();	                	        	
			},
			getCurrencyRateByCode 	: function(code){
				var rate = 0;			
				$.each(currencyRateDS.data(), function(index, value){	        	
		        	if(code===value.code){	        		
		        		rate = value.rate;
		        		return false;
		        	}	        	
		        });
				
		        return kendo.parseFloat(rate);
			},

		    add 				: function(){
		    	var self = this;
		    	//Exchange rate
				var rate = 1;
				var company = companyDS.at(0);
				var customer = this.get("customer");

		        if(company.based_currency!==customer.currency_code){
		        	var companyCodeRate = this.getCurrencyRateByCode(company.based_currency);
		        	var customerCodeRate = this.getCurrencyRateByCode(customer.currency_code);

		        	if(customerCodeRate>0 && companyCodeRate>0){
		        		rate = companyCodeRate/customerCodeRate;
		        	}	
		        }

		        this.set("customer_rate_to_company_rate", rate);

		        //Modify invoice item
		        $.each(invoiceItemDS.data() ,function(index, data){
		        	data.set("id", 0);
		        	data.set("invoice_id", 0);
		        	data.set("rate", rate);
		        });

		        //Add invoice to datasource	
		        banhji.transaction.save({
		        	company_id: banhji.config.userData.company,
					vendor_id: banhji.vendor.get("current").id,
					employee_id: banhji.config.userData.userId,
					payment_id: 0,
					transaction_type: "po",
					payment_method: "cash",
					check_no: this.get("checkNo"),
					memo: "បញ្ជាទិញ" + this.get("memo"),
					date: kendo.toString(this.get("issued_date"),"yyyy-MM-dd"),
					due_date: kendo.toString(this.get("expected_date"),"yyyy-MM-dd"),
					amount_billed: kendo.parseFloat(this.get("total")),
					amount_due: 0,
					amount_paid: 0,
					voucher: 0,
					number: this.get("number"),
					address: this.get("address"),
					ship_to: this.get("ship_to"),
					class_id: this.get("class_id"),
					status: 0,
					remark: this.get("memo2"),
					journalEntries: []							
				}).then(
					function(data){
						viewModel.update(data.results[0].id);
						viewModel.empty();
					},
					function(error){
						console.log(error);
					}
				);		    	    	
		    },
		    update 				: function(id){			
				//Adding invoice id to invoice item
		        $.each(invoiceItemDS.data() ,function(index, data){
		        	data.set("invoice_id", id);
		        });
				invoiceItemDS.sync();						
		    },		    
		    clear 				: function(){
		    	this.setNumber();		    		
		    	
				this.set("memo", "");
				this.set("memo2", "");
				this.set("sub_total", "");
				this.set("vat_id", "");
				this.set("vat", "");	
				this.set("total", "");
				
				//Remove datasources			
				invoiceItemDS.data([]);							
		    }
		});

		return {
			viewModel : viewModel
		};	
	}());

	banhji.report = (function(){
		var viewModel = kendo.observable({
			balanceSheet: function(e){
				e.preventDefault();
				banhji.router.navigate('balancesheet', false);
			},
			journal: function(e){
				e.preventDefault();
				banhji.router.navigate('journal/report', false);
			},
			generalLedger: function(e){
				e.preventDefault();
				banhji.router.navigate('gl', false);
			},
			pl: function(e){
				e.preventDefault();
				banhji.router.navigate('pl', false);
			},
			vendorAging: function(e){
				e.preventDefault();
				// banhji.view.layout.showIn("#layout-view", banhji.view.index);
				banhji.router.navigate('payables', false);
			},
			item: function(e){},
			inventory: function(e){}
		});
		return viewModel;
	}());

	banhji.balanceSheet = (function(){
		var reportAging = (function(){
			var dfd = $.Deferred();
			function search() {	
				var datasource = new kendo.data.DataSource({
					transport: {
						read: {
							url: banhji.baseUrl + "api/reports/balance_sheet/",
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
					serverFiltering: true,
					filter: [
						{field: "class_id", value: viewModel.classes},
						{field: "date", value: viewModel.date}
					]
				});

				datasource.fetch(function(){
					dfd.resolve(this.data().toJSON());
				});
				return dfd;
			}
			return { 
				search : search
			};
		}());
		var viewModel = kendo.observable({
			classes: null,
			date: null,
			assets: [],
			liability: [],
			equity: [],
			assetTotal: 0,
			expenseTotal: 0,
			equityTotal: 0,
			net: "",
			date: function() {
				return kendo.toString(new Date(), 'dd-MM-yyyy');
			},
			getIncome: function(e) {
				var self = this;
				reportAging.search().
					progress(
						function(){
							$("$listview").hide();
					}).
					done(
						function(data){
							
							var source = data;
							var assetTotal=0, expenseTotal=0, equityTotal=0;
							if(self.assets.length > 0) {
								self.set("incomeTotal", 0);
								self.assets.splice(0, self.assets.length);
							}
							if(self.liability.length > 0) {
								self.set("expenseTotal", 0);
								self.liability.splice(0, self.liability.length);
							}
							if(self.equity.length > 0) {
								self.set("equityTotal", 0);
								self.equity.splice(0, self.equity.length);
							}
							self.set("net", 0);
							if( source.length > 0) {
								if(source[0].asset != null) {
									for( var i = 0; i < source[0].asset.length; i++) {
										self.assets.push({
											code: source[0].asset[i].account_code, 
											name: source[0].asset[i].account_name,
											amount: source[0].asset[i].balance
										});
										assetTotal += parseFloat(source[0].asset[i].balance);
									}
								}
								
								if(source[1].liability != null) {
									for( var i = 0; i < source[1].liability.length; i++) {
										self.liability.push({
											code: source[1].liability[i].account_code, 
											name: source[1].liability[i].account_name,
											amount: source[1].liability[i].balance
										});
										expenseTotal += parseFloat(source[1].liability[i].balance)
									}	
								}
								if(source[2].equity != null) {
									for( var i = 0; i < source[2].equity.length; i++) {
										self.equity.push({
											code: source[2].equity[i].account_code, 
											name: source[2].equity[i].account_name,
											amount: source[2].equity[i].balance
										});
										equityTotal += parseFloat(source[2].equity[i].balance)
									}	
								}	
							}
							self.set("assetTotal", kendo.toString(assetTotal, "c2"));
							self.set("expenseTotal", kendo.toString(expenseTotal, "c2"));
							self.set("equityTotal", kendo.toString(equityTotal, "c2"));
							self.set("net", kendo.toString((expenseTotal+equityTotal), "c"));
							$("#listview").show();
					}). 
					fail(function(error){
						console.log(error);
					});
			}
		});
		return viewModel;
	}());

	banhji.journal = (function(){
		var classDS = new kendo.data.DataSource({
	    	transport: {
	             read: {
	             	url: banhji.baseUrl + "api/accounting_api/class_dropdown",
	             	type: "GET",
	             	dataType: "json"
	             }
	       }
	    });
		var transactionDS = new kendo.data.DataSource({
			transport: {
				read: {
					url : banhji.baseUrl + "api/accounting_api/transaction_by",
					type: "GET",
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
					id : "transID"
			  	},
			  	data: 'results',
			  	total: function(data) {
			  		return data.total;
			  	}
			},
		  	serverFiltering: true,
		  	serverPaging: true,
		  	pageSize: 20,
		  	// filter: [
		  	// 	{ field: "createdDate", value: transactionsVM.get("started") },
		  	// 	{ field: "createdDate", value: transactionsVM.get("ended") },
		  	// 	{ field: "class_id", value: transactionsVM.get("class_id") }
		  	// ]
		});
		
		var transactionsVM = kendo.observable({
			started: '2014-01-01',
			ended: '2014-02-19',
			class_id: null,
			setCurrent 		: function(id) {
				this.set("current", transactionDS.get(id));
			},
			validated 		: false,
			pageSize 		: function() {
				return transactionDS.pageSize();
			},
			skip 			: function() {
				if(transactionDS.page() === 1) {
					return 0;
				} else {
					return (transactionDS.page() * transactionDS.pageSize());
				}
			},
			errorArray		: [],
			errorCode 		: "",
			errorName 		: "",
			errorType 		: "",
			classes 		: classDS,		
			startDate		: function() {
				var date = new Date();
				var month = date.getMonth()+1;
				var year = date.getFullYear();
				return year+'-'+month+'-01';
			},
			endDate 		: function(){
				return kendo.toString(this.get("end"), 'dd-MM-yyyy');
			},
			searchTrans 	: function() {
				transactionDS.fetch(function(){
					var data = this.data();
					accountModel.set("transactions", data);
					var d = this.total()/this.get("limit");
					var m = this.total()%this.get("limit");

					accountModel.set("total", this.total());
				});
			},
			editBtn 		: function(e) {
				e.preventDefault();
				this.set("acCode", this.current.code);
				this.set("acName", this.current.name);
				this.set("acType", this.current.type_id);
				this.set("acDescription", this.current.description);
				this.set("acParent", this.current.parent.id);
				router.navigate("/edit", false);
			},
			deleteBtn		: function(e) {
				e.preventDefault();
				var model = accountDS.get(this.current.id);
				var ask = confirm("តើអ្នត្រូវការលុបគណនី " + model.name + " ម៉ែនទេ?");
				if(ask) {
					accountDS.remove(model);
					accountDS.sync();
				}
				
			},
			change 			: function(e) {
				this.set("selectedRow", e.sender.dataItem(e.sender.select()));
			},
			add 			: function() {
				var validated = this.validate();

				if(validated === true) {
					accountDS.add({
						code: this.get("acCode"),
						name: this.get("acName"),
						account_type_id: this.get("acType"),
						description: this.get("acDescription"),
						parent_id: this.get("acParent")
					});
					accountDS.sync();
				}
			},
			update 			: function() {
				var validated = this.validate();

				if(validated === true) {
					var model = accountDS.get(this.current.id);
					model.set("code", this.get("acCode"));
					model.set("name", this.get("acName"));
					model.set("account_type_id", this.get("acType"));
					model.set("description", this.get("acDescription"));
					model.set("parent_id", this.get("acParent"));

					accountDS.sync();
				}
			}
	 	});

		return {
			viewModel:transactionsVM,
			ds: transactionDS
		};
	}());

	banhji.requests = (function(){
		var viewModel = kendo.observable({
			dataSource 	: new kendo.data.DataSource({
				transport: {
		            read: {
	                    url : banhji.baseUrl +"api/items/requests",
	                    type: "GET",
	                    dataType: "json",
	                },
	                create: {
	                    url : banhji.baseUrl +"api/items/requests",
	                    type: "POST",
	                    dataType: "json"
	                },
	                update: {
	                    url : banhji.baseUrl +"api/items/requests",
	                    type: "PUT",
	                    dataType: "json"
	                },  
	                destroy: {
	                    url : banhji.baseUrl +"api/items/requests",
	                    type: "DELETE",
	                    dataType: "json"
	                },   
	                parameterMap: function(data, operation) {
	                    if (operation !== "read" && data.models) {
	                        return {models: kendo.stringify(data.models)};
	                    }   
	                    return data;
	               	}
		        },
	            schema: {
	                    model: {id : "id"},
	                    data: "results"      
	            },
	            serverFiltering: true,
	            filter: [
	            	{field: "company_id", value: banhji.config.userData['company']},
	            	{field: "item_type_id", value: 1}
	            ],
	            serverSorting: true
			}),
			itemReqStore: new kendo.data.DataSource({
				transport: {
		            read: {
	                    url : banhji.baseUrl +"api/items/requestItems",
	                    type: "GET",
	                    dataType: "json",
	                },
	                create: {
	                    url : banhji.baseUrl +"api/items/requestItems",
	                    type: "POST",
	                    dataType: "json"
	                },
	                update: {
	                    url : banhji.baseUrl +"api/items/requestItems",
	                    type: "PUT",
	                    dataType: "json"
	                },  
	                destroy: {
	                    url : banhji.baseUrl +"api/items/requestItems",
	                    type: "DELETE",
	                    dataType: "json"
	                },   
	                parameterMap: function(data, operation) {
	                    if (operation !== "read" && data.models) {
	                        return {models: kendo.stringify(data.models)};
	                    }   
	                    return data;
	               	}
		        },
	            schema: {
	                    model: {id : "id"},
	                    data: "results"      
	            },
	            serverFiltering: true,
	            serverSorting: true
			}),
			getItem 	: function(itemId) {
				var dfd = $.Deferred();
				this.dataSource.filter({ field: item_id, value: itemId});
				this.dataSource.bind("requestEnd", function(e){
					if(e.response.status === "OK") {
						dfd.resolve(e.response.results);
					} else {
						dfd.reject("Could not find");
					}
				});
				return dfd.promise();
			},
			getBy 	: function(itemId) {
				var dfd = $.Deferred();
				if(itemId) {
					this.dataSource.filter({ field: item_id, value: itemId});
				} else {
					this.dataSource.filter({ field: item_id, value: itemId});
				}
				this.dataSource.bind("requestEnd", function(e){
					if(e.response.status === "OK") {
						dfd.resolve(e.response.results);
					} else {
						dfd.reject("Could not find");
					}
				});
				return dfd.promise();
			},
			query 		: function(query) {
				var dfd = $.Deferred();
				this.dataSource.filter(query);
				this.dataSource.bind("requestEnd", function(e){
					if(e.response.status === "OK") {
						dfd.resolve(e.response.results);
					} else {
						dfd.reject("Could not find");
					}
				});
				return dfd.promise();
			},
			getReqItemBy: function(itemId) {
				var dfd = $.Deferred();
				this.itemReqStore.filter({field: "item_id", value: itemId});
				this.itemReqStore.bind("requestEnd", function(e){
					if(e.response.status === "OK") {
						dfd.resolve(e.response.results);
					} else {
						dfd.reject("Could not find");
					}
				});
				return dfd.promise();
			}
		});

		return viewModel;
	}());

	banhji.items = (function(){
		// datastore
		var itemsStore = new kendo.data.DataSource({
	        transport: {
	            read: {
                    url : banhji.baseUrl +"api/inventory_api/item",
                    type: "GET",
                    dataType: "json",
                },
                create: {
                    url : banhji.baseUrl +"api/inventory_api/item",
                    type: "POST",
                    dataType: "json"
                },
                update: {
                    url : banhji.baseUrl +"api/inventory_api/item",
                    type: "PUT",
                    dataType: "json"
                },  
                destroy: {
                    url : banhji.baseUrl +"api/inventory_api/item",
                    type: "DELETE",
                    dataType: "json"
                },   
                parameterMap: function(data, operation) {
                    if (operation !== "read" && data.models) {
                        return {models: kendo.stringify(data.models)};
                    }   
                    return data;
               	}
	        },
            schema: {
                    model: {id : "id"},
                    data: "results"      
            },
            serverFiltering: true,
            filter: [
            	{field: "company_id", value: banhji.config.userData['company']},
            	{field: "item_type_id", value: 1}
            ],
            serverSorting: true
        });
		var itemRecordsStore = new kendo.data.DataSource({
	        transport: {
	            read: {
                    url : banhji.baseUrl +"api/inventory_api/itemrecords",
                    type: "GET",
                    dataType: "json",
                },
                create: {
                    url : banhji.baseUrl +"api/inventory_api/itemrecords",
                    type: "POST",
                    dataType: "json"
                },
                update: {
                    url : banhji.baseUrl +"api/inventory_api/itemrecords",
                    type: "PUT",
                    dataType: "json"
                },  
                destroy: {
                    url : banhji.baseUrl +"api/inventory_api/itemrecords",
                    type: "DELETE",
                    dataType: "json"
                },
                
                    
                parameterMap: function(data, operation) {
                    if (operation !== "read" && data.models) {
                        return {models: data.models};
                    }   
                    return data;
               	}
	        },
	        batch: true,
            schema: {
                model: {
                	id : "id",
                	fields: {
                		id: {nullable: true}
                	}
                },
                count: "count",
                data: "results"       
            },
            serverFiltering: true,
            serverSorting: true
        });
		var types = new kendo.data.DataSource({
			schema: {
				id: "id"
			},
			transport: {
				read: {
					url: banhji.baseUrl +"api/inventory_api/item_type",
					dataType: "json",
					type: "GET"
				},
				parameterMap: function(data, operation) {
					if(operation!=="read"||data.models) {
						return { models: data.models };
					}
					return data;
				}
			}
		});
		var um = new kendo.data.DataSource({
			schema: {
				id: "id"
			},
			transport: {
				read: {
					url: banhji.baseUrl +"api/inventory_api/unit_measure",
					dataType: "json",
					type: "GET"
				},
				parameterMap: function(data, operation) {
					if(operation!=="read"||data.models) {
						return { models: data.models };
					}
					return data;
				}
			}
		});
		var so = new kendo.data.DataSource({
			schema: {
				model: {id: "id"},
				data: "results"
			},
			transport: {
				read: {
					url: banhji.baseUrl +"api/items/so",
					dataType: "json",
					type: "GET"
				},
				parameterMap: function(data, operation) {
					if(operation!=="read"||data.models) {
						return { models: data.models };
					}
					return data;
				}
			},
			serverFiltering: true
		});
		var inv = new kendo.data.DataSource({
			schema: {
				model: {id: "id"},
				data: "results"
			},
			transport: {
				read: {
					url: banhji.baseUrl +"api/items/invoice",
					dataType: "json",
					type: "GET"
				},
				parameterMap: function(data, operation) {
					if(operation!=="read"||data.models) {
						return { models: data.models };
					}
					return data;
				}
			},
			serverFiltering: true
		});
		var tranx = new kendo.data.DataSource({
			schema: {
				model: {id: "id"}
			},
			transport: {
				read: {
					url: banhji.baseUrl +"api/items/tranx",
					dataType: "json",
					type: "GET"
				},
				parameterMap: function(data, operation) {
					if(operation!=="read"||data.models) {
						return { models: data.models };
					}
					return data;
				}
			},
			serverFiltering: false
		});

		var accountDS = new kendo.data.DataSource({
		    transport: {
			    read: {
			    	url:banhji.baseUrl + "api/accounting_api/account",
				    type: "GET",
				    dataType: "json"
				}
		    },
		    serverFiltering: true,
		    filter: [
	        	{ field: "company_id", value: banhji.config.userData.company}
	        ],
	        schema: {
	        	model: {
	        		id: "id"
	        	}
	        }
	    });

		// viewModel
		var recordModel = kendo.observable({
			cart 				: [],
			addToCart 			: function() {
				this.cart.push({
					bill_id: null, 
					item_id: null, 
					cost: 0, 
					price: 0, 
					quantity: 0, 
					amount: 0, 
					balance: 0
				});
			},
			removeFromCart 		: function(e) {
				$.each(this.cart, function(k,v){
					if(e.data === v) {
						this.cart[k].splice(k, 1);
					}
				});
			},
			removeCart 			: function() {
				this.cart.splice(0, this.cart.length);
			},
			getByItem 	 		: function(id) {
				var dfd = $.Deferred();
				if(id === null) {
					itemRecordsStore.query({
						sort: {field: "created_at", dir: "DESC"},
						filter: {field: "item_id >=", value: 0}
					});
				} else {
					itemRecordsStore.query({
						sort: {field: "created_at", dir: "DESC"},
						filter: {field: "item_id", value: id}
					});
				}
				
				itemRecordsStore.bind('requestEnd', function(e){
					if(e.response.status === "OK") {
						dfd.resolve(e.response);
					} else {
						dfd.reject(e.response);
					}	
				});
				
				return dfd.promise();
			},
			getItemTranx 		: function() {
				var dfd = $.Deferred();
				tranx.read();
				tranx.bind("requestEnd", function(e){
					var data = e.response;
					if(data && data.length>0) {
						dfd.resolve(data);
					} else {
						dfd.reject("no data found");
					}
				});
				return dfd.promise();
			},
			create 				: function(data) {
				var dfd = $.Deferred();
				itemRecordsStore.add(data);
				itemRecordsStore.sync();
				itemRecordsStore.bind('requestEnd', function(e){
					// if(e.response.status === "OK") {
						dfd.resolve(e.response);
					// } else {
					// 	dfd.reject(e.response);
					// }	
				});
				return dfd.promise();
			},
			update 				: function(id, data) {},
			remove 		 		: function(id) {}			
		});
		var itemModel = kendo.observable({
			reportData 			: [],
			items 				: [{
				company_id: banhji.config.userData['company'],
				sku 	: null,
				name 	: null,
				cost 	: null,
				price 	: null,
				purchase_description: null,
				sale_description: null,
				quantity: null,
				order_point: null,
				type 	: {id: 1},
				general_account: {id: 0},
				income_account: {id: 0},
				cogs_account: {id: 0}
			}],
			dataStore 			: itemsStore,
			itemRecords 		: recordModel,
			typesStore 			: types,
			unitMeasure 		: um,
			accountStore 		: accountDS,
			shown 				: false,
			closeX 	: function () {
				kendo.fx($("#purchase-form")).slideIn("up").play();
				window.history.go(-1);
				this.cancelChange();
			},
			setCurrent 			: function(item){
				this.set("current", item);
				this.set("shown", true);
				banhji.view.items.showIn("#itemDetail", banhji.view.itemsDetail);
			},
			addToItem 			: function() {
				this.cart.push({
					item_sku			: null,
					name 				: null,
					cost 				: 0,
					price 				: 0,
					quantity 			: 0,
					vat 				: 0,
					item_type_id 		: null,
					general_account_id 	: null,
					cogs_account_id 	: null,
					income_account_id 	: null,
					sale_description 	: null,
					purchase_description: null,
					phase 				: null,
					fuse 				: null,
					ampere 				: null,
					voltage 			: null,
					parent_id 			: 0,
					status 				: 1,
					order_point 		: 0,
				});
			},
			removeFromItems		: function(e) {
				$.each(this.items, function(k,v){
					if(e.data === v) {
						this.items[k].splice(k, 1);
					}
				});
			},
			removeItems 			: function() {
				this.items.splice(0, this.items.length);
			},
			getBy 				: function(id) {
				var dfd = $.Deferred();
				itemsStore.filter({field: "id", value: id});
				itemsStore.bind("requestEnd", function(e){
					if(e.response.status === "OK") {
						dfd.resolve(e.response);
					} else {
						dfd.reject(e.response);
					}
				});
				return dfd.promise();
			},
			getByType 			: function(type) {
				var dfd = $.Deferred();
				this.type = {
					"inventory": 1,
					"non-Inventory": 2,
					"fixed-asset": 3,
					"service": 4,
					"deposit": 5,
					"vat": 6,
					"other": 7
				};
				// type
				// 1: Inventory part, 2: Non-inventory part, 3: Fixed Asset
				// 4: Service, 5: Deposit, 6: VAT, 7: other
				if(type === null) {
					// get all item by this company
					itemsStore.query({
						sort: {field: "created_at", dir: "DESC"},
						filter: { field: "company_id", value: banhji.config['userData']['company']}
					});
				} else {
					// get only certain type by this company
					itemsStore.query({
						sort: { field: "created_at", dir: "DESC" },
						filter: [
							{ field: "company_id", value: banhji.config['userData']['company'] },
							{ field: "item_type_id", value: this.type[type.toLowerCase()] }
						]
					});
				}

				itemsStore.bind("requestEnd", function(e){
					if(e.response.status === "OK") {
						dfd.resolve(e.response);
					} else {
						dfd.reject(e.response);
					}
				});
				return dfd.promise();
			},
			getAll 		 		: function() {},
			create				: function(data) {
				var dfd = $.Deferred();
				itemsStore.add(data);
				itemsStore.sync();
				itemsStore.bind('requestEnd', function(e){
					dfd.resolve(e.response);
				});
				itemsStore.bind('error', function(e){
					dfd.reject(e.response);
				});
				return dfd.promise();
			},
			update 				: function(id, data) {
				var dfd = $.Deferred();
				var itemModel = itemsStore.get(id);
				$.each(data, function(k,v){
					itemModel.set(k, v[k]);
				});
				itemsStore.sync();
				itemsStore.bind('requestEnd', function(e){
					dfd.resolve(e.response);
				});
				itemsStore.bind('error', function(e){
					dfd.reject(e.response);
				});
				return dfd.promise()
			},
			remove 				: function(id) {
				this.get(id)
				.then(
					function(data){},
					function(error){}
				);
			},
			addNew 				: function() {
				this.get("dataStore").insert(0, this.items);
				this.setCurrent(this.get("dataStore").at(0));
			},
			cancelChange 		: function() {
				this.get("dataStore").cancelChanges();
			},
			record 				: function() {
				var self = this;
				if(this.get("dataStore").hasChanges() && this.get("current").dirty) {
					this.get("dataStore").sync();
					this.get("dataStore").bind('requestEnd', function(e){
						if(e.response.id) {
							self.closeX();
						}
						
					});
				}
			},
			inSO 				: function(itemId) {
				var dfd = $.Deferred();
				so.filter([{field:"type", value: "SO"},{field: "status", value: "0"}]);
				so.bind("requestEnd", function(e){
					if(e.response.status === "OK") {
						var itemInSO = [];
						$.each(e.response.results, function(i,v){
							if(v.items.id == itemId) {
								itemInSO.push(v);
							}
						});
						dfd.resolve(itemInSO);
					} else {
						dfd.reject(e.response);
					}
				});
				return dfd.promise();
			},
			inInv 				: function(itemId) {
				var dfd = $.Deferred();
				inv.filter([{field:"type", value: "Invoice"},{field: "status", value: "0"}]);
				inv.bind("requestEnd", function(e){
					if(e.response.status === "OK") {
						var itemInInv = [];
						$.each(e.response.results, function(i,v){
							if(v.items.id == itemId) {
								itemInInv.push(v);
							}
						});
						dfd.resolve(itemInInv);
					} else {
						dfd.reject(e.response);
					}
				});
				return dfd.promise();
			},
			getReport 			: function(itemId) {
				var self = this;

				// po
				var po = new Transaction();
				
				$.when(
					this.inSO(itemId)
					.then(function(data){
						var count = 0;
						$.each(data, function(i,v){
							count += parseInt(v.quantity);
						});
						return count;
					}),
					this.inInv(itemId)
					.then(function(data){
						var count = 0;
						$.each(data, function(i,v){
							count += parseInt(v.quantity);
						});
						return count;
					}),
					banhji.requests.query({field: "status", value: 1})
					.then(function(data) {
						var count = 0;
						$.each(data, function(i,v){
							$.each(v.items, function(i,v){
								if(v.item_id == itemId) {
									count+= parseInt(v.quantity);
								}
							});
						});
						return count;
					}),
					po.getBy([{field: "transaction_type", value: "po"},{field: "status", value: 0}])
					.then(function(data) {
						var count = 0;
						$.each(data.results, function(i,v){ 
							$.each(v.entries, function(i,v){
								if(v.item_id == itemId) {
									count+= parseInt(v.quantity);
								}
							});
						});
						return count;
					})
				)
				.then(function(so, inv, po){
					$("#itemReportTable > tbody").kendoListView({
						dataSource: [{
							actual: self.get('current').quantity,
							so: so,
							inv: inv,
							po: po,
						}],
						template: kendo.template($("#itemsReportView").html())
					});
				});
			}
		});
		
		return  itemModel;
	}());

	banhji.class = (function(){
		var classCollection = new kendo.data.DataSource({
	        transport: {
	            read: {
                    url : banhji.baseUrl +"api/classes/class",
                    type: "GET",
                    dataType: "json",
                },
                create: {
                    url : banhji.baseUrl +"api/classes/class",
                    type: "POST",
                    dataType: "json"
                },
                update: {
                    url : banhji.baseUrl +"api/classes/class",
                    type: "PUT",
                    dataType: "json"
                },  
                destroy: {
                    url : banhji.baseUrl +"api/classes/class",
                    type: "DELETE",
                    dataType: "json"
                },   
                parameterMap: function(data, operation) {
                    if (operation !== "read" && data.models) {
                        return {models: kendo.stringify(data.models)};
                    }   
                    return data;
               	}
	        },
            schema: {
                    model: {
                    	id : "id",
                    	fields: {
                    		"name": {type:"string"},
                    		"description": {type: "string"},
                    		"type": { type: "string"}
                    	}
                    },
                    data: "results"
            },
            filter: {field: "company_id", value: banhji.config.userData['company']},
            serverFiltering: true,
            serverSorting: true
        });

        var classVM = kendo.observable({
        	dataSource 	: classCollection,
        	setDataSource: function(dataSource) {
        		this.set("dataSurce", dataSource);
        	},
        	dataSource 	: classCollection,
        	setCurrent 	: function(model) {
        		this.set("current", model);
        	},
        	query 		: function(query) {},
        	getById 	: function(id) {
        		var dfd = $.Deferred();
        		classCollection.filter({field: "id", value: id});
    			classCollection.bind('requestEnd', function(e){
    				dfd.resolve(e.response);
    			});
    			return dfd.promise();
        	},
        	getBy 		: function(criteria) {},
	       	cancel 		: function() {

        		classCollection.cancelChanges();
        	},
        	addNew 		: function() {
        		classCollection.insert(0, {
        			company_id: banhji.config.userData['company'],
        			name: "ឈ្មោះ",
        			type: "class",
        			description: "ពណ៌នា"
        		});
        	},
        	save 		: function() {
        		classCollection.sync();
        	},
        	update 		: function(id, data) {
        		var dfd = $.Deferred();
        		if(classCollection.data()>0) {
        			var model = classCollection.get(id);
        			$.each(data, function(i, v){
        				model.set(i,v);
        			});
        		} else {
        			this.getById(id).then(
        				function(res) {
        					var model = classCollection.get(id);
        					$.each(data, function(i, v){
        						// model.set(i, v);
        					});
        				}
        			)
        			
        		}
        		
        	},
        	remove 		: function() {}
        });
        return classVM;
	}());

	banhji.inventoryItemView = (function(){
		var baseUrl =  banhji.baseUrl; //"<?php echo base_url(); ?>";
		var selected_item;
		var wopen;

		var viewModel = kendo.observable({
			id					: 0,
	 		item_sku			: "",		
	 		name				: "",
	 		item_type_id		: 1,		
	 	    unit_measure_id		: 0, 	  
	 		cost				: 0,
	 		quantity			: 0,
	 		price				: 0,
	 		general_account_id	: 0,
	 		cogs_account_id		: 0,
	 		income_account_id	: 0,
	 		purchase_description: "N/A",
	 		sale_description	: "N/A",
			phase				: "",
			ampere				: "",
			fuse				: "",
			voltage				: "",
	 		status				: true,		
	 		account_name		: "",				
	 		type_name			: "",
	 		measure_type		: "",

	 		//set current culture to "km-KH" = khmer
			



	 		//Item type ddl
	 		itemType: new kendo.data.DataSource({					
				transport: {
					read: baseUrl + "api/inventory_api/item_type",
					type: "GET",
					dataType: "json"
				}
			}),

			//DataSource
			itemDS: new kendo.data.DataSource({
				 transport: {
					read: {
						url : baseUrl + "api/inventory_api/item",
						type: "GET",
						dataType: "json",
						data: {
							status: 'all'
						}
					},
					create: {
						url : baseUrl + "api/inventory_api/item",
						type: "POST",
						dataType: "json",
						// complete: function(e) {
						// 			$("#grid").data("kendoGrid").this.read(); 
						// 		}
					},
					update: {
						url : baseUrl + "api/inventory_api/item",
						type: "PUT",
						dataType: "json",
						// complete: function(e) {
						// 			$("#grid").data("kendoGrid").this.read(); 
						// 		}
					},	
					destroy: {
						url : baseUrl + "api/inventory_api/item",
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
				pageSize:10,
				batch: false,
				schema: {
						model: {
						id : "id",
						fields: {	
												
							item_sku 				: {  type: "string" },
							name 					: {  type: "string" },	
							item_type_id			: {  type: "number" },
							unit_measure_id			: {  type: "number" },
							cost         			: {  type: "number" },
							quantity       			: {  type: "number" },
							price					: {  type: "number" },				
							general_account_id   	: {  type: "number" },
							cogs_account_id    		: {  type: "number" },
							income_account_id   	: {  type: "number" },
							purchase_description	: {  type: "string" },
							sale_description		: {  type: "string" },
							phase					: {	 type: "string" },
							ampere					: {	 type: "string" },
							fuse					: {	 type: "string" },
							voltage					: {	 type: "string" },
							status					: {  type: "boolean"},
							account_name			: {   },
							type_name				: {   },
							measure_type			: {  type: "string"  }
										
											
						}
					}		 
				}
				
			}),

			//Unit Measure cmd
			unit_measure_Source: new kendo.data.DataSource({
				transport: {
					read: baseUrl + "api/inventory_api/unit_measure",
					type: "GET",
					dataType: "json"
				}
				 
			}),

			//Account General cmb
			general_account_Source: new kendo.data.DataSource({
				suggest: true,				
				transport: {
					read: baseUrl + "api/accounting_api/account",
					type: "GET",
					dataType: "json"
				}
				 
			}),

			//Account COGS/Expense cmb
			cogs_account_Source: new kendo.data.DataSource({
				suggest: true,
				transport: {
					read: baseUrl + "api/accounting_api/account",
					type: "GET",
					dataType: "json"
				}
				 
			}),

			//Account Income cmb
			income_account_Source: new kendo.data.DataSource({
				suggest: true,
				transport: {
					read: baseUrl + "api/accounting_api/account",
					type: "GET",
					dataType: "json"
				}
				 
			}),

			//Phase DDl
			phaseSource: new kendo.data.DataSource({
				suggest: true,
				transport: {
					read: baseUrl + "api/electricity_unit_api/phase",
					type: "GET",
					dataType: "json"
				}
				 
			}),

			//Ampere DDl
			ampereSource: new kendo.data.DataSource({
				suggest: true,
				transport: {
					read: baseUrl + "api/electricity_unit_api/ampere",
					type: "GET",
					dataType: "json"
				}
				 
			}),

			//fuse DDl
			fuseSource: new kendo.data.DataSource({
				suggest: true,
				transport: {
					read: baseUrl + "api/electricity_unit_api/fuse",
					type: "GET",
					dataType: "json"
				}
				 
			}),

			//voltage DDl
			voltageSource: new kendo.data.DataSource({
				suggest: true,
				transport: {
					read: baseUrl + "api/electricity_unit_api/voltage",
					type: "GET",
					dataType: "json"
				}
				 
			}),



	 		//Event
	 		adds: function() {

	 			var validator = $("#item").kendoValidator().data("kendoValidator"),
				message = $(".status");

			     this.preventDefault;		 
				 if (validator.validate()) {			 
					 this.add_new_item();
					 message.text("Your item has been added!").addClass("valid");
				 } else {
					 message.text("Oops! There is invalid data in the form.").addClass("invalid");
				 }
					
		    },

		    //Edit button click
		    edits : function() {
		    	var validator = $("#item").kendoValidator().data("kendoValidator"),
				message = $(".status");

		 	    this.preventDefault;		 
		 		if (validator.validate()) {			 
		 			 this.edit_item();
		 			 message.text("Your item has been modified!").addClass("valid");
		 		} else {
		 			 message.text("Oops! There is invalid data in the form.").addClass("invalid");
		 		}
					
		    },

		    //Close button click
		     closes: function() {		 	     		
			     var win = $("#window").data("kendoWindow");
			     win.close();				
		    },

	 		onSchange: function(e){

	 			//Selecting Grid
				// var gview = $("#grid").data("kendoGrid");
				//Getting selected item
				// var selected_item = gview.dataItem(gview.select());
				//accessing selected rows data 
				// alert(selectedItem.email);

				// var lv = $("#item_type_id").data("kendoGrid");
				// var index = lv.select().index();
				// selected_item = this.itemDS.view()[index];



				var id = e.sender.select().data().uid;
				selected_item = this.itemDS.getByUid(id);

				$("#openEditWindow").attr('disabled', false);
				   
			   	//set viewModel
				this.set("id", selected_item.id);
				this.set("item_sku", selected_item.item_sku);
				this.set("name", selected_item.name);
				this.set("item_type_id", selected_item.item_type_id);
				this.set("unit_measure_id", selected_item.unit_measure_id);
				this.set("cost", selected_item.cost);
				this.set("quantity", selected_item.quantity);
				this.set("price", selected_item.price);
				this.set("general_account_id", selected_item.general_account_id);
				this.set("cogs_account_id", selected_item.cogs_account_id);
				this.set("income_account_id", selected_item.income_account_id);
				this.set("purchase_description", selected_item.purchase_description);
				this.set("sale_description", selected_item.sale_description);
				this.set("phase", selected_item.phase);
				this.set("ampere", selected_item.ampere);
				this.set("fuse", selected_item.fuse);
				this.set("voltage", selected_item.voltage);
				this.set("status", selected_item.status);
				
				if (selected_item.item_type_id === 1)
				{
					//Show unit_measure and quantity
					
					$("#unit_measure_title").show();
					$("#unit_measure_input").show();
					$("#quantity_title").show();
					$("#quantity_input").show();
						
					$("#phase_title").hide();
					$("#phase_input").hide();
					$("#ampere_title").hide();
					$("#ampere_input").hide();
					$("#fuse_title").hide();
					$("#fuse_input").hide();
					$("#voltage_title").hide();
					$("#voltage_input").hide();
				}
				else if (selected_item.item_type_id === 5 || selected_item.item_type_id === 6){
					$("#phase_title").show();
					$("#phase_input").show();
					$("#ampere_title").show();
					$("#ampere_input").show();
					$("#fuse_title").show();
					$("#fuse_input").show();
					$("#voltage_title").show();
					$("#voltage_input").show();
						
					//hide unit_measure and quantity
					$("#unit_measure_title").hide();
					$("#unit_measure_input").hide();
					$("#quantity_title").hide();
					$("#quantity_input").hide();
						
				} //Meter = 5 Breaker = 6
				else
				{
					
					//hide unit_measure and quantity
					$("#unit_measure_title").hide();
					$("#unit_measure_input").hide();
					$("#quantity_title").hide();
					$("#quantity_input").hide();
						
					$("#phase_title").hide();
					$("#phase_input").hide();
					$("#ampere_title").hide();
					$("#ampere_input").hide();
					$("#fuse_title").hide();
					$("#fuse_input").hide();
					$("#voltage_title").hide();
					$("#voltage_input").hide();
					
				}
			},
	 		onRefresh: function($param){
				
				if (wopen == "new_item")
				{
				   	//set viewModel
					this.set("id", 0);
					this.set("item_sku", "");
					this.set("name", "");
					this.set("item_type_id", 1);
					this.set("unit_measure_id",0);
					this.set("cost", 0);
					this.set("quantity", 0);
					this.set("price", 0);
					this.set("general_account_id", 0);
					this.set("cogs_account_id", 0);
					this.set("income_account_id", 0);
					this.set("purchase_description", "");
					this.set("sale_description", "");
					this.set("phase", "");
					this.set("ampere", "");
					this.set("fuse", "");
					this.set("voltage", "");
					
					if (this.get("status") == "false"){
						this.set("status", "true");
					}
						
					var type = $("#item_type_id").data("kendoDropDownList");
					var general_account_id = $("#general_account_id").data("kendoComboBox");
					var cogs_account_id = $("#cogs_account_id").data("kendoComboBox");
					var income_account_id = $("#income_account_id").data("kendoComboBox");
					var measure = $("#unit_measure_id").data("kendoComboBox");
					var price = $("#price").data("kendoNumericTextBox");
					var cost = $("#cost").data("kendoNumericTextBox");
					var quantity = $("#quantity").data("kendoNumericTextBox");
			
					// set the value of the combobox.
					type.value("1"); //looks for item which has value "1"
					general_account_id.text("");
					cogs_account_id.text("");
					income_account_id.text("");
					measure.text("");			
				}
				
				if (wopen == "edit_item")
				{
				   	//set viewModel
					this.set("id", selected_item.id);
					this.set("item_sku", selected_item.item_sku);
					this.set("name", selected_item.name);
					this.set("item_type_id", selected_item.item_type_id);
					this.set("unit_measure_id", selected_item.unit_measure_id);
					this.set("cost", selected_item.cost);
					this.set("quantity", selected_item.quantity);
					this.set("price", selected_item.price);
					this.set("general_account_id", selected_item.general_account_id);
					this.set("cogs_account_id", selected_item.cogs_account_id);
					this.set("income_account_id", selected_item.income_account_id);
					this.set("purchase_description", selected_item.purchase_description);
					this.set("sale_description", selected_item.sale_description);
					this.set("phase", selected_item.phase);
					this.set("ampere", selected_item.ampere);
					this.set("fuse", selected_item.fuse);
					this.set("voltage", selected_item.voltage);
					this.set("status", selected_item.status);
					
					
					if (selected_item.item_type_id === 1)
					{
						//Show unit_measure and quantity
						
						$("#unit_measure_title").show();
						$("#unit_measure_input").show();
						$("#quantity_title").show();
						$("#quantity_input").show();
							
						$("#phase_title").hide();
						$("#phase_input").hide();
						$("#ampere_title").hide();
						$("#ampere_input").hide();
						$("#fuse_title").hide();
						$("#fuse_input").hide();
						$("#voltage_title").hide();
						$("#voltage_input").hide();
					}
					else if (selected_item.item_type_id === 5 || selected_item.item_type_id === 6){
						$("#phase_title").show();
						$("#phase_input").show();
						$("#ampere_title").show();
						$("#ampere_input").show();
						$("#fuse_title").show();
						$("#fuse_input").show();
						$("#voltage_title").show();
						$("#voltage_input").show();
							
						//hide unit_measure and quantity
						$("#unit_measure_title").hide();
						$("#unit_measure_input").hide();
						$("#quantity_title").hide();
						$("#quantity_input").hide();
							
					} //Meter = 5 Breaker = 6
					else
					{
						
						//hide unit_measure and quantity
						$("#unit_measure_title").hide();
						$("#unit_measure_input").hide();
						$("#quantity_title").hide();
						$("#quantity_input").hide();
							
						$("#phase_title").hide();
						$("#phase_input").hide();
						$("#ampere_title").hide();
						$("#ampere_input").hide();
						$("#fuse_title").hide();
						$("#fuse_input").hide();
						$("#voltage_title").hide();
						$("#voltage_input").hide();
						
					}
				}
			   
				
			},

			openSaveNewWindow: function(){
				wopen = "new_item";
				this.onRefresh();
				$("#openEditWindow").attr('disabled', true);
				$("#edit").hide();
				$("#add").show();
			    var win = $("#window").data("kendoWindow");
			    win.center();
			    win.open();
			},
			openEditWindow: function(){
				var win = $("#window").data("kendoWindow");
				wopen = "edit_item";
				$("#edit").show();
				$("#add").hide();
			    win.center();
	    		win.open();
			},


	 		onChanges: function(e) {
		        // handle event
		        //var lv = $("#item_type_id").data("kendoDropDownList");
				// var index = lv.select().index();
				// var itemVal = this.itemDS.view()[index];

				// var type = $("#item_type_id").data("kendoDropDownList");

				if (e.sender.value() === '1')
					{
						//Show unit_measure and quantity
					
						$("#unit_measure_title").show();
						$("#unit_measure_input").show();
						$("#quantity_title").show();
						$("#quantity_input").show();
						
						$("#phase_title").hide();
						$("#phase_input").hide();
						$("#ampere_title").hide();
						$("#ampere_input").hide();
						$("#fuse_title").hide();
						$("#fuse_input").hide();
						$("#voltage_title").hide();
						$("#voltage_input").hide();
					}
					else if (e.sender.value() === '5' || e.sender.value() === '6'){
						$("#phase_title").show();
						$("#phase_input").show();
						$("#ampere_title").show();
						$("#ampere_input").show();
						$("#fuse_title").show();
						$("#fuse_input").show();
						$("#voltage_title").show();
						$("#voltage_input").show();
						
						//hide unit_measure and quantity
						$("#unit_measure_title").hide();
						$("#unit_measure_input").hide();
						$("#quantity_title").hide();
						$("#quantity_input").hide();
						
					} //Meter = 5 Breaker = 6
					else
					{
					
						//hide unit_measure and quantity
						$("#unit_measure_title").hide();
						$("#unit_measure_input").hide();
						$("#quantity_title").hide();
						$("#quantity_input").hide();
						
						$("#phase_title").hide();
						$("#phase_input").hide();
						$("#ampere_title").hide();
						$("#ampere_input").hide();
						$("#fuse_title").hide();
						$("#fuse_input").hide();
						$("#voltage_title").hide();
						$("#voltage_input").hide();
					
					}
				
			},

			//Add new item
			add_new_item: function() {
				this.itemDS.add({
					item_sku				: this.get("item_sku"),		
					name					: this.get("name"),		
					item_type_id			: this.get("item_type_id"),			
				    unit_measure_id			: this.get("unit_measure_id"),  
					cost					: this.get("cost"),	
					quantity				: this.get("quantity"),	
					price					: this.get("price"),	
					general_account_id		: this.get("general_account_id"),		
					cogs_account_id			: this.get("cogs_account_id"),	
					income_account_id		: this.get("income_account_id"),	
					purchase_description	: this.get("purchase_description"),	
					sale_description		: this.get("sale_description"),
					//phase					: this.set("phase", selected_item.phase),
					//ampere					: this.set("ampere", selected_item.ampere),
					//fuse					: this.set("fuse", selected_item.fuse),
					//voltage					: this.set("voltage", selected_item.voltage),	
					status					: this.get("status"),	
					type_name				: "",
					account_name			: ""
				});
				this.itemDS.sync();

			},

			//Edit item
			edit_item: function(){
				var item = this.itemDS.get(selected_item.id);
				
				item.set("item_sku", this.get("item_sku"));
				item.set("name", this.get("name"));
				item.set("item_type_id", this.get("item_type_id"));
				item.set("unit_measure_id", this.get("unit_measure_id"));
				item.set("cost", this.get("cost"));
				item.set("quantity", this.get("quantity"));
				item.set("price", this.get("price"));
				item.set("general_account_id", this.get("general_account_id"));
				item.set("cogs_account_id", this.get("cogs_account_id"));
				item.set("income_account_id", this.get("income_account_id"));
				item.set("purchase_description", this.get("purchase_description"));
				item.set("sale_description", this.get("sale_description"));
				item.set("phase", this.get("phase"));
				item.set("ampere", this.get("ampere"));
				item.set("fuse", this.get("fuse"));
				item.set("voltage", this.get("voltage"));
				item.set("status", this.get("status"));
				this.itemDS.sync(); 	
				
			},

			unit_measure_SourceList: "",
			general_account_SourceList: "",
			cogs_account_SourceList: "",
			income_account_SourceList: "",
			phaseSourceList: "",
			ampereSourceList: "",
			fuseSourceList: "",
			voltageSourceList: "",



		});

		kendo.culture("km-KH");
		var validator = $("#item").kendoValidator().data("kendoValidator"),
			message = $(".status");

		return{
			viewModel: viewModel

		}		
	}());

	banhji.unitMeasure = (function(){
		var baseUrl = "<?php echo base_url(); ?>/";		
		

		//Unit Measure grid
		var viewModel = kendo.observable({
			//Unit Measure datasource
			unitMeasureDS: new kendo.data.DataSource({
				 transport: {
					read: {
						url : baseUrl + "api/inventory_api/unit_measure",
						type: "GET",
						dataType: "json"
					},
					create: {
						url : baseUrl + "api/inventory_api/unit_measure",
						type: "POST",
						dataType: "json",
						// complete: function(e) {
						// 			$("#grid").data("kendoGrid").dataSource.read(); 
						// 		}
					},
					update: {
						url : baseUrl + "api/inventory_api/unit_measure",
						type: "PUT",
						dataType: "json",
						// complete: function(e) {
						// 			$("#grid").data("kendoGrid").dataSource.read(); 
						// 		}
					},
					destroy: {
						url : baseUrl + "api/inventory_api/unit_measure",
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
				batch: false,
				schema: {
					model: {
						id : "id",
						fields: {									
							type 		: {  type: "string", validation: { required: true } },
							description : {  type: "string" }			
						}
					}		
				}
				
			}),

		});

		return{ viewModel: viewModel }

	}());

	banhji.grn = (function(){
		var invoiceItemDS = new kendo.data.DataSource({
		  	transport: {		  	
			  	read: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "PUT",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	destroy: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
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
				  	id : "id"
			  	}		
		  	},
		  	serverFiltering: true	  		  	
		});
		var classDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/classes/class",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "type", value: "Class" },
			serverFiltering: true		
		});
		var vatDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/items",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "item_type_id", value: 6 },
			serverFiltering: true
		});

		var vendorTypeDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/people_api/people_type",
					type: "GET",
					dataType: "json"
				}
			},
			serverFiltering: true,				
			filter: { field: "parent_id", value: 7 }
		});

		var itemDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/item_dropdown",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var itemRecordDS = new kendo.data.DataSource({
	        transport: {
		        create: {
			        url : banhji.baseUrl + "api/inventory_api/item_record",
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
			batch: false,	                            
		 	schema: {
				model: {
					id : "id"
				}		 
			}  
		});

		var viewModel = kendo.observable({								
				vendor 		: null,
				po_id 		: null,
				reference 	: "", // e.g: from PO
				number 		: "",
				date 		: null,
				address 	: "",
				items 		: [],
				itemsList 	: [],
				classDS 	: classDS,
				class_id 	: "",
				memo 		: "",
				remark 		: "",
				closeX 		: function(e) {
					e.preventDefault();
					window.history.go(-1);
				},
				itemChange 		: function(e) {
					var item = itemDS.get(e.data.item_id);
					e.data.set("item_id", item.id);
					e.data.set("unit_price", item.price);
				},
				change 		: function() {},
				empty 		: function(){
					this.set("vendor", "");
					this.set("reference", "");
					this.set("address", "");
					this.get("itemsList").splice(0, this.get("itemsList").length);
				},
				grandTotal 	: function() {
					var amount = 0;
					if(this.get("itemsList").length>0) {
						$.each(this.get("itemsList"), function(i,v){
							amount += kendo.parseFloat(v.unit_price) * kendo.parseFloat(v.quantity);
						});
					}
					return amount;
				},
				totalQuantity: function(){
					var qty = 0;
					if(this.get("itemsList").length>0) {
						$.each(this.get("itemsList"), function(i,v){
							qty += kendo.parseFloat(v.quantity);
						});
					}
					return qty;
				},
				addRow 		: function() {
					this.get("itemsList").push({
						item_id: 0,
						unit_price: 0,
						qty_ordered: 0,
						quantity: 0
					});
				},
				removeRow 	: function(e) {
					if(this.get("itemsList").length > 0){
						for(var i = 0;i<this.get("itemsList").length;i++){
							if(this.get("itemsList")[i] === e.data) {
								this.get("itemsList").splice(i,1);
								break;
							}
						}
					}
				},
				save 		: function() {
					var self = this;
					banhji.transaction.save({
						company_id: banhji.config.userData.company,
						vendor_id: self.get("vendor").id,
						employee_id: banhji.config.userData.userId,
						payment_id: 0,
						transaction_type: "grn",
						payment_method: "",
						check_no: 0,
						memo: "ទទួលទំនិញ",
						date: kendo.toString(self.get("date"), "yyyy-MM-dd"),
						due_date: null,
						amount_billed: kendo.parseFloat(self.grandTotal()),
						amount_due: 0,
						amount_paid: 0,
						voucher: "",
						invoiceNumber: self.get("invoiceNumber"),
						class_id: self.get("class_id"),
						status: 1,
						reference: self.get("number"),
						journalEntries: []
					}).then(function(data){
						// success save to item record
						var items = [];
						for(var i = 0; i < self.get("itemsList").length; i++){
							items.push({
								bill_id: data.results[0].id,
								item_id: self.get("itemsList")[i].item_id,
								cost: self.get("itemsList")[i].unit_price,
								quantity: self.get("itemsList")[i].quantity,
								description: "",
								price: 0, 
								amount: kendo.parseFloat(self.get("itemsList")[i].unit_price) * kendo.parseFloat(self.get("itemsList")[i].quantity)
							});
						}
						itemRecordDS.add(items);
						itemRecordDS.sync();
						banhji.transaction.update(self.get("po_id"), {grn:data.results[0].id});
					});
				},
				getBy 		: function(query) {
					var dfd = $.Deferred();
					banhji.journal.ds.filter(query);
					banhji.journal.ds.bind("requestEnd", function(e){
						dfd.resolve(e.response);
					});
					return dfd.promise();
				},
				getById 	: function(id) {
					var grn = new Transaction(), self = this;
					grn.getById(id)
					.then(function(data){
						if(data.status==="OK") {
							var grn = data.results[0];
							self.set("vendor", grn.people_name);
							self.set("po_id", grn.id);
							self.set("number", grn.number);
							self.set("class_id", grn.class_name.id);
							self.set("date", "jkljkljk");
							$.each(grn.entries, function(i,v){
								if(self.itemsList.length>0) {
									self.itemsList.splice(0, self.itemsList.length);
								}
								self.itemsList.push({
									item_id: v.id,
									unit_price: v.cost,
									qty_ordered: v.quantity,
									quantity: v.quantity
								});
							});
							console.log(self.itemsList);
						}
					});
				},
				getFromPO 	: function(poId) {
					var self = this;
					var date = new Date();
					var month= date.getMonth()+1;
					var year = date.getFullYear();
					this.set("number", "GRN0"+month+""+year+"0000");
					banhji.transaction.getById(poId).then(function(data){
						if(data.status === "OK" && data.results[0].status === "0") {
							var po = data.results[0];
							self.set("vendor", po.people_name);
							self.set("reference", po.id);
							self.set("address", po.address);
							self.set("class_id", po.class_id);
							self.set("po_id", poId);
							$.each(po.entries, function(i,v){
								self.get("itemsList").push({
									item_id 	: v.item_id,
									unit_price 	: v.unit_price,
									qty_ordered	: v.quantity,
									quantity	: 0
								});
							});	
						}
					});
				}
			});
		(function(){
			itemDS.fetch(function(){
				var data = this.data();
				if(data.length>0) {
					$.each(data, function(i,v){
						viewModel.items.push({
							id: v.id,
							name: v.name,
							cost: v.cost,
							price: v.price
						});
					});
				}
			});
		}());			

			return { viewModel 		: viewModel };	
	}());
	// banhji.grn.viewModel.getBy({field: "id", value: "d92a3c18-3133-42b6-a777-188a36e343cb"});
	// .then(function(data){console.log(data);});
											
    banhji.adjustment = (function(){
		var baseUrl = "<?php echo base_url(); ?>";

		function GetToday(){
		  //Get Today Date
		  var currentTime = new Date();
		  var day = currentTime.getDate();
		  var month = currentTime.getMonth();
		  var year = currentTime.getFullYear();

		  if (day < 10){
		  	day = "0" + day;
		  }

		  if (month < 10){
		  	month = "0" + month;
		  }

		  var today_date = year + "-" + month + "-" + day;
			  
		  return today_date;
		};

		var viewModel = kendo.observable({

			id					: 0,
			expense_account_id  : "",
			income_account_id	: "",
			dr					: 0,
	 		cr   				: 0,		
	 		balance				: 0,
	 		memo				: "",		
	 	    voucher				: "", 	  
	 		class_id			: 0,
	 		budget_id			: 0,
	 		donor_id			: 0,
			location_id			: 0,
			transaction_type	: "",
			people_id			: 0,
			employee_id			: 0,
			invoice_id			: 0,
			payment_id			: 0,
			receipt_id			: 0,
			item_receipt_id		: 0,
			date				: GetToday(),
			new_quantity		: "",


			//Item datasource
			itemDS: new kendo.data.DataSource({
				 transport: {
					read: {
						url : baseUrl + "api/inventory_api/item",
						type: "GET",
						dataType: "json"
					},
					create: {
						url : baseUrl + "api/inventory_api/item",
						type: "POST",
						dataType: "json",
						// complete: function(e) {
						// 			$("#grid").data("kendoGrid").dataSource.read(); 
						// 		}
					},
					update: {
						url : baseUrl + "api/inventory_api/item",
						type: "PUT",
						dataType: "json",
						// complete: function(e) {
						// 			$("#grid").data("kendoGrid").dataSource.read(); 
						// 		}
					},	
					destroy: {
						url : baseUrl + "api/inventory_api/item",
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
				pageSize:10,
				batch: false,
				schema: {
						model: {
						id : "id",
						fields: {										
							item_sku 				: {  type: "string" },
							name 					: {  type: "string", editable: false },	
							item_type_id			: {  type: "number" },
							unit_measure_id			: {  type: "number" },
							cost         			: {  type: "number"  },
							quantity       			: {  type: "number", editable: false  },
							price					: {  type: "number" },				
							general_account_id   	: {  type: "number" },
							cogs_account_id    		: {  type: "number" },
							income_account_id   	: {  type: "number" },
							purchase_description	: {  type: "string", editable: false  },
							sale_description		: {  type: "string" },
							status					: {  type: "boolean" },
							account_name			: {   },
							type_name				: {   },
							measure_type			: {  type: "string"  },
							new_quantity			: {  type: "number", validation: { min: 0 }  },
							adjustment_outcome		: {  type: "string", defaultValue: ""  }							
											
						}
					}		 
				}
				
			}),

			journalDS: new kendo.data.DataSource({
			 transport: {
				 read: {
					 url : baseUrl + "api/accounting_api/journal",
					 type: "GET",
					 dataType: "json"
				 },
				 create: {
					 url : baseUrl + "api/accounting_api/journal",
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
		  		 batch: false,	                            
		 		 schema: {
					 model: {
						 id : "id",
						 fields: {	
					     account_id		: {  type: "number", validation: { required: true }	},			
						 dr 			: {  type: "number", validation: { required: true }  },	
						 cr    			: {  type: "number"		},
						 balance  		: {  type: "number", validation: { required: true }  },
						 memo         	: {  type: "string", validation: { required: true }  },					
						 voucher		: {  type: "string"  	},
						 class_id    	: {  type: "number", defaultValue: 0	},
						 budget_id		: {  type: "number", defaultValue: 0 	},
						 donor_id       : {  type: "number", defaultValue: 0	},
						 location_id    : {  type: "number", defaultValue: 0	},
						 transaction_type     : {  type: "string" },	
						 people_id     	: {  type: "number", defaultValue: 0	},
						 employee_id    : {  type: "number", defaultValue: 0	},				
						 invoice_id    	: {  type: "number", defaultValue: 0	},	
						 payment_id    	: {  type: "number", defaultValue: 0	},	
						 receipt_id    	: {  type: "number", defaultValue: 0	},
						 item_receipt_id : {  type: "number", defaultValue: 0	},
						  
								
						}
					}		 
				}
			   
			}),

			//expense_account_Source
			expense_account_Source: new kendo.data.DataSource({					
				transport: {
					read: baseUrl + "api/accounting_api/account",
					type: "GET",
					dataType: "json"
				}
		
			}),

			//Account Adjustment cmb (Income)
			 income_account_Source: new kendo.data.DataSource({
				suggest: true,
				transport: {
					read: baseUrl + "api/accounting_api/account",
					type: "GET",
					dataType: "json"
				}				 
			}),

			 //Class cmb
			classSource: new kendo.data.DataSource({
				suggest: true,
				transport: {
					read: baseUrl + "api/accounting_api/class_dropdown",
					type: "GET",
					dataType: "json"
				}
				 
			}),
			

			//Fucntion
			AddDays: function(date, number_day){

				date.setDate(date.getDate() + number_day);
							
				var day = date.getDate();
				var month = date.getMonth() + 1;
				var year = date.getFullYear();

			    if (day < 10){
			      day = "0" + day;
			    }

			    if (month < 10){
			  	  month = "0" + month;
			    } 
				
				return year + "-" + month + "-" + day;
			},

			close: function(){
				$('#successModal').modal('hide');
			},

			clearEvent: function(){
				this.Clear_Input();
			},

			//EventFunction		
			addEvent: function() {
			    this.preventDefault;
			    var validator = $("#validate").kendoValidator().data("kendoValidator"),
					message = $(".status");		 
				
			  	if (validator.validate()) {
				   
			 		this.make_adjustment;
			 		//$('#successModal').modal('show');	  
			 		alert("Receipt has been created successfully."); 	
			   				
			  	}
			  	else {
			 		message.text("Oops! There is invalid data in the form.").addClass("invalid");
			   	}
						
			},

			make_adjustment: function() {		
				 var income_amount = 0;
				 var expense_amount = 0;
				 var inventory_debit = 0;
				 var inventory_credit = 0;
					 
				 //Loop Datasource
				 var rows = this.itemDS.total();
				 for (var i = 0; i<rows; i++){
						 
					 var item = this.itemDS.at(i);
						 
					 if (item.adjustment_outcome != "Equal" || item.adjustment_outcome != ""){
						 //make adjustment
						 var qty = 0;
						 if (item.adjustment_outcome == "Gain"){
								 
						 	 qty = item.new_quantity - item.quantity
								 
							 income_amount += item.cost * qty
							 inventory_debit += item.cost * qty
								 
						 }
						 else if (item.adjustment_outcome == "Loss"){
							 	 
							 qty = item.quantity - item.new_quantity;	
							  
							 expense_amount += item.cost * qty
							 inventory_credit += item.cost * qty
						 }				 	 
					 
					 }
				 }//End for loop
				 
				 alert(income_amount);	 
				 //if income_amount has value then post this income journal
				 if (income_amount > 0){
				 	Add_Journal_Datasource(this.get("income_account_id"), 0, income_amount);
				 }
					 
				 //if expense_amount has value then post this expense journal
				 if (expense_amount > 0){
				 	Add_Journal_Datasource(this.get("expense_account_id"), expense_amount, 0);
				 }
					 
				 //if inventory_debit has value then post this inventory journal
				 if (inventory_debit > 0){
				 	Add_Journal_Datasource(5, inventory_debit, 0);
				 }
					 
				  //if inventory_credit has value then post this inventory journal
				 if (inventory_credit > 0){
				 	Add_Journal_Datasource(5, 0, inventory_credit);
				 }
			  		 
				 this.itemDS.sync();
				 this.journalDS.sync();			
			},

			Add_Journal_Datasource: function(account_id, dr, cr)	{
				this.journalDS.add({	   						
					account_id		: account_id,			
					dr 				: dr,	
					cr    			: cr,
					balance  		: 0,
					memo         	: this.get("memo"),					
					voucher			: this.get("voucher"),
					class_id    	: this.get("class_id"),
					budget_id		: this.get("budget_id"),
					donor_id       	: this.get("donor_id"),
					location_id     : this.get("location_id"),
					transaction_type  : "Item Adjustment",	
					people_id     	: this.get("people_id"),
					employee_id     : this.get("employee_id"),				
					invoice_id    	: this.get("invoice_id"),	
					payment_id    	: this.get("payment_id"),	
					receipt_id    	: this.get("receipt_id"),
					item_receipt_id : this.get("item_receipt_id"),
					date			: kendo.toString(this.get("date"), "yyyy-MM-dd"),
				});
			},

			Clear_Input: function(){			 
			 	//Reset View Model
				this.set("id", 0);
				this.set("expense_account_id", "");
				this.set("income_account_id", "");
				this.set("dr", 0);
				this.set("cr", 0);
				this.set("balance", 0);
				this.set("memo", "");
				this.set("date", GetToday());
				this.set("voucher", "");
				this.set("class_id", 0); 
				this.set("budget_id", 0); 
				this.set("donor_id", 0); 
				this.set("location_id", 0); 
				this.set("transaction_type",""); 
				this.set("people_id", 0); 
				this.set("employee_id", 0); 
				this.set("new_quantity", "");
		  		
				this.itemDS.read();

				var item_grid = $("#grid").data("kendoGrid");
		  		item_grid.refresh();
						  
			},




				
		});

		return{
			viewModel: viewModel
		}
	}());

	//BY DAWINE ------------------------------------------------	
	banhji.customer = (function(){
		var statementCollectionDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/statement_collection",
				  	type: "GET",
				  	dataType: "json"		  
			  	}
		  	},	  	
		  	pageSize: 10,
		  	sort: { field: "issued_date", dir: "desc" },		  		
			serverFiltering: true
		});

		var monthlySaleDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/invoices/monthly_sale",
					type: "GET",
					dataType: "json"
				}
			},					  	
			serverFiltering: true		
		});

		var outStandingInvoiceDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/invoices/outstanding_invoice",
					type: "GET",
					dataType: "json"
				}
			},	  		  	
			serverFiltering: true		
		});

		var customerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/people_api/customer_listview",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/people_api/people",
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
			serverFiltering: true,
			serverPaging: true,
			pageSize: 200,			
			schema: {
				model: {
					id: "id"
				}
			}
		});

		var customerTypeDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/people_api/people_type",
					type: "GET",
					dataType: "json"
				}
			},
			serverFiltering: true,				
			filter: { field: "parent_id", value: 1 } //customer type id is 1
		});

		var currencyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/currencies/index",
					type: "GET",
					dataType: "json"
				}
			}		
		});
		currencyDS.fetch();

		var accountReceiveablDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/accounts/account",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "account_type_id", value: 7 },
			serverFiltering: true
		});

		var revenueAccountDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/accounts/account",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "account_type_id", value: 15 },
			serverFiltering: true
		});		

		var tariffPlanDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/tariff_plans/tariff_plan",
					type: "GET",
					dataType: "json"
				}
			}
		});
		
		var exemptionDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/exemptions/exemption",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var maintenanceDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/maintenances/maintenance",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var ampereDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricity_unit_api/ampere",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var phaseDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricity_unit_api/phase",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var voltageDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricity_unit_api/voltage",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var companyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/companies/company",
					type: "GET",
					dataType: "json"
				}
			}		
		});

		var transformerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/transformer_cascading",
					type: "GET",
					dataType: "json"
				}
			},
			serverFiltering: true
		});

		var classDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/classes/class",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "type", value: "Class" },
			serverFiltering: true
		});

		var provinceDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/provinces/province",
					type: "GET",
					dataType: "json"
				}
			},
			serverFiltering: true
		});

		var districtDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/districts/district",
					type: "GET",
					dataType: "json"
				}
			},
			serverFiltering: true
		});

		var communeDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/communes/commune",
					type: "GET",
					dataType: "json"
				}
			},
			serverFiltering: true
		});

		var villageDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/villages/village",
					type: "GET",
					dataType: "json"
				}
			},
			serverFiltering: true
		});

		var viewModel = kendo.observable({
			sub_code 		: "km-KH",

			date_sorter 	: "month",
			start_date 		: new Date(),
			end_date 		: new Date(),
			totalSO 		: 0,
			totalEstimate 	: 0,
			totalOpenInvoice: 0,
			totalOverDue 	: 0,
			balance 		: kendo.toString(0, "c"),

			customer_id 	: 0,					
			people_type_id 	: 0,
			use_electricity : false,
			use_water 		: false,

			number 			: "",				
			genders			: ["ប", "ស"],		  	  
			gender			: "ប",
			
			currency_code 	: "",
			account_receiveable_id : 0,
			revenue_account_id : 0,

			company_id 		: 0,
			transformer_id 	: 0,
			class_id 		: 0,
						
			ampere_id 		: 0,
			phase_id 		: 0,
			voltage_id 		: 0,

			tariff_plan_id	: 0,
			maintenance_id  : 0,		
			exemption_id	: 0,
			
			province_id		: 0,
			district_id		: 0,
			commune_id		: 0,
			village_id		: 0,

			status 			: 1,
			registered_date	: new Date(),

			customer_no_origin : "",
			msgCustomerNo 	: "",

			customer 		: null,
			showMenu 		: false,
			isCompany 		: false,
			isExistingNumber: false,

			currentPage 	: "dashBoard",

			dashBoardLoaded : false,
			detailLoaded 	: false,
			eMeterLoaded 	: false,
			eReadingSingleLoaded  : false,
			noticeLoaded  	: false,
			statementLoaded : false,
			
			statusList 		: [
				{"id":"0", "name":"ឈប់ប្រើប្រាស់"},
				{"id":"1", "name":"កំពុងប្រើប្រាស់"},
				{"id":"2", "name":"ផ្អាក់ប្រើប្រាស់"}
			],

			monthlySaleList 		: [],
			statementCollectionList : statementCollectionDS,
			
			customerList 	: customerDS,
			customerTypeList: customerTypeDS,
			
			companyList		: companyDS,
			transformerList : transformerDS,
			classList 		: classDS,
			
			currencyList 	: currencyDS,
			accountList 	: accountReceiveablDS,
			revenueAccountList: revenueAccountDS,

			ampereList		: ampereDS,
			phaseList		: phaseDS,
			voltageList 	: voltageDS,

			tariffPlanList 	: tariffPlanDS,
			exemptionList 	: exemptionDS,
			maintenanceList : maintenanceDS,

			provinceList 	: provinceDS,
			districtList 	: districtDS,
			communeList	 	: communeDS,
			villageList 	: villageDS,
			
			goDashBoard		: function(e){
				e.preventDefault();
				this.set("currentPage", "dashBoard");				
				banhji.view.customer.showIn("#detail", banhji.view.customerDashboard);
				this.loadStatementCollection();
				this.loadMonthlySale(this.get("customer_id"));
				this.loadOutStandingInvoice(this.get("customer_id"));

				if(!this.get("dashBoardLoaded")){					
					this.loadMonthlySale(this.get("customer_id"));

					this.set("dashBoardLoaded", true);
				}				
			},
			goDetail		: function(e){
				e.preventDefault();
				this.set("currentPage", "customerDetail");
				banhji.view.customer.showIn("#detail", banhji.view.customerSingle);				
				
				if(!this.get("detailLoaded")){
					var currencyCBB = $("#currencyCBB").kendoComboBox({
						dataTextField: "code",
						dataValueField: "code",	
						template: '<span class="span1">${code}</span> <span class="span2">${country_currency}</span>',
						dataSource: banhji.customer.viewModel.currencyList,
					}).data("kendoComboBox");
					currencyCBB.list.width(300);
					
					var validator = $("#example").kendoValidator().data("kendoValidator"),
						status = $("#status");

					$("#save").click(function(e){
						e.preventDefault();
						this.checkExistingNumber();
												
			            if(validator.validate() && this.get("isExistingNumber")===false){
			            	this.edit();
			            	
				            status.text("កត់ត្រាបានសំរេច")
					            .removeClass("alert alert-error")
					            .addClass("alert alert-success");
				        }else{		        	
				            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
				                .removeClass("alert alert-success")
					            .addClass("alert alert-error");
				        }
					});

					this.set("detailLoaded", true);
				}
			},
			goEMeter		: function(e){
				e.preventDefault();
				this.set("currentPage", "eMeter");					
				banhji.view.customer.showIn("#detail", banhji.view.eMeter);				

				if(!this.get("eMeterLoaded")){
					banhji.eMeter.viewModel.pageLoad(this.get("customer_id"));

					this.set("eMeterLoaded", true);
				}					
			},
			goEReadingSingle	: function(e){
				e.preventDefault();
				this.set("currentPage", "eReadingSingle");					
				banhji.view.customer.showIn("#detail", banhji.view.eReadingSingle);

				if(!this.get("eReadingSingleLoaded")){
					banhji.eMeter.readingSingleModel.pageLoad(this.get("customer_id"));

					this.set("eReadingSingleLoaded", true);
				}				
			},
			goNotice		: function(e){
				e.preventDefault();
				this.set("currentPage", "notice");					
				banhji.view.customer.showIn("#detail", banhji.view.notice);

				if(!this.get("noticeLoaded")){					
					banhji.eMeter.noticeModel.pageLoad(this.get("customer_id"));

					this.set("noticeLoaded", true);
				}				
			},
			goStatement		: function(e){
				e.preventDefault();
				this.set("currentPage", "statement");					
				banhji.view.customer.showIn("#detail", banhji.view.statement);

				if(!this.get("statementLoaded")){					
					banhji.statement.viewModel.pageLoad(this.get("customer_id"));

					this.set("statementLoaded", true);
				}				
			},

			search 			: function(para){
				customerDS.filter(para);
			},
			setCurrent		: function(id) {
				var cus = customerDS.get(id);
				this.set("customer", cus);
				
				this.set("customer_id", cus.id);
				this.set("people_type_id", cus.people_type_id);
				this.set("use_electricity", $.parseJSON(cus.use_electricity));
				this.set("use_water", $.parseJSON(cus.use_water));
				this.set("number", cus.number);
				this.set("customer_no_origin", cus.number);
				this.set("surname", cus.surname);
				this.set("name", cus.name);				  	  
				this.set("gender", cus.gender);
				this.set("dob", new Date(cus.dob));
				this.set("pob", cus.pob);
				this.set("phone", cus.phone);
				this.set("email", cus.email);
				this.set("family_member", cus.family_member);
				this.set("memo", cus.memo);
				this.set("image_url", cus.image_url);
				this.set("card_number", cus.card_number);
				this.set("job", cus.job);
				this.set("company", cus.company);
				this.set("bank_account", cus.bank_account);
								
				this.set("zip_code", cus.zip_code);
				this.set("address", cus.address);
				this.set("address2", cus.address2);
				this.set("address3", cus.address3);
				this.set("address4", cus.address4);
				
				this.set("class_id", cus.class_id);
				this.set("transformer_id", cus.transformer_id);						
				this.set("province_id", cus.province_id);
				this.set("district_id", cus.district_id);
				this.set("commune_id", cus.commune_id);
				this.set("village_id", cus.village_id);
				this.set("latitute", cus.latitute);
				this.set("longtitute", cus.longtitute);

				this.set("ampere_id", cus.ampere_id);
				this.set("phase_id", cus.phase_id);
				this.set("voltage_id", cus.voltage_id);

				this.set("tariff_plan_id", cus.tariff_plan_id);
				this.set("maintenance_id", cus.maintenance_id);
				this.set("exemption_id", cus.exemption_id);
				//this.set("round_settle", cus.round_settle);

				this.set("status", cus.status);
				this.set("registered_date", new Date(cus.registered_date));

				this.set("currency_code", cus.currency_code);
				this.set("vat_no", cus.vat_no);
				this.set("account_receiveable_id", cus.account_receiveable_id);
				this.set("revenue_account_id", cus.revenue_account_id);
				
				this.set("company_id", cus.company_id);

				//Format by currency codev
				var subCode = this.getSubCode(cus.currency_code);				
				this.set("sub_code", subCode);				
				this.set("balance", kendo.toString(kendo.parseFloat(cus.balance), "c", subCode));
				this.set("deposit_amount", kendo.toString(kendo.parseFloat(cus.deposit_amount), "c", subCode));

				//Is company?				
				if(cus.company!==""){
					this.set("isCompany", true);
				}else{
					this.set("isCompany", false);
				}
			},
			dateSorterChange: function(){
				var value = this.get("date_sorter");
				this.setDateSorter(value);				
			},
			setDateSorter 	: function(value){
				switch(value){
				case "today":
					var today = new Date();
				  	this.set("start_date", today);
					this.set("end_date", today);
				  	break;
				case "week":
				  	var thisWeek = new Date;
					var first = thisWeek.getDate() - thisWeek.getDay(); 
					var last = first + 6;

					var firstDayOfWeek = new Date(thisWeek.setDate(first));
					var lastDayOfWeek = new Date(thisWeek.setDate(last));

					this.set("start_date", firstDayOfWeek);
					this.set("end_date", lastDayOfWeek);
				  	break;
				case "month":
					var thisMonth = new Date;				  	
					var firstDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth(), 1);
					var lastDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth() + 1, 0);

					this.set("start_date", firstDayOfMonth);
					this.set("end_date", lastDayOfMonth);
				  	break;
				case "year":
					var thisYear = new Date();
				  	var firstDayOfYear = new Date(thisYear.getFullYear(), 0, 1);
					var lastDayOfYear = new Date(thisYear.getFullYear(), 11, 31);

					this.set("start_date", firstDayOfYear);
					this.set("end_date", lastDayOfYear);
				  	break;
				default:
					//Default here					  
				}
			},

			loadStatementCollection : function(){						
				statementCollectionDS.filter({
					filters: [
						{ field: "customer_id", value: this.get("customer_id") },
						{ field: "start_date", value: kendo.toString(this.get("start_date"), "yyyy-MM-dd") },
						{ field: "end_date", value: kendo.toString(this.get("end_date"), "yyyy-MM-dd") }
					]
				});				
			},
			loadMonthlySale : function(customer_id){
				var self = this;
				var today = new Date();
				var lastDay = new Date();				
				lastDay.setMonth(lastDay.getMonth() - 6);
				

				monthlySaleDS.filter({
					filters: [
						{ field: "customer_id", value: customer_id },						
						{ field: "issued_date <=", value: kendo.toString(today, "yyyy-MM-dd") },
						{ field: "issued_date >=", value: kendo.toString(lastDay, "yyyy-MM-dd") }
					]
				});
				monthlySaleDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;    				

					if(type==="read"){
						var myList = {};
						$.each(response, function(index, data){
							var issuedDate = new Date(data.issued_date);
							var month = (issuedDate.getMonth()+1).toString() +'-'+ issuedDate.getFullYear().toString();

							if(myList[month]===undefined){
								myList[month]={"month": month, "amt": kendo.parseFloat(data.amount)};						
							}else{											
								if(myList[month].month===month){
									myList[month].amt += kendo.parseFloat(data.amount);
								}else{
									myList[month]={"month": month, "amt": kendo.parseFloat(data.amount)};
								}
							}
						});

						self.set("monthlySaleList", []);
						$.each(myList, function(index, data){
							self.get("monthlySaleList").push(data);
						});					  																
				  	}
				});					
			},
			loadOutStandingInvoice : function(customer_id){
				var self = this;							

				outStandingInvoiceDS.filter({ field: "customer_id", value: customer_id });
				outStandingInvoiceDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;    				

					if(type==="read"){
						var est=0, so=0, openInv=0, overDue=0, today = new Date();
						
					  	$.each(response, function(index, data){
					  		if(data.type==="Estimate" && data.status==="0"){
					  			est++;
					  		}else if(data.type==="SO" && data.status==="0"){
					  			so++;
					  		}else if(data.type==="Invoice" || data.type==="eInvoice" || data.type==="Notice"){					  			
				  				var dueDate = new Date(data.due_date);
				  				if(dueDate<today){
				  					overDue++;
				  				}else{
				  					openInv++;
				  				}					  							  			
					  		}
					  	});
					  	
					  	self.set("totalEstimate", est);
					  	self.set("totalSO", so);
					  	self.set("totalOpenInvoice", openInv);
					  	self.set("totalOverDue", overDue);
				  	}
				});					
			},

			loadOpenEstimate: function(){
				statementCollectionDS.data([]);

				$.each(outStandingInvoiceDS.data(), function(index, data){
					if(data.type==="Estimate"){
						statementCollectionDS.add({				
							'id'			: data.id,
							'type'			: data.type,
						    'typeName'		: "សម្រង់តម្លៃ",
							'number' 		: data.number,						   
							'issued_date' 	: data.issued_date,
							'due_date' 		: "",
							'amount'     	: data.amount,
							'rate' 			: data.rate,
				   			'sub_code'		: data.sub_code,
							'status'		: data.status
						});						
					}					
				});
			},
			loadOpenSO 		: function(){
				statementCollectionDS.data([]);

				$.each(outStandingInvoiceDS.data(), function(index, data){
					if(data.type==="SO"){
						statementCollectionDS.add({				
							'id'			: data.id,
							'type'			: data.type,
						    'typeName'		: "បញ្ជាលក់",
							'number' 		: data.number,						   
							'issued_date' 	: data.issued_date,
							'due_date' 		: "",
							'amount'     	: data.amount,
							'rate' 			: data.rate,
				   			'sub_code'		: data.sub_code,
							'status'		: data.status
						});						
					}					
				});
			},
			loadOpenInvoice : function(){
				statementCollectionDS.data([]);

				$.each(outStandingInvoiceDS.data(), function(index, data){
					if(data.type==="Invoice" || data.type==="eInvoice" || data.type==="Notice"){
						var today = new Date();
						var dueDate = new Date(data.due_date);
		  				if(dueDate>today){		  				
							var typeName = '';

							switch (data.type){
								case 'Invoice':
								  	typeName = 'វិក្កយបត្រ';				  	
								  	break;
								case 'eInvoice':
								  	typeName = 'វិក្កយបត្រអគ្គីសនី';				  	
								  	break;						
								case 'Notice':
								  	typeName = 'លិខិតរំលឹក';				  	
								  	break;
								default:
							  				  	
							}

							statementCollectionDS.add({				
								'id'			: data.id,
								'type'			: data.type,
							    'typeName'		: typeName,
								'number' 		: data.number,						   
								'issued_date' 	: data.issued_date,
								'due_date' 		: data.due_date,
								'amount'     	: data.amount,
								'rate' 			: data.rate,
				   				'sub_code'		: data.sub_code,
								'status'		: data.status
							});
						}
					}					
				});								
			},
			loadOverDueInvoice: function(){
				statementCollectionDS.data([]);

				$.each(outStandingInvoiceDS.data(), function(index, data){
					if(data.type==="Invoice" || data.type==="eInvoice" || data.type==="Notice"){						
						var today = new Date();
						var dueDate = new Date(data.due_date);
		  				if(dueDate<today){		  				
							var typeName = '';

							switch (data.type){
								case 'Invoice':
								  	typeName = 'វិក្កយបត្រ';				  	
								  	break;
								case 'eInvoice':
								  	typeName = 'វិក្កយបត្រអគ្គីសនី';				  	
								  	break;						
								case 'Notice':
								  	typeName = 'លិខិតរំលឹក';				  	
								  	break;
								default:
							  				  	
							}

							statementCollectionDS.add({				
								'id'			: data.id,
								'type'			: data.type,
							    'typeName'		: typeName,
								'number' 		: data.number,						   
								'issued_date' 	: data.issued_date,
								'due_date' 		: data.due_date,
								'amount'     	: data.amount,
								'rate' 			: data.rate,
				   				'sub_code'		: data.sub_code,
								'status'		: data.status
							});
						}						
					}					
				});								
			},

			getSubCode 		: function(code){
				var subCode = "";
				$.each(currencyDS.data(), function(index, data){
					if(data.code===code){
						subCode = data.sub_code;
						return false;						
					}
				});				
				return subCode;
			},					
			checkExistingNumber : function(){
				var customerNo = this.get("number");
				var origNo = this.get("customer_no_origin");

				if(customerNo.length>4 && customerNo!==origNo){
					$.ajax({
						type: "GET",
			            url : banhji.baseUrl + "api/people_api/check_existing_number",	            
			            data: {
							number	: customerNo				
						},
						dataType: "json",
			            success : function(response){
			            	banhji.customer.viewModel.set("isExistingNumber", response);
			                if(response){	                	
			                	banhji.customer.viewModel.set("msgCustomerNo", "លេខកូដនេះបានប្រើប្រាស់រូចហើយ");
			                }else{	                	
			                	banhji.customer.viewModel.set("msgCustomerNo", "");
			                }
			            }
			        });
		        }
			},
			peopleTypeChange: function(e){
				var id = e.data.people_type_id;
				
				if(id==5 || id==6 || id==7){
					this.set("isCompany", true);
				}else{
					this.set("isCompany", false);
					this.set("company", "");
					this.set("vat_no", "");
				}
			},						
			edit 			: function(){
				var id = this.get("customer_id");				
				var cus = customerDS.get(id);
				
				cus.set("people_type_id", this.get("people_type_id"));
				cus.set("use_electricity", this.get("use_electricity"));
				cus.set("use_water", this.get("use_water"));
				cus.set("number", this.get("number"));
				cus.set("surname", this.get("surname"));
				cus.set("name", this.get("name"));				  	  
				cus.set("gender", this.get("gender"));
				cus.set("dob", kendo.toString(this.get("dob"), 'yyyy-MM-dd'));
				cus.set("pob", this.get("pob"));
				cus.set("phone", this.get("phone"));
				cus.set("email", this.get("email"));
				cus.set("family_member", this.get("family_member"));
				cus.set("memo", this.get("memo"));
				cus.set("image_url", this.get("image_url"));
				cus.set("card_number", this.get("card_number"));
				cus.set("job", this.get("job"));
				cus.set("company", this.get("company"));
				cus.set("bank_account", this.get("bank_account"));
				
				cus.set("zip_code", this.get("zip_code"));			
				cus.set("address", this.get("address"));
				cus.set("address2", this.get("address2"));
				cus.set("address3", this.get("address3"));
				cus.set("address4", this.get("address4"));
				
				cus.set("province_id", this.get("province_id"));
				cus.set("district_id", this.get("district_id"));
				cus.set("commune_id", this.get("commune_id"));
				cus.set("village_id", this.get("village_id"));

				cus.set("latitute", this.get("latitute"));
				cus.set("longtitute", this.get("longtitute"));

				cus.set("status", this.get("status"));
				cus.set("registered_date", kendo.toString(this.get("registered_date"), 'yyyy-MM-dd'));

				cus.set("currency_code", this.get("currency_code"));
				cus.set("vat_no", this.get("vat_no"));
				cus.set("account_receiveable_id", this.get("account_receiveable_id"));
				cus.set("revenue_account_id", this.get("revenue_account_id"));			

				cus.set("class_id", this.get("class_id"));
				cus.set("company_id", this.get("company_id"));

				//Electricity Customer				
				if(this.get("use_electricity")){						
					cus.set("transformer_id", this.get("transformer_id"));				

					cus.set("ampere_id", this.get("ampere_id"));
					cus.set("phase_id", this.get("phase_id"));
					cus.set("voltage_id", this.get("voltage_id"));

					cus.set("tariff_plan_id", this.get("tariff_plan_id"));
					cus.set("maintenance_id", this.get("maintenance_id"));
					cus.set("exemption_id", this.get("exemption_id"));					
				}
				
				customerDS.sync();		
			}			
		});

		var newCustomerModel = kendo.observable({					
			people_type_id 	: 0,
			use_electricity : false,
			use_water 		: false,

			number 			: "",				
			genders			: ["ប", "ស"],		  	  
			gender			: "ប",
			
			currency_code 	: "",
			account_receiveable_id : 0,
			revenue_account_id : 0,

			company_id 		: 0,
			transformer_id 	: 0,
			class_id 		: 0,
						
			ampere_id 		: 0,
			phase_id 		: 0,
			voltage_id 		: 0,

			tariff_plan_id	: 0,
			maintenance_id  : 0,		
			exemption_id	: 0,
			
			province_id		: 0,
			district_id		: 0,
			commune_id		: 0,
			village_id		: 0,

			status 			: 1,
			registered_date	: new Date(),

			customer_no_origin : "",
			msgCustomerNo 	: "",

			customer 		: null,
			showMenu 		: false,
			isCompany 		: false,
			isExistingNumber: false,
			
			statusList 		: [
				{"id":"0", "name":"ឈប់ប្រើប្រាស់"},
				{"id":"1", "name":"កំពុងប្រើប្រាស់"},
				{"id":"2", "name":"ផ្អាក់ប្រើប្រាស់"}
			],
			
			customerList 	: customerDS,
			customerTypeList: customerTypeDS,
			
			companyList		: companyDS,
			transformerList : transformerDS,
			classList 		: classDS,
			
			currencyList 	: currencyDS,
			accountList 	: accountReceiveablDS,
			revenueAccountList: revenueAccountDS,

			ampereList		: ampereDS,
			phaseList		: phaseDS,
			voltageList 	: voltageDS,

			tariffPlanList 	: tariffPlanDS,
			exemptionList 	: exemptionDS,
			maintenanceList : maintenanceDS,

			provinceList 	: provinceDS,
			districtList 	: districtDS,
			communeList	 	: communeDS,
			villageList 	: villageDS,
			
			closeX 			: function () {
				kendo.fx($("#slide-form")).slideIn("up").play();				
				window.history.go(-1);
			},
			loadCurrencyCBB : function(){
				var currencyCBB = $("#currencyCBB").kendoComboBox({
					dataTextField: "code",
					dataValueField: "code",	
					template: '<span class="span1">${code}</span> <span class="span2">${country_currency}</span>',
					dataSource: banhji.customer.viewModel.currencyList,
				}).data("kendoComboBox");
				currencyCBB.list.width(300);
			},						
			checkExistingNumber : function(){
				var customerNo = this.get("number");
				var origNo = this.get("customer_no_origin");

				if(customerNo.length>4 && customerNo!==origNo){
					$.ajax({
						type: "GET",
			            url : banhji.baseUrl + "api/people_api/check_existing_number",	            
			            data: {
							number	: customerNo				
						},
						dataType: "json",
			            success : function(response){
			            	banhji.customer.viewModel.set("isExistingNumber", response);
			                if(response){	                	
			                	banhji.customer.viewModel.set("msgCustomerNo", "លេខកូដនេះបានប្រើប្រាស់រូចហើយ");
			                }else{	                	
			                	banhji.customer.viewModel.set("msgCustomerNo", "");
			                }
			            }
			        });
		        }
			},
			companyChange 	: function(e){												
				var self = this;				
				var company_id = this.get("company_id");
				var customerNo = this.get("number");			
				if(company_id>0 && customerNo==""){
					$.ajax({
						type: "GET",
			            url : banhji.baseUrl + "api/people_api/last_no",	            
			            data: {
							company_id	: company_id				
						},
						dataType: "json",
			            success : function(response){
			            	var lastNo = response.number;			            	
			            	var no = 0;
			            	if(lastNo!==undefined){
			            		if(lastNo.length>4){
									no = parseInt(lastNo.substr(lastNo.length-4, lastNo.length));
								}					
							}
							no++;
							var heading = e.sender._current.context.innerText;							
							var cusNo = heading + kendo.toString(no, "0000");

			            	self.set("number", cusNo);
			            }
			        });
		        }
			},
			peopleTypeChange: function(e){
				var id = e.data.people_type_id;
				
				if(id==5 || id==6 || id==7){
					this.set("isCompany", true);
				}else{
					this.set("isCompany", false);
				}
			},			
			add 			: function(){
				customerDS.add({
					people_type_id	: this.get("people_type_id"),
					use_electricity : this.get("use_electricity"),
					use_water 		: this.get("use_water"),
					number			: this.get("number"),			
					surname			: this.get("surname"),	
					name			: this.get("name"),				  	  
					gender			: this.get("gender"),	
					dob				: kendo.toString(new Date(this.get("dob")), "yyyy-MM-dd"),
					pob				: this.get("pob"),	
					phone			: this.get("phone"),	
					email			: this.get("email"),	
					
					family_member	: this.get("family_member"),	
					memo			: this.get("memo"),	
					image_url		: this.get("image_url"),			
					card_number		: this.get("card_number"),			
					job				: this.get("job"),			
					company			: this.get("company"),			
					balance			: this.get("balance"),	
					
					zip_code 		: this.get("zip_code"),			
					address			: this.get("address"),
					address2		: this.get("address2"),
					address3		: this.get("address3"),
					address4		: this.get("address4"),
					
					class_id 		: this.get("class_id"),									
					transformer_id	: this.get("transformer_id"),	
					province_id		: this.get("province_id"),	
					district_id		: this.get("district_id"),	
					commune_id		: this.get("commune_id"),	
					village_id		: this.get("village_id"),	

					latitute 		: this.get("latitute"),	
					longtitute 		: this.get("longtitute"),

					ampere_id		: this.get("ampere_id"),	
					phase_id		: this.get("phase_id"),	
					voltage_id		: this.get("voltage_id"),

					tariff_plan_id	: this.get("tariff_plan_id"),	
					maintenance_id  : this.get("maintenance_id"),			
					exemption_id	: this.get("exemption_id"),						
					
					status			: this.get("status"),							
					registered_date	: kendo.toString(new Date(this.get("registered_date")), "yyyy-MM-dd"),
					
					currency_code 	: this.get("currency_code"),
					vat_no 			: this.get("vat_no"),
					account_receiveable_id: this.get("account_receiveable_id"),
					revenue_account_id: this.get("revenue_account_id"),
					company_id 		: this.get("company_id")							
				});
				
				customerDS.sync();		
			},			
			clear			: function(){
				this.set("people_type_id", 0);
				this.set("use_electricity", false);
				this.set("use_water", false);
				this.set("number", "");			
				this.set("surname", "");	
				this.set("name", "");				  	  
				this.set("gender", "ប");	
				this.set("dob", "");
				this.set("pob", "");	
				this.set("phone", "");	
				this.set("email", "");	
				
				this.set("family_member", "");	
				this.set("memo", "");	
				this.set("image_url", "");			
				this.set("card_number", "");			
				this.set("job", "");			
				this.set("company", "");			
								
				this.set("zip_code", "");			
				this.set("address", "");
				this.set("address2", "");
				this.set("address3", "");
				this.set("address4", "");
													
				this.set("transformer_id", 0);	
				this.set("province_id", 0);	
				this.set("district_id", 0);	
				this.set("commune_id", 0);	
				this.set("village_id", 0);	

				this.set("latitute", "");	
				this.set("longtitute", "");	
				
				this.set("ampere_id", 0);	
				this.set("phase_id", 0);	
				this.set("voltage_id", 0);	
								
				this.set("tariff_plan_id", 0);	
				this.set("maintenance_id", 0);			
				this.set("exemption_id", 0);	
				this.set("round_settle", 0);	
				
				this.set("status", 1);					
				this.set("registered_date", new Date());
				
				this.set("currency_code", "");
				this.set("vat_no", "");
				this.set("account_receiveable_id", 0);
				this.set("revenue_account_id", 0);
				this.set("company_id", 0);

				this.set("isCompany", false);		
			}
		});

		return {
			viewModel: viewModel,
			newCustomerModel: newCustomerModel
		};
	}());	

	banhji.invoice = (function(){		
		var customerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "GET",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "PUT",
					dataType: "json"
				}
			},		
			schema: {
				model: {
					id: "id"
				}
			},			
			serverFiltering: true
		});			

		var currencyRateDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/currency_rates/currency_rate",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "status", value: 1 },
			serverFiltering: true		
		});
		
		var paymentTermDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/payment_terms/payment_term",
					type: "GET",
					dataType: "json"
				}
			}		
		});

		var itemDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/item_dropdown",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var vatDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/items",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "item_type_id", value: 6 },
			serverFiltering: true
		});

		var classDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/classes/class",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "type", value: "Class" },
			serverFiltering: true		
		});

		var invoiceDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
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
		  	},		  	
		  	serverFiltering : true	  	
		});

		var invoiceItemDS = new kendo.data.DataSource({
		  	transport: {		  	
			  	read: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "PUT",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	destroy: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
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
				  	id : "id"
			  	}		
		  	},
		  	serverFiltering: true	  		  	
		});

		var estimateDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
				  	dataType: "json"
			  	}
		  	},	  		  	
		  	serverFiltering : true	  	
		});

		var gdnDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
				  	dataType: "json"
			  	}
		  	},
		  	schema: {
			  	model: {
				  	id : "id"
			  	}		
		  	},		  		  	
		  	serverFiltering : true	  	
		});

		var soDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
				  	dataType: "json"
			  	}
		  	},
		  	schema: {
			  	model: {
				  	id : "id"
			  	}		
		  	},		  		  	
		  	serverFiltering : true	  	
		});

		var journalDS = new kendo.data.DataSource({
		  	transport: {	  
			    create: {
				  	url : banhji.baseUrl + "api/accounting_api/journals",
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

		
		var viewModel = kendo.observable({											
			biller				: banhji.config.userData.userId,
			company_code 		: "km-KH",
			sub_code 			: "km-KH",
			rate 				: 1,	
			
			address				: "",		  	  
			issued_date			: new Date(),
			duedate  			: "",		
			payment_term_id   	: 0,
						
			memo				: "",
			memo2 				: "",
			class_id			: "",

			estimate_id 		: 0,
			gdn_id 				: 0,
			so_id				: 0,

			vat_id				: "",			
			customer 			: null,			
											
			itemList 			: [],

			invoiceItemList 	: invoiceItemDS,
			vatList 			: vatDS,
			estimateList 		: estimateDS,
			gdnList 			: gdnDS,
			soList 				: soDS,
			paymentTermList		: paymentTermDS,						
			classList 			: classDS,
							
			pageLoad 			: function(customer_id){
				this.set("so_id", 0);
				this.set("estimate_id", 0);
				this.set("gdn_id", 0);			
		    	this.set("class_id", "");
				this.set("memo", "");
				this.set("memo2", "");
				this.set("sub_total", "");
				this.set("vat_id", "");
				this.set("vat", "");	
				this.set("total", "");

				invoiceItemDS.data([]);
				this.setNumber();
				this.setDueDate();				
				this.setItemSource();
				this.loadReferences(customer_id);				
				this.loadCustomer(customer_id);				
			},
			closeX 				: function () {
				kendo.fx($("#slide-form")).slideIn("up").play();				
				window.history.go(-1);
			},									
		    setItemSource 		: function(){
		    	var self = this;		    		    		    		    	
				itemDS.fetch(function(){
					var d = this.data();													  					  			  	
				  	$.each(d, function(index, data) {		    				    		
			    		self.itemList.push({
			    			id 		: data.id,
			    			name 	: data.item_sku +' '+ data.name	    			
			    		});
			    	});
				});				    			  	    	
		    },	    	    
		    setNumber 			: function(){
		    	var self = this;
		    	$.ajax({
					type: "GET",
					url: banhji.baseUrl + "api/invoices/last_number",			
					data: { type: "Invoice" },
					dataType: "json",
					success: function (response) {
						//var data = response.d;
						var last_no = response;		
						var no = 0;
						if(last_no.length>7){
							no = parseInt(last_no.substr(7));			
						}
						no++;

						var str_inv_no = "INV" + kendo.toString(new Date(self.get("issued_date")), "yy") + kendo.toString(new Date(self.get("issued_date")), "MM");
						var number = str_inv_no + kendo.toString(no, "00000");

						self.set("number", number);
					}
				});		    	
		    },
		    setDueDate 			: function(){
				var duedate = new Date();
				duedate.setDate(duedate.getDate()+7);
				this.set("due_date", duedate);
			},
			setRate 			: function(){
				var rate = 1;
				var companyCode = this.get("company_code");
				var customerCode = this.get("customer").currency_code;
				
		        if(companyCode!==customerCode){
		        	var companyCodeRate = this.getCurrencyRateByCode(companyCode);
		        	var customerCodeRate = this.getCurrencyRateByCode(customerCode);

		        	if(companyCodeRate>0 && customerCodeRate>0){
		        		rate = companyCodeRate/customerCodeRate;
		        	}	
		        }

		        this.set("rate", rate);
			},			
			loadReferences 		: function(customer_id){
				currencyRateDS.fetch();

				estimateDS.filter({
					filters: [
						{ field: "customer_id", value: customer_id },
						{ field: "status", value: 0 },
						{ field: "type", value: "Estimate" }
					]
				});

				gdnDS.filter({
					filters: [
						{ field: "customer_id", value: customer_id },
						{ field: "status", value: 0 },
						{ field: "type", value: "GDN" }
					]
				});

				soDS.filter({
					filters: [
						{ field: "customer_id", value: customer_id },
						{ field: "status", value: 0 },
						{ field: "type", value: "SO" }
					]
				});
			},
		    loadCustomer 		: function(id){
		    	var self = this;

		    	customerDS.filter({ field: "id", value: id });
		    	customerDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;

					if(type==="read"){
					  	var d = response[0];					  	
					  	self.set("customer", d);		  	
					  	self.set("address", d.address);					  						  	
					  	self.set("sub_code", d.currencies.sub_code);
					  	self.set("company_code", d.companies.based_currency);
					  	self.set("class_id", d.class_id);
					  	self.setRate();

					  	if(invoiceItemDS.data().length<1){
					  		self.addNewRow();
					  	}											  
				  	}			  	  			  	
				});															    			  	    	
		    },
		    loadInvoice			: function(id){			  	
			  	var self = this;
			  	
			  	this.setItemSource();			  	

			  	invoiceDS.filter({ field: "id", value: id });
			  	invoiceItemDS.filter({ field: "invoice_id", value: id });
			 			  	
			  	invoiceDS.bind("requestEnd", function(e){
			  		var response = e.response;
    				var type = e.type;

			  		if(type==="read"){
				  		var d = response[0];

				  		if(d.vat_id>0){
				  			self.set("vat_id", d.vat_id);
				  		}

				  		var t = kendo.parseFloat(d.amount)/d.rate;
				  		var v = kendo.parseFloat(d.vat)/d.rate;

					  	self.set("number", d.number);					  	
					  	self.set("total", kendo.toString(t, "c", d.sub_code));
					  	self.set("rate", d.rate);						
						self.set("vat", kendo.toString(v, "c", d.sub_code));						
						self.set("status", d.status);
						self.set("sub_code", d.sub_code);						
						self.set("address", d.address);	  	  
						self.set("issued_date", new Date(d.issued_date));
						self.set("due_date", new Date(d.due_date));
						self.set("so_id", d.so_id);			
						self.set("estimate_id", d.estimate_id);
						self.set("gdn_id", d.gdn_id);						
						self.set("payment_term_id", d.payment_term_id);
						self.set("class_id", d.class_id);			
						self.set("memo", d.memo);
						self.set("memo2", d.memo2);						

						var sub = t - v;
						self.set("sub_total", kendo.toString(sub, "c", d.sub_code));								  	

						//Status
						if(d.status==1){
							self.set("paid", true);
						}else{
							self.set("paid", false);
						}

						//Load customer
						customerDS.filter({ field: "id", value: d.customer_id });
						customerDS.bind("requestEnd", function(e){
					  		var response = e.response;
		    				var type = e.type;

					  		if(type==="read"){
						  		var d = response[0];
						  		self.set("customer", d);
						  	}
						});
						
						self.loadReferences(d.customer_id);
						self.autoIncreaseNo();
					}																		
			 	});				
			},			
			autoIncreaseNo 		: function(){
				$(".sno").each(function(index,element){                 
				   $(element).text(index + 1); 
				});
			},
			addNewRow 			: function(){				
				invoiceItemDS.add({
					'invoice_id' 	: 0,
					'item_id' 		: "",
					'description' 	: "",				
					'quantity' 		: 1,
					'unit_price' 	: 0,												
					'amount' 		: 0,
					'rate'			: this.get("rate"),
					'sub_code'		: this.get("sub_code"),
					'vat' 			: false,
					'so_id'			: 0		
				});
				this.autoIncreaseNo();			
			},
			removeRow 			: function(e){						
				var item = e.data;     
		        invoiceItemDS.remove(item);
		        this.change();
			},		
			change				: function(){
				if(invoiceItemDS.total()>0){			
					var subTotal = 0;
					var vat = 0;
					var vatAmount = 0;

					var vat_id = this.get("vat_id");			
					if(vat_id>0 || vat_id!=""){				
						var vatItem = vatDS.get(vat_id);						
						vatAmount = vatItem.price;
					}

					$.each(invoiceItemDS.data(), function(index, data) {				
						var amt = data.quantity * data.unit_price;
						subTotal += amt;

						if(data.vat && vatAmount>0){
							vat += amt * vatAmount;						
						}
			        });

			        var total = subTotal + vat;			

			        this.set("sub_total", kendo.toString(subTotal, "c", this.get("sub_code")));
			        this.set("vat", kendo.toString(vat, "c", this.get("sub_code")));			
					this.set("total", kendo.toString(total, "c", this.get("sub_code")));
					
			    	this.autoIncreaseNo();
		    	}else{
		    		this.set("sub_total", kendo.toString(0, "c", this.get("sub_code")));
			        this.set("vat", kendo.toString(0, "c", this.get("sub_code")));			
					this.set("total", kendo.toString(0, "c", this.get("sub_code")));
		    	}    	
			},
			itemChange 			: function(e){								
				var data = e.data;				
		        var rate = this.get("rate");		        
		        var item = itemDS.get(data.item_id);		 
		        		        
	    		data.set("description", item.name);
		        data.set("unit_price", item.price/rate);
		        	        
		        this.change();	                	        	
			},
			getCurrencyRateByCode 	: function(code){
				var rate = 0;			
				$.each(currencyRateDS.data(), function(index, value){	        	
		        	if(code===value.code){	        		
		        		rate = kendo.parseFloat(value.rate);
		        		return false;
		        	}	        	
		        });
				
		        return rate;
			},

			soChange 			: function(e){
				var id = e.sender._selectedValue;
				
				//Clear invoice item datasource
				if(invoiceItemDS.total()>0){
					invoiceItemDS.data([]);					
				}

				if(id>0 || id!==""){
				 	var d = soDS.get(id);			
				 	var items = d.invoice_items;

				 	$.each(items, function(index, data) {			 		
				 		invoiceItemDS.add({
							'invoice_id' 	: 0,
							'item_id' 		: data.item_id,
							'description' 	: data.description,				
							'quantity' 		: data.quantity,
							'unit_price' 	: data.unit_price,								
							'amount' 		: data.memo,
							'rate'			: data.rate,
							'sub_code'		: data.sub_code,
							'vat' 			: data.vat,
							'so_id'			: data.so_id		
						});			
				 	});

				 	this.set("estimate_id", 0);
				 	this.set("gdn_id", 0);
				 	this.set("so_id", id);			
				}

				this.change();			
			},
			estimateChange 		: function(e){				
				var id = e.sender._selectedValue;
				
				//Clear invoice item datasource
				if(invoiceItemDS.total()>0){
					invoiceItemDS.data([]);					
				}

				if(id>0 || id!==""){
				 	var d = estimateDS.get(id);			
				 	var items = d.invoice_items;

				 	$.each(items, function(index, data) {			 		
				 		invoiceItemDS.add({
							'invoice_id' 	: 0,
							'item_id' 		: data.item_id,
							'description' 	: data.description,				
							'quantity' 		: data.quantity,
							'unit_price' 	: data.unit_price,								
							'amount' 		: data.memo,
							'rate'			: data.rate,
							'sub_code'		: data.sub_code,
							'vat' 			: data.vat,
							'so_id'			: data.so_id		
						});			
				 	});

				 	this.set("estimate_id", id);
				 	this.set("gdn_id", 0);
				 	this.set("so_id", 0);				 				 				
				}

				this.change();				
			},
			gdnChange 			: function(e){
				var id = e.sender._selectedValue;
				
				//Clear invoice item datasource
				if(invoiceItemDS.total()>0){
					invoiceItemDS.data([]);					
				}

				if(id>0 || id!==""){
				 	var d = gdnDS.get(id);			
				 	var items = d.invoice_items;

				 	$.each(items, function(index, data) {			 		
				 		invoiceItemDS.add({
							'invoice_id' 	: 0,
							'item_id' 		: data.item_id,
							'description' 	: data.description,				
							'quantity' 		: data.quantity,
							'unit_price' 	: data.unit_price,								
							'amount' 		: data.memo,
							'rate'			: data.rate,
							'sub_code'		: data.sub_code,
							'vat' 			: data.vat,
							'so_id'			: data.so_id		
						});			
				 	});

				 	this.set("estimate_id", 0);
				 	this.set("gdn_id", id);
				 	this.set("so_id", 0);

				 	
				 	this.autoIncreaseNo();				
				}

				this.change();				
			},			

		    add 				: function(){
		    	var self = this;		    	
				var rate = this.get("rate");

				var t = this.get("total");
		        var tt = Number(t.replace(/[^0-9\.]+/g,""));

		        var v = this.get("vat");
		        var vv = Number(v.replace(/[^0-9\.]+/g,""));
		       
		        //Modify invoice item
		        $.each(invoiceItemDS.data() ,function(index, data){
		        	data.set("id", 0);
		        	data.set("invoice_id", 0);		        	
		        });
		       
		        //Add invoice to datasource	
		    	invoiceDS.add({
		    		'number' 			: this.get("number"),
				   	'type'				: "Invoice",				   					   				   	
				   	'amount'			: tt*rate,
				   	'rate'				: rate,
				   	'vat'				: vv*rate,
				   	'vat_id'			: this.get("vat_id"),
				   	'status' 			: 0,
				   	'sub_code'			: this.get("sub_code"),
				   	'biller' 			: this.get("biller"),
				   	'customer_id' 		: this.get("customer").id,			   	
				   	'address' 			: this.get("address"),
				   	'issued_date' 		: kendo.toString(this.get("issued_date"),"yyyy-MM-dd"),
				   	'due_date' 			: kendo.toString(this.get("due_date"),"yyyy-MM-dd"),
				   	'so_id' 			: this.get("so_id"),
				   	'estimate_id' 		: this.get("estimate_id"),
					'gdn_id' 			: this.get("gdn_id"),
					'payment_term_id'	: this.get("payment_term_id"),			   	
				   	'class_id' 			: this.get("class_id"),
				   	'memo' 				: this.get("memo"),
				   	'memo2'				: this.get("memo2"),
				   	'company_id'		: this.get("customer").company_id,
				   	
				   	'invoice_items'		: invoiceItemDS.data()
		    	});

		    	invoiceDS.sync();
		    	
		    	this.updateSO();		    		   	
		    	this.updateEstimate();
			    this.updateGDN();
			    this.updateCustomerBalance();

			    invoiceDS.bind("requestEnd", function(e){
			    	var response = e.response;
    				var type = e.type;

    				if(type==="create"){
    					var invoice_id = response.invoice_id;
    					self.addJournal(invoice_id);
    				}
			    });	    		    	
		    },
		    update 				: function(id){
		    	var d = invoiceDS.get(id);
		    	var rate = this.get("rate");

		    	var t = this.get("total");
		        var tt = Number(t.replace(/[^0-9\.]+/g,""));

		        var v = this.get("vat");
		        var vv = Number(v.replace(/[^0-9\.]+/g,""));

		    	//Update customer balance
		    	var oldBalance = kendo.parseFloat(d.amount);
		    	var cus = customerDS.get(d.customer_id);
		    	var cusBalance = kendo.parseFloat(cus.balance);
		    	var newBalance = (cusBalance - oldBalance) + tt;
		    	cus.set("balance", newBalance);
			  					   				   	
			   	d.set("amount", tt*rate);
			   	d.set("vat", vv*rate);			   	
			   	d.set("vat_id",  this.get("vat_id"));				  	  
				d.set("issued_date", kendo.toString(new Date(this.get("issued_date")),"yyyy-MM-dd"));
				d.set("due_date", kendo.toString(new Date(this.get("due_date")),"yyyy-MM-dd"));
				d.set("address", this.get("address"));	
				d.set("so_id", this.get("so_id"));
				d.set("estimate_id", this.get("estimate_id"));
				d.set("gdn_id", this.get("gdn_id"));
				d.set("payment_term_id", this.get("payment_term_id"));
				d.set("class_id", this.get("class_id"));			
				d.set("memo", this.get("memo"));
				d.set("memo2", this.get("memo2"));				

				//Adding invoice id to invoice item
		        $.each(invoiceItemDS.data() ,function(index, data){
		        	data.set("invoice_id", id);
		        });
				
				customerDS.sync();
				invoiceDS.sync();
				invoiceItemDS.sync();						
		    },	    	  
		    addJournal 			: function(invoice_id){				
				var journalEntries = [];		
				
				var saleList = {};			
				var inventoryList = {};
				var cogsList = {};
				var witdrawList = {};
				var depositAmount = 0;
				var rate = this.get("rate");
				
				var self = this;
				$.each(invoiceItemDS.data(), function(index, data){								
					var item = itemDS.get(data.item_id);
					var amt = data.quantity*data.unit_price;						

					//Add sale list
					var incomeID = kendo.parseInt(item.income_account_id);											
					if(incomeID>0){
						if(saleList[incomeID]===undefined){
							saleList[incomeID]={"id": incomeID, "amt": amt};						
						}else{											
							if(saleList[incomeID].id===incomeID){
								saleList[incomeID].amt += amt;
							}else{
								saleList[incomeID]={"id": incomeID, "amt": amt};
							}
						}
					}								

					switch(kendo.parseInt(item.item_type_id)){		        
						case 1: //Inventory
						
							//Add cogs list
							var itemCost = data.quantity*item.cost;
							var cogsID = kendo.parseInt(item.cogs_account_id);
							if(cogsList[cogsID]===undefined){
								cogsList[cogsID]={"id": cogsID, "amt": itemCost};						
							}else{											
								if(cogsList[cogsID].id===cogsID){
									cogsList[cogsID].amt += itemCost;
								}else{
									cogsList[cogsID]={"id": cogsID, "amt": itemCost};
								}
							}						

							//Add inventory list
							var inventoryID = kendo.parseInt(item.general_account_id);
							if(inventoryList[inventoryID]===undefined){
								inventoryList[inventoryID]={"id": inventoryID, "amt": itemCost};						
							}else{											
								if(inventoryList[inventoryID].id===inventoryID){
									inventoryList[inventoryID].amt += itemCost;
								}else{
									inventoryList[inventoryID]={"id": inventoryID, "amt": itemCost};
								}
							}										

						  	break;
						case 5: //Customer Deposit
							depositAmount += amt;
							var depositID = kendo.parseInt(item.general_account_id);

							if(amt>0){ //Deposit														
								if(saleList[depositID]===undefined){
									saleList[depositID]={"id": depositID, "amt": amt};						
								}else{											
									if(saleList[depositID].id===depositID){
										saleList[depositID].amt += amt;
									}else{
										saleList[depositID]={"id": depositID, "amt": amt};
									}
								}																			
							}else{ //Witdraw												
								if(witdrawList[depositID]===undefined){
									witdrawList[depositID]={"id": depositID, "amt": amt*-1};						
								}else{											
									if(witdrawList[depositID].id===depositID){
										witdrawList[depositID].amt += (amt*-1);
									}else{
										witdrawList[depositID]={"id": depositID, "amt": amt*-1};
									}
								}														
							}												

						  	break;					
						default:
					  	//default here
					} //End Swtich
				});//End Foreach Loop

				//VAT
				var vatID = this.get("vat_id");			
				if(vatID>0 || vatID!==""){
					var vats = vatDS.get(vatID);
					var vatOutID = vats.income_account_id;
					
					if(vatOutID>0){
						var vatAmt = kendo.parseFloat(this.get("vat"))*rate;
						if(saleList[vatOutID]===undefined){
							saleList[vatOutID]={"id": vatOutID, "amt": vatAmt};						
						}else{											
							if(saleList[vatOutID].id===vatOutID){
								saleList[vatOutID].amt += vatAmt;
							}else{
								saleList[vatOutID]={"id": vatOutID, "amt": vatAmt};
							}
						}
					}
				}			
				
				//Sale list	to journal		
				if(!jQuery.isEmptyObject(saleList)){								
					//Sum cash
					var cash = 0;				
					$.each(saleList, function(index, value){					
						cash += value.amt;					
					});				

					//A/R on Dr							
					journalEntries.push({
				 		account_id 	: this.get("customer").account_receiveable_id,	 		
				 		dr 			: cash*rate, 
				 		cr 			: 0,
				 		class_id  	: this.get("class_id"),
				 		memo 		: this.get("memo"),
				 		exchange_rate: rate,
					 	main 		: 0	 		
					});

					//Sale accounts on Cr
					$.each(saleList, function(index, value){
						journalEntries.push({
					 		account_id 	: value.id,	 		
					 		dr 			: 0, 
					 		cr 			: value.amt*rate,
					 		class_id  	: self.get("class_id"),
					 		memo 		: self.get("memo"),
					 		exchange_rate: rate,
						 	main 		: 0	 		
						});
					});
				}

				//Inventory to journal
				//COGS on Dr 			
				if(!jQuery.isEmptyObject(cogsList)){							
					$.each(cogsList, function(index, value){				
						journalEntries.push({
					 		account_id 	: value.id,	 		
					 		dr 			: value.amt*rate, 
					 		cr 			: 0,
					 		class_id  	: self.get("class_id"),
					 		memo 		: self.get("memo"),
					 		exchange_rate: rate,
						 	main 		: 0	 		
						});	
					});							
				}
				//Inventory on Cr
				if(!jQuery.isEmptyObject(inventoryList)){
					$.each(inventoryList, function(index, value){					
						journalEntries.push({
					 		account_id 	: value.id,	 		
					 		dr 			: 0, 
					 		cr 			: value.amt*rate,
					 		class_id  	: self.get("class_id"),
					 		memo 		: self.get("memo"),
					 		exchange_rate: rate,
						 	main 		: 0	 		
						});
					});
				}
				
				//Witdraw to journal
				if(!jQuery.isEmptyObject(witdrawList)){
					//Deposit on Dr
					$.each(witdrawList, function(index, value){
						journalEntries.push({
					 		account_id 	: value.id,	 		
					 		dr 			: value.amt*rate, 
					 		cr 			: 0,
					 		class_id  	: self.get("class_id"),
					 		memo 		: self.get("memo"),
					 		exchange_rate: rate,
						 	main 		: 0	 		
						});
					});

					var wCash = 0;
					$.each(witdrawList, function(index, value){					
						wCash += value.amt;
					});

					//Cash on Cr							
					journalEntries.push({
				 		account_id 	: this.get("cash_account_id"),	 		
				 		dr 			: 0, 
				 		cr 			: wCash*rate,
				 		class_id  	: this.get("class_id"),
				 		memo 		: this.get("memo"),
				 		exchange_rate: rate,
					 	main 		: 0	 		
					});				
				}
				//Calcualte customer deposit
				if(depositAmount>0){				
					var deposit = kendo.parseFloat(this.get("customer").deposit_amount) + kendo.parseFloat(depositAmount);
					this.updateCustomerDeposit(deposit);
				}
				
				//Add journal to datasource
				journalDS.add({
					company_id: banhji.config.userData.company,
					vendor_id: 0,
					people_id: this.get("customer").id,
					employee_id: banhji.config.userData.userId,
					payment_id: 0,
					transaction_type: "Invoice",
					payment_method: "cash",
					check_no: "",
					memo: "វិក្កយបត្រ",
					date: kendo.toString(this.get("issued_date"), "yyyy-MM-dd"),
					//due_date: kendo.toString(this.dateDue, "yyyy-MM-dd"),
					// amount_billed: 0,
					// amount_due: 0,
					// amount_paid: 0,
					voucher: "",
					number: "",
					class_id: this.get("class_id"),
					status: 1,
					journalEntries: journalEntries,
					inJournal: 1			 		 		
			 	});
			 			 	
			 	journalDS.sync();
				this.clear();	 	
			},				
			updateSO		: function(){
				var id = this.get("so_id");
				
				if(id>0){
					var d = soDS.get(id);
					d.set("status", 1);
					soDS.sync();
				}								
			},
			updateEstimate		: function(){
				var id = this.get("estimate_id");
				
				if(id>0){
					var d = estimateDS.get(id);
					d.set("status", 1);
					estimateDS.sync();
				}								
			},
			updateGDN			: function(){
				var id = this.get("gdn_id");
				
				if(id>0){
					var d = gdnDS.get(id);
					d.set("status", 1);
					gdnDS.sync();
				}								
			},
			updateCustomerDeposit : function(amount){				
				var customer_id = this.get("customer").id;				
				$.ajax({
					type: "PUT",
					url: banhji.baseUrl + "api/people_api/deposit",			
					data: { id: customer_id, amount: amount },
					dataType: "json",
					success: function (response) {
						//var data = response.d;			  
					}
				});								
			},
			updateCustomerBalance: function(){
				var cus = customerDS.get(this.get("customer").id);
				var t = this.get("total");
		        var tt = Number(t.replace(/[^0-9\.]+/g,""));		        

				var balance = kendo.parseFloat(cus.balance) + tt;
				cus.set("balance", balance);

				customerDS.sync();
			},
		    clear 				: function(){
		    	this.setNumber();		    	
		    	this.set("so_id", 0);
				this.set("estimate_id", 0);
				this.set("gdn_id", 0);			
		    	this.set("class_id", "");
				this.set("memo", "");
				this.set("memo2", "");
				this.set("sub_total", "");
				this.set("vat_id", "");
				this.set("vat", "");	
				this.set("total", "");
				
				//Remove datasources
				invoiceDS.data([]);				
				invoiceItemDS.data([]);
				journalDS.data([]);				
		    }
		});
		
		return {
			viewModel 		: viewModel
		};	
	}());

	banhji.receipt = (function(){
		var customerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "GET",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "PUT",
					dataType: "json"
				}
			},		
			schema: {
				model: {
					id: "id"
				}
			},			
			serverFiltering: true
		});			

		var currencyRateDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/currency_rates/currency_rate",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "status", value: 1 },
			serverFiltering: true		
		});

		var cashAccountDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/accounts/account",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "account_type_id", value: 6 },
			serverFiltering: true
		});
	
		var paymentMethodDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/payment_methods/payment_method",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var itemDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/item_dropdown",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var vatDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/items",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "item_type_id", value: 6 },
			serverFiltering: true
		});

		var classDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/classes/class",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "type", value: "Class" },
			serverFiltering: true		
		});

		var invoiceDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
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
		  	},		  	
		  	serverFiltering : true	  	
		});

		var invoiceItemDS = new kendo.data.DataSource({
		  	transport: {		  	
			  	read: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "PUT",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	destroy: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
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
				  	id : "id"
			  	}		
		  	},
		  	serverFiltering: true	  		  	
		});

		var estimateDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
				  	dataType: "json"
			  	}
		  	},	  		  	
		  	serverFiltering : true	  	
		});

		var gdnDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
				  	dataType: "json"
			  	}
		  	},
		  	schema: {
			  	model: {
				  	id : "id"
			  	}		
		  	},		  		  	
		  	serverFiltering : true	  	
		});

		var soDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
				  	dataType: "json"
			  	}
		  	},
		  	schema: {
			  	model: {
				  	id : "id"
			  	}		
		  	},		  		  	
		  	serverFiltering : true	  	
		});

		var journalDS = new kendo.data.DataSource({
		  	transport: {	  
			    create: {
				  	url : banhji.baseUrl + "api/accounting_api/journals",
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

		var viewModel = kendo.observable({								
			biller				: banhji.config.userData.userId,
			sub_code 			: "km-KH",
			company_code 		: "km-KH",
			rate 				: 1,	
			
			address				: "",		  	  
			issued_date			: new Date(),		
			payment_method_id   : 1,
			cash_account_id 	: "",
			check_no 			: "",
			memo				: "",
			memo2 				: "",
			class_id			: "",		
			estimate_id 		: 0,
			gdn_id 				: 0,
			so_id				: 0,	
			vat_id				: "",						    
						
			itemList 			: [],

			invoiceItemList 	: invoiceItemDS,
			vatList 			: vatDS,
			estimateList 		: estimateDS,
			gdnList 			: gdnDS,
			soList 				: soDS,
			paymentMethodList	: paymentMethodDS,
			cashAccountList 	: cashAccountDS,			
			classList 			: classDS,
							
			pageLoad 			: function(customer_id){
				this.set("so_id", 0);
				this.set("estimate_id", 0);
				this.set("gdn_id", 0);			
		    	this.set("class_id", "");
		    	this.set("check_no", "");
				this.set("memo", "");
				this.set("memo2", "");
				this.set("sub_total", "");
				this.set("vat_id", "");
				this.set("vat", "");	
				this.set("total", "");

				invoiceItemDS.data([]);
				this.setNumber();				
				this.setItemSource();
				this.loadReferences(customer_id);				
				this.loadCustomer(customer_id);			
				this.addNewRow();				
			},
			closeX 				: function(){
				kendo.fx($("#slide-form")).slideIn("up").play();				
				window.history.go(-1);
			},							
		    setItemSource 		: function(){
		    	var self = this;	    		    	
				itemDS.fetch(function(){
				  	var d = this.data();			  	
				  	$.each(d, function(index, data) {		    				    		
			    		self.itemList.push({
			    			id 		: data.id,
			    			name 	: data.item_sku +' '+ data.name	    			
			    		});
			    	});
				});				    			  	    	
		    },	    	    
		    setNumber 			: function(){
		    	var self = this;
		    	$.ajax({
					type: "GET",
					url: banhji.baseUrl + "api/invoices/last_number",			
					data: { type: "Receipt" },
					dataType: "json",
					success: function (response) {
						//var data = response.d;
						var last_no = response;		
						var no = 0;
						if(last_no.length>6){
							no = parseInt(last_no.substr(6));			
						}
						no++;

						var str_inv_no = "SR" + kendo.toString(new Date(self.get("issued_date")), "yy") + kendo.toString(new Date(self.get("issued_date")), "MM");
						var number = str_inv_no + kendo.toString(no, "00000");

						self.set("number", number);
					}
				});		    	
		    },
		    setRate 			: function(){
				var rate = 1;
				var companyCode = this.get("company_code");
				var customerCode = this.get("customer").currency_code;
				
		        if(companyCode!==customerCode){
		        	var companyCodeRate = this.getCurrencyRateByCode(companyCode);
		        	var customerCodeRate = this.getCurrencyRateByCode(customerCode);

		        	if(companyCodeRate>0 && customerCodeRate>0){
		        		rate = companyCodeRate/customerCodeRate;
		        	}	
		        }

		        this.set("rate", rate);
			},		    
			loadReferences 		: function(customer_id){
				currencyRateDS.fetch();

				estimateDS.filter({
					filters: [
						{ field: "customer_id", value: customer_id },
						{ field: "status", value: 0 },
						{ field: "type", value: "Estimate" }
					]
				});

				gdnDS.filter({
					filters: [
						{ field: "customer_id", value: customer_id },
						{ field: "status", value: 0 },
						{ field: "type", value: "GDN" }
					]
				});

				soDS.filter({
					filters: [
						{ field: "customer_id", value: customer_id },
						{ field: "status", value: 0 },
						{ field: "type", value: "SO" }
					]
				});
			},
		    loadCustomer 		: function(id){
		    	var self = this;
				
		    	customerDS.filter({ field: "id", value: id });
		    	customerDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;

					if(type==="read"){
					  	var d = response[0];					  	
					  	self.set("customer", d);		  	
					  	self.set("address", d.address);
					  	self.set("sub_code", d.currencies.sub_code);
					  	self.set("company_code", d.companies.based_currency);
					  	self.set("class_id", d.class_id);
					  	self.setRate();

					  	if(invoiceItemDS.data().length<1){
					  		self.addNewRow();
					  	}
				  	}			  	  			  	
				});															    			  	    	
		    },
		    loadInvoice			: function(id){			  	
			  	var self = this;			  					
			  	this.setItemSource();

			  	invoiceDS.filter({ field: "id", value: id });
			  	invoiceItemDS.filter({ field: "invoice_id", value: id });
			 			  	
			  	invoiceDS.bind("requestEnd", function(e){
			  		var response = e.response;
    				var type = e.type;

			  		if(type==="read"){
				  		var d = response[0];

				  		if(d.vat_id>0){
				  			self.set("vat_id", d.vat_id);
				  		}

				  		var t = kendo.parseFloat(d.amount)/d.rate;
				  		var v = kendo.parseFloat(d.vat)/d.rate;
				  		
					  	self.set("number", d.number);
					  	self.set("vat", kendo.toString(v, "c", d.sub_code));
					  	self.set("total", kendo.toString(t, "c", d.sub_code));				
						self.set("status", d.status);							  	  
						self.set("issued_date", new Date(d.issued_date));
						self.set("payment_date", new Date(d.payment_date));
						self.set("address", d.address);
						self.set("so_id", d.so_id);			
						self.set("estimate_id", d.estimate_id);
						self.set("gdn_id", d.gdn_id);
						self.set("check_no", d.check_no);						
						self.set("payment_method_id", d.payment_method_id);
						self.set("cash_account_id", d.cash_account_id);
						self.set("class_id", d.class_id);			
						self.set("memo", d.memo);
						self.set("memo2", d.memo2);
						
						var sub = t - v;
						self.set("sub_total", kendo.toString(sub, "c", d.sub_code));						

						//Load customer
						customerDS.filter({ field: "id", value: d.customer_id });
						customerDS.bind("requestEnd", function(e){
					  		var response = e.response;
		    				var type = e.type;

					  		if(type==="read"){
						  		var d = response[0];
						  		self.set("customer", d);
						  	}
						});
						
						self.loadReferences(d.customer_id);
						self.autoIncreaseNo();
					}																		
			 	});				
			},			
			autoIncreaseNo 		: function(){
				$(".sno").each(function(index,element){                 
				   $(element).text(index + 1); 
				});
			},
			addNewRow 			: function(){
				invoiceItemDS.add({
					'invoice_id' 	: 0,
					'item_id' 		: "",
					'description' 	: "",				
					'quantity' 		: 1,
					'unit_price' 	: 0,								
					'amount' 		: 0,
					'rate'			: this.get("rate"),
					'sub_code'		: this.get("sub_code"),
					'vat' 			: false,
					'so_id'			: 0		
				});
				this.autoIncreaseNo();			
			},
			removeRow 			: function(e){				
				var item = e.data;     
		        invoiceItemDS.remove(item);
		        this.change();
			},		
			change				: function(){
				if(invoiceItemDS.total()>0){			
					var subTotal = 0;
					var vat = 0;
					var vatAmount = 0;

					var vat_id = this.get("vat_id");			
					if(vat_id>0 || vat_id!=""){				
						var vatItem = vatDS.get(vat_id);
						vatAmount = vatItem.price;
					}

					$.each(invoiceItemDS.data(), function(index, data) {				
						var amt = data.quantity * data.unit_price;
						subTotal += amt;

						if(data.vat && vatAmount>0){
							vat += amt * vatAmount;						
						}
			        });

			        var total = subTotal + vat;			

			        this.set("sub_total", kendo.toString(subTotal, "c", this.get("sub_code")));
			        this.set("vat", kendo.toString(vat, "c", this.get("sub_code")));			
					this.set("total", kendo.toString(total, "c", this.get("sub_code")));
					
			    	this.autoIncreaseNo();
		    	}else{
		    		this.set("sub_total", kendo.toString(0, "c", this.get("sub_code")));
			        this.set("vat", kendo.toString(0, "c", this.get("sub_code")));			
					this.set("total", kendo.toString(0, "c", this.get("sub_code")));
		    	}    	
			},
			itemChange 			: function(e){								
				var data = e.data;				
		        var rate = this.get("rate");		        
		        var item = itemDS.get(data.item_id);		 
		        		        
	    		data.set("description", item.name);
		        data.set("unit_price", item.price/rate);
		        	        
		        this.change();	                	        	
			},
			getCurrencyRateByCode 	: function(code){
				var rate = 0;			
				$.each(currencyRateDS.data(), function(index, value){	        	
		        	if(code===value.code){	        		
		        		rate = value.rate;
		        		return false;
		        	}	        	
		        });
				
		        return kendo.parseFloat(rate);
			},

			soChange 			: function(e){
				var id = e.data.so_id;
				
				//Clear invoice item datasource
				if(invoiceItemDS.total()>0){
					invoiceItemDS.data([]);					
				}

				if(id>0 || id!=""){
				 	var d = soDS.get(id);			
				 	var items = d.invoice_items;

				 	$.each(items, function(index, data) {			 		
				 		invoiceItemDS.add({
							'invoice_id' 	: 0,
							'item_id' 		: data.item_id,
							'description' 	: data.description,				
							'quantity' 		: data.quantity,
							'unit_price' 	: data.unit_price,								
							'amount' 		: data.memo,
							'rate'			: data.rate,
							'sub_code'		: data.sub_code,
							'vat' 			: data.vat,
							'so_id'			: data.so_id		
						});			
				 	});

				 	this.set("estimate_id", 0);
				 	this.set("gdn_id", 0);
				 	this.set("so_id", id);			
				}

				this.change();			
			},
			estimateChange 		: function(e){				
				var id = e.data.estimate_id;
				
				//Clear invoice item datasource
				if(invoiceItemDS.total()>0){
					invoiceItemDS.data([]);					
				}

				if(id>0 || id!=""){
				 	var d = estimateDS.get(id);			
				 	var items = d.invoice_items;

				 	$.each(items, function(index, data) {			 		
				 		invoiceItemDS.add({
							'invoice_id' 	: 0,
							'item_id' 		: data.item_id,
							'description' 	: data.description,				
							'quantity' 		: data.quantity,
							'unit_price' 	: data.unit_price,								
							'amount' 		: data.memo,
							'rate'			: data.rate,
							'sub_code'		: data.sub_code,
							'vat' 			: data.vat,
							'so_id'			: data.so_id		
						});			
				 	});

				 	this.set("estimate_id", id);
				 	this.set("gdn_id", 0);
				 	this.set("so_id", 0);				 				 				
				}

				this.change();				
			},
			gdnChange 			: function(e){
				var id = e.data.gdn_id;
				
				//Clear invoice item datasource
				if(invoiceItemDS.total()>0){
					invoiceItemDS.data([]);					
				}

				if(id>0 || id!=""){
				 	var d = gdnDS.get(id);			
				 	var items = d.invoice_items;

				 	$.each(items, function(index, data) {			 		
				 		invoiceItemDS.add({
							'invoice_id' 	: 0,
							'item_id' 		: data.item_id,
							'description' 	: data.description,				
							'quantity' 		: data.quantity,
							'unit_price' 	: data.unit_price,								
							'amount' 		: data.memo,
							'rate'			: data.rate,
							'sub_code'		: data.sub_code,
							'vat' 			: data.vat,
							'so_id'			: data.so_id		
						});			
				 	});

				 	this.set("estimate_id", 0);
				 	this.set("gdn_id", id);
				 	this.set("so_id", 0);

				 	
				 	this.autoIncreaseNo();				
				}

				this.change();				
			},
			
		    add 				: function(){
		    	var self = this;
		    	var rate = this.get("rate");

		    	var t = this.get("total");
		        var tt = Number(t.replace(/[^0-9\.]+/g,""));

		        var v = this.get("vat");
		        var vv = Number(v.replace(/[^0-9\.]+/g,""));

		        this.set("customer_rate_to_company_rate", rate);

		        //Modify invoice item
		        $.each(invoiceItemDS.data() ,function(index, data){
		        	data.set("id", 0);
		        	data.set("invoice_id", 0);		        	
		        });

		        //Add invoice to datasource	
		    	invoiceDS.add({
		    		'number' 			: this.get("number"),
				   	'type'				: "Receipt",				   				   	
				   	'amount'			: tt*rate,
				   	'rate'				: rate,				   	
				   	'vat'				: vv*rate,
				   	'vat_id'			: this.get("vat_id"),
				   	'status' 			: 0,
				   	'sub_code'			: this.get("sub_code"),				   	
				   	'issued_date' 		: kendo.toString(this.get("issued_date"),"yyyy-MM-dd"),
				   	'payment_date' 		: kendo.toString(this.get("payment_date"),"yyyy-MM-dd"),
				   	'address' 			: this.get("address"),
				   	'biller' 			: this.get("biller"),
				   	'customer_id' 		: this.get("customer").id,
				   	'so_id' 			: this.get("so_id"),
				   	'estimate_id' 		: this.get("estimate_id"),
					'gdn_id' 			: this.get("gdn_id"),
					'check_no' 			: this.get("check_no"),
					'payment_method_id'	: this.get("payment_method_id"),					
					'cash_account_id'	: this.get("cash_account_id"),				   	
				   	'class_id' 			: this.get("class_id"),
				   	'memo' 				: this.get("memo"),
				   	'memo2'				: this.get("memo2"),
				   	'company_id'		: this.get("customer").company_id,
				   	
				   	'invoice_items'		: invoiceItemDS.data()
		    	});
		    				
		    	invoiceDS.sync();
		    	
		    	this.updateSO();			    		    	
		    	this.updateEstimate();
			    this.updateGDN();

			    invoiceDS.bind("requestEnd", function(e){
			    	var response = e.response;
    				var type = e.type;

    				if(type==="create"){
    					var invoice_id = response.invoice_id;
    					self.addJournal(invoice_id);
    				}
			    });	    		    	
		    },
		    update 				: function(id){
		    	var d = invoiceDS.get(id);

		    	var t = this.get("total");
		        var tt = Number(t.replace(/[^0-9\.]+/g,""));

		        var v = this.get("vat");
		        var vv = Number(v.replace(/[^0-9\.]+/g,""));
			  					   				   	
			   	d.set("amount", tt*rate);
			   	d.set("vat", vv*rate);			   	
			   	d.set("vat_id",  this.get("vat_id"));					  	  
				d.set("issued_date", kendo.toString(new Date(this.get("issued_date")),"yyyy-MM-dd"));
				d.set("payment_date", kendo.toString(new Date(this.get("payment_date")),"yyyy-MM-dd"));
				d.set("address", this.get("address"));
				d.set("so_id", this.get("so_id"));
				d.set("estimate_id", this.get("estimate_id"));
				d.set("gdn_id", this.get("gdn_id"));
				d.set("check_no", this.get("check_no"));
				d.set("payment_method_id", this.get("payment_method_id"));
				d.set("cash_account_id", this.get("cash_account_id"));			
				d.set("class_id", this.get("class_id"));
				d.set("memo", this.get("memo"));
				d.set("memo2", this.get("memo2"));
				
				//Adding invoice id to invoice item
		        $.each(invoiceItemDS.data() ,function(index, data){
		        	data.set("invoice_id", id);
		        });				
				
				invoiceDS.sync();
				invoiceItemDS.sync();						
		    },	    	  
		    addJournal 			: function(invoice_id){				
				var journalEntries = [];		
				
				var saleList = {};			
				var inventoryList = {};
				var cogsList = {};
				var witdrawList = {};
				var depositAmount = 0;
				var rate = this.get("rate");							

				var self = this;
				$.each(invoiceItemDS.data(), function(index, data){								
					var item = itemDS.get(data.item_id);
					var amt = data.quantity*data.unit_price;						

					//Add sale list
					var incomeID = kendo.parseInt(item.income_account_id);											
					if(incomeID>0){
						if(saleList[incomeID]===undefined){
							saleList[incomeID]={"id": incomeID, "amt": amt};						
						}else{											
							if(saleList[incomeID].id===incomeID){
								saleList[incomeID].amt += amt;
							}else{
								saleList[incomeID]={"id": incomeID, "amt": amt};
							}
						}
					}								

					switch(kendo.parseInt(item.item_type_id)){		        
						case 1: //Inventory
							
							//Add cogs list
							var itemCost = data.quantity*item.cost;
							var cogsID = kendo.parseInt(item.cogs_account_id);
							if(cogsList[cogsID]===undefined){
								cogsList[cogsID]={"id": cogsID, "amt": itemCost};						
							}else{											
								if(cogsList[cogsID].id===cogsID){
									cogsList[cogsID].amt += itemCost;
								}else{
									cogsList[cogsID]={"id": cogsID, "amt": itemCost};
								}
							}						

							//Add inventory list
							var inventoryID = kendo.parseInt(item.general_account_id);
							if(inventoryList[inventoryID]===undefined){
								inventoryList[inventoryID]={"id": inventoryID, "amt": itemCost};						
							}else{											
								if(inventoryList[inventoryID].id===inventoryID){
									inventoryList[inventoryID].amt += itemCost;
								}else{
									inventoryList[inventoryID]={"id": inventoryID, "amt": itemCost};
								}
							}										

						  	break;
						case 5: //Customer Deposit
							depositAmount += amt;
							var depositID = kendo.parseInt(item.general_account_id);

							if(amt>0){ //Deposit														
								if(saleList[depositID]===undefined){
									saleList[depositID]={"id": depositID, "amt": amt};						
								}else{											
									if(saleList[depositID].id===depositID){
										saleList[depositID].amt += amt;
									}else{
										saleList[depositID]={"id": depositID, "amt": amt};
									}
								}																			
							}else{ //Witdraw												
								if(witdrawList[depositID]===undefined){
									witdrawList[depositID]={"id": depositID, "amt": amt*-1};						
								}else{											
									if(witdrawList[depositID].id===depositID){
										witdrawList[depositID].amt += (amt*-1);
									}else{
										witdrawList[depositID]={"id": depositID, "amt": amt*-1};
									}
								}														
							}												

						  	break;					
						default:
					  	//default here
					} //End Swtich
				});//End Foreach Loop

				//VAT
				var vatID = this.get("vat_id");			
				if(vatID>0 || vatID!==""){
					var vats = vatDS.get(vatID);
					var vatOutID = vats.income_account_id;
					
					if(vatOutID>0){
						var vatAmt = kendo.parseFloat(this.get("vat"))*rate;
						if(saleList[vatOutID]===undefined){
							saleList[vatOutID]={"id": vatOutID, "amt": vatAmt};						
						}else{											
							if(saleList[vatOutID].id===vatOutID){
								saleList[vatOutID].amt += vatAmt;
							}else{
								saleList[vatOutID]={"id": vatOutID, "amt": vatAmt};
							}
						}
					}
				}			
				
				//Sale list	to journal		
				if(!jQuery.isEmptyObject(saleList)){								
					//Sum cash
					var cash = 0;				
					$.each(saleList, function(index, value){					
						cash += value.amt;					
					});				

					//Cash on Dr							
					journalEntries.push({
				 		account_id 	: this.get("cash_account_id"),	 		
				 		dr 			: cash*rate, 
				 		cr 			: 0,
				 		class_id  	: this.get("class_id"),
				 		memo 		: this.get("memo"),
				 		exchange_rate: rate,
					 	main: 0 	 		 		
					});

					//Sale accounts on Cr
					$.each(saleList, function(index, value){
						journalEntries.push({
					 		account_id 	: value.id,	 		
					 		dr 			: 0, 
					 		cr 			: value.amt*rate,
					 		class_id  	: self.get("class_id"),
					 		memo 		: self.get("memo"),
					 		exchange_rate: rate,
						 	main 		: 0 	 		 		
						});
					});
				}

				//Inventory to journal
				//COGS on Dr 			
				if(!jQuery.isEmptyObject(cogsList)){							
					$.each(cogsList, function(index, value){				
						journalEntries.push({
					 		account_id 	: value.id,	 		
					 		dr 			: value.amt*rate, 
					 		cr 			: 0,
					 		class_id  	: self.get("class_id"),
					 		memo 		: self.get("memo"),
					 		exchange_rate: rate,
						 	main 		: 0	 		
						});	
					});							
				}
				//Inventory on Cr
				if(!jQuery.isEmptyObject(inventoryList)){
					$.each(inventoryList, function(index, value){					
						journalEntries.push({
					 		account_id 	: value.id,	 		
					 		dr 			: 0, 
					 		cr 			: value.amt*rate,
					 		class_id  	: self.get("class_id"),
					 		memo 		: self.get("memo"),
					 		exchange_rate: rate,
						 	main 		: 0	 		
						});
					});
				}
				
				//Witdraw to journal
				if(!jQuery.isEmptyObject(witdrawList)){
					//Deposit on Dr
					$.each(witdrawList, function(index, value){
						journalEntries.push({
					 		account_id 	: value.id,	 		
					 		dr 			: value.amt*rate, 
					 		cr 			: 0,
					 		class_id  	: self.get("class_id"),
					 		memo 		: self.get("memo"),
					 		exchange_rate: rate,
						 	main 		: 0	 		
						});
					});

					var wCash = 0;
					$.each(witdrawList, function(index, value){					
						wCash += value.amt;
					});

					//Cash on Cr							
					journalEntries.push({
				 		account_id 	: this.get("cash_account_id"),	 		
				 		dr 			: 0, 
				 		cr 			: wCash*rate,
				 		class_id  	: this.get("class_id"),
				 		memo 		: this.get("memo"),
				 		exchange_rate: rate,
					 	main 		: 0	 		
					});				
				}
				//Calcualte customer deposit
				if(depositAmount>0){				
					var deposit = kendo.parseFloat(this.get("customer").deposit_amount) + kendo.parseFloat(depositAmount);
					this.updateCustomerDeposit(deposit);
				}
				
				//Add journal to datasource
				journalDS.add({
					company_id: banhji.config.userData.company,
					vendor_id: 0,
					people_id: this.get("customer").id,
					employee_id: banhji.config.userData.userId,
					payment_id: 0,
					transaction_type: "Receipt",
					payment_method: "cash",
					check_no: "",
					memo: "បង្កាន់ដៃលក់ជាសាច់ប្រាក់",
					date: kendo.toString(this.get("issued_date"), "yyyy-MM-dd"),
					//due_date: kendo.toString(this.dateDue, "yyyy-MM-dd"),
					// amount_billed: 0,
					// amount_due: 0,
					// amount_paid: 0,
					voucher: "",
					number: "",
					class_id: this.get("class_id"),
					status: 1,
					journalEntries: journalEntries,
					inJournal: 1			 				 		
			 	});
			 			 	
			 	journalDS.sync();			  	
				this.clear();	 	
			},			
			updateSO		: function(){
				var id = this.get("so_id");
				
				if(id>0){
					var d = soDS.get(id);
					d.set("status", 1);
					soDS.sync();
				}								
			},				
			updateEstimate		: function(){
				var id = this.get("estimate_id");
				
				if(id>0){
					var d = estimateDS.get(id);
					d.set("status", 1);
					estimateDS.sync();
				}								
			},
			updateGDN			: function(){
				var id = this.get("gdn_id");
				
				if(id>0){
					var d = gdnDS.get(id);
					d.set("status", 1);
					gdnDS.sync();
				}								
			},
			updateCustomerDeposit : function(amount){				
				var customer_id = this.get("customer").id;				
				$.ajax({
					type: "PUT",
					url: banhji.baseUrl + "api/people_api/deposit",			
					data: { id: customer_id, amount: amount },
					dataType: "json",
					success: function (response) {
						//var data = response.d;			  
					}
				});
								
			},
		    clear 				: function(){
		    	this.setNumber();
		    	this.set("so_id", 0);
				this.set("estimate_id", 0);
				this.set("gdn_id", 0);
				this.set("class_id", "");
				this.set("check_no", "");
				this.set("memo", "");
				this.set("memo2", "");
				this.set("sub_total", "");
				this.set("vat_id", "");
				this.set("vat", "");	
				this.set("total", "");
				
				//Remove datasources
				invoiceDS.data([]);				
				invoiceItemDS.data([]);
				journalDS.data([]);	
		    }
		});			

		return {
			viewModel 	: viewModel
		};	
	}());

	banhji.so = (function(){		
		var customerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "GET",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "PUT",
					dataType: "json"
				}
			},		
			schema: {
				model: {
					id: "id"
				}
			},			
			serverFiltering: true
		});			

		var currencyRateDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/currency_rates/currency_rate",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "status", value: 1 },
			serverFiltering: true		
		});			

		var itemDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/item_dropdown",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var vatDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/items",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "item_type_id", value: 6 },
			serverFiltering: true
		});

		var classDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/classes/class",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "type", value: "Class" },
			serverFiltering: true		
		});

		var invoiceDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
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
		  	},		  	
		  	serverFiltering : true	  	
		});

		var invoiceItemDS = new kendo.data.DataSource({
		  	transport: {		  	
			  	read: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "PUT",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	destroy: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
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
				  	id : "id"
			  	}		
		  	},
		  	serverFiltering: true	  		  	
		});

		var estimateDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
				  	dataType: "json"
			  	}
		  	},	  		  	
		  	serverFiltering : true	  	
		});

		var gdnDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
				  	dataType: "json"
			  	}
		  	},
		  	schema: {
			  	model: {
				  	id : "id"
			  	}		
		  	},		  		  	
		  	serverFiltering : true	  	
		});
		
		var viewModel = kendo.observable({								
			biller				: banhji.config.userData.userId,
			company_code 		: "km-KH",
			sub_code 			: "km-KH",
			rate 				: 1,	
			
			address				: "",		  	  
			issued_date			: new Date(),
			expected_date 		: "",

			memo				: "",
			memo2 				: "",
			class_id			: "",

			estimate_id 		: 0,
			gdn_id 				: 0,
			
			vat_id				: "",			
			customer 			: null,							    
								
			itemList 			: [],

			invoiceItemList 	: invoiceItemDS,
			vatList 			: vatDS,
			estimateList 		: estimateDS,
			gdnList 			: gdnDS,									
			classList 			: classDS,
							
			pageLoad 			: function(customer_id){
				this.set("estimate_id", 0);
				this.set("gdn_id", 0);			
		    	this.set("class_id");
				this.set("memo", "");
				this.set("memo2", "");
				this.set("sub_total", "");
				this.set("vat_id", "");
				this.set("vat", "");	
				this.set("total", "");

				invoiceItemDS.data([]);

				this.setNumber();
				this.setExpectedDate();
				this.setItemSource();
				this.loadReferences(customer_id);				
				this.loadCustomer(customer_id);			
				this.addNewRow();
			},
			closeX 				: function () {
				kendo.fx($("#slide-form")).slideIn("up").play();				
				window.history.go(-1);
			},							
		    setItemSource 		: function(){
		    	var self = this;	    		    	
				itemDS.fetch(function(){
				  	var d = this.data();			  	
				  	$.each(d, function(index, data) {		    				    		
			    		self.itemList.push({
			    			id 		: data.id,
			    			name 	: data.item_sku +' '+ data.name	    			
			    		});
			    	});
				});				    			  	    	
		    },	    	    
		    setNumber 			: function(){
		    	var self = this;
		    	$.ajax({
					type: "GET",
					url: banhji.baseUrl + "api/invoices/last_number",			
					data: { type: "SO" },
					dataType: "json",
					success: function (response) {
						//var data = response.d;
						var last_no = response;		
						var no = 0;
						if(last_no.length>6){
							no = parseInt(last_no.substr(6));			
						}
						no++;

						var str_inv_no = "SO" + kendo.toString(new Date(self.get("issued_date")), "yy") + kendo.toString(new Date(self.get("issued_date")), "MM");
						var number = str_inv_no + kendo.toString(no, "00000");

						self.set("number", number);
					}
				});		    	
		    },
		    setExpectedDate 	: function(){
				var exdate = new Date();
				exdate.setDate(exdate.getDate()+7);
				this.set("expected_date", exdate);
			},
			setRate 			: function(){
				var rate = 1;
				var companyCode = this.get("company_code");
				var customerCode = this.get("customer").currency_code;
				
		        if(companyCode!==customerCode){
		        	var companyCodeRate = this.getCurrencyRateByCode(companyCode);
		        	var customerCodeRate = this.getCurrencyRateByCode(customerCode);

		        	if(companyCodeRate>0 && customerCodeRate>0){
		        		rate = companyCodeRate/customerCodeRate;
		        	}	
		        }

		        this.set("rate", rate);
			},
			loadReferences 		: function(customer_id){
				currencyRateDS.fetch();

				estimateDS.filter({
					filters: [
						{ field: "customer_id", value: customer_id },
						{ field: "status", value: 0 },
						{ field: "type", value: "Estimate" }
					]
				});

				gdnDS.filter({
					filters: [
						{ field: "customer_id", value: customer_id },
						{ field: "status", value: 0 },
						{ field: "type", value: "GDN" }
					]
				});				
			},
		    loadCustomer 		: function(id){
		    	var self = this;
				
		    	customerDS.filter({ field: "id", value: id });
		    	customerDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;

					if(type==="read"){
					  	var d = response[0];					  	
					  	self.set("customer", d);		  	
					  	self.set("address", d.address);
					  	self.set("sub_code", d.currencies.sub_code);
					  	self.set("company_code", d.companies.based_currency);
					  	self.set("class_id", d.class_id);
					  	self.setRate();

					  	if(invoiceItemDS.data().length<1){
					  		self.addNewRow();
					  	}
				  	}			  	  			  	
				});															    			  	    	
		    },
		    loadInvoice			: function(id){			  	
			  	var self = this;			  					
			  	this.setItemSource();

			  	invoiceDS.filter({ field: "id", value: id });
			  	invoiceItemDS.filter({ field: "invoice_id", value: id });
			 			  	
			  	invoiceDS.bind("requestEnd", function(e){
			  		var response = e.response;
    				var type = e.type;

			  		if(type==="read"){
				  		var d = response[0];

				  		if(d.vat_id>0){
				  			self.set("vat_id", d.vat_id);
				  		}

				  		var t = kendo.parseFloat(d.amount)/d.rate;
				  		var v = kendo.parseFloat(d.vat)/d.rate;
				  		
					  	self.set("number", d.number);					  	
					  	self.set("total", kendo.toString(t, "c", d.sub_code));						
						self.set("vat", kendo.toString(v, "c", d.sub_code));
						
						self.set("status", d.status);						
						self.set("address", d.address);	  	  
						self.set("issued_date", new Date(d.issued_date));
						self.set("expected_date", new Date(d.expected_date));			
						self.set("estimate_id", d.estimate_id);
						self.set("gdn_id", d.gdn_id);
						self.set("class_id", d.class_id);								
						self.set("memo", d.memo);
						self.set("memo2", d.memo2);
						
						var sub = t - v;
						self.set("sub_total", kendo.toString(sub, "c", d.sub_code));								  	

						//Status
						if(d.status==1){
							self.set("paid", true);
						}else{
							self.set("paid", false);
						}

						//Load customer
						customerDS.filter({ field: "id", value: d.customer_id });
						customerDS.bind("requestEnd", function(e){
					  		var response = e.response;
		    				var type = e.type;

					  		if(type==="read"){
						  		var d = response[0];
						  		self.set("customer", d);
						  	}
						});
						
						self.loadReferences(d.customer_id);
						self.autoIncreaseNo();
					}																		
			 	});				
			},			
			autoIncreaseNo 		: function(){
				$(".sno").each(function(index,element){                 
				   $(element).text(index + 1); 
				});
			},
			addNewRow 			: function(){
				invoiceItemDS.add({
					'invoice_id' 	: 0,
					'item_id' 		: "",
					'description' 	: "",				
					'quantity' 		: 1,
					'unit_price' 	: 0,								
					'amount' 		: 0,
					'rate'			: this.get("rate"),
					'sub_code'		: this.get("sub_code"),
					'vat' 			: false,
					'so_id'			: 0		
				});
				this.autoIncreaseNo();			
			},
			removeRow 			: function(e){			
				var item = e.data;     
		        invoiceItemDS.remove(item);
		        this.change();
			},		
			change				: function(){
				if(invoiceItemDS.total()>0){			
					var subTotal = 0;
					var vat = 0;
					var vatAmount = 0;

					var vat_id = this.get("vat_id");			
					if(vat_id>0 || vat_id!=""){				
						var vatItem = vatDS.get(vat_id);
						vatAmount = vatItem.price;
					}

					$.each(invoiceItemDS.data(), function(index, data) {				
						var amt = data.quantity * data.unit_price;
						subTotal += amt;

						if(data.vat && vatAmount>0){
							vat += amt * vatAmount;						
						}
			        });

			        var total = subTotal + vat;			

			        this.set("sub_total", kendo.toString(subTotal, "c", this.get("sub_code")));
			        this.set("vat", kendo.toString(vat, "c", this.get("sub_code")));			
					this.set("total", kendo.toString(total, "c", this.get("sub_code")));
					
			    	this.autoIncreaseNo();
		    	}else{
		    		this.set("sub_total", kendo.toString(0, "c", this.get("sub_code")));
			        this.set("vat", kendo.toString(0, "c", this.get("sub_code")));			
					this.set("total", kendo.toString(0, "c", this.get("sub_code")));
		    	}    	
			},
			itemChange 			: function(e){								
				var data = e.data;				
		        var rate = this.get("rate");		        
		        var item = itemDS.get(data.item_id);		 
		        		        
	    		data.set("description", item.name);
		        data.set("unit_price", item.price/rate);
		        	        
		        this.change();	                	        	
			},
			getCurrencyRateByCode 	: function(code){
				var rate = 0;			
				$.each(currencyRateDS.data(), function(index, value){	        	
		        	if(code===value.code){	        		
		        		rate = value.rate;
		        		return false;
		        	}	        	
		        });
				
		        return kendo.parseFloat(rate);
			},

			estimateChange 		: function(e){				
				var id = e.sender._selectedValue;
				
				//Clear invoice item datasource
				if(invoiceItemDS.total()>0){
					invoiceItemDS.data([]);					
				}

				if(id>0 || id!==""){
				 	var d = estimateDS.get(id);			
				 	var items = d.invoice_items;

				 	$.each(items, function(index, data) {			 		
				 		invoiceItemDS.add({
							'invoice_id' 	: 0,
							'item_id' 		: data.item_id,
							'description' 	: data.description,				
							'quantity' 		: data.quantity,
							'unit_price' 	: data.unit_price,								
							'amount' 		: data.memo,
							'rate'			: data.rate,
							'sub_code'		: data.sub_code,
							'vat' 			: data.vat,
							'so_id'			: data.so_id		
						});			
				 	});

				 	this.set("estimate_id", id);
				 	this.set("gdn_id", 0);
				 	this.set("so_id", 0);				 				 				
				}

				this.change();				
			},
			gdnChange 			: function(e){
				var id = e.sender._selectedValue;
				
				//Clear invoice item datasource
				if(invoiceItemDS.total()>0){
					invoiceItemDS.data([]);					
				}

				if(id>0 || id!==""){
				 	var d = gdnDS.get(id);			
				 	var items = d.invoice_items;

				 	$.each(items, function(index, data) {			 		
				 		invoiceItemDS.add({
							'invoice_id' 	: 0,
							'item_id' 		: data.item_id,
							'description' 	: data.description,				
							'quantity' 		: data.quantity,
							'unit_price' 	: data.unit_price,								
							'amount' 		: data.memo,
							'rate'			: data.rate,
							'sub_code'		: data.sub_code,
							'vat' 			: data.vat,
							'so_id'			: data.so_id		
						});			
				 	});

				 	this.set("estimate_id", 0);
				 	this.set("gdn_id", id);
				 	this.set("so_id", 0);

				 	
				 	this.autoIncreaseNo();				
				}

				this.change();				
			},
			
		    add 				: function(){
		    	var self = this;
		    	var rate = this.get("rate");

		    	var t = this.get("total");
		        var tt = Number(t.replace(/[^0-9\.]+/g,""));

		        var v = this.get("vat");
		        var vv = Number(v.replace(/[^0-9\.]+/g,""));

		        //Modify invoice item
		        $.each(invoiceItemDS.data() ,function(index, data){
		        	data.set("id", 0);
		        	data.set("invoice_id", 0);		        	
		        });

		        //Add invoice to datasource	
		    	invoiceDS.add({
		    		'number' 			: this.get("number"),
				   	'type'				: "SO",				   					   				   	
				   	'amount'			: tt*rate,
				   	'rate'				: rate,
				   	'vat'				: vv*rate,
				   	'vat_id'			: this.get("vat_id"),
				   	'status' 			: 0,
				   	'sub_code'			: this.get("sub_code"),
				   	'biller' 			: this.get("biller"),
				   	'customer_id' 		: this.get("customer").id,			   	
				   	'address' 			: this.get("address"),
				   	'issued_date' 		: kendo.toString(this.get("issued_date"),"yyyy-MM-dd"),
				   	'expected_date' 	: kendo.toString(this.get("expected_date"),"yyyy-MM-dd"),				   	
				   	'estimate_id' 		: this.get("estimate_id"),
					'gdn_id' 			: this.get("gdn_id"),							   	
				   	'class_id' 			: this.get("class_id"),
				   	'memo' 				: this.get("memo"),
				   	'memo2'				: this.get("memo2"),
				   	'company_id'		: this.get("customer").company_id,
				   	
				   	'invoice_items'		: invoiceItemDS.data()
		    	});
		    				
		    	invoiceDS.sync();
		    			    			    		   	
		    	this.updateEstimate();
			    this.updateGDN();
			    this.clear();			    			       		    	
		    },
		    update 				: function(id){
		    	var d = invoiceDS.get(id);
		    	var rate = this.get("rate");

		    	var t = this.get("total");
		        var tt = Number(t.replace(/[^0-9\.]+/g,""));

		        var v = this.get("vat");
		        var vv = Number(v.replace(/[^0-9\.]+/g,""));

			   	d.set("amount", tt*rate);
			   	d.set("vat", vv*rate);			   	
			   	d.set("vat_id",  this.get("vat_id"));				  	  
				d.set("issued_date", kendo.toString(new Date(this.get("issued_date")),"yyyy-MM-dd"));
				d.set("expected_date", kendo.toString(new Date(this.get("expected_date")),"yyyy-MM-dd"));
				d.set("address", this.get("address"));	
				d.set("estimate_id", this.get("estimate_id"));
				d.set("gdn_id", this.get("gdn_id"));				
				d.set("class_id", this.get("class_id"));			
				d.set("memo", this.get("memo"));
				d.set("memo2", this.get("memo2"));				

				//Adding invoice id to invoice item
		        $.each(invoiceItemDS.data() ,function(index, data){
		        	data.set("invoice_id", id);
		        });
								
				invoiceDS.sync();
				invoiceItemDS.sync();						
		    },		   
			updateEstimate		: function(){
				var id = this.get("estimate_id");
				
				if(id>0){
					var d = estimateDS.get(id);
					d.set("status", 1);
					estimateDS.sync();
				}								
			},
			updateGDN			: function(){
				var id = this.get("gdn_id");
				
				if(id>0){
					var d = gdnDS.get(id);
					d.set("status", 1);
					gdnDS.sync();
				}								
			},			
		    clear 				: function(){
		    	this.setNumber();		    	
				this.set("estimate_id", 0);
				this.set("gdn_id", 0);			
		    	this.set("class_id");
				this.set("memo", "");
				this.set("memo2", "");
				this.set("sub_total", "");
				this.set("vat_id", "");
				this.set("vat", "");	
				this.set("total", "");
				
				//Remove datasources
				invoiceDS.data([]);				
				invoiceItemDS.data([]);							
		    }
		});			

		return {
			viewModel  : viewModel
		};	
	}());

	banhji.estimate = (function(){		
		var customerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "GET",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "PUT",
					dataType: "json"
				}
			},		
			schema: {
				model: {
					id: "id"
				}
			},			
			serverFiltering: true
		});			

		var currencyRateDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/currency_rates/currency_rate",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "status", value: 1 },
			serverFiltering: true		
		});

		var itemDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/item_dropdown",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var vatDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/items",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "item_type_id", value: 6 },
			serverFiltering: true
		});

		var classDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/classes/class",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "type", value: "Class" },
			serverFiltering: true		
		});

		var invoiceDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
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
		  	},		  	
		  	serverFiltering : true	  	
		});

		var invoiceItemDS = new kendo.data.DataSource({
		  	transport: {		  	
			  	read: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "PUT",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	destroy: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
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
				  	id : "id"
			  	}		
		  	},
		  	serverFiltering: true	  		  	
		});
			
		var viewModel = kendo.observable({								
			biller				: banhji.config.userData.userId,
			company_code 		: "km-KH",
			sub_code 			: "km-KH",
			rate 				: 1,	
			
			address				: "",		  	  
			issued_date			: new Date(),			
						
			memo				: "",
			memo2 				: "",
			class_id			: "",

			vat_id				: "",			
			customer 			: null,							    
								
			itemList 			: [],

			invoiceItemList 	: invoiceItemDS,
			vatList 			: vatDS,						
			classList 			: classDS,
							
			pageLoad 			: function(customer_id){
				this.set("memo", "");
				this.set("memo2", "");
				this.set("class_id", "");
				this.set("sub_total", "");
				this.set("vat_id", "");
				this.set("vat", "");	
				this.set("total", "");

				invoiceItemDS.data([]);

				this.setNumber();				
				this.setItemSource();
				this.loadReferences(customer_id);				
				this.loadCustomer(customer_id);			
				this.addNewRow();
			},
			closeX 				: function () {
				kendo.fx($("#slide-form")).slideIn("up").play();				
				window.history.go(-1);
			},							
		    setItemSource 		: function(){
		    	var self = this;	    		    	
				itemDS.fetch(function(){
				  	var d = this.data();			  	
				  	$.each(d, function(index, data) {		    				    		
			    		self.itemList.push({
			    			id 		: data.id,
			    			name 	: data.item_sku +' '+ data.name	    			
			    		});
			    	});
				});				    			  	    	
		    },	    	    
		    setNumber 			: function(){
		    	var self = this;
		    	$.ajax({
					type: "GET",
					url: banhji.baseUrl + "api/invoices/last_number",			
					data: { type: "Estimate" },
					dataType: "json",
					success: function (response) {
						//var data = response.d;
						var last_no = response;		
						var no = 0;
						if(last_no.length>6){
							no = parseInt(last_no.substr(6));			
						}
						no++;

						var str_inv_no = "QO" + kendo.toString(new Date(self.get("issued_date")), "yy") + kendo.toString(new Date(self.get("issued_date")), "MM");
						var number = str_inv_no + kendo.toString(no, "00000");

						self.set("number", number);
					}
				});		    	
		    },
		    setRate 			: function(){
				var rate = 1;
				var companyCode = this.get("company_code");
				var customerCode = this.get("customer").currency_code;
				
		        if(companyCode!==customerCode){
		        	var companyCodeRate = this.getCurrencyRateByCode(companyCode);
		        	var customerCodeRate = this.getCurrencyRateByCode(customerCode);

		        	if(companyCodeRate>0 && customerCodeRate>0){
		        		rate = companyCodeRate/customerCodeRate;
		        	}	
		        }

		        this.set("rate", rate);
			},					    
			loadReferences 		: function(customer_id){
				currencyRateDS.fetch();				
			},
		    loadCustomer 		: function(id){
		    	var self = this;
				
		    	customerDS.filter({ field: "id", value: id });
		    	customerDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;

					if(type==="read"){
					  	var d = response[0];					  	
					  	self.set("customer", d);		  	
					  	self.set("address", d.address);
					  	self.set("sub_code", d.currencies.sub_code);
					  	self.set("company_code", d.companies.based_currency);
					  	self.set("class_id", d.class_id);
					  	self.setRate();

					  	if(invoiceItemDS.data().length<1){
					  		self.addNewRow();
					  	}
				  	}			  	  			  	
				});															    			  	    	
		    },
		    loadInvoice			: function(id){			  	
			  	var self = this;			  					
			  	this.setItemSource();

			  	invoiceDS.filter({ field: "id", value: id });
			  	invoiceItemDS.filter({ field: "invoice_id", value: id });
			 			  	
			  	invoiceDS.bind("requestEnd", function(e){
			  		var response = e.response;
    				var type = e.type;

			  		if(type==="read"){
				  		var d = response[0];

				  		if(d.vat_id>0){
				  			self.set("vat_id", d.vat_id);
				  		}

				  		var t = kendo.parseFloat(d.amount)/d.rate;
				  		var v = kendo.parseFloat(d.vat)/d.rate;
				  		
					  	self.set("number", d.number);					  	
					  	self.set("total", kendo.toString(t, "c", d.sub_code));						
						self.set("vat", kendo.toString(v, "c", d.sub_code));
						
						self.set("status", d.status);						
						self.set("address", d.address);	  	  
						self.set("issued_date", new Date(d.issued_date));
						self.set("class_id", d.class_id);			
						self.set("memo", d.memo);
						self.set("memo2", d.memo2);						

						var sub = t - v;
						self.set("sub_total", kendo.toString(sub, "c", d.sub_code));								  	

						//Status
						if(d.status==1){
							self.set("paid", true);
						}else{
							self.set("paid", false);
						}

						//Load customer
						customerDS.filter({ field: "id", value: d.customer_id });
						customerDS.bind("requestEnd", function(e){
					  		var response = e.response;
		    				var type = e.type;

					  		if(type==="read"){
						  		var d = response[0];
						  		self.set("customer", d);
						  	}
						});
						
						self.loadReferences(d.customer_id);
						self.autoIncreaseNo();
					}																		
			 	});				
			},			
			autoIncreaseNo 		: function(){
				$(".sno").each(function(index,element){                 
				   $(element).text(index + 1); 
				});
			},
			addNewRow 			: function(){
				invoiceItemDS.add({
					'invoice_id' 	: 0,
					'item_id' 		: "",
					'description' 	: "",				
					'quantity' 		: 1,
					'unit_price' 	: 0,								
					'amount' 		: 0,
					'rate'			: this.get("rate"),
					'sub_code'		: this.get("sub_code"),
					'vat' 			: false,
					'so_id'			: 0		
				});
				this.autoIncreaseNo();			
			},
			removeRow 			: function(e){
				var item = e.data;     
		        invoiceItemDS.remove(item);
		        this.change();
			},		
			change				: function(){
				if(invoiceItemDS.total()>0){			
					var subTotal = 0;
					var vat = 0;
					var vatAmount = 0;

					var vat_id = this.get("vat_id");			
					if(vat_id>0 || vat_id!=""){				
						var vatItem = vatDS.get(vat_id);
						vatAmount = vatItem.price;
					}

					$.each(invoiceItemDS.data(), function(index, data) {				
						var amt = data.quantity * data.unit_price;
						subTotal += amt;

						if(data.vat && vatAmount>0){
							vat += amt * vatAmount;						
						}
			        });

			        var total = subTotal + vat;			

			        this.set("sub_total", kendo.toString(subTotal, "c", this.get("sub_code")));
			        this.set("vat", kendo.toString(vat, "c", this.get("sub_code")));			
					this.set("total", kendo.toString(total, "c", this.get("sub_code")));
					
			    	this.autoIncreaseNo();
		    	}else{
		    		this.set("sub_total", kendo.toString(0, "c", this.get("sub_code")));
			        this.set("vat", kendo.toString(0, "c", this.get("sub_code")));			
					this.set("total", kendo.toString(0, "c", this.get("sub_code")));
		    	}    	
			},
			itemChange 			: function(e){								
				var data = e.data;				
		        var rate = this.get("rate");		        
		        var item = itemDS.get(data.item_id);		 
		        		        
	    		data.set("description", item.name);
		        data.set("unit_price", item.price/rate);
		        	        
		        this.change();	                	        	
			},
			getCurrencyRateByCode 	: function(code){
				var rate = 0;			
				$.each(currencyRateDS.data(), function(index, value){	        	
		        	if(code===value.code){	        		
		        		rate = value.rate;
		        		return false;
		        	}	        	
		        });
				
		        return kendo.parseFloat(rate);
			},					

		    add 				: function(){
		    	var self = this;
		    	var rate = this.get("rate");

				var t = this.get("total");
		        var tt = Number(t.replace(/[^0-9\.]+/g,""));

		        var v = this.get("vat");
		        var vv = Number(v.replace(/[^0-9\.]+/g,""));

		        //Modify invoice item
		        $.each(invoiceItemDS.data() ,function(index, data){
		        	data.set("id", 0);
		        	data.set("invoice_id", 0);		        	
		        });

		        //Add invoice to datasource	
		    	invoiceDS.add({
		    		'number' 			: this.get("number"),
				   	'type'				: "Estimate",				   					   				   	
				   	'amount'			: tt*rate,
				   	'rate'				: rate,
				   	'vat'				: vv*rate,
				   	'vat_id'			: this.get("vat_id"),
				   	'status' 			: 0,
				   	'sub_code'			: this.get("sub_code"),
				   	'biller' 			: this.get("biller"),
				   	'customer_id' 		: this.get("customer").id,			   	
				   	'address' 			: this.get("address"),
				   	'issued_date' 		: kendo.toString(this.get("issued_date"),"yyyy-MM-dd"),				   								   	
				   	'class_id' 			: this.get("class_id"),
				   	'memo' 				: this.get("memo"),
				   	'memo2'				: this.get("memo2"),
				   	'company_id'		: this.get("customer").company_id,
				   	
				   	'invoice_items'		: invoiceItemDS.data()
		    	});
		    				
		    	invoiceDS.sync();
		    	this.clear();			      		    	
		    },
		    update 				: function(id){
		    	var d = invoiceDS.get(id);
		    	var rate = this.get("rate");

		    	var t = this.get("total");
		        var tt = Number(t.replace(/[^0-9\.]+/g,""));

		        var v = this.get("vat");
		        var vv = Number(v.replace(/[^0-9\.]+/g,""));
			  					   				   	
			   	d.set("amount", tt*rate);
			   	d.set("vat", kendo.parseFloat(this.get("vat")));			   	
			   	d.set("vat_id",  tt*rate);				  	  
				d.set("issued_date", kendo.toString(new Date(this.get("issued_date")),"yyyy-MM-dd"));				
				d.set("address", this.get("address"));				
				d.set("class_id", this.get("class_id"));			
				d.set("memo", this.get("memo"));
				d.set("memo2", this.get("memo2"));				

				//Adding invoice id to invoice item
		        $.each(invoiceItemDS.data() ,function(index, data){
		        	data.set("invoice_id", id);
		        });
								
				invoiceDS.sync();
				invoiceItemDS.sync();						
		    },		    
		    clear 				: function(){
		    	this.setNumber();
		    	
				this.set("memo", "");
				this.set("memo2", "");
				this.set("class_id", "");
				this.set("sub_total", "");
				this.set("vat_id", "");
				this.set("vat", "");	
				this.set("total", "");
				
				//Remove datasources
				invoiceDS.data([]);				
				invoiceItemDS.data([]);						
		    }
		});		

		return {
			viewModel 		: viewModel
		};	
	}());

	banhji.gdn = (function(){		
		var customerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "GET",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "PUT",
					dataType: "json"
				}
			},		
			schema: {
				model: {
					id: "id"
				}
			},			
			serverFiltering: true
		});			

		var currencyRateDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/currency_rates/currency_rate",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "status", value: 1 },
			serverFiltering: true		
		});		

		var itemDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/item_dropdown",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var vatDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/items",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "item_type_id", value: 6 },
			serverFiltering: true
		});		

		var classDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/classes/class",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "type", value: "Class" },
			serverFiltering: true		
		});

		var invoiceDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
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
		  	},		  	
		  	serverFiltering : true	  	
		});

		var invoiceItemDS = new kendo.data.DataSource({
		  	transport: {		  	
			  	read: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "PUT",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	destroy: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
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
				  	id : "id"
			  	}		
		  	},
		  	serverFiltering: true	  		  	
		});

		var estimateDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
				  	dataType: "json"
			  	}
		  	},	  		  	
		  	serverFiltering : true	  	
		});

		var gdnDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
				  	dataType: "json"
			  	}
		  	},
		  	schema: {
			  	model: {
				  	id : "id"
			  	}		
		  	},		  		  	
		  	serverFiltering : true	  	
		});

		var soDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
				  	dataType: "json"
			  	}
		  	},
		  	schema: {
			  	model: {
				  	id : "id"
			  	}		
		  	},		  		  	
		  	serverFiltering : true	  	
		});	
		
		var viewModel = kendo.observable({								
			biller				: banhji.config.userData.userId,
			company_code 		: "km-KH",
			sub_code 			: "km-KH",
			rate 				: 1,	
			
			address				: "",		  	  
			issued_date			: new Date(),			
						
			memo				: "",
			memo2 				: "",
			class_id			: "",			

			vat_id				: "",			
			customer 			: null,								    
								
			itemList 			: [],

			invoiceItemList 	: invoiceItemDS,
			vatList 			: vatDS,									
			classList 			: classDS,
							
			pageLoad 			: function(customer_id){
				this.set("memo", "");
				this.set("memo2", "");
				this.set("class_id", "");
				this.set("sub_total", "");
				this.set("vat_id", "");
				this.set("vat", "");	
				this.set("total", "");

				invoiceItemDS.data([]);

				this.setNumber();				
				this.setItemSource();
				this.loadReferences(customer_id);				
				this.loadCustomer(customer_id);			
				this.addNewRow();
			},
			closeX 				: function () {
				kendo.fx($("#slide-form")).slideIn("up").play();				
				window.history.go(-1);
			},							
		    setItemSource 		: function(){
		    	var self = this;	    		    	
				itemDS.fetch(function(){
				  	var d = this.data();			  	
				  	$.each(d, function(index, data) {		    				    		
			    		self.itemList.push({
			    			id 		: data.id,
			    			name 	: data.item_sku +' '+ data.name	    			
			    		});
			    	});
				});				    			  	    	
		    },	    	    
		    setNumber 			: function(){
		    	var self = this;
		    	$.ajax({
					type: "GET",
					url: banhji.baseUrl + "api/invoices/last_number",			
					data: { type: "GDN" },
					dataType: "json",
					success: function (response) {
						//var data = response.d;
						var last_no = response;		
						var no = 0;
						if(last_no.length>7){
							no = parseInt(last_no.substr(7));			
						}
						no++;

						var str_inv_no = "GDN" + kendo.toString(new Date(self.get("issued_date")), "yy") + kendo.toString(new Date(self.get("issued_date")), "MM");
						var number = str_inv_no + kendo.toString(no, "00000");

						self.set("number", number);
					}
				});		    	
		    },		    
			setRate 			: function(){
				var rate = 1;
				var companyCode = this.get("company_code");
				var customerCode = this.get("customer").currency_code;
				
		        if(companyCode!==customerCode){
		        	var companyCodeRate = this.getCurrencyRateByCode(companyCode);
		        	var customerCodeRate = this.getCurrencyRateByCode(customerCode);

		        	if(companyCodeRate>0 && customerCodeRate>0){
		        		rate = companyCodeRate/customerCodeRate;
		        	}	
		        }

		        this.set("rate", rate);
			},
			loadReferences 		: function(customer_id){
				currencyRateDS.fetch();				
			},
		    loadCustomer 		: function(id){
		    	var self = this;
				
		    	customerDS.filter({ field: "id", value: id });
		    	customerDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;

					if(type==="read"){
					  	var d = response[0];					  	
					  	self.set("customer", d);		  	
					  	self.set("address", d.address);
					  	self.set("sub_code", d.currencies.sub_code);
					  	self.set("company_code", d.companies.based_currency);
					  	self.set("class_id", d.class_id);
					  	self.setRate();

					  	if(invoiceItemDS.data().length<1){
					  		self.addNewRow();
					  	}
				  	}			  	  			  	
				});															    			  	    	
		    },
		    loadInvoice			: function(id){			  	
			  	var self = this;			  					
			  	this.setItemSource();

			  	invoiceDS.filter({ field: "id", value: id });
			  	invoiceItemDS.filter({ field: "invoice_id", value: id });
											 			  	
			  	invoiceDS.bind("requestEnd", function(e){
			  		var response = e.response;
    				var type = e.type;

			  		if(type==="read"){
				  		var d = response[0];

				  		if(d.vat_id>0){
				  			self.set("vat_id", d.vat_id);
				  		}

				  		var t = kendo.parseFloat(d.amount)/d.rate;
				  		var v = kendo.parseFloat(d.vat)/d.rate;
				  		
					  	self.set("number", d.number);					  	
					  	self.set("total", kendo.toString(t, "c", d.sub_code));						
						self.set("vat", kendo.toString(v, "c", d.sub_code));
						
						self.set("status", d.status);						
						self.set("address", d.address);	  	  
						self.set("issued_date", new Date(d.issued_date));						
						self.set("class_id", d.class_id);			
						self.set("memo", d.memo);
						self.set("memo2", d.memo2);						

						var sub = t - v;
						self.set("sub_total", kendo.toString(sub, "c", d.sub_code));								  	

						//Status
						if(d.status==1){
							self.set("paid", true);
						}else{
							self.set("paid", false);
						}

						//Load customer
						customerDS.filter({ field: "id", value: d.customer_id });
						customerDS.bind("requestEnd", function(e){
					  		var response = e.response;
		    				var type = e.type;

					  		if(type==="read"){
						  		var d = response[0];
						  		self.set("customer", d);						  		
						  	}
						});
						
						self.loadReferences(d.customer_id);
						self.autoIncreaseNo();						
					}																		
			 	});

				invoiceItemDS.bind("requestEnd", function(e){
					var response = e.response;
    				var type = e.type;
    				var totalQty = 0;

			  		if(type==="read"){
				  		$.each(response, function(index, data){
				  			totalQty += kendo.parseInt(data.quantity);
				  		});						
					}
					self.set("totalQuantity", totalQty);
				});
			},			
			autoIncreaseNo 		: function(){
				$(".sno").each(function(index,element){                 
				   $(element).text(index + 1); 
				});
			},
			addNewRow 			: function(){
				invoiceItemDS.add({
					'invoice_id' 	: 0,
					'item_id' 		: "",
					'description' 	: "",				
					'quantity' 		: 1,
					'unit_price' 	: 0,								
					'amount' 		: 0,
					'rate'			: this.get("rate"),
					'sub_code'		: this.get("sub_code"),
					'vat' 			: false,
					'so_id'			: 0		
				});
				this.autoIncreaseNo();			
			},
			removeRow 			: function(e){				
				var item = e.data;     
		        invoiceItemDS.remove(item);
		        this.change();
			},		
			change				: function(){
				if(invoiceItemDS.total()>0){			
					var subTotal = 0;
					var vat = 0;
					var vatAmount = 0;
					var totalQty = 0;

					// var vat_id = this.get("vat_id");			
					// if(vat_id>0 || vat_id!=""){				
					// 	var vatItem = vatDS.get(vat_id);
					// 	vatAmount = vatItem.price;
					// }

					$.each(invoiceItemDS.data(), function(index, data) {				
						var amt = data.quantity * data.unit_price;
						subTotal += amt;
						totalQty += kendo.parseInt(data.quantity);

						if(data.vat && vatAmount>0){
							vat += amt * vatAmount;						
						}
			        });

			        var total = subTotal + vat;			

			        this.set("sub_total", kendo.toString(subTotal, "c", this.get("sub_code")));
			        this.set("vat", kendo.toString(vat, "c", this.get("sub_code")));			
					this.set("total", kendo.toString(total, "c", this.get("sub_code")));

					this.set("totalQuantity", totalQty);
					
			    	this.autoIncreaseNo();
		    	}else{
		    		this.set("sub_total", kendo.toString(0, "c", this.get("sub_code")));
			        this.set("vat", kendo.toString(0, "c", this.get("sub_code")));			
					this.set("total", kendo.toString(0, "c", this.get("sub_code")));

					this.set("totalQuantity", 0);
		    	}    	
			},
			itemChange 			: function(e){								
				var data = e.data;				
		        var rate = this.get("rate");		        
		        var item = itemDS.get(data.item_id);		 
		        		        
	    		data.set("description", item.name);
		        data.set("unit_price", item.price/rate);
		        	        
		        this.change();	                	        	
			},
			getCurrencyRateByCode 	: function(code){
				var rate = 0;			
				$.each(currencyRateDS.data(), function(index, value){	        	
		        	if(code===value.code){	        		
		        		rate = value.rate;
		        		return false;
		        	}	        	
		        });
				
		        return kendo.parseFloat(rate);
			},

		    add 				: function(){
		    	var self = this;
		    	var rate = this.get("rate");

		    	var t = this.get("total");
		        var tt = Number(t.replace(/[^0-9\.]+/g,""));

		        var v = this.get("vat");
		        var vv = Number(v.replace(/[^0-9\.]+/g,""));

		        //Modify invoice item
		        $.each(invoiceItemDS.data() ,function(index, data){
		        	data.set("id", 0);
		        	data.set("invoice_id", 0);		        	
		        });

		        //Add invoice to datasource	
		    	invoiceDS.add({
		    		'number' 			: this.get("number"),
				   	'type'				: "GDN",				   					   				   	
				   	'amount'			: tt*rate,
				   	'rate'				: rate,
				   	'vat'				: vv*rate,
				   	'vat_id'			: this.get("vat_id"),
				   	'status' 			: 0,
				   	'sub_code'			: this.get("sub_code"),
				   	'biller' 			: this.get("biller"),
				   	'customer_id' 		: this.get("customer").id,			   	
				   	'address' 			: this.get("address"),
				   	'issued_date' 		: kendo.toString(this.get("issued_date"),"yyyy-MM-dd"),				   	   	
				   	'class_id' 			: this.get("class_id"),
				   	'memo' 				: this.get("memo"),
				   	'memo2'				: this.get("memo2"),
				   	'company_id'		: this.get("customer").company_id,
				   	
				   	'invoice_items'		: invoiceItemDS.data()
		    	});
		    				
		    	invoiceDS.sync();
		    	this.clear();		    	
		    },
		    update 				: function(id){
		    	var d = invoiceDS.get(id);
		    	var rate = this.get("rate");

		    	var t = this.get("total");
		        var tt = Number(t.replace(/[^0-9\.]+/g,""));

		        var v = this.get("vat");
		        var vv = Number(v.replace(/[^0-9\.]+/g,""));
			  					   				   	
			   	d.set("amount", tt*rate);
			   	d.set("vat", vv*rate);			   	
			   	d.set("vat_id",  this.get("vat_id"));				  	  
				d.set("issued_date", kendo.toString(new Date(this.get("issued_date")),"yyyy-MM-dd"));				
				d.set("address", this.get("address"));				
				d.set("class_id", this.get("class_id"));			
				d.set("memo", this.get("memo"));
				d.set("memo2", this.get("memo2"));				

				//Adding invoice id to invoice item
		        $.each(invoiceItemDS.data() ,function(index, data){
		        	data.set("invoice_id", id);
		        });
				
				customerDS.sync();
				invoiceDS.sync();
				invoiceItemDS.sync();						
		    },		    
		    clear 				: function(){
		    	this.setNumber();		    		
		    	
				this.set("memo", "");
				this.set("memo2", "");
				this.set("class_id", "");
				this.set("sub_total", "");
				this.set("vat_id", "");
				this.set("vat", "");	
				this.set("total", "");
				
				//Remove datasources
				invoiceDS.data([]);				
				invoiceItemDS.data([]);					
		    }
		});

		return {
			viewModel 		: viewModel
		};	
	}());

	banhji.statement = (function(){		
		var companyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/companies/company",
					type: "GET",
					dataType: "json"
				}			
			},
			serverFiltering: true
		});		
		
		var customerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "GET",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "PUT",
					dataType: "json"
				}
			},		
			schema: {
				model: {
					id: "id"
				}
			},			
			serverFiltering: true
		});			

		var statementDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/statement",
				  	type: "GET",
				  	dataType: "json"		  
			  	}
		  	},
		  	aggregate: [
			    { field: "amount", aggregate: "sum" }
			],
		  	serverFiltering: true	
		});

		var agingDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/aging",
				  	type: "GET",
				  	dataType: "json"		  
			  	}			  	
		  	},
		  	serverFiltering: true
		});	

		
		var viewModel = kendo.observable({
			start_date 		: new Date(),
			end_date 		: new Date(),											
			amount_due 		: kendo.toString(0, "c", banhji.customer.viewModel.get("sub_code")),

			statementList 	: statementDS,
			agingList 		: agingDS,
			
			pageLoad 		: function(){
				var cus = banhji.customer.viewModel.get("customer");

				var fullname = "";
				if(cus.company!==""){
					var fullname = cus.company;					
				}else{
					var fullname = cus.surname + ' ' + cus.name;					
				}

				var fullIdName = cus.number + ' ' + fullname;
				
				this.set("customer_id", cus.id);			
				this.set("fullname", fullname);
				this.set("fullIdName", fullIdName);
				this.set("address", cus.address);							
			},
			statement_date_text : function(){
				return kendo.toString(this.get("statement_date"), "dd-MM-yyyy");
			},
			loadStatement 	: function(){
				var self = this;
				var cus = banhji.customer.viewModel.get("customer");

				statementDS.filter({
					filters: [
						{ field: "customer_id", value: cus.id },
						{ field: "start_date", value: kendo.toString(this.get("start_date"), "yyyy-MM-dd") },
						{ field: "end_date", value: kendo.toString(this.get("end_date"), "yyyy-MM-dd") }
					]
				});
				statementDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;

					if(type==="read"){
						var total = 0;						
						if(response.length>0){
							var last = response[response.length-1];
							total = kendo.parseFloat(last.balance);
						}					  					  	
					  	self.set("amount_due", kendo.toString(total, "c", banhji.customer.viewModel.get("sub_code")));					  
				  	}			  	  			  	
				});	
								
				agingDS.filter({
					filters: [
						{ field: "customer_id", value: cus.id },
						{ field: "start_date", value: kendo.toString(this.get("start_date"), "yyyy-MM-dd") },
						{ field: "end_date", value: kendo.toString(this.get("end_date"), "yyyy-MM-dd") }
					]
				});
			},			
			printStatement 		: function(){
				$("#divStatement").print();
			},
			clear 	 			: function(){
				this.set("amount_due", kendo.toString(0, "c", banhji.customer.viewModel.get("sub_code")));

				statementDS.data([]);
				agingDS.data([]);				
			}
		});
		
		return {
			viewModel 		: viewModel
		};	
	}());

	banhji.eMeter = (function(){
		var meter_type_id = 1;
		var breaker_type_id = 2;

		var customerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "GET",
					dataType: "json"
				},				
				update: {
					url: banhji.baseUrl + "api/people_api/people",
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
			serverFiltering: true
		});

		var meterDS = new kendo.data.DataSource({
			transport: {	
		  	  	read:  {
				  	url: banhji.baseUrl + "api/meters/meter",
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url: banhji.baseUrl + "api/meters/meter",
				  	type: "PUT",
				  	dataType: "json"
			  	},
			  	destroy: {
				  	url: banhji.baseUrl + "api/meters/meter",
				  	type: "DELETE",
				  	dataType: "json"
			  	},  
			  	create: {
				  	url: banhji.baseUrl + "api/meters/meter",
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
			},
			requestEnd : function(e){
				var type = e.type;
				if(type==="create" || type==="update"){  				
	  				meterDS.read();				
	  			}  			
			},
			serverFiltering: true
		});

		var breakerDS = new kendo.data.DataSource({
			transport: {
			  	read:  {
				  	url: banhji.baseUrl + "api/breakers/breaker",
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url: banhji.baseUrl + "api/breakers/breaker",
				  	type: "PUT",
				  	dataType: "json"
			  	},
			  	destroy: {
				  	url: banhji.baseUrl + "api/breakers/breaker",
				  	type: "DELETE",
				  	dataType: "json"
			  	},	  
			  	create: {
				  	url : banhji.baseUrl + "api/breakers/breaker",
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
		  	},
		  	requestEnd : function(e){
				if(e.type==="create" || e.type==="update"){
	  				breakerDS.read();
	  			}
			},
			serverFiltering: true
		});

		var meterItemDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/item_by",
					type: "GET",
					dataType: "json"
				}
			},
			serverFiltering: true,				
			filter:	{ field: "parent_id", value: meter_type_id }
		});

		var breakerItemDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/item_by",
					type: "GET",
					dataType: "json"
				}
			},
			serverFiltering: true,				
			filter: { field: "parent_id", value: breaker_type_id }
		});

		var parentMeterDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/meters/meter",
					type: "GET",
					dataType: "json"
				}
			},
			serverFiltering: true		
		});

		var electricityBoxDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricity_boxes/electricity_box",
					type: "GET",
					dataType: "json"
				}
			},
			serverFiltering: true
		});

		var electricityPoleDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricity_poles/electricity_pole",
					type: "GET",
					dataType: "json"
				}
			},
			serverFiltering: true
		});

		var meterReadingDS = new kendo.data.DataSource({
		  	transport: {	
		  	  	read:  {
				  	url: banhji.baseUrl + "api/meters/meter_reading",
				  	type: "GET",
				  	dataType: "json"
			  	}
		  	},	  	
		  	serverFiltering: true
		});

		var meterRecordDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/meter_records/meter_record",
					type: "GET",
					dataType: "json"
				},
				update: {
				  	url: banhji.baseUrl + "api/meter_records/meter_record",
				  	type: "PUT",
				  	dataType: "json"
			  	},
			  	create: {
				  	url: banhji.baseUrl + "api/meter_records/meter_record_batch",
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
		  	},
		  	sort: { field: "date_read_from", dir: "desc" },
		  	serverPaging: true,	  	
			pageSize: 12,
			serverFiltering: true		
		});

		var usageDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/meter_records/usage",
					type: "GET",
					dataType: "json"
				}
			},	  		  	
			serverFiltering: true		
		});

		var readerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/employees/index",
					type: "GET",
					dataType: "json"
				}
			},
			schema: {
				data: "employees",
				total: "total"
			}		
		});

		var planItemDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/plan_items/plan_item",
				  	type: "GET",
				  	dataType: "json"
			  	}
		  	},  
		  	sort: { field: "start_date", dir: "desc" }
		});

		var tariffDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/tariffs/tariff",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var tariffItemDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/tariff_items/tariff_item",
				  	type: "GET",
				  	dataType: "json"
			  	}
		  	},  
		  	sort: { field: "usage", dir: "desc" },
	  		serverSorting: true  
		});

		var exemptionDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/exemptions/exemption",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var maintenanceDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/maintenances/maintenance",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var paymentTermDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/payment_terms/payment_term",
					type: "GET",
					dataType: "json"
				}
			}		
		});

		var currencyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/currencies/index",
					type: "GET",
					dataType: "json"
				}
			}		
		});

		var classDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/classes/class",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "type", value: "Class" },
			serverFiltering: true		
		});

		var transformerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/transformer_cascading",
					type: "GET",
					dataType: "json"
				}
			},
			serverFiltering: true
		});

		var viewModel = kendo.observable({
			customer_id 		: 0,
			meter_id			: 0,
			meter_no			: "",
			multiplier			: 1,
			max_digit 			: "",		
			status				: 1,//Active	
			ear_sealed			: 1,
			cover_sealed		: 1,	
			tariff_id			: "",
			memo				: "",

			fullIdName 			: "",	
			
			item_id				: "",
			electricity_box_id	: "",
			date_used			: new Date(),	
			parent_id 			: "",

			transformer_id		: "",	
			electricity_pole_id	: "",

			statuses			: [
		        { name: "ប្រើប្រាស់", value: "1" },
		        { name: "ឈប់ប្រើ", value: "0" }	        
		    ],
			hasOrNot			: [
		        { name: "មាន", value: "1" },
		        { name: "គ្មាន", value: "0" }	        
		    ],
								
			//Breaker
			breaker_id			: 0,
			name_brker			: "",
			status_brker		: 1,//Active
			item_id_brker		: "",	
			date_used_brker		: new Date(),
						
			hasTariff			: false,
			isEditMode 			: false,
			isEditModeBrker		: false,

			selectedRow			: null,
			selectedRowBrker	: null,

			meterList			: meterDS,
			meterItemList 		: meterItemDS,
			parentMeterList		: parentMeterDS,
			
			breakerList 		: breakerDS,
			breakerItemList 	: breakerItemDS,
			
			tariffList 			: tariffDS,
			transformerList 	: transformerDS,
			electricityBoxList 	: electricityBoxDS,
			electricityPoleList : electricityPoleDS,
				
			pageLoad 			: function(customer_id){								
				this.loadMeter(customer_id);

				var cus = banhji.customer.viewModel.get("customer");
				var fullIdName = cus.number +" "+ cus.surname +" "+ cus.name;
				this.set("fullIdName", fullIdName);
			},
			loadMeter 			: function(customer_id){
				this.set("customer_id", customer_id);

				parentMeterDS.filter({
					filters: [
						{ field: "customer_id", value: customer_id },
						{ field: "parent_id", value: 0 },
						{ field: "status", value: 1 }					
					]
				});

				meterDS.filter({ field: "customer_id", value: customer_id });
				breakerDS.filter({ field: "customer_id", value: customer_id });
			},		
			clearTariff 		: function(){
	      		this.set("tariff_id", "");
	      	},

			//Meter				
	      	openMeterWindow		: function(){
	         	var window = $("#meter-window").data("kendoWindow");
	          	window.title("កុងទ័រ");          	
	          	window.center().open();
	      	},
	      	closeMeterWindow 	: function(){
	      		var window = $("#meter-window").data("kendoWindow");          	         	
	          	window.center().close();
	      	},      	
	      	btnAddNewMeterClick : function(){
	      		this.set("isEditMode", false)
	      		this.clearMeter();
	      		this.openMeterWindow();
	      	},
	      	meterSaveClick 		: function(){
	      		if(this.get("isEditMode")){
	      			this.updateMeter();
	      		}else{
	      			this.addMeter();
	      		}
	      		this.closeMeterWindow();
	      	},
	      	addMeter 			: function(){
	      		meterDS.add({				
					type				: "electricity",
					meter_no			: this.get("meter_no"),
					multiplier			: this.get("multiplier"),
					max_digit			: this.get("max_digit"),		
					status				: this.get("status"),	
					ear_sealed			: this.get("ear_sealed"),
					cover_sealed		: this.get("cover_sealed"),	
					tariff_id			: this.get("tariff_id"),
					memo				: this.get("memo"),	
					customer_id			: this.get("customer_id"),
					item_id				: this.get("item_id"),
					transformer_id		: this.get("transformer_id"),
					electricity_box_id	: this.get("electricity_box_id"),
					date_used			: kendo.toString(new Date(this.get("date_used")), "yyyy-MM-dd"),	
					parent_id 			: this.get("parent_id"),

					items				: "",
				   	electricity_boxes	: "",			   			   	
				   	parents				: ""
				});
				
				meterDS.sync();
	      	},
	      	updateMeter 		: function(){
	      		var meter_id = this.get("meter_id");      		
				var meter = meterDS.get(meter_id);
				
				meter.set("meter_no", this.get("meter_no"));
				meter.set("multiplier", this.get("multiplier"));
				meter.set("max_digit", this.get("max_digit"));
				meter.set("status", this.get("status"));			
				meter.set("ear_sealed", this.get("ear_sealed"));
				meter.set("cover_sealed", this.get("cover_sealed"));
				meter.set("tariff_id", this.get("tariff_id"));
				meter.set("memo", this.get("memo"));								  	  
				meter.set("item_id", this.get("item_id"));
				meter.set("transformer_id", this.get("transformer_id"));	
				meter.set("electricity_box_id", this.get("electricity_box_id"));	
				meter.set("date_used", kendo.toString(new Date(this.get("date_used")), "yyyy-MM-dd"));
				meter.set("parent_id",	this.get("parent_id"));
					
				meterDS.sync();						
	      	},
	      	deleteMeter 		: function(){
	      		if (confirm("តើលោកអ្នកពិតជាចង់លុបទិន្នន័យនេះមែនឬទេ?")) {
	      			var meter_id = this.get("meter_id");
	      			var meter = meterDS.get(meter_id);
	  				meterDS.remove(meter);
		            meterDS.sync();
		            this.closeMeterWindow();	            
		        }
	      	},
	      	meterGridChange		: function(eventArgs) {
	        	this.set("selectedRow", eventArgs.sender.dataItem(eventArgs.sender.select()));

	        	this.set("isEditMode", true);
	        	this.set("meter_id", this.get("selectedRow").id);

	        	this.set("meter_no", this.get("selectedRow").meter_no);
				this.set("multiplier", this.get("selectedRow").multiplier);
				this.set("max_digit", this.get("selectedRow").max_digit);
				this.set("status", this.get("selectedRow").status);			
				this.set("ear_sealed", this.get("selectedRow").ear_sealed);
				this.set("cover_sealed", this.get("selectedRow").cover_sealed);
				this.set("tariff_id", this.get("selectedRow").tariff_id);
				this.set("memo", this.get("selectedRow").memo);									  	  
				this.set("item_id", this.get("selectedRow").item_id);
				this.set("transformer_id", this.get("selectedRow").transformer_id);	
				this.set("electricity_box_id", this.get("selectedRow").electricity_box_id);	
				this.set("date_used", new Date(this.get("selectedRow").date_used));
				this.set("parent_id", this.get("selectedRow").parent_id);

				this.set("electricity_pole_id", this.get("selectedRow").electricity_boxes.electricity_pole_id);
				if(this.get("selectedRow").tariff_id>0){
					this.set("hasTariff", true);
				}else{
					this.set("hasTariff", false);
				}			

				this.openMeterWindow();
	    	},
	    	clearMeter 			: function(){
	    		this.set("meter_no", "");
				this.set("multiplier", 1);
				this.set("max_digit", "");
				this.set("status", 1);			
				this.set("ear_sealed", 1);
				this.set("cover_sealed", 1);
				this.set("tariff_id", "");
				this.set("memo", "");									  	  
				this.set("item_id", "");
				this.set("transformer_id", "");	
				this.set("electricity_box_id", "");	
				this.set("date_used", new Date());
				this.set("parent_id", "");

				this.set("electricity_pole_id", "");
				this.set("hasTariff", false);									
	    	},	    	

	    	//Breaker
	    	openBreakerWindow	: function(e){
	         	var window = $("#breaker-window").data("kendoWindow");
	          	window.title("ឌីស្យុងទ័រ");          	
	          	window.center().open();
	      	},
	      	closeBreakerWindow 	: function(){
	      		var window = $("#breaker-window").data("kendoWindow");          	         	
	          	window.center().close();
	      	},      	
	      	btnAddNewBreakerClick: function(){
	      		this.set("isEditModeBrker", false)
	      		this.clearBreaker();
	      		this.openBreakerWindow();
	      	},
	      	breakerSaveClick 	: function(){
	      		if(this.get("isEditModeBrker")){
	      			this.updateBreaker();
	      		}else{
	      			this.addBreaker();
	      		}
	      		this.closeBreakerWindow();
	      	},
	      	addBreaker			: function(){
	      		breakerDS.add({				
					name			: this.get("name_brker"),						
					status			: this.get("status_brker"),				
					customer_id		: this.get("customer_id"),
					item_id			: this.get("item_id_brker"),				
					date_used		: kendo.toString(new Date(this.get("date_used_brker")), "yyyy-MM-dd"),
					items 			: ""
				});
				
				breakerDS.sync();							
	      	},
	      	updateBreaker		: function(){
	      		var breaker_id = this.get("breaker_id");      		
				var breaker = breakerDS.get(breaker_id);
				
				breaker.set("name", this.get("name_brker"));			
				breaker.set("status", this.get("status_brker"));			
				breaker.set("customer_id", this.get("customer_id"));						  	  
				breaker.set("item_id", this.get("item_id_brker"));			
				breaker.set("date_used", kendo.toString(new Date(this.get("date_used_brker")), "yyyy-MM-dd"));
								
				breakerDS.sync();					
	      	},
	      	deleteBreaker 		: function(){
	      		if (confirm("តើលោកអ្នកពិតជាចង់លុបទិន្នន័យនេះមែនឬទេ?")) {
	      			var breaker_id = this.get("breaker_id");
	      			var breaker = breakerDS.get(breaker_id);
	  				breakerDS.remove(breaker);
		            breakerDS.sync();
		            this.closeBreakerWindow();	            
		        }
	      	},
	      	breakerGridChange		: function(eventArgs) {
	        	this.set("selectedRowBrker", eventArgs.sender.dataItem(eventArgs.sender.select()));

	        	this.set("isEditModeBrker", true);
	        	this.set("breaker_id", this.get("selectedRowBrker").id);

	        	this.set("name_brker", this.get("selectedRowBrker").name);			
				this.set("status_brker", this.get("selectedRowBrker").status);								  	  
				this.set("item_id_brker", this.get("selectedRowBrker").item_id);			
				this.set("date_used_brker", new Date(this.get("selectedRowBrker").date_used));
				
				this.openBreakerWindow();
	    	},
	    	clearBreaker 			: function(){
	    		this.set("name_brker", "");			
				this.set("status_brker", 1);										  	  
				this.set("item_id_brker", "");			
				this.set("date_used_brker", new Date());								
	    	}
	    });

	    var readingSingleModel = kendo.observable({
	    	customer_id 		: 0,		
			reader_id			: "",
			month_of 			: new Date(),
			date_read_from		: new Date(),
			date_read_to		: new Date(),
			total_active		: 0,
			total_reactive		: 0,			

			//Edit
			editData			: null,
			max_digit 			: 0,
		
			invoice_id 			: 0,		
			new_reading 		: 0,
			new_round 			: false,		

			hasReactive 		: false,		
			reactive_new_reading: 0,
			reactive_new_round 	: false,

			active_usage 		: 0,
			reactive_usage 		: 0,

			//Edit invoice
			isVisible 			: false,			
			
			invoiceItemList 	: [],
			biller 				: banhji.config.userData.userId,
			issued_date			: new Date(),
			payment_date 		: new Date(),
			due_date 			: "",

			meterRecords  		: [],
			meterReadingList	: meterReadingDS,			
			readerList 			: readerDS,		

			pageLoad 			: function(customer_id){				
				this.loadReading(customer_id);

				planItemDS.read();
				tariffDS.read();
				tariffItemDS.read();
				maintenanceDS.read();
				exemptionDS.read();				
			},
			loadReading 		: function(customer_id){
				this.set("customer_id", customer_id);			

				meterReadingDS.filter({
					filters: [
						{ field: "customer_id", value: customer_id },
						{ field: "status", value: 1 }					
					]
				});
			},
			setDueDate			: function(){
				var duedate = new Date();
				duedate.setDate(duedate.getDate()+7);
				this.set("due_date", duedate);
			},	      	
	      	change 				: function(e){      		
	      		var d = e.data;
	  			var totalActive = 0;
	  			var totalReactive = 0;  			
	  			var totalUnread = this.get("total_meter");
	  			
				for(var i=0; i < meterReadingDS.total(); i++) {
					var data = meterReadingDS.at(i);
					
					if(data.new_reading!==""){					
						var newRound = 0;
						if(data.checkNewRound){
							newRound = data.max_digit;						
						}
						totalActive += (kendo.parseInt(data.new_reading) + kendo.parseInt(newRound)) - kendo.parseInt(data.prev_reading);
											
					}

					if(data.reactive_new_reading!==""){					
						var reactiveNewRound = 0;
						if(data.rcheckNewRound){
							reactiveNewRound = data.max_digit;
						}										
						totalReactive += (kendo.parseInt(data.reactive_new_reading) + kendo.parseInt(reactiveNewRound)) - kendo.parseInt(data.reactive_prev_reading);					
					}					
				}			

				this.set("total_active", totalActive);
				this.set("total_reactive", totalReactive);									
	      	},
	      	validation 			: function() {
				var result = true;																					
				for(var i=0; i < meterReadingDS.total(); i++) {
					var data = meterReadingDS.at(i);
					var r = true;
					
					//Validate on new reading
					var active_usage = 0;				
					if(data.new_reading!==""){					
						//Validate on date
						var dateReadTo = kendo.toString(new Date(this.get("date_read_to")), "yyyy-MM-dd");					
						var monthOf = new Date(this.get("month_of"));
						monthOf.setDate(1);
						monthOf = kendo.toString(monthOf, "yyyy-MM-dd");																
						if(monthOf <= data.meter_records.month_of){
							result = false;
							r = false;						
							$("#msgD-"+data.id).text("!");
						}else{
							$("#msgD-"+data.id).text("");
						}
						
						var newRound = 0;
						if(data.checkNewRound){
							newRound = data.max_digit;
						}
						active_usage = (parseInt(data.new_reading) + newRound) - data.prev_reading;											
					}
					if(active_usage<0){
						result = false;
						r = false;
						$("#msg-"+data.id).text("!");						
					}else{
						$("#msg-"+data.id).text("");
					}

					//Validate on reactive new reading
					var reactive_usage = 0;
					if(data.reactive_new_reading!==""){
						var reactiveNewRound = 0;
						if(data.rcheckNewRound){
							reactiveNewRound = data.max_digit;
						}
						reactive_usage = (parseInt(data.reactive_new_reading) + reactiveNewRound) - data.reactive_prev_reading;						
					}

					if(reactive_usage<0){
						result = false;
						r = false;
						$("#msgR-"+data.id).text("!");						
					}else{
						$("#msgR-"+data.id).text("");
					}
					
					//Highlight invalid input each rows
					if(r==false){
						$("#rowGrid-"+data.id).addClass("alert alert-error");
					}else{
						$("#rowGrid-"+data.id).removeClass("alert alert-error");
					}																
				}

				//Validate on reader
				if(!(this.get("reader_id")>0)){
					result = false;				
					$("#reader").text("!").addClass("alert alert-error");					
				}else{
					$("#reader").text("").removeClass("alert alert-error");
				}			
			
				return result;
			},
	      	addMeterRecord 		: function(){
	      		if(this.validation()){
	      			var dateReadTo = kendo.toString(this.get("date_read_to"), "yyyy-MM-dd");
	      			var monthOf = new Date(this.get("month_of"));
					monthOf.setDate(1);
					monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

	      			for(var i=0; i < meterReadingDS.total(); i++) {
						var data = meterReadingDS.at(i);
						
						if(data.new_reading!==""){
							var newRound = 0;
							if(data.checkNewRound){
								newRound = data.max_digit;
							}
							var rnewRound = 0;
							if(data.rcheckNewRound){
								rnewRound = data.max_digit;
							}

							this.meterRecords.push({				
								meter_id				: data.id,
							   	prev_reading			: data.prev_reading,
							   	new_reading 			: data.new_reading,
							   	new_round				: newRound,
							   	reactive_prev_reading	: data.reactive_prev_reading,								   
							   	reactive_new_reading	: data.reactive_new_reading,
							   	reactive_new_round		: rnewRound,		   
							   	is_backup_reading 		: data.parent_id>0 ? 1 : 0,
							   	month_of 				: monthOf,
							   	date_read_from			: kendo.toString(this.get("date_read_from"), "yyyy-MM-dd"),						   
							   	date_read_to			: kendo.toString(this.get("date_read_to"), "yyyy-MM-dd"),
							   	reader 					: this.get("reader_id"),
							   	invoice_id				: 0 //No invoice yet					   	
							});
						}
					}	

					if(this.get("meterRecords").length>0){
						meterRecordDS.add(this.get("meterRecords"));
						meterRecordDS.sync();

						this.clearMeterRecord();
						
						$(".AddMeterRecordStatus").text("").removeClass("alert alert-error");
						$(".AddMeterRecordStatus").text("កត់ត្រាបានសំរេច").addClass("alert alert-success");
					}				
				}else{
					$(".AddMeterRecordStatus").text("សូមត្រួតពិនិត្រឪ្យបានត្រឺមត្រូវម្ដងទៀត").addClass("alert alert-error");
				}
	      	},
	      	openWindow			: function(){
	         	var window = $("#meterRecord-window").data("kendoWindow");
	          	window.title("កំនែអំនាន");          	
	          	window.center().open();
	      	},
	      	closeWindow 		: function(){
	      		var window = $("#meterRecord-window").data("kendoWindow");          	         	
	          	window.center().close();
	      	},
	      	clearMeterRecord 		: function(){
	      		this.set("meterRecords", []);

				//Remove meter records
				for (var i=0; i< meterRecordDS.total(); i++) {
					var dataItem = meterRecordDS.at(i);
		  			meterRecordDS.remove(dataItem);
				}			
		    },      	
	      	
	      	//Edit reading
	      	editReadingClick 	: function(e){
	      		var d = e.data;

	      		this.set("editData", d);
	      		this.set("invoice_id", d.meter_records.invoice_id);

	      		this.set("max_digit", d.max_digit);

	      		this.set("new_reading", d.meter_records.new_reading);
	      		this.set("reactive_new_reading", d.meter_records.reactive_new_reading);     		
	      		      		
	      		if(d.meter_records.new_round==0){
	      			this.set("new_round", false);
	      		}else{
	      			this.set("new_round", true);
	      		}
	      		      				
	      		if(d.meter_records.reactive_new_round==0){
	      			this.set("reactive_new_round", false);
	      		}else{
	      			this.set("reactive_new_round", true);
	      		}

	      		if(d.tariff_id>0){
	      			this.set("hasReactive", true);
	      		}else{
	      			this.set("hasReactive", false);
	      		}

	      		if(d.meter_records.invoice_id>0){
	      			this.set("isVisible", true);
	      			this.setDueDate();
	      			invoiceDS.filter({ field: "id", value: d.meter_records.invoice_id });
	      			this.getNextInvoiceID();
	      			this.set("customerBalanceList", []);
	      			this.set("invoiceItemList", []);			
	      		}else{
	      			this.set("isVisible", false);
	      		}

	      		this.editChange();
	      		this.openWindow();
	      	},
	      	editChange 			: function(){
	      		var d = this.get("editData").meter_records;

	      		var maxDigit = this.get("max_digit");

	      		var newReading = this.get("new_reading");
	      		var rNewReading = this.get("reactive_new_reading");  

	      		var newRound = this.get("new_round");      		
	      		var rNewRound = this.get("reactive_new_round");

	      		var newRoundValue = 0;
	      		if(newRound){
	      			newRoundValue = maxDigit;
	      		}
	      		var activeUsage = kendo.parseInt(newReading) + kendo.parseInt(newRoundValue) - kendo.parseInt(d.prev_reading);

	      		var rNewRoundValue = 0;
	      		if(rNewRound){
	      			rNewRoundValue = maxDigit;
	      		}
	      		var reactiveUsage = kendo.parseInt(rNewReading) + kendo.parseInt(rNewRoundValue) - kendo.parseInt(d.reactive_prev_reading);

	      		this.set("active_usage", activeUsage);
	      		this.set("reactive_usage", reactiveUsage);
	      	},      	
	      	saveEditClick 		: function(){
	      		var activeUsage = kendo.parseInt(this.get("active_usage"));
	      		var reactiveUsage = kendo.parseInt(this.get("reactive_usage"));
	      		var maxDigit = this.get("max_digit");

	      		if(activeUsage>=0 && reactiveUsage >=0){
	      			var d = this.get("editData").meter_records;
		      		var id = d.id;
		      		var invoiceId = kendo.parseInt(d.invoice_id);	      		
		      		if(invoiceId>0){
		      			invoiceId = this.get("next_inv_id");
		      		}

		      		var newRound = 0;
		      		if(this.get("new_round")){
		      			newRound = maxDigit;
		      		}

		      		var rnewRound = 0;
		      		if(this.get("reactive_new_round")){
		      			rnewRound = maxDigit;
		      		}

		      		var data = [];
		      		data.push({
		      			'new_reading' 			: this.get("new_reading"),
		      			'new_round'	  			: newRound,
		      			'reactive_new_reading' 	: this.get("reactive_new_reading"),
		      			'reactive_new_round'	: rnewRound,
		      			'invoice_id'  			: invoiceId
		      		});

		      		$.ajax({
						type: "PUT",
						url: banhji.baseUrl + "api/meter_records/meter_record_reading",
						data: {
							id 	: id,
							data: kendo.stringify(data)
						},
						dataType: "json",
						success: function (response) {
							//var data = response.d;								  
						}
					});
		      		this.modifyInvoice();
					meterReadingDS.fetch();
					this.closeWindow();				
	      		}
	      	},
	      	modifyInvoice 		: function(){
	      		var invoiceId = kendo.parseInt(this.get("invoice_id"));      		
	      		if(invoiceId>0){      			
	      			this.addInvoice();      			      			
	      		}
	      	},
	      	getNextInvoiceID	: function(){
				$.ajax({
					type: "GET",
					url: banhji.baseUrl + "api/invoices/invoice_next_id",			
					data: {type: 'Invoice'},
					dataType: "json",
					success: function (response) {
						//var data = response.d;
						meterRecordModel.set("next_inv_id", response.id);		
						meterRecordModel.set("last_invoice_no", response.last_no);			  
					}
				});
			},
	      	getTariffId  		: function(tariff_plan_id, month_of){
				var tariff_id = 0;						
				var data = planItemDS.data();			
		        for (var i = 0; i < data.length; i++) {
		            var d = data[i];
		            if((d.tariff_plan_id==tariff_plan_id) && (month_of>=d.start_date)){
		            	tariff_id = d.tariff_id;
		            	break;
		            }
		        }
		        return tariff_id;		
			},				
			addInvoice 			: function(){
				var d = this.get("editData");			
				var invoice_id = this.get("next_inv_id");		
				var last_invoice_no = this.get("last_invoice_no");

				var newReading = this.get("new_reading");
	      		var reactiveNewReading = this.get("reactive_new_reading"); 

				var activeUsage = kendo.parseInt(this.get("active_usage"));
	      		var reactiveUsage = kendo.parseInt(this.get("reactive_usage"));

	      		var newR = kendo.parseInt(this.get("active_usage"));
	      		var reactiveUsage = kendo.parseInt(this.get("reactive_usage"));

				var monthOf = this.get("month_of");
				var fullMonthOf = new Date(monthOf);
				fullMonthOf.setDate(1);
				fullMonthOf = kendo.toString(fullMonthOf, "yyyy-MM-dd");

				var invoice_no = 0;
				if(last_invoice_no.length>7){
					invoice_no = parseInt(last_invoice_no.substr(7));

					//Apply invoice no back to 0000 for the new year
					var y = parseInt(last_invoice_no.substr(3,2));
					var yof = parseInt(new Date(monthOf).getFullYear().toString().substr(2,2));			
					if(yof>y){
						invoice_no = 0;
					}					
				}			
				invoice_no++;		

				var str_inv_no = "INV" + kendo.toString(new Date(monthOf), "yy") 
										+ kendo.toString(new Date(monthOf), "MM");
			  	    		 		 		
				var inv_no = str_inv_no + kendo.toString(invoice_no, "00000");			
				
				var total_amount = 0;
				            	
	        	//Apply exemption
	        	var isFree = false;            	
				var exemp_amt =0;
				var exemption_id = d.people.exemption_id;
				var exemp = exemptionDS.get(exemption_id);

				//Exempint free 100%
				if((exemption_id>0) && (exemp.exemption_type=="%") && (exemp.amount==1)){
					isFree = true;	
				}

				if(isFree==false){
					//Apply maintenance
					var maintenance_id = d.people.maintenance_id;
					var maintenances = maintenanceDS.get(maintenance_id);

					//Apply tariff
					var price = 0;
					var tariff_amt = 0;
					var active_usage = d.active_usage;

					var tariff_id = this.getTariffId(d.people.tariff_plan_id, d.meter_records.month_of);				
					var tariffs = tariffDS.get(tariff_id);
					
					//Apply tariff to active usage							
					//Exemption for kWh
					if((exemption_id>0) && (exemp.exemption_type=="kWh")){
						if(active_usage>exemp.amount){
							active_usage -= exemp.amount;
						}			
					}				
						
					//Apply tariff item				
					var dataj = tariffItemDS.data();
					for (var j=0;j<dataj.length;j++){				 
						var dj = dataj[j];
						if((dj.tariff_id==tariff_id) && (active_usage>=dj.usage)){												
							if(dj.is_flat==0){														
								price = dj.price;
								tariff_amt = active_usage * price;																											
							}else{																					
								price = dj.amount;
								tariff_amt = dj.amount;											
							}
							break;						
						}
					}
										
					//Add active item
					this.invoiceItemList.push({
						invoice_id	: invoice_id,
						item_id		: 0,	
						description	: tariffs.name,
						multiplier	: d.multiplier,
						quantity	: active_usage,	  
						unit_price	: price,
						vat			: 0,		  	  
						amount		: tariff_amt,
						meter_id 	: d.meter_id,
						prev_reading: d.prev_reading,
						new_reading : d.new_reading	
					});		
					total_amount += tariff_amt;
					
					//Add exemption for kWh
					if((exemption_id>0) && (exemp.exemption_type=="kWh") && (exemp.amount >0)){
						if(active_usage>exemp.amount){		
							//Add exemption for kWh
							this.invoiceItemList.push({
								invoice_id	: invoice_id,
								item_id		: 0,									
								description	: exemp.name,
								multiplier	: 0,
								quantity	: 1,	  
								unit_price	: 0,
								vat			: 0,		  	  
								amount		: 0,
								meter_id 	: 0,
								prev_reading: 0,
								new_reading : 0,
								exemption_id: exemption_id
							});							
						}	
					}				

					//Apply tariff item for reactive usage			
					var reactive_tariff_amt = 0;
					var reactive_price = 0;
					var reactive_usage = d.reactive_usage;
										
					var datak = tariffItemDS.data();				
					for (var k=0;k<datak.length;k++){				 
						var dk = datak[k];								
						if((dk.tariff_id==d.tariff_id) && (reactive_usage>=dk.usage)){
							if(dk.is_flat==0){
								reactive_price = dk.price;
								reactive_tariff_amt = reactive_usage * reactive_price;																				
							}else{
								reactive_price = dk.amount;
								reactive_tariff_amt = dk.amount;				
							}
							break;																			
						}	
					}

					//Add reactive item
					if(reactive_tariff_amt>0){
						this.invoiceItemList.push({
							invoice_id	: invoice_id,
							item_id		: 0,	
							description	: 'អំនាន Reactive',
							multiplier	: d.multiplier,
							quantity	: reactive_usage,	  
							unit_price	: reactive_price,
							vat			: 0,		  	  
							amount		: reactive_tariff_amt,
							meter_id 	: 0,
							prev_reading: d.reactive_prev_reading,
							new_reading : d.reactive_new_reading	
						});		
						total_amount += reactive_tariff_amt;
					}

					//Exemption for %
					if((exemption_id>0) && (exemp.exemption_type=="%") && (exemp.amount >0)){
						exemp_amt = total_amount * exemp.amount;					
								
						//Add exemption for %					
						this.invoiceItemList.push({
							invoice_id	: invoice_id,
							item_id		: 0,	
							description	: exemp.name,
							multiplier	: 0,
							quantity	: 1,	  
							unit_price	: 0,
							vat			: 0,		  	  
							amount		: (exemp_amt*-1),
							meter_id 	: 0,
							prev_reading: 0,
							new_reading : 0,
							exemption_id: exemption_id
						});
						total_amount -= exemp_amt;								
					}
					
					//Exemption for Money
					if((exemption_id>0) && (exemp.exemption_type=="៛") && (exemp.amount >0)){
						if(total_amount>exemp.amount){
							exemp_amt = exemp.amount;	
						}else{
							exemp_amt = total_amount;	
						}
						
						//Add exemption for Money
						this.invoiceItemList.push({
							invoice_id	: invoice_id,
							item_id		: 0,	
							description	: exemp.name,
							multiplier	: 0,
							quantity	: 1,	  
							unit_price	: 0,
							vat			: 0,		  	  
							amount		: (exemp_amt*-1),
							meter_id 	: 0,
							prev_reading: 0,
							new_reading : 0,
							exemption_id: exemption_id
						});
						total_amount -= exemp_amt;				
					}
												
					//Add maintenance
					if((maintenance_id>0) && (maintenances.amount>0)){	
						this.invoiceItemList.push({
							invoice_id	: invoice_id,
							item_id		: 0,	
							description	: maintenances.name,
							multiplier	: 0,
							quantity	: 1,	  
							unit_price	: parseFloat(maintenances.amount),
							vat			: 0,		  	  
							amount		: parseFloat(maintenances.amount),
							meter_id 	: 0,
							prev_reading: 0,
							new_reading : 0,
							maintenance_id: maintenance_id
						});
						total_amount += parseFloat(maintenances.amount);
					}

					//Add invoice into []        		 		
					var inv_no = str_inv_no + kendo.toString(invoice_no, "00000");								
					invoiceDS.add({
						number			: inv_no,
						type 			: "eInvoice",
						amount 			: total_amount,	  
						status			: this.get("status"),
						biller			: this.get("biller"),	  
						customer_id		: d.people.id,
						address			: d.people.house_no + ' ' + d.people.street_no,
						issued_date		: kendo.toString(new Date(this.get("issued_date")), "yyyy-MM-dd"),
						payment_date	: kendo.toString(new Date(this.get("payment_date")), "yyyy-MM-dd"),				
						due_date		: kendo.toString(new Date(this.get("due_date")), "yyyy-MM-dd"),
						month_of 		: monthOf,
						date_read_from	: kendo.toString(new Date(d.date_read_from), "yyyy-MM-dd"),
						date_read_to	: kendo.toString(new Date(d.date_read_to), "yyyy-MM-dd"),
						payment_term_id	: this.get("payment_term_id"),	  	  	
						currency_code	: this.get("currency_code"),
						class_id 		: this.get("class_id"),
						transformer_id  : d.people.transformer_id,
						box_no 			: d.electricity_boxes.box_no,
						memo			: this.get("memo"),
						company_id 		: d.people.company_id				
					});				

					invoice_id++;			
					invoice_no++;
				}
							
				//Add new customer balances to []
				var invEdit = invoiceDS.at(0);
				var balance = kendo.parseFloat(d.people.balance) + kendo.parseFloat(total_amount) - kendo.parseFloat(invEdit.total_amount);
				this.customerBalanceList.push({
					id			: kendo.parseInt(d.people.id),
					balance 	: balance
				});

				var cus = customerDS.get(this.get("customer_id"));
				cus.set("balance", balance);
				customerDS.sync();

				invoiceDS.sync();
				this.updateCustomerBalance();
				this.updateInvoiceStatus();							  	
			},			
			updateInvoiceStatus : function(){
				var id = this.get("invoice_id");
				$.ajax({
					type: "PUT",
					url: banhji.baseUrl + "api/invoices/invoice_inactive",			
					data: { id: id },
					dataType: "json",
					success: function (response) {
						//var data = response.d;			  
					}
				});				
			}
		});

		var invoiceDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
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
		  	},		  	
		  	serverFiltering : true	  	
		});

		var noticeModel = kendo.observable({
			customer_id 		: 0,					
			number 				: "",
			
			status				: 0,
			biller				: banhji.config.userData.userId,			
			address				: "",		  	  
			issued_date			: new Date(),
			due_date			: "",		
			payment_term_id		: "",		
			memo				: "",
			class_id			: "",		
									
			avg 				: 0,
			usage_per_day		: 0,		
			totalReading 		: 0,
			selectedReading		: 0,

			meter 				: null,
			
			noticeItemList 		: [],
			selectedReadingList	: [],
			invoiceList 		: [],
			averageRecordList 	: [],
			invoiceIdList		: [],

			paymentTermList		: paymentTermDS,
			currencyList		: currencyDS,
			classList 			: classDS,
			meterList 			: meterDS,
			readingList 		: meterRecordDS,				
			
			pageLoad 			: function(customer_id){
				this.loadCustomer(customer_id);

				this.setDueDate();
				this.setNumber();
				planItemDS.read();			
				tariffItemDS.read();						
			},
			loadCustomer 		: function(customer_id){
				var self = this;

				var cus = banhji.customer.viewModel.get("customer");
				this.set("customer_id", cus.id);
				this.set("class_id", cus.class_id);
				//this.set("address", cus.address);
				this.set("noticeItemList", []);

				meterDS.filter({
					filters: [
						{ field: "customer_id", value: customer_id },
						{ field: "parent_id", value: 0 },
						{ field: "status", value: 1 }					
					]
				});				
			},
			setNumber 			: function(){
		    	var self = this;
		    	$.ajax({
					type: "GET",
					url: banhji.baseUrl + "api/invoices/last_number",			
					data: { type: "Invoice" },
					dataType: "json",
					success: function (response) {
						//var data = response.d;
						var last_no = response;		
						var no = 0;
						if(last_no.length>6){
							no = parseInt(last_no.substr(6));			
						}
						no++;

						var str_inv_no = "ES" + kendo.toString(new Date(self.get("issued_date")), "yy") + kendo.toString(new Date(self.get("issued_date")), "MM");
						var number = str_inv_no + kendo.toString(no, "00000");

						self.set("number", number);
					}
				});		    	
		    },			
		    total 				: function(){
				var total = 0;	
				$.each(this.get("noticeItemList"), function(index, data) {
					var amt = ((kendo.parseInt(data.days*data.usage_per_day))*data.unit_price)-data.amount_paid;				
		            total+=amt;	            
		        });
		        return kendo.toString(total, 'c0');	
			},
		    setDueDate 			: function(){
		    	var duedate = new Date();
				duedate.setDate(duedate.getDate()+7);
				this.set("due_date", duedate);			
		    },
		    reset 				: function(){
				this.set("totalReading", 0);
				this.set("avg", 0);
				this.set("selectedReading", 0);
				this.set("usage_per_day", 0);

				var d = meterRecordDS.data();
				if(d.length>0){
					$.each(d, function(index, data) {						           
			            data.set("isCheck", false);	            
			        });	
				}

				this.avgChange();
			},		
		    getTariffId  		: function(tariff_plan_id, month_of){	    	
				var tariff_id = 0;						
				var data = planItemDS.data();						
		        for (var i = 0; i < data.length; i++) {
		            var d = data[i];	            
		            if((d.tariff_plan_id==tariff_plan_id) && (month_of>=d.start_date)){
		            	tariff_id = d.tariff_id;
		            	break;
		            }
		        }
		        return tariff_id;		
			},	      
			addNewRow 			: function(){
				var meter = this.get("meter");
				this.noticeItemList.push({				
					'invoice_id' 	: 0,
					'meter_id'		: meter.id,
					'month_of'		: "",
					'description'	: "",
					'days' 			: 0,				
					'usage_per_day' : this.get("usage_per_day"),				
					'unit_price'	: 0,				
					'amount_paid' 	: 0,
					'amount'		: 0						
				});						
			},
			removeRow 			: function(e){
				var item = e.data;
		        var index = this.get("noticeItemList").indexOf(item);        
		        this.get("noticeItemList").splice(index, 1);	        
			},		
			meterChange 		: function(){				
				var meter = this.get("meter");

				var address = meter.electricity_boxes.box_no + ' ' + meter.meter_no;
				this.set("address", address); 
				
				meterRecordDS.filter({ field: "meter_id", value: meter.id });
			},
			gridChange 			: function(eventArgs) {
		        var data = eventArgs.sender.dataItem(eventArgs.sender.select());
		        this.selectedReadingList.push(data.active_usage);
		    },	    
			avgChange			: function(){			
				var usage_per_day = this.get("usage_per_day");
				var arr = this.get("noticeItemList");
				if(arr.length>0){
					$.each(arr, function(index, data) {				
			            data.set("usage_per_day", usage_per_day);	            
			        });	
				}			    	
			},
			monthOfChange 		: function(e){		
				var d = e.data;
				var meter = this.get("meter");
				var cus = banhji.customer.viewModel.get("customer");

				var fullMonthOf = new Date(d.month_of);
				fullMonthOf.setDate(1);
				fullMonthOf = kendo.toString(fullMonthOf, "yyyy-MM-dd");

				d.set("description", "ថាមពលត្រូវរំលឹកសំរាប់ខែ " + kendo.toString(new Date(d.month_of), "MM-yyyy"));

				var tariff_id = this.getTariffId(cus.tariff_plan_id, fullMonthOf);			
				var active_usage = kendo.parseInt(d.days*d.usage_per_day);
				
				//Apply tariff item
				var price = 0;
				var dataj = tariffItemDS.data();
				for (var j=0;j<dataj.length;j++){				 
					var dj = dataj[j];								
					if((dj.tariff_id==tariff_id) && (active_usage>=dj.usage)){
						if(dj.is_flat==0){
							price = dj.price;																									
						}else{												
							price = dj.amount;										
						}
					}
				}

				d.set("unit_price", price);
			
				$.ajax({
					type: "GET",
					url: banhji.baseUrl + "api/invoice_items/by_meter_id_month_of",
					data: {
						meter_id 	: meter.id,
						month_of 	: fullMonthOf
					},
					dataType: "json",
					success: function (response) {
						//var data = response.d;
						d.set("amount_paid", response);											  
					}
				});        	        	        	
			},
			checkboxChange 		: function(){			
				var total = 0;
				var counter = 0;
				for (var i=0;i< meterRecordDS.total(); i++) {
					var d = meterRecordDS.at(i);
					
					if(d.isCheck){
						total += d.active_usage;
						counter++;
					}
				}

				var avgNum = total/counter;
				var avg = Math.ceil(avgNum * 100) / 100;

				var num = avg/30;
				var usage_per_day = Math.ceil(num * 100) / 100;
				
				this.set("totalReading", total);
				this.set("avg", avg);
				this.set("selectedReading", counter);
				this.set("usage_per_day", usage_per_day);

				this.avgChange();
			},		
		    createNotice 		: function(){	    	
		    	var arr = this.get("noticeItemList");
				if(arr.length>0){
					//Change date format
					$.each(arr, function(index, data) {
						//Month Of
						var fullMonthOf = new Date(data.month_of);
						fullMonthOf.setDate(1);
						fullMonthOf = kendo.toString(fullMonthOf, "yyyy-MM-dd");				
			            data.set("month_of", fullMonthOf);

			            //Amount
			            var amt = ((kendo.parseInt(data.days*data.usage_per_day))*data.unit_price)-data.amount_paid;
			            data.set("amount", amt);
			        });

			        //Add average record to []
			        for (var i=0; i< meterRecordDS.total(); i++) {
			    		var d = meterRecordDS.at(i);					
			            this.get("averageRecordList").push({
				    		notice_id		: 0,
				    		meter_record_id : d.id
				    	});

				    	if(d.invoice_id>0){
				    		this.get("invoiceIdList").push(d.invoice_id);
				    	}           
			        }

			        //Add invoice to datasource	
			    	invoiceDS.add({
			    		'number'			: this.get("number"),
			    		'type'				: "Notice",
			    		'customer_id' 		: this.get("customer_id"),
			    		'address'  			: this.get("address"),			   	
					   	'biller' 	 		: this.get("biller"),
					   	'issued_date' 		: kendo.toString(this.get("issued_date"),'yyyy-MM-dd'),
					   	'due_date'			: kendo.toString(new Date(this.get("due_date")),'yyyy-MM-dd'),
					   	'payment_term_id'	: this.get("payment_term_id"),				   	
					   	'class_id' 			: this.get("class_id"),
					   	'memo'				: this.get("memo"),

					   	'invoice_items'		: this.get("noticeItemList"),
					   	'average_records'	: this.get("averageRecordList")
			    	});
			    	invoiceDS.sync();
			    	this.clearDatasource();
			    	this.updateInvoiceStatus3();	
				}	        	    	
		    },
		    updateInvoiceStatus3 : function(){
				var ids = this.get("invoiceIdList");
				if(ids.length>0){
					$.ajax({
						type: "PUT",
						url: banhji.baseUrl + "api/invoices/status3",			
						data: {ids: kendo.stringify(ids)},
						dataType: "json",
						success: function (response) {
							//var data = response.d;			  
						}
					});
				}							
			},	    	    
		    clearDatasource 	: function(){	    	
				this.set("noticeItemList", []);
				this.set("averageRecordList", []);

				//Remove invoice
				invoiceDS.data([]);						
		    }
		});	

	    return {			
			viewModel 	: viewModel,
			readingSingleModel: readingSingleModel,
			noticeModel : noticeModel
		};
	}());

	banhji.eReading = (function(){		
		var meterDS = new kendo.data.DataSource({
		  	transport: {	
		  	  	read:  {
				  	url: banhji.baseUrl + "api/meter_records/reading",
				  	type: "GET",
				  	dataType: "json"
			  	}
		  	},		  	
		  	pageSize: 50,		  	
		  	serverFiltering: true
		});

		var irFileDS = new kendo.data.DataSource({
		  	transport: {	
		  	  	read:  {
				  	url: banhji.baseUrl + "api/files/meter_reading_file",
				  	type: "GET",
				  	dataType: "json"
			  	}
		  	},
		  	pageSize: 50,		  	
		  	serverFiltering: true
		});

		var unreadDS = new kendo.data.DataSource({
		  	transport: {	
		  	  	read:  {
				  	url: banhji.baseUrl + "api/meter_records/unread",
				  	type: "GET",
				  	dataType: "json"
			  	}
		  	},		  	
		  	pageSize: 50,		  	
		  	serverFiltering: true
		});

		var meterRecordDS = new kendo.data.DataSource({
		    transport: {	
		  	  	create:  {
				  	url: banhji.baseUrl + "api/meter_records/meter_record_batch",
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

		var transformerRecordDS = new kendo.data.DataSource({
		    transport: {	
		  	  	create:  {
				  	url: banhji.baseUrl + "api/electricities/transformer_record",
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

		var companyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/companies/company",
					type: "GET",
					dataType: "json"
				}
			}		
		});

		var transformerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/transformer_cascading",
					type: "GET",
					dataType: "json"
				}
			},	
			serverFiltering: true
		});

		var readerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/employees/index",
					type: "GET",
					dataType: "json"
				}
			},
			schema: {
				data: "employees",
				total: "total"
			},
			serverFiltering: true		
		});
		
		var viewModel = kendo.observable({
			company_id 		: 0,
			transformer_id 	: 0,
			meter_no 		: "",

			reader_id		: "",
			month_of 		: new Date(),
			date_read_from	: new Date(),
			date_read_to	: new Date(),
			total_meter 	: 0,
			total_read 		: 0,
			total_unread 	: 0,
			total_active	: 0,
			total_reactive	: 0,

			//Transformer
			usage 			: 0,
			
			meterRecords  	: [],

			meterList 		: meterDS,
			companyList 	: companyDS,
			transformerList : transformerDS,					
			readerList 		: readerDS,

			search 			: function(){
				var self = this;
				var para = Array();

				var company_id = this.get("company_id");				
				if(company_id>0 || company_id!=""){
					var transformer_id = this.get("transformer_id");
					if(transformer_id>0 || transformer_id!=""){
						para.push({ field: "transformer_id", value: transformer_id });
					}
				}

				var meter_no = this.get("meter_no");
				if(meter_no!=""){
					para.push({ field: "meter_no", value: meter_no });
				}

				var isUnread = false;
				var monthOf = new Date(this.get("month_of_search"));
				if(!isNaN(monthOf.valueOf())){
					isUnread = true;
					monthOf.setDate(1);
					monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
				}

				if(para.length>0){
					if(isUnread){
						para.push({ field: "month_of", value: monthOf });
						meterDS.data([]);

					 	unreadDS.filter(para);
						unreadDS.bind("requestEnd", function(e){
				    		var response = e.response;
		    				var type = e.type;

							if(type==="read"){
								for (var i=0; i < response.length; i++){																		
									meterDS.add(response[i]);													
						   		}
								self.set("total_meter", response.length);					  
						  	}			  	  			  	
						});
					}else{
						meterDS.filter(para);
						meterDS.bind("requestEnd", function(e){
				    		var response = e.response;
		    				var type = e.type;

							if(type==="read"){								
								self.set("total_meter", response.length);					  
						  	}			  	  			  	
						});
					}
				}
			},
			readFile 		: function(e){
				e.preventDefault();
				var self = this;

				irFileDS.read();
				irFileDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;

					if(type==="read"){						
						var totalActive = 0;		    	
				    	for (var i=0; i < response.length; i++){		    		
							var active = response[i].new_reading - response[i].prev_reading;									
							meterDS.add(response[i]);					
							if(active>0){
								totalActive += active;						
							}					
				   		};

				   		self.set("total_meter", response.length);
				    	self.set("total_read", response.length);
				    	self.set("total_active", totalActive);					  
				  	}			  	  			  	
				});
			},		    	
	      	change 			: function(e){      		
	      		var d = e.data;

	      		var result = true;
	  			var totalActive = 0;
	  			var totalReactive = 0;
	  			var totalRead = 0;
	  			var totalUnread = this.get("total_meter");
	  			var isNextID = false;
				for(var i=0; i < meterDS.total(); i++) {
					var data = meterDS.at(i);
					var r = true;

					if(isNextID){
						$(".txt-"+data.id).focus();
						isNextID=false;					
					}

					if(data.id==d.id){
						isNextID = true;
					}

					//Active usage
					var active_usage = 0;
					if(data.new_reading!==""){
						var dateReadTo = kendo.toString(new Date(this.get("date_read_to")), "yyyy-MM-dd");					
						var monthOf = new Date(this.get("month_of"));
						monthOf.setDate(1);
						monthOf = kendo.toString(monthOf, "yyyy-MM-dd");																
						if(monthOf <= d.month_of){
							result = false;
							r = false;						
							$("#msgD-"+data.id).text("!");
						}else{
							$("#msgD-"+data.id).text("");
						}

						var newRound = 0;
						if(data.checkNewRound){
							newRound = data.max_digit;						
						}
						active_usage = (kendo.parseInt(data.new_reading) + kendo.parseInt(newRound)) - kendo.parseInt(data.prev_reading);
						totalActive += active_usage;
						totalRead += 1;						
					}
					if(active_usage<0){
						result = false;
						r = false;
						$("#msg-"+data.id).text("!");						
					}else{
						$("#msg-"+data.id).text("");
					}

					//Reactive usage
					var reactive_usage = 0;
					if(data.reactive_new_reading!==""){					
						var reactiveNewRound = 0;
						if(data.rcheckNewRound){
							reactiveNewRound = data.max_digit;
						}										
						reactive_usage = (kendo.parseInt(data.reactive_new_reading) + kendo.parseInt(reactiveNewRound)) - kendo.parseInt(data.reactive_prev_reading);
						totalReactive += reactive_usage;					
					}
					if(reactive_usage<0){
						result = false;
						r = false;
						$("#msgR-"+data.id).text("!");						
					}else{
						$("#msgR-"+data.id).text("");
					}

					//Highlight invalid input each rows
					if(r==false){
						$("#rowGrid-"+data.id).addClass("alert alert-error");
					}else{
						$("#rowGrid-"+data.id).removeClass("alert alert-error");
					}
				}
				totalUnread = totalUnread - totalRead;

				this.set("total_active", totalActive);
				this.set("total_reactive", totalReactive);
				this.set("total_read", totalRead);
				this.set("total_unread", totalUnread);

				this.set("checkValidation", result);						
	      	},	      	
	      	add 			: function(){	      		     			
      			var monthOf = new Date(this.get("month_of"));
				monthOf.setDate(1);
				monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

      			for(var i=0; i < meterDS.total(); i++) {
					var data = meterDS.at(i);
					
					if(data.new_reading!==""){
						var newRound = 0;
						if(data.checkNewRound){
							newRound = data.max_digit;
						}
						var rnewRound = 0;
						if(data.rcheckNewRound){
							rnewRound = data.max_digit;
						}

						this.meterRecords.push({				
							meter_id				: data.id,
						   	prev_reading			: data.prev_reading,
						   	new_reading 			: data.new_reading,
						   	new_round				: newRound,
						   	reactive_prev_reading	: data.reactive_prev_reading,								   
						   	reactive_new_reading	: data.reactive_new_reading,
						   	reactive_new_round		: rnewRound,		   
						   	is_backup_reading 		: data.parent_id>0 ? 1 : 0,
						   	month_of 				: monthOf,
						   	date_read_from			: kendo.toString(this.get("date_read_from"), "yyyy-MM-dd"),						   
						   	date_read_to			: kendo.toString(this.get("date_read_to"), "yyyy-MM-dd"),
						   	reader 					: this.get("reader_id"),
						   	invoice_id				: 0 //No invoice yet					   	
						});
					}					
				}

				if(this.get("meterRecords").length>0){
					meterRecordDS.add(this.get("meterRecords"));
					meterRecordDS.sync();
			 		this.addTransformerRecord();

			 		this.clear();					
				}				
				
	      	},
	      	addTransformerRecord : function(){
	      		var usage = kendo.parseInt(this.get("usage"));

	      		if(usage>0 && usage!=null){      		   		      		
		  			var monthOf = new Date(this.get("month_of"));
					monthOf.setDate(1);
					monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

		      		transformerRecordDS.add({
		      			type				: "LV",
		      			transformer_id  	: this.get("transformer_id"),      			
		      			usage 				: usage,
		      			month_of 			: monthOf,
		      			date_read_from  	: kendo.toString(new Date(this.get("date_read_from")), "yyyy-MM-dd"),
		      			date_read_to  		: kendo.toString(new Date(this.get("date_read_to")), "yyyy-MM-dd"),
		      			reader 				: this.get("reader_id")
		      		});

		      		transformerRecordDS.sync();
	      		}
	      	},
	      	clear 			: function(){
	      		meterDS.data([]);
	      		meterRecordDS.data([]);
	      		this.set("meterRecords", []);
	      	}  			
		});

		return {
			viewModel 		: viewModel
		};	
	}());

	banhji.eInvoice = (function(){
		var meterRecordDS = new kendo.data.DataSource({
		  	transport: {	
		  	  	read:  {
					url: banhji.baseUrl + "api/meter_records/meter_record_for_invoice",		  
				  	type: "GET",
				  	dataType: "json"
				}
		  	},  
		  	requestEnd: function(e) {
			    var response = e.response;
			    var type = e.type;
			    if(type==='read'){
			    	
			    	var total_active = 0;
					var total_reactive = 0;
								
					for (var i=0;i<response.length;i++)	{			 
						total_active += response[i].active_usage;	
						total_reactive += response[i].reactive_usage;							
					}

					viewModel.set("total_active", kendo.toString(total_active, 'n0'));
					viewModel.set("total_reactive", kendo.toString(total_reactive, 'n0'));
					viewModel.set("total_reading", response.length);
							
				}	
		  	},		  	
			serverFiltering: true
		});

		var invoiceDS = new kendo.data.DataSource({
		  	transport: {	  
			  	create: {
				  	url : banhji.baseUrl + "api/invoices/invoice_batch",
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
				 	url : banhji.baseUrl + "api/invoice_items/invoice_item_batch",
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

		var companyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/companies/company",
					type: "GET",
					dataType: "json"
				}
			}		
		});

		var classDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/classes/class",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "type", value: "Class" },
			serverFiltering: true		
		});

		var transformerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/transformer_cascading",
					type: "GET",
					dataType: "json"
				}
			},	
			serverFiltering: true
		});

		var planItemDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/plan_items/plan_item",
				  	type: "GET",
				  	dataType: "json"
			  	}
		  	},  
		  	sort: { field: "start_date", dir: "desc" }
		});

		var tariffDS = new kendo.data.DataSource({
		  transport: {	  
			  read: {
				  url : banhji.baseUrl + "api/tariffs/tariff",
				  type: "GET",
				  dataType: "json"
			  }
		  }  
		});

		var tariffItemDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/tariff_items/tariff_item",
				  	type: "GET",
				  	dataType: "json"
			  	}
		  	},  
		  	sort: { field: "usage", dir: "desc" },
		  	serverSorting: true
		});

		var maintenanceDS = new kendo.data.DataSource({
		  transport: {	  
			  read: {
				  url : banhji.baseUrl + "api/maintenances/maintenance",
				  type: "GET",
				  dataType: "json"
			  }
		  }
		});

		var exemptionDS = new kendo.data.DataSource({
		  transport: {	  
			  read: {
				  url : banhji.baseUrl + "api/exemptions/exemption",
				  type: "GET",
				  dataType: "json"
			  }
		  }
		});

		var currencyRateDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/currency_rates/currency_rate",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "status", value: 1 },
			serverFiltering: true		
		});

		var currencyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/currencies/index",
					type: "GET",
					dataType: "json"
				}
			}		
		});

		var journalDS = new kendo.data.DataSource({
		  	transport: {	  
			    create: {
				  	url : banhji.baseUrl + "api/accounting_api/journals",
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
			next_id			: 0,
			last_no			: "",
			
			//Invoice
			checkAll 		: false,
			totalSelected 	: 0,			
			transformer_id 	: "",							
			status			: 0,
			biller			: banhji.config.userData.userId,					  	  
			
			issued_date		: new Date(),
			payment_date 	: new Date(),
			due_date 		: new Date(),	
			month_of 		: new Date(),
			monthOfSearch 	: new Date(),

			payment_term_id	: 1,	
			currency_id		: 1,
			memo			: "",
			class_id		: 0,
			company_id 		: 0,
				
			total_reading	: 0,
			total_active 	: 0,
			total_reactive	: 0,
			total_amount	: 0,

			account_receiveable	: 0,
			resident_revenue 	: 0,
			comercial_revenue 	: 0,
			institute_revenue 	: 0,
			
			classList 		: classDS,
			companyList 	: companyDS,
			transformerList : transformerDS,	 
			meterRecordList : meterRecordDS,

			invoiceList 	: [],
			invoiceItemList : [],
			journalList		: [],
			meterRecordIDList 	: [],
			customerBalanceList : [],

			receiveableList	: [],
			revenueList 	: [],
			customerIDList  : [],
			
			pageLoad 		: function(){
				planItemDS.fetch();
				tariffDS.fetch();
				tariffItemDS.fetch();
				maintenanceDS.fetch();
				exemptionDS.fetch();
				currencyDS.fetch();
				currencyRateDS.fetch();

				this.setDueDate();
				this.setNumber();								
			},				    
		    setDueDate 		: function(){
				var duedate = new Date();
				duedate.setDate(duedate.getDate()+7);
				this.set("due_date", duedate);
			},
			setNumber 		: function(){
				var self = this;
		    	$.ajax({
					type: "GET",
					url: banhji.baseUrl + "api/invoices/last_idNumber",			
					data: { type: "Invoice" },
					dataType: "json",
					success: function (response) {
						//var data = response.d;
						var d = response;		
						self.set("next_id", d.next_id);
						self.set("last_no", d.last_no);						
					}
				});	
			},			
			linkPrint 		: function(){
				window.location.href = banhji.baseUrl + "customer/print_invoice"
			},
			searchReading 	: function(){
				var monthOf = new Date(this.get("monthOfSearch"));		
				monthOf.setDate(1);
				monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

				var transformerID = this.get("transformer_id");
				if(transformerID!="" && monthOf!=""){			
					meterRecordDS.filter({
						filters: [
							{ field: "meters.transformer_id", value: transformerID },
							{ field: "meters.status", value: 1 },
							{ field: "meter_records.month_of", value: monthOf }					
						]
					});
				}

				this.set("checkAll", false);
				this.set("totalSelected", 0);									
			},	
			changeAll 		: function(){		
				var bolValue = this.get("checkAll");
				var data = meterRecordDS.data();

				if(bolValue){
					this.set("totalSelected", data.length);
				}else{
					this.set("totalSelected", 0);
				}
				
				if(data.length>0){						
			        for (var i = 0; i < data.length; i++) {
			            var d = data[i];
			            if(d.invoice_id==0){					
							d.set("isCheck", bolValue);
						}
			        }			        
		        }							
			},
			change 			: function(){		
				var data = meterRecordDS.data();
				var ts = 0;
				if(data.length>0){
			        for (var i = 0; i < data.length; i++) {
			            var d = data[i];
			            if(d.isCheck){					
							ts++;
						}
			        }			        
		        }
		        this.set("totalSelected", ts);
			},
			getTariffId  	: function(tariff_plan_id, month_of){
				var tariff_id = 0;						
				var data = planItemDS.data();
		        for (var i = 0; i < data.length; i++) {
		            var d = data[i];
		            if((d.tariff_plan_id==tariff_plan_id) && (month_of>=d.start_date)){
		            	tariff_id = d.tariff_id;
		            	break;
		            }
		        }
		        return tariff_id;		
			},
			getCurrencyRateByCode 	: function(code){
				var rate = 0;			
				$.each(currencyRateDS.data(), function(index, value){	        	
		        	if(code===value.code){	        		
		        		rate = value.rate;
		        		return false;
		        	}	        	
		        });
				
		        return kendo.parseFloat(rate);
			},
			getSubCode 	: function(code){
				var subCode = "km-KH";			
				$.each(currencyDS.data(), function(index, value){	        	
		        	if(code===value.code){	        		
		        		subCode = value.sub_code;
		        		return false;
		        	}	        	
		        });
				
		        return subCode;
			},
			distrinctCustomer	: function(){
				//Get all avialiable id
				var ids = new Array();
				var receiveableIDs = new Array();
				var revenueIDs = new Array();

				for (var i=0;i<meterRecordDS.total();i++) {
					var d = meterRecordDS.at(i);
					ids.push(d.customer_id);
					receiveableIDs.push(d.people.account_receiveable_id);
					revenueIDs.push(d.people.revenue_account_id);
				}
				
				//Remove duplicate id
				var uniqueID = [];
				$.each(ids, function(j, el){
				    if($.inArray(el, uniqueID) === -1) uniqueID.push(el);
				});

				var ARuniqueID = [];
				$.each(receiveableIDs, function(k, elk){
				    if($.inArray(elk, ARuniqueID) === -1) ARuniqueID.push(elk);
				});

				var REVuniqueID = [];
				$.each(revenueIDs, function(l, ell){
				    if($.inArray(ell, REVuniqueID) === -1) REVuniqueID.push(ell);
				});

				//Add to list
				var arList = [];
				for (var j=0;j<ARuniqueID.length;j++) {
					var dj = ARuniqueID[j];
					arList.push({id:dj, amt:0});
				}

				var revList = [];
				for (var k=0;k<REVuniqueID.length;k++) {
					var dk = REVuniqueID[k];
					revList.push({id:dk, amt:0});
				}

				this.set("customerIDList", uniqueID);
				this.set("receiveableList", arList);
				this.set("revenueList", revList);
			},
			addInvoice 		: function(){				
				var invoice_id = this.get("next_id");		
				var last_no = this.get("last_no");
				
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
				var number = "";
				var inv_header = "INV" + kendo.toString(new Date(this.get("month_of")), "yy") 
										+ kendo.toString(new Date(this.get("month_of")), "MM");

				this.distrinctCustomer();
				var disCustomer = this.get("customerIDList");				
				for (var x=0;x<disCustomer.length;x++) {
					var dx = disCustomer[x];
					var total_amount = 0;
					var hasItem = false;
					var dataIndex = 0;
					
					var data = meterRecordDS.data();
			        for (var i = 0; i < data.length; i++) {
			        	var d = data[i];

			        	//Apply exemption
		            	var isFree = false;            	
						var exemp_amt =0;
						var exemption_id = d.people.exemption_id;
						var exemp = exemptionDS.get(exemption_id);

						//Exempint free 100%
						if((exemption_id>0) && (exemp.exemption_type=="%") && (exemp.amount==1)){
							isFree = true;	
						}

						if(isFree==false){ //Free
				        	if(d.customer_id==dx){
				        		if(d.isCheck){  //Check									            	
				        			hasItem = true;
				        			dataIndex = i;

									//Apply maintenance
									var maintenance_id = d.people.maintenance_id;
									var maintenances = maintenanceDS.get(maintenance_id);

									//Apply tariff
									var price = 0;
									var tariff_amt = 0;
									var active_usage = d.active_usage;

									var tariff_id = this.getTariffId(d.people.tariff_plan_id, d.month_of);
									var tariffs = tariffDS.get(tariff_id);

									
									//Apply tariff to active usage							
									//Exemption for kWh
									if((exemption_id>0) && (exemp.exemption_type=="kWh")){
										if(active_usage>exemp.amount){
											active_usage -= exemp.amount;
										}			
									}				
										
									//Apply tariff item				
									var dataj = tariffItemDS.data();
									for (var j=0;j<dataj.length;j++){				 
										var dj = dataj[j];
										if((dj.tariff_id==tariff_id) && (active_usage>=dj.usage)){												
											if(dj.is_flat==0){														
												price = dj.price;
												tariff_amt = active_usage * price;																											
											}else{																					
												price = dj.amount;
												tariff_amt = dj.amount;											
											}
											break;						
										}
									}
														
									//Add active item
									this.invoiceItemList.push({
										invoice_id	: invoice_id,
										item_id		: 0,	
										description	: tariffs.name,
										multiplier	: d.multiplier,
										quantity	: active_usage,	  
										unit_price	: price,
										vat			: 0,		  	  
										amount		: tariff_amt,
										meter_record_id : d.meter_record_id,
										meter_id 	: d.meter_id,
										prev_reading: d.prev_reading,
										new_reading : d.new_reading	
									});		
									total_amount += kendo.parseFloat(tariff_amt);
									
									//Add exemption for kWh
									if((exemption_id>0) && (exemp.exemption_type=="kWh") && (exemp.amount >0)){
										if(active_usage>exemp.amount){		
											//Add exemption for kWh
											this.invoiceItemList.push({
												invoice_id	: invoice_id,
												item_id		: 0,									
												description	: exemp.name,
												multiplier	: 0,
												quantity	: 1,	  
												unit_price	: 0,
												vat			: 0,		  	  
												amount		: 0,
												meter_id 	: 0,
												prev_reading: 0,
												new_reading : 0,
												exemption_id: exemption_id
											});							
										}	
									}				

									//Apply tariff item for reactive usage			
									var reactive_tariff_amt = 0;
									var reactive_price = 0;
									var reactive_usage = d.reactive_usage;
														
									var datak = tariffItemDS.data();				
									for (var k=0;k<datak.length;k++){				 
										var dk = datak[k];								
										if((dk.tariff_id==d.tariff_id) && (reactive_usage>=dk.usage)){
											if(dk.is_flat==0){
												reactive_price = dk.price;
												reactive_tariff_amt = reactive_usage * reactive_price;																				
											}else{
												reactive_price = dk.amount;
												reactive_tariff_amt = dk.amount;				
											}
											break;																			
										}	
									}

									//Add reactive item
									if(reactive_tariff_amt>0){
										this.invoiceItemList.push({
											invoice_id	: invoice_id,
											item_id		: 0,	
											description	: 'អំនាន Reactive',
											multiplier	: d.multiplier,
											quantity	: reactive_usage,	  
											unit_price	: reactive_price,
											vat			: 0,		  	  
											amount		: reactive_tariff_amt,
											meter_record_id : d.meter_record_id,
											meter_id 	: 0,
											prev_reading: d.reactive_prev_reading,
											new_reading : d.reactive_new_reading	
										});		
										total_amount += kendo.parseFloat(reactive_tariff_amt);
									}

									//Exemption for %
									if((exemption_id>0) && (exemp.exemption_type=="%") && (exemp.amount >0)){
										exemp_amt = total_amount * kendo.parseFloat(exemp.amount);					
												
										//Add exemption for %					
										this.invoiceItemList.push({
											invoice_id	: invoice_id,
											item_id		: 0,	
											description	: exemp.name,
											multiplier	: 0,
											quantity	: 1,	  
											unit_price	: 0,
											vat			: 0,		  	  
											amount		: (exemp_amt*-1),
											meter_id 	: 0,
											prev_reading: 0,
											new_reading : 0,
											exemption_id: exemption_id
										});
										total_amount -= kendo.parseFloat(exemp_amt);								
									}
									
									//Exemption for Money
									if((exemption_id>0) && (exemp.exemption_type=="៛") && (exemp.amount >0)){
										if(total_amount>exemp.amount){
											exemp_amt = exemp.amount;	
										}else{
											exemp_amt = total_amount;	
										}
										
										//Add exemption for Money
										this.invoiceItemList.push({
											invoice_id	: invoice_id,
											item_id		: 0,	
											description	: exemp.name,
											multiplier	: 0,
											quantity	: 1,	  
											unit_price	: 0,
											vat			: 0,		  	  
											amount		: (exemp_amt*-1),
											meter_id 	: 0,
											prev_reading: 0,
											new_reading : 0,
											exemption_id: exemption_id
										});
										total_amount -= kendo.parseFloat(exemp_amt);				
									}
																
									//Add maintenance
									if((maintenance_id>0) && (maintenances.amount>0)){	
										this.invoiceItemList.push({
											invoice_id	: invoice_id,
											item_id		: 0,	
											description	: maintenances.name,
											multiplier	: 0,
											quantity	: 1,	  
											unit_price	: parseFloat(maintenances.amount),
											vat			: 0,		  	  
											amount		: parseFloat(maintenances.amount),
											meter_id 	: 0,
											prev_reading: 0,
											new_reading : 0,
											maintenance_id: maintenance_id
										});
										total_amount += parseFloat(maintenances.amount);
									}

									//Add meter record id and invoice id to []
									this.meterRecordIDList.push({
										id			: kendo.parseInt(d.meter_record_id),
										invoice_id 	: invoice_id
									});							
								}//if(d.isCheck){
				        	}//if(d.customer_id==dx){
			        	}//if(isFree==false){	        										
					}//for loop meterRecordDS

					if(hasItem){
						var mr = meterRecordDS.at(dataIndex);

						//Exchange rate
						var rate = 1;
						var company = companyDS.at(0);
						var customer = mr.people;
				        if(company.based_currency!==customer.currency_code){
				        	var companyCodeRate = this.getCurrencyRateByCode(company.based_currency);
				        	var customerCodeRate = this.getCurrencyRateByCode(customer.currency_code);

				        	if(customerCodeRate>0 && companyCodeRate>0){
				        		rate = companyCodeRate/customerCodeRate;
				        	}	
				        }

						//Add invoice into []        		 		
						number = inv_header + kendo.toString(invoice_no, "00000");								
						this.invoiceList.push({
							number			: number,
							type 			: "eInvoice",
							amount 			: total_amount,
							rate 			: rate,	  
							status			: 0,
							sub_code 		: this.getSubCode(mr.people.currency_code),
							biller			: this.get("biller"),	  
							customer_id		: dx,
							address			: mr.people.address,
							issued_date		: kendo.toString(new Date(this.get("issued_date")), "yyyy-MM-dd"),
							payment_date	: kendo.toString(new Date(this.get("payment_date")), "yyyy-MM-dd"),				
							due_date		: kendo.toString(new Date(this.get("due_date")), "yyyy-MM-dd"),
							month_of 		: monthOf,
							date_read_from	: kendo.toString(new Date(mr.date_read_from), "yyyy-MM-dd"),
							date_read_to	: kendo.toString(new Date(mr.date_read_to), "yyyy-MM-dd"),
							payment_term_id	: this.get("payment_term_id"),	  	  								
							class_id 		: this.get("class_id"),
							transformer_id  : mr.people.transformer_id,
							box_no 			: mr.electricity_boxes.box_no,
							memo			: this.get("memo"),
							company_id 		: mr.people.company_id				
						});

						invoice_id++;			
						invoice_no++;

						//Add new customer balances to []
						var balance = kendo.parseFloat(mr.people.balance) + (kendo.parseFloat(total_amount)/rate);
						this.customerBalanceList.push({
							id			: kendo.parseInt(mr.people.id),
							balance 	: balance
						});													
						
						//Accounting				
						//AR
						var arList = this.get("receiveableList");
						for (var l=0;l<arList.length;l++) {
							var dl = arList[l];

							if(mr.people.account_receiveable_id==dl.id){
								dl.amt += total_amount;
							}
						}

						//Revenue
						var revList = this.get("revenueList");
						for (var m=0;m<revList.length;m++) {
							var dm = revList[m];

							if(mr.people.revenue_account_id==dm.id){
								dm.amt += total_amount;
							}
						}							
						
					}//if(hasItem){				
				}//for loop disCustomer	  	
				
				this.set("next_id", invoice_id);
				this.set("last_no", number);

				this.postInvoice();
				this.postInvoiceItem();								  	
			},	
			addJournal 		: function(){		
				var d = new Date(this.get("month_of"));	
				var lastD = new Date(d.getFullYear(), d.getMonth() + 1, 0);
				var journalEntries = [];
				
				//A/R
				var arList = this.get("receiveableList");		
				for (var i=0;i<arList.length;i++) {
					var di = arList[i];
					
					journalEntries.push({
				 		account_id 	: di.id,	 		
				 		dr 			: di.amt, 
				 		cr 			: 0,
				 		class_id  	: this.get("class_id"),
				 		memo 		: this.get("memo"),
				 		exchange_rate: 1,
					 	main 		: 0	 		
					});					
				}
			
				//Revenue
				var revList = this.get("revenueList");		
				for (var j=0;j<revList.length;j++) {
					var dj = revList[j];
					
					journalEntries.push({
				 		account_id 	: dj.id,	 		
				 		dr 			: 0, 
				 		cr 			: dj.amt,
				 		class_id  	: this.get("class_id"),
				 		memo 		: this.get("memo"),
				 		exchange_rate: 1,
					 	main 		: 0	 		
					});
				}

				//Add new journal to database
				journalDS.add({
					company_id: banhji.config.userData.company,
					vendor_id: 0,
					people_id: 0,
					employee_id: banhji.config.userData.userId,
					payment_id: 0,
					transaction_type: "eInvoice",
					payment_method: "",
					check_no: "",
					memo: "វិក្កយបត្រអគ្គីសនី",
					date: kendo.toString(lastD, "yyyy-MM-dd"),
					//due_date: kendo.toString(this.dateDue, "yyyy-MM-dd"),
					// amount_billed: 0,
					// amount_due: 0,
					// amount_paid: 0,
					voucher: "",
					number: "",
					class_id: this.get("class_id"),
					status: 1,
					journalEntries: journalEntries,
					inJournal: 1			 		 		
			 	});			
				
			 	journalDS.sync();	 	
			},
			postInvoice 	: function(){
				var data = this.get("invoiceList");
				$.ajax({
					type: "POST",
					url: banhji.baseUrl + "api/invoices/invoice_many",			
					data: {data: kendo.stringify(data)},
					dataType: "json",
					success: function (response) {
						//var data = response.d;
						//console.log(response);							  
					}
				});				
			},
			postInvoiceItem : function(){
				var data = this.get("invoiceItemList");
				$.ajax({
					type: "POST",
					url: banhji.baseUrl + "api/invoice_items/invoice_item_many",			
					data: {data: kendo.stringify(data)},
					dataType: "json",
					success: function (response) {
						//var data = response.d;
						//console.log(response);							  
					}
				});				
			},
			updateMeterRecordInvoiceId : function(){
				var data = this.get("meterRecordIDList");
				$.ajax({
					type: "PUT",
					url: banhji.baseUrl + "api/meter_records/meter_record_batch",			
					data: {data: kendo.stringify(data)},
					dataType: "json",
					success: function (response) {
						//var data = response.d;
						//console.log(response);			  
					},
					error: function(error) {
						//console.log(error);
					}
				});				
			},
			updateCustomerBalance : function(){
				var data = this.get("customerBalanceList");
				$.ajax({
					type: "PUT",
					url: banhji.baseUrl + "api/people_api/balance_batch",			
					data: { data: kendo.stringify(data)},
					dataType: "json",
					success: function (response) {
						//var data = response.d;
						//console.log(response);			  
					},
					error: function(error) {
						//console.log(error);
					}
				});				
			},				
			clear 			: function() {							
				this.set("transformer_id", "");
				this.set("monthOfSearch", "");	

				this.set("totalSelected",0);
				this.set("total_reading",0);
				this.set("total_active",0);
				this.set("total_reactive",0);

				this.set("invoiceList", []);
				this.set("invoiceItemList", []);
				this.set("journalList", []);
				this.set("meterRecordIDList", []);
				this.set("customerBalanceList", []);
						
				//Remove datasource				
		  		invoiceDS.data([]);				
		  		invoiceItemDS.data([]);
				journalDS.data([]);				
				meterRecordDS.data([]);
			}
		});

		return {
			viewModel 	: viewModel
		};
	}());

	banhji.cashier = (function(){		
		var customerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/people_api/customer_search",
					type: "GET",
					dataType: "json"
				}
			},		
			serverFiltering: true
		});

		var statementCollectionDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/statement_collection",
				  	type: "GET",
				  	dataType: "json"		  
			  	}
		  	},
		  	sort: { field: "issued_date", dir: "desc" },  	
		  	pageSize: 5,
		  	serverPaging: true,
		  	serverFiltering: true
		});

		var paymentMethodDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/payment_methods/payment_method",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var cashAccountDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/accounts/account",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var classDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/classes/class",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "type", value: "Class" },
			serverFiltering: true		
		});

		var invoiceDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice_payment",		  
				  	type: "GET",
				  	dataType: "json"
			  	}
		  	},		  		
		  	serverFiltering: true
		});

		var paymentDS = new kendo.data.DataSource({
		  	transport: {  		
			  	create: {
				  	url : banhji.baseUrl + "api/payments/payment_batch",		  
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

		var currencyRateDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/currency_rates/currency_rate",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "status", value: 1 },
			serverFiltering: true		
		});

		var journalDS = new kendo.data.DataSource({
		  	transport: {	  
			    create: {
				  	url : banhji.baseUrl + "api/accounting_api/journals",
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
		
		var viewModel = kendo.observable({
			total_customer 		: 0,
			total_payment 		: kendo.toString(0,"c"),
			searchField 		: "",	

			//Payment
			class_id 			: "",
			discount 			: 0,
			fine 				: 0,
			payment_date		: new Date(),
			payment_method_id	: 1,
			cash_account_id 	: 2,
			check_no			: "",			
			payment_note		: "",
			cashier				: banhji.config.userData.userId,	
			
			//Others
			customer 			: null,
			invoices 			: null,		
			pay_amount  		: kendo.toString(0,"c"),
			remain				: kendo.toString(0,"c"),
				
			total 				: kendo.toString(0,"c"),
			
			classList 			: classDS,  
			paymentMethodList 	: paymentMethodDS,
			cashAccountList 	: cashAccountDS,

			statementCollectionList: statementCollectionDS,
			invoiceList 		: [],
			paymentList 		: [],
			customerBalanceList	: [],			
			
			pageLoad 			: function(){
				this.clear();
				this.loadPaymentForCashier();
				currencyRateDS.read();
			},
			customerSearch 		: function(){
				var self = this;

				if(this.get("searchField") !== "") {
					var txtSearch = this.get("searchField");						
					customerDS.filter({ field: "searchField", value: txtSearch });
					customerDS.bind("requestEnd", function(e){
			    		var response = e.response;
	    				var type = e.type;

						if(type==="read"){
							var d = response[0];											
							self.set("customer", d);
							self.set("deposit_amount", kendo.toString(kendo.parseFloat(d.deposit_amount), "c", d.currencies.sub_code));
							self.set("balance", kendo.toString(kendo.parseFloat(d.balance), "c", d.currencies.sub_code));
							self.loadTransaction(d.id);
					  	}			  	  			  	
					});
					this.set("searchField", "");						 			
				}
			},	
			loadTransaction 	: function(customer_id){
				var self = this;

				statementCollectionDS.filter({ field: "customer_id", value: customer_id });
				invoiceDS.filter({ field: "customer_id", value: customer_id });				
				invoiceDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;

					if(type==="read" && response.length>0){
						var total = kendo.parseFloat(self.get("total"));
				    	var tpay = kendo.parseFloat(self.get("pay_amount"));
				    	var highlightIndex = 0;				    	
			    		
				    	$.each(response, function(index, data){
				    		var isExisting = false;
					    	$.each(self.get("invoiceList"), function(indexx, datax){			    			
				    			if(data.id==datax.id){
				    				isExisting = true;
				    				return false;
				    			}
				    		});

					    	if(isExisting==false){
					    		var t = kendo.parseFloat(data.total)/kendo.parseFloat(data.rate);				    		
				    			total += kendo.parseFloat(data.total);
				    			tpay += kendo.parseFloat(data.total);
				    							    			
								self.get("invoiceList").push({				
									id 				: data.id,
									isPay 			: true,				
									issued_date 	: data.issued_date,
									fullname 		: data.people.number +' '+ data.people.surname +' '+ data.people.name,							
									number			: data.number,				
									total 			: t,
									pay_amount 		: t,
									rate 			: data.rate,
									sub_code 		: data.sub_code,
									customer_id 	: data.customer_id,
									account_receiveable_id: data.people.account_receiveable_id,
									class_id 		: data.people.class_id,
									balance 		: data.people.balance 
								});
								
								if(index===0){									
									highlightIndex = data.id;
								}
							}																					
						});
						
						//Highlight first row
						if(highlightIndex>0){
							$("#rowGrid-"+highlightIndex).addClass("alert alert-error");	
						}									    	

						var remain = total - tpay;
						    	
				    	self.set("pay_amount", kendo.toString(tpay, "c"));    	
				    	self.set("total", kendo.toString(total, "c"));
				    	self.set("remain", kendo.toString(remain,"c"));
				    	
				    	self.autoIncreaseNo();	
				  	}			  	  			  	
				});	
			},
			loadPaymentForCashier: function(){
				var self = this;
				var d = new Date();
				$.ajax({
					type: "GET",
					url: banhji.baseUrl + "api/payments/payment_for_cashier",				
					data: {cashier: self.get("cashier"), payment_date: kendo.toString(d, "yyyy-MM-dd")},
					dataType: "json",
					success: function (response) {
						self.set("total_customer", kendo.toString(kendo.parseInt(response.total_customer), '##,#'));
						self.set("total_payment", kendo.toString(kendo.parseFloat(response.total_payment), 'c0'));
					}
				});
			},			
			autoIncreaseNo 		: function(){
				$(".sno").each(function(index,element){                 
				   $(element).text(index + 1); 
				});
			},
			change				: function(){		
				var total = 0;		
			    var tpay = 0;	    
				for(var i=0; i < this.invoiceList.length; i++){
					var data = this.invoiceList[i];
					total += kendo.parseFloat(data.total)*kendo.parseFloat(data.rate);
			    	tpay += kendo.parseFloat(data.pay_amount)*kendo.parseFloat(data.rate);			    	
				}
				this.set("total", kendo.toString(total, "c"));    	   	    	
		    	this.set("pay_amount", kendo.toString(tpay, "c"));
		    	var remain = (total + kendo.parseFloat(this.get("fine"))) - (tpay + kendo.parseFloat(this.get("discount")));
		    	this.set("remain", kendo.toString(remain, "c"));

		    	this.autoIncreaseNo();    	
			},	
			remove 				: function(e){
				if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {        
			        var item = e.data;
			        var index = this.get("invoiceList").indexOf(item);        
			        this.get("invoiceList").splice(index, 1);
			        this.change();
		    	}
		    },
		    checkPay 			: function(e){
		    	e.preventDefault();
		    	var d = e.data;
		    	var target = e.currentTarget;

		    	if(target.checked){
		    		d.set("pay_amount", d.total);
		    	}else{
		    		d.set("pay_amount", 0);
		    	}
		    	this.change();
		    },
			add 		 		: function(){
				if(kendo.parseFloat(this.get("pay_amount"))>0){				
					var ids = new Array();
					var arr = new Array();

					for (var i=0; i<this.invoiceList.length; i++){
						var data = this.invoiceList[i];
						
						if(data.pay_amount > 0){				
							if(data.pay_amount >= data.total){
								ids.push({id:data.id, status: 1}); //Paid
							}else{
								ids.push({id:data.id, status: 2}); //Partially Paid
							}
													
							//Add new invoice payment
							this.paymentList.push({
								invoice_id 			: data.id,								
								amount_paid 		: kendo.parseFloat(data.pay_amount)*kendo.parseFloat(data.rate),
								rate 				: kendo.parseFloat(data.rate),
								discount 			: kendo.parseFloat(this.get("discount"))*kendo.parseFloat(data.rate),
								fine 				: kendo.parseFloat(this.get("fine"))*kendo.parseFloat(data.rate),
								sub_code 			: data.sub_code,			
								payment_date		: kendo.toString(this.get("payment_date"), "yyyy-MM-dd"),
								payment_method_id	: this.get("payment_method_id"),
								check_no 			: this.get("check_no"),							  	  
								cash_account_id 	: this.get("cash_account_id"),
								payment_note		: this.get("payment_note"),
								cashier				: this.get("cashier"),
								customer_id			: data.customer_id,
								class_id 			: this.get("class_id")													
							});

							//Add new customer balances to []
							var balance = 0;										
							var index = jQuery.inArray(data.customer_id, arr);					
							if(index > -1){ //If a customer has two invoices											
								balance = kendo.parseFloat(this.customerBalanceList[index].balance) - (kendo.parseFloat(data.pay_amount)/kendo.parseFloat(data.rate));
								this.customerBalanceList[index].set("balance", balance);
							}else{
								arr.push(data.customer_id);
								balance = kendo.parseFloat(data.balance) - kendo.parseFloat(data.pay_amount);
								this.customerBalanceList.push({
									id			: kendo.parseInt(data.customer_id),
									balance 	: balance
								});	
							}
						}		
					}

					//Add payments to database
					if(this.get("paymentList").length>0){
						paymentDS.add(this.get("paymentList"));
						paymentDS.sync();

						this.updateCustomerBalance();
						this.addJournal();						
					}		
					
					//Update invoice status
					if(ids.length>0){
						$.ajax({
							type: "PUT",
							url: banhji.baseUrl + "api/invoices/invoice_batch",				
							data: {ids: kendo.stringify(ids)},
							dataType: "json",
							success: function (response) {
								//var data = response.d;			  
							}
						});
					}			
				}else{
					alert("ពុំមានការបង់ប្រាក់ទេ");
				}		
			},
			addJournal 			: function(){
				var self = this;				
				var journalEntries = [];
				var arList = {};
				var invList = this.get("invoiceList");

				$.each(invList, function(index, data){
					var amt = kendo.parseFloat(data.pay_amount)*kendo.parseFloat(data.rate);
					var arID = kendo.parseInt(data.account_receiveable_id);																
					if(arID>0){
						if(arList[arID]===undefined){
							arList[arID]={"id": arID, "amt": amt, "rate": data.rate, "class_id": data.class_id};						
						}else{											
							if(arList[arID].id===arID){
								arList[arID].amt += amt;
							}else{
								arList[arID]={"id": arID, "amt": amt, "rate": data.rate, "class_id": data.class_id};
							}
						}
					}
				});

				if(!jQuery.isEmptyObject(arList)){
					var payAmount = kendo.parseFloat(this.get("pay_amount"));

					//Cash on Dr
					journalEntries.push({
				 		account_id 	: this.get("cash_account_id"),	 		
				 		dr 			: payAmount, 
				 		cr 			: 0,
				 		class_id  	: this.get("class_id"),
				 		memo 		: "",
				 		exchange_rate: 1,
					 	main: 0 	 		
					});

					// A/R on Cr
					$.each(arList, function(index, data){
						journalEntries.push({
					 		account_id 	: data.id,	 		
					 		dr 			: 0, 
					 		cr 			: data.amt,
					 		class_id  	: data.class_id,
					 		memo 		: "",
					 		exchange_rate: data.rate,
						 	main 		: 0	 		
						});
					});
				}
								
				journalDS.add({
					company_id: banhji.config.userData.company,
					vendor_id: 0,
					people_id: this.get("customer").id,
					employee_id: banhji.config.userData.userId,
					payment_id: 0,
					transaction_type: "Payment",
					payment_method: "cash",
					check_no: this.get("check_no"),
					memo: "ទទួលប្រាក់",
					date: kendo.toString(this.get("payment_date"), "yyyy-MM-dd"),
					// due_date: kendo.toString(this.dateDue, "yyyy-MM-dd"),
					// amount_billed: 0,
					// amount_due: 0,
					// amount_paid: 0,
					voucher: "",
					number: "",
					class_id: this.get("class_id"),
					status: 1,
					journalEntries: journalEntries,
					inJournal: 1			 			 		
			 	});

			 	journalDS.sync();
			 	this.loadPaymentForCashier();
			 	this.clear();			 		 	
			},
			updateCustomerBalance : function(){
				var data = this.get("customerBalanceList");
				$.ajax({
					type: "PUT",
					url: banhji.baseUrl + "api/people_api/balance_batch",			
					data: { data: kendo.stringify(data)},
					dataType: "json",
					success: function (response) {
						//var data = response.d;			  
					}
				});				
			},			
			clear 	: function() {
				this.set("check_no", "");				
				this.set("total", kendo.toString(0,"c0"));
				this.set("discount", 0);
				this.set("fine", 0);		
				this.set("pay_amount", kendo.toString(0,"c0"));
				this.set("remain", kendo.toString(0,"c0"));

				this.set("invoiceList", []);
				this.set("paymentList", []);
				this.set("customerBalanceList", []);

				//Clear datasources
				paymentDS.data([]);
				journalDS.data([]);				
			}
		});

		var singleModel = kendo.observable({
			sub_code 			: "km-KH",
			rate 				: 1,

			total_customer 		: 0,
			total_payment 		: kendo.toString(0,"c"),
			searchField 		: "",	

			//Payment
			class_id 			: "",
			discount 			: 0,
			fine 				: 0,
			payment_date		: new Date(),
			payment_method_id	: 1,
			cash_account_id 	: 2,
			check_no			: "",			
			payment_note		: "",
			cashier				: banhji.config.userData.userId,	
			
			//Others
			customer 			: null,
			invoices 			: null,		
			pay_amount  		: kendo.toString(0,"c"),
			remain				: kendo.toString(0,"c"),
				
			total 				: kendo.toString(0,"c"),
			
			classList 			: classDS,  
			paymentMethodList 	: paymentMethodDS,
			cashAccountList 	: cashAccountDS,

			statementCollectionList: statementCollectionDS,
			invoiceList 		: [],
			paymentList 		: [],
			customerBalanceList	: [],			
			
			pageLoad 			: function(invoice_id){
				this.clear();
				this.loadInvoice(invoice_id);				
			},			
			loadInvoice 		: function(id){
				var self = this;
				
				invoiceDS.filter({ field: "id", value: id });
				invoiceDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;

					if(type==="read" && response.length>0){																	
						var total = kendo.parseFloat(self.get("total"));
				    	var tpay = kendo.parseFloat(self.get("pay_amount"));
				    	var subCode = "km-KH";
				    	
				    	$.each(response, function(index, data){
				    		var t = kendo.parseFloat(data.total)/kendo.parseFloat(data.rate);				    		
			    			total += t;
			    			tpay += t;
			    							    			
							self.get("invoiceList").push({				
								id 				: data.id,
								isPay 			: true,				
								issued_date 	: data.issued_date,							
								number			: data.number,				
								total 			: t,
								pay_amount 		: t,
								rate 			: data.rate,
								sub_code 		: data.sub_code,
								customer_id 	: data.customer_id,
								account_receiveable_id: data.people.account_receiveable_id,
								class_id 		: data.people.class_id,
								balance 		: data.people.balance 
							});
							self.set("customer", data.people);
							self.set("rate", data.rate);
							subCode = data.sub_code;
						});

						var remain = total - tpay;
						    	
				    	self.set("pay_amount", kendo.toString(tpay, "c", subCode));    	
				    	self.set("total", kendo.toString(total, "c", subCode));
				    	self.set("remain", kendo.toString(remain,"c", subCode));
				    	
				    	self.autoIncreaseNo();	
				  	}			  	  			  	
				});	
			},			
			closeX 				: function(){
				kendo.fx($("#slide-form")).slideIn("up").play();				
				window.history.go(-1);
			},				
			autoIncreaseNo 		: function(){
				$(".sno").each(function(index,element){                 
				   $(element).text(index + 1); 
				});
			},
			change				: function(){
				var subCode = "km-KH";		
				var total = 0;		
			    var tpay = 0;	    
				$.each(this.get("invoiceList"), function(index, data){
					total += kendo.parseFloat(data.total);
			    	tpay += kendo.parseFloat(data.pay_amount);
			    	subCode = data.sub_code;			    	
				});
				this.set("total", kendo.toString(total, "c", subCode));    	   	    	
		    	this.set("pay_amount", kendo.toString(tpay, "c", subCode));
		    	var remain = (total + kendo.parseFloat(this.get("fine"))) - (tpay + kendo.parseFloat(this.get("discount")));
		    	this.set("remain", kendo.toString(remain, "c", subCode));

		    	this.autoIncreaseNo();    	
			},	
			remove 				: function(e){
				if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {        
			        var item = e.data;
			        var index = this.get("invoiceList").indexOf(item);        
			        this.get("invoiceList").splice(index, 1);
			        this.change();
		    	}
		    },
		    checkPay 			: function(e){
		    	e.preventDefault();
		    	var d = e.data;
		    	var target = e.currentTarget;

		    	if(target.checked){
		    		d.set("pay_amount", d.total);
		    	}else{
		    		d.set("pay_amount", 0);
		    	}
		    	this.change();
		    },
			add 		 		: function(){
				var self = this;				
				var t = this.get("total");
		        var tt = Number(t.replace(/[^0-9\.]+/g,""));

		        if(tt>0){		        				
					var ids = new Array();
					var arr = new Array();

					$.each(this.get("invoiceList"), function(index, data){						
						if(data.pay_amount > 0){				
							if(data.pay_amount >= data.total){
								ids.push({id:data.id, status: 1}); //Paid
							}else{
								ids.push({id:data.id, status: 2}); //Partially Paid
							}							
													
							//Add new invoice payment
							self.paymentList.push({
								invoice_id 			: data.id,								
								amount_paid 		: tt*kendo.parseFloat(data.rate),
								rate 				: data.rate,
								discount 			: kendo.parseFloat(self.get("discount"))*kendo.parseFloat(data.rate),
								fine 				: kendo.parseFloat(self.get("fine"))*kendo.parseFloat(data.rate),
								sub_code 			: data.sub_code,			
								payment_date		: kendo.toString(this.get("payment_date"), "yyyy-MM-dd"),
								payment_method_id	: self.get("payment_method_id"),
								check_no 			: self.get("check_no"),							  	  
								cash_account_id 	: self.get("cash_account_id"),
								payment_note		: self.get("payment_note"),
								cashier				: self.get("cashier"),
								customer_id			: data.customer_id,
								class_id 			: self.get("class_id")													
							});

							//Add new customer balances to []
							var balance = 0;										
							var index = jQuery.inArray(data.customer_id, arr);					
							if(index > -1){ //If a customer has two invoices											
								balance = kendo.parseFloat(self.customerBalanceList[index].balance) - kendo.parseFloat(data.pay_amount);
								self.customerBalanceList[index].set("balance", balance);
							}else{
								arr.push(data.customer_id);
								balance = kendo.parseFloat(data.balance) - kendo.parseFloat(data.pay_amount);
								self.customerBalanceList.push({
									id			: kendo.parseInt(data.customer_id),
									balance 	: balance
								});	
							}
						}		
					});

					//Add payments to database
					if(this.get("paymentList").length>0){
						paymentDS.add(this.get("paymentList"));
						paymentDS.sync();

						this.updateCustomerBalance();
						this.addJournal();						
					}		
					
					//Update invoice status
					if(ids.length>0){
						$.ajax({
							type: "PUT",
							url: banhji.baseUrl + "api/invoices/invoice_batch",				
							data: {ids: kendo.stringify(ids)},
							dataType: "json",
							success: function (response) {
								//var data = response.d;			  
							}
						});
					}
				}							
			},
			addJournal 			: function(){
				var self = this;				
				var journalEntries = [];				
				var payAmount = kendo.parseFloat(this.get("pay_amount"));
				var rate = this.get("rate");

				//Cash on Dr
				journalEntries.push({
			 		account_id 	: this.get("cash_account_id"),	 		
			 		dr 			: payAmount, 
			 		cr 			: 0,
			 		class_id  	: this.get("class_id"),
			 		memo 		: "",
			 		exchange_rate: 1,
				 	main: 0 	 		
				});

				// A/R on Cr				
				journalEntries.push({
			 		account_id 	: this.get("customer").account_receiveable_id,	 		
			 		dr 			: 0, 
			 		cr 			: payAmount,
			 		class_id  	: this.get("class_id"),
			 		memo 		: "",
			 		exchange_rate: rate,
				 	main 		: 0	 		
				});				
								
				journalDS.add({
					company_id: banhji.config.userData.company,
					vendor_id: 0,
					people_id: this.get("customer").id,
					employee_id: banhji.config.userData.userId,
					payment_id: 0,
					transaction_type: "Payment",
					payment_method: "cash",
					check_no: this.get("check_no"),
					memo: "ទទួលប្រាក់",
					date: kendo.toString(this.get("payment_date"), "yyyy-MM-dd"),
					// due_date: kendo.toString(this.dateDue, "yyyy-MM-dd"),
					// amount_billed: 0,
					// amount_due: 0,
					// amount_paid: 0,
					voucher: "",
					number: "",
					class_id: this.get("class_id"),
					status: 1,
					journalEntries: journalEntries,
					inJournal: 1			 			 		
			 	});

			 	journalDS.sync();
			 	this.clear();	 	
			},
			updateCustomerBalance : function(){
				var data = this.get("customerBalanceList");
				$.ajax({
					type: "PUT",
					url: banhji.baseUrl + "api/people_api/balance_batch",			
					data: { data: kendo.stringify(data)},
					dataType: "json",
					success: function (response) {
						//var data = response.d;			  
					}
				});				
			},			
			clear 				: function() {
				this.set("check_no", "");				
				this.set("total", kendo.toString(0,"c"));
				this.set("discount", 0);
				this.set("fine", 0);		
				this.set("pay_amount", kendo.toString(0,"c"));
				this.set("remain", kendo.toString(0,"c"));

				this.set("invoiceList", []);
				this.set("paymentList", []);
				this.set("customerBalanceList", []);

				//Clear datasources
				paymentDS.data([]);
				journalDS.data([]);				
			}
		});

		return {
			viewModel 		: viewModel,
			singleModel 	: singleModel
		};	
	}());

	banhji.dailyPayment = (function(){
		var paymentDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/payments/payment",
					type: "GET",
					dataType: "json"
				}
			},
			pageSize: 50,	
			serverFiltering: true
		});
		
		var viewModel = kendo.observable({			
			today 				: new Date(),
			payment_date_from	: new Date(),
			payment_date_to  	: "",

			cashier 			: banhji.config.userData.userId,
			cashier_name 		: banhji.config.userData.username,
			totalPaid			: kendo.toString(0, 'c'),

			paymentList 		: paymentDS,
			
			payment_date_from_str	: function(){
				var strDate = "";
				var date = Date.parse(this.get("payment_date_from"));		
				if(isNaN(date)==false){		
					strDate = kendo.toString(this.get("payment_date_from"), "dd-MM-yyyy");
				}	
				return strDate;	
			},
			payment_date_to_str  	: function(){
				var strDate = "";
				var date = Date.parse(this.get("payment_date_to"));		
				if(isNaN(date)==false){		
					strDate = " ដល់ " + kendo.toString(this.get("payment_date_to"), "dd-MM-yyyy");
				}	
				return strDate;	
			},
			closeX 				: function(){
				kendo.fx($("#slide-form")).slideIn("up").play();				
				window.history.go(-1);
			},				
			searchPayment 		: function(){
				var self = this;
				var paymentDateFrom = kendo.toString(new Date(this.get("payment_date_from")), "yyyy-MM-dd");		
					
				var paymentDateTo = paymentDateFrom;
				var date = Date.parse(this.get("payment_date_to"));	
				if(isNaN(date)==false){		
					paymentDateTo = kendo.toString(new Date(this.get("payment_date_to")), "yyyy-MM-dd");
				}

				paymentDS.filter({
					filters: [
						{ field: "payment_date >=", value: paymentDateFrom },
						{ field: "payment_date <=", value: paymentDateTo },
						{ field: "cashier", value: this.get('cashier') }				
					]
				});
				paymentDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;

					if(type==="read"){
					  	var total = 0;
				    	for (var i=0; i< response.length; i++) {
				    		total += kendo.parseFloat(response[i].amount_paid);
				    	}
				    	self.set('totalPaid', kendo.toString(total, 'c'));											  
				  	}			  	  			  	
				});
			}				
		});

		return {
			viewModel 		: viewModel
		};
	}());

	banhji.reconcile = (function(){
		var receivePaymentDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/payments/payment",
					type: "GET",
					dataType: "json"
				}
			},		
			serverFiltering: true
		});	

		var reconcileDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/reconciles/reconcile",
					type: "GET",
					dataType: "json"
				},
				create: {
		            url: banhji.baseUrl + "api/reconciles/reconcile",
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
					id: "id"
				}		
			},			
			serverPaging: true,
			pageSize: 1,		
			serverFiltering: true
		});

		var accountDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/accounts/account",
					type: "GET",
					dataType: "json"
				}
			},
			filter:[ 
				{ field: "account_type_id", value: 6 }		
			]
		});

		var journalDS = new kendo.data.DataSource({
		  	transport: {	  
			    create: {
				  	url : banhji.baseUrl + "api/accounting_api/journals",
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

		var classDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/classes/class",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "type", value: "Class" },
			serverFiltering: true		
		});
		
		var viewModel = kendo.observable({
			today 				: kendo.toString(new Date(), "dd-MM-yyyy"),
			transfer_account_id : "",
			class_id 			: "",
			memo 				: "",

			cashier 			: banhji.config.userData.userId,
			cashier_name 		: banhji.config.userData.username,
			
			totalReceive 		: kendo.toString(0, 'c'),
			prevRemain 			: kendo.toString(0, 'c'),

			classList 			: classDS,

			closeX 				: function(){
				kendo.fx($("#slide-form")).slideIn("up").play();				
				window.history.go(-1);
			},	
			totalCash 			: function(){
				var tc = kendo.parseFloat(this.get('totalReceive')) + kendo.parseFloat(this.get('prevRemain'));
				return kendo.toString(tc, 'c0');
			},
			reconcileBalance 	: function(){		
				var reBal = kendo.parseFloat(this.totalCash()) - kendo.parseFloat(this.totalDR());				
				if(reBal==0){			
					$("#reconcileBalance").removeClass("alert alert-error");
					$("#reconcileBalance").addClass("alert alert-success");
				}else{
					$("#reconcileBalance").removeClass("alert alert-success");
					$("#reconcileBalance").addClass("alert alert-error");			
				}
				return kendo.toString(reBal,'c0');
			},
			transferBalance 	: function(){
				var tranBal = kendo.parseFloat(this.totalDR()) - kendo.parseFloat(this.totalTransferCash());
				return kendo.toString(tranBal, 'c0');
			},

			rate 				: 4000,

			totalD				: "0.00",	
			totalR				: kendo.toString(0, 'c'),	
			totalDtoR 			: function(){
				var rate = kendo.parseFloat(this.get("rate"));
				var td = kendo.parseFloat(this.get("totalD"));
				var tdtor = td * rate;
				return kendo.toString(tdtor, 'c0');
			},
			totalDR 	 		: function(){		
				var tdr = kendo.parseFloat(this.totalDtoR()) + kendo.parseFloat(this.get("totalR"));
				return kendo.toString(tdr, 'c0');
			},

			totalDT 			: "0.00",
			totalRT 			: kendo.toString(0, 'c'),
			totalDTtoRT			: function(){
				var rate = kendo.parseFloat(this.get("rate"));
				var tdt = kendo.parseFloat(this.get("totalDT"));
				var tdttort = tdt * rate;
				return kendo.toString(tdttort, 'c0');
			},
			totalTransferCash 	: function(){		
				var tc = kendo.parseFloat(this.totalDTtoRT()) + kendo.parseFloat(this.get("totalRT"));
				return kendo.toString(tc, 'c0');
			},
				
			accountList 		: accountDS,
			reconcileItemList 	: [],

			denominationList 	: [
				{ 'denomination':1, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':2, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':5, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':10, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':20, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':50, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':100, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':500, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':1000, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':2000, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':5000, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':10000, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':20000, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':50000, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':100000, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' }
			],

			pageLoad 			: function(){
				var self = this;
				var today = kendo.toString(new Date(), "yyyy-MM-dd");

				reconcileDS.filter({
					filters: [
						{ field: "reconciled_date <", value: today },
						{ field: "cashier", value: this.get('cashier') }				
					]
				});
				reconcileDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;

					if(type==="read" && response.length>0){
					  	var totalRemain = response.reconcile_amount - response.transfer_amount;
	    				self.set('prevRemain', kendo.toString(totalRemain, 'c'));											  
				  	}			  	  			  	
				});

				receivePaymentDS.filter({
					filters: [
						{ field: "payment_date", value: today },
						{ field: "cashier", value: this.get('cashier') }				
					]
				});				
				receivePaymentDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;

					if(type==="read" && response.length>0){
					  	var total = 0;
				    	for (var i=0; i< response.length; i++) {
				    		total += kendo.parseFloat(response[i].amount_paid);
				    	}
				    	self.set('totalReceive', kendo.toString(total, 'c'));
				    	self.change();											  
				  	}			  	  			  	
				});				
			},
			searchPayment 		: function(){
				var paymentDateFrom = kendo.toString(new Date(this.get("payment_date_from")), "yyyy-MM-dd");		
					
				var paymentDateTo = paymentDateFrom;
				var date = Date.parse(this.get("payment_date_to"));	
				if(isNaN(date)==false){		
					paymentDateTo = kendo.toString(new Date(this.get("payment_date_to")), "yyyy-MM-dd");
				}		
			},
			change				: function(){
				var totalD = 0;
				var totalR = 0;
				var totalDT = 0;
				var totalRT = 0;

				for(var i=0; i < this.denominationList.length; i++){
					var data = this.denominationList[i];
					var dem = kendo.parseFloat(data.denomination);

			    	totalD += kendo.parseFloat(data.qty_usd) * dem;
			    	totalR += kendo.parseFloat(data.qty_khr) * dem;

			    	totalDT += kendo.parseFloat(data.qty_usd_transfer) * dem;
			    	totalRT += kendo.parseFloat(data.qty_khr_transfer) * dem;	    	
				}

				this.set('totalD', kendo.toString(totalD, 'n0'));
				this.set('totalR', kendo.toString(totalR, 'c0'));

				this.set('totalDT', kendo.toString(totalDT, 'n0'));
				this.set('totalRT', kendo.toString(totalRT, 'c0'));		  	 	
			},	
			transferAll 		: function(){
				for(var i=0; i < this.denominationList.length; i++){
					var data = this.denominationList[i];			
					if(data.qty_usd>0){
						data.set('qty_usd_transfer', data.qty_usd);
					}

					if(data.qty_khr>0){
						data.set('qty_khr_transfer', data.qty_khr);
					}	    	   	
				}
				this.change();
			},
			save 				: function(){
				this.addReconcile();
				this.addJournal();
				this.clear();
			},
			addReconcile 		: function(){
				for(var i=0; i < this.denominationList.length; i++){
					var data = this.denominationList[i];
								
					if(data.qty_usd>0 || data.qty_khr>0 || data.qty_usd_transfer>0 || data.qty_khr_transfer>0){
						this.reconcileItemList.push({
							'denomination' 		: data.denomination,					
							'qty_usd' 			: data.qty_usd,
							'qty_khr' 			: data.qty_khr,
							'qty_usd_transfer' 	: data.qty_usd_transfer,
							'qty_khr_transfer' 	: data.qty_khr_transfer,
							'reconcile_id'		: 0
						});
					}						    		    	
				}

				reconcileDS.add({
					cashier 			: this.get('cashier'),					 
					reconciled_date 	: kendo.toString(new Date(), 'yyyy-MM-dd'),					
					rate				: this.get('rate'),
					reconcile_amount	: kendo.parseFloat(this.totalDR()),
					transfer_amount		: kendo.parseFloat(this.totalTransferCash()),
					transfer_account_id : this.get('transfer_account_id'),
					class_id 			: this.get('class_id'),
					memo 				: this.get('memo'),

					reconcileItems 		: this.get('reconcileItemList')
				});

				reconcileDS.sync();		
			},
			addJournal 			: function(){
				var self = this;
				var journalEntries = [];

				//Transfer account on Dr				
				journalEntries.push({
			 		account_id 	: this.get("transfer_account_id"),	 		
			 		dr 			: kendo.parseFloat(this.totalTransferCash()), 
			 		cr 			: 0,
			 		class_id  	: this.get("class_id"),
			 		memo 		: this.get("memo"),
			 		exchange_rate: 1,
				 	main 		: 0	 		
				});

				var cashInTillList = {};
				$.each(receivePaymentDS.data(), function(index, data){
					var cash_in_till_id = data.cash_account_id;
					var amt = kendo.parseFloat(data.amount_paid)															
					if(cash_in_till_id>0){
						if(cashInTillList[cash_in_till_id]===undefined){
							cashInTillList[cash_in_till_id]={"id": cash_in_till_id, "amt": amt};						
						}else{											
							if(cashInTillList[cash_in_till_id].id===cash_in_till_id){
								cashInTillList[cash_in_till_id].amt += amt;
							}else{
								cashInTillList[cash_in_till_id]={"id": cash_in_till_id, "amt": amt};
							}
						}
					}
				});

				//Cash in till on Cr
				$.each(cashInTillList, function(index, value){
					journalEntries.push({
				 		account_id 	: value.id,	 		
				 		dr 			: 0, 
				 		cr 			: value.amt,
				 		class_id  	: self.get("class_id"),
				 		memo 		: self.get("memo"),
				 		exchange_rate: 1,
					 	main 		: 0	 		
					});
				});				

				//Add journal to datasource				
			 	journalDS.add({
					company_id: banhji.config.userData.company,
					vendor_id: 0,
					people_id: 0,
					employee_id: banhji.config.userData.userId,
					payment_id: 0,
					transaction_type: "Reconcile",
					payment_method: "",
					check_no: "",
					memo: "ផ្ទៀងផ្ទាត់ និង ផ្ទេរសាច់ប្រាក់",
					date: kendo.toString(new Date(), "yyyy-MM-dd"),
					//due_date: kendo.toString(this.dateDue, "yyyy-MM-dd"),
					// amount_billed: 0,
					// amount_due: 0,
					// amount_paid: 0,
					voucher: "",
					number: "",
					class_id: this.get("class_id"),
					status: 1,
					journalEntries: journalEntries,
					inJournal: 1			 		 		
			 	});	 	

			  	journalDS.sync();
			},
			clear 				: function(){    	
				this.set("reconcileItemList", []);

				totalD			: "0.00";	
				totalR			: kendo.toString(0, 'c0');	
				totalDtoR 		: kendo.toString(0, 'c0');
				totalDR 	 	: kendo.toString(0, 'c0');

				totalDT 		: "0.00";
				totalRT 		: kendo.toString(0, 'c0');
				totalDTtoRT		: kendo.toString(0, 'c0');
				totalTransferCash : kendo.toString(0, 'c0');

				reconcileDS.data([]);
				journalDS.data([]);				
				this.pageLoad();
		    }	
		});

		return {
			viewModel 		: viewModel
		};
	}());

	banhji.agingSummary = (function(){		
		var companyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/companies/company",
					type: "GET",
					dataType: "json"
				}
			}		
		});

		var transformerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/transformer_cascading",
					type: "GET",
					dataType: "json"
				}
			},	
			serverFiltering: true
		});

		var agingDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/aging_batch",
				  	type: "GET",
				  	dataType: "json"		  
			  	}
		  	},
		  	schema: {		
				data: "people",
				total: "total"
			},
		  	serverPaging: true,  		
		  	pageSize: 50,
		  	serverFiltering: true  		
		});
				
		var viewModel = kendo.observable({
			company_id 		: 0,
			transformer_id 	: 0,
			issued_date 	: new Date(),

			companyList 	: companyDS,
			transformerList : transformerDS,
			agingList 		: agingDS,

			issued_date_text : function(){
				return kendo.toString(this.get("issued_date"), "dd-MM-yyyy");
			},
			autoIncreaseNo 		: function(){
				$(".sno").each(function(index,element){                 
				   $(element).text(index + 1); 
				});
			},
			search 	: function(){
				var para = [];

				var company_id = this.get("company_id");
				if(company_id>0){
					para.push({
						field: "company_id", value: company_id
					});
				}

				var transformer_id = this.get("transformer_id");
				if(transformer_id>0){
					para.push({
						field: "transformer_id", value: transformer_id
					});
				}		
				
				if(this.get("issued_date")==null){
					this.set("issued_date", new Date());
				}
				para.push({
					field: "issued_date", value: kendo.toString(this.get("issued_date"), "yyyy-MM-dd")
				});
				
				if(para.length>0){
					agingDS.filter(para);
				}					
			}	
		});
		return {
			viewModel 	: viewModel
		};
	}());

	banhji.agingDetail = (function(){		
		var companyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/companies/company",
					type: "GET",
					dataType: "json"
				}
			}		
		});

		var transformerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/transformer_cascading",
					type: "GET",
					dataType: "json"
				}
			},	
			serverFiltering: true
		});

		var agingDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/aging_detail",
				  	type: "GET",
				  	dataType: "json"		  
			  	}
		  	},
		  	schema: {		
				data: "people",
				total: "total"
			},
		  	serverPaging: true,  		
		  	pageSize: 50,
		  	serverFiltering: true  		
		});
				
		var viewModel = kendo.observable({
			company_id 		: 0,
			transformer_id 	: 0,
			issued_date 	: new Date(),

			companyList 	: companyDS,
			transformerList : transformerDS,
			agingList 		: agingDS,

			issued_date_text : function(){
				return kendo.toString(this.get("issued_date"), "dd-MM-yyyy");
			},
			autoIncreaseNo 		: function(){
				$(".sno").each(function(index,element){                 
				   $(element).text(index + 1); 
				});
			},
			search 	: function(){
				var para = [];

				var company_id = this.get("company_id");
				if(company_id>0){
					para.push({
						field: "company_id", value: company_id
					});
				}

				var transformer_id = this.get("transformer_id");
				if(transformer_id>0){
					para.push({
						field: "transformer_id", value: transformer_id
					});
				}		
				
				if(this.get("issued_date")==null){
					this.set("issued_date", new Date());
				}
				para.push({
					field: "issued_date", value: kendo.toString(this.get("issued_date"), "yyyy-MM-dd")
				});
				
				if(para.length>0){
					agingDS.filter(para);
				}					
			}	
		});
		return {
			viewModel 	: viewModel
		};
	}());

	banhji.lowConsumption = (function(){
		var companyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/companies/company",
					type: "GET",
					dataType: "json"
				}
			}		
		});

		var transformerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/transformer_cascading",
					type: "GET",
					dataType: "json"
				}
			},	
			serverFiltering: true
		});

		var consumptionDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/meter_records/low_consumption",
				  	type: "GET",
				  	dataType: "json"		  
			  	}
		  	},  		  	
		  	serverFiltering: true  		
		});
					
		var viewModel = kendo.observable({
			company_id 		: 0,
			transformer_id 	: 0,
			reading_date 	: new Date(),

			usage 			: 5,

			companyList 		: companyDS,
			transformerList : transformerDS,
			consumptionList : consumptionDS,

			reading_date_text : function(){
				return kendo.toString(this.get("reading_date"), "dd-MM-yyyy");
			},	
			search 			: function(){
				var readingDate = this.get("reading_date");
				if(readingDate==null){
					this.set("reading_date", new Date());
				}

				var transformer_id = this.get("transformer_id");
				if(transformer_id>0){
					consumptionDS.filter({
						filters: [
							{ field: "reading_date", value: kendo.toString(this.get("reading_date"), "yyyy-MM-dd") },
							{ field: "usage", value: this.get("usage") },				
							{ field: "transformer_id", value: this.get("transformer_id") }
						]
					});
				}
			}	
		});
		return {
			viewModel 	: viewModel
		};
	}());

	banhji.disconnectList = (function(){
		var companyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/companies/company",
					type: "GET",
					dataType: "json"
				}
			}		
		});

		var disconnectDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/disconnect_list",
				  	type: "GET",
				  	dataType: "json"		  
			  	}
		  	},  	
		  	serverFiltering: true  		
		});
		
		var viewModel = kendo.observable({
			company_id 		: 0,
			over_due_day 	: null,

			companyList 	: companyDS,
			disconnectList 	: disconnectDS,
				
			search 			: function(){
				var company_id = this.get("company_id");
				var over_due_day = this.get("over_due_day");								
				if(company_id>0 && over_due_day!=null){
					disconnectDS.filter({
						filters: [
							{ field: "over_due_day", value: this.get("over_due_day") },
							{ field: "company_id", value: this.get("company_id") }
						]
					});
				}					
			}	
		});
		return {
			viewModel 	: viewModel
		};
	}());

	banhji.eInvoicePreview = (function(){
		var invoiceDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/print_batch",
				  	type: "GET",
				  	dataType: "json"		  
			  	}
		  	},	 	
		  	serverFiltering: true,
		  	requestEnd: function(e) {
		  		if(e.type === "read") {  			
		  			viewModel.set("invoiceList", e.response);
		  			viewModel.barcod();
		  		}
		  		
		  	}
		});

		var companyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/companies/company",
					type: "GET",
					dataType: "json"
				}
			}		
		});

		var transformerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/transformer_cascading",
					type: "GET",
					dataType: "json"
				}
			},	
			serverFiltering: true
		});
		
		var viewModel = kendo.observable({
			invoice_no 			: "",	
			company_id 			: 0,
			month_of 			: new Date(),	
			isVisible 			: true,
			
			invoiceList 		: [],
			companyList 		: companyDS,	
			transformerList 	: transformerDS,

			pageLoad 			: function(number){				
				this.set("invoice_no", number);
				this.search();				
			},
			search 				: function(){
				var para = new Array();
				var transformer = this.get("transformer_id");
				var monthOf = new Date(this.get("month_of"));		
				monthOf.setDate(1);
				monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

				var invoice_no = this.get("invoice_no");		
				if(invoice_no!=""){
					para.push({field: "number", value: invoice_no});
				}
				
				if(transformer!=null && monthOf!=""){
					para.push({ field: "transformer_id", value: transformer.id },
							{ field: "month_of", value: monthOf }
					);
				}
				if(para.length>0){
					invoiceDS.filter(para);
				}			
			},	
			barcod 				: function(){			
				var data = this.invoiceList;
				for (var i=0;i<data.length;i++) {
					var d = data[i];
					var id = d.customers.number;

					$("."+d.number).kendoBarcode({
					  	value: id,
					  	width: 200,
						height: 30,
						text:{
						    visible: false
						}				
					});
				}		
			},
			print 				: function(e) {
				var printBtn = e.target;
				if(printBtn.checked) {
					$(".hiddenPrint").css("visibility", "hidden");
				} else {
					$(".hiddenPrint").css("visibility", "visible");
				}
			},
			printInvoice : function(){
				javascript:window.print();
			}
		});
		return {
			viewModel 	: viewModel
		};
	}());

	banhji.newCompany = (function(){
		var companyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/companies/company",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/companies/company",
					type: "POST",
					dataType: "json"
				},		
				update: {
					url: banhji.baseUrl + "api/companies/company",
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
			serverFiltering: true
		});

		var companyTypeDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/companies/company_type",
					type: "GET",
					dataType: "json"
				}
			}
		});

		var parentDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/companies/company",
					type: "GET",
					dataType: "json"
				}
			},
			filter: { field: "parent_id", value: 0 },			
			serverFiltering: true
		});

		var currencyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/currencies/index",
					type: "GET",
					dataType: "json"
				}
			}		
		});
		
		var viewModel = kendo.observable({
			id 				: 0,		
			name 			: "",			
			year_founded    : "",			
			operation_license : "",
			mobile 			: "",
			phone 			: "",
			email			: "",
			address 		: "",
			term_of_condition : "",
			representative  : "",
			fiscal_year 	: "",
			based_currency  : "",
			use_generator 	: "គ្មាន",
			image_url 		: "",
			company_type_id	: 0,
			parent_id 		: 0,		
			
			useGenerators  	: [{id:0,name:"គ្មាន"},{id:1,name:"មាន"}],

			companyTypeList : companyTypeDS,
			currencyList 	: currencyDS,
			parentList 		: parentDS,
						
			add 			: function(){				
				companyDS.add({				
					name 			: this.get("name"),
					abbr 			: this.get("abbr"),				
					year_founded	: this.get("year_founded"),					
					operation_license: this.get("operation_license"),
					mobile			: this.get("mobile"),
					phone			: this.get("phone"),
					email			: this.get("email"),
					address			: this.get("address"),
					term_of_condition : this.get("term_of_condition"),
					representative	: this.get("representative"),				
					fiscal_year		: kendo.toString(this.get("fiscal_year"),"yyyy-MM-dd"),
					vat_no 			: this.get("vat_no"),
					based_currency	: this.get("based_currency"),
					use_generator	: this.get("use_generator"),
					image_url		: this.get("image_url"),
					company_type_id : this.get("company_type_id"),
					parent_id		: this.get("parent_id")
				});		

				companyDS.sync();
			},
			update 	: function(id){				
				var com = companyDS.get(id);
			
				com.set("name",this.get("name"));
				com.set("abbr",this.get("abbr"));			
				com.set("year_founded",this.get("year_founded"));				
				com.set("operation_license",this.get("operation_license"));
				com.set("mobile",this.get("mobile"));
				com.set("phone",this.get("phone"));
				com.set("email",this.get("email"));
				com.set("address",this.get("address"));
				com.set("term_of_condition",this.get("term_of_condition"));
				com.set("representative",this.get("representative"));
				com.set("fiscal_year", kendo.toString(this.get("fiscal_year"),"yyyy-MM-dd"));
				com.set("vat_no", this.get("vat_no"));
				com.set("based_currency",this.get("based_currency"));
				com.set("use_generator",this.get("use_generator"));
				com.set("image_url",this.get("image_url"));
				com.set("company_type_id",this.get("company_type_id"));
				com.set("parent_id",this.get("parent_id"));

				companyDS.sync();
			}  			
		}); 

		return {
			viewModel 	: viewModel
		};
	}());
	//END OF DAWINE ---------------------------------------------

	
	/* Banhji Application Views */
	banhji.view = (function(){
		var missingModel = kendo.observable({
			back: function(e) {
				e.preventDefault();
				window.history.go(-1);
			}
		});
		//Layouts and views
		var layout = new kendo.Layout("#layout");
		var index = new kendo.Layout("#index");
		var missing = new kendo.View("#404", {model: missingModel});

		//By Dararith
		var vendor = new kendo.Layout("#vendor", {model: banhji.vendor});
		var vendorBill = new kendo.Layout("#paybill", {model: banhji.bill.viewModel});
		var accounting = new kendo.Layout("#accounting", {model: banhji.account});
		
		// items start
		var items = new kendo.Layout("#itemsView");
		var itemsDetail = new kendo.View("#itemsDetailView", {model: banhji.items});
		var itemsNew = new kendo.View("#itemsNewView", {model: banhji.items});
		var itemsReport = new kendo.View("#itemsReportView", {model: banhji.items});
		// items ends

		// class section starts
		var classes = new kendo.View("#classesTmpl");
		var newCls 	= new kendo.View("#newClsTmpl");
		// class section ends
		
		var blank = new kendo.View("#blank");
		var accDetail = new kendo.View("#account-detail", {model: banhji.account});
		var acinfo 	= new kendo.Layout("#acInfo", {model:banhji.account});
		var accreate 	= new kendo.View("#createNew", {model:banhji.account});
		var acedit 	= new kendo.View("#editTmpl", {model:banhji.account});
		var accountingJournal = new kendo.Layout("accountingJournal");
		var accountingItems = new kendo.Layout("accountingItems");
		var vendorS= new kendo.Layout("#vendorSingle", {model: banhji.vendor});
		var vendorNew= new kendo.View("#vendorNew", {model: banhji.vendor});
		var vendorHistory= new kendo.View("#vendorHistory", {model: banhji.vendor});
		var vendorPayable= new kendo.View("#vendorPayable");
		var vendorInfo = new kendo.Layout("#vendorInfo", {model: banhji.vendor});
		var vendorInformation = new kendo.View("#supplierInformation", {model: banhji.vendor});
		var eBill = new kendo.View("#eBill", {model: banhji.eBill.viewModel});
		var purchase = new kendo.View("#purchase", {model: banhji.purchase.viewModel});
		var expense = new kendo.View("#expense", {model: banhji.expense.viewModel});
		var pmt 	= new kendo.View("#paymentReview", {model: banhji.payment});		
		var missing = new kendo.View("#404", {model: missingModel});
		var welcome = new kendo.View("#welcome");
		var balanceSheet = new kendo.View("#balanceSheet", {model: banhji.balanceSheet});
		var plReport = new kendo.View("#plReport");
		var journal = new kendo.View("#journalReport", {model: banhji.journal.viewModel});
		var glReport = new kendo.View("#glReport");
		var poTracker = new kendo.View("#poTracking");
		var company = new kendo.View("#companyList");
		var users = new kendo.View("#userList");
		var reports = new kendo.View("#reports", {model: banhji.report});
		var electricity = new kendo.Layout("#transformer");
		var electricityReport = new kendo.Layout("#electricityReport");
		var po = new kendo.View("#po", {model: banhji.po.viewModel});

		var cls= new kendo.View("#clsTmpl", {model: banhji.class});

		//By Visal
		var inventory = new kendo.View("#inventory");
		var layMain = new kendo.Layout("#homeInventory");
		// var homeIn = new kendo.View("#homeIn",{ model: banhji.inventory.viewModel });

		var inventoryItem = new kendo.View("#inIview",{ model: banhji.inventoryItemView.viewModel });
		var unitMeasure = new kendo.View("#unit_measure", { model: banhji.unitMeasure.viewModel });
		var loadAdjustment = new kendo.View("#adjustment", { model: banhji.adjustment.viewModel });
		var grnView = new kendo.View("#grnView",{ model: banhji.grn.viewModel });

		var layoutView 	= new kendo.Layout("#layoutView");
		var itemView 	= new kendo.View("#itemView");
		var itemNewView = new kendo.View("#itemNewView");
		var itemEditView= new kendo.View("#itemEditView");
		var itemDeleteView= new kendo.View("#itemDeleteView");

		//BY DAWINE -------------------------------
		var customer = new kendo.Layout("#customer", {model: banhji.customer.viewModel});
		var customerDB = new kendo.View("#customerDashboard", {model: banhji.customer.viewModel});
		var customerNew = new kendo.View("#newCustomer", {model: banhji.customer.newCustomerModel});				
		var customerS = new kendo.View("#customerSingle", {model: banhji.customer.viewModel});
		
		var invoice = new kendo.View("#invoice", {model: banhji.invoice.viewModel});
		var receipt = new kendo.View("#receipt", {model: banhji.receipt.viewModel});
		var so = new kendo.View("#so", {model: banhji.so.viewModel});
		var estimate = new kendo.View("#estimate", {model: banhji.estimate.viewModel});
		var gdn = new kendo.View("#gdn", {model: banhji.gdn.viewModel});
		var statement = new kendo.View("#statement", {model: banhji.statement.viewModel});
		
		var eMeter = new kendo.View("#eMeter", {model: banhji.eMeter.viewModel});
		var eReadingSingle = new kendo.View("#eReadingSingle", {model: banhji.eMeter.readingSingleModel});
		var eReading = new kendo.View("#eReading", {model: banhji.eReading.viewModel});
		var eInvoice = new kendo.View("#eInvoice", {model: banhji.eInvoice.viewModel});
		var notice = new kendo.View("#notice", {model: banhji.eMeter.noticeModel});

		var cashier = new kendo.View("#cashier", {model: banhji.cashier.viewModel});
		var cashierSingle = new kendo.View("#cashierSingle", {model: banhji.cashier.singleModel});
		var dailyPayment = new kendo.View("#dailyPayment", {model: banhji.dailyPayment.viewModel});
		var reconcile = new kendo.View("#reconcile", {model: banhji.reconcile.viewModel});

		var customerBalance = new kendo.View("#customerBalance");
		var agingSummary = new kendo.View("#agingSummary", {model: banhji.agingSummary.viewModel});
		var agingDetail = new kendo.View("#agingDetail", {model: banhji.agingDetail.viewModel});
		var lowConsumption = new kendo.View("#lowConsumption", {model: banhji.lowConsumption.viewModel});
		var disconnectList = new kendo.View("#disconnectList", {model: banhji.disconnectList.viewModel});

		var eInvoicePreview = new kendo.View("#eInvoicePreview", {model: banhji.eInvoicePreview.viewModel});

		var newCompany = new kendo.View("#newCompany", {model: banhji.newCompany.viewModel});
		var users = new kendo.View("#users");
		var currencyRates = new kendo.View("#currencyRates");
		var customerTypes = new kendo.View("#customerTypes");
		var classes = new kendo.View("#classes");
		
		var eSetting = new kendo.View("#eSetting");
		var useElectricity = new kendo.View("#useElectricity");
		var amperes = new kendo.View("#amperes");
		var voltages = new kendo.View("#voltages");
		var electricityBoxes = new kendo.View("#electricityBoxes");
		
		var tariffPlans = new kendo.View("#tariffPlans");
		var tariffs = new kendo.View("#tariffs");		
		var exemptions = new kendo.View("#exemptions");
		var maintenances = new kendo.View("#maintenances");

		var finishRegister = new kendo.View("#finishRegister");
		//END OF DAWINE

		return {
			layout: layout,
			index: index,			
			missing: missing,

			//By Dararith
			vendor: vendor,
			blank: blank,
			vendorBill: vendorBill,
			vendorSingle: vendorS,
			vendorNew: vendorNew,
			items: items,
			itemsDetail: itemsDetail,
			itemsNew: itemsNew,
			itemsReport: itemsReport,
			vendorHistory: vendorHistory,
			vendorPayable: vendorPayable,
			vendorInfo: vendorInfo,
			vendorInformation: vendorInformation,
			eBill: eBill,
			welcome: welcome,
			reports: reports,
			balanceSheet: balanceSheet,
			plReport: plReport,
			glReport: glReport,
			journal: journal,
			electricity: electricity,
			electricityReport: electricityReport,
			purchase: purchase,
			expense: expense,
			payment: pmt,			
			company: company,
			users: users,
			accounting: accounting,
			accountingJournal: accountingJournal,
			accountingItems: accountingItems,
			accDetail: accDetail,
			acInfo: acinfo,
			acEdit: acedit,
			acCreate: accreate,
			poTracker: poTracker,
			po: po,
			cls: classes,
			newCls: newCls,
			cls: cls,
			
			//Visal
			inventory: inventory,
			layoutView: layoutView,
			itemView: itemView,
			itemNewView: itemNewView,
			itemEditView: itemEditView,
			itemDeleteView: itemDeleteView,
			// itemReport: itemReport,
			layMain: layMain,
			// homeIn: homeIn,
			inventoryItem: inventoryItem,
			unitMeasure: unitMeasure,
			loadAdjustment: loadAdjustment,
			grnView: grnView,

			//BY DAWINE
			customer 		: customer,
			customerNew 	: customerNew,
			customerDashboard: customerDB,				
			customerSingle 	: customerS,
			
			invoice 		: invoice,
			receipt 		: receipt,
			so 				: so,
			estimate 		: estimate,
			gdn 			: gdn,
			statement 		: statement,

			eMeter 			: eMeter,
			eReadingSingle 	: eReadingSingle,
			eReading 		: eReading,
			eInvoice 		: eInvoice,
			notice 			: notice,

			cashier 		: cashier,
			cashierSingle 	: cashierSingle,
			dailyPayment 	: dailyPayment,
			reconcile 		: reconcile,

			customerBalance : customerBalance,
			agingSummary 	: agingSummary,
			agingDetail 	: agingDetail,
			lowConsumption 	: lowConsumption,
			disconnectList 	: disconnectList,

			eInvoicePreview : eInvoicePreview,

			newCompany 		: newCompany,
			users 			: users,
			currencyRates 	: currencyRates,
			customerTypes 	: customerTypes,
			classes 		: classes,
			
			useElectricity 	: useElectricity,
			eSetting 		: eSetting,
			amperes  		: amperes,
			voltages 		: voltages,
			electricityBoxes: electricityBoxes,
			
			tariffPlans 	: tariffPlans,
			tariffs 		: tariffs,	
			exemptions 		: exemptions,
			maintenances 	: maintenances,
			
			finishRegister 	: finishRegister		
		};
	}());	

	/* Router section */
	banhji.router = new kendo.Router({
		init: function() {
			banhji.view.layout.render("#wrapper");
		},
		routeMissing: function(e) {
			banhji.view.layout.showIn("#layout-view", banhji.view.missing);
		}
	});

	banhji.router.route("/", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.welcome);
	});

	//BY DAWINE ----------------------------------	
	banhji.router.route("customers", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.customer);				

		if(banhji.customer.viewModel.get("customer") === null){		
			banhji.view.customer.showIn("#detail", banhji.view.customerDashboard);

			var template = kendo.template($("#menu").html());
			var menu = [];
			for(var i=0;i<banhji.km.length; i++) {
				var current = banhji.km[i];
				if(banhji.config.userData.allowedModules[i]) {
					menu.push(current);
				}
			}
			$("#header").html(template(menu));
			$("#home-menu").text("Banhji | អតិថិជន");
			$("#secondary-menu").html("<li><a href='\#customers'>គេហទំព័រ</a></li><li><a href='\#new_customer'>អតិថិជនថ្មី</a></li><li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'><span><i class='icon-lightbulb'></i> ផ្នែកអគ្គីសនី</span><span class='caret'></span></a><ul class='dropdown-menu'><li><a href='\#eReading'>អំនានកុងទ័រ</a></li><li><a href='\#eInvoice'>រៀបចំវិក្កយបត្រ</a></li><li><a href='\#eInvoice_preview'>បោះពុម្ពវិក្កយបត្រអគ្គីសនី</a></li><li><a href='\#disconnect_list'>តារាងផ្ដាច់ចរន្ត</a></li><li><a href='\#low_consumption'>អតិថិជនប្រើប្រាស់ថាមពលជាអប្បបរិមា</a></li></ul></li><li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'>របាយការណ៍<span class='caret'></span></a><ul class='dropdown-menu'><li><a href='\#customer_balance'>បញ្ជីអតិថិជន</a></li><li><a href='\#aging_summary'>បំណុលអតិថិជនសង្ខេប</a></li><li><a href='\#aging_detail'>បំណុលអតិថិជនលំអិត</a></li></ul></li>");			

			banhji.customer.viewModel.set("showMenu", false);
			
			var grid = $("#sidebar").kendoGrid({
				dataSource: banhji.customer.viewModel.customerList,							
				selectable: true,
				columns: [
					{ title: ""}
				],
				height: "400px",
				rowTemplate: kendo.template($("#customerListTmpl").html()),
				change: function(){
					var selected = this.select();					
					var data = this.dataItem(selected);

					banhji.customer.viewModel.set("showMenu", true);
					banhji.customer.viewModel.setCurrent(data.id);
					//banhji.router.navigate("#customer/"+ data.id, false);

					var currentPage = banhji.customer.viewModel.get("currentPage");
					switch(currentPage){
					case "dashBoard":
						banhji.customer.viewModel.setDateSorter("month");
						banhji.customer.viewModel.loadStatementCollection();
						banhji.customer.viewModel.loadMonthlySale(data.id);
						banhji.customer.viewModel.loadOutStandingInvoice(data.id);
						break;					
					case "eMeter":
					    banhji.eMeter.viewModel.loadMeter(data.id);
					    break;
					case "eReadingSingle":
					    banhji.eMeter.readingSingleModel.loadReading(data.id);
					    break;
					case "notice":
					    banhji.eMeter.noticeModel.loadCustomer(data.id);
					    break;
					case "statement":
					    banhji.statement.viewModel.pageLoad();
					    banhji.statement.viewModel.clear();
					    break;
					default:
					  
					}											
				}
			}).data("kendoGrid");

			var company = $("#company").kendoDropDownList({
                optionLabel: "(--- រើស អាជ្ញាប័ណ្ណ ---)",
                dataTextField: "abbr",
                dataValueField: "id",
                dataSource: {
                    transport: {
						read: {
							url: banhji.baseUrl + "api/companies/company",
							type: "GET",
							dataType: "json"
						}
					}
                }
            }).data("kendoDropDownList");

            var transformer = $("#transformer").kendoDropDownList({
                autoBind: false,
                cascadeFrom: "company",
                optionLabel: "(--- រើស តំបន់ ---)",
                dataTextField: "transformer_number",
                dataValueField: "id",
                dataSource: {
                    transport: {
						read: {
							url: banhji.baseUrl + "api/electricities/transformer_cascading",
							type: "GET",
							dataType: "json"
						}
					},	
					serverFiltering: true
                }
            }).data("kendoDropDownList");

            $("#search").on('click', function() {
				customerSearch();				
			});

			$("#searchField").keyup(function(e) {
				var keycode = e.keyCode ? e.keyCode : e.which;
				//Press Enter
			   	if(keycode === 13) {    
			    	customerSearch();
			    }          
			});

			function customerSearch(){
	        	var txtSearch = $("#searchField").val();
	        	var company_id = company.value();
				var transformer_id = transformer.value();
				
				var para = Array();

				if(txtSearch!=""){
					para.push({
						field: "searchField", value: txtSearch					
					});
				}
				
				if(transformer_id!=""){
					para.push({
						field: "transformer_id", value: transformer_id					
					});
				}

				if(para.length>0){
					banhji.customer.viewModel.search(para);
				}
				
				//Clear search
				$("#searchField").val("");
				company.value("");
				transformer.value("");
		    }			
		}	
	});	
	
	banhji.router.route("new_customer", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.customerNew);				
		kendo.fx($("#slide-form")).slideIn("down").play();
				
		var currencyCBB = $("#currencyCBB").kendoComboBox({
			dataTextField: "code",
			dataValueField: "code",	
			template: '<span class="span1">${code}</span> <span class="span2">${country_currency}</span>',
			dataSource: banhji.customer.newCustomerModel.currencyList,
		}).data("kendoComboBox");
		currencyCBB.list.width(300);
		
		var validator = $("#example").kendoValidator().data("kendoValidator"),
			status = $("#status");

		$("#save").click(function(e){
			e.preventDefault();
			banhji.customer.newCustomerModel.checkExistingNumber();
			var isExistingNumber = banhji.customer.newCustomerModel.get("isExistingNumber");
			
            if(validator.validate() && isExistingNumber===false){
            	banhji.customer.newCustomerModel.add();
            	banhji.customer.newCustomerModel.clear();

	            status.text("កត់ត្រាបានសំរេច")
		            .removeClass("alert alert-error")
		            .addClass("alert alert-success");
	        }else{		        	
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
		            .addClass("alert alert-error");
	        }
		});		
	});

	banhji.router.route("invoice(/:id)", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.invoice);				
		kendo.fx($("#slide-form")).slideIn("down").play();

		if(id!==undefined){
			banhji.invoice.viewModel.loadInvoice(id);
		}else{
			var customer_id = banhji.customer.viewModel.get("customer").id;			
			banhji.invoice.viewModel.pageLoad(customer_id);
		}
								
		var validator = $("#example").kendoValidator().data("kendoValidator"),
			status = $("#status");

		$("#save").click(function(e){
			e.preventDefault();
						
            if(validator.validate()){
            	if(id!==undefined){            		
            		banhji.invoice.viewModel.update(id);            		
            	}else{
            		banhji.invoice.viewModel.add();
            	}            	

	            status.text("កត់ត្រាបានសំរេច")
		            .removeClass("alert alert-error")
		            .addClass("alert alert-success");
	        }else{		        	
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
		            .addClass("alert alert-error");
	        }
		});		
	});

	banhji.router.route("receipt(/:id)", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.receipt);				
		kendo.fx($("#slide-form")).slideIn("down").play();

		if(id!==undefined){
			banhji.receipt.viewModel.loadInvoice(id);
		}else{
			var customer_id = banhji.customer.viewModel.get("customer").id;		
			banhji.receipt.viewModel.pageLoad(customer_id);
		}
								
		var validator = $("#example").kendoValidator().data("kendoValidator"),
			status = $("#status");

		$("#save").click(function(e){
			e.preventDefault();
						
            if(validator.validate()){
            	if(id!==undefined){            		
            		banhji.receipt.viewModel.update(id);            		
            	}else{
            		banhji.receipt.viewModel.add();
            	} 
            	
	            status.text("កត់ត្រាបានសំរេច")
		            .removeClass("alert alert-error")
		            .addClass("alert alert-success");
	        }else{		        	
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
		            .addClass("alert alert-error");
	        }
		});		
	});

	banhji.router.route("so(/:id)", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.so);				
		kendo.fx($("#slide-form")).slideIn("down").play();

		if(id!==undefined){
			banhji.so.viewModel.loadInvoice(id);
		}else{
			var customer_id = banhji.customer.viewModel.get("customer").id;		
			banhji.so.viewModel.pageLoad(customer_id);
		}
								
		var validator = $("#example").kendoValidator().data("kendoValidator"),
			status = $("#status");

		$("#save").click(function(e){
			e.preventDefault();
						
            if(validator.validate()){
            	if(id!==undefined){            		
            		banhji.so.viewModel.update(id);            		
            	}else{
            		banhji.so.viewModel.add();
            	} 
            	
	            status.text("កត់ត្រាបានសំរេច")
		            .removeClass("alert alert-error")
		            .addClass("alert alert-success");
	        }else{		        	
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
		            .addClass("alert alert-error");
	        }
		});		
	});

	banhji.router.route("estimate(/:id)", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.estimate);				
		kendo.fx($("#slide-form")).slideIn("down").play();

		if(id!==undefined){
			banhji.estimate.viewModel.loadInvoice(id);
		}else{
			var customer_id = banhji.customer.viewModel.get("customer").id;			
			banhji.estimate.viewModel.pageLoad(customer_id);
		}
								
		var validator = $("#example").kendoValidator().data("kendoValidator"),
			status = $("#status");

		$("#save").click(function(e){
			e.preventDefault();
						
            if(validator.validate()){
            	if(id!==undefined){            		
            		banhji.estimate.viewModel.update(id);            		
            	}else{
            		banhji.estimate.viewModel.add();
            	}            	
	            status.text("កត់ត្រាបានសំរេច")
		            .removeClass("alert alert-error")
		            .addClass("alert alert-success");
	        }else{		        	
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
		            .addClass("alert alert-error");
	        }
		});		
	});

	banhji.router.route("gdn(/:id)", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.gdn);				
		kendo.fx($("#slide-form")).slideIn("down").play();

		if(id!==undefined){
			banhji.gdn.viewModel.loadInvoice(id);
		}else{
			var customer_id = banhji.customer.viewModel.get("customer").id;			
			banhji.gdn.viewModel.pageLoad(customer_id);
		}
								
		var validator = $("#example").kendoValidator().data("kendoValidator"),
			status = $("#status");

		$("#save").click(function(e){
			e.preventDefault();
						
            if(validator.validate()){
            	if(id!==undefined){            		
            		banhji.gdn.viewModel.update(id);            		
            	}else{
            		banhji.gdn.viewModel.add();
            	}            	

	            status.text("កត់ត្រាបានសំរេច")
		            .removeClass("alert alert-error")
		            .addClass("alert alert-success");
	        }else{		        	
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
		            .addClass("alert alert-error");
	        }
		});		
	});

	banhji.router.route("eReading", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.eReading);		
				
		//Upload file
		$("#userfile").kendoUpload({
	        async: {
	            saveUrl: banhji.baseUrl + "api/files/do_upload_file",
	            removeUrl: "remove",
	            autoUpload: true
	        },
			localization: {
				dropFilesHere: "ទំលាក់រួបភាពទីនេះ",
				select : "រើសទិន្នន័យ",
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
					path = "./../uploads/documents/" + value.name;
					//staffVM.set("image_url", path);
				});
			} 
	    });
		var validator = $("#example").kendoValidator().data("kendoValidator"),
			status = $("#status");

		$("#save").click(function(e){
			e.preventDefault();
			
			var val = banhji.eReading.viewModel.get("checkValidation");			
            if(validator.validate() && val){
            	banhji.eReading.viewModel.add();

	            status.text("កត់ត្រាបានសំរេច")
		            .removeClass("alert alert-error")
		            .addClass("alert alert-success");
	        }else{		        	
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
		            .addClass("alert alert-error");
	        }
		});
	});

	banhji.router.route("eInvoice", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.eInvoice);
		banhji.eInvoice.viewModel.pageLoad();		
				
		var validator = $("#example").kendoValidator().data("kendoValidator"),
			status = $("#status");						

		$("#save").click(function(e){
			e.preventDefault();			
			var total = parseInt(banhji.eInvoice.viewModel.get("totalSelected"));	
            if(validator.validate() && total>0){
            	            	
            	banhji.eInvoice.viewModel.addInvoice();
				banhji.eInvoice.viewModel.addJournal();		
				banhji.eInvoice.viewModel.updateMeterRecordInvoiceId();
				banhji.eInvoice.viewModel.updateCustomerBalance();
				banhji.eInvoice.viewModel.clear();

	            status.text("កត់ត្រាបានសំរេច")
		            .removeClass("alert alert-error")
		            .addClass("alert alert-success");
	        }else{		        	
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
		            .addClass("alert alert-error");
	        }
		});
	});	

	banhji.router.route("cashier", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.cashier);		

		var template = kendo.template($("#menu").html());
		var menu = [];
		for(var i=0;i<banhji.km.length; i++) {
			var current = banhji.km[i];
			if(banhji.config.userData.allowedModules[i]) {
				menu.push(current);
			}
		}
		$("#header").html(template(menu));
		$("#home-menu").text("Banhji | បេឡាករ");
				
		banhji.cashier.viewModel.pageLoad();

		$("#txtSearch").keypress(function(e) {			
			var keycode = e.keyCode ? e.keyCode : e.which;	
		   	if(keycode === 13) {
		   		e.preventDefault();
		   		banhji.cashier.viewModel.set("searchField", $(this).val());    
		    	banhji.cashier.viewModel.customerSearch();
		    }          
		});

		var validator = $("#example").kendoValidator().data("kendoValidator"),
			status = $("#status");						

		$("#save").click(function(e){
			e.preventDefault();			
			var payAmount = kendo.parseFloat(banhji.cashier.viewModel.get("pay_amount"));

            if(validator.validate() && payAmount>0){
            	banhji.cashier.viewModel.add();           	
            	
	            status.text("កត់ត្រាបានសំរេច")
		            .removeClass("alert alert-error")
		            .addClass("alert alert-success");
	        }else{		        	
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
		            .addClass("alert alert-error");
	        }
		});
		
		$('#txtSearch').focus();		
	});

	banhji.router.route("cashier_single/:id", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.cashierSingle);
		kendo.fx($("#slide-form")).slideIn("down").play();
		banhji.cashier.singleModel.pageLoad(id);		
		
		var validator = $("#example").kendoValidator().data("kendoValidator"),
			status = $("#status");

		$("#save").click(function(e){
			e.preventDefault();			

            if(validator.validate()){
            	banhji.cashier.singleModel.add();           	
            	
	            status.text("កត់ត្រាបានសំរេច")
		            .removeClass("alert alert-error")
		            .addClass("alert alert-success");
	        }else{		        	
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
		            .addClass("alert alert-error");
	        }
		});			
	});

	banhji.router.route("daily_payment", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.dailyPayment);
		kendo.fx($("#slide-form")).slideIn("down").play();
		//banhji.dailyPayment.viewModel.pageLoad();

		var validator = $("#example").kendoValidator().data("kendoValidator"),
			status = $("#status");

		$("#save").click(function(e){
			e.preventDefault();			

            if(validator.validate()){
            	         	
            	
	            status.text("កត់ត្រាបានសំរេច")
		            .removeClass("alert alert-error")
		            .addClass("alert alert-success");
	        }else{		        	
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
		            .addClass("alert alert-error");
	        }
		});			
	});

	banhji.router.route("reconcile", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.reconcile);
		kendo.fx($("#slide-form")).slideIn("down").play();
		banhji.reconcile.viewModel.pageLoad();

		var validator = $("#example").kendoValidator().data("kendoValidator"),
			status = $("#status");

		$("#save").click(function(e){
			e.preventDefault();			
			var totalTransferCash = kendo.parseFloat(banhji.reconcile.viewModel.totalTransferCash());
			
            if(validator.validate() && totalTransferCash>0){
            	banhji.reconcile.viewModel.save();        	
            	
	            status.text("កត់ត្រាបានសំរេច")
		            .removeClass("alert alert-error")
		            .addClass("alert alert-success");
	        }else{		        	
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
		            .addClass("alert alert-error");
	        }
		});			
	});

	banhji.router.route("customer_balance", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.customerBalance);
		kendo.fx($("#slide-form")).slideIn("down").play();

		var customerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/people_api/people_list",
					type: "GET",
					dataType: "json"
				}
			},
			schema: {
		        data: "customers", 
		        total: "total" 
		    },
			serverPaging: true,
			pageSize: 200,			
			serverFiltering: true
		});

		var companyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/companies/company",
					type: "GET",
					dataType: "json"
				}
			}		
		});

		var transformerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/transformer_cascading",
					type: "GET",
					dataType: "json"
				}
			},	
			serverFiltering: true
		});

		$("#grid").kendoGrid({
		    dataSource: customerDS,
		    groupable: true,
		    autoBind: false,
		    pageable: true,        
		    columns: [ 
		    		{ field: "number", title: "លេខកូដ" }, 
		    		{ field: "name", title: "ឈ្មោះ", template: "#=surname# #=name#" }, 
		    		{ field: "currencies.code", title: "រូបិយ​ប័ណ្ណ" },    		
		    		{ field: "people_types.name", title: "ប្រភេទ" },
		    		{ field: "classes.name", title: "Class" },
		    		{ field: "balance", title: "សមតុល្យចុងគ្រា", template: "#=kendo.toString(kendo.parseFloat(balance), 'c', currencies.sub_code)#", 
		    			attributes: { style: "text-align: right;"} 
		    		}        
		    ]
		});

		var company = $("#company").kendoDropDownList({
            optionLabel: "(--- រើស អាជ្ញាប័ណ្ណ ---)",
            dataTextField: "abbr",
            dataValueField: "id",
            dataSource: {
                transport: {
					read: {
						url: banhji.baseUrl + "api/companies/company",
						type: "GET",
						dataType: "json"
					}
				}
            }
        }).data("kendoDropDownList");

        var transformer = $("#transformer").kendoDropDownList({
            autoBind: false,
            cascadeFrom: "company",
            optionLabel: "(--- រើស តំបន់ ---)",
            dataTextField: "transformer_number",
            dataValueField: "id",
            dataSource: {
                transport: {
					read: {
						url: banhji.baseUrl + "api/electricities/transformer_cascading",
						type: "GET",
						dataType: "json"
					}
				},	
				serverFiltering: true
            }
        }).data("kendoDropDownList");	

		$("#search").click(function(e){
			e.preventDefault();            
            searchCustomer();	        
		});

		function searchCustomer(){
			var transformer_id = transformer.value();

			if(transformer_id!=""){
				customerDS.filter({
					filters: [
						{ field: "transformer_id", value: transformer_id }
					]
				});
			}else{
				var company_id = company.value();
				customerDS.filter({
					filters: [
						{ field: "company_id", value: company_id }
					]
				});
			}					
		}			
	});

	banhji.router.route("aging_summary", function(){		
		banhji.view.layout.showIn("#layout-view", banhji.view.agingSummary);
		kendo.fx($("#slide-form")).slideIn("down").play();
				
		var validator = $("#example").kendoValidator().data("kendoValidator");

		$("#search").click(function(e){
			e.preventDefault();			
						
            if(validator.validate()){
            	banhji.agingSummary.viewModel.search();	            
	        }
		});			
	});

	banhji.router.route("aging_detail", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.agingDetail);
		kendo.fx($("#slide-form")).slideIn("down").play();
				
		var validator = $("#example").kendoValidator().data("kendoValidator");

		$("#search").click(function(e){
			e.preventDefault();			
						
            if(validator.validate()){
            	banhji.agingDetail.viewModel.search();	            
	        }
		});			
	});

	banhji.router.route("low_consumption", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.lowConsumption);				
		kendo.fx($("#slide-form")).slideIn("down").play();						
	});

	banhji.router.route("disconnect_list", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.disconnectList);				
		kendo.fx($("#slide-form")).slideIn("down").play();
	});

	banhji.router.route("eInvoice_preview(/:number)", function(number){
		banhji.view.layout.showIn("#layout-view", banhji.view.eInvoicePreview);				
		kendo.fx($("#slide-form")).slideIn("down").play();

		if(number!==undefined){
			banhji.eInvoicePreview.viewModel.pageLoad(number);
		}					
	});

	banhji.router.route("new_company", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.newCompany);

		var currencyCBB = $("#currencyCBB").kendoComboBox({
			dataTextField: "code",
			dataValueField: "code",	
			template: '<span class="span1">${code}</span> <span class="span2">${country_currency}</span>',
			dataSource: banhji.customer.viewModel.currencyList,
		}).data("kendoComboBox");
		currencyCBB.list.width(300);
		
		//Upload file
		$("#userfile").kendoUpload({
	        async: {
	            saveUrl: banhji.baseUrl + "api/files/do_upload_image",
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
					banhji.newCompany.viewModel.set("image_url", path);
				});				
			} 
	    });
		
		var validator = $("#example").kendoValidator().data("kendoValidator"),
			status = $("#status");

		$("#save").click(function(e){
			e.preventDefault();			
						
            if(validator.validate()){            	   	
            	banhji.newCompany.viewModel.add();

            	banhji.view.layout.showIn("#layout-view", banhji.view.useElectricity);
	            // status.text("កត់ត្រាបានសំរេច")
		           //  .removeClass("alert alert-error")
		           //  .addClass("alert alert-success");
	        }else{		        	
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
		            .addClass("alert alert-error");
	        }
		});			
	});

	banhji.router.route("users", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.users);		
	});

	banhji.router.route("currency_rates", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.currencyRates);		
	});

	banhji.router.route("customer_types", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.customerTypes);		
	});	

	banhji.router.route("classes", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.classes);		
	});

	banhji.router.route("use_electricity", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.useElectricity);		
	});

	banhji.router.route("eSetting", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.eSetting);		
	});

	banhji.router.route("amperes", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.amperes);		
	});

	banhji.router.route("voltages", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.voltages);		
	});

	banhji.router.route("electricity_boxes", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.electricityBoxes);		
	});

	banhji.router.route("tariff_plans", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.tariffPlans);		
	});
	banhji.router.route("tariffs", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.tariffs);		
	});
	banhji.router.route("exemptions", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.exemptions);		
	});
	banhji.router.route("maintenances", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.maintenances);		
	});
	
	banhji.router.route("finish_register", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.finishRegister);		
	});
	//END OF DAWINE

	// Vendors Section
	banhji.router.route("vendors", function() {
		banhji.view.layout.showIn("#layout-view", banhji.view.index);
		banhji.view.index.showIn("#content", banhji.view.vendor);
		if(banhji.vendor.get("current").id === null){
			banhji.view.vendor.showIn("#vendorDetail", banhji.view.vendorInfo);
		}
		var template = kendo.template($("#menu").html());
			var menu = [];
			for(var i=0;i<banhji.km.length; i++) {
				var current = banhji.km[i];
				if(banhji.config.userData.allowedModules[i]) {
					menu.push(current);
				}
			}
			$("#header").html(template(menu));
		$("#home-menu").text("Banhji | អ្នកផ្គត់ផ្កង់");
		$("#secondary-menu").html("<li><a href='\#new_vendor'>អ្នកផ្គត់ផ្គង់ថ្មី</a></li><li><a href='\#pomonitoring'>តាមដានបញ្ជាទិញ</a></li><li><a href='\#payables'>តាមដានបំណុលអ្នកផ្គត់ផ្គង់</a></li><li><a href='\#reports'>របាយការណ៍</a></li>");
		var vendorGrid = $("#sidebar").kendoGrid({
				dataSource: banhji.vendor.vendorsList,
				selectable: true,
				height: "600px",
				columns: [{title: "&nbsp;"}],
				rowTemplate: kendo.template($("#vendorListTmpl").html()),
				change: function(e){
					var selected = this.select();
					var vendor = this.dataItem(selected);
					// var uid = this.select().data('uid');
					// var vendor = this.dataSource.getByUid(uid);

					if(banhji.vendor.get("current").id === null) {
						banhji.vendor.setCurrent(vendor.id);
						
						banhji.view.vendor.showIn("#vendorDetail", banhji.view.vendorSingle);
						var now = new Date();
						var month = now.getMonth() + 1;
						banhji.transaction.getBy([{field: "people_id", value: banhji.vendor.get("current").id}, {field: "created_at >=", value: now.getFullYear() + "-" + month + "-01"}])
						.then(
							function(data){
								var ds=[];
								if(data.results.length>0) {
									$.each(data.results, function(i,v){
										ds.push(v);
									});
								}
								$("#vendorHistoryGrid").kendoGrid({
									dataSource: ds,
									filterable: true,
									pageable: {
										pageSize: 20,
										pageSizes: [20, 40, 60],
										messages: {
											empty: "មិនមានទិន្ន័យ",
											display: "{0}-{1} នៃ {2} ទិន្ន័យ",
											itemsPerPage: "ប្រត្តិបត្រ័ការក្នុងមួយទំព័រ"
										}
									},
									selectable: true,
									columns: [
										{ title: "កាលបរិច្ឆេទ", width: "100px" },
										{ title: "ប្រភេទវិក្កយប័ត្រ", width: "120px" },
										{ title: "ចំណាយជំពាក់", width: "130px" },
										{ title: "ចំនួនត្រូវទូទាត់", width: "130px" },
										{ title: "ចំនួនទូទាត់រួច", width: "130px" },
										{ title: "ទូទាត់" },
										{ title: "&nbsp;", width: "80px" }
									],
									rowTemplate: kendo.template($("#billGrid").html())
								});
							},
							function(error){
								console.log(error);
							}
						);
					} else {
						banhji.vendor.setCurrent(vendor.id);
					}
					
				}
		}).data("kendoGrid");
		banhji.vendor.init();
	});

	banhji.router.route("payables", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);
		banhji.view.index.showIn("#content", banhji.view.vendorPayable);
		var reportAging = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/reports/vendor_aging_summaries/",
					type: "GET",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					if( operation === "read") {
						return { as_of : kendo.toString($("#as_of_date").val(), 'yyyy-MM-dd'), class_id: classes.value() };
					}
					return options;
				}
			},
			schema: {
				model: {
					id: "id"
				},
				data: "vendors",
				count: "count"
			},
			serverFiltering: false,
			requestEnd: function(e) {
				var type = e.type;
				
				if(type==="create") {
					if(e.response.type === "expense") {
						//expenseModel.sync(e.response.bill.id);
					} else {
						//purchaseModel.sync(e.response.bill.id);
					}	
				}
			},
			error	: function(e) {
				console.log(e.status);
			}
		});

		var classDS = new kendo.data.DataSource({
	    	transport: {
	             read: {
	             	url: banhji.baseUrl + "api/accounting_api/class_dropdown",
	             	type: "GET",
	             	dataType: "json"
	             }
	       }
	    });

		var bills = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/bills/",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/electricities/bills/",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/electricities/bills/",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/electricities/bills/",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					// if( operation === "read") {
					// 	return { vendor_id : viewModel.get("vendor_id"), status : 0 };
					// }
					return options;
				}
			},
			schema: {
				model: {
					id: "id"
				}
			},
			pageSize: 20,
			serverFiltering: false,
			requestEnd: function(e) {
				var type = e.type;
				
				if(type==="create") {
					if(e.response.type === "expense") {
						expenseModel.sync(e.response.bill.id);
					} else if(e.response.type === "purchase") {
						purchaseModel.sync(e.response.bill.id);
					} else if (e.response.type === "ebill") {
						eBillModel.sync(e.response.bill.id);
						//console.log(e.response.type);
					}	
				}
			},
			error	: function(e) {
				console.log(e.status);
			}
		});

		var today = new Date();
		$("#as_of_date").kendoDatePicker({
			value: new Date(),
			format: "dd-MM-yyyy",
			// change: function(e) {
			// 	if(kendo.toString(today, 'dd-MM-yyyy') < $("#as_of_date").val()){
			// 		//alert("date cannot be greater than today.")
			// 		//$("#myModal").modal('toggle');
			// 		//this.value(today);
			// 	} else {
			// 		reportAging.read();	
			// 	}
				
			// 	//alert($("#as_of_date").val());	
			// }
		});

		var classes = $("#classes").kendoDropDownList({
		 	dataSource: classDS,
		 	dataTextField: "name",
			dataValueField: "id",
			index: -1,
			optionLabel: {
				name: "All",
				id: ""
			}
		}).data("kendoDropDownList");

		$("#search").on("click", function(e){
			$("#asOfDate").html($("#as_of_date").val());
			reportAging.read();	
		});

		$("#listview tbody").kendoListView({
			dataSource: reportAging,
			template: kendo.template($("#aging_summary_report").html())
		});

		$("#content").on("dblclick", "#listview >tbody >tr", function(e) {
			// var vendorID = 
			viewModel.set("vendor_id", $(e.currentTarget).data("id"));
			console.log(viewModel.get("vendor_id"));
			$("#billDetail").kendoGrid({
				dataSource: bills,
				columns: [
					{ title: "វិក្ក័យប័ត្រ", field: "invoiceNumber" },
					{ title: "Amount Billed", field: "amount_billed", template:"#=kendo.toString(parseFloat(amount_billed), 'c2')#" },
					{ title: "Amount Due", field: "amount_due", template:"#=kendo.toString(parseFloat(amount_due), 'c2')#" },
					{ title: "Amount Paid", field: "amount_paid", template:"#=kendo.toString(parseFloat(amount_paid), 'c2')#" },
					{ title: "Due Date", field: "dueDate" }
				],
				height: 250,
				pageable: true
			}).data("kendoGrid");
			$('#myModal').modal('show')
		});
	});

	banhji.router.route("new_vendor", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.vendorNew);
		banhji.vendor.reset();
		kendo.fx($("#vendor-form")).slideIn("down").play();
	});

	// Bills Section
	banhji.router.route("bills", function(){
		console.log(["Bill section", "Create new bill"].join(" "));
	});

	banhji.router.route("purchase(/:id)(/:action)", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.purchase);
		// kendo.fx($("#purchase-form")).slideIn("down").play();

		banhji.currency.init();
		
		if(id!==undefined) {	
			banhji.transaction.getById(id)
			.then(function(data){
				banhji.purchase.viewModel.set("vendor", data.results[0].people_name);
				// banhji.purchase.viewModel.set("po_id", data.results[0].id);
				var FX = 1;
				if(banhji.currency.getCompanyCurrency(banhji.config.userData.company) !== data.results[0].people_name.currency_code) {
					FX = parseFloat(data.results[0].journalEntries[0].exchange_rate);
				}
				if(data.results[0].payment_method === "cash") {
					banhji.purchase.viewModel.set("paidCash", true);
					
					banhji.purchase.viewModel.set("checkNo", null);
					$.each(data.results[0].journalEntries, function(k,v){
						if(v.main === "1") {
							banhji.purchase.viewModel.set("cashAcct", v.account);
							return false;
						}
					});
				} else {
					banhji.purchase.viewModel.set("creditAcct", false);
				}

				banhji.purchase.viewModel.set("class_id", data.results[0].class_id);
				banhji.purchase.viewModel.set("date", data.results[0].date);
				banhji.purchase.viewModel.set("ref", data.results[0].voucher);
				banhji.purchase.viewModel.set("memo", data.results[0].memo);
				if(data.results[0].reference) {
					banhji.purchase.viewModel.set("po_id", data.results[0].reference.id);
				}
				if(data.results[0].entries) {
					banhji.purchase.viewModel.get("cart").splice(0,banhji.purchase.viewModel.get("cart").length);
					for(var i=0;i<data.results[0].entries.length;i++) {
						banhji.purchase.viewModel.get("cart").push({
							bill_id: data.results[0].entries[i].bill_id, 
							item_id: data.results[0].entries[i].item_id, 
							description: data.results[0].entries[i].description, 
							quantity: data.results[0].entries[i].quantity, 
							cost: parseFloat(data.results[0].entries[i].cost)/FX, 
							price: parseFloat(data.results[0].entries[i].price)/FX, 
							amount: parseFloat(data.results[0].entries[i].amount)/FX, 
							account_id: 0
						});
					}
				}
			});	
		}
	});

	banhji.router.route("expense(/:id)", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.expense);
		kendo.fx($("#expense-form")).slideIn("down").play();
		if(id!==undefined) {
			banhji.transaction.getById(id)
			.then(function(data){
				banhji.expense.viewModel.get("expenses").splice(0,banhji.expense.viewModel.get("expenses").length);
				banhji.expense.viewModel.set("vendor", data.results[0].people_name);
				// banhji.purchase.viewModel.set("po_id", data.results[0].id);
				if(data.results[0].payment_method === "cash") {
					banhji.expense.viewModel.set("paidCash", true);
					banhji.expense.viewModel.set("checkNo", null);
					if(banhji.currency.getCompanyCurrency(banhji.config.userData.company) !== data.results[0].people_name.currency_code) {
						$.each(data.results[0].journalEntries, function(k,v){
							if(v.main === "1") {
								banhji.expense.viewModel.set("cashAcct", v.account);
							} else {
								banhji.expense.viewModel.get("expenses").push({
								account_id: v.account, 
								code: "", 
								account_name: "", 
								amount: parseFloat(v.dr)/parseFloat(v.exchange_rate),
								memo: v.memo, 
								class_id: v.class_id
							});
							}
						});
					} else {
						$.each(data.results[0].journalEntries, function(k,v){
							if(v.main === "1") {
								banhji.expense.viewModel.set("cashAcct", v.account);
							} else {
								banhji.expense.viewModel.get("expenses").push({
								account_id: v.account, 
								code: "", 
								account_name: "", 
								amount: v.dr,
								memo: v.memo, 
								class_id: v.class_id
							});
							}
						});
					}
				} else {
					banhji.expense.viewModel.set("paidCash", false);
					if(banhji.currency.getCompanyCurrency(banhji.config.userData.company) !== data.results[0].people_name.currency_code) {
						$.each(data.results[0].journalEntries, function(k,v){
							if(v.main === "1") {
								banhji.expense.viewModel.set("cashAcct", v.account);
							} else {
								banhji.expense.viewModel.get("expenses").push({
								account_id: v.account, 
								code: "", 
								account_name: "", 
								amount: parseFloat(v.dr)/parseFloat(v.exchange_rate),
								memo: v.memo, 
								class_id: v.class_id
							});
							}
						});
					} else {
						$.each(data.results[0].journalEntries, function(k,v){
							if(v.main === "1") {
								banhji.expense.viewModel.set("cashAcct", v.account);
							} else {
								banhji.expense.viewModel.get("expenses").push({
								account_id: v.account, 
								code: "", 
								account_name: "", 
								amount: v.dr,
								memo: v.memo, 
								class_id: v.class_id
							});
							}
						});
					}
				}

				banhji.expense.viewModel.set("class_id", data.results[0].class_id);
				banhji.expense.viewModel.set("date", data.results[0].date);
				banhji.expense.viewModel.set("ref", data.results[0].voucher);
				banhji.expense.viewModel.set("memo", data.results[0].memo);
			});
		} else {
			//new bill
		}
	});

	banhji.router.route("purchases(/:action)", function(action){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);
		// banhji.view.index.showIn("#content", banhji.view.vendor);
		var template = kendo.template($("#menu").html());
			var menu = [];
			for(var i=0;i<banhji.km.length; i++) {
				var current = banhji.km[i];
				if(banhji.config.userData.allowedModules[i]) {
					menu.push(current);
				}
			}
			$("#header").html(template(menu));
		$("#secondary-menu").html("<li><a href='\#purchases/monitoring'>តាមដានបញ្ជាទិញ</a></li><li><a href='\#report/purchase'>របាយការណ៍</a></li>");
		if(banhji.vendor.get("current").id === null){
			banhji.view.vendor.showIn("#vendorDetail", banhji.view.vendorInfo);
		}
		switch (action) {
			case "monitoring":
				console.log("Monitoring");
			break;
			default: 
				console.log("No action defined");
			break;
		}
	});

	banhji.router.route("ebill", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.eBill);
	});

	banhji.router.route("reports", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);
		banhji.view.index.showIn("#content", banhji.view.reports);
		if(banhji.vendor.get("current").id === null){
			banhji.view.vendor.showIn("#vendorDetail", banhji.view.vendorInfo);
		}
		var template = kendo.template($("#menu").html());
			var menu = [];
			for(var i=0;i<banhji.km.length; i++) {
				var current = banhji.km[i];
				if(banhji.config.userData.allowedModules[i]) {
					menu.push(current);
				}
			}
		$("#header").html(template(menu));
		$("#home-menu").text("Banhji | របាយការណ៍");
	});

	banhji.router.route("pomonitoring", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);

		var template = kendo.template($("#menu").html());
			var menu = [];
			for(var i=0;i<banhji.km.length; i++) {
				var current = banhji.km[i];
				if(banhji.config.userData.allowedModules[i]) {
					menu.push(current);
				}
			}
			$("#header").html(template(menu));
		$("#secondary-menu").html("<li><a href='\#new_vendor'>អ្នកផ្គត់ផ្គង់ថ្មី</a></li><li><a href='\#pomonitoring'>តាមដានបញ្ជាទិញ</a></li><li><a href='\#payables'>តាមដានបំណុលអ្នកផ្គត់ផ្គង់</a></li><li><a href='\#reports'>របាយការណ៍</a></li>");
		banhji.view.index.showIn("#content", banhji.view.poTracker);
		banhji.ds.po.filter([
			{field: "type", value: "PO"},
			{field: "status", value: 0}
		]);

		banhji.ds.po.bind("requestEnd", function(e){
			$("#poTrackerList").kendoGrid({
				dataSource: e.response,
				columns: [
					{ title: "កាលបរិច្ឆេទ"},
					{ title: "អ្នកផ្គត់ផ្គង់"},
					{ title: "លេខបញ្ជាទិញ"},
					{ title: "សរុប"},
					{ title: "GRN"},
					{ title: "Bill"}
				],
				rowTemplate: kendo.template($("#poTrackingList").html())
			});
		});
	});

	banhji.router.route("po/:id/bill", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.purchase);
		// kendo.fx($("#purchase-form")).slideIn("down").play();
		banhji.transaction.getById(id).then(function(data){
			banhji.purchase.viewModel.set("vendor", data.results[0].people_name);
			banhji.purchase.viewModel.set("po_id", data.results[0].id);
			if(data.results[0].entries) {
				for(var i=0;i<data.results[0].entries.length;i++) {
					banhji.purchase.viewModel.get("cart").push({
						bill_id: data.results[0].entries[i].bill_id, 
						item_id: data.results[0].entries[i].item_id, 
						description: data.results[0].entries[i].description, 
						quantity: data.results[0].entries[i].quantity, 
						cost: data.results[0].entries[i].cost, 
						price: data.results[0].entries[i].price, 
						amount: data.results[0].entries[i].amount, 
						account_id: 0
					});
				}
			}
		});
	});

	banhji.router.route("po/:id/grn", function(id){
		// banhji.purchase.viewModel.set("po_id", id);
		banhji.view.layout.showIn("#layout-view", banhji.view.grnView);
		// kendo.fx($("#purchase-form")).slideIn("down").play();


		if(id!==undefined){
			banhji.grn.viewModel.empty();
			banhji.grn.viewModel.getFromPO(id);
		}else{
			// var vendor_id = banhji.grn.viewModel.get("customer").id;			
			// banhji.grn.viewModel.pageLoad();
		}
								
		var validator = $("#grnVa").kendoValidator().data("kendoValidator"),
			status = $("#status");

		$("#add").click(function(e){
			e.preventDefault();
						
            if(validator.validate()){
            	if(id!==undefined){            		
            		banhji.grn.viewModel.update(id);            		
            	}else{
            		banhji.grn.viewModel.createGRN();
            	}            	

	            status.text("កត់ត្រាបានសំរេច")
		            .removeClass("alert alert-error")
		            .addClass("alert alert-success");
	        }else{		        	
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
		            .addClass("alert alert-error");
	        }
		});
	});

	banhji.router.route("po(/:id)", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.po);				
		kendo.fx($("#slide-form")).slideIn("down").play();

		if(id!==undefined){
			banhji.po.viewModel.loadInvoice(id);
		}else{
			var vendor_id = banhji.vendor.get('current').id;					
			banhji.po.viewModel.pageLoad(vendor_id);
		}
								
		var validator = $("#example").kendoValidator().data("kendoValidator"),
			status = $("#status");

		$("#save").click(function(e){
			e.preventDefault();
						
            if(validator.validate()){
            	if(id!==undefined){            		
            		banhji.po.viewModel.update(id);            		
            	}else{
            		banhji.po.viewModel.add();
            	}            	

	            status.text("កត់ត្រាបានសំរេច")
		            .removeClass("alert alert-error")
		            .addClass("alert alert-success");
	        }else{		        	
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
		            .addClass("alert alert-error");
	        }
		});		
	});

	banhji.router.route("grn(/:id)", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.grnView);
		// kendo.fx($("#purchase-form")).slideIn("down").play();


		if(id!==undefined){
			// banhji.grn.viewModel.empty();
			// banhji.grn.viewModel.getFromPO(id);
			banhji.grn.viewModel.getById(id);
		} else {
			// var vendor_id = banhji.grn.viewModel.get("customer").id;			
			// banhji.grn.viewModel.pageLoad();
			console.log("No id");
		}
								
		var validator = $("#grnVa").kendoValidator().data("kendoValidator"),
			status = $("#status");

		$("#add").click(function(e){
			e.preventDefault();
						
            if(validator.validate()){
            	if(id!==undefined){            		
            		banhji.grn.viewModel.update(id);            		
            	}else{
            		banhji.grn.viewModel.createGRN();
            	}            	

	            status.text("កត់ត្រាបានសំរេច")
		            .removeClass("alert alert-error")
		            .addClass("alert alert-success");
	        }else{		        	
	            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
	                .removeClass("alert alert-success")
		            .addClass("alert alert-error");
	        }
		});
	});

	banhji.router.route("balancesheet", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);
		// if(banhji.vendor.get("current").id === null){
		// 	banhji.view.vendor.showIn("#vendorDetail", banhji.view.vendorInfo);
		// }
		var template = kendo.template($("#menu").html());
			var menu = [];
			for(var i=0;i<banhji.km.length; i++) {
				var current = banhji.km[i];
				if(banhji.config.userData.allowedModules[i]) {
					menu.push(current);
				}
			}
			$("#header").html(template(menu));
		$("#secondary-menu").html("<li><a href='\#new_vendor'>អ្នកផ្គត់ផ្គង់ថ្មី</a></li><li><a href='\#pomonitoring'>តាមដានបញ្ជាទិញ</a></li><li><a href='\#payables'>តាមដានបំណុលអ្នកផ្គត់ផ្គង់</a></li><li><a href='\#reports'>របាយការណ៍</a></li>");
		banhji.view.index.showIn("#content", banhji.view.balanceSheet);

		var day = new Date();
		var myDate = $("#as_of_date").kendoDatePicker({
			value: new Date(),
			format: "dd-MM-yyyy",
			change: function(e) {
				var today = kendo.toString(day, 'yyyy-MM-dd');
				banhji.balanceSheet.set("date", kendo.toString(this.value(),'dd-MM-yyyy'));
				//viewModel.get
			}
		}).data("kendoDatePicker");
		myDate.value(day);
		var classDS = new kendo.data.DataSource({
		    	transport: {
			             read: {
			             	url: banhji.baseUrl + "api/accounting_api/class_dropdown",
			             	type: "GET",
			             	dataType: "json"
			             }
		       	}
		});
		var classes = $("#classes").kendoDropDownList({
		 	dataSource: classDS,
		 	dataTextField: "name",
			dataValueField: "id",
			index: 0,
			optionLabel: {
				name: "All",
				id: ""
			},
			change: function() {
				banhji.balanceSheet.set("classes", this.value());
			}
		 }).data("kendoDropDownList");

		banhji.balanceSheet.getIncome();

		// kendo.bind($("#main-container"), viewModel);
	});

	banhji.router.route("journal/report", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);
		var self = this;
		var journalData = [];
		var template = kendo.template($("#menu").html());
			var menu = [];
			for(var i=0;i<banhji.km.length; i++) {
				var current = banhji.km[i];
				if(banhji.config.userData.allowedModules[i]) {
					menu.push(current);
				}
			}
			$("#header").html(template(menu));
		$("#secondary-menu").html("<li><a href='\#new_vendor'>អ្នកផ្គត់ផ្គង់ថ្មី</a></li><li><a href='\#pomonitoring'>តាមដានបញ្ជាទិញ</a></li><li><a href='\#payables'>តាមដានបំណុលអ្នកផ្គត់ផ្គង់</a></li><li><a href='\#reports'>របាយការណ៍</a></li>");
		banhji.view.index.showIn("#content", banhji.view.journal);
		
		var start = $("#startDate").kendoDatePicker({
			value: new Date().getFullYear() +'-'+ (new Date().getMonth() + 1) +'-1',
			change: function(){
				banhji.journal.viewModel.set("start", this.value());
			}
		}).data('kendoDatePicker');
		var end = $("#endDate").kendoDatePicker({
			value: new Date(),
			change: function(){
				banhji.journal.viewModel.set("end", this.value());
			}
		}).data('kendoDatePicker');
		var classes = $("#classes").kendoDropDownList({
			 	dataSource: banhji.journal.viewModel.classes,
			 	dataTextField: "name",
				dataValueField: "id",
				optionLabel: {
					name: "All",
					id: null
				},
				change: function() {
					banhji.journal.viewModel.set("class_id", this.value());
				}
			 }).data("kendoDropDownList");
		
		banhji.transaction.getBy([
			{field: "company_id", value: banhji.config.userData.company},
			{field: "inJournal", value: 1},
			{field: "created_at >=", value: kendo.toString(start.value(), 'yyyy-MM-dd')},
			{field: "created_at <=", value: kendo.toString(end.value(), 'yyyy-MM-dd')}
		]).done(function(data){
			if(journalData.length>0) {
				journalData.splice(0,journalData.length);
			}
			$.each(data.results, function(k,v){
				journalData.push(v);
			});
			var grid = $("#transactions > tbody").kendoListView({
				dataSource: journalData,
				template: kendo.template($("#journal").html())
			}).data("kendoListView");

		});

		$("#search").on('click', function(){
			banhji.transaction.getBy([
				{field: "company_id", value: banhji.config.userData.company},
				{field: "inJournal", value: 1},
				{field: "created_at >=", value: kendo.toString(start.value(), 'yyyy-MM-dd')},
				{field: "created_at <=", value: kendo.toString(end.value(), 'yyyy-MM-dd')},
				{field: "class_id", value: classes.value() ? classes.value() : "0"}
			]).done(function(data){
				if(journalData.length>0) {
					journalData.splice(0,journalData.length);
				}
				$.each(data.results, function(k,v){
					journalData.push(v);
				});
				var grid = $("#transactions > tbody").kendoListView({
					dataSource: journalData,
					template: kendo.template($("#journal").html())
				}).data("kendoListView");
			});
		});
	});

	banhji.router.route("journal", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);

		var template = kendo.template($("#menu").html());
			var menu = [];
			for(var i=0;i<banhji.km.length; i++) {
				var current = banhji.km[i];
				if(banhji.config.userData.allowedModules[i]) {
					menu.push(current);
				}
			}
			$("#header").html(template(menu));
		$("#secondary-menu").html("<li><a href='\#new_vendor'>អ្នកផ្គត់ផ្គង់ថ្មី</a></li><li><a href='\#pomonitoring'>តាមដានបញ្ជាទិញ</a></li><li><a href='\#payables'>តាមដានបំណុលអ្នកផ្គត់ផ្គង់</a></li><li><a href='\#reports'>របាយការណ៍</a></li>");
		banhji.view.index.showIn("#content", banhji.view.glReport);
		var start = $("#startDate").kendoDatePicker({
			value: new Date().getFullYear() +'-'+ (new Date().getMonth() + 1) +'-1',
			change: function() {
				$("#glStartDate").html(kendo.toString(this.value(), 'dd-MM-yyyy'));
			}
		}).data('kendoDatePicker');
		var end = $("#endDate").kendoDatePicker({
			value: new Date(),
			change: function() {
				$("#glEndDate").html(kendo.toString(this.value(), 'dd-MM-yyyy'));
			}
		}).data('kendoDatePicker');

		$("#glStartDate").html(kendo.toString(start.value(), 'dd-MM-yyyy'));
		$("#glEndDate").html(kendo.toString(end.value(), 'dd-MM-yyyy'));
		var classDS = new kendo.data.DataSource({
	    	transport: {
	             read: {
	             	url: banhji.baseUrl + "api/accounting_api/class_dropdown",
	             	type: "GET",
	             	dataType: "json"
	             }
	       }
	    });
		var classes = $("#classes").kendoDropDownList({
		 	dataSource: classDS,
		 	dataTextField: "name",
			dataValueField: "id",
			index: 0,
			optionLabel: {
				name: "All",
				id: null
			}
		}).data("kendoDropDownList");

		var transactionDS = new kendo.data.DataSource({
			transport: {
				read: {
					url : banhji.baseUrl + "api/accounting_api/general_ledgers",
					type: "GET",
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
					id : "transID",
					fields: [

					]
			  	},
			  	data: 'results',
			  	total: function(data) {
			  		return data.total;
			  	}
			},
		  	serverFiltering: true,
		  	serverPaging: true,
		  	pageSize: 20,
		  	filter: [
		  		{ field: "createdDate", value: start.value() },
		  		{ field: "createdDate", value: end.value() },
		  		{ field: "class_id", value: classes.value() }
		  	]
		});

		var grid = $("#transactions > tbody").kendoListView({
			dataSource: transactionDS,	
			//selectable: true,
			template: kendo.template($("#gl").html())
		}).data("kendoListView");

		$("#search").on('click', function(){
			transactionDS.query({
				filter: [{ value: start.value() }, { value: end.value() }, { value: classes.value() }]
			});
		});
	});

	banhji.router.route("pl", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);

		var template = kendo.template($("#menu").html());
			var menu = [];
			for(var i=0;i<banhji.km.length; i++) {
				var current = banhji.km[i];
				if(banhji.config.userData.allowedModules[i]) {
					menu.push(current);
				}
			}
			$("#header").html(template(menu));
		$("#secondary-menu").html("<li><a href='\#new_vendor'>អ្នកផ្គត់ផ្គង់ថ្មី</a></li><li><a href='\#pomonitoring'>តាមដានបញ្ជាទិញ</a></li><li><a href='\#payables'>តាមដានបំណុលអ្នកផ្គត់ផ្គង់</a></li><li><a href='\#reports'>របាយការណ៍</a></li>");
		banhji.view.index.showIn("#content", banhji.view.plReport);

		var today = new Date();
		var start = $("#startDate").kendoDatePicker({
			value: new Date().getFullYear() +'-'+ (new Date().getMonth() + 1) +'-1',
			change: function() {
				viewModel.set("from", kendo.toString(this.value(), 'dd-MM-yyyy'));
			}
		}).data('kendoDatePicker');
		var end = $("#endDate").kendoDatePicker({
			value: new Date(),
			format: "dd-MM-yyyy",
			change: function() {
				viewModel.set("date",kendo.toString(this.value(), 'dd-MM-yyyy'));
			}
		}).data('kendoDatePicker');

		var classDS = new kendo.data.DataSource({
	    	transport: {
	             read: {
	             	url: banhji.baseUrl + "api/accounting_api/class_dropdown",
	             	type: "GET",
	             	dataType: "json"
	             }
	       }
	    });
		var classes = $("#classes").kendoDropDownList({
		 	dataSource: classDS,
		 	dataTextField: "name",
			dataValueField: "id",
			index: 0,
			optionLabel: {
				name: "All",
				id: 0
			},
			change: function(){
				viewModel.set("class_id", this.value());
			}
		 }).data("kendoDropDownList");
		var profitLost = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/reports/profit_loss/",
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
			serverFiltering: true,
		});

		var viewModel = kendo.observable({
			incomes: [],
			expense: [],
			incomeTotal: 0,
			expenseTotal: 0,
			net: "",
			class_id: 0,
			from : null,
			date: null,
			get_income: function(e) {
				var self = this;
				profitLost.filter([
					{ value: viewModel.get("class_id") },
					{ value: viewModel.get("date") },
					{ value: viewModel.get("from") }
				]);
				profitLost.bind("requestEnd", function(e){
					var source = e.response;
					var incomeTotal=0, expenseTotal=0;
					if(self.incomes.length > 0) {
						self.set("incomeTotal", 0);
						self.incomes.splice(0, self.incomes.length);
					}
					if(self.expense.length > 0) {
						self.set("expenseTotal", 0);
						self.expense.splice(0, self.expense.length);
					}
					if(source.length > 0) {
						for(var i=0;i<source.length;i++) {
							//console.log(source[i]=="");
							if(source[0]!="") {
								if(source[0].income.length > 0) {
									for( var i = 0; i < source[0].income.length; i++) {
										self.incomes.push({
											code: source[0].income[i].account_code, 
											name: source[0].income[i].account_name,
											amount: source[0].income[i].balance
										});
										incomeTotal += parseFloat(source[0].income[i].balance);
									}
								}
							}
							if(source[1]!="") {
								if(source[1].expense.length > 0) {
									for( var i = 0; i < source[1].expense.length; i++) {
										self.expense.push({
											code: source[1].expense[i].account_code, 
											name: source[1].expense[i].account_name,
											amount: source[1].expense[i].balance
										});
										expenseTotal += parseFloat(source[1].expense[i].balance);
									}	
								}
							}		
						}
					}
					self.set("incomeTotal", kendo.toString(incomeTotal, "c"));
					self.set("expenseTotal", kendo.toString(expenseTotal, "c"));
					self.set("net", kendo.toString((incomeTotal - expenseTotal), "c"));
				});
			}
		});
		viewModel.set("class_id", classes.value());
		viewModel.set("from", kendo.toString(start.value(), 'dd-MM-yyyy'));
		viewModel.set("date", kendo.toString(end.value(), 'dd-MM-yyyy'));
		
		kendo.bind($(".container"), viewModel);
		viewModel.get_income();
		$("#listview tbody").kendoListView({
			dataSource: viewModel.get("expense"),
			template: kendo.template($("#expenseTmpl").html())
		});
	});

	banhji.router.route("Electricity", function(){
		var validation = $("createView").kendoValidator().data("kendoValidator");
		//1. Datasources
		var transformerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/transformers/",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/electricities/transformers/",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/electricities/transformers/",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/electricities/transformers/",
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
					id: "id"
				}
			}
		});

		var classDS = new kendo.data.DataSource({
	    	transport: {
	             read: {
	             	url: banhji.baseUrl + "api/accounting_api/class_dropdown",
	             	type: "GET",
	             	dataType: "json"
	             }
	       }
	    });
	    $.getJSON(banhji.baseUrl + "api/accounting_api/class_dropdown", function(data) {
		 	$.each(data, function(key, val) {
		    	transformerModel.classes.push({id: val.id, name: val.name});
			});	
		});

		//2. Models
		var attributeModel = kendo.observable({
			items 			: [
					{ id: 0, discription: "Transformer Base", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "Lightning Arrester", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "MV Cable Connector", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "Fuse Cut Out", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "Support", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "Current/Transformer Intensity", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "Analog Meter", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "BT Fuse", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "PVC Sheath Cable", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "Customer LV Wire 1", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "Customer LV Wire 2", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "Lightning Protective Cable", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "Ground Wire", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "Earth Rod", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "Clam", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "Distribution Box", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "P.G Clam", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "កូស Connector 1", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "កូស Connector 2", capacity: "", type: "", unit: "" },
					{ id: 0, discription: "ទុយោ PVC", capacity: "", type: "", unit: "" }
			],
			reset 			: function(e) {
				for(var i=0; i < this.items.length; i++) {
					this.items[i].set("capacity", "");
					this.items[i].set("type", "");
					this.items[i].set("unit", "");
				}
				// if(this.items.length > 0) {
				// 	this.items.splice(0, this.items.length);
				// }
			}
		});

		var transformerModel = kendo.observable({
			classes 		: [],
			attributes 		: attributeModel,
			vendors			: null,
			vendor 			: banhji.vendor.get("current").id,
			setTransformer 	: function(transformerID) {
				this.set("current", transformerDS.get(transformerID));
			},
			isCreating 		: true,
			isDisabled		: true,
			filterBy 		: "license",
			createBtn 		: function(e) {
				e.preventDefault();
				router.navigate("/create", false);
				this.set("isCreating", true);
				this.set("transformer", "");
				this.set("transformerType", "");
				this.set("capacity", "");
				this.set("location", "");
				this.set("latitute", "");
				this.set("longtitute", "");
				this.set("brand", "");
				this.set("license", "");
				this.attributes.reset();
			},
			updateBtn 		: function(e) {
				e.preventDefault();
				this.set("isCreating", false);
				this.set("transformer", this.current.transformerNumber);
				this.set("transformerType", this.current.type);
				this.set("capacity", this.current.capacity);
				this.set("location", this.current.location);
				this.set("latitute", this.current.latitute);
				this.set("longtitute", this.current.longtitute);
				this.set("brand", this.current.brand);
				this.set("license", this.current.license);
				for(var i=0; i < this.attributes.items.length; i++) {
					this.attributes.items[i].set("id", this.current.attributes[i].id);
					this.attributes.items[i].set("capacity", this.current.attributes[i].capacity);
					this.attributes.items[i].set("type", this.current.attributes[i].type);
					this.attributes.items[i].set("unit", this.current.attributes[i].unit);
				}
				banhji.view.electricity.showIn("#info", createView);
				banhji.view.electricity.showIn("#detail", blankView);
				// transformerModel.setTransformer(id);
			},
			deleteBtn 		: function(e) {
				var transformer = transformerDS.get(this.current.id);
				var ask = confirm("តើអ្នកពិតជាត្រូវការលុបត្រងស្វូេនះម៉ែនទ?");

				if(ask === true) {
					transformerDS.remove(transformer);
					transformerDS.sync();
				} else {

				}
			},
			mapBtn 			: function(e) {
				
			},
			viewBtn 		: function(e) {
				e.preventDefault();
				banhji.view.electricity.showIn("#info", createView);
				banhji.view.electricity.showIn("#detail", blankView);
			},
			transformer 	: "",
			transformerType : "",
			location 		: "",
			latitute 		: "",
			longtitute 		: "",
			capacity 		: "",
			brand 			: "",
			license 		: "",
			validated 		: true,
			record 			: function(e) {
				if(this.get("validated") === true) {
					this.sync();
				}
			},
			update 			: function(e) {
				var transformer = transformerDS.get(this.current.id);
				transformer.set("license", this.get("license"));
				transformer.set("transformerNumber", this.get("transformer"));
				transformer.set("type", this.get("transformerType"));
				transformer.set("capacity", this.get("capacity"));
				transformer.set("brand", this.get("brand"));
				transformer.set("attributes", this.get("attributes").items);
				transformer.set("latitute", this.get("latitute"));
				transformer.set("location", this.get("location"));
				transformer.set("longtitute", this.get("longtitute"));
				transformerDS.sync();
			},
			reset 			: function(e) {
				this.set("transformer", "");
				this.set("transformerType", "");
				this.set("capacity", "");
				this.set("location", "");
				this.set("latitute", "");
				this.set("longtitute", "");
				this.set("brand", "");
				this.set("license", "");
				this.attributes.reset();
			},
			sync 			: function(e) {
				transformerDS.add({
					license 			: this.get("license"),
					transformerNumber	: this.get("transformer"),
					capacity 			: this.get("capacity"),
					type 				: this.get("transformerType"),
					brand 				: this.get("brand"),
					attributes 			: this.get("attributes").items,
					latitute 			: this.get("latitute"),
					location			: this.get("location"),
					longtitute 			: this.get("longtitute")
				});
				transformerDS.sync();
			} 
		});
		banhji.ds.vendors.fetch(function(){
			transformerModel.set("vendors", this.data());
		});
		var infoView = new kendo.View("#informationView", {model: transformerModel});
		var detailView = new kendo.View("#detailView", {model: transformerModel});
		var createView = new kendo.View("#createView", {model: transformerModel});
		var blankView = new kendo.View("#blank");
		banhji.view.layout.showIn("#layout-view", banhji.view.index);

		var template = kendo.template($("#menu").html());
			var menu = [];
			for(var i=0;i<banhji.km.length; i++) {
				var current = banhji.km[i];
				if(banhji.config.userData.allowedModules[i]) {
					menu.push(current);
				}
			}
			$("#header").html(template(menu));
		$("#secondary-menu").html("<li><a href='\#Electricity'>អគ្គីសនី</a></li><li><a href='\#Electricity/report'>រៀបចំរបាយការណ៍</a></li>");

		banhji.view.index.showIn("#content", banhji.view.electricity);
		$("#transformers").kendoListView({
			dataSource : transformerDS,
			template: kendo.template($("#transformersList").html()),
			selectable: true,
			change: function(e) {
				var uid = this.select().data('uid');
				var transformer = this.dataSource.getByUid(uid);
				banhji.view.electricity.showIn("#info", infoView);
				banhji.view.electricity.showIn("#detail", detailView);
				transformerModel.setTransformer(transformer.id);
				transformerModel.set("isDisabled", false);
			}
		});
		$("#addnew").click(function(){
			router.navigate('/create', false);
			transformerModel.set("isCreating", true);
			transformerModel.set("transformer", "");
			transformerModel.set("transformerType", "");
			transformerModel.set("capacity", "");
			transformerModel.set("location", "");
			transformerModel.set("latitute", "");
			transformerModel.set("longtitute", "");
			transformerModel.set("brand", "");
			transformerModel.set("license", "");
			transformerModel.attributes.reset();
		});
		$("#search").on("click", function(){
			var field = "";
			if(transformerModel.get("filterBy") === "license") {
				field = "license.name";
			} else {
				field = "transformerNumber";
			}
			transformerDS.filter({
				field: field,
				operator: "contains",
				value: $("#searchField").val()
			});
		});
		$("#license").click(function(e){
			e.preventDefault();
			transformerModel.set("filterBy", "license");
		});
		$("#name").click(function(e){
			e.preventDefault();
			transformerModel.set("filterBy", "name");
		});

		$("#newTransformer").on("click", function(event) {
			this.preventDefault;
			//append div to main-content
			$("#main-contents").append("<div id='dialog'></div>");
			var wnd = $("#dialog").kendoWindow({
				width: 300,
				height: 400,
				modal: true,
				visibility: false,
				title: "ថែមត្រង់ស្វូថ្មី"
			}).data("kendoWindow");

			wnd.center().open();
		});
	});

	banhji.router.route("Electricity/new", function(){

	});

	banhji.router.route("Electricity/report", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);

		var template = kendo.template($("#menu").html());
			var menu = [];
			for(var i=0;i<banhji.km.length; i++) {
				var current = banhji.km[i];
				if(banhji.config.userData.allowedModules[i]) {
					menu.push(current);
				}
			}
			$("#header").html(template(menu));
		$("#secondary-menu").html("<li><a href='\#Electricity'>អគ្គីសនី</a></li><li><a href='\#Electricity/report'>រៀបចំរបាយការណ៍</a></li>");
		banhji.view.index.showIn("#content", banhji.view.electricityReport);

		// Real stuff
		var id;
		var classes =[];
		var licenseDialog = $("#resellerCreate").kendoWindow({
			visibility: "hidden",
			width: "400px",
			height: "500px",
			modal: true
		}).data("kendoWindow");
		$.getJSON(banhji.baseUrl + "api/accounting_api/class_dropdown", function(data) {
		 	$.each(data, function(key, val) {
		    	classes.push({id: val.id, name: val.name});
			});	
		});
		//datasource
		var transformTransport = {
			read: {
				url: banhji.baseUrl + "api/electricities/transformers/",
				type: "GET",
				dataType: "json"
			},
			create: {
				url: banhji.baseUrl + "api/electricities/transformers/",
				type: "POST",
				dataType: "json"
			},
			update: {
				url: banhji.baseUrl + "api/electricities/transformers/",
				type: "PUT",
				dataType: "json"
			},
			destroy: {
				url: banhji.baseUrl + "api/electricities/transformers/",
				type: "DELETE",
				dataType: "json"
			},
			parameterMap : function(options, operation) {
				if( operation !== "read" && options.models ) {
					return { models: kendo.stringigy(options.models) };
				}
				return options;
			}
		};

		var licensees = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/customer_api/resellers/",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/customer_api/resellers/",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/customer_api/resellers/",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/customer_api/resellers/",
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
					id: "id"
				}
			}
		});

		var licenseeModel = kendo.observable({
			customers 		: new kendo.data.DataSource({
				transport: {
					read: {
						url: banhji.baseUrl + "api/customer_api/customer",
						dataType: "json",
						type: "GET"
					}
				}
			}),
			
			licensees 		: licensees,
			currentID 		: "",
			setCurrent		: function(model) {
				this.set("currentID", model.id);
				this.set("license_no", model.license_no);
				this.set("licensee_id", model.customer.id);
				this.set("licensee_name", model.licensee_name);
				this.set("location", model.location);
				this.set("voltage", model.voltage);
				this.set("price", model.price);
			},
			license_no 		: "",
			licensee_id 	: "",
			licensee_name 	: "",
			customer 		: [],
			location 		: "",
			voltage: 0,
			price: 0.00,
			connection_no: 0,
			isShown 		: false,
			save: function() {

				if( licenseeModel.get('license_no')===""  && licenseeModel.get('licensee_name')==="" ) {
					alert("Need license");
				} else {
					licensees.add({
						license_no: licenseeModel.get('license_no'),
						licensee_name: licenseeModel.get('licensee_name'),
						customer: this.get("customers").get(this.get("licensee_id")),
						location: licenseeModel.get("location"),
						voltage: licenseeModel.get('designated_voltage'),
						price: licenseeModel.get('price'),
						connection_no: licenseeModel.get('connection_no')
					});
					licensees.sync();
					router.navigate("/");
				}
				
			},
			update: function() {
				var model = licensees.get(this.get("currentID"));
				model.set("license_no", this.get("license_no"));
				model.set("customer", this.get("customers").get(this.get("licensee_id")));
				model.set("licensee_name", this.get("licensee_name"));
				model.set("location", this.get("location"));
				model.set("voltage", this.get("voltage"));
				model.set("price", this.get("price"));
				model.set("connection_no", this.get("connection_no"));

				licensees.sync();
				//console.log(model.id);
				//router.navigate("/");
				this.set("license_no", "");
				this.set("licensee_name", "");
				this.set("customer_id", "");
				this.set("designated_voltage", 0);
				this.set("price", 0.00);
				this.set("location", "");
				this.set("connection_no", 0);
			},
			cancel: function() {
				this.set("license_no", "");
				this.set("licensee_name", "");
				this.set("customer_id", "");
				this.set("designated_voltage", 0);
				this.set("price", 0.00);
				this.set("location", "");
				this.set("connection_no", 0);
				//router.navigate("/licensees");
			},
			destroy: function(id) {
				var model = licensees.get(id);
				var conformed_action = confirm("<?=$this->lang->line('button_create'); ?>");
				if(conformed_action) {
					licensees.remove(model);
					licensees.sync();
				}

			}
		});
		kendo.bind($("#resellerCreate"), licenseeModel);

		var licenseeListView = $("#resellerGrid").kendoGrid({
			dataSource: licensees,
			pageable: true,
			columns: [
				{ title: "អាជ្ញាប័ណ្ណ", field: "license_no" },
				{ title: "អតិថិជន", field: "customer", template: "#=customer.surname# #=customer.name#" },
				{ title: "ឈ្មោះអ្នកកាន់អាជ្ញាប័ណ្ណ", field: "licensee_name" },
				{ title: "ទីតាំង", field: "location" },
				{ title: "បញ្ជីថ្លៃលក់", field: "price" },
				{ title: "តង់ស្យុង", field: "voltage" },
				{ title: "ចំនួនភ្ជាប់", field: "connection_no" },
				{ command: [
						{
							text: "edit", 
							template: "<a href='\\#' class='btn-action glyphicons pencil btn-success k-grid-edit'><i></i></a>",
							click: function(e){
								var uid = $(e.target).closest("tr");
								var data = this.dataItem(uid);
								var model = licensees.get(data.id);
								licenseeModel.set("isShown", false);
								licenseeModel.setCurrent(model);
								licenseDialog.center().open();
							}
						}
					] 
				}
			]
		}).data("kendoGrid");
		$(".k-add-button").click(function(e) {
	        licenseeListView.add();
	        e.preventDefault();
	    });

		var distributionListView = $("#distribution>tbody").kendoListView({
			dataSource: new kendo.data.DataSource({
				transport: {
					read: {
						url: banhji.baseUrl + "api/electricities/distributions/",
						type: "GET",
						dataType: "json"
					},
					create: {
						url: banhji.baseUrl + "api/electricities/distributions/",
						type: "POST",
						dataType: "json"
					},
					update: {
						url: banhji.baseUrl + "api/electricities/distributions/",
						type: "PUT",
						dataType: "json"
					},
					destroy: {
						url: banhji.baseUrl + "api/electricities/distributions/",
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
						id: "id"
					}
				}
			}),
			template: kendo.template($("#distributionListTmpl").html()),
			editTemplate: kendo.template($("#editdistributionListTmpl").html())
		}).data("kendoListView");

		var transformerListView = $("#transformers>tbody").kendoGrid({
			dataSource : new kendo.data.DataSource({
				transport: transformTransport,
				schema: {
					model: {
						id: "id",
						field: {
							license: {},
							transformerNumber: { type: "string"},
							capacity: {type: "number"}
						}
					}
				},
				pageSize: 20
			}),
			editable: "popup",
			toolbar: ['create', 'save'],
			pageable: {
				pageSizes: [20, 30, 40, 50]
			},
			columns: [
				{ field: "license", title: "អាជ្ញាប័ណ្ណ", editor: classDropDownEditor, hidden: true },
				{ field: "brand", title: "ម៉ាក" },
				{ field: "transformerNumber", title: "ឈ្មោះ" },
				{ field: "capacity", title: "អនុភាព" },
				{ field: "type", title: "ប្រភេទ" },
				{ command: ['edit'] }
			]
			//template: kendo.template($("#transformerListTmpl").html())
		}).data('kendoGrid');

		//Vendor
		var energySourcePurchased = $("#energySourcePurchased").kendoGrid({
			dataSource: new kendo.data.DataSource({
				transport: {
					read: {
						url: banhji.baseUrl + "api/vendors/",
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
				pageSize: 20,
				schema: {
					model: {
						id: "id"
					},
					data: "vendors",
					total: "count"
				}
			}),
			pageable: {
				pageSizes: [20, 30, 40, 50]
			},
			columns: [
				{ title: "ថ្ងៃចុះកិច្ចព្រមព្រៀង", field: "created_at", width: "120px" },
				{ title: "ប្រភពនៃការទិញ", field: "name", template: "#=surname# #=name#" },
				{ title: "តង់ស្យុង", field: "voltage_id" },
				{ title: "ចំនូនចំនុចតភ្ជាប់", field: "connection", template: "#:connection.length#" },
				{ title: "ថ្លៃទិញ/ឯកតា" }
			]
		}).data("kendoGrid");
		energySourcePurchased.dataSource.filter(
			{ field: "type", operator: "eq", value: "electricity" }
		);

		var energyPurchased = $("#energyPurchased").kendoGrid({
			dataSource: new kendo.data.DataSource({
				transport: transformTransport,
				schema: {
					model: {
						id: "id"
					}
				},
				pageSize: 20
			}),
			pageable: {
				pageSizes: [20, 30, 40, 50]
			},
			columns: [
				{ title: "ថ្ងៃចុះកិច្ចព្រមព្រៀង", width: "120px" },
				{ title: "ប្រភពនៃការទិញ", field: "vendor" },
				{ title: "បរិមាណថាមពលទិញ" },
				{ title: "ថ្លៃទិញ/ឯកតា" },
				{ title: "ថ្លៃទិញសរុប" }
			],
			rowTemplate: kendo.template($("#purchaseListTmpl").html())
		}).data("kendoGrid");

		//customer Segement
		var customerSegment = $("#customerSegment").kendoGrid({
			dataSource: new kendo.data.DataSource({
				transport: {
					read: {
						url: banhji.baseUrl + "api/electricities/customers",
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
					data: "segment"
				}
			}),
			columns: [
				{ field: "type", title: "ប្រភេទអតិថិជន" },
				{ field: "number", title: "ចំនួន" },
				{ title: "រយ:ពេលផ្គត់ផ្គង់" },
				{ title: "សម្គាល់" }
			]
		}).data("kendoGrid");

		//generationFacility
		var generationFacility = $("#generationFacility").kendoGrid({
			dataSource: new kendo.data.DataSource({
				transport: {
					read: {
						url: banhji.baseUrl + "api/electricities/generators",
						type: "GET",
						dataType: "json"
					},
					create: {
						url: banhji.baseUrl + "api/electricities/generators",
						type: "POST",
						dataType: "json"
					},
					update: {
						url: banhji.baseUrl + "api/electricities/generators",
						type: "PUT",
						dataType: "json"
					},
					destroy: {
						url: banhji.baseUrl + "api/electricities/generators",
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
						id: "id"
					}
				},
				pageSize: 20
			}),
			editable: 'popup',
			pageable: {
				pageSizes: [20, 30, 40, 50]
			},
			toolbar: ['create', 'save'],
			columns: [
				{ title: "Class", field: "class_id" },
				{ title: "លេខកូដ", field: "code" },
				{ title: "កំលាំងហ្សេណារ៉ាទ័រ(ឌីណាម៉ូ)", field: "capacity" },
				{ title: "ប្រភេទប្រេង", field: "fuel_type" },
				{ title: "ថ្ងៃប្រើប្រាស់", field: "date_started_using" },
				{ title: "ថ្ងៃឈប់ប្រើប្រាស់", field: "date_stopped_using" }
			]
		}).data("kendoGrid");

		var generatorRecords = $("#generatorRecords").kendoGrid({
			dataSource: new kendo.data.DataSource({
				transport: {
					read: {
						url: banhji.baseUrl + "api/electricities/generator_records",
						type: "GET",
						dataType: "json"
					},
					create: {
						url: banhji.baseUrl + "api/electricities/generator_records",
						type: "POST",
						dataType: "json"
					},
					update: {
						url: banhji.baseUrl + "api/electricities/generator_records",
						type: "PUT",
						dataType: "json"
					},
					destroy: {
						url: banhji.baseUrl + "api/electricities/generator_records",
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
						id: "id"
					}
				},
				pageSize: 20
			}),
			editable: 'popup',
			pageable: {
				pageSizes: [20, 30, 40, 50]
			},
			toolbar: ['create'],
			columns: [
				{ title: "Class", field: "class_id" },
				{ title: "លេខកូដ", field: "code" },
				{ title: "កំលាំងហ្សេណារ៉ាទ័រ(ឌីណាម៉ូ)", field: "capacity" },
				{ title: "ប្រភេទប្រេង", field: "fuel_type" },
				{ title: "ថ្ងៃប្រើប្រាស់", field: "date_started_using" },
				{ title: "ថ្ងៃឈប់ប្រើប្រាស់", field: "date_stopped_using" }
			]
		}).data("kendoGrid");

		//distribution area
		var distributionAreas = $("#distributionAreas").kendoGrid({
			dataSource: new kendo.data.DataSource({
				transport: {
					read: {
						url: banhji.baseUrl + "api/electricities/distributionAreas",
						type: "GET",
						dataType: "json"
					},
					create: {
						url: banhji.baseUrl + "api/electricities/distributionAreas",
						type: "POST",
						dataType: "json"
					},
					update: {
						url: banhji.baseUrl + "api/electricities/distributionAreas",
						type: "PUT",
						dataType: "json"
					},
					destroy: {
						url: banhji.baseUrl + "api/electricities/distributionAreas",
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
						id: "id"
					}
				}
			}),
			editable: 'popup',
			pageable: {
				pageSizes: [30, 40, 50]
			},
			toolbar: ['create','save'],
			columns: [
				{ title: "Class", field: "class", editor: classDropDownEditor, hidden: true},
				{ title: "ឃុំ", field: "commune" },
				{ title: "ភូមី", field: "village" },
				{ title: "ចំនួនគ្រួសារសរុប", field: "total_families" },
				{ title: "ចំនួនគ្រួសារភ្ជាប់ចរន្ត", field: "family_has_electricity" },
				{ title: "Use MV", field: "use_mv" },
				{ title: "Use LV", field: "use_lv" },
				{ command: ["edit"]}
			]
		}).data("kendoGrid");

		//other functions
		function classDropDownEditor(container, options) {
            $('<input required data-text-field="name" data-value-field="id" data-bind="value:' + options.field + '"/>')
                .appendTo(container)
                .kendoDropDownList({
                    autoBind: false,
                    dataSource: {
                        type: "json",
                        transport: {
                            read: banhji.baseUrl + "api/accounting_api/class_dropdown"
                        }
                    }
                });
        }

        $("#addNewReseller").on("click", function(e){
        	licenseeModel.cancel();
        	licenseeModel.set("isShown", true);
        	licenseDialog.center().open();
        });
	});

	banhji.router.route("company", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);

		var template = kendo.template($("#menu").html());
			var menu = [];
			for(var i=0;i<banhji.km.length; i++) {
				var current = banhji.km[i];
				if(banhji.config.userData.allowedModules[i]) {
					menu.push(current);
				}
			}
			$("#header").html(template(menu));
		$("#secondary-menu").html("<li><a href='\#company'>ក្រុមហ៊ុន</a></li><li><a href='\#users'>User</a></li>");
		banhji.view.index.showIn("#content", banhji.view.company);
		var companyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/companies/company",
					type: "GET",
					dataType: "json"
				},
				destroy: {
					url : banhji.baseUrl + "api/companies/company",
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
	});

	banhji.router.route("users", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);

		var template = kendo.template($("#menu").html());
			var menu = [];
			for(var i=0;i<banhji.km.length; i++) {
				var current = banhji.km[i];
				if(banhji.config.userData.allowedModules[i]) {
					menu.push(current);
				}
			}
			$("#header").html(template(menu));
		$("#secondary-menu").html("<li><a href='\#company'>ក្រុមហ៊ុន</a></li><li><a href='\#users'>User</a></li>");
		banhji.view.index.showIn("#content", banhji.view.users);
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

	banhji.router.route("accounting", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);

		var template = kendo.template($("#menu").html());
			var menu = [];
			for(var i=0;i<banhji.km.length; i++) {
				var current = banhji.km[i];
				if(banhji.config.userData.allowedModules[i]) {
					menu.push(current);
				}
			}
		$("#header").html(template(menu));
		$("#home-menu").text("Banhji | គណនេយ្យ");
		$("#secondary-menu").html("<li><a href='\#items'>Items</a></li><li><a href='\#classes'>Classes</a></li><li><a href='\#gl'>កត់ត្រាទិន្នានុប្បវត្តិ</a></li>");
		banhji.view.index.showIn("#content", banhji.view.accounting);

		var $acGrid = $("#acctGrid").kendoGrid({
			dataSource: banhji.account.datasource,
			columns: [{title: "&nbsp;"}],
			rowTemplate: kendo.template($("#asideACTmpl").html()),
			selectable: true,
			change: function(e){
				var selected = this.select();
				var data = this.dataItem(selected);	

				banhji.account.setCurrent(data.id);
				
				banhji.account.filterByAccount().done(function(data){
					banhji.account.get("transactions").splice(0,banhji.account.get("transactions").length);
					$.each(data.results, function(k, v){
						banhji.account.get("transactions").push(v);
					})
				});
				banhji.view.accounting.showIn("#application", banhji.view.acInfo);
				banhji.view.acInfo.showIn("#account-section", banhji.view.accDetail);				
			}
		});
	});

	banhji.router.route("gl(/:id)", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);

		var template = kendo.template($("#menu").html());
			var menu = [];
			for(var i=0;i<banhji.km.length; i++) {
				var current = banhji.km[i];
				if(banhji.config.userData.allowedModules[i]) {
					menu.push(current);
				}
			}
		$("#header").html(template(menu));
		$("#secondary-menu").html("<li><a href='\#items'>Items</a></li><li><a href='\#classes'>Classes</a></li><li><a href='\#gl'>កត់ត្រាទិន្នានុប្បវត្តិ</a></li>");
		banhji.view.index.showIn("#content", banhji.view.accountingJournal);
		var items = [];
		//datasource
		var classDS = new kendo.data.DataSource({
	    	transport: {
	             read: {
	             	url: ARNY.baseUrl + "api/accounting_api/class_dropdown",
	             	type: "GET",
	             	dataType: "json"
	             }
	       }
	    });

		var journalItemModel = kendo.observable({
			items 		: [],
			add 		: function() {
				this.items.push({
					account_id	: 0,
					dr 			: 0,
					cr 			: 0,
					class_id	: 0,
					memo 		: "",
					exchange_rate: 0.00,
					main: 0
				});
			},
			remove 		: function(e) {
				for (var i = 0; i < this.items.length; i ++) {
		            var current = this.items[i];
		            if (current === e.data) {
		                this.items.splice(i, 1);
		                break;
		            }
		        }
			},
			itemCount	: function() {
				return this.get("items").length;
			},
			empty 		: function() {
				this.items.splice(0, this.items.length);
			}
		});

		var journalModel = kendo.observable({
			accounts 	: [],//accountDS,
			classes 	: [],//classDS,
			journalItem : journalItemModel,
			journalId 	: null,
			date 		: "",
			entryNumber : "",
			isNew 		: true,
			dataBound	: function(e) {
				$(e.currentTarget).closest("tr").find(".account").kendoDatePicker();
				console.log($(e.currentTarget).closest("tr").children().children());
			},
			debit		: function() {
				var dr = 0;
				if(this.journalItem.itemCount() > 0) {
					for(var i=0;i<this.journalItem.itemCount();i++) {
						dr += parseFloat(this.journalItem.items[i].dr);
					}
				}
				return dr; 
			},
			credit 		: function() {
				var cr = 0;
				if(this.journalItem.itemCount() > 0) {
					for(var i=0;i<this.journalItem.itemCount();i++) {
						cr += parseFloat(this.journalItem.items[i].cr);
					}
				}
				return cr;
			},
			dif 		: function() {
				var diff= 0,
				dr = parseFloat(this.debit()),
				cr = parseFloat(this.credit());
				if(dr > cr) {
					diff = parseFloat(dr) - parseFloat(cr);
				} else {
					diff = parseFloat(cr) - parseFloat(dr);
				}
				return kendo.toString(diff, '##,###');
			},
	 		total 		: function() {

				return this.journalItem.itemCount();
			},
			addNew 		: function() {
				this.journalItem.add();
			},
			record 		: function() {
				//record to database
				var errors = [];
				if(this.journalItem.itemCount() > 0) {
					for(var i=0; i < this.journalItem.itemCount(); i++) {
						if(this.journalItem.items[i].dr>0 && this.journalItem.items[i].cr> 0) {
							errors.push("Cannot have value in debit and credit of the same entry.");
						}
					}
					if(this.journalItem.itemCount() < 2) {
						errors.push("You need at least two entries.");
					}
					if (this.dif() > 0) {
						errors.push("Dr. must be equal to Cr. side.");
					}
					if(this.debit() === 0 || this.credit() === 0) {
						errors.push("You must fill in the debit or credit side of all entries.");
					}
					if(this.get("date") == "") {
						errors.push("You must fill in the date.");
					}
					if(errors.length > 0) {
						var error = "";
						for(var i =0; i < errors.length; i++) {
							error += (i +1)+". "+errors[i] + "\n";
						}
						alert(error);
						errors.splice(0,errors.length)
					} else {
						var self = this;

						banhji.transaction.save({
								vendor_id: banhji.vendor.get("current").id,
								employee_id: banhji.config.userData.userId,
								payment_id: 0,
								transaction_type: "gl",
								payment_method: "cash",
								check_no: 0,
								memo: "General Ledger",
								date: kendo.toString(this.get("date"), "yyyy-MM-dd"),
								due_date: null,
								amount_billed: 0,
								amount_due: 0,
								amount_paid: 0,
								number: this.get('entryNumber'),
								voucher: 0,
								invoiceNumber: 0,
								class_id: this.get("class_id"),
								status: 1,
								po_id: 0,
								journalEntries:  this.journalItem.items,
								inJournal: 1						
							}).then(
								function(data){
									self.set("date", new Date());
									self.set("entryNumber", null);
									self.journalItem.empty();
								},
								function(error){
									console.log(error);
								}
							);
					}
				}
			},
			update 		: function() {
				banhji.transaction.update(this.get("journalId"), {
					date: this.get("date"), 
					employee_id: banhji.config.userData.userId,
					number: this.get("entryNumber"),
					journalEntries:  this.journalItem.items
				});
			},
			cancel 		: function() {
				this.journalItem.empty();
			},
			remove 		: function(e) {
				this.journalItem.remove(e);
			}
		});
		
		$.getJSON(ARNY.baseUrl + "api/accounting_api/account", function(data) {
		 	$.each(data, function(key, val) {
		    	journalModel.accounts.push({id: val.id, name: val.name});
			});	
		});

		$.getJSON(ARNY.baseUrl + "api/accounting_api/class_dropdown", function(data) {
		 	$.each(data, function(key, val) {
		    	journalModel.classes.push({id: val.id, name: val.name});
			});	
		});
		kendo.bind($("#application"), journalModel);

		if(id){
			journalModel.set("isNew", false);
			journalModel.set("journalId", id);
			banhji.transaction.getById(id)
			.done(function(data){
				var journal = data.results[0];

				journalModel.set("date", journal.date);
				journalModel.set("entryNumber", journal.voucher);
				journalModel.get("journalItem").items.splice(0,journalModel.get("journalItem").items.length);
				$.each(journal.journalEntries, function(k,v){
					journalModel.get("journalItem").items.push({
						account_id: v.account.id,
						dr: v.dr,
						cr: v.cr,
						class_id: v.class_id,
						memo: v.memo,
						main: v.main
					});
				});
			});
		} else {
			journalModel.set("journalId", null);
			journalModel.set("isNew", true);
			journalModel.set("date", kendo.toString(new Date(), "dd-MM-yyyy"));
			journalModel.set("entryNumber", null);
			journalModel.get("journalItem").items.splice(0,journalModel.get("journalItem").items.length);
		}
	});

	banhji.router.route("accounting/accounts/new", function(){});

	banhji.router.route("accounting/items", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);

		var template = kendo.template($("#menu").html());
		var menu = [];
		for(var i=0;i<banhji.km.length; i++) {
			var current = banhji.km[i];
			if(banhji.config.userData.allowedModules[i]) {
				menu.push(current);
			}
		}
		$("#header").html(template(menu));

		$("#secondary-menu").html("<li><a href='\#accounting/items'>Items</a></li><li><a href='\#accounting/journal'>កត់ត្រាទិន្នានុប្បវត្តិ</a></li>");
		banhji.view.index.showIn("#content", banhji.view.accountingItems);
		var itemBaseUri = ARNY.baseUrl +"api/inventory_api/item";
		var itemRecordBaseUri = ARNY.baseUrl +"api/inventory_api/item_Records";
		var accountBaseUri = ARNY.baseUrl +"api/accounting_api/account";
		var typeBaseUri = ARNY.baseUrl +"api/inventory_api/item_type";
		var measureBaseUri = ARNY.baseUrl +"api/inventory_api/unit_measure";
		//datasource
		var itemsDS = new kendo.data.DataSource({
			transport: {
				read: {
					url : ARNY.baseUrl + "api/inventory_api/item",
					type: "GET",
					dataType: "json",
				},
				create: {
					url : ARNY.baseUrl + "api/inventory_api/item",
					type: "POST",
					dataType: "json"
				},
				update: {
					url : ARNY.baseUrl + "api/inventory_api/item",
					type: "PUT",
					dataType: "json"
				},	
				destroy: {
					url : ARNY.baseUrl + "api/inventory_api/item",
					type: "DELETE",
					dataType: "json"
				},
				
			 		
				parameterMap: function(data, operation) {
		            if (operation !== "read" && data.models) {
		                return {models: kendo.stringify(data.models)};
		            }
					
					return data;
				}
			}
		});
	});

	banhji.router.route("items(/:id)", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);
		banhji.view.index.showIn("#content", banhji.view.items);
		var transTmpl = kendo.template($("#itemsRecordView").html());
		var template = kendo.template($("#menu").html());
		var menu = [];
		for(var i=0;i<banhji.km.length; i++) {
			var current = banhji.km[i];
			if(banhji.config.userData.allowedModules[i]) {
				menu.push(current);
			}
		}
		$("#header").html(template(menu));
		$("#home-menu").text("Banhji | គណនេយ្យ");
		$("#secondary-menu").html("<li><a href='\#new/item'>សារពើណ័ណ្ឌថ្មី</a></li><li><a href='\#gl'>កត់ត្រាទិន្នានុប្បវត្តិ</a></li><li><a href='\#pomonitoring'>ប្រតិបត្តិការមូល</a></li><li><a href='\#load_adjustment'>សំរួលសន្និធិ</a></li><li><a href='\#reports'>របាយការណ៍</a></li>");

		var $search = $("#searchField");
		var type = $("#searchOptions").kendoDropDownList({
			dataSource: [ 
				{value: "0", text: "ទាំងអស់"},
				{value:"2", text:"មិនមែនសន្និធិ"}, 
				{value:"3", text:"Fixed Assets"}, 
				{value:"4", text:"សេវាកម្ម"},
				{value:"5", text:"ប្រាក់កក់"},
				{value:"6", text:"ពន្នអាករ"},
				{value:"7", text:"ផ្សេងៗ"}
			],
			dataTextField: "text",
			dataValueField: "value",
			index: -1,
			change: function(e) {
				if(this.value() === "0") {
					banhji.items.dataStore.filter([
						{field: "company_id", value: banhji.config.userData['company']},
						{field: "item_type_id <>", value: 1}
					]);
				} else {
					banhji.items.dataStore.filter([
						{field: "company_id", value: banhji.config.userData['company']},
						{field: "item_type_id", value: this.value()}
					]);
				}
			}
		}).data('kendoDropDownList');
		$("#search").on('click', function(){
			if($search.val() !== "") {
				banhji.items.dataStore.filter([
					{field: "company_id", value: banhji.config.userData['company']},
					{field: "name LIKE", value: $search.val()+'%'},
					{field: "item_type_id", value: type.value()}
				]);
				} else {
				banhji.item.dataStore.filter([
					{field: "company_id", value: banhji.config.userData['company']},
					{field: "item_type_id", value: type.value()}
				]);
			}
		});

		if(id) {
			banhji.items.getBy(id)
			.then(
				function(data) {
					banhji.items.setCurrent(data);
				},
				function(error) {
					console.log(error);
				}
			);
		}
		banhji.items.dataStore.filter([{field: "company_id", value: banhji.config.userData.company}, {field: "item_type_id <>", value: 1}]);
		$("#itemsSidebar").kendoGrid({
			dataSource: banhji.items.dataStore,
			columns: [
				{ title: "&nbsp;", field: "name"}
			],
			selectable: true,
			change: function(e) {
				var tr = this.select();
				var selected = this.dataItem(tr);
				banhji.items.setCurrent(selected);
				banhji.items.getReport(selected.id);
				banhji.items.itemRecords.getItemTranx()
				.then(
					function(data){
						var items = [];
						$.each(data, function(i,v){
							if(v.items.id === selected.id) {
								items.push(v);
							}
						});
						$("#itemTransDetail").kendoGrid({
							dataSource: items,
							columns: [
								{ field: "កាលបរិច្ឆេទ", width: "150px" },
								{ field: "ប្រភេទ" },
								{ field: "ចំនួន" }
							],
							rowTemplate: kendo.template($("#itemsRecordView").html())
						});
				},
					function(error){
						var data = [];
						$("#itemTransDetail > tbody").kendoListView({
							dataSource: data,
							template: kendo.template($("#itemsRecordView").html())
						});
				});
			}
		});
	});

	banhji.router.route("new/item", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);
		banhji.view.index.showIn("#content", banhji.view.itemsNew);
		banhji.items.addNew();
	});

	banhji.router.route("requests(/:id)", function(requestId){
		console.log("request section");
	});

	banhji.router.route("inventories(/:id)", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);
		banhji.view.index.showIn("#content", banhji.view.items);
		var transTmpl = kendo.template($("#itemsRecordView").html());
		var template = kendo.template($("#menu").html());
		var menu = [];
		for(var i=0;i<banhji.km.length; i++) {
			var current = banhji.km[i];
			if(banhji.config.userData.allowedModules[i]) {
				menu.push(current);
			}
		}
		$("#header").html(template(menu));
		$("#home-menu").text("Banhji | សន្និធិ");
		$("#secondary-menu").html("<li><a href='\#new/item'>សារពើណ័ណ្ឌថ្មី</a></li><li><a href='\#pomonitoring'>ប្រតិបត្តិការមូល</a></li><li><a href='\#load_adjustment'>សំរួលសន្និធិ</a></li><li><a href='\#reports'>របាយការណ៍</a></li>");

		var $search = $("#searchField");
		var type = $("#searchOptions").kendoDropDownList({
			dataSource: [
				{value:"1", text:"សន្និធិ"}
			],
			dataTextField: "text",
			dataValueField: "value",
			index: 0,
			change: function(e) {
				banhji.items.dataStore.filter([
					{field: "company_id", value: banhji.config.userData['company']},
					{field: "item_type_id", value: 1}
				]);
			}
		}).data('kendoDropDownList');
		$("#search").on('click', function(){
			if($search.val() !== "") {
				banhji.items.dataStore.filter([
					{field: "company_id", value: banhji.config.userData['company']},
					{field: "name LIKE", value: $search.val()+'%'},
					{field: "item_type_id", value: 1}
				]);
				} else {
				banhji.item.dataStore.filter([
					{field: "company_id", value: banhji.config.userData['company']},
					{field: "item_type_id", value: 1}
				]);
			}
		});

		if(id) {
			banhji.items.getBy(id)
			.then(
				function(data) {
					banhji.items.setCurrent(data);
				},
				function(error) {
					console.log(error);
				}
			);
		}

		banhji.items.dataStore.filter([{field: "company_id", value: banhji.config.userData.company}, {field: "item_type_id", value: 1}]);
		$("#itemsSidebar").kendoGrid({
			dataSource: banhji.items.dataStore,
			columns: [
				{ title: "&nbsp;", field: "name"}
			],
			selectable: true,
			change: function(e) {
				var tr = this.select();
				var selected = this.dataItem(tr);
				banhji.items.setCurrent(selected);
				banhji.items.getReport(selected.id);
				banhji.items.itemRecords.getItemTranx()
				.then(
					function(data){
						var items = [];
						$.each(data, function(i,v){
							if(v.items.id === selected.id) {
								items.push(v);
							}
						});
						$("#itemTransDetail").kendoGrid({
							dataSource: items,
							columns: [
								{ field: "កាលបរិច្ឆេទ", width: "150px" },
								{ field: "ប្រភេទ" },
								{ field: "ចំនួន" }
							],
							rowTemplate: kendo.template($("#itemsRecordView").html())
						});
				},
					function(error){
						var data = [];
						$("#itemTransDetail > tbody").kendoListView({
							dataSource: data,
							template: kendo.template($("#itemsRecordView").html())
						});
				});
			}
		});
	});

	banhji.router.route("classes(/:id)", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);
		banhji.view.index.showIn("#content", banhji.view.cls);

		function categoryDropDownEditor(container, options) {
            $('<input required data-text-field="name" data-value-field="type" data-bind="value:' + options.field + '"/>')
                .appendTo(container)
                .kendoDropDownList({
                    data: [
                    	{ type: "class", name: "ថ្នាក់"},
                    	{ type: "donor", name: "ម្ាស់គំរោង"},
                    	{ type: "project", name: "គំរោង"},
                    	{ type: "budget", name: "កញ្ចប់ថវិកា"}
                    ]
                });
        }
		var clssGrid = $("#clsGrid").kendoGrid({
			dataSource: banhji.class.get('dataSource'),
			editable: "popup",
			toolbar: [
				{ template: '<a class="k-button" href="\\#" onclick="return toolbar_click()">Command</a>'}
			],
			columns: [
				{ title: "ឈ្មោះ", field: "name"},
				{ title: "ពណ៌នា", field: "description"},
				{ title: "ប្រភេទ", field: "type",  editor: categoryDropDownEditor},
				{ title: "&nbsp;", command: ["edit"]}
			]
		}).data("kendoGrid");

		banhji.view.layout.showIn("#layout-view", banhji.view.index);
		banhji.view.index.showIn("#content", banhji.view.cls);
		var template = kendo.template($("#menu").html());
			var menu = [];
			for(var i=0;i<banhji.km.length; i++) {
				var current = banhji.km[i];
				if(banhji.config.userData.allowedModules[i]) {
					menu.push(current);
				}
			}
		$("#header").html(template(menu));
		$("#home-menu").text("Banhji | គណនេយ្យ");
		$("#secondary-menu").html("<li><a href='\#items'>Items</a></li><li><a href='\#classes'>Classes</a></li><li><a href='\#gl'>កត់ត្រាទិន្នានុប្បវត្តិ</a></li>");
		var data = [
				{ type: "Class", name: "ថ្នាក់"},
				{ type: "Donor", name: "ម្ចាស់គំរោង"},
				{ type: "Location", name: "ទីតាំង"},
				{ type: "Project", name: "គំរោង"}
			];
		$("#clsType").kendoDropDownList({
			dataSource: data,
			dataTextField: "name",
			dataValueField: "type",
			change: function(e) {
				banhji.class.get('current').set('type', this.value());
			}
		});
		var clsGrid = $("#clsGrid").kendoGrid({
			dataSource: banhji.class.get('dataSource'),
			columns: [
				{ field: "name", title: "ឈ្មោះ", size: "100px"},
				{ field: "description", title: "ពណ៌នា"},
				{ field: "type", title: "ប្រភេទ"},
				{ title: "&nbsp;", width: "152px", command: [{text: "កែ", click: edit},{text: "លុប", click: rm}]}
			]
		}).data("kendoGrid");
		$("#newCls").on("click", function(){
			clsWnd.open().center();
			banhji.class.get("dataSource").insert(0, {company_id: banhji.config.userData['company'], name: "", description: "", type: "Class"});
			banhji.class.setCurrent(banhji.class.get("dataSource").get(0));
		});
		function edit(e){
			e.preventDefault();
            var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
            banhji.class.setCurrent(dataItem);
            clsWnd.center().open();   
		}
		function rm(e){
			e.preventDefault();
			var myprompt = confirm("តើលោកអ្នកពិតជាចង់លុបទិន្នន័យនេះមែនឬទេ?");
			if(myprompt){
				var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
				banhji.class.get("dataSource").remove(dataItem);
				banhji.class.save();
			}             
		}
		var clsWnd = $("#clsModal").kendoWindow({
			visible: false,
			title: "ទំព័រចំណាត់ថ្នាក់",
			modal: true,
			width: "400px",
			height: "350px"
		}).data("kendoWindow");
	});

	//By Visal -----------------------------------
	//MyPage
	<?php //include("myPage.php"); ?>

	//InventorySPA
	banhji.router.route("inventory", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.inventory);
		banhji.view.layout.showIn("#main", banhji.view.layMain);
		banhji.view.layout.showIn("#cont", banhji.view.homeIn);

		banhji.view.layout.showIn("#application", banhji.view.layoutView);
		banhji.view.layout.showIn("#content",  banhji.view.itemView);
		var template = kendo.template($("#menu").html());
		var menu = [];
		for(var i=0;i<banhji.km.length; i++) {
			var current = banhji.km[i];
			if(banhji.config.userData.allowedModules[i]) {
				menu.push(current);
			}
		}
		$("#header").html(template(menu));
		$("#home-menu").text("Banhji-សន្និធិ");
	});

	//InventoryItem
	banhji.router.route("inventory/item/:id", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.inventory);
		banhji.view.layout.showIn("#main", banhji.view.layMain);
		banhji.view.layout.showIn("#cont", banhji.view.homeIn);

		banhji.view.layout.showIn("#application", banhji.view.layoutView);
		banhji.view.layout.showIn("#content",  banhji.view.itemView);
		var template = kendo.template($("#menu").html());
		var menu = [];
		for(var i=0;i<banhji.km.length; i++) {
			var current = banhji.km[i];
			if(banhji.config.userData.allowedModules[i]) {
				menu.push(current);
			}
		}
		$("#header").html(template(menu));
		banhji.inventory.viewModel.setCurrent(id);
	});

	banhji.router.route("pmt/:id", function(id){
		banhji.transaction.getById(id)
		.then(function(data){
			$.each(data.results[0].journalEntries, function(k,v){
				if(v.main === "1") {
					banhji.bill.viewModel.set("cashAccount", v.account.id);
					return false;
				}
			});
			banhji.payment.set("date", data.results[0].date);
			banhji.payment.set("checkNo", data.results[0].check_no);
			banhji.payment.set("class_id", data.results[0].class_id);
			banhji.payment.set("voucher", data.results[0].number);
			banhji.payment.set("payment_note", data.results[0].memo);
		});
		
		banhji.payment.getById(id)
		.then(
			function(data){
				if(data.length > 0) {
					if(banhji.payment.get("paymentItems").length>0) {
						banhji.payment.get("paymentItems").splice(0,banhji.payment.get("paymentItems").length);
					}

					$.each(data, function(index, value){
						banhji.payment.get("paymentItems").push(value);
					});
					banhji.view.layout.showIn("#layout-view", banhji.view.payment);
				}
			},
			function(error){
				if(banhji.payment.get("paymentItems").length>0) {
					banhji.payment.get("paymentItems").splice(0,banhji.payment.get("paymentItems").length);
				}
			}
		);
	});


	//By Visal -----------------------------------
	//MyPage
	<?php //include("myPage.php"); ?>

	//InventorySPA
	banhji.router.route("inventory", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.inventory);
		banhji.view.layout.showIn("#main", banhji.view.layMain);
		banhji.view.layout.showIn("#cont", banhji.view.homeIn);

		banhji.view.layout.showIn("#application", banhji.view.layoutView);
		banhji.view.layout.showIn("#content",  banhji.view.itemView);
		var template = kendo.template($("#menu").html());
		var menu = [];
		for(var i=0;i<banhji.km.length; i++) {
			var current = banhji.km[i];
			if(banhji.config.userData.allowedModules[i]) {
				menu.push(current);
			}
		}
		$("#header").html(template(menu));
		$("#home-menu").text("Banhji-សន្និធិ");
	});

	//InventoryItem
	banhji.router.route("inventory/item/:id", function(id){
		banhji.view.layout.showIn("#layout-view", banhji.view.inventory);
		banhji.view.layout.showIn("#main", banhji.view.layMain);
		banhji.view.layout.showIn("#cont", banhji.view.homeIn);

		banhji.view.layout.showIn("#application", banhji.view.layoutView);
		banhji.view.layout.showIn("#content",  banhji.view.itemView);
		var template = kendo.template($("#menu").html());
		var menu = [];
		for(var i=0;i<banhji.km.length; i++) {
			var current = banhji.km[i];
			if(banhji.config.userData.allowedModules[i]) {
				menu.push(current);
			}
		}
		$("#header").html(template(menu));
		banhji.inventory.viewModel.setCurrent(id);

	});

	//InventroyNewItem
	banhji.router.route("inventory/new", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.inventory);
		banhji.view.layout.showIn("#main", banhji.view.layMain);
		banhji.view.layout.showIn("#cont", banhji.view.homeIn);

		banhji.view.layout.showIn("#application", banhji.view.layoutView);
		banhji.view.layout.showIn("#content",  banhji.view.itemNewView);
		banhji.inventory.viewModel.empty();

		var template = kendo.template($("#menu").html());
		var menu = [];
		for(var i=0;i<banhji.km.length; i++) {
			var current = banhji.km[i];
			if(banhji.config.userData.allowedModules[i]) {
				menu.push(current);
			}
		}
		$("#header").html(template(menu));		
	});

	//InventoryEdit
	banhji.router.route("inventory/edit", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.inventory);
		banhji.view.layout.showIn("#main", banhji.view.layMain);
		banhji.view.layout.showIn("#cont", banhji.view.homeIn);

		banhji.view.layout.showIn("#application", banhji.view.layoutView);
		banhji.view.layout.showIn("#content",  banhji.view.itemEditView);

		banhji.inventory.viewModel.set("sku", banhji.inventory.viewModel.get('current').item_sku);
		banhji.inventory.viewModel.set("name", banhji.inventory.viewModel.get('current').name);
		banhji.inventory.viewModel.set("measure_id", banhji.inventory.viewModel.get('current').unit_measure_id);
		banhji.inventory.viewModel.set("cost", banhji.inventory.viewModel.get('current').cost);
		banhji.inventory.viewModel.set("price", banhji.inventory.viewModel.get('current').price);
		banhji.inventory.viewModel.set("type", banhji.inventory.viewModel.get('current').item_type_id);
		banhji.inventory.viewModel.set("sale_descript", banhji.inventory.viewModel.get('current').sale_description);
		banhji.inventory.viewModel.set("purchase_descript", banhji.inventory.viewModel.get('current').purchase_description);
		banhji.inventory.viewModel.set("account", banhji.inventory.viewModel.get('current').general_account_id);
		banhji.inventory.viewModel.set("income_account", banhji.inventory.viewModel.get('current').income_account_id);
		banhji.inventory.viewModel.set("cogs_account", banhji.inventory.viewModel.get('current').cogs_account_id);
		banhji.inventory.viewModel.set("status", banhji.inventory.viewModel.get('current').status);
		// banhji.inventory.viewModel.empty();

		var template = kendo.template($("#menu").html());
		var menu = [];
		for(var i=0;i<banhji.km.length; i++) {
			var current = banhji.km[i];
			if(banhji.config.userData.allowedModules[i]) {
				menu.push(current);
			}
		}
		$("#header").html(template(menu));		
		
	});

	//ItemReport
	banhji.router.route("inventory/itemReport", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.inventory);
		banhji.view.layout.showIn("#main", banhji.view.layMain);
		banhji.view.layout.showIn("#cont", banhji.view.homeIn);

		banhji.view.layout.showIn("#application", banhji.view.layoutView);
		banhji.view.layout.showIn("#content",  banhji.view.itemReport);
		var template = kendo.template($("#menu").html());
		var menu = [];
		for(var i=0;i<banhji.km.length; i++) {
			var current = banhji.km[i];
			if(banhji.config.userData.allowedModules[i]) {
				menu.push(current);
			}
		}
		$("#header").html(template(menu));
	});

	/*---------- InventoryItem ----------*/
	//InventoryView	
	banhji.router.route("inventoryItem", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.inventory);
		banhji.view.layout.showIn("#main", banhji.view.layMain);
		banhji.view.layout.showIn("#cont", banhji.view.inventoryItem);

		var template = kendo.template($("#menu").html());
		var menu = [];
		for(var i=0;i<banhji.km.length; i++) {
			var current = banhji.km[i];
			if(banhji.config.userData.allowedModules[i]) {
				menu.push(current);
			}
		}
		$("#header").html(template(menu));
	});

	/*---------- UnitMeasure ----------*/
	//UnitMeasure	
	banhji.router.route("unit_measure", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.inventory);
		banhji.view.layout.showIn("#main", banhji.view.layMain);
		banhji.view.layout.showIn("#cont", banhji.view.unitMeasure);

		var template = kendo.template($("#menu").html());
		var menu = [];
		for(var i=0;i<banhji.km.length; i++) {
			var current = banhji.km[i];
			if(banhji.config.userData.allowedModules[i]) {
				menu.push(current);
			}
		}
		$("#header").html(template(menu));
	});

	/*---------- Adjustment ----------*/
	//Adjustment	
	banhji.router.route("load_adjustment", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.index);
		banhji.view.index.showIn("#content", banhji.view.loadAdjustment);
	});

	$(function(){
		$("title").text(banhji.config.title);
		banhji.router.start();
		if(banhji.config.userData['company']==="") {
			window.location.href="<?php echo base_url();?>app#new_company";
		}
	});
</script>
