<template>
	<div>
		<h3>{{title}}</h3>
		<p>{{body}}</p>
	</div>
</template>

<script>
	export default {
		name: 'Article',
		props: ['title', 'body']
	}
</script>

<style scoped>
	h3 {
		color: red;
	}
</style>
