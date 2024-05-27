<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
//                    ['label' => 'Меню', 'options' => ['class' => 'header']],
//                    ['label' => 'Мой профиль', 'icon' => 'angle-right', 'url' => ['profile/view?id='.Yii::$app->user->id]],
//                    ['label' => 'Полезная информация', 'icon' => 'angle-right', 'url' => ['pages/index']],
//                    ['label' => 'Заявки', 'icon' => 'angle-right', 'url' => ['book/index']],

                    ['label' => 'Управление', 'options' => ['class' => 'header']],
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
//                    [
//                        'label' => 'Новости',
//                        'icon' => 'align-justify',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Добавить ', 'icon' => 'plus', 'url' => ['pages/create'],],
//                            ['label' => 'Все новости', 'icon' => 'circle-o', 'url' => ['pages/index'],],
//                        ],
//                    ],
//                    [
//                        'label' => 'Заявки',
//                        'icon' => 'angle-right',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Все заявки', 'icon' => 'file-code-o', 'url' => ['book/index-all'],],
//                            ['label' => 'В очереди', 'icon' => 'file-code-o', 'url' => ['book/new'],],
//                            ['label' => 'Обработанные', 'icon' => 'file-code-o', 'url' => ['book/completed'],],
//                        ],
//                    ],
//                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
//                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
//                        'label' => 'Some tools',
//                        'icon' => 'share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
