<template>
    <div>
        <div v-for="category in this.categories">
            <h4> {{category.categoryname}} </h4>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['categories'],
    }
</script>
