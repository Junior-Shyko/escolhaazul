import { createToast } from 'mosha-vue-toastify';
import 'mosha-vue-toastify/dist/style.css';

const toast = (titToast, descToast, typeToast) => {

    let background = ''
    switch (typeToast) {
        case 'success':
            background = '#00c292'
            break;
        case 'primary':
            background = '#2587E9'
            break;
        case 'secondary':
            background = '#afbdcc'
            break;
        case 'error':
            background = '#E44D3A'
            break;
        case 'info':
            background = '#70b3ec'
            break;
        case 'warning':
            background = '#fec107'
            break;
        default:
            background = 'default'
            break;
    }

    createToast({
      title: titToast,
      description: descToast
    },
      {
        showIcon: 'true',
        position: 'top-center',
        type: typeToast,
        transition: 'zoom',
        toastBackgroundColor: background
      })
  }

/**
 * Função que recebe o formato do valor monetário em Real e converte para formato USA
 * @param {string} val
 * @returns
 */
const valurMoneyUSA = (val) => {
    var newValue = 0;
    newValue = parseInt(val.replace(/[\D]+/g, ''));
    newValue = newValue + '';
    newValue = newValue.replace(/([0-9]{2})$/g, ".$1");
    return newValue
}

const brDatetoUsa = (datestring) => {
    var dateSplitted = datestring.split('/');
    return dateSplitted[2] + '-' + dateSplitted[1] + '-' + dateSplitted[0];
}

//Remove espaços para ser validado no backend
const formatPhone = (phone) => {
   var newstr = ""
   newstr = phone.split(" ").join("");
   return newstr
}

const usaDatetoBr = (datestring) => {
  var dateSplitted = datestring.split('-');
  return dateSplitted[2] + '/' + dateSplitted[1] + '/' + dateSplitted[0];
}
//Prazo Desejado
const termWanted = [12,18,24,30,36,42,48];
//Tipo de garantia
const typeOfGuarantee = ['Carta Fiança', 'Caução', 'Crédito', 'Fiador','Sem garantia', 'Seguro fiança', 'Outras']
//Lista de bancos no Brasil
const banks = [
    'Banco do Brasil (BB)',
    'Caixa Econômica Federal (CEF)',
    'Banco Bradesco',
    'Banco Itaú',
    'Banco Santander',
    'Banco Safra',
    'Banco Votorantim',
    'Banco Inter',
    'Nubank',
    'Banrisul (Banco do Estado do Rio Grande do Sul)',
    'Banco do Nordeste (BNB)',
    'Banestes (Banco do Estado do Espírito Santo)',
    'Banco Original',
    'Banco PAN',
    'Banco BMG',
    'Citibank Brasil',
    'Banco Pine',
    'Banco Daycoval',
    'Banco Renner',
    'C6 Bank'
    ]
//Imobiliárias
const listImmobiles = [
    'Imobiliária Espindola',
    'Lopes Immobilis',
    'A Predial',
    'Athenas Imóveis',
    'Alessandro Belchior',
    'Lar Imóveis',
    'Guia Imóveis',
    'Heron Ibiapina',
    'Unimóveis',
    'Imobiliária Magno',
    'Emcasa Imobiliária',
    'Estarfor Negócios Imobiliários',
    'Ary Brasil',
    'Torres de Melo',
    'FZ imóveis',
    'Dimensão Imóveis',
    'Imobiliária Diagonal',
    'Retta Imóveis',
    'César Rego',
    'Futuro Imóveis',
    'Mota da Costa',
    'Marcelino Freitas',
    'Fiducial Imobiliária',
    'Amauri Gomes'
];
//Veiculos
const listVehicle = [
    'Fiat', 'Volkswagen', 'Toyota', 'Chevrolet', 'Honda', 'Hyundai',
    'Kia','Nissan','Ford','Jeep','Renault','Nissan','Chery',
    'BMW','Mercedes-Benz','Jac','Iveco','MITSUBISHI','RAM','Citroen'
]
//Lista do ano do calendario
const listYear = [1980,1981,1982,1983,1984,1985,1986,1987,1988,1989,1990,1991,1992,1993,1994,1995,1996,1997,1998,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020,2021,2022,2023,2024,]
export default {
    toast,
    valurMoneyUSA,
    brDatetoUsa,
    formatPhone,
    usaDatetoBr,
    termWanted,
    typeOfGuarantee,
    banks,
    listImmobiles,
    listVehicle,
    listYear
}
