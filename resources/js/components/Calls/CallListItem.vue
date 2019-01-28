<template>
    <tr class="border-bottom" :class="{ 'active': active }">
        <td>
            <a href="#">
                <div class="problem-link">
                    <span class="problem-id">{{ name }}</span><br>
                    <span class="problem-summary">{{ time }}</span>
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
            name: {
                default: 'John Doe',
                required: false
            },
            time: {
                default: '10th November 2018 at 13:01',
                required: false
            }
        }
    }
</script>