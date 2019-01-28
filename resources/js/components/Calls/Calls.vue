<template>
    <div>
        <div class="row mb-1">
            <div class="col-lg-12">
                <h3>Calls</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 d-none d-md-block" style="border-right: 1px dashed rgba(51, 55, 51, 0.18)">
                <calls-list></calls-list>
            </div>
            <div class="col-md-9 col-sm-12 problem pb-2">
                <call-panel></call-panel>
            </div>
        </div>
    </div>
</template>

<script>
    import CallPanel from './Call'
    import CallsList from './CallsList'

    export default {
        components: {
            CallPanel, CallsList
        }
    }
</script>