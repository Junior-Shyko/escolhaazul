import api from '@/Services/server'

async function getData(table, proposal, user)
{
    const dataRental = api.get('api/component/'+table+'/proposal/'+ proposal +'/user/'+ user +'')
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
    const address = api.get('api/address/'+user+'/'+ object +'/'+ type +'')
    .then(res => {
        // console.log(res)
      
        return res.data
    })
    .catch(err => {
        console.log(err)
    })

    return address
}

export default {
    getData,
    getAddress  
}