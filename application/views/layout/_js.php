<!-- jQuery -->
<script src="<?php echo base_url('assets'); ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/popper.min.js"></script>
<!-- Bootstrap 4.3 -->
<script src="<?php echo base_url('assets'); ?>/js/bootstrap.min.js"></script>


<script src="<?php echo base_url('assets'); ?>/js/config_toast.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/all.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/adminlte.js"></script>

<script src="<?php echo base_url('assets'); ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/responsive.bootstrap4.min.js"></script>

<script src="<?php echo base_url('assets'); ?>/js/config.js"></script>

<script src="<?php echo base_url('assets'); ?>/js/sum.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/toastr.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {

            <?php foreach ($listActiveLink as $activeid) {
                echo "$('#" . $activeid . "').addClass('active');";
            }
            ?>
                
        });
    </script>