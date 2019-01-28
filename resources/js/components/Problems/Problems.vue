<template>
    <div>
        <div class="row mb-1">
            <div class="col-lg-12">
                <h3>Problems</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 d-none d-md-block" style="border-right: 1px dashed rgba(51, 55, 51, 0.18)">
                <problems-list></problems-list>
            </div>
            <div class="col-md-9 col-sm-12 problem pb-2">
                <problem></problem>
            </div>
        </div>
    </div>
</template>

<script>
    import Problem from './Problem'
    import ProblemsList from './ProblemsList'

    export default {
        components: {
            Problem, ProblemsList
        }
    }
</script>