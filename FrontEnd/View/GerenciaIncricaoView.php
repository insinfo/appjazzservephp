<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ciente - Jubarte - Prefeitura Municipal de Rio das Ostras - RJ</title>

    <!-- ESTILO LIMITLESS -->
    <link href="/cdn/Assets/fonts/material-icons/material-icons.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Assets/fonts/roboto/roboto.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/core.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/components.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/colors.css" rel="stylesheet" type="text/css">
    <!-- ESTILO LIMITLESS -->

    <!-- JS CORE LIMITLESS -->
    <script type="text/javascript" src="/cdn/Vendor/limitless/material/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/limitless/material/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript"
            src="/cdn/Vendor/limitless/material/js/plugins/forms/selects/bootstrap_multiselect.js"></script>

    <!-- /JS CORE LIMITLESS -->

    <script type="text/javascript"
            src="/cdn/Vendor/limitless/material/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/limitless/material/js/plugins/notifications/jgrowl.min.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/limitless/material/js/plugins/ui/ripple.min.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/bootstrap-select-1.12.4/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/bootstrap-select-1.12.4/defaults-pt_BR.min.js"></script>

    <!-- DEPENDEICIAS JUBARTE -->
    <link href="/cdn/Assets/css/jSwitch.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Assets/css/jubarteStyle.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Assets/css/modernDataTable.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Assets/css/ModernTreeView.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="/cdn/Vendor/moment/2.19.1/moment.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/moment/2.19.1/locale/pt-br.js"></script>

    <!-- DEPENDECIAS DA VIEW MODEL -->
    <script type="text/javascript" src="/cdn/utils/utils.js"></script>
    <script type="text/javascript" src="/cdn/utils/jubarte.js"></script>
    <script type="text/javascript" src="/cdn/utils/ModalAPI.js"></script>
    <script type="text/javascript" src="/cdn/utils/ModernBlockUI.js"></script>
    <script type="text/javascript" src="/cdn/utils/LoaderAPI.js"></script>
    <script type="text/javascript" src="/cdn/utils/RESTClient.js"></script>
    <script type="text/javascript" src="/cdn/utils/ModernDataTable.js"></script>
    <script type="text/javascript" src="/cdn/utils/ModernTreeView.js"></script>

    <!-- VIEW MODEL -->
    <script type="text/javascript" src="ViewModel/Constants.js"></script>
    <script type="text/javascript" src="ViewModel/GerenciaIncricaoViewModel.js"></script>

    <link href="Assets/css/style_cmdca.css" rel="stylesheet" type="text/css">
</head>
<body class="sidebar-detached-hidden">
<div class="sidebar-xs has-detached-right">
    <!-- Main content -->
    <div class="containerInsideIframe">
        <!-- Page container -->
        <div class="page-container">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main content -->
                <div class="content-wrapper">

                    <!-- Page header -->
                    <div class="customPageHeader">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-21">
                                <div class="row ">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                        <h4>
                                            <i class="icon-grid position-left"></i>
                                            <span class="text-semibold">Gerencia Incrição CMDCA</span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <ul class="breadcrumb">
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /page header -->

                    <!-- Content area -->
                    <div class="content">

                        <div class="panel panel-body no-padding">
                            <!-- form filtros -->
                            <div class="row p-20">
                                <div class="col-md-3 ">
                                    <label><span class="text-semibold">Pesquisar</span></label>
                                    <div class="has-feedback has-feedback-left">
                                        <input id="inputFiltroSearch" type="text" class="form-control"
                                               placeholder="digite algo a ser pesquisado..." value="">
                                        <div class="form-control-feedback">
                                            <i class="icon-search4 text-size-base text-muted"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <label><span class="text-semibold">Escolaridade</span></label>
                                    <select id="selectFiltroEscolaridade"
                                            name="selectFiltroEscolaridade"
                                            type="text"
                                            class="form-control select"
                                            required data-type="string">
                                        <option value="" selected>Selecione</option>
                                        <option value="Ensino Médio">Ensino Médio</option>
                                        <option value="Ensino Superior">Ensino Superior</option>
                                        <option value="Pós Graduação">Pós Graduação</option>
                                    </select>
                                </div>

                                <div class="col-md-2 ">
                                    <label><span class="text-semibold">Idade</span></label>
                                    <select id="selectFiltroIdade" name="selectFiltroIdade"
                                            type="text"
                                            class="form-control select"
                                            required data-type="string">
                                        <option value="" selected>Selecione</option>
                                        <option value="1998-01-01">a partir de 21 anos</option>
                                    </select>
                                </div>

                                <div class="col-md-2 ">
                                    <label><span class="text-semibold">Estado Civil</span></label>
                                    <select id="selectFiltroEstadoCivil" name="selectFiltroEstadoCivil"
                                            class="form-control select" required=""
                                            data-type="string">
                                        <option value="null">Selecione</option>
                                        <option value="Solteiro(a)">Solteiro(a)</option>
                                        <option value="União Estável">União Estável</option>
                                        <option value="Casado(a)">Casado(a)</option>
                                        <option value="Divorciado(a)">Divorciado(a)</option>
                                        <option value="Viúvo(a)">Viúvo(a)</option>
                                        <option value="Outros">Outros</option>
                                    </select>
                                </div>

                                <div class="col-md-2 ">
                                    <div class="form-group mb-5">
                                        <label>
                                            <span class="text-semibold"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-3  text-right">
                                    <div class="form-group mb-5">
                                        <button id="btnBuscar" class="btn bg-orange btn-icon legitRipple"
                                                title="Buscar">
                                            <i class="icon-search4"></i>
                                        </button>
                                        <button id="btnLimparFiltro" class="btn bg-default btn-icon legitRipple"
                                                title="Limpar filtros">
                                            <i class="icon-trash"></i>
                                        </button>
                                        <button id="btnReload" class="btn bg-default btn-icon legitRipple"
                                                title="Recarregar">
                                            <i class="icon-reload-alt"></i>
                                        </button>
                                        <button id="btnImprimir" class="btn bg-default btn-icon legitRipple"
                                                title="Imprimir">
                                            <i class="icon-printer"></i>
                                        </button>
                                        <button id="btnDownload" class="btn bg-default btn-icon legitRipple"
                                                title="Baixar como XLSX">
                                            <i class="icon-file-excel"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>

                            <!-- /form filtros -->

                            <!-- tabela lista solicitações -->
                            <div class="modernDataTable" style="display: block;width: 100%;overflow-y: scroll">
                                <table id="tableListFichas" class="tableFixPadding"
                                >
                                    <thead>
                                    <tr>
                                        <th>Escolaridade</th>
                                        <th>CPF</th>
                                        <th>Nome</th>
                                        <th>Nasc.</th>
                                        <th>Est. Civil</th>
                                        <th>Tel.</th>
                                        <th>Apelido</th>
                                        <th>Identidade</th>
                                        <th>Bairro</th>

                                        <th>Municipio</th>
                                        <th>Deferido</th>
                                        <th>Deficiência</th>
                                        <th>Recursos Deficiente</th>

                                    </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>

                    </div>
                    <!-- /content area -->

                </div>
                <!-- /main content -->


            </div>
            <!-- /page content -->

            <!-- Footer -->
            <div class="footer text-muted"></div>
            <!-- /footer -->

        </div>
        <!-- /page container -->
    </div>
</div>


<!-- modal detalhe -->
<div id="modalDetalhe" class="modal fade" tabindex="-1">
    <div class="modal-dialog-full">
        <div class="modal-content-full">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Detalhe</h6>
            </div>
            <div class="modal-body">
                <!-- corpo modal  -->

                <div class="row">
                    <div class="col-md-12">

                        <div class="panel-heading">
                            <h4 class="panel-title">Informações Pessoais</h4>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 inputBlock">
                                            <label>CPF</label>
                                            <span id="cpf" class="form-control"></span>
                                        </div>
                                        <div class="col-md-5 inputBlock">
                                            <label>Nome Completo</label>
                                            <span id="nome" class="form-control"></span>
                                        </div>
                                        <div class="col-md-2 inputBlock">
                                            <label>Data de Nascimento</label>
                                            <span id="dataNascimento" class="form-control"></span>
                                        </div>
                                        <div class="col-md-2 inputBlock">
                                            <label>Escolaridade</label>
                                            <span id="escolaridade" class="form-control"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 inputBlock">
                                            <label>Estado Civil</label>
                                            <span id="estadoCivil" class="form-control">
                                                    </span>
                                        </div>
                                        <div class="col-md-5 inputBlock">
                                            <label>E-mail</label>
                                            <span id="email" class="form-control"></span>
                                        </div>
                                        <div class="col-md-2 inputBlock">
                                            <label>Tipo</label>
                                            <span id="tipoTelefone" class="form-control">

                                                    </span>
                                        </div>
                                        <div class="col-md-2 inputBlock">
                                            <label>Telefone</label>
                                            <span id="telefone" class="form-control"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 inputBlock">
                                            <label>Apelido</label>
                                            <span id="apelido" class="form-control"></span>
                                        </div>
                                        <div class="col-md-3 inputBlock">
                                            <label>Identidade</label>
                                            <span id="identidade" class="form-control">   </span>
                                        </div>
                                        <div class="col-md-3 inputBlock">
                                            <label>Orgão Expedidor</label>
                                            <span id="orgaoExpedidorRG" class="form-control">   </span>
                                        </div>
                                        <div class="col-md-3 inputBlock">
                                            <label>Data de Emissão</label>
                                            <span id="dataEmissaoRg" class="form-control">   </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel-heading">
                            <h4 class="panel-title">Endereço</h4>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 inputBlock">
                                    <label>Tipo de Endereço</label>
                                    <span id="tipoEndereco" class="form-control">
                                                </span>
                                </div>
                                <div class="col-md-3 inputBlock">
                                    <label>CEP</label>
                                    <span id="cep" class="form-control"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 inputBlock">
                                    <label>País</label>
                                    <span id="pais" class="form-control"> </span>
                                </div>
                                <div class="col-md-4 inputBlock">
                                    <label>Estado</label>
                                    <span id="estado" class="form-control"> </span>
                                </div>
                                <div class="col-md-4 inputBlock">
                                    <label>Municipio</label>
                                    <span id="municipio" class="form-control"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 inputBlock">
                                    <label>Tipo de Logradouro</label>
                                    <span id="tipoLogradouro" class="form-control">
                                    </span>
                                </div>
                                <div class="col-md-6 inputBlock">
                                    <label>Logradouro</label>
                                    <span id="logradouro" class="form-control"></span>
                                </div>
                                <div class="col-md-3 inputBlock">
                                    <label>Número</label>
                                    <span id="numero" class="form-control"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 inputBlock">
                                    <label>Bairro</label>
                                    <span id="bairro" class="form-control"></span>
                                </div>
                                <div class="col-md-6 inputBlock">
                                    <label>Complemento</label>
                                    <span id="complemento" class="form-control"></span>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <br>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h4 class="panel-title">Questionário</h4>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 inputBlock">
                                        Tendo em vista minha <label>deficiencia</label> abaixo:
                                        <span id="deficiencia" class="form-control"></span>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 inputBlock">
                                        Solicito que sejam disponibilizados os seguintes <label>recursos</label> materiais/humanos
                                        para que eu possa responder a prova de conhecimentos:
                                        <span id="recursosParaDeficiente" class="form-control"></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <h4>Experiência de Atuação</h4>
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 " style="display: block;overflow-x: auto;">
                                        <table class="tableFormExperiencia">
                                            <thead>
                                            <tr>
                                                <th>Tomador Serviço</th>
                                                <th>Atividade</th>
                                                <th>Data Inicio</th>
                                                <th>Data Fim</th>
                                                <th title="Contato Tomador ">Contato Tomador</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td data-identity="tomador"></td>
                                                <td data-identity="atividade"></td>
                                                <td data-identity="dataInicio"></td>
                                                <td data-identity="dataFim"></td>
                                                <td data-identity="contato"></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                        <br>
                                    </div>
                                </div>

                                <br>
                                <br> <br> <br> <br>

                            </div>
                        </div>

                    </div>
                    <!-- /corpo modal  -->
                </div>
            </div>
        </div>
        <!-- /modal detalhe -->
    </div>
</div>

<!-- deferir -->
<div id="modalDeferir" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Deferir/Indeferir</h6>
            </div>
            <div class="modal-body">
                <!-- corpo modal  -->
                <div class="row">
                    <div class="col-md-12">
                        <label>Justificativa do Indeferimento</label>
                        <textarea id="justificativaIndeferimento" type="text" class="form-control"
                                  placeholder="Justificativa do Indeferimento..."></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="jSwitch">
                            <label>
                                Indeferir
                                <input type="checkbox" id="checkDeferirIndeferir" checked>
                                <span class="jThumb jThumbColor"></span>
                                Deferir
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button id="btnSalveDeferimento" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>