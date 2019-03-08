<script>
    export default {
        computed : {
            filtered() {
                return _.pickBy(this.form, (value, key) => {
                    return value !== '';
                });
            }
        },
    }
</script>