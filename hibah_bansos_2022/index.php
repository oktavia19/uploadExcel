<div class="container-fluid">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Laporan Hibah  - data</h3>
            <p class="panel-subtitle">tabel rekap input</p>
            <?php if(!empty($this->session->flashdata('status'))){ ?>
            <div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
            <?php } ?>
        </div>
        <div class="panel-body">

            <form action="<?php echo site_url("laporan/submit_hibah"); ?>" class="form-horizontal" method="POST">
                <form role="form">
                    <div class="form-group">
                        <label class="col-md-3 control-label">SKPD</label>
                        <div class="col-md-9">
                            <select name="skpd_id" id="skpd_id" class="form-control select">
                                <option disabled selected> Pilih </option>
                                <?php foreach($skpd->result() as $row):?>
                                    <option value="<?php echo $row->id_skpd;?>"><?php echo $row->nama_skpd;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-success pull-right"><i class="fa fa-search"></i></button>
                </form>
            </form>
            <br>
            <br>

            <div class="btn-group pull-left">
                <?php
                $closed = $this->closingservice->jambukatutup();
                if($closed == false){
                    ?>
                    <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> NEW</button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('hibahbansos/form_manual_hibah')?>"><img src="<?php echo base_url('assets/img/icons/tambah.png')?>" width="24"/> Manual Hibah</a></li>
                        <li><a href="<?php echo site_url('hibahbansos/manualBansos')?>" target='new'><img src="<?php echo base_url('assets/img/icons/kertas.png')?>" width="24"/> Manual Bansos</a></li>
                        <li><a href="<?php echo site_url('hibahbansos/inputExcel')?>"><img src="<?php echo base_url('assets/img/icons/upload.png')?>" width="24"/> Uplod Pengajuan Excel </a></li>
                    </div>
                <?php }?>
                <br>
                <br>
            </form>
            <div c
            lass="cleared"></div>
            <div class="table-reponsive" style="width: 100%;overflow: auto;">
                <table class="table-data" align="center">
                    <tr>
                        <th>No</th>
                        <th width="">Pengajuan</th>
                        <th width="20%">Jenis</th>
                        <th width="20%">Penerima</th>
                        <th width="20%">Nomor BHI</th>
                        <th width="20%">Alamat</th>
                        <th width="20%">Nominal</th>
                        <th width="20%">OPD Pemberi Rekomendasi</th>
                        <th>Action</th>
                    </tr>
                    <br>
                    <br>

                    <?php 
                    $no=1;
                    $total=0;
                    foreach ($a as $key => $a) { ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $a['jenis_pengajuan'];?></td>
                            <td><?php echo $a['peruntukan'];?></td>
                            <td><?php echo $a['penerima'];?></td>
                            <td><?php echo $a['bhi'];?></td>
                            <td><?php echo $a['alamat'];?></td>
                            <td><?php echo "Rp " . number_format($a['nominal'], 0, ",", ".");?></td>
                            <td><?php echo $a['skpd'];?></td> 
                            <td>
                                <?php
                                $closed = $this->closingservice->jambukatutup();
                                if($closed == false){
                                    ?>
                                    <a href="<?php echo site_url('hibahbansos/detail/'.$a['id']);?>" class="btn-rounded success" title="info" name="detail"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo site_url('hibahbansos/hapus/'.$a['id']);?>" class="btn-rounded danger" title="penerima" name="penerima" onclick="return confirm('Hapus Data ini.....?')"><i class="fa fa-trash-o"></i></a>
                                </td>

                            <?php } ?>
                        </tr>
                    <?php }?>
                </td>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/datatables.js'?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#mytable').DataTable();
    });
</script>