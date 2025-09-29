{{-- <!DOCTYPE html>
<html lang="pt">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ env('APP_NAME') }} @isset($pageTitle)
- {{ $pageTitle }}
@endisset
</title>
<link rel="icon" href="{{ asset('assets/images/favicon.png" type="image/png') }}">
<link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>

<x-user-bar />

<div class="d-flex pt-2">

<x-side-bar />

{{ $slot }}

</div>

<script src="{{ asset('assets/datatables/jquery.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html> --}}

<!doctype html>
<html lang="en" data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" dir="ltr"
    data-pc-theme="light">

<head>
    <title>Avigest</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ env('APP_NAME') }} @isset($pageTitle)
            - {{ $pageTitle }}
        @endisset
    </title>
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/phosphor/duotone/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" />

</head>

<body>

    <x-preloader />

    <x-side-bar />

    <x-top-bar />

    <div class="pc-container">

        <div class="pc-content">

            {{ $slot }}

        </div>

    </div>

    <x-footer />

    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/icon/custom-icon.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/component.js') }}"></script>

    <!-- Bootstrap JS (com Popper) -->
    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- jQuery (obrigatório para DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <div class="floting-button fixed bottom-[50px] right-[30px] z-[1030]"></div>

    <script>
        layout_change('false');
    </script>

    <script>
        layout_theme_sidebar_change('dark');
    </script>

    <script>
        change_box_container('false');
    </script>

    <script>
        layout_caption_change('true');
    </script>

    <script>
        layout_rtl_change('false');
    </script>

    <script>
        preset_change('preset-1');
    </script>

    <script>
        main_layout_change('vertical');
    </script>

    <script>
        $(document).ready(function() {
            $('table[id="table"]').each(function() {
                let order = $(this).data('order') || [
                    [0, 'asc']
                ]; // Padrão: primeira coluna ascendente
                $(this).DataTable({
                    pageLength: 5,
                    lengthMenu: [5, 10, 25, 50, 100], // opções que o usuário pode escolher
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json'
                    },
                    order: order
                });
            });
        });
    </script>

</body>

</html>
