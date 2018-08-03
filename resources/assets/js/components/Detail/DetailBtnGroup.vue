<template>
    <div>
        <button class="btn btn-primary" @click="view" >View</button>
    </div>
</template>
<script>
    import QuestionAnswers from './QuestionAnswers.vue';
    import { VueSlideoutPanel,vueSlideoutPanelService } from 'vue2-slideout-panel';
    export default {
        props: ['details'],
        components: {
            QuestionAnswers,
        },
        methods: {
            view() {
                console.log('123')
                vueSlideoutPanelService.show({
                    component: QuestionAnswers,
                    props: {
                        details: this.details
                    }
                });
            }
        }
    }
</script>
