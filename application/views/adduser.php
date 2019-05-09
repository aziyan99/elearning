<div class="container mt-5">
    <div class="row">
        <div class="col-md">
            <?= $this->session->flashdata('message'); ?>
            <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <form class="form" action="<?= base_url('umum/saveuser'); ?>" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="email" id="email" placeholder="email">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="password" id="password" placeholder="password">
                </div>
                <div class="form-group">
                    <select name="role_id" id="role_id" class="form-control">
                        <option value="1">Admin</option>
                        <option value="2">Dosen</option>
                        <option value="3">Mahasiswa</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>