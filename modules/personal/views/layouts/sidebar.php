<aside class="main-sidebar sidebar-light-green elevation-4">
    <a href="/site/index" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ПЕРСОНАЛ</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Отделы',
                        'icon' => 'building',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Добавить', 'icon' => 'plus', 'url' => ['departments/create'],],
                            ['label' => 'Все отделы', 'icon' => 'circle-o', 'url' => ['departments/index'],],
                        ],
                    ],
                    [
                        'label' => 'Сотрудники',
                        'icon' => 'address-card',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Добавить ', 'icon' => 'plus', 'url' => ['profile/create'],],
                            ['label' => 'Все сотрудники', 'icon' => 'circle-o', 'url' => ['profile/index'],],
                        ],
                    ],
                    [
                        'label' => 'Формы',
                        'icon' => 'list',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Добавить', 'icon' => 'plus', 'url' => ['forms/create'],],
                            ['label' => 'Все формы', 'icon' => 'circle-o', 'url' => ['forms/index'],],
                        ],
                    ],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>