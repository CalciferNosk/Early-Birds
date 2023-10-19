
<!-- MDB -->
<script>
    var base_url = '<?= base_url()?>';
</script>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"
></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?php
if(isset($script)): ?>
    <script src="<?= base_url() ?>assets/js/<?= $script ?>.js"></script>
<?php endif ?>
