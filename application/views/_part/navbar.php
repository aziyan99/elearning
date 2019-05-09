<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <h3>E - Learning</h3>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <?php
            $role = $this->session->userdata('role_id');
            $queryMenu = "  SELECT * 
                                FROM `user_menu` JOIN `user_access_menu` 
                                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                WHERE `user_access_menu`.`role_id` = $role 
                                ORDER BY `user_access_menu`.`menu_id` ASC
                ";

            $menu = $this->db->query($queryMenu)->result_array();

            ?>
            <?php foreach ($menu as $m) : ?>
                <?php if ($this->uri->segment(1) == $m['title']) : ?>
                    <li class="nav-item mr-4 active">
                    <?php else : ?>
                    <li class="nav-item mr-4">
                    <?php endif; ?>
                    <a class="nav-link" href="<?= base_url() . $m['url']; ?> "><?= $m['title']; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>