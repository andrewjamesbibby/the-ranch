<script>
    export default {
        methods: {
            toast: function(status, message) {
                this.$toasted.show(message, { className: [status] });
            }
        }
    }
</script>