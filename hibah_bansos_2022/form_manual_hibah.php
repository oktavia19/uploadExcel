<div class="container-fluid">
        <!-- OVERVIEW -->
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Pengajuan Hibah</h3>
                <p class="panel-subtitle">form pengajuan hibah kepada Pemerintah Pusat</p>
                <br />
                <a class="btn btn-default" ><i class="lnr lnr-arrow-left-circle"></i></a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <input type="hidden" class="input-url" value="<?= base_url() ?>">
                    <div class="col-md-12">
                        <form action="<?= url('hibahbansos/simpan_hibah') ?>" method='POST'>
                            <input type="hidden" name="acc" value="manual" />
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Peruntukan</a></li>
                                <li role="presentation" ><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Kelengkapan 1</a></li>
                                <li role="presentation" ><a href="#kelengkapan2" aria-controls="profile" role="tab" data-toggle="tab">Kelengkapan 2</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row">
                                        <p class="alert alert-info">Data yang anda sampaikan adalah data yang benar</p>

                                        <div class="form-group col-md-6">
                                            <label>Jenis</label>
                                            <?= form_dropdown('peruntukan',array('uang'=>'Uang','barang'=>'Barang','jasa'=>'Jasa'),0,"class='form-control  perutukan'") ?>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Tahun Pengajuan</label>
                                            <?= form_dropdown('tahun_pengajuan',Factory::tahun('Belum Pernah',2010,date('Y')),0,"class='form-control'") ?>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Penerima (Kelompok / Organisasi)</label>
                                            <input type="text" class="form-control" name="penerima" id="penerima" required />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Pemimpin (Kelompok / Organisasi)</label>
                                            <input type="text" class="form-control" name="pimpinan" id="pimpinan" required />
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
                                            <label>Nomor BHI</label>
                                            <input type="text" class="form-control" name="bhi" id="bhi" required />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Nominal Pengajuan</label>
                                            <input type="number" class="form-control" name="nominal" required />
                                        </div>

                                        <div class="col-md-6 col-xs-10">
                                            <label>Rencana Penggunaan disertai Satuan</label>
                                            <textarea class="form-control" name="uraian_keg_satuan"></textarea>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" name="alamat" id="alamat" required />
                                        </div>


                                    </div><br><br>
                                    <a class="btn btn-warning next-btn" type="button" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Selanjutnya</a>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="profile">
                                    <div class="row">

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
                                            <label>Tahun Terakhir Menerima Bantuan</label>
                                            <?= form_dropdown('tahun_terakhir_menerima',Factory::tahun('Belum Pernah',2008,date('Y')),0,"class='form-control'") ?>
                                        </div>
                                    </div>
                                    <!-- <button class="btn btn-primary">Simpan</button> -->
                                    <a class="btn btn-warning next-btn" type="button" href="#kelengkapan2" aria-controls="profile" role="tab" data-toggle="tab">Selanjutnya</a>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="kelengkapan2">
                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label>Tanggal Surat Permohonan</label>
                                            <input type="text" class="form-control datepicker" name="tanggal_permohonan" id="tanggal_permohonan" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Nomor Surat Permohonan</label>
                                            <input type="text" class="form-control" name="nomor_permohonan" id="nomor_permohonan" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Nomor Penerbitan Rekomendasi</label>
                                            <input type="text" class="form-control" name="nomor_penerbitan_rekomendasi" id="nomor_penerbitan_rekomendasi" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Tanggal Penerbitan Rekomendasi</label>
                                            <input type="text" class="form-control datepicker" name="tanggal_penerbitan_rekomendasi" id="tanggal_penerbitan_rekomendasi" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Pejabat Penerbitan Rekomendasi</label>
                                            <input type="text" class="form-control" name="pejabat_penerbitan_rekomendasi" id="pejabat_penerbitan_rekomendasi" />
                                        </div>

                                        <div class="col-md-6 col-xs-10">
                                            <label>Disposisi Ketua TAPD</label>
                                            <textarea class="form-control" name="isi_disposisi_ketua_tapd"></textarea>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Tanggal Disposisi Bupati Tuban Pengajuan Proposal</label>
                                            <input type="text" class="form-control datepicker" name="tanggal_disposisi_bupati" id="tanggal_disposisi_bupati" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Tanggal Pertimbangan Ketua TAPD</label>
                                            <input type="text" class="form-control datepicker" name="tanggal_pertimbangan_ketua_tapd" id="tanggal_pertimbangan_ketua_tapd" />
                                        </div>

                                        
                                    </div>
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
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

