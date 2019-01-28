<template>
    <div>
        <ckeditor type="classic" v-model="description"></ckeditor>
        <button class="btn btn-info float-right mt-2" :disabled="!descriptionChanged">Save</button>
    </div>
</template>

<script>
    export default {
        computed: {
            descriptionChanged() {
                return this.description != '<p>&nbsp;</p>';
            }
        },

        data() {
            return {
                description: '<p>&nbsp;</p>'
            }
        }
    }
</script>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .8s
    }
    .fade-enter, .fade-leave-to {
        opacity: 0
    }
</style>