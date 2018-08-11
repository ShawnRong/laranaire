<template>
    <div>
        <button class="btn btn-primary" @click="view" >查看</button>
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
