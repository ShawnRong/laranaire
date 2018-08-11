<template>
    <div class="container">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>问题</th>
                    <th>回答</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(answer, question) in details">
                    <td>{{question}}</td>
                    <td>{{answer}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        props: ['details'],
    }
</script>
