<template>
<div>
    <v-tab @click="skill('one')" v-show="state.visibleStepOne">
       <v-btn  variant="tonal">
        {{ state.btnStepOne }}
       </v-btn>
    </v-tab>
    <v-tab  @click="skill('two')" v-show="state.visibleStepTwo">
        <v-btn  variant="tonal">
        {{state.btnStepTwo}}
    </v-btn>
    </v-tab>
    <v-tab @click="skill('three')" v-show="state.visibleStepThree">
        <v-btn  variant="tonal">
        {{ state.btnStepThree }}
    </v-btn>
        <!-- <v-icon icon="fas fa-angle-right"></v-icon> -->
    </v-tab>
    <v-tab @click="skill('four')" v-show="state.visibleStepFour">
        <v-btn  variant="tonal">
        {{state.btnStepFour}}
    </v-btn>
    </v-tab>
</div>
</template>

<script setup>
import {onMounted, reactive} from "vue"

const emit = defineEmits('updatetab');

const props = defineProps({
    disabledTwo: Boolean,
    btnStep: Number
})

const state = reactive({
    btnStepOne: 'Início',
    btnStepTwo: 'Próximo',
    btnStepThree: '',
    btnStepFour: '',
    disabledStepOne: false,
    disabledStepTwo: props.disabledTwo,
    disabledStepThree: '',
    disabledStepFour: '',
    visibleStepOne: true,
    visibleStepTwo: true,
    visibleStepThree: '',
    visibleStepFour: '',
})

const skill = (value) => {
    console.log(value)
    console.log(props.btnStep)
    switch (value) {
        case 'one':
            state.btnStepOne = 'Início'
            state.btnStepTwo = 'Próximo two'
            state.btnStepThree = ''
            state.btnStepFour = ''
          

            state.visibleStepOne = true
            state.visibleStepTwo = true
            state.visibleStepThree = false
            state.visibleStepFour = false

            emit('updatetab', value);
            break;
        case 'two':
            state.btnStepOne = 'Anterior'
            state.btnStepTwo = ''
            state.btnStepThree = 'Próximo'
            state.btnStepFour = ''

         

            state.visibleStepOne = true
            state.visibleStepTwo = false
            state.visibleStepThree = true
            state.visibleStepFour = false
            emit('updatetab', value);
            break;
        case 'three':
            state.btnStepOne = ''
            state.btnStepTwo = 'Anterior'
            state.btnStepThree = ''
            state.btnStepFour = 'Última Etapa'

         
            state.visibleStepOne = false
            state.visibleStepTwo = true
            state.visibleStepThree = false
            state.visibleStepFour = true


            emit('updatetab', value);
            break;
        case 'four':
            state.btnStepOne = ''
            state.btnStepTwo = ''
            state.btnStepThree = 'Anterior'
            state.btnStepFour = 'Última Etapa'

           
            state.visibleStepOne = false
            state.visibleStepTwo = false
            state.visibleStepThree = true
            state.visibleStepFour = true

            emit('updatetab', value);
            break;
            
        default:
            break;
    }
}

onMounted(() => {
    console.log(props.disabledTwo)
})
</script>

<style >

.v-tab--selected {
    
}
</style>
