<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-3 border text-center">
            <form action="<?= base_url('auth'); ?>" class="form mt-3 mb-3" method="post">
                <h5>Login</h5>
                <hr>
                <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>
                <div class="form-group">
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="password">
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
        <div class="col-6 border border-left-0 border-right-0 ">
            <h5 class="mt-3 text-center">Annoucement</h5>
            <hr>
            <div class="container border mb-3">
                <div class="media">

                    <div class="media-body">
                        <h5 class="mt-0">Media heading</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
            </div>
            <div class="container border mb-3">
                <div class="media">

                    <div class="media-body">
                        <h5 class="mt-0">Media heading</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 border ">
            <h5 class="mt-3 text-center">Available Courses</h5>
            <hr>
            <form class="form mb-3">
                <div class="form-group">
                    <input class="col-9" type="text" placeholder="Search Courses" width="40">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>

            <div class="row">
                <ul>
                    <li><a href="#">FT</a></li>
                    <li><a href="#">FE</a></li>
                    <li><a href="#">FIKP</a></li>
                    <li><a href="#">FKIP</a></li>
                    <li><a href="#">FISIP</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- / content -->