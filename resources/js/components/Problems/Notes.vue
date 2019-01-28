
<template>
    <div>
        <div class="comments-list mb-3">
            <note v-for="n in sortedNotes" :key="n.id" :note="n" @remove-note="remove"></note>
        </div>
        <textarea class="form-control" name="newcomment" id="newcomment" cols="30" rows="2" v-model="note" @keydown.enter.prevent="add"></textarea>
        <button class="btn btn-info mt-2 float-right" :disabled="note==''" @click="add">Add Note</button>
    </div>
</template>

<script>
    import Note from './Note'

    export default {
        components: {
            Note
        },

        computed: {
            sortedNotes() {
                return this.notes.sort(function(a, b) {
                    if (a.pinned && !b.pinned) return -1;
                    if (!a.pinned && b.pinned) return 1;
                    if (a.pinned && b.pinned) {
                        if (a.pinned < b.pinned) return -1;  
                        if (a.pinned > b.pinned) return 1;
                    }

                    if (a.created < b.created) return -1;
                    if (a.created > b.created) return 1;
                    return 0
                })
            }
        },

        data() {
            return {
                note: "",
                notes: []
            }
        },

        methods: {
            add() {
                let today = new Date();
                let time = today.getHours()
                    + ":" + (today.getMinutes() < 10 ? '0' + today.getMinutes() : today.getMinutes())
                    + ":" + (today.getSeconds() < 10 ? '0' + today.getSeconds() : today.getSeconds())
                let comment = this.note.replace(/  /g, '&nbsp;&nbsp;')

                if (comment.length > 0) {
                    this.notes.push({
                        id: this.notes.length + 1,
                        name: "John Johnson",
                        comment,
                        time,
                        pinned: null,
                        created: new Date()
                    });

                }
                this.note=""
            },
            remove(note) {
                this.notes.splice(this.notes.indexOf(note), 1)
            }
        }
    }
</script>
