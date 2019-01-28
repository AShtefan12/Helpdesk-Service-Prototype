<template>
    <tr class="border-bottom" :class="{ 'active': active }">
        <td>
            <a href="#">
                <div class="problem-link">
                    <span class="problem-id">{{ id }}</span><br>
                    <span class="problem-summary">{{ summary }}</span>
                </div>
            </a>
        </td>
    </tr>
</template>

<script>
    export default {
        props: {
            active: {
                default: false,
                required: false
            },
            id: {
                default: 'XK690',
                required: false
            },
            summary: {
                default: 'Broken printer in the break room',
                required: false
            }
        }
    }
</script>