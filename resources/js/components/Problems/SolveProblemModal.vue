<template>
    <div class="modal fade" id="solveProblemModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #7386D5">
                    <h4 class="modal-title" style="color: #ffffff"><b>Solve Problem</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group pt-2">
                        <label><h5><b>Solution</b></h5></label>
                        <ckeditor type="classic" v-model="solution" :config="options"></ckeditor>
                    </div>

                    <div class="form-group pt-2">
                        <label><h5><b>Previous Problem</b></h5></label>
                        <select class="form-control" v-model="prevProblem">
                            <option :value="null" id="select" selected>Select</option>
                            <option v-for="p in $parent.previousProblems" :value="p.id">{{ p.summary }}</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-flat" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info" @click="solve" data-dismiss="modal" :disabled="!canSolve">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            canSolve() {
                return this.solution != '<p>&nbsp;</p>' || this.prevProblem != null
            }
        },

        data() {
            return {
                solution: '<p>&nbsp;</p>',
                prevProblem: null,
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
        },

        methods: {
            solve() {
                let solution = this.solution != '<p>&nbsp;</p>' ? this.solution : null
                let previousProblem = this.prevProblem ? this.$parent.previousProblems.find(p => {
                        return p.id == this.prevProblem
                    }) : null
                this.$emit('solved', {
                    solution,
                    previousProblem
                })
            }
        }
    }
</script>