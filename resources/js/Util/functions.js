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

export default {
    toast,
}