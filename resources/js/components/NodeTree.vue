<template>

    <li class="node-tree" :id="node.id">
        <span class="label">
            <template v-if="$root.editCurrent !== node.id">{{ node.title }}</template>

            <div v-if="$root.editCurrent == node.id" class="form-inline">
                <div class="form-group mx-sm-12 mb-2">
                    <input v-model="node.title" type="text" class="form-control" placeholder="Category Name...">
                </div>
                <button @click="update(node)" :disabled="!node.title" type="button" class="btn btn-outline-success mb-2">✔️</button>
                <button @click="cancel(node)" type="button" class="btn btn-outline-secondary mb-2">✖️</button>
            </div>

            <template v-if="$root.editCurrent !== node.id">
                <button @click="add(node)" type="button" class="btn btn-outline-secondary mb-2">➕</button>
                <button v-if="!node.hasOwnProperty('editable')" @click="edit(node)" type="button" class="btn btn-outline-warning mb-2">✏️</button>
                <button v-if="!node.hasOwnProperty('editable')" @click="remove(node)" type="button" class="btn btn-outline-danger mb-2">❌</button>
            </template>
        </span>

        <div v-if="$root.addCurrent == node.id" class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <input v-model="title" type="text" class="form-control" placeholder="Category Name...">
            </div>
            <button @click="store(node)" :disabled="!title" type="button" class="btn btn-outline-success mb-2">✔️</button>
            <button @click="cancel(node)" type="button" class="btn btn-outline-secondary mb-2">✖️</button>
        </div>

        <ul v-if="node.tree && node.tree.length">
            <draggable :list="node.tree" @change="sort" :options="{animation:200}">
                <node v-for="(child, index) in orderedNode" v-bind:key="child.id" :node="child" :index="index"></node>
            </draggable>
        </ul>
    </li>
</template>

<script>
    import draggable from 'vuedraggable';
    import _ from 'lodash';

    export default {
        name: "node",

        props: {
            node: Object,
            index: Number
        },

        components: {
            draggable,
        },

        data: () => ({
            title: ''
        }),

        computed: {
            orderedNode: function () {
                return _.orderBy(this.node.tree, 'order')
            }
        },

        methods: {
            add: function(node) {
                this.$root.addCurrent = node.id;
                this.$root.editCurrent = '';
            },

            store: function(node) {
                axios.post('api/categories', {
                    title: this.title,
                    parent_id: node.id
                })
                .then(response => {
                    let category = response.data.data;
                    category.tree = [];

                    node.tree.push(category);

                    this.title = '';
                    this.$root.addCurrent = '';
                });
            },

            edit: function(node) {
                this.$root.editCurrent = node.id;
                this.$root.addCurrent = '';
            },

            update: function(node) {
                axios.put('api/categories/' + node.id, {
                    title: node.title
                })
                .then(response => {
                    this.$root.editCurrent = '';
                });
            },

            cancel: function(node) {
                this.$root.editCurrent = '';
                this.$root.addCurrent = '';
            },

            remove: function(node) {
                axios.delete('api/categories/' + node.id)
                    .then(response => {
                        this.$emit('delete-node');
                        this.$destroy();
                        this.$el.parentNode.removeChild(this.$el);
                    });
            },

            sort: function(sort) {
                let data = [];
                this.node.tree.forEach((child, index) => {
                    child.order = index + 1;
                    data.push({id: child.id, order: index + 1})
                });

                console.log(data);
                axios.post('api/categories/sort', {data})
                    .then(response => {});
            }
        }
    };
</script>