<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jubarte - Prefeitura Municipal de Rio das Ostras - RJ</title>

    <!-- ESTILO LIMITLESS -->
    <link href="/cdn/Assets/fonts/material-icons/material-icons.css" rel="stylesheet">
    <link href="/cdn/Assets/fonts/roboto/roboto.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/core.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/components.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /ESTILO LIMITLESS -->

    <!-- JS CORE LIMITLESS -->
    <script type="text/javascript" src="/cdn/Vendor/limitless/material/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/limitless/material/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/limitless/material/js/plugins/notifications/jgrowl.min.js"></script>
    <!-- /JS CORE LIMITLESS -->

    <!-- DEPENDEICIAS JUBARTE -->
    <link href="/cdn/Assets/css/jubarteStyle.css" rel="stylesheet" type="text/css">

    <!-- DEPENDECIAS DA VIEW MODEL -->
    <script type="text/javascript" src="/cdn/utils/utils.js"></script>
    <script type="text/javascript" src="/cdn/utils/ModernBlockUI.js"></script>
    <script type="text/javascript" src="/cdn/utils/jubarte.js"></script>
    <script type="text/javascript" src="/cdn/utils/ModalAPI.js"></script>
    <script type="text/javascript" src="/cdn/utils/LoaderAPI.js"></script>
    <script type="text/javascript" src="/cdn/utils/RESTClient.js"></script>

    <!-- VIEW MODEL -->
    <script type="text/javascript" src="/ViewModel/Constants.js"></script>

    <script type="text/javascript">
        var YY = 2019;
        var MM = 4;
        var DD = 24;
        var HH = 23;
        var MI = 59;
        var SS = 59;

        function atualizaContador()
        {
            var hojeServidor = new Date('{{date}}');
            var hoje = new Date();
            //console.log(hoje.getFullYear()+' '+hojeServidor.getFullYear());
            //console.log(hoje.getDate()+' '+hojeServidor.getDate());

            var futuro = new Date(YY,MM-1,DD,HH,MI,SS);
            var ss = parseInt((futuro - hoje) / 1000);
            var mm = parseInt(ss / 60);
            var hh = parseInt(mm / 60);
            var dd = parseInt(hh / 24);
            ss = ss - (mm * 60);
            mm = mm - (hh * 60);
            hh = hh - (dd * 24);
            var faltam = '';
            faltam += (dd && dd > 1) ? dd+' dias, ' : (dd==1 ? '1 dia, ' : '');
            faltam += (toString(hh).length) ? hh+' hr, ' : '';
            faltam += (toString(mm).length) ? mm+' min e ' : '';
            faltam += ss+' seg';

            if (dd+hh+mm+ss > 0)
            {
                document.getElementById('contador').innerHTML = faltam;
                setTimeout(atualizaContador,1000);
            }
            else
            {
                document.getElementById('contador').innerHTML = 'CHEGOU!!!!';
                setTimeout(atualizaContador,1000);
            }
        }
    </script>

</head>
<body class="sidebar-detached-hidden" onLoad="atualizaContador()">

<div class="sidebar-xs has-detached-right">
    <!-- Main content -->
    <div class="containerInsideIframe">

        <!-- Page container -->
        <div class="page-container" style="padding-top: 50px;">
            <!-- Page content -->
            <div class="page-content">
                <!-- Main content -->
                <div class="content-wrapper">
                    <!-- Content area -->
                    <div class="content">
                        <!-- Error title -->
                        <div class="text-center content-group">
                            <h1 class="error-title offline-title" id="contador" style="font-size: 70px !important;">Atenção</h1>
                            <h1>Pré-cadastro estará disponível do dia 24/04/2019 até o dia 08/05/2019</h1>
                        </div>
                        <!-- /error title -->
                        <!-- Error content -->

                        <!-- /error wrapper -->
                    </div>
                    <!-- /content area -->
                </div>
                <!-- /main content -->
            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->
    </div>
</div>

</body>
</html>