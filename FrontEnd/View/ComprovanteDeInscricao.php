<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Jubarte - Prefeitura Municipal de Rio das Ostras - RJ
    </title>

    <!-- ESTILO LIMITLESS -->
    <link href="/cdn/Assets/fonts/material-icons/material-icons.css" rel="stylesheet">
    <link href="/cdn/Assets/fonts/roboto/roboto.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/core.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/components.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /ESTILO LIMITLESS -->

    <!-- JS CORE LIMITLESS -->
    <script type="text/javascript" src="/cdn/Vendor/limitless/material/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/limitless/material/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript"
            src="/cdn/Vendor/limitless/material/js/core/libraries/jasny_bootstrap.min.js"></script>

    <script type="text/javascript"
            src="/cdn/Vendor/limitless/material/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript"
            src="/cdn/Vendor/limitless/material/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/limitless/material/js/plugins/forms/styling/switch.min.js"></script>
    <script type="text/javascript"
            src="/cdn/Vendor/limitless/material/js/plugins/forms/selects/select2.min.js"></script>

    <!-- PERFECT-SCROLLBAR -->
    <link href="/cdn/Vendor/perfect-scrollbar-1.3.0/perfect-scrollbar.css" rel="stylesheet" type="text/css">

    <!-- DEPENDEICIAS JUBARTE -->
    <link href="/cdn/Assets/css/jubarteStyle.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Assets/css/modernDataTable.css" rel="stylesheet" type="text/css"/>

    <style>

        @media print {
            .no-print, .no-print * {
                display: none !important;
            }
        }

    </style>

</head>
<body class="sidebar-detached-hidden">

<div class="sidebar-xs has-detached-right">
    <!-- Main content -->
    <div class="containerInsideIframe">
        <!-- Page container -->
        <div class="page-container">
            <!-- Page content -->
            <div class="page-content">
                <!-- Content area -->
                <div class="content">
                    <div class="row">
                        <div class="col-md-12" style="text-align: center; font-size: 2em">


                            <h1>
                                <strong>
                                    Pré-cadastro Eleição do Conselho Tutelar
                                </strong>
                            </h1>


                            <br/>


                            <h1>
                                Inscrição realizada com sucesso!
                            </h1>


                            <p>
                                {{ nome }}
                            </p>

                            <p>
                                <br/>
                            </p>

                            <p>
                                Seu número de inscrição é:
                                <strong style="display: block; padding: 4px; background-color: #eee;">
                                    {{ numero }}
                                </strong>
                            </p>

                            <p><br/></p>

                            <p>
                                <button  onclick="window.print()" class="no-print btn btn-primary">
                                    imprimir
                                </button>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /page container -->
        </div>
    </div>
</div>

</body>
</html>