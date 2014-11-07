<?php
  $this->load->view('public/header');
?>
  <div>
  <form action="<?php echo site_url('user/upload'); ?>" method="post" enctype="multipart/form-data">
     <input type="file" name="pic" />
     <input type="submit" value="上传"/>

  </form>
  </div>
<?php
  $this->load->view('public/footer');
 ?>