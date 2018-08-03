<template>
    <div class="container">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Questions</th>
                    <th>Answer</th>
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
