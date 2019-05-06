$(document).ready(function () {
    var viewModel = new GerenciaIncricaoView();
    viewModel.init();
});

function GerenciaIncricaoView() {

    this.restClient = new RESTClient();
    this.loaderApi = new LoaderAPI();
    this.modalApi = new ModalAPI();
    this.webserviceBaseURL = WEBSERVICE_MINHACASA_BASE_URL;
    this.webservicePmroBaseURL = WEBSERVICE_PMRO_BASE_URL;
    this.webserviceJubarteBaseURL = WEBSERVICE_JUBARTE_BASE_URL;

    // lista
    this.tableListFichas = $('#tableListFichas');
    this.dataTableListFichas = new ModernDataTable('tableListFichas');

    this.inputFiltroSearch = $('#inputFiltroSearch');
    this.selectFiltroEstadoCivil = $('#selectFiltroEstadoCivil');
    this.selectFiltroIdade = $('#selectFiltroIdade');
    this.selectFiltroEscolaridade = $('#selectFiltroEscolaridade');

    this.btnLimparFiltro = $('#btnLimparFiltro');

    this.btnReload = $('#btnReload');
    this.btnBuscar = $('#btnBuscar');
    this.btnImprimir = $('#btnImprimir');
    this.btnDownload = $('#btnDownload');

    this.filtroRendaArray = [];
    this.filtroTempoServicoArray = [];

    //modal de detalhe
    this.modalDetalhe = $('#modalDetalhe');

    this.modalDeferir = $('#modalDeferir');

    this.justificativaIndeferimento = $('#justificativaIndeferimento');
    this.checkDeferirIndeferir = $('#checkDeferirIndeferir');
    this.body = $('body');
    this.idTemSelecionado = null;
    this.btnSalveDeferimento = $('#btnSalveDeferimento');
}

GerenciaIncricaoView.prototype.init = function () {
    var self = this;
    self.events();
    self.getAllFichas();
    // Default initialization
    /* $('.multiselect-select-all-filtering').multiselect({
         includeSelectAllOption: false,
         enableCaseInsensitiveFiltering: true,
         enableFiltering: true,
         selectAllText: 'Tudo',
         allSelectedText: "Selecionado tudo",
         nonSelectedText: "Selecione",
         templates: {
             filter: '<li class="multiselect-item multiselect-filter"><i class="icon-search4"></i> <input class="form-control" type="text"></li>'
         },
         onSelectAll: function () {
             $.uniform.update();
         },
         onChange: function (option, checked, select) {
             // var selected = this.$select.val();
             var selec = option.closest('select');
             var options = selec.find('option:selected');

             if (selec.attr('id') === self.selectFiltroRenda.attr('id')) {
                 emptyArray(self.filtroRendaArray);
                 options.each(function (index, item) {
                     self.filtroRendaArray.push($(this).val());
                 });
             }

             if (selec.attr('id') === self.selectFiltroTempoServico.attr('id')) {
                 emptyArray(self.filtroTempoServicoArray);
                 options.each(function (index, item) {
                     self.filtroTempoServicoArray.push($(this).val());
                 });
             }
         }
     });
     $(".multiselect-container input").uniform({radioClass: 'choice'});*/

};
GerenciaIncricaoView.prototype.updateFields = function () {
    var self = this;
    var selects = $('.select');
    //selects.selectpicker('refresh');
    //selects.select2('refresh');
    self.maskForm();
};
GerenciaIncricaoView.prototype.getAllFichas = function () {
    var self = this;

    var columnsConfiguration = [
        {"key": "escolaridade"},
        {"key": "cpf", "type": "cpf"},
        {"key": "nome"},
        {"key": "dataNascimento", "type": "date"},
        {"key": "estadoCivil"},
        {"key": "telefone"},
        {"key": "apelido"},
        {"key": "identidade"},
        {"key": "bairro"},
        {"key": "municipio"},
        {
            "key": "isDeferido", "render": function (row, item) {
                var text = row['isDeferido'] ? 'Sim' : 'Não';
                //if (row['isDeferido'] == null) {
                    var cor = row['isDeferido'] ? 'btn-success' : 'btn-danger';
                    return '<button class="btnDeferir btn btn-primary">'+text+'</button>';
               /* } else {
                    return text;
                }*/
            }
        },
        {"key": "deficiencia"},
        {"key": "recursosParaDeficiente"}
    ];

    var dataToSender = {
        'search': ''
    };

    self.dataTableListFichas.hideTableHeader();
    self.dataTableListFichas.setDisplayCols(columnsConfiguration);
    self.dataTableListFichas.hideActionBtnDelete();
    self.dataTableListFichas.hideRowSelectionCheckBox();
    self.dataTableListFichas.setIsColsEditable(false);
    self.dataTableListFichas.setDataToSender(dataToSender);
    self.dataTableListFichas.setSourceURL(self.webserviceBaseURL + "inscricao");
    self.dataTableListFichas.setSourceMethodPOST();
    self.dataTableListFichas.load();
};
GerenciaIncricaoView.prototype.reloadDatatable = function () {
    var self = this;

    var dataToSender = {
        'search': self.inputFiltroSearch.val(),
        'estadoCivil': self.selectFiltroEstadoCivil.val(),
        'idade': self.selectFiltroIdade.val(),
        'escolaridade': self.selectFiltroEscolaridade.val()
    };

    //console.log(JSON.stringify(dataToSender));

    self.dataTableListFichas.setDataToSender(dataToSender);
    self.dataTableListFichas.load();
};
GerenciaIncricaoView.prototype.events = function () {
    var self = this;

    self.btnReload.click(function () {
        self.reloadDatatable();
    });
    self.btnBuscar.click(function () {
        self.reloadDatatable();
    });
    self.inputFiltroSearch.on('keypress', function (e) {
        if (e.which === 13) {
            self.reloadDatatable();
        }
    });
    self.dataTableListFichas.setOnClick(function (data) {
        self.fillDetalheModal(data);
        self.modalDetalhe.modal('show');
    });

    self.btnImprimir.click(function () {
        self.dataTableListFichas.printTable();
    });
    self.btnDownload.click(function () {
        self.dataTableListFichas.exportToXLS();
    });

    //
    self.body.on('click', '.btnDeferir', function () {
        var idx = $(this).closest('tr').attr('data-index');
        var data = self.dataTableListFichas.getData()[idx];
        self.idTemSelecionado = data['id'];
        if (data['isDeferido'] !== null) {
            self.justificativaIndeferimento.val(data['motivoDeferido']);
            self.checkDeferirIndeferir.prop("checked", data['isDeferido']);
        }

        self.modalDeferir.modal('show');
    });

    self.btnSalveDeferimento.click(function () {
        self.saveDeferimento();
    });

    self.btnLimparFiltro.click(function () {
        self.resetFiltros();
        self.reloadDatatable();
    });

    self.selectFiltroEstadoCivil.change(function () {
        self.reloadDatatable();
    });
    self.selectFiltroIdade.change(function () {
        self.reloadDatatable();
    });
    self.selectFiltroEscolaridade.change(function () {
        self.reloadDatatable();
    });
};
GerenciaIncricaoView.prototype.resetFiltros = function () {
    var self = this;


};
//abilita e configura o comportamento do checkbox para 3 estados
GerenciaIncricaoView.prototype.checkboxBehavior = function (checkbox) {
    var self = this;
    checkbox = $(checkbox);
    if (checkbox.val() === 'null') {
        checkbox.val('true');
    } else if (checkbox.val() === 'true') {
        checkbox.val('false');
    } else if (checkbox.val() === 'false') {
        checkbox.val('true');
    }

    self.reloadDatatable();
};
GerenciaIncricaoView.prototype.fillDetalheModal = function (data) {
    var self = this;

    self.modalDetalhe.find('span').each(function (idx, ele) {
        var span = $(ele);
        var id = span.attr('id');//
        var value = data[id];
        value = value === true ? 'Sim' : value;
        value = value === false ? 'Não' : value;
        value = id === 'dataNascimento' ? sqlDateToBrasilDate(value) : value;
        span.text(value);
    });

    var templateTr = $('<tr>' +
        '<td data-identity="tomador" ></td>' +
        '<td data-identity="atividade" ></td>' +
        '<td data-identity="dataInicio"></td>' +
        '<td data-identity="dataFim" ></td>' +
        '<td data-identity="contato" ></td>' +
        '</tr>');

    var htmlTable = '';
    if (data['esperiencias']) {
        data['esperiencias'].forEach(function (item, idx) {
            templateTr.find('[data-identity="tomador"]').text(item['tomador']);
            templateTr.find('[data-identity="atividade"]').text(item['atividade']);
            templateTr.find('[data-identity="dataInicio"]').text(item['dataInicio']);
            templateTr.find('[data-identity="dataFim"]').text(item['dataFim']);
            templateTr.find('[data-identity="contato"]').text(item['contato']);
            htmlTable += templateTr[0].outerHTML;
        });
    }

    var tableExperienciabody = $('.tableFormExperiencia').find('tbody');
    tableExperienciabody.empty();

    tableExperienciabody.append(htmlTable);
};
GerenciaIncricaoView.prototype.saveDeferimento = function () {
    var self = this;

    var dataToSend = {
        "id": self.idTemSelecionado,
        "motivoDeferido": self.justificativaIndeferimento.val(),
        "isDeferido": self.checkDeferirIndeferir.is(":checked")
    };

    console.log(dataToSend);

    self.loaderApi.show();
    self.restClient.setDataToSender(dataToSend);
    self.restClient.setWebServiceURL(self.webserviceBaseURL + 'inscricao/deferir/' + self.idTemSelecionado);
    self.restClient.setMethodPUT();
    self.restClient.setSuccessCallbackFunction(function (data) {
        self.loaderApi.hide();
        self.modalDeferir.modal('hide');
        self.reloadDatatable();
    });
    self.restClient.setErrorCallbackFunction(function (callback) {
        self.modalApi.showModal(ModalAPI.ERROR, 'Sistemas', callback.responseJSON, 'OK');
        self.loaderApi.hide();
    });
    self.restClient.exec();


};