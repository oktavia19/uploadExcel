<div class="container-fluid">
  <!-- OVERVIEW -->
  <div class="panel panel-headline">
    <div class="panel-heading">
      <h3 class="panel-title">Pengajuan</h3>
      <p class="panel-subtitle">form</p>
      <br />
      <a class="btn btn-default"><i class="lnr lnr-arrow-left-circle"></i></a>
      <a class="btn btn-success " href="#" data-toggle="modal" data-target="#my-petunjuk">Petunjuk Format Excel</a>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <input type="hidden" class="input-url" value="<?= base_url() ?>">
          <form action="<?= url('hibahbansos/impor') ?>" method='POST' enctype="multipart/form-data">

            <input type="hidden" name="acc" value="impor" />
            <div class="alert alert-danger alert-i" style="display: none"></div>

            <div class="form-group col-md-6">
              <label>Jenis</label>
              <?= form_dropdown('peruntukan',array('uang'=>'Uang','barang'=>'Barang','jasa'=>'Jasa'),0,"class='form-control  perutukan'") ?>
            </div>

            <div class="form-group col-md-6">
              <label>Tahun Pengajuan</label>
              <?= form_dropdown('tahun_pengajuan',Factory::tahun('Belum Pernah',2010,date('Y')),0,"class='form-control'") ?>
            </div>

            <div class="form-group col-md-6">
              <label>Kecamatan</label>
              <select class="form-control" name="kecamatan" id="kecamatan" required>
                <option value disabled selected="">-PILIH-</option>
                <?php foreach($kecamatan->result() as $row):?>
                  <option value="<?php echo $row->id_kecamatan;?>"><?php echo $row->nama_kecamatan;?></option>
                <?php endforeach;?>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label>Desa</label>
              <select class="form-control" name="desa" id="desa" required>
                <option value="">-PILIH-</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label>Program</label>
              <select class="form-control" name="program" id="program" required>
                <option value disabled selected="">-PILIH-</option>
                <?php foreach($program->result() as $row):?>
                  <option value="<?php echo $row->id_program;?>"><?php echo $row->program;?></option>
                <?php endforeach;?>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label>Kegiatan</label>
              <select class="form-control" name="kegiatan" id="kegiatan">
                <option value="">-PILIH-</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label>Sub Kegiatan</label>
              <select class="form-control" name="sub_kegiatan" id="sub_kegiatan">
                <option value="">-PILIH-</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label>OPD yang Memberi Rekomendasi</label>
              <select class="form-control" name="opd_rekomendasi" id="opd_rekomendasi" required>
                <option value disabled selected="">-PILIH-</option>
                <?php foreach($skpd->result() as $row):?>
                  <option value="<?php echo $row->id_skpd;?>"><?php echo $row->nama_skpd;?></option>
                <?php endforeach;?>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label>OPD Pelaksana</label>
              <select class="form-control" name="opd_pelaksana" id="opd_pelaksana" required>
                <option value disabled selected="">-PILIH-</option>
                <?php foreach($skpd->result() as $row):?>
                  <option value="<?php echo $row->id_skpd;?>"><?php echo $row->nama_skpd;?></option>
                <?php endforeach;?>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label>File Usulan (Format Excel 2003 .xls)</label>
              <input type="file" name="impor" class="form-control excel-f-check" accept="application/vnd.ms-excel" />
            </div>
            <button class="btn btn-primary btn-accept" name="simpan" disabled>Simpan</button>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" role="dialog" id="fetch-modal">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p><h3>Fetching Data.....</h3> mohon tunggu</p>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal" tabindex="-1" role="dialog" id="my-petunjuk">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Petunjuk Format Excel</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          <div class="alert alert-info">Isi dari excel harus di sesuaikan apakah bantuan langsung atau tidak, dalam hal ini harus dipisah. Selanjutnya data tersebut di sesuaikan dengan program/kegiatan. <b>Bantuan Langsung</b> merupakan bantuan berupa barang dan terkait dengan kegiatan OPD. <b>Bantuan Tidak Langsung</b> merupakan bantuan berupa uang dan tidak terikat dengan kegiatan OPD.</div>
          Petunjuk format excel yang disetujui oleh system eproposal adalah sebagai berikut : 
          <br />
          <div style="width:100%;overflow: auto;">
            <a href="<?= base_url('master/downloadformathibah') ?>" class="btn btn-danger" target='_blank'>Download Format Impor Excel</a>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <td width="100">Penerima (Kelompok / Organisasi)</td>
                  <td width="99">Pemimpin (Kelompok / Organisasi)</td>
                  <td width="50">Kecamatan</td>
                  <td width="83">Desa</td>
                  <td width="70">Nomor BHI</td>
                  <td width="50">Nominal Pengajuan</td>
                  <td width="123">Rencana Penggunaan disertai Satuan</td>
                  <td width="70">Alamat</td>
                  <td width="50">Tahun Terakhir Menerima Bantuan</td>
                  <td width="50">Tanggal Surat Permohonan</td>
                  <td width="50">Nomor Surat Permohonan</td>
                  <td width="50">Nomor Penerbitan Rekomendasi</td>
                  <td width="50">Tanggal Penerbitan Rekomendasi</td>
                  <td width="70">Pejabat Penerbitan Rekomendasi</td>
                  <td width="123">Disposisi Ketua TAPD</td>
                  <td width="123">Tanggal Disposisi Bupati Tuban Pengajuan Proposal</td>
                  <td width="50">Tanggal Pertimbangan Ketua TAPD</td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </thead>
            </table>
          </div>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.0.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#kecamatan').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url();?>hibahbansos/get_desa",
        method : "POST",
        data : {id: id},
        async : false,
        dataType : 'json',
        success: function(data){
          var html = '';
          var i;
          for(i=0; i<data.length; i++){
            html += '<option value="'+data[i].id_desa+'">'+data[i].nama_desa+'</option>';
          }
          $('#desa').html(html);

        }
      });
    });
  });
</script>

<script type="text/javascript">
  $('#program').change(function(){
    var id=$(this).val();
    $.ajax({
      url : "<?php echo base_url();?>hibahbansos/get_kegiatan",
      method : "POST",
      data : {id: id},
      async : false,
      dataType : 'json',
      success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
          html += '<option value="'+data[i].id_kegiatan+'">'+data[i].kegiatan+'</option>';
        }
        $('#kegiatan').html(html);

      }
    });
  });
</script>

<script type="text/javascript">
  $('#kegiatan').change(function(){
    var id=$(this).val();
    $.ajax({
      url : "<?php echo base_url();?>hibahbansos/get_sub_kegiatan",
      method : "POST",
      data : {id: id},
      async : false,
      dataType : 'json',
      success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
          html += '<option value="'+data[i].id_sub_keg+'">'+data[i].sub_kegiatan+'</option>';
        }
        $('#sub_kegiatan').html(html);

      }
    });
  });
</script>