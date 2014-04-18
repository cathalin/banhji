<ul>
    <li class="<?php if($this->uri->segment(2) == "") { echo "active"; } ?>">
        <a href="<?php echo base_url('admin'); ?>/" class="glyphicons building"><i></i> ក្រុមហ៊ុន</a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "user") { echo "active"; } ?>">
        <a href="<?php echo base_url('admin/user'); ?>/" class="glyphicons user"><i></i> អ្នកប្រើប្រាស់</a>
    </li>      
</ul>