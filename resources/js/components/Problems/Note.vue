<template>
    <div class="media">
        <i class="fas fa-thumbtack mr-2" v-if="note.pinned"></i>
        <div class="media-body">
            <h4 class="media-heading comment-name">{{note.name}}</h4>
            <span v-html="note.comment" v-if="!editing"></span>
            <textarea class="form-control" cols="30" rows="1" v-model="editValue" @keydown.enter.prevent="edit" autofocus v-else></textarea>
        </div>
        <p class="float-right">
            <small>{{note.time}}</small>
            <br>
        <div class="dropdown">
        <button class="btn btn-outline-dark" style="min-width: 35px; max-width: 35px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#" v-if="note.pinned" @click="unpin">Unpin</a>
                <a class="dropdown-item" href="#" v-else @click="pin">Pin</a>
                <a class="dropdown-item" href="#" @click="startEdit">Edit</a>
                <a class="dropdown-item" href="#" @click="remove">Delete</a>
            </div>
        </div>
        </p>
    </div>
</template>

<script>
    export default {
        props: ["note"],

        data(){
            return {
                editing: false,
                editValue: null
            }
        },

        methods: {
            startEdit() {
                this.editing = true
                this.editValue = this.note.comment.replace(/&nbsp;&nbsp;/g, '  ')
            },
            edit(){
                this.editing = false;
                this.note.comment = this.editValue.replace(/  /g, '&nbsp;&nbsp;')
            },
            remove(){
                this.$emit("remove-note", this.note)
            },
            pin() {
                this.note.pinned = new Date()
            },
            unpin() {
                this.note.pinned = null
            }
        }

    }

</script>
