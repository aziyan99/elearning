<div class="container mt-5">
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow p-3 mb-5 bg-white rounded ">
        <div class="card-body">
            <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addmodal"><i class="fas fa-plus mr-2"></i> Add new lecturer</button>
            <table class="table table-hover shadow p-3 mb-5 bg-white rounded">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lecturer as $l) :
                        $i = 1;
                        ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $l['email']; ?></td>
                            <td><?= $l['name']; ?></td>
                            <td><?= $l['address']; ?></td>
                            <td><?= $l['phone_number']; ?></td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editmodal"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('lecturer/delete') ?>" onclick="return confirm('Hapus ?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- add modal -->

<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new courses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('lecture/add'); ?>" method="post" class="form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <textarea name="address" id="address" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" autocomplete="off">
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

<!-- /add modal -->

<!-- edit modal -->
<?php foreach ($lecturer as $l) :
    $i = 1;
    ?>
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Course details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('lecture/edit'); ?>" method="post" class="form">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" id="email" placeholder="email" autocomplete="off" value="<?= $l['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="name" autocomplete="off" value="<?= $l['name']; ?>">
                        </div>
                        <div class="form-group">
                            <textarea name="address" id="address" cols="30" rows="10" class="form-control"><?= $l['address']; ?>"</textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" autocomplete="off" value="<?= $l['phone_number']; ?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- /edit modal -->