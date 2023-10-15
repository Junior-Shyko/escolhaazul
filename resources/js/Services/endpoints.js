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

export default {
    getData,    
}