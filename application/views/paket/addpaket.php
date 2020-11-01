<!DOCTYPE html>
<html lang="en">
<head>
<title>Tazkia</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/maruti-style.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/maruti-media.css" class="skin-color" />
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="<?php echo site_url('dashboard') ?>">Dashboard</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-messaages-->
<div class="btn-group rightzero"> <a class="top_message tip-left" title="Manage Files"><i class="icon-file"></i></a> <a class="top_message tip-bottom" title="Manage Users"><i class="icon-user"></i></a> <a class="top_message tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a> <a class="top_message tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a> </div>
<!--close-top-Header-messaages--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class=""><a title="" href="<?php echo site_url('logout') ?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->

<div id="sidebar">
  <ul>
    <li class="active"><a href="<?php echo site_url('dashboard') ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="<?php echo site_url('user') ?>"><span>User</span></a></li>
    <li><a href="<?php echo site_url('santri') ?>"><span>Santri</span></a></li>
    <li><a href="<?php echo site_url('paket') ?>"><span>Paket</span></a></li>
    <!-- <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Master</span></a>
      <ul>
        <li><a href="<?php echo site_url('Admin/kelola_admin') ?>">Data Admin</a></li>
		<li><a href="<?php echo site_url('Admin/kelola_user') ?>">Data User</a></li>
		<li><a href="<?php echo site_url('Admin/kelola_jagung') ?>">Data Jagung</a></li>
		<li><a href="<?php echo site_url('Admin/kelola_lokasi') ?>">Data Lokasi</a></li>
      </ul>
    </li> -->
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> </div>
  </div>
  <div class="container-fluid">
      <h3>Tambah Data Paket</h3>
    <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>Tambah Data Paket</h5>
          </div>
          <div class="widget-content nopadding">
            <?php echo form_open('paket/addpaket',array(
                      'class' => 'form-horizontal'
                  )); ?>
              <div class="control-group">
                <label class="control-label">Nama Paket :</label>
                <div class="controls">
                  <input type="text" class="span11" name="nama_paket" id="nama_pake" placeholder="Nama Paket" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Tanggal Diterima :</label>
                <div class="controls">
                  <input type="date" class="span11" name="tanggal_diterima" id="tanggal_diterima" placeholder="Tanggal Diterima" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Kategori Paket :</label>
                <div class="controls">
                  <select class="span11" name="kategori_paket" id="kategori_paket">
                    <?php foreach($kategori as $kategori_paket){ ?>
                      <option value="<?php echo $kategori_paket->id_kategori ?>"><?php echo $kategori_paket->nama_kategori ?></option>
                    <?php } ?>
                  </select>
                </div>
                <!-- <div class="controls">
                  <input type="text" class="span11" name="kategori_paket" id="kategori_paket" placeholder="Kategori Paket" required>
                </div> -->
              </div>
              <div class="control-group">
                <label class="control-label">Penerima Paket :</label>
                <div class="controls">
                  <select class="span11" name="penerima_paket" id="penerima_paket">
                    <?php foreach($santri as $santri){ ?>
                      <option value="<?php echo $santri->id_santri ?>"><?php echo $santri->nama_santri ?></option>
                    <?php } ?>
                  </select>
                </div>
                <!-- <div class="controls">
                  <select class="span11" name="penerima_paket" id="penerima_paket" placeholder="Penerima Paket" required>
                    <?php foreach($asrama as $asrama){ ?>
                      <option value="<?php echo $asrama->id ?>"><?php echo $asrama->nama_asrama ?> - <?php echo $asrama->gedung ?></option>
                    <?php } ?>
                  </select>
                </div> -->
              </div>
              <div class="control-group">
                <label class="control-label">Pengirim Paket :</label>
                <div class="controls">
                  <input type="text" class="span11" name="pengirim_paket" id="pengirim_paket" placeholder="Pengirim Paket" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Isi Paket :</label>
                <div class="controls">
                  <input type="text" class="span11" name="isi_paket" id="isi_paket" placeholder="Isi Paket" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Status Paket :</label>
                <div class="controls">
                  <input type="text" class="span11" name="status_paket" id="status_paket" placeholder="Status Paket" required value="Masuk" readonly>
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-success">Tambah</button>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
    </div>
	</div>
  </div>
</div>
<div class="row-fluid">
  <div id="footer" class="span12"> 2019 &copy; Sulthonah Hidayatul Fauziah</div>
</div>
<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/jquery.min.js"></script> 
<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/bootstrap-colorpicker.js"></script> 
<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/bootstrap-datepicker.js"></script> 
<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/jquery.uniform.js"></script> 
<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/select2.min.js"></script> 
<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/maruti.js"></script> 
<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/maruti.form_common.js"></script>
 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
