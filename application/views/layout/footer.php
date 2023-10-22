
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
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
if(isset($script)): 
    foreach ($script as $script):?>
    <script src="<?= base_url() ?>assets/js/<?= $script ?>.js"></script>
<?php 
    endforeach;
    endif ?>
