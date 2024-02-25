import api from '@/Services/server'

async function getData(table, proposal, user, type)
{
    const dataRental = api.get('component/'+table+'/proposal/'+ proposal +'/user/'+ user +'/'+type)
    .then(res => {
        // console.log(res)
      
        return res.data
    })
    .catch(err => {
        console.log(err)
    })

    return dataRental
}

async function getAddress(user, object, type)
{
    const address = api.get('address/'+user+'/'+ object +'/'+ type +'')
    .then(res => {
        // console.log(res)
      
        return res.data
    })
    .catch(err => {
        console.log(err)
    })

    return address
}

/**
 * Função que retorna todos os fiadores de uma proposta na página de visualizar a proposta
 * @param {number} user 
 * @param {number} object 
 * @param {string} type 
 * @returns 
 */
async function getGuarantor(user, object, type)
{
    const guarantor = api.get('guarantor/'+user+'/'+ object +'/'+ type +'')
    .then(res => {
        // console.log(res)
      
        return res.data
    })
    .catch(err => {
        console.log(err)
    })

    return guarantor
}

/**
 * 
 * @param {*} user 
 * @param {*} object 
 * @param {*} type 
 * @returns 
 */
async function requestGuarantor(email)
{
    const guarantor = api.get('guarantor/'+user+'/'+ object +'/'+ type +'')
    .then(res => {
        // console.log(res)
      
        return res.data
    })
    .catch(err => {
        console.log(err)
    })

    return guarantor
}

export default {
    getData,
    getAddress,
    getGuarantor
}