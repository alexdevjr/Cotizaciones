<template>
    <div>
        <tree :tree-data="categories"></tree>
    </div>
</template>

<!-- <script>
    import Tree from "./Tree";

    export default {
        data: () => ({
            categories: {}
        }),

        components: {
            Tree
        },

        mounted() {
            this.loadCategories();
        },

        methods: {
            loadCategories: function() {
                axios.get('web/categories')
                     .then(response => {

                        let categories = {
                            id: null,
                            title: 'Categories',
                            tree: response.data,
                            editable: false
                        }

                        this.categories = categories;
                     });
            }
        },
    };
</script> -->
