<template>
    <div class="row">
        <div class="col-md-8" :class="formPreview? 'test-blur': ''">
            <QForm @toggle-preview="togglePreview"/>
        </div>
        <div class="col-md-4" :class="formPreview? 'test-blur': ''">
            <QFromTool />
        </div>
        <QPreview v-show="formPreview" @close-preview="togglePreview"/>
    </div>
</template>
<script>
import QFromTool from './QFormTools.vue';
import QForm from './QForm.vue';
import QPreview from './QFormPreview.vue';

export default {
    data() {
        return {
            formPreview: false,
        }
    },
    components: {
        QFromTool,
        QForm,
        QPreview,
    },
    methods: {
        togglePreview() {
            this.formPreview = !this.formPreview;
        }
    }
}
</script>
<style>
    .test-blur {
        filter: blur(1px);
    }
</style>
