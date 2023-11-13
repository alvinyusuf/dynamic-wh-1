<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid mt-3 mr-3" style="max-width:100%;font-size:15px;">
    <div class="card">
        <div class="card-body">
            <h1><?= $tittle ?></h1>

            <form method="post" action="#" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="col-8">
                            <input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" />
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" type="submit" style="display: inline-block;">Upload</button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>
                            |
                            <a href='#' class="btn btn-success">Export Excel</a>
                        </div>
                    </div>
                </div>
            </form>

            <div class="form-group">
                <div class="row">
                    <div class=" col" style="text-align: right;">

                        <!-- Modal -->
                        <form id="form-add" action="<?= base_url('rakController/create') ?>" method="post">
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <label for="kode_rak" class="col-sm-3 col-form-label">Kode RAK</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="kode_rak" name="kode_rak" placeholder="Masukkan Kode RAK" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="jenis_rak" class="col-sm-3 col-form-label">Jenis RAK</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="jenis_rak" name="jenis_rak" placeholder="Masukkan Jenis Rak" required>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="keterangan" name="keterangan" required>
                                                        <option value="Kecil">Kecil</option>
                                                        <option value="Besar">Besar</option>
                                                        <option value="Over Area">Over Area</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-2 mb-3">
        <div class="card-body">

            <table id="table_id" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode RAK</th>
                        <th>Jenis RAK</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                </thead>
                <tbody id="contactTable">
                    <?php
                    $i = 1;
                    if (!empty($masterRak)) {
                        foreach ($masterRak as $rak) {
                    ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $rak['kode_rak'] ?></td>
                                <td><?= $rak['jenis_rak'] ?></td>
                                <td><?= $rak['keterangan'] ?></td>
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalUpdate<?php echo $i; ?>">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $i; ?>">
                                        Delete
                                    </button>
                                </td>
                                <!-- Modal Edit -->
                                <div class=" modal fade" id="ModalUpdate<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form-update" action="<?= base_url(); ?>rakController/updateRak/<?= $rak['idRak'] ?>" method="POST">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kode Rak</label>
                                                        <input type="text" name="kode_rak" class="form-control" value="<?= $rak['kode_rak']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jenis Rak</label>
                                                        <input type="text" name="jenis_rak" class="form-control" value="<?= $rak['jenis_rak']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Keterangan</label>
                                                        <select class="form-select" id="keterangan" name="keterangan">
                                                            <?php
                                                            $ket = ["Kecil", "Besar", "Over Area"];
                                                            $selected = $rak['keterangan'];
                                                            foreach ($ket as $k) {
                                                                $option = '<option value="' . $k . '"';
                                                                if ($selected == $k) {
                                                                    $option .= ' selected';
                                                                }
                                                                $option .= '>' . $k . '</option>';
                                                                echo $option;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-warning">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Edit -->
                                <!-- Modal Delete -->
                                <div class=" modal fade" id="ModalDelete<?php echo $i; ?>" data-modal-id="<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Delete Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url(); ?>rakController/delete/<?= $rak['idRak'] ?>" method="POST" id="form-delete">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kode Rak</label>
                                                        <input type="text" name="kode_rak" class="form-control" value="<?= $rak['kode_rak']; ?>" required readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jenis Rak</label>
                                                        <input type="text" name="jenis_rak" class="form-control" value="<?= $rak['jenis_rak']; ?>" required readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Keterangan</label>
                                                        <input type="text" name="keterangan" class="form-control" value="<?= $rak['keterangan']; ?>" required readonly>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-danger" value="Delete">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal End Delete -->
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td style="text-align: center;" colspan="5">Tidak ada data</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).on('submit', '#form-add', function(e) {
        e.preventDefault();

        // Use single quotes to wrap the URL in JavaScript
        let url = '<?= base_url('rakController/create') ?>';

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    console.log(response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        // Redirect to the desired URL
                        window.location.href = '<?= base_url('master_rak') ?>';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Rak gagal dibuat!',
                        text: response.message,
                    });
                }
            }
        });
    });
    $(document).on('submit', '#form-update', function(e) {
        e.preventDefault();

        var form = $(this); // Store the form element reference
        var modalId = form.closest('.modal').data('modal-id'); // Retrieve the modal ID
        // Hide the modal after success
        $('#ModalUpdate' + modalId).modal('hide');

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            dataType: 'json',
            data: form.serialize(),
            success: function(response) {
                if (response.success) {
                    console.log(response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500,
                    }).then(function() {
                        window.location.href = "<?= base_url('master_rak'); ?>";
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Update Failed',
                        text: response.message,
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while updating the data.',
                });
            }
        });
    });
    $(document).on('submit', '#form-delete', function(e) {
        e.preventDefault();

        var form = $(this); // Store the form element reference
        var modalId = form.closest('.modal').data('modal-id'); // Retrieve the modal ID
        // Hide the modal after success
        $('#ModalDelete' + modalId).modal('hide');

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            dataType: 'json',
            data: form.serialize(),
            success: function(response) {
                if (response.success) {
                    console.log(response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500,
                    }).then(function() {
                        window.location.href = "<?= base_url('master_rak'); ?>";
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Update Failed',
                        text: response.message,
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while updating the data.',
                });
            }
        });
    });
</script>
<?= $this->endSection(); ?>