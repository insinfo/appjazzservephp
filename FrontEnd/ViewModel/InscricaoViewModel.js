$(document).ready(function () {
    var mainView = new InscricaoViewModel();
    mainView.init();
});

function InscricaoViewModel() {

    this.restClient = new RESTClient();
    this.loaderApi = new LoaderAPI();
    this.modalApi = new ModalAPI();

    this.webserviceBaseURL = WEBSERVICE_MINHACASA_BASE_URL;
    this.webservicePmroBaseURL = WEBSERVICE_PMRO_BASE_URL;
    this.webserviceJubarteBaseURL = WEBSERVICE_JUBARTE_BASE_URL;

    this.formValidateApi = new FormValidationAPI('formCadastro');
    this.formCadastro = $("#formCadastro");
    this.btnFillEndereco = $("#btnFillEndereco");
    this.btnBuscaEndereco = $("#btnBuscaEndereco");

    this.deficiencia = $("#deficiencia");
    this.recursosParaDeficiente = $("#recursosParaDeficiente");
    this.aceitoTermos = $("#aceitoTermos");

    this.btnSave = $("#btnSave");

    //form busca CEP
    this.selectUfBuscaCEP = $('#selectUfBuscaCEP');
    this.selectMunicipioBuscaCEP = $('#selectMunicipioBuscaCEP');
    this.inputBairroBuscaCEP = $('#inputBairroBuscaCEP');
    this.inputLogradouroBuscaCEP = $('#inputLogradouroBuscaCEP');
    this.btnBuscarCEPEnd = $('#btnBuscarCEPEnd');
    this.correntEndereco = $('.enderecoItem');
    this.selectUf = $('#estado');
    this.selectMunicipio = $('#municipio');

    // lista CEPS
    this.tableListCEPCorreios = $('#tableListCEPCorreios');
    this.dataTableCEPCorreios = new ModernDataTable('tableListCEPCorreios');
    this.modalBuscaCEP = $('#modalBuscaCEP');


    this.dataEmissaoRg = $('#dataEmissaoRg');

    this.body = $('body');
}

InscricaoViewModel.prototype.init = function () {
    var self = this;

    self.events();
    self.getUFs();
    self.getMunicipios();
    self.listCEPbyEndereco();
    /*$(".styled").uniform({
        radioClass: 'choice'
    });*/

    //iniciliza o plugin  select2 se estiver no desktop
    var regexDesk = /Linux|Windows|Macintosh/i;
    if (regexDesk.test(navigator.userAgent)) {
        $('.select').select2({
            // minimumResultsForSearch: Infinity
        });
    }

    $("#tipoTelefone").change(function () {
        var inputTelefone = $("#telefone");
        var input = document.createElement('input');
        input.type = "text";
        input.name = inputTelefone[0].name;
        input.id = inputTelefone[0].id;
        input.className = inputTelefone[0].className;
        var newInput = $(input);
        switch (this.value) {
            case "residencial":
                newInput.inputmask({mask: "(99) 9999-9999"});
                break;
            case "comercial":
                newInput.inputmask({mask: "(99) 9999-9999"});
                break;
            default:
                newInput.inputmask({
                    mask: "(99) 9 9999-9999"
                });
                break;
        }
        var parent = inputTelefone.parent();
        parent[0].removeChild(inputTelefone[0]);
        parent[0].appendChild(input);
    });

};
InscricaoViewModel.prototype.updateFields = function () {
    var self = this;

    var selects = $('.select');
    //selects.selectpicker('refresh');
    //selects.select2('refresh');
    self.maskForm();
};
InscricaoViewModel.prototype.getUFs = function (select, idUfToSelect) {
    var self = this;
    self.loaderApi.show();
    var dataToSender = {'idPais': 33};
    self.restClient.setWebServiceURL(self.webservicePmroBaseURL + 'uf');
    self.restClient.setMethodPOST();
    self.restClient.setDataToSender(dataToSender);
    self.restClient.setSuccessCallbackFunction(function (data) {
        self.loaderApi.hide();
        if (!select) {
            populateSelect(self.selectUfBuscaCEP, data, 'id', 'nome', 'rio de janeiro');
            populateSelect(self.selectUf, data, 'id', 'nome', 'rio de janeiro');
        }
        else {
            populateSelect(select, data, 'id', 'nome', 'rio de janeiro');
            if (idUfToSelect) {
                select.val(idUfToSelect);
            }
        }
        self.updateFields();

    });
    self.restClient.setErrorCallbackFunction(function (jqXHR, textStatus, errorThrown) {
        self.loaderApi.hide();
        //alert('Erro em obter lista de estados');
        self.modalApi.showModal(ModalAPI.ERROR, "Erro", jqXHR.responseJSON, "OK");
    });
    self.restClient.exec();
};
InscricaoViewModel.prototype.getMunicipios = function (select, idUF, idMunicipioToSelect) {
    var self = this;
    self.loaderApi.show();
    if (idUF == null) {
        idUF = 20;
    }
    var dataToSender = {'idUF': idUF};
    self.restClient.setWebServiceURL(self.webservicePmroBaseURL + 'municipio');
    self.restClient.setMethodPOST();
    self.restClient.setDataToSender(dataToSender);
    self.restClient.setSuccessCallbackFunction(function (data) {
        self.loaderApi.hide();
        if (!select) {
            populateSelect(self.selectMunicipioBuscaCEP, data, 'id', 'nome', 'rio das ostras');
            populateSelect(self.selectMunicipio, data, 'id', 'nome', 'rio das ostras');
        }
        else {
            populateSelect(select, data, 'id', 'nome', 'rio das ostras');
            if (idMunicipioToSelect) {
                select.val(idMunicipioToSelect);
            }
        }
        self.updateFields();
    });
    self.restClient.setErrorCallbackFunction(function (jqXHR, textStatus, errorThrown) {
        self.loaderApi.hide();
        // alert('Erro em obter lista de municipios');
        self.modalApi.showModal(ModalAPI.ERROR, "Erro", jqXHR.responseJSON, "OK");
    });
    self.restClient.exec();
};
//INICIALIZA DATATABLE BUSCA CEP POR ENDERECO
InscricaoViewModel.prototype.listCEPbyEndereco = function () {
    var self = this;

    var columnsConfiguration = [
        {"key": "tipo"},
        {"key": "logradouro"},
        {"key": "complemento"},
        {"key": "bairro"},
        {"key": "municipio"},
        {"key": "uf"},
        {"key": "cep"}
    ];

    var dataToSender = {
        'uf': 'RJ',
        'municipio': 'Rio das Ostras',
        'bairro': 'Centro',
        'logradouro': 'Rodovia Amaral'
    };
    self.dataTableCEPCorreios.hideTableHeader();
    self.dataTableCEPCorreios.setDisplayCols(columnsConfiguration);
    self.dataTableCEPCorreios.hideActionBtnDelete();
    self.dataTableCEPCorreios.hideRowSelectionCheckBox();
    self.dataTableCEPCorreios.setIsColsEditable(false);

    self.dataTableCEPCorreios.setDataToSender(dataToSender);
    self.dataTableCEPCorreios.setSourceURL(self.webserviceJubarteBaseURL + "correios/cep");
    self.dataTableCEPCorreios.setSourceMethodPOST();
    self.dataTableCEPCorreios.setOnClick(function (data) {
        var cep = data['cep'].replace(/\D/g, '').trim();
        self.getEnderecoByCEP(cep, self.correntEndereco);
        self.modalBuscaCEP.modal('hide');
    });
    self.dataTableCEPCorreios.load();
};
InscricaoViewModel.prototype.getEnderecoByCEP = function (cep, refCorrentDivEndereco) {
    var self = this;
    self.loaderApi.show();

    /*refCorrentDivEndereco.find('[name="bairro"]').prop('disabled', true);
    refCorrentDivEndereco.find('[name="uf"]').prop('disabled', true);
    refCorrentDivEndereco.find('[name="municipio"]').prop('disabled', true);
    refCorrentDivEndereco.find('[name="logradouro"]').prop('disabled', true);
    refCorrentDivEndereco.find('[name="tipoLogradouro"]').prop('disabled', true);*/

    self.restClient.setWebServiceURL(self.webserviceJubarteBaseURL + 'correios/endereco/' + cep);
    self.restClient.setMethodGET();
    self.restClient.setDataToSender(null);
    self.restClient.setSuccessCallbackFunction(function (data) {
        //set o input validacao para true
        var estadoCorreios = data['uf'];
        var municipioCorreios = data['municipio'];
        var tipoLogradouroCorreios = data['tipo'];

        refCorrentDivEndereco.find('[name="validacao"]').val('true');
        refCorrentDivEndereco.find('[name="cep"]').val(data['cep']);

        //seleciona o PAIS
        var selectPais = refCorrentDivEndereco.find('[name="pais"]');
        setSelectIsContain(selectPais, 'brasil');
        self.updateFields();

        //seleciona o ESTADO
        var selectUf = refCorrentDivEndereco.find('[name="estado"]');

        setSelectIsContain(selectUf, converterEstados(estadoCorreios));
        self.updateFields();

        //dispara o evento change preenchendo o select municipio com as municipios
        //do estado do CEP e seta o municipio do CEP
        var timerFunc = setInterval(function () {
            if (self.loaderApi.isLoading() === false) {
                clearInterval(timerFunc);
                var selectMunicipio = refCorrentDivEndereco.find('[name="municipio"]');
                setSelectIsContain(selectMunicipio, municipioCorreios);
                self.updateFields();
            }
        }, 500);

        refCorrentDivEndereco.find('[name="bairro"]').val(data['bairro']);
        refCorrentDivEndereco.find('[name="logradouro"]').val(data['logradouro']);

        var selectTipoLogradouro = refCorrentDivEndereco.find('[name="tipoLogradouro"]');
        if (!setSelectIsContain(selectTipoLogradouro, tipoLogradouroCorreios)) {
            selectTipoLogradouro.append($('<option>', {
                value: tipoLogradouroCorreios, text: tipoLogradouroCorreios
            }).attr("selected", true));
        }
        self.updateFields();
        self.loaderApi.hide();
    });
    self.restClient.setErrorCallbackFunction(function (jqXHR, textStatus, errorThrown) {
        self.loaderApi.hide();
        refCorrentDivEndereco.find('[name="bairro"]').prop('disabled', false);
        refCorrentDivEndereco.find('[name="uf"]').prop('disabled', false);
        refCorrentDivEndereco.find('[name="municipio"]').prop('disabled', false);
        refCorrentDivEndereco.find('[name="logradouro"]').prop('disabled', false);
        refCorrentDivEndereco.find('[name="tipoLogradouro"]').prop('disabled', false);
        var response = jqXHR.responseJSON;
        if (response) {
            if (response['exception'] !== undefined && response['exception'] === "Não existe") {
                self.modalApi.showModal(ModalAPI.PRIMARY, "Consulta CEP", "CEP invalido ou inexistente na base de dados!", "OK");
            } else {
                self.modalApi.showModal(ModalAPI.ERROR, "Erro", response, "OK");
            }

        } else {
            self.modalApi.showModal(ModalAPI.ERROR, "Erro", "Erro desconhecido... Verifique se você esta conectado a internet.", "OK");
        }
        //alert('Não foi possível obter endereço pelo CEP informado.');
        self.modalApi.showModal(ModalAPI.ERROR, "Erro", jqXHR.responseJSON, "OK");
    });
    self.restClient.exec();
};
InscricaoViewModel.prototype.maskForm = function () {

    //this.dataEmissaoRg.mask('99/99/9999');
    /* $(".on-select-sim-change-input").each(function () {
         var textInputs = $(this).find('input[type=text]');
         textInputs.hide();
         $(this).find('input[type=radio]').click(function () {
             if (this.value === "sim") {
                 textInputs.fadeIn();
             } else {
                 textInputs.fadeOut();
             }
         });
     });

     $("input[data-mask]").each(function () {
         var mask = this.dataset.mask;

         $(this).formatter({
             pattern: mask
         });
     })*/
};
InscricaoViewModel.prototype.events = function () {
    var self = this;

    self.btnSave.on('click', function (e) {
        self.save();
    });

    self.selectUfBuscaCEP.on('change', function (e) {
        self.getMunicipios(self.selectMunicipioBuscaCEP, self.selectUfBuscaCEP.val());
    });

    self.selectUf.on('change', function (e) {
        self.getMunicipios(self.selectMunicipio, self.selectUf.val());
    });

    //BUSCA CEP POR ENDERECO
    self.btnBuscarCEPEnd.click(function () {
        var dataToSender = {
            'uf': converterEstados(self.selectUfBuscaCEP.find('option:selected').text()),
            'municipio': self.selectMunicipioBuscaCEP.find('option:selected').text(),
            'bairro': self.inputBairroBuscaCEP.val(),
            'logradouro': self.inputLogradouroBuscaCEP.val()
        };
        self.dataTableCEPCorreios.setDataToSender(dataToSender);
        self.dataTableCEPCorreios.reload();
    });

    //buscar endeço nos correios pelo cep informado e preencher os campos de endereço
    self.btnFillEndereco.on('click', function () {
        var divEndereco = $(this).closest('.enderecoItem');
        var correntCep = divEndereco.find('input[name=cep]').val().replace(/\D/g, '').trim();
        if (!correntCep) {
            //alert('CEP não pode ser vazio');
            self.modalApi.showModal(ModalAPI.ERROR, "Erro", 'CEP não pode ser vazio', "OK");
        }
        else {
            self.getEnderecoByCEP(correntCep, divEndereco);
        }
    });

    self.body.on('click', '.btnImprimir', function (e) {
        self.printPdf($(this).attr('data-document'));
    });

};
InscricaoViewModel.prototype.validaForm = function () {
    var self = this;

    if (!self.formValidateApi.validate(true, true)) {
        self.modalApi.modalError('Os campos ' + self.formValidateApi.getInvalidFields() + ' são obrigatorios!');
        return false;
    }

    if ($('#telefone').val() == null || $('#telefone').val() === '' || $('#telefone').val() === undefined) {
        self.modalApi.modalError('O telefone é obrigatorio.');
        return false;
    }

    if (!self.aceitoTermos.is(':checked')) {
        self.modalApi.modalError('Você não marcou "Declaro que li o Edital"').onClick(function () {
            self.aceitoTermos.focus();
        });
        return false;
    }

    if (self.deficiencia.val().length > 3) {
        if (self.recursosParaDeficiente.val().length < 3) {
            self.modalApi.modalError('Você relatou uma deficiência, mais não informou os recursos materiais/humanos necessários a realização da prova')
                .onClick(function () {

                    self.recursosParaDeficiente.focus();
                });
            return false;
        }
    }

    return true;
};
InscricaoViewModel.prototype.save = function () {
    var self = this;

    if (!self.validaExperiencia2()) {
        return;
    }

     if (!self.validaExperiencia()) {
         return;
     }

     if (!self.validaForm()) {
         return;
     }

    var dataToSender = self.formCadastro.serializeJSON();
    dataToSender['cpf'] = dataToSender['cpf'].replace(/\D/g, '').trim();
    dataToSender['cep'] = dataToSender['cep'].replace(/\D/g, '').trim();
    dataToSender['telefone'] = dataToSender['telefone'].replace(/\D/g, '').trim();
    dataToSender['esperiencias'] = self.tableToJson('.tableFormExperiencia');
    dataToSender['isClassificado'] = false;

    dataToSender['estado'] = $('#estado option:selected').text();
    dataToSender['municipio'] = $('#municipio option:selected').text();

    console.log(dataToSender);

    self.loaderApi.show();
    self.restClient.setMethodPUT();
    self.restClient.setDataToSender(dataToSender);
    self.restClient.setWebServiceURL(self.webserviceBaseURL + 'inscricao');
    self.restClient.setSuccessCallbackFunction(function (data) {
        self.loaderApi.hide();
        self.modalApi.showModal(ModalAPI.SUCCESS, "Sucesso", data['message'], "OK")
            .onClick(function () {
                window.location = WEBSERVICE_MINHACASA_BASE_URL_WEB + 'comprovante?nome=' + data['nome'] + '&numero=' + data['numero'];
            });
    });
    self.restClient.setErrorCallbackFunction(function (xhr) {
        self.loaderApi.hide();
        self.modalApi.showModal(ModalAPI.ERROR, "Erro", xhr['responseJSON'], "OK");
    });
     self.restClient.exec();

};
InscricaoViewModel.prototype.tableToJson = function (selector) {

    var json = [];

    $(selector).find('tbody tr').each(function (idx, item) {

        var linha = {};
        var count = 0;

        $(item).find('td').each(function (idx, item) {
            linha[$(item).attr('data-identity')] = $(item).text();
            if ($(item).text().length > 2) {
                count++
            }
        });
        if (count === 5) {
            json.push(linha);
        }

    });

    return json;

};
InscricaoViewModel.prototype.validaExperiencia = function () {
    var selector = '.tableFormExperiencia';
    var self = this;
    var json = [];
    var result = true;

    $(selector).find('tbody tr').each(function (idx, item) {

        var isFill = false;

        $(item).find('td').each(function (idx, item) {
            //linha[$(item).attr('data-identity')] = $(item).text();
            if ($(item).text().trim().length > 3) {
                isFill = true;
            }
        });

        if (isFill) {
            $(item).find('td').each(function (idx, item) {
                //linha[$(item).attr('data-identity')] = $(item).text();
                if ($(item).text().trim().length === 0) {
                    $(item).css({"border": "solid red 2px"});
                    result = false;
                    //obtem o table head desta celula
                    var text = $(item).closest('table').find('th').eq($(item).index());
                    json.push(text.text());
                }
            });
        }
    });

    if (!result) {
        var novaArr = json.filter(function (item, i) {
            return json.indexOf(item) === i;
        });

        self.modalApi.showModal(ModalAPI.ERROR, "Erro", 'Você não preencheu os seguintes campos: ' + novaArr.join(', '), "OK")
            .onClick(function () {
                $(selector).find('tbody tr td').focus();
            });
    }

    return result;

};
InscricaoViewModel.prototype.validaExperiencia2 = function () {
    var selector = '.tableFormExperiencia';
    var self = this;

    var valido = true;

    $(selector).find('tbody tr:first-child').each(function (idx, item) {

        $(item).find('td').each(function (idx, item) {
            if ($(item).text().trim().length < 3) {
                valido = false;
            }
        });


        console.log(valido);
    });

    console.log(valido);

    if (!valido) {
        self.modalApi.showModal(ModalAPI.ERROR, "Erro", 'Você tem que preencher ao menos uma experiência de atuação!', "OK")

        $(selector).find('tbody tr td').focus();

    }


    return valido;

};
InscricaoViewModel.prototype.printPdf = function (url) {
    var iframe = this._printIframe;
    if (!this._printIframe) {
        iframe = this._printIframe = document.createElement('iframe');
        document.body.appendChild(iframe);

        iframe.style.display = 'none';
        iframe.onload = function () {
            setTimeout(function () {
                iframe.focus();
                iframe.contentWindow.print();
            }, 1);
        };
    }

    iframe.src = url;
};