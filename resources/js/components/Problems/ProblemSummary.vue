<template>
    <h4 class="problem-summary d-inline-block mb-0" v-if="!editing" @click="edit">
        {{ summary }}&nbsp;
        <i class="far fa-edit editing d-none"></i>
    </h4>
    <div v-else>
        <input v-model="summary"
               class="form-control d-inline-block"
               id="problem-summary-edit"
               v-autowidth="{maxWidth: '960px', minWidth: '20px', comfortZone: 5}"
               @keyup.enter="update"
        >
        <button class="btn btn-success d-inline-block" style="min-width: 35px; max-width: 35px; padding: 0.375rem 0;" @click.prevent="update"><i class="fas fa-check"></i></button>
        <button class="btn btn-danger d-inline-block" style="min-width: 35px; max-width: 35px; padding: 0.375rem 0;" @click.prevent="cancel"><i class="fas fa-times"></i></button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                oldSummary: "",
                summary: "Faulty ink cartridges",
                editing: false
            }
        },

        methods: {
            edit() {
                this.oldSummary = this.summary
                this.editing = true
                setTimeout(() => {
                    $('#problem-summary-edit').focus();
                }, 0);
            },

            cancel() {
                this.summary = this.oldSummary
                this.editing = false
            },

            update() {
                // save to database

                this.editing = false
            }
        }
    }
</script>