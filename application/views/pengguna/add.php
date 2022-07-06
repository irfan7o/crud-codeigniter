<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Pengguna</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('pengguna'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('id' => 'FrmAddPengguna', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
                    <div class="form-group row">
                        <label for="login" class="col-sm-2 col-form-label">ID User</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="login" name="login" value="<?= set_value('login'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('login') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pswd" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                            <input type="password" class="form-control" id="pswd" name="pswd" value="<?= set_value('pswd'); ?>">
                                <small class="text-danger">
                                    <?php echo form_error('pswd') ?>
                                </small>
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('email') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= set_value('deskripsi'); ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('deskripsi') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <!-- <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a> -->
                            <a class="btn btn-secondary sweet-1" onclick="swal({
                                title: 'Peringatan!',
                                text: 'Apakah proses tambah pengguna ingin dibatalkan?',
                                icon: 'warning',
                                dangerMode: true,
                                buttons: true,
                                })
                                .then((willDelete) => {
                                if (willDelete) {
                                    // window.location = 'index';
                                    javascript:history.back();
                                } else { }
                                });">
                                Batal
                            </a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>