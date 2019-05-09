<div class="container">
    <div class="col-md-12 mt-5">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="row mt-5">
        <div class="col-4">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <img class="card-img-top mb-2" src="<?= base_url('assets/images/avataaars-2.png') ?>" alt="Card image cap">
                <div class="card-body shadow p-3 mb-5 bg-white rounded">
                    <h4 class="header"><?= $name; ?></h4>
                    <p class="card-text"><?= $email; ?></p>
                </div>
            </div>
        </div>
        <div class="col-8 shadow p-3 mb-5 bg-white rounded">
            <div class="form-group">
                <label for="phone_number" class="badge badge-primary">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" placeholder="<?= $phone_number ?>" readonly>
            </div>
            <div class="form-group">
                <label for="address" class="badge badge-primary">Address</label>
                <textarea cols="30" rows="10" class="form-control" readonly><?= $address ?></textarea>
            </div>
            </form>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit"><i class="fas fa-edit"></i> Update Data</button>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit personal data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('profile/edit') ?>" method="post" class="form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Full name" value="<?= $name; ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="address" id="address" cols="30" rows="10" class="form-control"><?= $address; ?></textarea>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" id="phone_numer" name="phone_number" value="<?= $phone_number; ?>" placeholder="Phone Number">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--/ modal -->