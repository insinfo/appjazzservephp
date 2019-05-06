<?php
/**
 * Created by PhpStorm.
 * User: isaque
 * Date: 08/01/2019
 * Time: 17:15
 */

namespace AppJazz\Model;


class Constants
{
    //Perfis genericos para qualquer sistema
    const PERFIL_ADMINISTRADOR_ID = 1;
    const PERFIL_USUARIO_ID = 3;
    //perfis do sistema PORTAL_RH
    const PERFIL_RH_GERAL_ID = 11;//Operador geral de recursos humanos da prefeitura sede
    const PERFIL_RH_SECRETARIA_ID = 12;//Operador de  recursos humanos da secretaria
    const PERFIL_RH_LOCAL_ID = 13;//Operador de  recursos humanos de uma unidade/departamento/setor de uma secretaria

    const SISTEMA_JUBARTE_ID = 1;
    const SISTEMA_CIENTE_ID = 2;
    const SISTEMA_SISCEC_ID = 3;
    const SISTEMA_DELCO_ID = 4;
    const SISTEMA_PORTAL_RH = 5;
    const SISTEMA_LDAP_ID = 6;
    const SISTEMA_JUBARTE_APP_ID = 7;
    const SISTEMA_MINHA_CASA_ID = 8;
    const SISTEMA_CMDCA_ID = 9;

    const ORGANOGRAMA_PMRO_ID = 389;

}