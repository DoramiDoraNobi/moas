<?php $this->load->view('layout/header'); ?>


<div class="container">
    <h2>Kelola Katering</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah Katering</button>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Nama Katering</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($katering as $k) { ?>
                <tr>
                    <td><?php echo $k->id_katering; ?></td>
                    <td><?php echo $k->username; ?></td>
                    <td><?php echo $k->password; ?></td>
                    <td><?php echo $k->nama_katering; ?></td>
                    <td><?php echo $k->email; ?></td>
                    <td><?php echo $k->nohp_katering; ?></td>
                    
                    <td>
                        <button type="button" class="btn btn-info btn-sm" onclick="editKatering(<?php echo $k->id_katering; ?>)">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteKatering(<?php echo $k->id_katering; ?>)">Delete</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Modal untuk form tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Katering</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('katering/create');?>" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password">
                    </div>
                    <div class="form-group">
                        <label for="nama_katering">Nama Katering</label>
                        <input type="text" class="form-control" name="nama_katering" placeholder="Masukkan nama katering">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan email">
                    </div>
                    <div class="form-group">
                        <label for="nohp_katering">No. Telepon</label>
                        <input type="text" class="form-control" name="nohp_katering" placeholder="Masukkan no. telepon">
                    </div>
                    <button type="submit" class="tn btn-primary">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk form edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Katering</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Masukkan username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan password">
                    </div>
                    <div class="form-group">
                        <label for="nama_katering">Nama Katering</label>
                        <input type="text" class="form-control" id="nama_katering" placeholder="Masukkan nama katering">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan email">
                    </div>
                    <div class="form-group">
                        <label for="nohp_katering">No. Telepon</label>
                        <input type="text" class="form-control" id="nohp_katering" placeholder="Masukkan no. telepon">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk konfirmasi delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Delete Katering</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus katering ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>

<script>
    $(document).ready(function() {
        $('#tambahModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Tambah Katering')
            modal.find('.modal-body input').val(recipient)
        })
    });

    $(document).ready(function() {
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Edit Katering')
            modal.find('.modal-body input').val(recipient)
        })
    });

    $(document).ready(function() {
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Konfirmasi Delete Katering')
            modal.find('.modal-body input').val(recipient)
        })
    });
</script>
