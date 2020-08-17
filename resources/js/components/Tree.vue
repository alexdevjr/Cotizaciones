<template>
    <div class="tree">
        <ul class="tree-list">
            <!-- <li v-for="(categoty, index) in treeData">
                <node-tree :node="treeData" v-on:delete-node="removeNode(categoty, index)"></node-tree> -->
                <node-tree :node="treeData"></node-tree>
            <!-- </li> -->
        </ul>
    </div>
</template>

<script>
import NodeTree from "./NodeTree";

export default {
    props: {
        treeData: Object
    },

    components: {
        NodeTree
    },

    methods: {
        removeNode: function(categoty, index) {
            console.log('removeNode', categoty, index);
            if (index >= 0) {
                this.$delete(this.treeData, index);
            }
        }
    }
};
</script>

<style>
.tree-list ul {
    padding-left: 16px;
    margin: 6px 0;
}
</style>