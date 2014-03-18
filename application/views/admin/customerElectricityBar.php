<ul>
    <li class="<?php if($this->uri->segment(2) == "customer_type") { echo "active"; } ?>">
        <a href="<?php echo base_url('admin/customer_type'); ?>/" class="glyphicons group"><i></i> ប្រភេទអតិថិជន</a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "tariff_plan") { echo "active"; } ?>">
        <a href="<?php echo base_url('admin/tariff_plan'); ?>/" class="glyphicons charts"><i></i> គំរោងតំលៃ</a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "tariff") { echo "active"; } ?>">
        <a href="<?php echo base_url('admin/tariff'); ?>/" class="glyphicons coins"><i></i> តំលៃលក់</a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "exemption") { echo "active"; } ?>">
        <a href="<?php echo base_url('admin/exemption'); ?>/" class="glyphicons cart_out"><i></i> លើកលែង</a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "maintenance") { echo "active"; } ?>">
        <a href="<?php echo base_url('admin/maintenance'); ?>/" class="glyphicons cleaning"><i></i> ថែទាំ</a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "ampere") { echo "active"; } ?>">
        <a href="<?php echo base_url('admin/ampere'); ?>/" class="glyphicons last_fm"><i></i> អំពែ</a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "voltage") { echo "active"; } ?>">
        <a href="<?php echo base_url('admin/voltage'); ?>/" class="glyphicons electricity"><i></i> តុងស្យុង</a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "electricity_box") { echo "active"; } ?>">
        <a href="<?php echo base_url('admin/electricity_box'); ?>/" class="glyphicons posterous_spaces"><i></i> ប្រអប់កុងទ័រ</a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "currency_rate") { echo "active"; } ?>">
        <a href="<?php echo base_url('admin/currency_rate'); ?>/" class="glyphicons stats"><i></i> អត្រាប្រាក់</a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "classes") { echo "active"; } ?>">
        <a href="<?php echo base_url('admin/classes'); ?>/" class="glyphicons list"><i></i> Class</a>
    </li>       
</ul>
