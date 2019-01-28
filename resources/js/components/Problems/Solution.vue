<template>
    <div class="alert alert-success" role="alert">
        <h5>Solution</h5>
        <h6 v-if="solution.previousProblem">Similar Problem:</h6>
        <a href="#"><p v-if="solution.previousProblem"><strong>{{ solution.previousProblem.id }}</strong> {{ solution.previousProblem.summary }}</p></a>
        <div v-if="solution.solution" v-html="solution.solution"></div>
    </div>
</template>

<script>
    export default {
        props: ['solution'],

        data() {
            return {
                options: {
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            'bulletedList',
                            'numberedList',
                            'blockQuote',
                            'undo',
                            'redo'
                        ]
                    },
                }
            }
        }
    }
</script>