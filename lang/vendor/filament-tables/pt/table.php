<?php

return [

    'column_toggle' => [

        'heading' => __('Colunas'),

    ],

    'columns' => [

        'text' => [
            'more_list_items' => __('e :count mais'),
        ],

    ],

    'fields' => [

        'bulk_select_page' => [
            'label' => __('Marcar/desmarcar todos os itens para ações em massa.'),
        ],

        'bulk_select_record' => [
            'label' => __('Marcar/desmarcar o item :key para ações em massa.'),
        ],

        'bulk_select_group' => [
            'label' => __('Marcar/desmarcar o grupo :key para ações em massa.'),
        ],

        'search' => [
            'label' => __('Procurar'),
            'placeholder' => __('Procurar'),
            'indicator' => __('Procurar'),
        ],

    ],

    'summary' => [

        'heading' => __('Resumo'),

        'subheadings' => [
            'all' => __('Todos :label'),
            'group' => __(':group resumo'),
            'page' => __('Esta página'),
        ],

        'summarizers' => [

            'average' => [
                'label' => __('Média'),
            ],

            'count' => [
                'label' => __('Contagem'),
            ],

            'sum' => [
                'label' => __('Soma'),
            ],

        ],

    ],

    'actions' => [

        'disable_reordering' => [
            'label' => __('Concluir a reordenação de registos'),
        ],

        'enable_reordering' => [
            'label' => __('Reordenar registos'),
        ],

        'filter' => [
            'label' => __('Filtrar'),
        ],

        'group' => [
            'label' => __('Agrupar'),
        ],

        'open_bulk_actions' => [
            'label' => __('Abrir ações'),
        ],

        'toggle_columns' => [
            'label' => __('Alternar colunas'),
        ],

    ],

    'empty' => [

        'heading' => __('Sem registos'),

        'description' => __('Crie um :model para começar.'),
    ],

    'filters' => [

        'actions' => [

            'remove' => [
                'label' => __('Remover filtro'),
            ],

            'remove_all' => [
                'label' => __('Remover todos os filtros'),
                'tooltip' => __('Remover todos os filtros'),
            ],

            'reset' => [
                'label' => __('Limpar filtros'),
            ],
        ],

        'heading' => __('Filtros'),

        'indicator' => __('Filtros ativos'),

        'multi_select' => [
            'placeholder' => __('Todos'),
        ],

        'select' => [
            'placeholder' => __('Todos'),
        ],

        'trashed' => [

            'label' => __('Registos excluídos'),

            'only_trashed' => __('Somente registos excluídos'),

            'with_trashed' => __('Mostrar registos excluídos'),

            'without_trashed' => __('Não mostrar registos excluídos'),

        ],

    ],

    'grouping' => [

        'fields' => [

            'group' => [
                'label' => __('Agrupar por'),
                'placeholder' => __('Agrupar por'),
            ],

            'direction' => [

                'label' => __('Direção do agrupamento'),

                'options' => [
                    'asc' => __('Ascendente'),
                    'desc' => __('Descendente'),
                ],

            ],

        ],
    ],

    'reorder_indicator' => __('Arraste e solte os registos na ordem.'),

    'selection_indicator' => [

        'selected_count' => __('1 registo selecionado|:count registos selecionados'),

        'actions' => [

            'select_all' => [
                'label' => __('Selecionar todos :count'),
            ],

            'deselect_all' => [
                'label' => __('Unmark all'),
            ],

        ],

    ],
    'sorting' => [

        'fields' => [

            'column' => [
                'label' => __('Ordenar por'),
            ],

            'direction' => [

                'label' => __('Direção de ordenação'),

                'options' => [
                    'asc' => __('Ascendente'),
                    'desc' => __('Descendente'),
                ],

            ],

        ],

    ],

];
