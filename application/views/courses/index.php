<div class="container mt-5">
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow p-3 mb-5 bg-white rounded ">
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addmodal"><i class="fas fa-plus mr-2"></i> Add new course</button>
            <table class="table table-hover shadow p-3 mb-5 bg-white rounded">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Lecturer Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($course as $c) :
                        ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $c['name']; ?></td>
                            <td><?= $c['lecturer_name']; ?></td>
                            <td><?= $c['description']; ?></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editmodal<?= $c['id']; ?>"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('courses/delete/') . $c['id']; ?>" onclick="return confirm('Hapus ?');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;  ?>
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
                <form action="<?= base_url('courses/add') ?>" method="post" class="form">
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Course Name" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="lecturer_name" id="lecturer_name" class="form-control" placeholder="Lecturer Name" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
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
<?php foreach ($course as $c) : ?>
    <div class="modal fade" id="editmodal<?= $c['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Course details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('courses/edit') ?>" method="post" class="form">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="<?= $c['id']; ?>">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Course Name" value="<?= $c['name']; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" name="lecturer_name" id="lecturer_name" class="form-control" placeholder="Lecturer Name" value="<?= $c['lecturer_name']; ?>">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?= $c['description']; ?></textarea>
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
<?php endforeach; ?>
<!-- /edit modal -->