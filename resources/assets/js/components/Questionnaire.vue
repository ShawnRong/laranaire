<template>
    <div class="row">
        <div class="col-md-8" >
            <QForm @toggle-preview="togglePreview" />
        </div>
        <div class="col-md-4">
            <QFromTool />
        </div>
        <slideout-panel></slideout-panel>
    </div>
</template>
<script>
import QFromTool from './QFormTools.vue';
import QForm from './QForm.vue';
import QPreview from './QFormPreview.vue';
import { VueSlideoutPanel,vueSlideoutPanelService } from 'vue2-slideout-panel';

export default {
    props: ['form-data'],
    data() {
        return {
            formPreview: false,
        }
    },
    created() {
        if(this.formData) {
            this.$store.commit({
                type: 'editData',
                formData: this.formData,
            })
        }
    },
    components: {
        QFromTool,
        QForm,
        QPreview,
        'slideout-panel': VueSlideoutPanel,
    },
    methods: {
        togglePreview() {
            vueSlideoutPanelService.show({
                component : QPreview,
                props: {
                    questions: this.$store.state.formFieldList,
                    fillStatus: false,
                }
            });
        }
    }
}
</script>
