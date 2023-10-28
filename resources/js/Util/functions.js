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

export default {
    toast,
    valurMoneyUSA,
    brDatetoUsa,
    formatPhone
}