<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/sidebar') ?>
<?php $this->load->view('templates/topbar') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row" >
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Pengkajian dan Pelayanan Resep</h6>
                </div>
                <div class="card-body">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <a class='btn btn-danger mb-1 btn-sm' href='<?php echo site_url('pengkajian')?>' >Kembali</a>
                            <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Obat
                                </a>
                            </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <table class="table table-hover table-bordered table-sm" width="80%">
                                        <h3>Obat Pasien </h3>
                                        <thead class="thead-dark">
                                            <tr>
                                                <th width="3%">No</th>
                                                <th width="">Nama Obat</th>
                                                <th width="">Dosis</th>
                                                <th width="">Jumlah</th>
                                                <th width="">Satuan</th>
                                                <th width="">Signa</th>
                                            </tr>
                                        </thead>
                                        <?php $no = 1; foreach($data_obat as $obat){?>
                                            <tr>
                                                <td><?= $no;?></td>
                                                <td><?= $obat->name?></td>
                                                <td><?= $obat->dosis1?> x <?= $obat->dosis2?></td>
                                                <td><?= $obat->qty?></td>
                                                <td><?= $obat->unit?></td>
                                                <td><?= $obat->signa?></td>
                                            </tr>
                                        <?php $no++;}?>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <tr>
                                        <th width="15%">Tanggal</th>
                                        <td>: <?= $data_pasien->date?></td>
                                        <th width="15%">No MR</th>
                                        <td>: <?= $data_pasien->mr_number?></td>
                                    </tr>
                                    <tr>
                                        <th>Poli</th>
                                        <td>: <?= $data_pasien->clinic_name?></td>
                                        <th>Nama Pasien</th>
                                        <td>: <?= $data_pasien->patient_name?></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td colspan="3">: </td>
                                    </tr>
                                </table>
                            </div>
                            <center><h4>FORM PENGKAJIAN DAN PELAYANAN RESEP</h4></center>

                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <tr>
                                            <th class="text-center" width="30%">Indikator</th>
                                            <th class="text-center">Ya</th>
                                            <th class="text-center">Tidak</th>
                                            <th class="text-center">Keterangan</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Persyaratan Administrasi</th>
                                            <th colspan="3"></th>
                                        </tr>
                                        <tr>
                                            <td >Nama Dokter</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_dokter" id="cek_dokter1" value="1" checked>
                                                <label class="form-check-label" for="cek_dokter1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_dokter" id="cek_dokter2" value="0">
                                                <label class="form-check-label" for="cek_dokter2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_nama_dokter" ></td>
                                        </tr>
                                        <tr>
                                            <td >No SIP</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_no_sip" id="cek_no_sip1" value="1" checked>
                                                <label class="form-check-label" for="cek_no_sip1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_no_sip" id="cek_no_sip2" value="0">
                                                <label class="form-check-label" for="cek_no_sip2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_no_sip" ></td>
                                        </tr>
                                        <tr>
                                            <td >Alamat</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_alamat" id="cek_alamat1" value="1" checked>
                                                <label class="form-check-label" for="cek_alamat1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_alamat" id="cek_alamat2" value="0">
                                                <label class="form-check-label" for="cek_alamat2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_alamat" ></td>
                                        </tr>
                                        <tr>
                                            <td >Paraf Dokter</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_paraf" id="cek_paraf1" value="1" checked>
                                                <label class="form-check-label" for="cek_paraf1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_paraf" id="cek_paraf2" value="0">
                                                <label class="form-check-label" for="cek_paraf2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_paraf" ></td>
                                        </tr>
                                        <tr>
                                            <td >Tanggal Resep</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_tgl_resep" id="cek_tgl_resep1" value="1" checked>
                                                <label class="form-check-label" for="cek_tgl_resep1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_tgl_resep" id="cek_tgl_resep2" value="0">
                                                <label class="form-check-label" for="cek_tgl_resep2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_tgl_resep" ></td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Persyaratan Farmasetik</th>
                                            <th colspan="3"></th>
                                        </tr>
                                        <tr>
                                            <td >Nama Obat</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_nama_obat" id="cek_nama_obat1" value="1" checked>
                                                <label class="form-check-label" for="cek_nama_obat1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_nama_obat" id="cek_nama_obat2" value="0">
                                                <label class="form-check-label" for="cek_nama_obat2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_nama_obat" ></td>
                                        </tr>
                                        <tr>
                                            <td >Bentuk Sediaan</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_bentuk_sediaan" id="cek_bentuk_sediaan1" value="1" checked>
                                                <label class="form-check-label" for="cek_bentuk_sediaan1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_bentuk_sediaan" id="cek_bentuk_sediaan2" value="0">
                                                <label class="form-check-label" for="cek_bentuk_sediaan2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_bentuk_sediaan" ></td>
                                        </tr>
                                        <tr>
                                            <td >Dosis</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_dosis" id="cek_dosis1" value="1" checked>
                                                <label class="form-check-label" for="cek_dosis1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_dosis" id="cek_dosis2" value="0">
                                                <label class="form-check-label" for="cek_dosis2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_dosis" ></td>
                                        </tr>
                                        <tr>
                                            <td >Jumlah Obat</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_jml_obat" id="cek_jml_obat1" value="1" checked>
                                                <label class="form-check-label" for="cek_jml_obat1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_jml_obat" id="cek_jml_obat2" value="0">
                                                <label class="form-check-label" for="cek_jml_obat2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_jml_obat" ></td>
                                        </tr>
                                        <tr>
                                            <td >Aturan Pakai</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_aturan_pakai" id="cek_aturan_pakai1" value="1" checked>
                                                <label class="form-check-label" for="cek_aturan_pakai1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_aturan_pakai" id="cek_aturan_pakai2" value="0">
                                                <label class="form-check-label" for="cek_aturan_pakai2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_aturan_pakai" ></td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Pernyataan Klinis</th>
                                            <th colspan="3"></th>
                                        </tr>
                                        <tr>
                                            <td >Tepat Indikasi</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_tepat_indikasi" id="cek_tepat_indikasi1" value="1" checked>
                                                <label class="form-check-label" for="cek_tepat_indikasi1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_tepat_indikasi" id="cek_tepat_indikasi2" value="0">
                                                <label class="form-check-label" for="cek_tepat_indikasi2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_tepat_indikasi" ></td>
                                        </tr>
                                        <tr>
                                            <td >Tepat Dosis</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_tepat_dosis" id="cek_tepat_dosis1" value="1" checked>
                                                <label class="form-check-label" for="cek_tepat_dosis1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_tepat_dosis" id="cek_tepat_dosis2" value="0">
                                                <label class="form-check-label" for="cek_tepat_dosis2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_tepat_dosis" ></td>
                                        </tr>
                                        <tr>
                                            <td >Tepat Waktu Penggunaan</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_tepat_waktu" id="cek_tepat_waktu1" value="1" checked>
                                                <label class="form-check-label" for="cek_tepat_waktu1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_tepat_waktu" id="cek_tepat_waktu2" value="0">
                                                <label class="form-check-label" for="cek_tepat_waktu2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_tepat_waktu" ></td>
                                        </tr>
                                        <tr>
                                            <td >Duplikasi Pengobatan</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_duplikasi" id="cek_duplikasi1" value="1" checked>
                                                <label class="form-check-label" for="cek_duplikasi1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_duplikasi" id="cek_duplikasi2" value="0">
                                                <label class="form-check-label" for="cek_duplikasi2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_duplikasi" ></td>
                                        </tr>
                                        <tr>
                                            <td >Alergi</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_alergi" id="cek_alergi1" value="1" checked>
                                                <label class="form-check-label" for="cek_alergi1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_alergi" id="cek_alergi2" value="0">
                                                <label class="form-check-label" for="cek_alergi2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_alergi" ></td>
                                        </tr>
                                        <tr>
                                            <td >Kontra Indikasi</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_kontra" id="cek_kontra1" value="1" checked>
                                                <label class="form-check-label" for="cek_kontra1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_kontra" id="cek_kontra2" value="0">
                                                <label class="form-check-label" for="cek_kontra2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_kontra" ></td>
                                        </tr>
                                        <tr>
                                            <td >Interaksi Obat</td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_interaksi" id="cek_interaksi1" value="1" checked>
                                                <label class="form-check-label" for="cek_interaksi1">
                                                    Ya
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" name="cek_interaksi" id="cek_interaksi2" value="0">
                                                <label class="form-check-label" for="cek_interaksi2">
                                                    Tidak
                                                </label>
                                            </td>
                                            <td><input class="form-control" type="text" name="ket_interaksi" ></td>
                                        </tr>
                                        <tr>
                                            <td >Rekonsiliasi Obat : <br> Nama Obat & Kekuatan</td>
                                            <td colspan="2" class="text-center"><b>Aturan Pakai </b><br>
                                                <input class="form-control" type="text" name="aturan_pakai" >
                                            </td>
                                            <td class="text-center"><b> Tindak Lanjut </b><br> 
                                                <input class="form-control" type="text" name="tindak_lanjut" >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >Apoteker Penelaah Resep</td>
                                            <td colspan="3">
                                                <select class="form-control" name="apoteker_penelaah">
                                                    <?php foreach($apoteker as $data){?>
                                                        <option value="<?= $data->id?>"><?= $data->name_apoteker?></option>
                                                    <?php }?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >Apoteker Penyiapan Obat</td>
                                            <td colspan="3">
                                                <select class="form-control" name="apoteker_penyiapan">
                                                    <?php foreach($apoteker as $data){?>
                                                        <option value="<?= $data->id?>"><?= $data->name_apoteker?></option>
                                                    <?php }?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >Apoteker Pemeriksaan Obat</td>
                                            <td colspan="3">
                                                <select class="form-control" name="apoteker_pemeriksaan">
                                                    <?php foreach($apoteker as $data){?>
                                                        <option value="<?= $data->id?>"><?= $data->name_apoteker?></option>
                                                    <?php }?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >Apoteker Penyerahan dan Pemberian Informasi Obat</td>
                                            <td colspan="3">
                                                <select class="form-control" name="apoteker_penyerahan">
                                                    <?php foreach($apoteker as $data){?>
                                                        <option value="<?= $data->id?>"><?= $data->name_apoteker?></option>
                                                    <?php }?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >Penerima Obat dan Informasi Obat</td>
                                            <td colspan="3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <!-- canvas tanda tangan  -->
                                                        <div class="signature-pad" id="signature-pad">
                                                            <div class="m-signature-pad">
                                                                <div class="m-signature-pad-body">
                                                                <canvas width="625" height="318"></canvas>
                                                                </div>
                                                            </div>
                                                            <div class="m-signature-pad-footer">
                                                                <button type="button"  id="save2" data-action="save" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>        
                                                                <button type="button" data-action="clear"  class="btn btn-danger"><i class="fa fa-trash-o"></i> Clear</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10">
                                                                                            
                                        <a class='btn btn-danger' href='<?php echo site_url('pengkajian')?>' >Cancel</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer') ?>

<script type="text/javascript">
    var wrapper = document.getElementById("signature-pad"),
    clearButton = wrapper.querySelector("[data-action=clear]"),
    saveButton = wrapper.querySelector("[data-action=save]"),
    canvas = wrapper.querySelector("canvas"),
    signaturePad;

    function resizeCanvas() {
        var ratio =  window.devicePixelRatio || 1;
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
    }
    signaturePad = new SignaturePad(canvas);

    clearButton.addEventListener("click", function (event) {
        signaturePad.clear();
    });

    saveButton.addEventListener("click", function (event) {

        $.ajax({
            type: "POST",
            url: "<?php echo site_url();?>pengkajian/save",
            data: {
                'image': signaturePad.toDataURL(),
                'rowno':$('#rowno').val(),
                'cek_dokter':$("input[name='cek_dokter']:checked").val(),
                'ket_nama_dokter':$("input[name=ket_nama_dokter]").val(),
                'cek_no_sip':$("input[name='cek_no_sip']:checked").val(),
                'ket_no_sip':$("input[name=ket_no_sip]").val(),
                'cek_alamat':$("input[name='cek_alamat']:checked").val(),
                'ket_alamat':$("input[name=ket_alamat]").val(),
                'cek_paraf':$("input[name='cek_paraf']:checked").val(),
                'ket_paraf':$("input[name=ket_paraf]").val(),
                'cek_tgl_resep':$("input[name='cek_tgl_resep']:checked").val(),
                'ket_tgl_resep':$("input[name=ket_tgl_resep]").val(),
                'cek_nama_obat':$("input[name='cek_nama_obat']:checked").val(),
                'ket_nama_obat':$("input[name=ket_nama_obat]").val(),
                'cek_bentuk_sediaan':$("input[name='cek_bentuk_sediaan']:checked").val(),
                'ket_bentuk_sediaan':$("input[name=ket_bentuk_sediaan]").val(),
                'cek_dosis':$("input[name='cek_dosis']:checked").val(),
                'ket_dosis':$("input[name=ket_dosis]").val(),
                'cek_jml_obat':$("input[name='cek_jml_obat']:checked").val(),
                'ket_jml_obat':$("input[name=ket_jml_obat]").val(),
            },    
            success: function(datas1)
            {            

            }
        });
    
    }); 
            
</script>