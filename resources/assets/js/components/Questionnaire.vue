<template>
    <div class="row">
        <div class="col-md-7">
            <QForm />
        </div>
        <div class="col-md-4 offset-md-1">
            <QFromTool />
        </div>
    </div>
</template>
<script>
import QFromTool from './QFormTools.vue';
import QForm from './QForm.vue';
export default {
    components: {
        QFromTool,
        QForm
    },
}
</script>
